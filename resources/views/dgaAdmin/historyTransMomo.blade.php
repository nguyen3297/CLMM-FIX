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
                </div>
                <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                    <form action="{{ route('admin.historyTransMomo') }}" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" id="limit" value="100"
                                   name="limit" placeholder="Giới hạn">
                            <select class="form-select" id="phone" name="phone">
                                @foreach($momo as $row)
                                    <option value="{{ $row->phone }}">{{ $row->phone }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="dga-datepicker-1"
                                   placeholder="From" data-date-format="dd/mm/yyyy" data-autoclose="true"
                                   data-today-highlight="true" name="from"
                                   value="{{ Carbon\Carbon::now()->subDay(1)->format('d/m/Y') }}">
                            <span class="input-group-text fw-semibold">
                  <i class="fa fa-fw fa-arrow-right"></i>
                </span>
                            <input type="text" class="form-control" id="dga-datepicker-2"
                                   placeholder="To" data-date-format="dd/mm/yyyy" data-autoclose="true" name="to"
                                   data-today-highlight="true" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search me-1"></i> Tìm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                LỊCH SỬ @if(!empty($_GET)) SỐ @php echo $_GET['phone']@endphp TỪ NGÀY @php echo $_GET['from'] @endphp ĐẾN @php echo $_GET['to']@endphp @endif
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th>Mã giao dịch</th>
                                    <th>Số MOMO</th>
                                    <th>Người chuyển</th>
                                    <th>Số tiền</th>
                                    <th>Nội dung</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 0; @endphp
                                @foreach($history as $row)
                                    <tr>
                                        <td class="fw-semibold fs-sm">{{ $row['tranId'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row['patnerID'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row['partnerName'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['amount']) }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row['comment'] }}</td>
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
            $("#dga-datepicker-1").datepicker({
                language: "vi"
            });
            $("#dga-datepicker-2").datepicker({
                language: "vi"
            });

        });
    </script>
@endsection
