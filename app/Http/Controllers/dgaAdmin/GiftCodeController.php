<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use App\Models\GiftCode;
use App\Models\HistoryGift;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiftCodeController extends Controller
{
    public function index() {
        $setting = Setting::first();
        $giftcode = GiftCode::get();
        return view('dgaAdmin.giftcode', compact('setting', 'giftcode'));
    }

    public function giftcodePost(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'used' => 'required|string',
            'amount' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        GiftCode::create([
            'code' => $request->code,
            'used' => $request->used,
            'amount' => $request->amount,
            'status' => 1
        ]);
        return back()->withErrors(array('status' => 'error', 'message' => 'Thêm mã quà thành công'));
    }

    public function giftcodeEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'used' => 'required|string',
            'amount' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $data = GiftCode::where('id', $request->id)->first();
        if ($data) {
            $data->code = $request->code;
            $data->used = (int)$request->used;
            $data->amount = str_replace(",", "", $request->amount);
            $data->save();
            return response()->json(array('status' => 'success', 'message' => 'Sửa mã quà thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Lỗi vui lòng load lại trạng hoặc không chỉnh mục id'));
        }
    }

    public function giftcodeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'type' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $data = GiftCode::where('id', $request->id)->first();
        if ($request->type == 'delete' && $data) {
            $data->delete();
            return response()->json(array('status' => 'success', 'message' => 'Xóa mã quà thành công'));
        } else if ($request->type == 'show' && $data) {
            $data->status = 1;
            $data->save();
            return response()->json(array('status' => 'success', 'message' => 'Bật sử dụng mã quà thành công'));
        } else if ($request->type == 'hidden' && $data) {
            $data->status = 0;
            $data->save();
            return response()->json(array('status' => 'success', 'message' => 'Hủy sử dụng mã quà thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Mã quà không tồn tại'));
        }
    }

    public function historyGiftCode() {
        $setting = Setting::first();
        $history = HistoryGift::orderBy('id', 'DESC')->limit(500)->get();
        return view('dgaAdmin.historyGiftcode', compact('setting', 'history'));
    }
}
