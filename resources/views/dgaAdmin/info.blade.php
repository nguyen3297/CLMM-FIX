@extends('dgaAdmin.app')
@section('main')
    <main id="main-container">
        <div class="content">
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        SETTING
                    </h1>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->has('status'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <p class="mb-0">
                                {{ $errors->first('message') }}
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('admin.infoTranEdit', ['tran' => $tran]) }}" method="POST">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">#INFO {{ $tran }}</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Lưu ngay
                                    </button>
                                    {{--                                    <a onclick="update()" class="btn btn-sm btn-warning">--}}
                                    {{--                                        Cập nhật phiên bản mới--}}
                                    {{--                                    </a>--}}
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Mã giao dịch</label>
                                            <input type="text" class="form-control form-control-alt" name="tranId"
                                                   value="{{ $info->tranId }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Người chuyển</label>
                                            <input type="text" class="form-control form-control-alt" name="partnerName"
                                                   value="{{ $info->partnerName }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Số chuyển</label>
                                            <input type="text" class="form-control form-control-alt" name="partnerId"
                                                   value="{{ $info->partnerId }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Số tiền chơi</label>
                                            <input type="text" class="form-control form-control-alt" name="amount"
                                                   value="{{ $info->amount }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Số tiền nhận</label>
                                            <input type="text" class="form-control form-control-alt" name="receive"
                                                   value="{{ $info->receive }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Trò chơi</label>
                                            <input type="text" class="form-control form-control-alt" name="game"
                                                   value="{{ $info->game }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Tỉ lệ</label>
                                            <input type="text" class="form-control form-control-alt" name="ratio"
                                                   value="{{ $setting->$ratio }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Trạng thái</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="{{ $info->status }}">@if ($info->status == 1) Thắng (Hiện
                                                    tại) @elseif($info->status == 4) Hoàn tiền (Hiện
                                                    tại) @elseif($info->status == 3) Sai hạn mức (Hiện
                                                    tại) @elseif($info->status == 2) Sai nội dung (Hiện tại) @else Thua
                                                    (Hiện tại) @endif</option>

                                                <option value="1">Thắng</option>
                                                <option value="2">Sai hạn mức</option>
                                                <option value="3">Sai nội dung</option>
                                                <option value="4">Hoàn tiền</option>
                                                <option value="0">Thua</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Trả</label>
                                            <select class="form-select" id="pay" name="pay">
                                                <option value="{{ $info->pay }}">@if ($info->pay == 1) Đã trả (Hiện
                                                    tại) @elseif($info->pay == 100) Chuyển lỗi (Hiện tại) @else Chưa trả
                                                    (Hiện tại) @endif</option>
                                                <option value="1">Đã trả</option>
                                                <option value="100">Chuyển lỗi</option>
                                                <option value="0">Chưa trả</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Chuyển số trả</label>
                                            <select class="form-select" id="phoneSend" name="phoneSend">
                                                <option value="{{ $infoPhone->phone }}">{{ $infoPhone->phone }} (Hiện tại)
                                                    - {{  number_format(json_decode($infoPhone->info)->balance) }} VND
                                                </option>
                                                @foreach($momo as $row) {
                                                <option value="{{ $row->phone }}">{{ $row->phone }}
                                                    - {{  number_format(json_decode($row->info)->balance) }} VND
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
