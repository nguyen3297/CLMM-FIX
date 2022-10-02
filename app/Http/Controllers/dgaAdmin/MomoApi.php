<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MomoApi extends Controller
{

    private $keys;

    private $rsa;

    private $URLAction = array(
        "CHECK_USER_BE_MSG" => "https://api.momo.vn/backend/auth-app/public/CHECK_USER_BE_MSG", //Check người dùng
        "SEND_OTP_MSG" => "https://api.momo.vn/backend/otp-app/public/SEND_OTP_MSG", //Gửi OTP
        "REG_DEVICE_MSG" => "https://api.momo.vn/backend/otp-app/public/REG_DEVICE_MSG", // Xác minh OTP
        "QUERY_TRAN_HIS_MSG" => "https://owa.momo.vn/api/QUERY_TRAN_HIS_MSG", // Check ls giao dịch
        "USER_LOGIN_MSG" => "https://owa.momo.vn/public/login", // Đăng Nhập
        "QUERY_TRAN_HIS_MSG_NEW" => "https://m.mservice.io/hydra/v2/user/noti", // check ls giao dịch
        "M2MU_INIT" => "https://owa.momo.vn/api/M2MU_INIT", // Chuyển tiền
        "M2MU_CONFIRM" => "https://owa.momo.vn/api/M2MU_CONFIRM", // Chuyển tiền
        "LOAN_MSG" => "https://owa.momo.vn/api/LOAN_MSG", // yêu cầu chuyển tiền
        'CHECK_USER_PRIVATE' => 'https://owa.momo.vn/api/CHECK_USER_PRIVATE', // Check người dùng ẩn
        "QUERY_TRAN_HIS_NEW" => "https://api.momo.vn/sync/transhis/browse",
        'GET_TRANS_BY_TID02' => 'https://api.momo.vn/sync/transhis/details',
        "GET_TRANS_BY_TID_OLD" => "https://owa.momo.vn/api/GET_TRANS_BY_TID",
        "GENERATE_TOKEN_AUTH_MSG" => "https://api.momo.vn/backend/auth-app/public/GENERATE_TOKEN_AUTH_MSG",
    );

    private $momo_data_config = array(
        "appVer" => 31161,
        "appCode" => "3.1.16"

    );

    public function SendOTP($data)
    {
        $result = $this->SEND_OTP_MSG($data);
        if ($result["errorCode"] != 0) {
            return array(
                "status" => "error",
                "code" => $result["errorCode"],
                "message" => $result["errorDesc"]
            );
        } else {
            return array(
                "status" => "success",
                "message" => "Thành công"
            );
        }
        return $result;
    }

    private function SEND_OTP_MSG($data)
    {
        $proxy = $data['proxy'];
        $header = array(
            "agent_id: undefined",
            "sessionkey:",
            "user_phone: undefined",
            "authorization: Bearer undefined",
            "msgtype: SEND_OTP_MSG",
            "Host: api.momo.vn",
            "User-Agent: okhttp/3.14.17",
            "app_version: " . $this->momo_data_config["appVer"],
            "app_code: " . $this->momo_data_config["appCode"],
            "device_os: Android"
        );
        $microtime = $this->get_microtime();
        $Data = array(
            'user' => $data['phone'],
            'msgType' => 'SEND_OTP_MSG',
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => $microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    '_class' => 'mservice.backend.entity.msg.RegDeviceMsg',
                    'number' => $data['phone'],
                    'imei' => $data["imei"],
                    'cname' => 'Vietnam',
                    'ccode' => '084',
                    'device' => $data["device"],
                    'firmware' => '23',
                    'hardware' => $data["hardware"],
                    'manufacture' => $data["facture"],
                    'csp' => '',
                    'icc' => '',
                    'mcc' => '452',
                    'device_os' => 'Android',
                    'secure_id' => $data['SECUREID'],
                ),
            'extra' =>
                array(
                    'action' => 'SEND',
                    'rkey' => $data["rkey"],
                    'AAID' => $data["AAID"],
                    'IDFA' => '',
                    'TOKEN' => $data["TOKEN"],
                    'SIMULATOR' => '',
                    'SECUREID' => $data['SECUREID'],
                    'MODELID' => $data["MODELID"],
                    'isVoice' => false,
                    'REQUIRE_HASH_STRING_OTP' => true,
                    'checkSum' => '',
                ),
        );
        return $this->CURL("SEND_OTP_MSG", $header, $Data, $proxy);
    }

    public function REG_DEVICE_MSG($data)
    {
        $proxy = $data['proxy'];
        $microtime = $this->get_microtime();
        $header = array(
            "agent_id: undefined",
            "sessionkey:",
            "user_phone: undefined",
            "authorization: Bearer undefined",
            "msgtype: REG_DEVICE_MSG",
            "Host: api.momo.vn",
            "User-Agent: okhttp/3.14.17",
            "app_version: " . $this->momo_data_config["appVer"],
            "app_code: " . $this->momo_data_config["appCode"],
            "device_os: ANDROID"
        );
        $Data = '{
            "user": "' . $data["phone"] . '",
            "msgType": "REG_DEVICE_MSG",
            "cmdId": "' . $microtime . '000000",
            "lang": "vi",
            "time": ' . $microtime . ',
            "channel": "APP",
            "appVer": ' . $this->momo_data_config["appVer"] . ',
            "appCode": "' . $this->momo_data_config["appCode"] . '",
            "deviceOS": "ANDROID",
            "buildNumber": 0,
            "appId": "vn.momo.platform",
            "result": true,
            "errorCode": 0,
            "errorDesc": "",
            "momoMsg": {
              "_class": "mservice.backend.entity.msg.RegDeviceMsg",
              "number": "' . $data["phone"] . '",
              "imei": "' . $data["imei"] . '",
              "cname": "Vietnam",
              "ccode": "084",
              "device": "' . $data["device"] . '",
              "firmware": "23",
              "hardware": "' . $data["hardware"] . '",
              "manufacture": "' . $data["facture"] . '",
              "csp": "",
              "icc": "",
              "mcc": "",
              "device_os": "Android",
              "secure_id": "' . $data["SECUREID"] . '"
            },
            "extra": {
              "ohash": "' . $data['ohash'] . '",
              "AAID": "' . $data["AAID"] . '",
              "IDFA": "",
              "TOKEN": "' . $data["TOKEN"] . '",
              "SIMULATOR": "",
              "SECUREID": "' . $data["SECUREID"] . '",
              "MODELID": "' . $data["MODELID"] . '",
              "checkSum": ""
            }
          }';
        return $this->CURL("REG_DEVICE_MSG", $header, $Data, $proxy);
    }

    public function USER_LOGIN_MSG($data)
    {
        $proxy = $data['proxy'];
        $microtime = $this->get_microtime();
        $header = array(
            "agent_id: " . $data["agent_id"],
            "user_phone: " . $data["phone"],
            "sessionkey: " . (!empty($data["sessionkey"])) ? $data["sessionkey"] : "",
            "authorization: Bearer " . $data["authorization"],
            "msgtype: USER_LOGIN_MSG",
            "Host: owa.momo.vn",
            "user_id: " . $data["phone"],
            "User-Agent: okhttp/3.14.17",
            "app_version: " . $this->momo_data_config["appVer"],
            "app_code: " . $this->momo_data_config["appCode"],
            "device_os: Android"
        );
        $Data = array(
            'user' => $data['phone'],
            'msgType' => 'USER_LOGIN_MSG',
            'pass' => $data['password'],
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => $microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    '_class' => 'mservice.backend.entity.msg.LoginMsg',
                    'isSetup' => false,
                ),
            'extra' =>
                array(
                    'pHash' => $this->get_pHash($data),
                    'AAID' => $data['AAID'],
                    'IDFA' => '',
                    'TOKEN' => $data['TOKEN'],
                    'SIMULATOR' => '',
                    'SECUREID' => $data['SECUREID'],
                    'MODELID' => $data['MODELID'],
                    'checkSum' => $this->generateCheckSum('USER_LOGIN_MSG', $microtime, $data),
                ),
        );
        return $this->CURL("USER_LOGIN_MSG", $header, $Data, $proxy);
    }

    public function GENERATE_TOKEN_AUTH_MSG($data)
    {
        $proxy = $data['proxy'];
        $microtime = $this->get_microtime();
        $header = array(
            "agent_id: " . $data["agent_id"],
            "user_phone: " . $data["phone"],
            "sessionkey: " . (!empty($data["sessionkey"])) ? $data["sessionkey"] : "",
            "authorization: Bearer " . $data["authorization"],
            "msgtype: GENERATE_TOKEN_AUTH_MSG",
            "Host: api.momo.vn",
            "user_id: " . $data["phone"],
            "User-Agent: MoMoPlatform-Release/31062 CFNetwork/1325.0.1 Darwin/21.1.0",
            "app_version: " . $this->momo_data_config["appVer"],
            "app_code: " . $this->momo_data_config["appCode"],
            "device_os: Android"
        );
        $Data = array(
            'user' => $data['phone'],
            'msgType' => 'GENERATE_TOKEN_AUTH_MSG',
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => $microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    '_class' => 'mservice.backend.entity.msg.RefreshTokenMsg',
                    'refreshToken' => $data["refreshToken"],
                ),
            'extra' =>
                array(
                    'pHash' => $this->get_pHash($data),
                    'AAID' => $data['AAID'],
                    'IDFA' => '',
                    'TOKEN' => $data['TOKEN'],
                    'SIMULATOR' => '',
                    'SECUREID' => $data['SECUREID'],
                    'MODELID' => $data['MODELID'],
                    'checkSum' => $this->generateCheckSum('GENERATE_TOKEN_AUTH_MSG', $microtime, $data),
                ),
        );
        return $this->CURL("GENERATE_TOKEN_AUTH_MSG", $header, $Data, $proxy);
    }

    public function CheckHisNew($hours = 5, $data)
    {
        $proxy = $data['proxy'];
        $begin = (time() - (3600 * $hours)) * 1000;
        $header = array(
            "authorization: Bearer " . $data["authorization"],
            "user_phone: " . $data["phone"],
            "sessionkey: " . $data["sessionkey"],
            "agent_id: " . $data["agent_id"],
            'app_version: ' . $this->momo_data_config["appVer"],
            'app_code: ' . $this->momo_data_config["appCode"],
            "Host: m.mservice.io"
        );
        $Data = '{
            "userId": "' . $data['phone'] . '",
            "fromTime": ' . $begin . ',
            "toTime": ' . $this->get_microtime() . ',
            "limit": 100,
            "cursor": "",
            "cusPhoneNumber": ""
        }';

        $result = $this->CURL("QUERY_TRAN_HIS_MSG_NEW", $header, $Data, $proxy);
        if (!is_array($result)) {
            return array(
                "status" => "error",
                "code" => -5,
                "message" => "Hết thời gian truy cập vui lòng đăng nhập lại"
            );
        }
        $tranHisMsg = $result["message"]["data"]["notifications"];
        $return = array();
        foreach ($tranHisMsg as $value) {
            if ($value["refId"] == 'receive_money_p2p' || $value["refId"] == 'LuckyMoneyPreviewDetail') {
                $extra = json_decode($value["extra"], true);
                $amount = $value['caption'];
                $name = explode("từ", $amount)[1] ?: "";
                if (strpos($amount, "Nhận") !== false && $name) {
                    preg_match('#Nhận (.+?)đ#is', $amount, $amount);
                    $amount = str_replace(".", "", $amount[1]) > 0 ? str_replace(".", "", $amount[1]) : '0';
                    //Cover body to comment
                    $comment = $value['body'];
                    $comment = ltrim($comment, '"');
                    $comment = explode('"', $comment);
                    $comment = $comment[0];
                    if ($comment == "Nhấn để xem chi tiết.") {
                        $comment = "";
                    }
                    $return[] = array(
                        "tranId" => $value["tranId"],
                        "ID" => $value["ID"],
                        "patnerID" => $value["sender"],
                        "partnerName" => trim($name),
                        "comment" => $comment,
                        "amount" => (int)$amount,
                        "millisecond" => $value["time"]
                    );
                }
            }
        }
        return array('status' => 'success', 'author' => 'DUNGA', 'data' => $return);
    }

    public function GET_TRANS_BY_TID($data, $tranId)
    {
        $proxy = $data['proxy'];
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($data["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $microtime = $this->get_microtime();

        $header = array(
            "Host: api.momo.vn",
            "agent_id: ".$data["agent_id"],
            "user_phone: ".$data["phone"],
            "sessionkey: ".$data["sessionkey"],
            "authorization: Bearer ".$data["authorization"],
            "userid: ".$data["phone"],
            "requestkey: ".$requestkey
        );

        $Data = array(
            'requestId' => (string)$microtime,
            'transId' => $tranId,
            'serviceId' => 'transfer_p2p',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'lang' => 'vi',
            'deviceOS' => 'ANDROID',
            'channel' => 'APP',
            'buildNumber' => 7312,
            'appId' => 'vn.momo.transactionhistory',
            'momoMsg' =>
                array(
                    '_class' => 'mservice.backend.entity.msg.TranHisMsg',
                    'tranId' => $tranId
                ),
            'extra' =>
                array(
                    'checkSum' => $this->generateCheckSum('GET_TRANS_BY_TID02', $microtime, $data),
                ),
        );

        return $this->CURL("GET_TRANS_BY_TID02", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);
    }

    public function GET_TRANS_BY_TID_OLD($data, $tranid)
    {
        $proxy = $data['proxy'];
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($data["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $microtime = $this->get_microtime();
        $header = array(
            "agent_id: " . $data["agent_id"],
            "user_phone: " . $data["phone"],
            "sessionkey: " . $data["sessionkey"],
            "authorization: Bearer " . $data["authorization"],
            "msgtype: GET_TRANS_BY_TID",
            "userid: " . $data["phone"],
            "requestkey: " . $requestkey,
            "Host: owa.momo.vn"
        );

        $Data = array(
            'user' => $data['phone'],
            'msgType' => 'GET_TRANS_BY_TID',
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => $microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    '_class' => 'mservice.backend.entity.msg.TranHisMsg',
                    'tranId' => $tranid
                ),
            'extra' =>
                array(
                    'checkSum' => $this->generateCheckSum('GET_TRANS_BY_TID', $microtime, $data),
                ),
        );

        return $this->CURL("GET_TRANS_BY_TID_OLD", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);
    }

    public function QUERY_TRAN_HIS_NEW($data, $from, $to, $limit)
    {
        $proxy = $data['proxy'];
        $begin = (time() - (3600 * 1)) * 1000;
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($data["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $header = array(
            'Userhash' => md5($data['phone']),
            'userid' => $data['phone'],
            "requestkey: " . $requestkey,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            "authorization: Bearer " . $data["authorization"],
            "User-Agent: MoMoPlatform-Release/31152 CFNetwork/1331.0.7 Darwin/21.4.0"
        );
        $Data = array(
            'requestId' => $data["phone"],
//            'startDate' => $from,
//            'endDate' => $to,
            'fromTime' => $begin,
            "toTime" => $this->get_microtime(),
            'offset' => 0,
            'limit' => $limit,
            'appCode' => $this->momo_data_config["appVer"],
            'appVer' => $this->momo_data_config["appCode"],
            'lang' => 'vi',
            'deviceOS' => "ANDROID",
            'channel' => 'APP',
            'buildNumber' => 4155,
            'appId' => 'vn.momo.transactionhistory',
        );

        $result = $this->CURL("QUERY_TRAN_HIS_NEW", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);
        $return = array();
        if (!empty($result) && !empty($result['momoMsg'])) {
            $tranList = $result['momoMsg'];
            foreach ($tranList as $value) {
                if ($value['io'] == -1) {
                    continue;
                }
                $resultTrans = $this->GET_TRANS_BY_TID($data, $value['transId']);
                if (empty($resultTrans)) {
                    return array(
                        "status" => "error",
                        "code" => -5,
                        "message" => 'Hết thời gian đăng nhập vui lòng đăng nhập lại'
                    );
                }
                $dataTransId = json_decode($resultTrans['momoMsg']['serviceData'], true);
                if (empty($dataTransId) or empty($dataTransId)) continue;
                $return[] = array(
                    "tranId" => empty($resultTrans['momoMsg']["transId"]) ? "" : $resultTrans['momoMsg']["transId"],
                    "io" => empty($resultTrans['momoMsg']["io"]) ? "" : $resultTrans['momoMsg']["io"],
                    "partnerName" => empty($resultTrans['momoMsg']["sourceName"]) ? "" : $resultTrans['momoMsg']["sourceName"],
                    "patnerID" => empty($dataTransId["OWNER_NUMBER"]) ? "" : $dataTransId["OWNER_NUMBER"],
                    "amount" => empty($resultTrans['momoMsg']["totalAmount"]) ? 0 : $resultTrans['momoMsg']["totalAmount"],
                    "comment" => (!empty($dataTransId["COMMENT_VALUE"])) ? $dataTransId["COMMENT_VALUE"] : "",
                    "millisecond" => empty($resultTrans['momoMsg']["createdAt"]) ? 0 : $resultTrans['momoMsg']["createdAt"]
                );
            }
        }
        return array('status' => 'success', 'author' => 'DUNGA', 'data' => $return);

    }

    public function QUERY_TRAN_HIS_NEW_V2($data, $from, $to, $limit)
    {
        $proxy = $data['proxy'];
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($data["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $header = array(
            'Userhash' => md5($data['phone']),
            'userid' => $data['phone'],
            "requestkey: " . $requestkey,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            "authorization: Bearer " . $data["authorization"],
            "User-Agent: MoMoPlatform-Release/31152 CFNetwork/1331.0.7 Darwin/21.4.0"
        );
        $Data = array(
            'requestId' => $data["phone"],
            'startDate' => $from,
            'endDate' => $to,
            'offset' => 0,
            'limit' => $limit,
            'appCode' => $this->momo_data_config["appVer"],
            'appVer' => $this->momo_data_config["appCode"],
            'lang' => 'vi',
            'deviceOS' => "ANDROID",
            'channel' => 'APP',
            'buildNumber' => 4155,
            'appId' => 'vn.momo.transactionhistory',
        );

        $result = $this->CURL("QUERY_TRAN_HIS_NEW", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);
        $return = array();
        if (!empty($result) && !empty($result['momoMsg'])) {
            $tranList = $result['momoMsg'];
            foreach ($tranList as $value) {
                if ($value['io'] == -1) {
                    continue;
                }
                $resultTrans = $this->GET_TRANS_BY_TID($data, $value['transId']);
                if (empty($resultTrans)) {
                    return array(
                        "status" => "error",
                        "code" => -5,
                        "message" => 'Hết thời gian đăng nhập vui lòng đăng nhập lại'
                    );
                }
                $dataTransId = json_decode($resultTrans['momoMsg']['serviceData'], true);
                if (empty($dataTransId) or empty($dataTransId)) continue;
                $return[] = array(
                    "tranId" => empty($resultTrans['momoMsg']["transId"]) ? "" : $resultTrans['momoMsg']["transId"],
                    "io" => empty($resultTrans['momoMsg']["io"]) ? "" : $resultTrans['momoMsg']["io"],
                    "patnerName" => empty($resultTrans['momoMsg']["sourceName"]) ? "" : $resultTrans['momoMsg']["sourceName"],
                    "partnerID" => empty($dataTransId["OWNER_NUMBER"]) ? "" : $dataTransId["OWNER_NUMBER"],
                    "amount" => empty($dataTransId["totalOriginalAmount"]) ? 0 : $dataTransId["totalOriginalAmount"],
                    "comment" => (!empty($dataTransId["COMMENT_VALUE"])) ? $dataTransId["COMMENT_VALUE"] : "",
                    "millisecond" => empty($resultTrans['momoMsg']["createdAt"]) ? 0 : $resultTrans['momoMsg']["createdAt"]
                );
            }
        }
        return array('status' => 'success', 'author' => 'DUNGA', 'data' => $return);
    }

    public function CHECK_USER_PRIVATE($receiver, $data)
    {
        $proxy = $data['proxy'];
        $microtime = $this->get_microtime();
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($data["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $header = array(
            "agent_id: " . $data["agent_id"],
            "user_phone: " . $data["phone"],
            "sessionkey: " . $data["sessionkey"],
            "authorization: Bearer " . $data["authorization"],
            "msgtype: CHECK_USER_PRIVATE",
            "userid: " . $data["phone"],
            "requestkey: " . $requestkey,
            "Host: owa.momo.vn"
        );
        $Data = '{
            "user":"' . $data['phone'] . '",
            "msgType":"CHECK_USER_PRIVATE",
            "cmdId":"' . $microtime . '000000",
            "lang":"vi",
            "time":' . (int)$microtime . ',
            "channel":"APP",
            "appVer": ' . $this->momo_data_config["appVer"] . ',
            "appCode": "' . $this->momo_data_config["appCode"] . '",
            "deviceOS":"ANDROID",
            "buildNumber":1916,
            "appId":"vn.momo.transfer",
            "result":true,
            "errorCode":0,
            "errorDesc":"",
            "momoMsg":
            {
                "_class":"mservice.backend.entity.msg.LoginMsg",
                "getMutualFriend":false
            },
            "extra":
            {
                "CHECK_INFO_NUMBER":"' . $receiver . '",
                "checkSum":"' . $this->generateCheckSum('CHECK_USER_PRIVATE', $microtime, $data) . '"
            }
        }';
        return $this->CURL("CHECK_USER_PRIVATE", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);
    }

    public function CHECK_USER_BE_MSG($data)
    {
        $microtime = $this->get_microtime();
        $header = array(
            "agent_id: undefined",
            "sessionkey:",
            "user_phone: undefined",
            "authorization: Bearer undefined",
            "msgtype: CHECK_USER_BE_MSG",
            "Host: api.momo.vn",
            "User-Agent: okhttp/3.14.17",
            "app_version: " . $this->momo_data_config["appVer"],
            "app_code: ",
            "device_os: Android"
        );

        $Data = array(
            'user' => $data['phone'],
            'msgType' => 'CHECK_USER_BE_MSG',
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => $microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    '_class' => 'mservice.backend.entity.msg.RegDeviceMsg',
                    'number' => $data['phone'],
                    'imei' => $data["imei"],
                    'cname' => 'Vietnam',
                    'ccode' => '084',
                    'device' => $data["device"],
                    'firmware' => '23',
                    'hardware' => $data["hardware"],
                    'manufacture' => $data["facture"],
                    'csp' => 'Viettel',
                    'icc' => '',
                    'mcc' => '452',
                    'device_os' => 'Android',
                    'secure_id' => $data["SECUREID"],
                ),
            'extra' =>
                array(
                    'checkSum' => '',
                ),
        );
        return $this->CURL("CHECK_USER_BE_MSG", $header, $Data);

    }

    public function M2MU_INIT($dataPhone, $dataSend)
    {
        $proxy = $dataPhone['proxy'];
        $microtime = $this->get_microtime();
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($dataPhone["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $header = array(
            "agent_id: " . $dataPhone["agent_id"],
            "user_phone: " . $dataPhone["phone"],
            "sessionkey: " . $dataPhone["sessionkey"],
            "authorization: Bearer " . $dataPhone["authorization"],
            "msgtype: M2MU_INIT",
            "userid: " . $dataPhone["phone"],
            "requestkey: " . $requestkey,
            "Host: owa.momo.vn"
        );
        $ipaddress = $this->get_ip_address();
        $Data = array(
            'user' => $dataPhone['phone'],
            'msgType' => 'M2MU_INIT',
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => (int)$microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    'clientTime' => (int)$microtime - 221,
                    'tranType' => 2018,
                    'comment' => $dataSend['comment'],
                    'amount' => $dataSend['amount'],
                    'partnerId' => $dataSend['receiver'],
                    'partnerName' => $dataSend['partnerName'],
                    'ref' => '',
                    'serviceCode' => 'transfer_p2p',
                    'serviceId' => 'transfer_p2p',
                    '_class' => 'mservice.backend.entity.msg.M2MUInitMsg',
                    'tranList' =>
                        array(
                            0 =>
                                array(
                                    'partnerName' => $dataSend['partnerName'],
                                    'partnerId' => $dataSend['receiver'],
                                    'originalAmount' => $dataSend['amount'],
                                    'serviceCode' => 'transfer_p2p',
                                    'stickers' => '',
                                    'themeBackground' => '#f5fff6',
                                    'themeUrl' => 'https://cdn.mservice.com.vn/app/img/transfer/theme/Corona_750x260.png',
                                    'transferSource' => '',
                                    'socialUserId' => '',
                                    '_class' => 'mservice.backend.entity.msg.M2MUInitMsg',
                                    'tranType' => 2018,
                                    'comment' => $dataSend['comment'],
                                    'moneySource' => 1,
                                    'partnerCode' => 'momo',
                                    'serviceMode' => 'transfer_p2p',
                                    'serviceId' => 'transfer_p2p',
                                    'extras' => '{"loanId":0,"appSendChat":false,"loanIds":[],"stickers":"","themeUrl":"https://cdn.mservice.com.vn/app/img/transfer/theme/Corona_750x260.png","hidePhone":false,"vpc_CardType":"SML","vpc_TicketNo":"' . $ipaddress . '","vpc_PaymentGateway":""}',
                                ),
                        ),
                    'extras' => '{"loanId":0,"appSendChat":false,"loanIds":[],"stickers":"","themeUrl":"https://cdn.mservice.com.vn/app/img/transfer/theme/Corona_750x260.png","hidePhone":false,"vpc_CardType":"SML","vpc_TicketNo":"' . $ipaddress . '","vpc_PaymentGateway":""}',
                    'moneySource' => 1,
                    'partnerCode' => 'momo',
                    'rowCardId' => '',
                    'giftId' => '',
                    'useVoucher' => 0,
                    'prepaidIds' => '',
                    'usePrepaid' => 0,
                ),
            'extra' =>
                array(
                    'checkSum' => $this->generateCheckSum('M2MU_INIT', $microtime, $dataPhone),
                ),
        );
        return $this->CURL("M2MU_INIT", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);
    }

    public function M2MU_CONFIRM($ID, $data, $dataSend)
    {
        $proxy = $data['proxy'];
        $microtime = $this->get_microtime();
        $requestkeyRaw = $this->generateRandom(32);
        $requestkey = $this->RSA_Encrypt($data["RSA_PUBLIC_KEY"], $requestkeyRaw);
        $header = array(
            "agent_id: " . $data["agent_id"],
            "user_phone: " . $data["phone"],
            "sessionkey: " . $data["sessionkey"],
            "authorization: Bearer " . $data["authorization"],
            "msgtype: M2MU_INIT",
            "userid: " . $data["phone"],
            "requestkey: " . $requestkey,
            "Host: owa.momo.vn",
            "User-Agent: MoMoPlatform-Release/31152 CFNetwork/1331.0.7 Darwin/21.4.0"
        );
        $ipaddress = $this->get_ip_address();
        $Data = array(
            'user' => $data['phone'],
            'pass' => $data['password'],
            'msgType' => 'M2MU_CONFIRM',
            'cmdId' => (string)$microtime . '000000',
            'lang' => 'vi',
            'time' => (int)$microtime,
            'channel' => 'APP',
            'appVer' => $this->momo_data_config["appVer"],
            'appCode' => $this->momo_data_config["appCode"],
            'deviceOS' => 'ANDROID',
            'buildNumber' => 0,
            'appId' => 'vn.momo.platform',
            'result' => true,
            'errorCode' => 0,
            'errorDesc' => '',
            'momoMsg' =>
                array(
                    'ids' =>
                        array(
                            0 => $ID,
                        ),
                    'totalAmount' => $dataSend['amount'],
                    'originalAmount' => $dataSend['amount'],
                    'originalClass' => 'mservice.backend.entity.msg.M2MUConfirmMsg',
                    'originalPhone' => $data['phone'],
                    'totalFee' => '0.0',
                    'id' => $ID,
                    'GetUserInfoTaskRequest' => $dataSend['receiver'],
                    'tranList' =>
                        array(
                            0 =>
                                array(
                                    '_class' => 'mservice.backend.entity.msg.TranHisMsg',
                                    'user' => $data['phone'],
                                    'clientTime' => (int)($microtime - 211),
                                    'tranType' => 36,
                                    'amount' => (int)$dataSend['amount'],
                                    'receiverType' => 1,
                                ),
                            1 =>
                                array(
                                    '_class' => 'mservice.backend.entity.msg.TranHisMsg',
                                    'user' => $data['phone'],
                                    'clientTime' => (int)($microtime - 211),
                                    'tranType' => 36,
                                    'partnerId' => $dataSend['receiver'],
                                    'amount' => 100,
                                    'comment' => '',
                                    'ownerName' => $data['Name'],
                                    'receiverType' => 0,
                                    'partnerExtra1' => '{"totalAmount":' . $dataSend['amount'] . '}',
                                    'partnerInvNo' => 'borrow',
                                ),
                        ),
                    'serviceId' => 'transfer_p2p',
                    'serviceCode' => 'transfer_p2p',
                    'clientTime' => (int)($microtime - 211),
                    'tranType' => 2018,
                    'comment' => '',
                    'ref' => '',
                    'amount' => $dataSend['amount'],
                    'partnerId' => $dataSend['receiver'],
                    'bankInId' => '',
                    'otp' => '',
                    'otpBanknet' => '',
                    '_class' => 'mservice.backend.entity.msg.M2MUConfirmMsg',
                    'extras' => '{"appSendChat":false,"vpc_CardType":"SML","vpc_TicketNo":"' . $ipaddress . '"","vpc_PaymentGateway":""}',
                ),
            'extra' =>
                array(
                    'checkSum' => $this->generateCheckSum('M2MU_CONFIRM', $microtime, $data),
                ),
        );
        return $this->CURL("M2MU_CONFIRM", $header, $this->Encrypt_data($Data, $requestkeyRaw), $proxy);

    }

    private function CURL($Action, $header, $data, $proxy = null)
    {
        if ($proxy == null) {
            $Data = is_array($data) ? json_encode($data) : $data;
            $curl = curl_init();
            // echo strlen($Data); die;
            $header[] = 'Content-Type: application/json';
            $header[] = 'accept: application/json';
            $header[] = 'Content-Length: ' . strlen($Data);
            $opt = array(
                CURLOPT_URL => $this->URLAction[$Action],
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST => empty($data) ? FALSE : TRUE,
                CURLOPT_POSTFIELDS => $Data,
                CURLOPT_CUSTOMREQUEST => empty($data) ? 'GET' : 'POST',
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_ENCODING => "",
                CURLOPT_HEADER => FALSE,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_TIMEOUT => 20,
            );
            curl_setopt_array($curl, $opt);
            $body = curl_exec($curl);
            // echo strlen($body); die;
            if (is_object(json_decode($body))) {
                return json_decode($body, true);
            }
        } else {

            $proxy = explode('|', $proxy);
            $ip = explode(':', $proxy[1])[0];
            $port = explode(':', $proxy[1])[1];

            $Data = is_array($data) ? json_encode($data) : $data;
            $curl = curl_init();
            // echo strlen($Data); die;
            $header[] = 'Content-Type: application/json';
            $header[] = 'accept: application/json';
            $header[] = 'Content-Length: ' . strlen($Data);
            $opt = array(
                CURLOPT_URL => $this->URLAction[$Action],
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST => empty($data) ? FALSE : TRUE,
                CURLOPT_POSTFIELDS => $Data,
                CURLOPT_CUSTOMREQUEST => empty($data) ? 'GET' : 'POST',
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_ENCODING => "",
                CURLOPT_HEADER => FALSE,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_TIMEOUT => 20,
                CURLOPT_PROXY => $ip,
                CURLOPT_PROXYPORT => $port,
                CURLOPT_PROXYUSERPWD => $proxy[0]
            );
            curl_setopt_array($curl, $opt);
            $body = curl_exec($curl);
            // echo strlen($body); die;
            if (is_object(json_decode($body))) {
                return json_decode($body, true);
            }
        }
        return json_decode($this->Decrypt_data($body), true);
    }

    public function Decrypt_data($data)
    {

        $iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $this->keys, OPENSSL_RAW_DATA, $iv);
    }

    public function generateCheckSum($type, $microtime, $data)
    {
        $Encrypt = $data["phone"] . $microtime . '000000' . $type . ($microtime / 1000000000000.0) . 'E12';
        $iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        return base64_encode(openssl_encrypt($Encrypt, 'AES-256-CBC', $data["setupKeyDecrypt"], OPENSSL_RAW_DATA, $iv));
    }

    private function get_pHash($data)
    {
        $key = $data["imei"] . "|" . $data["password"];
        $iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        return base64_encode(openssl_encrypt($key, 'AES-256-CBC', $data['setupKeyDecrypt'], OPENSSL_RAW_DATA, $iv));
    }

    public function get_setupKey($setUpKey, $data)
    {
        $iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        return openssl_decrypt(base64_decode($setUpKey), 'AES-256-CBC', $data["ohash"], OPENSSL_RAW_DATA, $iv);
    }

    public function generateRandom($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function get_SECUREID($length = 17)
    {
        $characters = '0123456789abcdef';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function get_microtime()
    {
        return round(microtime(true) * 1000);
    }

    public function generateImei()
    {
        return $this->generateRandomString(8) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(12);
    }

    private function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdef';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function get_TOKEN()
    {
        return $this->generateRandom(22) . ':' . $this->generateRandom(9) . '-' . $this->generateRandom(20) . '-' . $this->generateRandom(12) . '-' . $this->generateRandom(7) . '-' . $this->generateRandom(7) . '-' . $this->generateRandom(53) . '-' . $this->generateRandom(9) . '_' . $this->generateRandom(11) . '-' . $this->generateRandom(4);
    }

    public function Encrypt_data($data, $key)
    {

        $iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $this->keys = $key;
        return base64_encode(openssl_encrypt(is_array($data) ? json_encode($data) : $data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

    }

    public function RSA_Encrypt($key, $content)
    {
        if (empty($this->rsa)) {
            $this->INCLUDE_RSA($key);
        }
        return base64_encode($this->rsa->encrypt($content));
    }

    private function INCLUDE_RSA($key)
    {
        require_once('Crypt/RSA.php');
        $this->rsa = new Crypt_RSA();
        $this->rsa->loadKey($key);
        $this->rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
        return $this;
    }

    private function get_ip_address()
    {
        $isValid = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        if (!empty($isValid)) {
            return $_SERVER['REMOTE_ADDR'];
        }
        try {
            $isIpv4 = json_decode(file_get_contents('https://api.ipify.org?format=json'), true);
            return $isIpv4['ip'];
        } catch (\Throwable $e) {
            return '116.107.187.109';
        }
    }
}
