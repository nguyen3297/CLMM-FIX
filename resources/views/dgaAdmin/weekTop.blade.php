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
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <button onclick="weekTop()" class="btn btn-secondary w-100">Trả Thưởng</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                TOP NGÀY
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Số MOMO</th>
                                    <th>Tiền chơi</th>
                                    <th>Tiền nhận</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($UserTopDay as $row)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $row['key'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row['phone'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['amount']) }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['gift']) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                TOP TUẦN
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Số MOMO</th>
                                    <th>Tiền chơi</th>
                                    <th>Tiền nhận</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($UserTopTuan as $row)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $row['key'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row['phone'] }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['amount']) }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row['gift']) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                LỊCH SỬ TRẢ THƯỞNG
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Số MOMO</th>
                                    <th>Tiền chơi</th>
                                    <th>Tiền nhận</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày nhận</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($top as $row)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $row->id }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row->phone }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->amount) }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->gift) }}</td>
                                        <td class="fw-semibold fs-sm">@if ($row->status == 1) <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Đã trả</span> @elseif($row->status == 100) <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Chuyển lỗi</span> @else <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Chưa trả</span> @endif</td>
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

    <script>
        function weekTop() {
            Swal.fire({
                title: "Bạn chắc chẵn muốn trả thưởng tuần ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.payWeekTop') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 3000);
                            } else {
                                swal(data.message, "error");
                            }
                        },
                    });
                }
            });
        }
    </script>

@endsection



