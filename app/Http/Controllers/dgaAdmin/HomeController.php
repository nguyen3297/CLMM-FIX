<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use App\Models\BlackList;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\HistoryPlay;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;
use App\Models\Contact;

class HomeController extends Controller
{
    public function home()
    {
        $setting = Setting::first();

        if (empty($_GET['date'])) {
            $total = array(
                'turnWin' => HistoryPlay::where('status', 1)->count(),
                'turnLose' => HistoryPlay::where('status', 0)->count(),
                // DOANH THU HIỆN TẠI
                'today' => (HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->sum('amount')) - (HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->sum('receive')),
                'month' => (HistoryPlay::whereMonth('created_at', date('m'))->sum('amount')) - (HistoryPlay::whereMonth('created_at', date('m'))->sum('receive')),
                'lastDay' => (HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('amount')) - (HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('receive')),
                //ALL
                'amountSendALLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->sum('receive'),
                'amountSendALLlastDay' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('receive'),
                'amountALLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->sum('amount'),
                'amountALLlastDay' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('amount'),
                // 'turnLoseALLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['status' => 0])->count(),
                // 'turnWinALLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['status' => 1])->count(),
                // 'amountSendALLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('receive'),
                // 'amountALLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['status' => 0])->sum('amount'),
                // 'turnLoseALLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['status' => 0])->count(),
                // 'turnWinALLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['status' => 1])->count(),
                'amountSendALLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->sum('receive'),
                'amountALLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->sum('amount'),
                // 'turnLoseALLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['status' => 0])->count(),
                // 'turnWinALLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['status' => 1])->count(),
                // //CHANLE
                // 'amountSendCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL')->sum('receive'),
                // 'amountCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL')->sum('amount'),
                // 'turnLoseCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL', 'status' => 0])->count(),
                // 'turnWinCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL', 'status' => 1])->count(),
                // 'amountSendCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'CL')->sum('receive'),
                // 'amountCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL', 'status' => 0])->sum('amount'),
                // 'turnLoseCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL', 'status' => 0])->count(),
                // 'turnWinCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL', 'status' => 1])->count(),
                // 'amountSendCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'CL')->sum('receive'),
                // 'amountCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL', 'status' => 0])->sum('amount'),
                // 'turnLoseCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL', 'status' => 0])->count(),
                // 'turnWinCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL', 'status' => 1])->count(),
                // // CHANLE2
                // 'amountSendCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL2')->sum('receive'),
                // 'amountCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL2')->sum('amount'),
                // 'turnLoseCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL2', 'status' => 0])->count(),
                // 'turnWinCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL2', 'status' => 1])->count(),
                // 'amountSendCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'CL2')->sum('receive'),
                // 'amountCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL2', 'status' => 0])->sum('amount'),
                // 'turnLoseCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL2', 'status' => 0])->count(),
                // 'turnWinCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL2', 'status' => 1])->count(),
                // // TÀI XỈU
                // 'amountSendTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX')->sum('receive'),
                // 'amountTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX')->sum('amount'),
                // 'turnLoseTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX', 'status' => 0])->count(),
                // 'turnWinTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX', 'status' => 1])->count(),
                // 'amountSendTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'TX')->sum('receive'),
                // 'amountTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX', 'status' => 0])->sum('amount'),
                // 'turnLoseTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX', 'status' => 0])->count(),
                // 'turnWinTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX', 'status' => 1])->count(),
                // // TÀI XỈU 2
                // 'amountSendTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX2')->sum('receive'),
                // 'amountTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX2')->sum('amount'),
                // 'turnLoseTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX2', 'status' => 0])->count(),
                // 'turnWinTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX2', 'status' => 1])->count(),
                // 'amountSendTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'TX2')->sum('receive'),
                // 'amountTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX2', 'status' => 0])->sum('amount'),
                // 'turnLoseTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX2', 'status' => 0])->count(),
                // 'turnWinTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX2', 'status' => 1])->count(),
                // // 1 Phần 3
                // 'amountSend1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', '1P3')->sum('receive'),
                // 'amount1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', '1P3')->sum('amount'),
                // 'turnLose1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => '1P3', 'status' => 0])->count(),
                // 'turnWin1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => '1P3', 'status' => 1])->count(),
                // 'amountSend1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', '1P3')->sum('receive'),
                // 'amount1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => '1P3', 'status' => 0])->sum('amount'),
                // 'turnLose1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => '1P3', 'status' => 0])->count(),
                // 'turnWin1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => '1P3', 'status' => 1])->count(),
                // // GẤP 3
                // 'amountSendG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'G3')->sum('receive'),
                // 'amountG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'G3')->sum('amount'),
                // 'turnLoseG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'G3', 'status' => 0])->count(),
                // 'turnWinG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'G3', 'status' => 1])->count(),
                // 'amountSendG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'G3')->sum('receive'),
                // 'amountG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'G3', 'status' => 0])->sum('amount'),
                // 'turnLoseG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'G3', 'status' => 0])->count(),
                // 'turnWinG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'G3', 'status' => 1])->count(),
                // // H3
                // 'amountSendH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'H3')->sum('receive'),
                // 'amountH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'H3')->sum('amount'),
                // 'turnLoseH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'H3', 'status' => 0])->count(),
                // 'turnWinH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'H3', 'status' => 1])->count(),
                // 'amountSendH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'H3')->sum('receive'),
                // 'amountH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'H3', 'status' => 0])->sum('amount'),
                // 'turnLoseH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'H3', 'status' => 0])->count(),
                // 'turnWinH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'H3', 'status' => 1])->count(),
                // // LO
                // 'amountSendLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'LO')->sum('receive'),
                // 'amountLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'LO')->sum('amount'),
                // 'turnLoseLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'LO', 'status' => 0])->count(),
                // 'turnWinLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'LO', 'status' => 1])->count(),
                // 'amountSendLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'LO')->sum('receive'),
                // 'amountLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'LO', 'status' => 0])->sum('amount'),
                // 'turnLoseLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'LO', 'status' => 0])->count(),
                // 'turnWinLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'LO', 'status' => 1])->count(),
                // 'amountSendLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'LO')->sum('receive'),
                // 'amountLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'LO', 'status' => 0])->sum('amount'),
                // 'turnLoseLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'LO', 'status' => 0])->count(),
                // 'turnWinLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'LO', 'status' => 1])->count(),
                // // XIÊN
                // 'amountSendXienDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'XIEN')->sum('receive'),
                // 'amountXienDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'XIEN')->sum('amount'),
                // 'turnLoseXienDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'XIEN', 'status' => 0])->count(),
                // 'turnWinXienDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'XIEN', 'status' => 1])->count(),
                // 'amountSendXienMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'XIEN')->sum('receive'),
                // 'amountXienMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'XIEN', 'status' => 0])->sum('amount'),
                // 'turnLoseXienMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'XIEN', 'status' => 0])->count(),
                // 'turnWinXienMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'XIEN', 'status' => 1])->count(),
                // // XSMB
                // 'amountSendXSMBDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'XSMB')->sum('receive'),
                // 'amountXSMBDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'XSMB')->sum('amount'),
                // 'turnLoseXSMBDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'XSMB', 'status' => 0])->count(),
                // 'turnWinXSMBDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'XSMB', 'status' => 1])->count(),
                // 'amountSendXSMBMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'XSMB')->sum('receive'),
                // 'amountXSMBMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'XSMB', 'status' => 0])->sum('amount'),
                // 'turnLoseXSMBMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'XSMB', 'status' => 0])->count(),
                // 'turnWinXSMBMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'XSMB', 'status' => 1])->count(),
            );
        } else {
            $date = $_GET['date'];
            $total = array(
                'amount' => HistoryPlay::sum('amount'),
             //   'amountWin' => HistoryPlay::where('status', 1)->sum('amount'),
            //    'amountLose' => HistoryPlay::where('status', 0)->sum('amount'),
                'amountSend' => HistoryPlay::sum('receive'),
                'turnWin' => HistoryPlay::where('status', 1)->count(),
                'turnLose' => HistoryPlay::where('status', 0)->count(),
                // DOANH THU HIỆN TẠI
                'today' => (HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->sum('amount')) - (HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->sum('receive')),
              //  'week' => (HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount')) - (HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('receive')),
                'month' => (HistoryPlay::whereMonth('created_at', date('m'))->sum('amount')) - (HistoryPlay::whereMonth('created_at', date('m'))->sum('receive')),
                'lastDay' => (HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('amount')) - (HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('receive')),
              //  'lastWeek' => (HistoryPlay::whereBetween('created_at', [Carbon::now()->subWeek(1)->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount')) - (HistoryPlay::whereBetween('created_at', [Carbon::now()->subWeek(1)->startOfWeek(1), Carbon::now()->subWeek(1)->endOfWeek()])->sum('receive')),
                'lastMonth' => (HistoryPlay::whereMonth('created_at', Carbon::now()->subMonth(1)->format('m'))->sum('amount')) - (HistoryPlay::whereMonth('created_at', Carbon::now()->subMonth(1)->format('m'))->sum('receive')),
                //ALL
                'amountSendALLDay' => HistoryPlay::whereDate('created_at', $date)->sum('receive'),
                'amountALLDay' => HistoryPlay::whereDate('created_at', $date)->sum('amount'),
                'amountSendALLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->sum('receive'),
                'amountALLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['status' => 0])->sum('amount'),
                'amountALLlastDay' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('amount'),
                'amountSendALLlastDay' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('receive'),
            );
        }

        
        
        // THÁNG NÀY SỐ NGƯỜI CHƠI
        $historyMonth = HistoryPlay::whereMonth('created_at', date('m'))->get();
        $ListSDTMonth = [];
        $st = 0;
        foreach ($historyMonth as $row) {
            $sdt = $row->partnerId;

            $check = True;
            foreach ($ListSDTMonth as $res) {
                if ($res == $sdt) {
                    $check = False;
                }
            }

            if ($check) {
                $ListSDTMonth[$st] = $sdt;
                $st++;
            }
        }

        $ListUserMonth = [];
        $dga = 0;
        foreach ($ListSDTMonth as $row) {
            $ListUserMonth[$dga]['phone'] = $row;
            $ListUserMonth[$dga]['amountWin'] = HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['status' => 1, 'partnerId' => $row])->sum('receive');
            $ListUserMonth[$dga]['turnWin'] = HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['status' => 1, 'partnerId' => $row])->count();
            $ListUserMonth[$dga]['amountLose'] = HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['status' => 0, 'partnerId' => $row])->sum('amount');
            $ListUserMonth[$dga]['turnLose'] = HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['status' => 0, 'partnerId' => $row])->count();
            $ListUserMonth[$dga]['amountAll'] = HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['partnerId' => $row])->sum('amount');
            $ListUserMonth[$dga]['doanhthu'] = (HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['partnerId' => $row])->sum('amount')) - (HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['status' => 1, 'partnerId' => $row])->sum('receive')); 
            $ListUserMonth[$dga]['turnAll'] = HistoryPlay::whereMonth('created_at', Carbon::now()->format('m'))->where(['partnerId' => $row])->count();
            $dga++;
        }
        $UserTopMonth = [];
        $st = 0;
        if ($dga > 1) {
            // Đếm tổng số phần tử của mảng
            $sophantu = count($ListUserMonth);
            // Lặp để sắp xếp
            for ($i = 0; $i < $sophantu - 1; $i++) {
                // Tìm vị trí phần tử lớn nhất
                $max = $i;
                for ($j = $i + 1; $j < $sophantu; $j++) {
                    if ($ListUserMonth[$j]['amountAll'] > $ListUserMonth[$max]['amountAll']) {
                        $max = $j;
                    }
                }
                // Sau khi có vị trí lớn nhất thì hoán vị
                // với vị trí thứ $i
                $temp = $ListUserMonth[$i];
                $ListUserMonth[$i] = $ListUserMonth[$max];
                $ListUserMonth[$max] = $temp;
            }

            $UserTopMonth = $ListUserMonth;
        } else {
            $UserTopMonth = $ListUserMonth;
        }
        return view('dgaAdmin.home', compact('setting', 'total', 'UserTopMonth'));
//        dd($UserTop);
    }

    public function setting()
    {
        $setting = Setting::first();
        return view('dgaAdmin.setting', compact('setting'));
    }

    public function settingGame()
    {
        $setting = Setting::first();
        return view('dgaAdmin.settingGame', compact('setting'));
    }

    public function settingEdit(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->all());
        return redirect()->back();
    }

    public function settingGamePost(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->all());
        return redirect()->back();
    }

    public function changePass()
    {
        $setting = Setting::first();
        return view('dgaAdmin.changePass', compact('setting'));
    }

    public function changePassPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldpass' => 'required|string',
            'newpass' => 'required|string',
            'confpass' => 'required|string'
        ]);
        if ($validator->fails()) {
            return back()->withErrors(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        if (!(Hash::check($request->oldpass, Auth::user()->password))) {
            return back()->withErrors(array('status' => 'error', 'message' => 'Mật khẩu cũ không chính xác'));
        }
        if ($request->newpass != $request->confpass) {
            return back()->withErrors(array('status' => 'error', 'message' => 'Nhập lại mật khẩu không chính xác'));
        }

        $user = Auth::user();
        $user->password = bcrypt($request->newpass);
        $user->save();
        return back()->withErrors(array('status' => 'error', 'message' => 'Đổi mật khẩu thành công'));
    }

    public function update()
    {
        define('filename', Str::random(6) . '.zip');
        define('serverfile', 'https://client.ngtiendungg.com/clmmUpdate.zip');

        // TIẾN HÀNH TẢI BẢN CẬP NHẬT TỪ SERVER VỀ
        file_put_contents('../' . filename, file_get_contents(serverfile));

        $file = filename;
        $path = pathinfo(realpath('../' . $file), PATHINFO_DIRNAME);
        $zip = new ZipArchive;
        $res = $zip->open('../' . $file);
        if ($res == true) {
            $zip->extractTo($path);
            $zip->close();
            unlink('../' . $file);
            return response()->json(array('status' => 'success', 'message' => 'Cập nhật phiên bản mới thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Không thể cập nhật phiên bản mới'));
        }
    }

    public function support()
    {
        $setting = Setting::first();
        $support = Contact::get();
        return view('dgaAdmin.support', compact('setting', 'support'));
    }

    public function supportPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'href' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        Contact::create([
            'name' => $request->name,
            'href' => $request->href,
            'status' => 1
        ]);
        return back()->withErrors(array('status' => 'error', 'message' => 'Thêm link hỗ trợ thành công'));
    }

    public function supportEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'href' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $data = Contact::where('id', $request->id)->first();
        if ($data) {
            $data->name = $request->name;
            $data->href = $request->href;
            $data->save();
            return response()->json(array('status' => 'success', 'message' => 'Sửa link hỗ trợ thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Lỗi vui lòng load lại trạng hoặc không chỉnh mục id'));
        }
    }

    public function supportStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'type' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $data = Contact::where('id', $request->id)->first();
        if ($request->type == 'delete' && $data) {
            $data->delete();
            return response()->json(array('status' => 'success', 'message' => 'Xóa link hỗ trợ thành công'));
        } else if ($request->type == 'show' && $data) {
            $data->status = 1;
            $data->save();
            return response()->json(array('status' => 'success', 'message' => 'Hiện link hỗ trợ thành công'));
        } else if ($request->type == 'hidden' && $data) {
            $data->status = 0;
            $data->save();
            return response()->json(array('status' => 'success', 'message' => 'Ẩn link hỗ trợ thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Link hỗ trợ không tồn tại'));
        }
    }

    public function blackList() {
        $setting = Setting::first();
        $lists = BlackList::get();
        return view('dgaAdmin.blackList', compact('setting', 'lists'));
    }

    public function blackListPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'list_momo' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $success = 0;
        $error = 0;
        $list = explode(PHP_EOL, $request->list_momo);
        foreach ($list as $momo) {
            $phone = BlackList::where('phone', $momo)->first();
            if (!$phone) {
                BlackList::create([
                   'phone' => $momo
                ]);
                $success++;
            } else {
                $error++;
            }
        }
        return back()->withErrors(array('status' => 'error', 'message' => 'Đã thêm '.$success.' số vào danh sách đen và bị trùng '.$error.' số'));
    }

    public function deleteMomoBlack(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $data = BlackList::where('id', $request->phone)->first();
        if ($data) {
            $data->delete();
            return response()->json(array('status' => 'success', 'message' => 'Xóa số momo khỏi black list thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không tồn tại'));
        }
    }

}
