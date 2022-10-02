<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dgaAdmin\MomoApi;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Momo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\HistoryPlay;
use App\Models\HistoryBank;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MomoController extends Controller
{

    private $TimeSetup = 900;

    public function addMomo()
    {
        $setting = Setting::first();
        $momo = Momo::get();
        $GetAccountMomo = [];
        $i = 0;
        $total = 0;
        foreach ($momo as $row) {
            $GetAccountMomo[$i] = $row;
            if ($row->status != 3) {
                $GetAccountMomo[$i]['name'] = json_decode($row->info)->Name;
                $GetAccountMomo[$i]['balance'] = json_decode($row->info)->balance;
                $GetAccountMomo[$i]['times'] = HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count();
                $GetAccountMomo[$i]['amount'] = HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive');
                $GetAccountMomo[$i]['amountMonth'] = HistoryPlay::where('phoneSend', $row->phone)->whereMonth('created_at', date('m'))->sum('receive');
                $total += json_decode($row->info)->balance;
            }
            if ($row->status == 1) {
                $GetAccountMomo[$i]['status_text'] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success" id="status_' . $row->id . '">Hoạt động</span>';
            } else if ($row->status == 2) {
                $GetAccountMomo[$i]['status_text'] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger" id="status_' . $row->id . '">Ẩn</span>';
            } else if ($row->status == 0) {
                $GetAccountMomo[$i]['status_text'] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger" id="status_' . $row->id . '">Bảo trì</span>';
            } else if ($row->status == 3) {
                $GetAccountMomo[$i]['status_text'] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning" id="status_' . $row->id . '">Đang xác thực</span>';
            } else if ($row->status == 4) {
                $GetAccountMomo[$i]['status_text'] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning" id="status_' . $row->id . '">Ngâm</span>';
            }
            $i++;

        }
        return view('dgaAdmin.addMomo', compact('setting', 'GetAccountMomo', 'total'));
    }

    public function getOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:11',
            'min' => 'numeric|required',
            'max' => 'numeric|required',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $device = Device::inRandomOrder()->first();
        $momo = new MomoApi();
        $data = array(
            'phone' => $request->phone,
            'device' => $device->device,
            'hardware' => $device->hardware,
            'facture' => $device->facture,
            'SECUREID' => $momo->get_SECUREID(),
            'MODELID' => $device->MODELID,
            'imei' => $momo->generateImei(),
            'rkey' => $momo->generateRandom(20),
            'AAID' => $momo->generateImei(),
            'TOKEN' => $momo->get_TOKEN(),
            'password' => $request->password,
            'proxy' => $request->proxy
        );
        $result = $momo->SendOTP($data);
        if ($result['status'] == "success") {
            $momo = Momo::where('phone', $request->phone)->first();
            if (!$momo) {
                Momo::create([
                    'token' => Str::random(64),
                    'phone' => $request->phone,
                    'time_login' => time(),
                    'info' => json_encode($data),
                    'min' => $request->min,
                    'max' => $request->max,
                    'status' => 3,
                    'try' => 0
                ]);
                return response()->json(array('status' => 'success', 'message' => 'Gửi mã OTP về ' . $request->phone . ' thành công'));
            } else {
                $momo->status = 3;
                $momo->info = json_encode($data);
                $momo->save();
                return response()->json(array('status' => 'success', 'message' => 'Gửi mã OTP về ' . $request->phone . ' thành công'));
            }
        } else {
            return response()->json(array('status' => 'success', 'message' => 'Lỗi vui lòng thực hiện lại sau'));
        }
    }

    public function verifyMomo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:11',
            'min' => 'numeric|required',
            'max' => 'numeric|required',
            'password' => 'required|string|min:6',
            'otp' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return back()->withErrors(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $code = $request->otp;
        $dataMomo = Momo::where('phone', $request->phone)->first();
        $data_old = json_decode($dataMomo->info, true);
        $data = Arr::add($data_old, 'ohash', hash('sha256', $data_old["phone"] . $data_old["rkey"] . $code));
        $momo = new MomoApi();
        $result = $momo->REG_DEVICE_MSG($data);
        if ($result['errorCode'] != 0) {
            return back()->withErrors(['status' => 'error', 'message' => $result]);
        } else if ($result['errorCode'] == 0 || empty($result['errorCode'])) {

            $data_new = Arr::add($data, 'setupKey', $result["extra"]["setupKey"]);
            $data_new = Arr::add($data_new, 'setupKeyDecrypt', $momo->get_setupKey($result["extra"]["setupKey"], $data));

            $dataMomo->info = $data_new;
            $dataMomo->save();

            $result = $this->loginMomo($dataMomo->phone);

            if ($result['status'] == 'success') {

                $dataMomo->status = 4;
                $dataMomo->info = $data_new;
                $dataMomo->save();
                return back()->withErrors(['status' => 'success', 'message' => 'Thêm tài khoản thành công']);

            } else {
                return back()->withErrors(['status' => 'success', 'message' => $result]);
            }
        }
    }

    public function loginMomo($phone)
    {
        $dataMomo = Momo::where('phone', $phone)->first();
        $data_old = json_decode($dataMomo->info, true);
        $data_new = Arr::add($data_old, 'agent_id', '');
        $data_new = Arr::add($data_new, 'sessionkey', '');
        $data_new = Arr::add($data_new, 'authorization', '');
        $momo = new MomoApi();
        $result = $momo->USER_LOGIN_MSG($data_new);
        if ($result['errorCode']) {
            $data_new = Arr::set($data_new, 'Name', $result['errorDesc']);
            $data_new = Arr::set($data_new, 'balance', 0);
            $dataMomo->status = 4;
            $dataMomo->info = $data_new;
            $dataMomo->save();
            return array(
                'author' => 'DUNGA',
                'status' => 'error',
                'message' => 'Thất bại',
                'data' => array(
                    'code' => $result['errorCode'],
                    'desc' => $result['errorDesc']
                )
            );
        } else {
            $data_new = Arr::set($data_old, 'authorization', $result['extra']['AUTH_TOKEN']);
            $data_new = Arr::set($data_new, 'RSA_PUBLIC_KEY', $result['extra']['REQUEST_ENCRYPT_KEY']);
            $data_new = Arr::set($data_new, 'sessionkey', $result['extra']['SESSION_KEY']);
            $data_new = Arr::set($data_new, 'balance', $result['extra']['BALANCE']);
            $data_new = Arr::set($data_new, 'agent_id', $result['momoMsg']['agentId']);
            $data_new = Arr::set($data_new, 'BankVerify', $result['momoMsg']['bankVerifyPersonalid']);
            $data_new = Arr::set($data_new, 'Name', $result['momoMsg']['name']);
            $data_new = Arr::set($data_new, 'refreshToken', $result['extra']['REFRESH_TOKEN']);
            $dataMomo->info = $data_new;
            $dataMomo->save();
            return array(
                'status' => 'success',
                'message' => 'Đăng nhập thành công'
            );
        }
    }

    public function historyMomo($token)
    {
        $dataMomo = Momo::where('token', $token)->first();
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $result = $momo->CheckHisNew(1, $data);
        return $result;
    }

    public function historyMomoV2($token)
    {
        $dataMomo = Momo::where('token', $token)->first();
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $from = Carbon::today()->subDay(1)->format('d/m/Y');
        $to = Carbon::today()->format('d/m/Y');
        $limit = 25;
        $result = $momo->QUERY_TRAN_HIS_NEW($data, $from, $to, $limit);
        return $result;
    }

    public function getNewToken($token)
    {
        $dataMomo = Momo::where('token', $token)->first();
        if ($dataMomo->try == 5) {
            $dataMomo->status = 4;
            $dataMomo->save();
            return array('status' => 'error', 'message' => "Lỗi login nhiều lần không được", 'author' => 'DUNGA');
        }
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $result = $momo->GENERATE_TOKEN_AUTH_MSG($data);
        if ($result['errorCode'] == 0) {
            $data_old = json_decode($dataMomo->info, true);
            $data_new = Arr::set($data_old, 'authorization', $result['extra']['AUTH_TOKEN']);
            $data_new = Arr::set($data_new, 'RSA_PUBLIC_KEY', $result['extra']['REQUEST_ENCRYPT_KEY']);
            $dataMomo->try = 0;
            $dataMomo->info = $data_new;
            $dataMomo->save();
            return array('status' => 'success', 'message' => 'Thành công', 'author' => 'DUNGA');
        } else {
            $dataMomo->try = $dataMomo->try + 1;
            $dataMomo->save();
            return array('status' => 'error', 'message' => $result['errorDesc'], 'author' => 'DUNGA');
        }
    }

    public function checkMomo($phone, $receiver)
    {
        $dataMomo = Momo::where('phone', $phone)->first();
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $result = $momo->CHECK_USER_PRIVATE($receiver, $data);
        if ($result == null) {
            return array('status' => 'error', 'message' => 'Tài khoản không tồn tại hoặc chưa đăng ký momo', 'author' => 'DUNGA');
        }
        if (!empty($result['errorCode'])) {
            return array('status' => 'success', 'message' => 'Thành công', 'author' => 'DUNGA', 'name' => 'Không xác định');
        } else {
            return array('status' => 'success', 'message' => 'Thành công', 'author' => 'DUNGA', 'name' => $result['extra']['NAME']);
        }
    }

    public function sendMoneyMomo($token, $amount, $comment, $receiver)
    {
        $dataMomo = Momo::where('token', $token)->first();
        $phone = $dataMomo->phone;
        if (!$dataMomo) {
            $json = array(
                "status" => "error",
                "code" => 2005,
                "message" => "Số không có trong hệ thống"
            );
            return $json;
        }
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $name = $this->checkMomo($phone, $receiver);
        if ($name['status'] != 'success') {
            $json = array(
                "status" => "error",
                "code" => -5,
                "message" => "Đã xảy ra lỗi ở momo hoặc bạn đã hết hạn truy cập vui lòng đăng nhập lại"
            );
            HistoryBank::create([
                'phone' => $dataMomo->phone,
                'details' => json_encode($json),
                'status' => 0
            ]);
            return $json;
        } else {
            $partnerName = $name['name'];
        }
        $dataSend = array(
            'comment' => $comment,
            'amount' => $amount,
            'partnerName' => $partnerName,
            'receiver' => $receiver,
        );
        $result = $momo->M2MU_INIT($data, $dataSend);
        if (!empty($result["errorCode"]) && $result["errorDesc"] != "Lỗi cơ sở dữ liệu. Quý khách vui lòng thử lại sau") {
            $json = array(
                "status" => "error",
                "code" => $result["errorCode"],
                "message" => $result["errorDesc"]
            );
            HistoryBank::create([
                'phone' => $dataMomo->phone,
                'details' => json_encode($json),
                'status' => 0
            ]);
            return $json;
        } else if (is_null($result)) {
            $json = array(
                "status" => "error",
                "code" => -5,
                "message" => "Đã xảy ra lỗi ở momo hoặc bạn đã hết hạn truy cập vui lòng đăng nhập lại"
            );
            HistoryBank::create([
                'phone' => $dataMomo->phone,
                'details' => json_encode($json),
                'status' => 0
            ]);
            return $result;
        } else {
            $id = $result["momoMsg"]["replyMsgs"]["0"]["ID"];
            $result = $momo->M2MU_CONFIRM($id, $data, $dataSend);
            if (empty($result['errorCode'])) {
                $balance = $result["extra"]["BALANCE"];
                $tranHisMsg = $result["momoMsg"]["replyMsgs"]["0"]["tranHisMsg"];
                $data_new = Arr::set($data, 'balance', $balance);
                $dataMomo->info = $data_new;
                $dataMomo->save();
                $json = array(
                    'status' => 'success',
                    'message' => 'Thành công',
                    'author' => 'DUNGA',
                    'code' => 0,
                    'data' => array(
                        "balance" => $balance,
                        "ID" => $tranHisMsg["ID"],
                        "tranId" => $tranHisMsg["tranId"],
                        "partnerId" => $tranHisMsg["partnerId"],
                        "partnerName" => $tranHisMsg["partnerName"],
                        "amount" => $tranHisMsg["amount"],
                        "comment" => (empty($tranHisMsg["comment"])) ? "" : $tranHisMsg["comment"],
                        "status" => $tranHisMsg["status"],
                        "desc" => $tranHisMsg["desc"],
                        "ownerNumber" => $tranHisMsg["ownerNumber"],
                        "ownerName" => $tranHisMsg["ownerName"],
                        "millisecond" => $tranHisMsg["finishTime"]
                    )
                );
                HistoryBank::create([
                    'phone' => $dataMomo->phone,
                    'details' => json_encode($json),
                    'status' => 1
                ]);
                return $json;
            } else {
                $json = array(
                    'status' => 'error',
                    'author' => 'DUNGA',
                    "code" => $result["errorCode"],
                    "message" => $result["errorDesc"]
                );
                HistoryBank::create([
                    'phone' => $dataMomo->phone,
                    'details' => json_encode($json),
                    'status' => 0
                ]);
                return $json;
            }
        }
    }

    public function deleteMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            $dataMomo->delete();
            return response()->json(array('status' => 'success', 'message' => 'Xóa số momo ' . $dataMomo->phone . ' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function soakMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 4;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái hoạt động số momo ' . $dataMomo->phone . ' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function activeMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 1;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái hoạt động số momo ' . $dataMomo->phone . ' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function hideMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 2;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái ẩn số momo ' . $dataMomo->phone . ' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function maintenanceMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 0;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái bảo trì số momo ' . $dataMomo->phone . ' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function infoMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            return response()->json(array('status' => 'success', 'message' => 'Thành công', 'html' => '<form action="' . route("admin.editMomo") . '" method="POST" class="form-validate is-alter" novalidate="novalidate"> <div class="mb-4"> <input type="text" class="form-control" id="_token" name="_token" value="' . csrf_token() . '" hidden/> <label class="form-label" for="">Số MOMO</label> <input type="text" class="form-control" id="id" name="id" value="' . $dataMomo->id . '" hidden/> <input type="text" class="form-control" id="phone" name="phone" value="' . $dataMomo->phone . '"/> </div><div class="mb-4"> <label class="form-label" for="">Mật khẩu</label> <input type="password" class="form-control" id="password" name="password"/> </div><div class="mb-4"> <label class="form-label" for="">Tối thiểu</label> <input type="text" class="form-control" id="min" name="min" value="' . $dataMomo->min . '"/> </div><div class="mb-4"> <label class="form-label" for="">Tối đa</label> <input type="text" class="form-control" id="max" name="max" value="' . $dataMomo->max . '"/> </div><div class="mb-4"> <label class="form-label" for="">Proxy</label> <input type="text" class="form-control" id="proxy" name="proxy" value="' . json_decode($dataMomo->info)->proxy . '"/></div><div class="mb-4"> <div class="form-group"> <button type="submit" class="btn btn-lg btn-primary">Lưu thông tin</button> </div></div></form>'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function editMomo(Request $request)
    {
        $dataMomo = Momo::where('id', $request->id)->first();
        if ($dataMomo) {
            if ($request->password == null) {
                $data = json_decode($dataMomo->info, true);
                $data_new = Arr::set($data, 'proxy', $request->proxy);
                $dataMomo->info = $data_new;
                $dataMomo->min = $request->min;
                $dataMomo->max = $request->max;
                $dataMomo->save();
                return back()->withErrors(['status' => 'success', 'message' => 'Sửa thông tin số momo thành công']);
            } else {
                $data = json_decode($dataMomo->info, true);
                $data_new = Arr::set($data, 'proxy', $request->proxy);
                $data_new = Arr::set($data, 'password', $request->password);
                $dataMomo->info = $data_new;
                $dataMomo->min = $request->min;
                $dataMomo->max = $request->max;
                $dataMomo->save();
                return back()->withErrors(['status' => 'success', 'message' => 'Sửa thông tin số momo thành công']);
            }
        } else {
            return back()->withErrors(['status' => 'danger', 'message' => 'Số momo không có trong hệ thống']);
        }
    }

    public function loginAllMomo()
    {
        $momo = Momo::get();
        foreach ($momo as $row) {
            $dataMomo = Momo::where('id', $row->id)->first();
            if ($dataMomo->status == 3) {
                return response()->json(array('status' => 'error', 'message' => 'Số ' . $row->phone . ' chưa xác thực vui lòng xóa hoặc xác thực'));
            }
            $result = $this->loginMomo($row->phone);
            if ($result['status'] == 'error') {
                return response()->json(array('status' => 'error', 'message' => 'Số ' . $row->phone . ' ' . $result['data']['desc']));
            }
            $dataMomo->try = 0;
            $dataMomo->save();
        }
        return response()->json(array('status' => 'success', 'message' => 'Login lại tất cả thành công'));
    }

    public function checkStatusTransfer()
    {
        $momo = Momo::get();
        foreach ($momo as $row) {
            $dataMomo = Momo::where('id', $row->id)->first();
            if ($dataMomo->status == 3) {
                return response()->json(array('status' => 'error', 'message' => 'Số ' . $row->phone . ' chưa xác thực vui lòng xóa hoặc xác thực'));
            }
            $result = $this->historyMomo($row->token);
            if ($result['status'] == 'error' || $result == null) {
                return response()->json(array('status' => 'error', 'message' => 'Số ' . $row->phone . ' đã bị lỗi'));
            }
        }
        return response()->json(array('status' => 'success', 'message' => 'Trạng thái lịch sử ổn định'));
    }

    public function loginMomoOne(Request $request)
    {
        $dataMomo = Momo::where('id', $request->phone)->first();
        if ($dataMomo) {
            $result = $this->loginMomo($dataMomo->phone);
            if ($result['status'] == 'error') {
                return response()->json(array('status' => 'error', 'message' => 'Số ' . $dataMomo->phone . ' ' . $result['data']['desc']));
            } else {
                $dataMomo->try = 0;
                $dataMomo->save();
                return response()->json(array('status' => 'success', 'message' => 'Đăng nhập lại thành công'));
            }
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function sendMoney(Request $request)
    {
        $phone = $request->phoneSend;
        $dataMomo = Momo::where('phone', $phone)->first();
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:11',
            'phoneSend' => 'required|string|max:11',
            'comment' => 'required|string',
            'amount' => 'numeric|required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        if ($dataMomo) {
            if ($dataMomo->status == 3) {
                return back()->withErrors(['status' => 'danger', 'message' => 'Số momo đang được xác thực']);
            } else {
                $result = $this->sendMoneyMomo($dataMomo->token, $request->amount, $request->comment, $request->phone);
                if ($result['status'] == 'error' && empty($result)) {
                    return back()->withErrors(['status' => 'danger', 'message' => $result['message']]);
                } else {
                    return back()->withErrors(['status' => 'danger', 'message' => 'Chuyển tiền thành công ( Người nhận -> ' . $result['data']['partnerName'] . ' | Mã giao dịch -> ' . $result['data']['tranId'] . '  )']);
                }
            }
        } else {
            return back()->withErrors(['status' => 'danger', 'message' => 'Số momo không có trong hệ thống']);
        }
    }

    public function refToken()
    {
        $momo = Momo::where('status', 1)->get();
        $data = [];
        $i = 0;
        foreach ($momo as $row) {
            $dataMomo = Momo::where('id', $row->id)->first();
            if ($this->TimeSetup < (time() - $dataMomo->time_login)) {
                $response = $this->getNewToken($dataMomo->token);
                $data[$i]['status'] = $response['status'];
                $data[$i]['phone'] = $dataMomo['phone'];
                $data[$i]['message'] = $response['message'];
                $i++;
                $dataMomo->time_login = time();
                $dataMomo->save();
            } else {
                $data[$i]['status'] = 'success';
                $data[$i]['phone'] = $dataMomo['phone'];
                $data[$i]['message'] = 'Vui lòng đợi '.($this->TimeSetup - (time() - $dataMomo->time_login)). ' giây nữa';
                $i++;
            }
        }
        die(json_encode(array('author' => 'DUNGA', 'data' => $data)));
    }
}
