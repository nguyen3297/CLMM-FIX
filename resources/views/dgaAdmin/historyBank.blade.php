@extends('dgaAdmin.app')
@section('main')
    <main id="main-container">
        <div class="content">
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        MOMO
                    </h1>
                    <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                        Lịch sử chuyển tiền MOMO
                    </h2>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                LỊCH SỬ CHUYỂN TIỀN
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Số Momo</th>
                                        <th>Số tiền/Lỗi</th>
                                        <th>Mã GD Chuyển</th>
                                        <th>Ngày chuyển</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $row)
                                        <tr class="text-center">
                                            <td class="text-center fs-sm">{{ $row->id }}</td>
                                            <td class="fw-semibold fs-sm">{{ $row->phone }}</td>
                                            <td class="fs-sm">@if (json_decode($row->details)->status == 'success') <b class="fw-semibold fs-sm">@php echo number_format(json_decode($row->details)->data->amount) @endphp</b> VND <br> MGD THẮNG: <b>@php echo preg_replace('/[^0-9\-]/', '', json_decode($row->details)->data->comment) @endphp @elseif(!empty(json_decode($row->details)->message))</b> @php echo json_decode($row->details)->message @endphp @endif</td>
                                            <td class="fw-semibold fs-sm">
                                                @if (json_decode($row->details)->status == 'success')
                                                    <b
                                                        class="text-success">{{ json_decode($row->details)->data->tranId }}</b>
                                                @else
                                                    <b class="text-danger">Chuyển Lỗi</b>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-muted fs-sm">{{ $row->created_at }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#info_{{ $row->id }}">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="Remove Client">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <div class="modal" id="info_{{ $row->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="info_{{ $row->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="block block-rounded block-transparent mb-0">
                                                            <div class="block-header block-header-default">
                                                                <h3 class="block-title">THÔNG TIN CHUYỂN TIỀN</h3>
                                                                <div class="block-options">
                                                                    <button type="button" class="btn-block-option"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-fw fa-times"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="block-content fs-sm">
                                                                <div class="row push">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Số MOMO</label>
                                                                            <input type="text" class="form-control" value="{{ $row->phone }}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Mã GD Chuyển</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ json_decode($row->details)->data->tranId }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Mã GD Thắng</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ preg_replace('/[^0-9\-]/', '', json_decode($row->details)->data->comment) }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Nội dung</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ json_decode($row->details)->data->comment }} @else{{ json_decode($row->details)->message }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Số tiền chuyển</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ number_format(json_decode($row->details)->data->amount) }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Số nhận</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ json_decode($row->details)->data->ownerNumber }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Người nhận</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ json_decode($row->details)->data->ownerName }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Số dư</label>
                                                                            <input type="text" class="form-control" value="@if (json_decode($row->details)->status == 'success'){{ number_format(json_decode($row->details)->data->balance) }} @endif" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label" for="">Chi tiết</label>
                                                                            <textarea rows="3" class="form-control">{{ $row->details }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
