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
                        Lịch sử chơi game MOMO
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
                                LỊCH SỬ CHƠI GAME
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th style="width: 5%;">MDG</th>
                                    <th style="width: 10%;">Số MOMO</th>
                                    <th>Người chuyển</th>
                                    <th>Số tiền</th>
                                    <th>Tiền nhận</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                    <th>Trả</th>
                                    <th>Số chuyển</th>
                                    <th style="width: 10%;">Ngày chơi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($history as $row)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $row->id }}</td>
                                        <td class="fw-semibold fs-sm"><a href="{{ route('admin.infoTran', ['tran' => $row->tranId]) }}">{{ $row->tranId }}</a></td>
                                        <td class="fw-semibold fs-sm">{{ $row->partnerId }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row->partnerName }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->amount) }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->receive) }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row->comment }}</td>
                                        <td class="fs-sm">
                                            @if ($row->status == 1) <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Thắng</span>
                                            @elseif ($row->status == 4)
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Hoàn tiền</span>
                                            @elseif ($row->status == 3)
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Sai hạn mức</span>
                                            @elseif ($row->status == 2)
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Sai nội dung</span>
                                            @else
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Thua</span>
                                            @endif
                                        </td>
                                        <td class="fw-semibold fs-sm">@if ($row->pay == 1) <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Đã trả</span> @elseif($row->pay == 100)
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Chuyển lỗi</span> @else
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Chưa trả</span> @endif
                                        </td>
                                        <td class="fw-semibold fs-sm">{{ $row->phoneSend }}</td>
                                        <td>
                                            <span class="text-muted fs-sm">{{ $row->created_at }}</span>
                                        </td>
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

