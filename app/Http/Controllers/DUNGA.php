<?php

namespace App\Http\Controllers;

use App\Models\GiftCode;
use App\Models\HistoryBank;
use App\Models\HistoryGift;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Http\Resources\MomoResource;
use App\Http\Resources\HistoryResource;
use App\Models\Momo;
use App\Models\Setting;
use App\Models\HistoryPlay;
use App\Models\HistoryDayMission;
use Carbon\Carbon;
use App\Models\Muster;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Http\Controllers\dgaAdmin\MomoController;

class DUNGA extends Controller
{
    public function settings()
    {

        $setting = Setting::first();

        return response()->json(array(
            'status' => true,
            'message' => 'Thành công',
            'contacts' => ContactResource::collection(Contact::where('status', 1)->get()),
            'note' => $setting->note,
            'ads' => $setting->ads,
            'active' => $setting->active,
            'history' => $setting->history,
            'only_win' => $setting->only_win,
            'limit' => $setting->limit,
            'week_top' => $setting->week_top,
            'day_top' => $setting->day_top,
            'day_mission' => $setting->day_mission,
            'hu' => $setting->hu,
            'diemdanh' => $setting->muster,
            'giftcode' => $setting->giftcode
        ));
    }

    public function momo()
    {
        $setting = Setting::first();
        $momo = Momo::where('status', '=', 1)->get();
        if ($setting->theme == 'v1') {
            $html = view('gameV1', compact('momo', 'setting'))->render();
        } else if ($setting->theme == 'v3') {
            $html = view('gameV3', compact('momo', 'setting'))->render();
        } else {
            $html = view('gameV1', compact('momo', 'setting'))->render();
        }
        return response()->json(array(
            'status' => true,
            'message' => 'Thành công',
            'data_momo' => MomoResource::collection(Momo::where('status', 1)->orWhere('status', 0)->get()),
            'game' => array(
                'active' => array('chanle2', 'chanle', 'taixiu2', 'taixiu', 'x3', 'hieu2so', 'lo', 'gap3', 'xsmb', 'xien'),
                'html' => $html
            )
        ));
    }

    public function minigame(Request $request)
    {
        $setting = Setting::first();
        if ($request->game == 'day_mission') {
            $total = HistoryDayMission::sum('receive');
            $dayLevel = explode('|', $setting->level_day);
            $day = implode(',', $dayLevel);
            $receiveLevel = explode('|', $setting->gift_day);
            $receive = implode(',', $receiveLevel);
            $gift = array();
            for ($i = 0; $i < count($receiveLevel); $i++) {
                $json = array(
                    'level' => $dayLevel[$i],
                    'gift' => $receiveLevel[$i]
                );
                array_push($gift, $json);
            }
            $day_mission = array(
                'data' => $gift
            );
            if ($setting->theme == 'v1') {
                $game = view('dayMissionV1', compact('day_mission', 'setting', 'total', 'day', 'receive'))->render();
            } else if ($setting->theme == 'v3') {
                $game = view('dayMissionV3', compact('day_mission', 'setting', 'total', 'day', 'receive'))->render();
            } else {
                $game = view('dayMissionV1', compact('day_mission', 'setting', 'total', 'day', 'receive'))->render();
            }
        }
        if ($request->game == 'diemdanh') {
            $his = Muster::where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
            if ($setting->theme == 'v1') {
                $game = view('musterV1', compact('setting', 'his'))->render();
            } else if ($setting->theme == 'v3') {
                $game = view('musterV3', compact('setting', 'his'))->render();
            } else {
                $game = view('musterV1', compact('setting', 'his'))->render();
            }

        }
        if ($request->game == 'giftcode') {
            if ($setting->theme == 'v1') {
                $game = view('giftcodeV1', compact('setting'))->render();
            } else if ($setting->theme == 'v3') {
                $game = view('giftcodeV3', compact('setting'))->render();
            } else {
                $game = view('giftcodeV1', compact('setting'))->render();
            }
        }
        return response()->json(array(
            'status' => true,
            'message' => 'Thành công',
            'html' => $game,
            'game' => $request->game
        ));
    }

    public function history()
    {
        $setting = Setting::first();
        if ($setting->only_win == 1) {
            return response()->json(array(
                'status' => true,
                'message' => 'Thành công',
                'history' => array(
                    'status' => true,
                    'message' => 'SUCCESS',
                    'data' => HistoryResource::collection(HistoryPlay::limit($setting->limit)->where('status', 1)->orderBy('id', 'DESC')->get()),
                )
            ));
        } else {
            return response()->json(array(
                'status' => true,
                'message' => 'Thành công',
                'history' => array(
                    'status' => true,
                    'message' => 'SUCCESS',
                    'data' => HistoryResource::collection(HistoryPlay::limit($setting->limit)->orderBy('id', 'DESC')->get()),
                )
            ));
        }
    }

    public function hu()
    {
        return response()->json(array(
            'status' => true,
            'message' => 'Thành công',
            'amount' => Setting::first()->amount_hu
        ));
    }

    public function checkDayMission(Request $request)
    {
        $setting = Setting::first();
        $amount = HistoryPlay::whereDate('created_at', Carbon::today())->where('partnerId', $request->phone)->sum('amount');
        $turn = HistoryDayMission::whereDate('created_at', Carbon::today())->where('phone', $request->phone)->count();
        if ($amount <= 0) {
            return response()->json(array('status' => false, 'message' => 'Oh !! Số điện thoại này chưa chơi game nào, hãy kiểm tra lại'));
        } else {
            $dayLevel = explode('|', $setting->level_day);
            $receiveLevel = explode('|', $setting->gift_day);
            for ($i = $turn; $i < count($receiveLevel); $i++) {

                $token = Momo::where('status', 1)->inRandomOrder()->first();
                if ($token) {
                    $dga_func_momo = new MomoController();

                    $response = $dga_func_momo->checkMomo($token->phone, $request->phone);

                    if ($response['status'] != 'success') {
                        $partnerName = "Không có tên";
                    } else {
                        $partnerName = $response['name'];
                    }
                } else {
                    $partnerName = "Không có tên";
                }

                return response()->json(array('status' => true, 'phone' => $request->phone, 'TongTienChoiNgay' => $amount, 'level' => count($receiveLevel) - $i, 'name' => $partnerName, 'receive' => $receiveLevel[$i], 'day' => $dayLevel[$i]));
            }
            return response()->json(array('status' => true, 'html' => 'Thành công vui lòng đợi xử lý'));
        }
    }

    public function weekTop()
    {
        $setting = Setting::first();
        $historyPLay = HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $ListSDT = [];
        $st = 0;
        foreach ($historyPLay as $row) {
            $sdt = $row->partnerId;

            $check = True;
            foreach ($ListSDT as $res) {
                if ($res == $sdt) {
                    $check = False;
                }
            }

            if ($check) {
                $ListSDT[$st] = $sdt;
                $st++;
            }
        }
        $ListUser = [];
        $dga = 0;
        foreach ($ListSDT as $row) {
            $ListUser[$dga]['phone'] = $row;
            $ListUser[$dga]['amount'] = HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['status' => 1, 'partnerId' => $row])->sum('amount');
            $dga++;
        }
        $UserTop = [];
        $st = 0;

        if ($dga > 1) {
            // Đếm tổng số phần tử của mảng
            $sophantu = count($ListUser);
            // Lặp để sắp xếp
            for ($i = 0; $i < $sophantu - 1; $i++) {
                // Tìm vị trí phần tử lớn nhất
                $max = $i;
                for ($j = $i + 1; $j < $sophantu; $j++) {
                    if ($ListUser[$j]['amount'] > $ListUser[$max]['amount']) {
                        $max = $j;
                    }
                }
                // Sau khi có vị trí lớn nhất thì hoán vị
                // với vị trí thứ $i
                $temp = $ListUser[$i];
                $ListUser[$i] = $ListUser[$max];
                $ListUser[$max] = $temp;
            }

            $UserTop = $ListUser;
        } else {
            $UserTop = $ListUser;
        }
        $gift = explode('|', $setting->gift_week);
        $UserTopTuan = [];
        $dga = 0;
        $key = 1;
        if ($setting->top_phone != null) {
            $top = explode('|', $setting->top_phone);
            $amount = explode('|', $setting->top_amount);
            for ($i = 0; $i < 5; $i++) {
                $UserTopTuan[$i]['key'] = $key++;
                $UserTopTuan[$i]['phone'] = substr($top[$i], 0, -4) . '****';
                $UserTopTuan[$i]['amount'] = $amount[$i];
                $UserTopTuan[$i]['gift'] = $gift[$i];
            }
        } else {
            foreach ($UserTop as $row) {
                if ($dga < count($gift)) {
                    if ($row['amount'] > 0) {
                        $UserTopTuan[$dga] = $row;
                        $UserTopTuan[$dga]['key'] = $key++;
                        $UserTopTuan[$dga]['phone'] = substr($row['phone'], 0, -4) . '****';
                        $UserTopTuan[$dga]['amount'] = $row['amount'];
                        $UserTopTuan[$dga]['gift'] = $gift[$dga];
                        $dga++;
                    }
                }
            }
        }
        return response()->json(array(
            'status' => true,
            'message' => 'Thành công',
            'weekTop' => array(
                'status' => true,
                'message' => 'SUCCESS',
                'data' => $UserTopTuan,
            )
        ));
    }

    public function dayTop()
    {
        $setting = Setting::first();
        $historyPLay = HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->get();
        $ListSDT = [];
        $st = 0;
        foreach ($historyPLay as $row) {
            $sdt = $row->partnerId;

            $check = True;
            foreach ($ListSDT as $res) {
                if ($res == $sdt) {
                    $check = False;
                }
            }

            if ($check) {
                $ListSDT[$st] = $sdt;
                $st++;
            }
        }
        $ListUser = [];
        $dga = 0;
        foreach ($ListSDT as $row) {
            $ListUser[$dga]['phone'] = $row;
            $ListUser[$dga]['amount'] = HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->where(['status' => 1, 'partnerId' => $row])->sum('amount');
            $dga++;
        }
        $UserTop = [];
        $st = 0;

        if ($dga > 1) {
            // Đếm tổng số phần tử của mảng
            $sophantu = count($ListUser);
            // Lặp để sắp xếp
            for ($i = 0; $i < $sophantu - 1; $i++) {
                // Tìm vị trí phần tử lớn nhất
                $max = $i;
                for ($j = $i + 1; $j < $sophantu; $j++) {
                    if ($ListUser[$j]['amount'] > $ListUser[$max]['amount']) {
                        $max = $j;
                    }
                }
                // Sau khi có vị trí lớn nhất thì hoán vị
                // với vị trí thứ $i
                $temp = $ListUser[$i];
                $ListUser[$i] = $ListUser[$max];
                $ListUser[$max] = $temp;
            }

            $UserTop = $ListUser;
        } else {
            $UserTop = $ListUser;
        }
        $gift = explode('|', $setting->gift_week);
        $UserTopNgay = [];
        $dga = 0;
        $key = 1;
        if ($setting->top_phone != null) {
            $top = explode('|', $setting->top_phone);
            $amount = explode('|', $setting->top_amount);
            for ($i = 0; $i < 5; $i++) {
                $UserTopNgay[$i]['key'] = $key++;
                $UserTopNgay[$i]['phone'] = substr($top[$i], 0, -4) . '****';
                $UserTopNgay[$i]['amount'] = $amount[$i];
                $UserTopNgay[$i]['gift'] = $gift[$i];
            }
        } else {
            foreach ($UserTop as $row) {
                if ($dga < count($gift)) {
                    if ($row['amount'] > 0) {
                        $UserTopNgay[$dga] = $row;
                        $UserTopNgay[$dga]['key'] = $key++;
                        $UserTopNgay[$dga]['phone'] = substr($row['phone'], 0, -4) . '****';
                        $UserTopNgay[$dga]['amount'] = $row['amount'];
                        $UserTopNgay[$dga]['gift'] = $gift[$dga];
                        $dga++;
                    }
                }
            }
        }
        return response()->json(array(
            'status' => true,
            'message' => 'Thành công',
            'dayTop' => array(
                'status' => true,
                'message' => 'SUCCESS',
                'data' => $UserTopNgay,
            )
        ));
    }

    public function checkTran(Request $request)
    {
        $setting = Setting::first();
        $tranId = $request->tran_id;
        $data = HistoryPlay::where('tranId', $tranId)->first();
        if (empty($data)) {
            return response()->json(array('status' => false, 'message' => 'Không tồn tại mã giao dịch này'));
        } else {
            if ($setting->refund == 1) {
                if ($data->status == 0 && $data->comment != NULL) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b> Thua cuộc </b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <button type="submit" class="btn btn-danger" onclick="DUNGA.refund()" >Hoàn tiền</button> ')));
                } else if ($data->status == 1 && $data->pay == 0) {
                    return response()->json(array('status' => true, 'data' => array('status' => true, 'message' => '<b> Chiến thắng</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: <span class="text-warning">Chờ xử lý</span> </b>')));
                } else if ($data->status == 1 && $data->pay == 1) {
                    return response()->json(array('status' => true, 'data' => array('status' => true, 'message' => '<b>Chiến thắng</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: Đã chuyển </b>')));
                } else if ($data->status == 1 && $data->pay == 100) {
                    return response()->json(array('status' => true, 'data' => array('status' => true, 'message' => '<b>Chiến thắng</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: <span class="text-warning">Vui lòng đợi đến ngày mai</span> </b>')));
                } else if ($data->status == 0 && $data->comment == NULL || $data->status == 2) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b>Thua cuộc</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: <span class="text-danger">Không có nội dung hoặc sai nội dung</span> </b> <br> <button type="submit" class="btn btn-danger" style="margin-top: 10px;" onclick="DUNGA.refund()" >Hoàn tiền</button>')));
                } else if ($data->status == 3) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b>Thua cuộc</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> <b> Trạng thái: <span class="text-danger">Sai mức cược</span> </b> <br> <button type="submit" class="btn btn-danger" style="margin-top: 10px;" onclick="DUNGA.refund()" >Hoàn tiền</button>')));
                } else if ($data->status == 4) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b>Thua cuộc</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> <b> Trạng thái: <span class="text-danger">Đã hoàn tiền</span> </b>')));
                }
            } else {
                if ($data->status == 0 && $data->comment != NULL) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b> Thua cuộc </b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> ')));
                } else if ($data->status == 1 && $data->pay == 0) {
                    return response()->json(array('status' => true, 'data' => array('status' => true, 'message' => '<b> Chiến thắng</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: <span class="text-warning">Chờ xử lý</span> </b>')));
                } else if ($data->status == 1 && $data->pay == 1) {
                    return response()->json(array('status' => true, 'data' => array('status' => true, 'message' => '<b>Chiến thắng</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: Đã chuyển </b>')));
                } else if ($data->status == 1 && $data->pay == 100) {
                    return response()->json(array('status' => true, 'data' => array('status' => true, 'message' => '<b>Chiến thắng</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: <span class="text-warning">Vui lòng đợi đến ngày mai</span> </b>')));
                } else if ($data->status == 0 && $data->comment == NULL || $data->status == 2) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b>Thua cuộc</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> Trạng thái: <span class="text-danger">Không có nội dung</span> </b>')));
                } else if ($data->status == 3) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b>Thua cuộc</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> <b> Trạng thái: <span class="text-danger">Sai mức cược</span> </b> ')));
                } else if ($data->status == 4) {
                    return response()->json(array('status' => true, 'data' => array('status' => false, 'message' => '<b>Thua cuộc</b> <br> <b> Mã gia dịch: #' . $data->tranId . ' </b> <br> <b> Tiền cược: ' . number_format($data->amount) . ' </b> <br> <b class="text-success"> Tiền nhận: ' . number_format($data->receive) . ' </b> <br> <b> Nội dung: ' . $data->comment . ' </b> <br> <b> Thời gian: ' . $data->created_at . ' </b> <hr> <b> <b> Trạng thái: <span class="text-danger">Đã hoàn tiền</span> </b>')));
                }
            }
        }
    }

    public function muster()
    {
        $setting = Setting::first();

        if ($setting->time_muter > 24) {

            $winner = Muster::where('status', 1)->orderBy('id', 'desc')->first();

            $rows = Muster::where('status', 99)->get();

            $arr = array();
            foreach ($rows as $row) {
                $arr[] = Str::mask($row->phone, '*', 4, 3);
            }

            return response()->json(array(
                'status' => true,
                'turn' => $setting->muster_turn,
                'second' => $setting->time_muter,
                'total' => array('totalUser' => Muster::where('status', 99)->count(), 'listUser' => implode(", ", $arr)),
                'winner' => Str::mask($winner->phone, '*', 4, 3)
            ));

        }

        if ($setting->time_muter <= 24) {

            $rows = Muster::where('status', 99)->get();

            $arr = array();
            foreach ($rows as $row) {
                $arr[] = Str::mask($row->phone, '*', 4, 3);
            }

            return response()->json(array(
                'status' => true,
                'turn' => $setting->muster_turn,
                'second' => $setting->time_muter,
                'total' => array('totalUser' => Muster::where('status', 99)->count(), 'listUser' => implode(", ", $arr)),
                'list' => implode("?", $arr),
            ));
        }

    }

    public function diemdanh(Request $request)
    {
        if (Setting::first()->muster == 1) {
            $phone = $request->phone;
            $data = Muster::where(['phone' => $phone, 'status' => 99])->first();
            $amount = HistoryPlay::whereDate('created_at', Carbon::today())->where('partnerId', $request->phone)->sum('amount');
            if ($amount <= 0) {
                return response()->json(array('status' => false, 'message' => 'Bạn chưa chơi game nào cả!'));
            }
            if ($data) {
                return response()->json(array('status' => false, 'message' => 'Bạn đã điểm danh cho phiên này'));
            } else {
                Muster::create([
                    'phone' => $phone,
                    'amount' => 0,
                    'status' => 99,
                    'turn' => Setting::first()->muster_turn,
                    'pay' => 1
                ]);
                return response()->json(array('status' => true, 'message' => 'Bạn đã điểm danh thành công'));
            }
        }

    }

    public function getDayMission(Request $request)
    {
        $setting = Setting::first();
        if ($setting->day_mission == 1) {

            $amount = HistoryPlay::whereDate('created_at', Carbon::today())->where('partnerId', $request->phone)->sum('amount');
            $turn = HistoryDayMission::whereDate('created_at', Carbon::today())->where('phone', $request->phone)->count();
            if ($amount <= 0) {
                return response()->json(array('status' => false, 'message' => 'Oh !! Số điện thoại này chưa chơi game nào, hãy kiểm tra lại'));
            } else {
                $dayLevel = explode('|', $setting->level_day);
                $receiveLevel = explode('|', $setting->gift_day);

                if ($amount >= $dayLevel[$turn]) {

                    $info = HistoryDayMission::create([
                        'phone' => $request->phone,
                        'amount' => $amount,
                        'level' => $dayLevel[$turn],
                        'receive' => $receiveLevel[$turn],
                        'status' => 1,
                        'pay' => 0
                    ]);

                    $token = Momo::where('status', 1)->inRandomOrder()->first()->token;

                    $dga_func_momo = new MomoController();

                    $cmt = $setting->content_day . ' ' . Str::upper(Str::random(6));

                    $res = $dga_func_momo->sendMoneyMomo($token, $receiveLevel[$turn], $cmt, $request->phone);

                    if ($res['status'] != 'success' || $res == null) { // CHUYỂN TIỀN LỖI

                        $url = route('admin.getNewToken', ['token' => $token]);
                        $res = Http::get($url)->json();

                        if ($res['status'] == 'success') {

                            $res = $dga_func_momo->sendMoneyMomo($token, $receiveLevel[$turn], $cmt, $request->phone);
                            $info->pay = 1;
                            $info->save();

                        } else {
                            $info->pay = 100;
                            $info->save();
                        }

                    } else {
                        $info->pay = 1;
                        $info->save();
                    }


                }

                return response()->json(array('status' => true, 'message' => 'Thành công vui lòng đợi xử lý'));
            }
        } else {
            return response()->json(array('status' => false, 'message' => 'Lỗi không thể thực hiện'));
        }
    }

    public function refund(Request $request)
    {
        $setting = Setting::first();
        if ($setting->refund == 1) {
            $tranId = $request->tran_id;
            $data = HistoryPlay::where('tranId', $tranId)->where('status', '!=', 4)->first();
            if (empty($data)) {
                return response()->json(array('status' => false, 'message' => 'Không tồn tại mã giao dịch này hoặc đã được hoàn'));
            } else {
                if ($setting->refund == 1) {
                    $limit = HistoryPlay::whereDate('updated_at', Carbon::now()->toDateString())->where(['partnerId' => $data->partnerId, 'status' => 4])->count();
                    if ($limit < $setting->limit_refund) {

                        $dga_func_momo = new MomoController();

                        $data->status = 4;
                        $data->save();
                        $token = Momo::where('status', 1)->inRandomOrder()->first()->token;
                        $cmt = $setting->content_refund . ' ' . $data->tranId;
                        $res = $dga_func_momo->sendMoneyMomo($token, $data->amount, $cmt, $data->partnerId);

                        if ($res['status'] != 'success' || empty($res)) { // CHUYỂN TIỀN LỖI

                            $url = route('admin.getNewToken', ['token' => $token]);
                            $res = Http::get($url)->json();

                            if ($res['status'] == 'success') {

                                $res = $dga_func_momo->sendMoneyMomo($token, $data->amount, $cmt, $data->partnerId);

                            } else {
                                $data->status = 0;
                                $data->save();
                            }

                        }

                        return response()->json(array('status' => true, 'message' => 'Đang được xử lý vui lòng đợi'));
                    } else {
                        return response()->json(array('status' => false, 'message' => 'Bạn đã đặt giới hạn hoàn tiền ngày hôm nay'));
                    }
                } else {
                    return response()->json(array('status' => false, 'message' => 'Bạn đã đặt giới hạn hoàn tiền ngày hôm nay'));
                }
            }
        } else {
            return response()->json(array('status' => false, 'message' => 'Lỗi không thể thực hiện'));
        }
    }

    public function checkGiftcode(Request $request)
    {
        $setting = Setting::first();
        $code = $request->code;
        $phone = $request->phone;
        $gift = GiftCode::where(['code' => $code, 'status' => 1])->first();
        $count_gift_day = HistoryGift::whereDate('created_at', Carbon::today()->toDateString())->where(['phone' => $phone])->count();

        $check = HistoryPlay::whereDate('created_at', Carbon::today()->toDateString())->where('partnerId', $phone)->first();

        if (!$check) {
            return response()->json(array('status' => false, 'message' => 'Vui lòng chơi 1 chơi chơi nhé'));
        }

        if ($count_gift_day >= 1) {
            return response()->json(array('status' => false, 'message' => 'Mỗi ngày chỉ được sử dụng 1 lần'));
        }

        if ($gift) {
            if ($gift->used <= 0) {
                $gift->status = 0;
                $gift->save();
                return response()->json(array('status' => false, 'message' => 'Mã không tồn tại hoặc đã hết hạn'));
            }
            $his = HistoryGift::where(['phone' => $phone, 'code' => $code])->first();
            if ($his) {
                return response()->json(array('status' => false, 'message' => 'Mã không tồn tại hoặc đã hết hạn'));
            } else {
                $data = HistoryGift::create([
                    'phone' => $phone,
                    'amount' => $gift->amount,
                    'status' => 0,
                    'code' => $gift->code
                ]);
                $token = Momo::where('status', 1)->inRandomOrder()->first()->token;
                if ($token) {

                    $cmt = $setting->content_giftcode . ' ' . Str::upper(Str::random(6));

                    $dga_func_momo = new MomoController();

                    $res = $dga_func_momo->sendMoneyMomo($token, $data->amount, $cmt, $data->phone);

                    if ($res['status'] != 'success' || empty($res)) { // CHUYỂN TIỀN LỖI

                        $url = route('admin.getNewToken', ['token' => $token]);
                        $res = Http::get($url)->json();

                        if ($res['status'] == 'success') {

                            $res = $dga_func_momo->sendMoneyMomo($token, $data->amount, $cmt, $data->phone);
                            $data->status = 1;
                            $data->save();
                            $gift->used = $gift->used - 1;
                            $gift->save();

                        } else {

                            $data->status = 0;
                            $data->save();
                        }

                    } else {
                        $data->status = 1;
                        $data->save();
                        $gift->used = $gift->used - 1;
                        $gift->save();
                    }
                }

                return response()->json(array('status' => true, 'message' => 'Đang được sử lý vui lòng đợi'));

            }
        } else {
            return response()->json(array('status' => false, 'message' => 'Mã không tồn tại hoặc đã hết hạn'));
        }
    }
}
