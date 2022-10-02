<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use App\Models\BlackList;
use Illuminate\Http\Request;
use App\Models\Momo;
use Illuminate\Support\Facades\Http;
use App\Models\HistoryPlay;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\HistoryDayMission;
use Carbon\Carbon;
use App\Models\Muster;
use App\Models\HistoryHu;
use App\Http\Controllers\dgaAdmin\MomoApi;

class MiniGame extends Controller
{

    public function logicMinigame($tranId, $comment, $game)
    {
        $setting = Setting::first();
        if ($game == 'CL') {
            $number = substr((string)$tranId, -1);
            if ($number == 0 || $number == 9) {
                $rs = 3; // THUA
            } else {
                if ($number == 2 || $number == 4 || $number == 6 || $number == 8) {
                    $rs = explode('|', $setting->contentCL)[0]; // CHẴN
                } else {
                    $rs = explode('|', $setting->contentCL)[1]; // LẺ
                }
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'CL2') {
            $number = substr((string)$tranId, -1);
            if ($number == 0 || $number == 2 || $number == 4 || $number == 6 || $number == 8) {
                $rs = explode('|', $setting->contentCL2)[0]; // CHẴN 2
            } else {
                $rs = explode('|', $setting->contentCL2)[1]; // LẺ 2
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'TX') {
            $number = substr((string)$tranId, -1);
            if ($number == 0 || $number == 9) {
                $rs = 3; // THUA
            } else {
                if ($number >= 5) {
                    $rs = explode('|', $setting->contentTX)[0]; // TÀI
                } else {
                    $rs = explode('|', $setting->contentTX)[1]; // XỈU
                }
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'TX2') {
            $number = substr((string)$tranId, -1);

            if ($number >= 5) {
                $rs = explode('|', $setting->contentTX2)[0]; // TÀI
            } else {
                $rs = explode('|', $setting->contentTX2)[1]; // XỈU
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == '1P3') {
            $number = substr((string)$tranId, -1);
            if ($number == '0') {
                $rs = explode('|', $setting->content1P3)[0]; // N0
            } else if ($number == '1' || $number == '2' || $number == '3') {
                $rs = explode('|', $setting->content1P3)[1]; // N1
            } else if ($number == '4' || $number == '5' || $number == '6') {
                $rs = explode('|', $setting->content1P3)[2]; // N2
            } else if ($number == '7' || $number == '8' || $number == '9') {
                $rs = explode('|', $setting->content1P3)[3]; // N3
            } else {
                $rs = "COCAINIT";
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'LO') {
            $number = substr((string)$tranId, -2);
            if ($number == 01 || $number == 03 || $number == 12 || $number == 19 || $number == 23 || $number == 24 || $number == 30 || $number == 33 || $number == 39 || $number == 48 || $number == 54 || $number == 55 || $number == 60 || $number == 61 || $number == 71 || $number == 77 || $number == 81 || $number == 82 || $number == 83 || $number == 67 || $number == 88 || $number == 76 || $number == 64 || $number == 79 || $number == 29 || $number == 99) {
                $rs = $setting->contentLO; // LO
            } else {
                $rs = "COCAINIT";
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'H3') {
            $number1 = substr((string)$tranId, -1);
            $number2 = substr((string)$tranId, -2, 1);
            $number = $number2 - $number1;
            if ($number == 9 || $number == 7 || $number == 5 || $number == 3) {
                $rs = $setting->contentH3; // H3
            } else {
                $rs = "COCAINIT";
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'G3') {
            $number1 = substr((string)$tranId, -2);
            $number2 = substr((string)$tranId, -3);
            if ($number1 == 02 || $number1 == 13 || $number1 == 17 || $number1 == 19 || $number1 == 21 || $number1 == 29 || $number1 == 35 || $number1 == 37 || $number1 == 47 || $number1 == 49 || $number1 == 51 || $number1 == 54 || $number1 == 57 || $number1 == 63 || $number1 == 64 || $number1 == 74 || $number1 == 83 || $number1 == 91 || $number1 == 95 || $number1 == 96) {
                $rs = $setting->contentG3; // G3
            } else if ($number1 == 66 || $number1 == 99) {
                $rs = $setting->contentG3; // G3
            } else if ($number2 == 123 || $number2 == 234 || $number2 == 456 || $number2 == 678 || $number2 == 789) {
                $rs = $setting->contentG3; // G3
            } else {
                $rs = "COCAINIT";
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'XSMB') {
            $number1 = substr((string)$tranId, -2);
            $number2 = substr((string)$tranId, -3);
            if ($number1 == 04 || $number1 == 92 || $number1 == 74 || $number1 == 65 || $number1 == 74 || $number1 == 15 || $number1 == 98 || $number1 == 33 || $number1 == 54 || $number1 == 59 || $number1 == 03 || $number1 == 87 || $number1 == 22 || $number1 == 45 || $number1 == 80 || $number1 == 52 || $number1 == 70 || $number1 == 46 || $number1 == 45 || $number1 == 33 || $number1 == 95 || $number1 == 20) {
                $rs = $setting->contentXSMB;
            } else if ($number1 == '08' || $number1 == 79 || $number1 == 83 || $number1 == 64) {
                $rs = $setting->contentXSMB;
            } else if ($number2 == 808 || $number2 == 479 || $number2 == 383 || $number2 == 364) {
                $rs = $setting->contentXSMB;
            } else {
                $rs = "COCAINIT";
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'XIEN') {
            $number = substr((string)$tranId, -1);
            if ($number == 0 || $number == 2 || $number == 4) {
                $rs = explode('|', $setting->contentXien)[0];
            } else if ($number == 5 || $number == 7 || $number == 9) {
                $rs = explode('|', $setting->contentXien)[1];
            } else if ($number == 6 || $number == 8) {
                $rs = explode('|', $setting->contentXien)[2];
            } else if ($number == 1 || $number == 3) {
                $rs = explode('|', $setting->contentXien)[3];
            } else {
                $rs = "COCAINIT";
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function XuLiMiniGame()
    {
        $dunga = Momo::where('status', 1)->orWhere('status', 2)->inRandomOrder()->get();
        $setting = Setting::first();
        $i = 0;
        foreach ($dunga as $row) {
            if ($row) {
                $url = route('admin.historyMomo', ['token' => $row->token]);
                $response = Http::get($url)->json();

                if (!empty($response['data'])) {
                    foreach ($response['data'] as $data) {
                        $comment = $data['comment'];
                        $amount = $data['amount'];
                        $partnerId = $data['patnerID'];
                        $partnerName = $data['partnerName'];
                        $tranId = $data['tranId'];
                        $history = HistoryPlay::where('tranId', $tranId)->first();
                        if (!$history && Str::upper($comment) != $setting->cmtPay) {
                            if ($setting->hu == 1) {
                                if (substr((string)$tranId, -4) == 0000 || substr((string)$tranId, -4) == 1111 || substr((string)$tranId, -4) == 2222 || substr((string)$tranId, -4) == 3333 || substr((string)$tranId, -4) == 4444 || substr((string)$tranId, -4) == 5555 || substr((string)$tranId, -4) == 6666 || substr((string)$tranId, -4) == 7777 || substr((string)$tranId, -4) == 8888 || substr((string)$tranId, -4) == 9999) {
                                    $money = $setting->amount_hu * $setting->ratioHu / 100;
                                    HistoryHu::create([
                                        'tranId' => $tranId,
                                        'phone' => $partnerId,
                                        'status' => 0,
                                        'amount' => $money
                                    ]);
                                }
                                if (substr((string)$tranId, -5) == 00000 || substr((string)$tranId, -5) == 11111 || substr((string)$tranId, -5) == 22222 || substr((string)$tranId, -5) == 33333 || substr((string)$tranId, -5) == 44444 || substr((string)$tranId, -5) == 55555 || substr((string)$tranId, -5) == 66666 || substr((string)$tranId, -4) == 77777 || substr((string)$tranId, -5) == 88888 || substr((string)$tranId, -5) == 99999) {
                                    $money = $setting->amount_hu;
                                    HistoryHu::create([
                                        'tranId' => $tranId,
                                        'phone' => $partnerId,
                                        'status' => 0,
                                        'amount' => $money
                                    ]);
                                }
                            }
                            if (Str::upper($comment) == explode('|', $setting->contentCL)[0] || Str::upper($comment) == explode('|', $setting->contentCL)[1]) { // MINIGAME CHẴN LẺ
                                $game = 'CL';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioCL; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentCL2)[0] || Str::upper($comment) == explode('|', $setting->contentCL2)[1]) { // MINIGAME CHẴN LẺ 2
                                $game = 'CL2';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioCL2; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentTX)[0] || Str::upper($comment) == explode('|', $setting->contentTX)[1]) { // MINIGAME TÀI XỈU
                                $game = 'TX';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioTX; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentTX2)[0] || Str::upper($comment) == explode('|', $setting->contentTX2)[1]) { // MINIGAME TÀI XỈU 2
                                $game = 'TX2';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioTX2; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->content1P3)[0] || Str::upper($comment) == explode('|', $setting->content1P3)[1] || Str::upper($comment) == explode('|', $setting->content1P3)[2] || Str::upper($comment) == explode('|', $setting->content1P3)[3]) { // MINIGAME 1 PHẦN 3
                                $game = '1P3';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        if ($comment != 'N0') {
                                            $receive = $amount * explode('|', $setting->ratio1P3)[0]; // TIỀN NHẬN KHI THẮN
                                        } else {
                                            $receive = $amount * explode('|', $setting->ratio1P3)[1]; // TIỀN NHẬN KHI THẮN
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentLO) { // MINIGAME LO
                                $game = 'LO';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioLO; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentH3) { // MINIGAME H3
                                $game = 'H3';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number1 = substr((string)$tranId, -1);
                                        $number2 = substr((string)$tranId, -2, 1);
                                        $number = $number2 - $number1;
                                        if ($number == 3) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[0]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number == 5) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[1]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number == 7) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[2]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number == 9) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[3]; // TIỀN NHẬN KHI THẮNG
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentG3) { // MINIGAME G3
                                $game = 'G3';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number1 = substr((string)$tranId, -2);
                                        $number2 = substr((string)$tranId, -3);
                                        if ($number1 == 02 || $number1 == 13 || $number1 == 17 || $number1 == 19 || $number1 == 21 || $number1 == 29 || $number1 == 35 || $number1 == 37 || $number1 == 47 || $number1 == 49 || $number1 == 51 || $number1 == 54 || $number1 == 57 || $number1 == 63 || $number1 == 64 || $number1 == 74 || $number1 == 83 || $number1 == 91 || $number1 == 95 || $number1 == 96) {
                                            $receive = $amount * explode('|', $setting->ratioG3)[0]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number1 == 66 || $number1 == 99) {
                                            $receive = $amount * explode('|', $setting->ratioG3)[1]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number2 == 123 || $number2 == 234 || $number2 == 456 || $number2 == 678 || $number2 == 789) {
                                            $receive = $amount * explode('|', $setting->ratioG3)[2]; // TIỀN NHẬN KHI THẮNG
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentXSMB) { // MINIGAME XSMB
                                $game = 'XSMB';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number1 = substr((string)$tranId, -2);
                                        $number2 = substr((string)$tranId, -3);
                                        if ($number1 == 04 || $number1 == 92 || $number1 == 74 || $number1 == 65 || $number1 == 74 || $number1 == 15 || $number1 == 98 || $number1 == 33 || $number1 == 54 || $number1 == 59 || $number1 == 03 || $number1 == 87 || $number1 == 22 || $number1 == 45 || $number1 == 80 || $number1 == 52 || $number1 == 70 || $number1 == 46 || $number1 == 45 || $number1 == 33 || $number1 == 95 || $number1 == 20) {
                                            $receive = $amount * explode('|', $setting->ratioXSMB)[0];
                                        } else if ($number1 == '08' || $number1 == 79 || $number1 == 83 || $number1 == 64) {
                                            $receive = $amount * explode('|', $setting->ratioXSMB)[1];
                                        } else if ($number2 == 808 || $number2 == 479 || $number2 == 383 || $number2 == 364) {
                                            $receive = $amount * explode('|', $setting->ratioXSMB)[2];
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentXien)[2] || Str::upper($comment) == explode('|', $setting->contentXien)[0] || Str::upper($comment) == explode('|', $setting->contentXien)[1] || Str::upper($comment) == explode('|', $setting->contentXien)[3]) { // MINIGAME XSMB
                                $game = 'XIEN';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number = substr((string)$tranId, -1);
                                        if ($number == 0 || $number == 2 || $number == 4) {
                                            $receive = $amount * $setting->ratioXien;
                                        } else if ($number == 5 || $number == 7 || $number == 9) {
                                            $receive = $amount * $setting->ratioXien;
                                        } else if ($number == 6 || $number == 8) {
                                            $receive = $amount * $setting->ratioXien;
                                        } else if ($number == 1 || $number == 3) {
                                            $receive = $amount * $setting->ratioXien;
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0;
                                $status = 2;
                                $pay = 1;
                                $game = 'DUNGA';
                            }
                            HistoryPlay::create([
                                'tranId' => (string)$data['tranId'],
                                'partnerName' => $partnerName,
                                'partnerId' => $partnerId,
                                'comment' => $comment,
                                'amount' => $amount,
                                'receive' => $receive,
                                'status' => $status,
                                'pay' => $pay,
                                'game' => $game,
                                'phoneSend' => $row->phone
                            ]);
                            $i++;
                        }
                    }
                }
            }
        }
        die('SUCCESS - Lay duoc ' . $i . ' MGD');
    }

    public function XuLiMiniGameV2()
    {
        $dunga = Momo::where('status', 1)->orWhere('status', 2)->inRandomOrder()->get();
        $setting = Setting::first();
        $i = 0;
        foreach ($dunga as $row) {
            if ($row) {
                $url = route('admin.historyMomoV2', ['token' => $row->token]);
                $response = Http::get($url)->json();

                if (!empty($response['data'])) {
                    foreach ($response['data'] as $data) {
                        $comment = $data['comment'];
                        $amount = $data['amount'];
                        $partnerId = $data['patnerID'];
                        $partnerName = $data['partnerName'];
                        $tranId = $data['tranId'];
                        $history = HistoryPlay::where('tranId', $tranId)->first();
                        if (!$history && Str::upper($comment) != $setting->cmtPay) {
                            if ($setting->hu == 1) {
                                if (substr((string)$tranId, -4) == 0000 || substr((string)$tranId, -4) == 1111 || substr((string)$tranId, -4) == 2222 || substr((string)$tranId, -4) == 3333 || substr((string)$tranId, -4) == 4444 || substr((string)$tranId, -4) == 5555 || substr((string)$tranId, -4) == 6666 || substr((string)$tranId, -4) == 7777 || substr((string)$tranId, -4) == 8888 || substr((string)$tranId, -4) == 9999) {
                                    $money = $setting->amount_hu * $setting->ratioHu / 100;
                                    HistoryHu::create([
                                        'tranId' => $tranId,
                                        'phone' => $partnerId,
                                        'status' => 0,
                                        'amount' => $money
                                    ]);
                                }
                                if (substr((string)$tranId, -5) == 00000 || substr((string)$tranId, -5) == 11111 || substr((string)$tranId, -5) == 22222 || substr((string)$tranId, -5) == 33333 || substr((string)$tranId, -5) == 44444 || substr((string)$tranId, -5) == 55555 || substr((string)$tranId, -5) == 66666 || substr((string)$tranId, -4) == 77777 || substr((string)$tranId, -5) == 88888 || substr((string)$tranId, -5) == 99999) {
                                    $money = $setting->amount_hu;
                                    HistoryHu::create([
                                        'tranId' => $tranId,
                                        'phone' => $partnerId,
                                        'status' => 0,
                                        'amount' => $money
                                    ]);
                                }
                            }
                            if (Str::upper($comment) == explode('|', $setting->contentCL)[0] || Str::upper($comment) == explode('|', $setting->contentCL)[1]) { // MINIGAME CHẴN LẺ
                                $game = 'CL';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioCL; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentCL2)[0] || Str::upper($comment) == explode('|', $setting->contentCL2)[1]) { // MINIGAME CHẴN LẺ 2
                                $game = 'CL2';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioCL2; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentTX)[0] || Str::upper($comment) == explode('|', $setting->contentTX)[1]) { // MINIGAME TÀI XỈU
                                $game = 'TX';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioTX; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentTX2)[0] || Str::upper($comment) == explode('|', $setting->contentTX2)[1]) { // MINIGAME TÀI XỈU 2
                                $game = 'TX2';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioTX2; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->content1P3)[0] || Str::upper($comment) == explode('|', $setting->content1P3)[1] || Str::upper($comment) == explode('|', $setting->content1P3)[2] || Str::upper($comment) == explode('|', $setting->content1P3)[3]) { // MINIGAME 1 PHẦN 3
                                $game = '1P3';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        if ($comment != 'N0') {
                                            $receive = $amount * explode('|', $setting->ratio1P3)[0]; // TIỀN NHẬN KHI THẮN
                                        } else {
                                            $receive = $amount * explode('|', $setting->ratio1P3)[1]; // TIỀN NHẬN KHI THẮN
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentLO) { // MINIGAME LO
                                $game = 'LO';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $receive = $amount * $setting->ratioLO; // TIỀN NHẬN KHI THẮN
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentH3) { // MINIGAME H3
                                $game = 'H3';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number1 = substr((string)$tranId, -1);
                                        $number2 = substr((string)$tranId, -2, 1);
                                        $number = $number2 - $number1;
                                        if ($number == 3) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[0]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number == 5) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[1]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number == 7) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[2]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number == 9) {
                                            $receive = $amount * explode('|', $setting->ratioH3)[3]; // TIỀN NHẬN KHI THẮNG
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentG3) { // MINIGAME G3
                                $game = 'G3';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number1 = substr((string)$tranId, -2);
                                        $number2 = substr((string)$tranId, -3);
                                        $gift = explode('|', $setting->ratioG3);
                                        if ($number1 == 02 || $number1 == 13 || $number1 == 17 || $number1 == 19 || $number1 == 21 || $number1 == 29 || $number1 == 35 || $number1 == 37 || $number1 == 47 || $number1 == 49 || $number1 == 51 || $number1 == 54 || $number1 == 57 || $number1 == 63 || $number1 == 64 || $number1 == 74 || $number1 == 83 || $number1 == 91 || $number1 == 95 || $number1 == 96) {
                                            $receive = $amount * explode('|', $setting->ratioG3)[0]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number1 == 66 || $number1 == 99) {
                                            $receive = $amount * explode('|', $setting->ratioG3)[1]; // TIỀN NHẬN KHI THẮNG
                                        } else if ($number2 == 123 || $number2 == 234 || $number2 == 456 || $number2 == 678 || $number2 == 789) {
                                            $receive = $amount * explode('|', $setting->ratioG3)[2]; // TIỀN NHẬN KHI THẮNG
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == $setting->contentXSMB) { // MINIGAME XSMB
                                $game = 'XSMB';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number1 = substr((string)$tranId, -2);
                                        $number2 = substr((string)$tranId, -3);
                                        if ($number1 == 04 || $number1 == 92 || $number1 == 74 || $number1 == 65 || $number1 == 74 || $number1 == 15 || $number1 == 98 || $number1 == 33 || $number1 == 54 || $number1 == 59 || $number1 == 03 || $number1 == 87 || $number1 == 22 || $number1 == 45 || $number1 == 80 || $number1 == 52 || $number1 == 70 || $number1 == 46 || $number1 == 45 || $number1 == 33 || $number1 == 95 || $number1 == 20) {
                                            $receive = $amount * explode('|', $setting->ratioXSMB)[0];
                                        } else if ($number1 == '08' || $number1 == 79 || $number1 == 83 || $number1 == 64) {
                                            $receive = $amount * explode('|', $setting->ratioXSMB)[1];
                                        } else if ($number2 == 808 || $number2 == 479 || $number2 == 383 || $number2 == 364) {
                                            $receive = $amount * explode('|', $setting->ratioXSMB)[2];
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else if (Str::upper($comment) == explode('|', $setting->contentXien)[2] || Str::upper($comment) == explode('|', $setting->contentXien)[0] || Str::upper($comment) == explode('|', $setting->contentXien)[1] || Str::upper($comment) == explode('|', $setting->contentXien)[3]) { // MINIGAME XSMB
                                $game = 'XIEN';
                                if ($amount >= $row->min && $amount <= $row->max) {
                                    if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                        $number = substr((string)$tranId, -1);
                                        if ($number == 0 || $number == 2 || $number == 4) {
                                            $receive = $amount * $setting->ratioXien;
                                        } else if ($number == 5 || $number == 7 || $number == 9) {
                                            $receive = $amount * $setting->ratioXien;
                                        } else if ($number == 6 || $number == 8) {
                                            $receive = $amount * $setting->ratioXien;
                                        } else if ($number == 1 || $number == 3) {
                                            $receive = $amount * $setting->ratioXien;
                                        }
                                        $status = 1; // THẮNG
                                        $pay = 0; // CHƯA CHUYỂN
                                    } else {
                                        $receive = 0;
                                        $status = 0; // THUA
                                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                    }
                                } else {
                                    $receive = 0; // THUA
                                    $status = 3; // GIỚI HẠN
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0;
                                $status = 2;
                                $pay = 1;
                                $game = 'DUNGA';
                            }
                            HistoryPlay::create([
                                'tranId' => (string)$data['tranId'],
                                'partnerName' => $partnerName,
                                'partnerId' => $partnerId,
                                'comment' => $comment,
                                'amount' => $amount,
                                'receive' => $receive,
                                'status' => $status,
                                'pay' => $pay,
                                'game' => $game,
                                'phoneSend' => $row->phone
                            ]);
                            $i++;
                        }
                    }
                }
            }
        }
        die('SUCCESS - Lay duoc ' . $i . ' MGD');
    }

    public function payMoneyMiniGame()
    {
        $setting = Setting::first();
        $info = HistoryPlay::where(['pay' => 0, 'status' => 1])->inRandomOrder()->first();
        if ($info) {

            $blacklist = BlackList::where('phone', $info->partnerId)->first();
            if ($blacklist) {
                die($info->tranId . ' - Người nhận bị khóa');
            }

            $token = Momo::where(['phone' => $info->phoneSend, 'status' => 1])->first();

            if ($token) {

                $token = $token->token;

                $info->pay = 1;
                $info->save();

                $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $info->receive, 'comment' => $setting->content . ' ' . $info->tranId, 'receiver' => $info->partnerId]);
                $response = Http::get($url)->json();

                if (empty($response) || $response == null) { // CHUYỂN TIỀN LỖI
                    $info->pay = 100;
                    $info->save();
                    die($info->tranId . ' - Chuyển lỗi');
                }

                if ($response["status"] == "error") { // CHUYỂN TIỀN LỖI
                    $info->pay = 100;
                    $info->save();
                    die($info->tranId . ' - Chuyển lỗi');
                }

                die($info->tranId . ' - Thành công');

            } else {
                $info->pay = 100;
                $info->save();
                die($info->tranId . ' - Chuyển lỗi');
            }
        }
    }

    public function payMoneyMiniGameError()
    {
        $setting = Setting::first();
        $info = HistoryPlay::where(['pay' => 100, 'status' => 1])->inRandomOrder()->first();
        if ($info) {

            $blacklist = BlackList::where('phone', $info->partnerId)->first();
            if ($blacklist) {
                die($info->tranId . ' - Người nhận bị khóa');
            }

            $token = Momo::where(['phone' => $info->phoneSend, 'status' => 1])->first();

            if ($token) {

                $token = $token->token;

                $info->pay = 1;
                $info->save();

                $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $info->receive, 'comment' => $setting->content . ' ' . $info->tranId, 'receiver' => $info->partnerId]);
                $response = Http::get($url)->json();

                if (empty($response) || $response == null) { // CHUYỂN TIỀN LỖI
                    $info->pay = 100;
                    $info->save();
                    die($info->tranId . ' - Chuyển lỗi');
                }

                if ($response["status"] == "error") { // CHUYỂN TIỀN LỖI
                    $info->pay = 100;
                    $info->save();
                    die($info->tranId . ' - Chuyển lỗi');
                }

                die($info->tranId . ' - Thành công');

            } else {
                $info->pay = 100;
                $info->save();
                die($info->tranId . ' - Chuyển lỗi');
            }
        }
    }

    public function payDayMission()
    {
        $setting = Setting::first();
        $history = HistoryDayMission::where(['pay' => 0, 'status' => 1])->orWhere('status', 2)->orWhere(['pay' => 100])->inRandomOrder()->first();
        $phoneNum = Momo::where('status', 1)->count();
        if ($phoneNum > 0) {
            if ($history) {

                $token = Momo::where('status', 1)->orWhere('status', 2)->inRandomOrder()->first()->token;
                $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $history->receive, 'comment' => $setting->content_day . ' ' . Str::upper(Str::random(6)), 'receiver' => $history->phone]);
                $response = Http::get($url)->json();
                if ($response['code'] == 2005) {
                    $token = Momo::where('status', 1)->inRandomOrder()->first()->token;
                    $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $history->receive, 'comment' => $setting->content_day . ' ' . Str::upper(Str::random(6)), 'receiver' => $history->phone]);
                    $res = Http::get($url)->json();
                    if ($res['status'] != 'success' || $res == null) { // CHUYỂN TIỀN LỖI
                        $history->pay = 100;
                        $history->save();
                    } else {
                        $history->pay = 1;
                        $history->save();
                    }
                }
                if ($response['status'] != 'success') { // CHUYỂN TIỀN LỖI
                    $history->pay = 100;
                    $history->save();
                } else {
                    $history->pay = 1;
                    $history->save();
                }
            }
        }
    }

    public function payHu()
    {
        $setting = Setting::first();
        $history = HistoryHu::where('status', 0)->inRandomOrder()->first();
        $phoneNum = Momo::where('status', 1)->count();
        if ($phoneNum > 0) {
            if ($history) {
                $blacklist = BlackList::where('phone', $history->phone)->first();
                if ($blacklist) {
                    die($history->tranId . ' - Người nhận bị khóa');
                }
                $history->pay = 1;
                $history->save();

                $token = Momo::where('status', 1)->orWhere('status', 2)->inRandomOrder()->first()->token;
                $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $history->amount, 'comment' => $setting->hu . ' ' . Str::upper(Str::random(6)), 'receiver' => $history->phone]);
                $response = Http::get($url)->json();

                if (empty($response) || $response == null) { // CHUYỂN TIỀN LỖI
                    $history->status = 0;
                    $history->save();
                    die($history->tranId);
                }

                if ($response["status"] == "error") { // CHUYỂN TIỀN LỖI
                    $history->status = 0;
                    $history->save();
                    die($history->tranId);
                }

                die($history->tranId);

            }
        }
    }

    public function checkStatusMomo()
    {
        $momo = Momo::where('status', 1)->get();
        foreach ($momo as $row) {
            $times = HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count();
            $amount = HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count();
            $dataMomo = Momo::where('phone', $row->phone)->first();
            if ($times >= 150 || $amount >= 30000000) {
                $dataMomo->status = 2;
                $dataMomo->save();
                $phone = Momo::where('status', 4)->inRandomOrder()->first();
                if ($phone) {
                    $phone->status = 1;
                    $phone->save();
                }
            }
        }
    }

    public function diemdanh()
    {
        $setting = Setting::first();
        if ($setting->time_muter > 0) {
            $setting->time_muter = $setting->time_muter - 5;
            $setting->save();

            $turn = $setting->muster_turn - 1;
            $rows = Muster::where('status', 99)->where('turn', $turn)->get();

            if ($rows) {
                foreach ($rows as $row) {
                    $losser = Muster::where('id', $row->id)->first();
                    $losser->status = 0;
                    $losser->pay = 1;
                    $losser->save();
                }
            }

        } else {

            $countUser = Muster::where('status', 99)->count();

            if ($countUser >= $setting->total_muster) {

                // TIỀN NHẬN CỦA PHIÊN
                $g = explode("|", $setting->amount_muster);
                $money = mt_rand($g[0], $g[1]);

                // LẤY NGƯỜI THẮNG

                $rows = Muster::where(['status' => 1, 'turn' => $setting->muster_turn])->first();

                if (!$rows) {

                    $winner = Muster::where('status', 99)->inRandomOrder()->first();
                    $winner->amount = $money;
                    $winner->status = 1;
                    $winner->pay = 0;
                    $winner->save();

                    // TRẢ TIỀN
                    $blacklist = BlackList::where('phone', $winner->phone)->first();
                    if ($blacklist) {
                        die($winner->phone . ' - Người nhận bị khóa');
                    }
                    if ($setting->pay_muster == 1) {

                        $token = Momo::where(['status' => 1])->inRandomOrder()->first()->token;
                        $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $money, 'comment' => $setting->content_muster . ' ' . Str::upper(Str::random(6)), 'receiver' => $winner->phone]);
                        $response = Http::get($url)->json();
                        if (empty($response) || $response == null) { // CHUYỂN TIỀN LỖI
                            $winner->pay = 100;
                            $winner->save();
                            die($winner->phone);
                        }

                        if ($response["status"] == "error") { // CHUYỂN TIỀN LỖI
                            $winner->pay = 100;
                            $winner->save();
                            die($winner->phone);
                        }

                        die($winner->phone);
                    }

                }

                $setting->time_muter = 600;
                $setting->save();
                $setting->muster_turn = $setting->muster_turn + 1;
                $setting->save();

                // DANH SÁCH THUA

                $rows = Muster::where(['status' => 99, 'turn' => $setting->muster_turn - 1])->get();

                if ($rows) {
                    foreach ($rows as $row) {
                        $losser = Muster::where('id', $row->id)->first();
                        $losser->status = 0;
                        $losser->save();
                    }
                }


            }

            $setting->time_muter = 600;
            $setting->save();
            $setting->muster_turn = $setting->muster_turn + 1;
            $setting->save();
        }
    }

    public function payMusterError()
    {
        $setting = Setting::first();
        $info = Muster::where(['pay' => 100, 'status' => 1])->inRandomOrder()->first();
        if ($info) {

            $blacklist = BlackList::where('phone', $info->phone)->first();
            if ($blacklist) {
                die($info->phone . ' - Người nhận bị khóa');
            }

            $token = Momo::where(['status' => 1])->orWhere(['status' => 2])->first();

            if ($token) {

                $token = $token->token;

                $info->pay = 1;
                $info->save();

                $url = route('admin.sendMoneyMomo', ['token' => $token, 'amount' => $info->amount, 'comment' => $setting->content_muster . ' ' . Str::upper(Str::random(6)), 'receiver' => $info->phone]);
                $response = Http::get($url)->json();

                if (empty($response) || $response == null) { // CHUYỂN TIỀN LỖI
                    $info->pay = 100;
                    $info->save();
                    die($info->phone);
                }

                if ($response["status"] == "error") { // CHUYỂN TIỀN LỖI
                    $info->pay = 100;
                    $info->save();
                    die($info->phone);
                }

                die($info->phone);

            }
        }
    }

    public function checkTransId()
    {
        $setting = Setting::first();
        $phone = $_GET['phone'];
        $transId = $_GET['transId'];
        $dataMomo = Momo::query()->where('phone', $phone)->first();
        $dga_momo_func = new MomoApi();
        $resultTrans = $dga_momo_func->GET_TRANS_BY_TID(json_decode($dataMomo->info, true), $transId);
        if (!empty($resultTrans)) {
            $dataTransId = json_decode($resultTrans['momoMsg']['serviceData'], true);
            $return = array(
                "tranId" => empty($dataTransId["TRANS_ID"]) ? "" : $dataTransId["TRANS_ID"],
                "io" => empty($resultTrans['momoMsg']["io"]) ? "" : $resultTrans['momoMsg']["io"],
                "partnerName" => empty($resultTrans['momoMsg']["sourceName"]) ? "" : $resultTrans['momoMsg']["sourceName"],
                "patnerID" => empty($dataTransId["OWNER_NUMBER"]) ? "" : $dataTransId["OWNER_NUMBER"],
                "amount" => empty($resultTrans['momoMsg']["totalAmount"]) ? 0 : $resultTrans['momoMsg']["totalAmount"],
                "comment" => (!empty($dataTransId["COMMENT_VALUE"])) ? $dataTransId["COMMENT_VALUE"] : "",
                "millisecond" => empty($resultTrans['momoMsg']["createdAt"]) ? 0 : $resultTrans['momoMsg']["createdAt"]
            );
            $comment = $return['comment'];
            $amount = $return['amount'];
            $partnerId = $return['patnerID'];
            $partnerName = $return['partnerName'];
            $tranId = $return['tranId'];
            $history = HistoryPlay::where('tranId', $tranId)->first();
            if (!$history && Str::upper($comment) != $setting->cmtPay) {
                if ($setting->hu == 1) {
                    if (substr((string)$tranId, -4) == 0000 || substr((string)$tranId, -4) == 1111 || substr((string)$tranId, -4) == 2222 || substr((string)$tranId, -4) == 3333 || substr((string)$tranId, -4) == 4444 || substr((string)$tranId, -4) == 5555 || substr((string)$tranId, -4) == 6666 || substr((string)$tranId, -4) == 7777 || substr((string)$tranId, -4) == 8888 || substr((string)$tranId, -4) == 9999) {
                        $money = $setting->amount_hu * $setting->ratioHu / 100;
                        HistoryHu::create([
                            'tranId' => $tranId,
                            'phone' => $partnerId,
                            'status' => 0,
                            'amount' => $money
                        ]);
                    }
                    if (substr((string)$tranId, -5) == 00000 || substr((string)$tranId, -5) == 11111 || substr((string)$tranId, -5) == 22222 || substr((string)$tranId, -5) == 33333 || substr((string)$tranId, -5) == 44444 || substr((string)$tranId, -5) == 55555 || substr((string)$tranId, -5) == 66666 || substr((string)$tranId, -4) == 77777 || substr((string)$tranId, -5) == 88888 || substr((string)$tranId, -5) == 99999) {
                        $money = $setting->amount_hu;
                        HistoryHu::create([
                            'tranId' => $tranId,
                            'phone' => $partnerId,
                            'status' => 0,
                            'amount' => $money
                        ]);
                    }
                }
                if (Str::upper($comment) == explode('|', $setting->contentCL)[0] || Str::upper($comment) == explode('|', $setting->contentCL)[1]) { // MINIGAME CHẴN LẺ
                    $game = 'CL';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $receive = $amount * $setting->ratioCL; // TIỀN NHẬN KHI THẮN
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == explode('|', $setting->contentCL2)[0] || Str::upper($comment) == explode('|', $setting->contentCL2)[1]) { // MINIGAME CHẴN LẺ 2
                    $game = 'CL2';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $receive = $amount * $setting->ratioCL2; // TIỀN NHẬN KHI THẮN
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == explode('|', $setting->contentTX)[0] || Str::upper($comment) == explode('|', $setting->contentTX)[1]) { // MINIGAME TÀI XỈU
                    $game = 'TX';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $receive = $amount * $setting->ratioTX; // TIỀN NHẬN KHI THẮN
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == explode('|', $setting->contentTX2)[0] || Str::upper($comment) == explode('|', $setting->contentTX2)[1]) { // MINIGAME TÀI XỈU 2
                    $game = 'TX2';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $receive = $amount * $setting->ratioTX2; // TIỀN NHẬN KHI THẮN
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == explode('|', $setting->content1P3)[0] || Str::upper($comment) == explode('|', $setting->content1P3)[1] || Str::upper($comment) == explode('|', $setting->content1P3)[2] || Str::upper($comment) == explode('|', $setting->content1P3)[3]) { // MINIGAME 1 PHẦN 3
                    $game = '1P3';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            if ($comment != 'N0') {
                                $receive = $amount * explode('|', $setting->ratio1P3)[0]; // TIỀN NHẬN KHI THẮN
                            } else {
                                $receive = $amount * explode('|', $setting->ratio1P3)[1]; // TIỀN NHẬN KHI THẮN
                            }
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == $setting->contentLO) { // MINIGAME LO
                    $game = 'LO';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $receive = $amount * $setting->ratioLO; // TIỀN NHẬN KHI THẮN
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == $setting->contentH3) { // MINIGAME H3
                    $game = 'H3';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $number1 = substr((string)$tranId, -1);
                            $number2 = substr((string)$tranId, -2, 1);
                            $number = $number2 - $number1;
                            if ($number == 3) {
                                $receive = $amount * explode('|', $setting->ratioH3)[0]; // TIỀN NHẬN KHI THẮNG
                            } else if ($number == 5) {
                                $receive = $amount * explode('|', $setting->ratioH3)[1]; // TIỀN NHẬN KHI THẮNG
                            } else if ($number == 7) {
                                $receive = $amount * explode('|', $setting->ratioH3)[2]; // TIỀN NHẬN KHI THẮNG
                            } else if ($number == 9) {
                                $receive = $amount * explode('|', $setting->ratioH3)[3]; // TIỀN NHẬN KHI THẮNG
                            }
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == $setting->contentG3) { // MINIGAME G3
                    $game = 'G3';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $number1 = substr((string)$tranId, -2);
                            $number2 = substr((string)$tranId, -3);
                            if ($number1 == 02 || $number1 == 13 || $number1 == 17 || $number1 == 19 || $number1 == 21 || $number1 == 29 || $number1 == 35 || $number1 == 37 || $number1 == 47 || $number1 == 49 || $number1 == 51 || $number1 == 54 || $number1 == 57 || $number1 == 63 || $number1 == 64 || $number1 == 74 || $number1 == 83 || $number1 == 91 || $number1 == 95 || $number1 == 96) {
                                $receive = $amount * explode('|', $setting->ratioG3)[0]; // TIỀN NHẬN KHI THẮNG
                            } else if ($number1 == 66 || $number1 == 99) {
                                $receive = $amount * explode('|', $setting->ratioG3)[1]; // TIỀN NHẬN KHI THẮNG
                            } else if ($number2 == 123 || $number2 == 234 || $number2 == 456 || $number2 == 678 || $number2 == 789) {
                                $receive = $amount * explode('|', $setting->ratioG3)[2]; // TIỀN NHẬN KHI THẮNG
                            }
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == $setting->contentXSMB) { // MINIGAME XSMB
                    $game = 'XSMB';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $number1 = substr((string)$tranId, -2);
                            $number2 = substr((string)$tranId, -3);
                            if ($number1 == 04 || $number1 == 92 || $number1 == 74 || $number1 == 65 || $number1 == 74 || $number1 == 15 || $number1 == 98 || $number1 == 33 || $number1 == 54 || $number1 == 59 || $number1 == 03 || $number1 == 87 || $number1 == 22 || $number1 == 45 || $number1 == 80 || $number1 == 52 || $number1 == 70 || $number1 == 46 || $number1 == 45 || $number1 == 33 || $number1 == 95 || $number1 == 20) {
                                $receive = $amount * explode('|', $setting->ratioXSMB)[0];
                            } else if ($number1 == '08' || $number1 == 79 || $number1 == 83 || $number1 == 64) {
                                $receive = $amount * explode('|', $setting->ratioXSMB)[1];
                            } else if ($number2 == 808 || $number2 == 479 || $number2 == 383 || $number2 == 364) {
                                $receive = $amount * explode('|', $setting->ratioXSMB)[2];
                            }
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else if (Str::upper($comment) == explode('|', $setting->contentXien)[2] || Str::upper($comment) == explode('|', $setting->contentXien)[0] || Str::upper($comment) == explode('|', $setting->contentXien)[1] || Str::upper($comment) == explode('|', $setting->contentXien)[3]) { // MINIGAME XSMB
                    $game = 'XIEN';
                    if ($amount >= $dataMomo->min && $amount <= $dataMomo->max) {
                        if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                            $number = substr((string)$tranId, -1);
                            if ($number == 0 || $number == 2 || $number == 4) {
                                $receive = $amount * $setting->ratioXien;
                            } else if ($number == 5 || $number == 7 || $number == 9) {
                                $receive = $amount * $setting->ratioXien;
                            } else if ($number == 6 || $number == 8) {
                                $receive = $amount * $setting->ratioXien;
                            } else if ($number == 1 || $number == 3) {
                                $receive = $amount * $setting->ratioXien;
                            }
                            $status = 1; // THẮNG
                            $pay = 0; // CHƯA CHUYỂN
                        } else {
                            $receive = 0;
                            $status = 0; // THUA
                            $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                        }
                    } else {
                        $receive = 0; // THUA
                        $status = 3; // GIỚI HẠN
                        $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                    }
                } else {
                    $receive = 0;
                    $status = 2;
                    $pay = 1;
                    $game = 'DUNGA';
                }
                HistoryPlay::create([
                    'tranId' => (string)$return['tranId'],
                    'partnerName' => $partnerName,
                    'partnerId' => $partnerId,
                    'comment' => $comment,
                    'amount' => $amount,
                    'receive' => $receive,
                    'status' => $status,
                    'pay' => $pay,
                    'game' => $game,
                    'phoneSend' => $dataMomo->phone
                ]);
            }
            return response()->json(array('phone' => $dataMomo->phone, 'status' => 'success', 'data' => $return));
        } else {
            return response()->json(array('phone' => $dataMomo->phone, 'status' => 'error', 'message' => 'Không thể kiểm tra mã giao dịch'));
        }
    }

}
