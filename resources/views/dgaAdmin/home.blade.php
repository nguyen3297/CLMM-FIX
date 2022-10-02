@extends('dgaAdmin.app')
@section('main')
    <main id="main-container">
        <div class="content">
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        Trang chủ
                    </h1>
                </div>
                <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                    <form action="{{ route('admin.home') }}" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-alt js-flatpickr" id="dga-datepicker"
                                   data-date-format="yyyy-mm-dd"
                                   name="date"
                                   value="@if(!empty($_GET['date']))@php echo $_GET['date']@endphp@else{{ date('Y-m-d', time()) }}@endif">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search me-1"></i> Tìm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content">
            <!--<div class="row items-push">-->
            <!--    <div class="col-sm-6 col-xxl-6">-->
            <!--        <div class="block block-rounded d-flex flex-column h-100 mb-0">-->
            <!--            <div-->
            <!--                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">-->
            <!--                <dl class="mb-0">-->
            <!--                    <dt class="fs-3 fw-bold">{{ number_format($total['turnWin']) }}</dt>-->
            <!--                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">-->
            <!--                        Số lượt thắng-->
            <!--                    </dd>-->
            <!--                </dl>-->
            <!--                <div class="item item-rounded-lg bg-body-light">-->
            <!--                    <i class="far fa-money-bill-1 fs-3 text-primary"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-sm-6 col-xxl-6">-->
            <!--        <div class="block block-rounded d-flex flex-column h-100 mb-0">-->
            <!--            <div-->
            <!--                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">-->
            <!--                <dl class="mb-0">-->
            <!--                    <dt class="fs-3 fw-bold">{{ number_format($total['turnLose']) }}</dt>-->
            <!--                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">-->
            <!--                        Số lượt thua-->
            <!--                    </dd>-->
            <!--                </dl>-->
            <!--                <div class="item item-rounded-lg bg-body-light">-->
            <!--                    <i class="far fa-money-bill-1 fs-3 text-primary"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <h2 class="content-heading">THỐNG KÊ THU NHẬP</h2>
            <div class="row items-push">
                <div class="col-sm-6 col-xxl-4">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">

                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Thống kê hôm nay</dd>
                                <span class="text-nowrap d-block">Tổng nhận: <strong>{{ number_format($total['amountALLDay']) }} VND</strong></span>
                                <span class="text-nowrap d-block">Tổng trừ: <strong>{{ number_format($total['amountSendALLDay']) }} VND</strong></span>
                                <span class="text-nowrap d-block">Doanh thu: {{ number_format($total['today']) }}</span>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-money-bill-1 fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-4">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">

                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">
                                    Thống kê hôm qua
                                </dd>
                                <span class="text-nowrap d-block">Tổng nhận: <strong>{{ number_format($total['amountALLlastDay']) }} VND</strong></span>
                                <span class="text-nowrap d-block">Tổng trừ: <strong>{{ number_format($total['amountSendALLlastDay']) }} VND</strong></span>
                                <span class="text-nowrap d-block">Doanh thu: {{ number_format($total['lastDay']) }}</span>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-money-bill-1 fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-4">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">

                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Thống kê tháng này</dd>
                                <span class="text-nowrap d-block">Tổng nhận: <strong>{{ number_format($total['amountALLMonth']) }} VND</strong></span>
                                <span class="text-nowrap d-block">Tổng trừ: <strong>{{ number_format($total['amountSendALLMonth']) }} VND</strong></span>
                                <span class="text-nowrap d-block">Doanh thu: {{ number_format($total['month']) }}</span>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-money-bill-1 fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="block block-rounded block-mode">
                <div class="block-header block-header-default">
                    <h3 class="block-title">THÔNG KÊ
                        NGÀY @if (!empty($_GET['date'])) @php echo $_GET['date'] @endphp @else {{ date('Y-m-d', time()) }} @endif</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="tab-pane active" id="all" role="tabpanel"
                                 aria-labelledby="all-tab">
                                <div class="">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vcenter">
                                                <tbody class="fs-sm">
                                                <tr>
                                                    <td>
                                                    <span class="fw-semibold text-success">
                                                        Tổng nhận: {{ number_format($total['amountALLDay']) }} VND</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <span class="fw-semibold text-danger">
                                                        Tổng trừ: {{ number_format($total['amountSendALLDay']) }}
                                                            VND</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <span class="fw-semibold text-warning">
                                                        Doanh thu: {{ number_format($total['amountALLDay'] - $total['amountSendALLDay']) }}
                                                            VND</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                THỐNG KÊ SỐ ĐIỆN THOẠI THEO THÁNG
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th style="width: 10%;">Số MOMO</th>
                                    <th>Tổng nhận</th>
                                    <th>Tổng trả </th>
                                    <th>Doanh thu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($UserTopMonth as $row)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $i++ }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row['phone'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['amountAll']) }} VND /
                                            <sub>{{ number_format($row['turnAll']) }} lần</sub></td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['amountWin']) }} VND /
                                            <sub>{{ number_format($row['turnWin']) }} lần</sub></td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['doanhthu']) }} VND</td>
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
@section('script')
    <script>
        $(function () {
            $.fn.datepicker.dates['vi'] = {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin: ["CN", "T2", "T3", "T4", "T", "T5", "T6"],
                months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                monthsShort: ["Th 1", "Th 2", "Th 3", "Th 4", "Th 5", "Th 6", "Th 7", "Th 8", "Th 9", "Th 10", "Th 11", "Th 12"],
                today: "Hôm nay",
                clear: "Xóa",
                format: "yyyy/mm/dd",
                titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                weekStart: 0
            };
            $("#dga-datepicker").datepicker({
                language: "vi"
            });
        });
    </script>
@endsection
