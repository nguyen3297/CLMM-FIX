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
                        Danh sách - thêm momo.
                    </h2>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <button onclick="loginAllMomo()" class="btn btn-secondary w-100">Login ALL MOMO</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-4">
                        <button onclick="checkStatusTransfer()" class="btn btn-secondary w-100">Check ALL History
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    @if ($errors->has('status'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <p class="mb-0">
                                {{ $errors->first('message') }}
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">THÊM SỐ MOMO</h3>
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
                            <form action="{{ route('admin.verifyMomo') }}" method="POST">
                                @csrf
                                <div class="row push">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Số MOMO</label>
                                            <input type="text" class="form-control" id="phone"
                                                   name="phone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Mã OTP</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="otp" name="otp"
                                                       placeholder="" maxlength="6">
                                                <button type="button" class="btn btn-dark" id="btnGETOTP">Lấy OTP
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Mật khẩu</label>
                                            <input type="password" class="form-control" id="password" maxlength="6"
                                                   name="password" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Tối thiểu</label>
                                            <input type="text" class="form-control" id="min"
                                                   name="min" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Tối đa</label>
                                            <input type="text" class="form-control" id="max"
                                                   name="max" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Proxy</label>
                                            <input type="text" class="form-control" id="proxy"
                                                   name="proxy" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for=""> (Nhập đầy đủ thông tin rồi hẵn lấy OTP và
                                                thêm) </label>
                                            <button class="btn btn-secondary w-100">Thêm MOMO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="block block-rounded block-mode-hidden">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">CHUYỂN TIỀN MOMO</h3>
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
                            <form action="{{ route('admin.sendMoney') }}" method="POST">
                                @csrf
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="example-select">Số MOMO chuyển</label>
                                            <select class="form-select" id="phoneSend" name="phoneSend">
                                                @foreach($GetAccountMomo as $row)
                                                    <option value="{{ $row->phone }}">{{ $row->phone }} / {!! $row->status_text !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Số MOMO nhận</label>
                                            <input type="text" class="form-control" id="phone"
                                                   name="phone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Số tiền</label>
                                            <input type="text" class="form-control" id="amount"
                                                   name="amount" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Nội dung</label>
                                            <input type="text" class="form-control" id="comment"
                                                   name="comment" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-secondary w-100">Chuyển Tiền</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                DANH SÁCH MOMO | TỔNG SỐ DƯ <b class="text-success">{{ number_format($total) }} VND</b>
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th style="width: 15%;">Tên MOMO</th>
                                    <th>Số MOMO</th>
                                    <th>Số dư</th>
                                    <th>Lần chuyển</th>
                                    <th>Hạn mức ngày</th>
                                    <th>Hạn mức tháng</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 15%;">Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($GetAccountMomo as $row)
                                    <tr id="td_{{ $row->id }}">
                                        <td class="text-center fs-sm">{{ $row->id }}</td>
                                        <td class="fw-semibold fs-sm">{{ $row->name }}</td>
                                        <td class="fs-sm">{{ $row->phone }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->balance) }} VND</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->times) }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->amount) }}</td>
                                        <td class="fw-semibold fs-sm">{{ number_format($row->amountMonth) }}</td>
                                        <td>
                                            {!! $row->status_text !!}
                                        </td>
                                        <td>
                                            <span class="text-muted fs-sm">{{ $row->created_at }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                        class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                                        onclick="infoMomo({{ $row->id }})">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button onclick="deleteMomo({{ $row->id }})" type="button"
                                                        class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled dropdown-toggle" id="dropdown-split-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu fs-sm"
                                                     aria-labelledby="dropdown-default-outline-dark">
                                                    <a class="dropdown-item" onclick="activeMomo({{ $row->id }})">Hoạt động</a>
                                                    <a class="dropdown-item" onclick="maintenanceMomo({{ $row->id }})">Bảo trì</a>
                                                    <a class="dropdown-item" onclick="hideMomo({{ $row->id }})">Ẩn Momo</a>
                                                    <a class="dropdown-item" onclick="soakMomo({{ $row->id }})">Ngâm Momo</a>
                                                    <a class="dropdown-item" onclick="loginOneMomo({{ $row->id }})">Đăng nhập</a>
                                                </div>
                                            </div>
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
    <div class="modal" id="infoMomo" tabindex="-1" role="dialog" aria-labelledby="infoMomo" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">THÔNG TIN MOMO</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm" id="showInfo">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#btnGETOTP").click(function () {
            var phone = $("#phone").val();
            var password = $("#password").val();
            var min = $("#min").val();
            var max = $("#max").val();
            var proxy = $("#proxy").val();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "{{ route('admin.getOTP') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    phone: phone,
                    password: password,
                    min: min,
                    max: max,
                    proxy: proxy
                },
                success: function (data) {
                    if (data.status == "success") {
                        swal(data.message, "success");
                    } else {
                        swal(data.message, "error");
                    }
                },
            });
        });

        function deleteMomo(phone) {
            Swal.fire({
                title: "Bạn chắc chẵn muốn xóa số momo này ?",
                showCancelButton: true,
                confirmButtonText: "Xóa",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.deleteMomo') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            phone: phone,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                document.getElementById("td_" + phone).remove();
                            } else {
                                swal(data.message, "error");
                            }
                        },
                    });
                }
            });
        }

        function soakMomo(phone) {
            Swal.fire({
                title: "Bạn chắc chẵn muốn ngâm momo này ?",
                showCancelButton: true,
                confirmButtonText: "Chắc chắn",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.soakMomo') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            phone: phone,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                $("#status_" + phone).className = 'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning';
                                $("#status_" + phone).innerHTML = 'Ngâm';
                            } else {
                                swal(data.message, "error");
                            }
                        },
                    });
                }
            });
        }

        function loginAllMomo() {
            Swal.fire({
                title: "Bạn chắc chẵn muốn đăng nhập lại toàn bộ momo ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.loginAllMomo') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                setTimeout(function () {
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

        function checkStatusTransfer() {
            Swal.fire({
                title: "Bạn muốn kiểm tra trạng thái lịch sử ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.checkStatusTransfer') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                setTimeout(function () {
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

        function infoMomo(phone) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "{{ route('admin.infoMomo') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    phone: phone,
                },
                success: function (data) {
                    if (data.status == "success") {
                        $('#showInfo').html(data.html)
                    } else {
                        swal(data.message, "error");
                    }
                },
            });
            $('#infoMomo').modal('show');
        }

        function activeMomo(phone) {
            Swal.fire({
                title: "Bạn chắc chẵn muốn chỉnh trạng thái hoạt động số momo này ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.activeMomo') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            phone: phone,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                $("#status_" + phone).className = 'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success';
                                $("#status_" + phone).innerHTML = 'Hoạt động';
                            } else {
                                swal(data.message, "error");
                            }
                        },
                    });
                }
            });
        }

        function loginOneMomo(phone) {
            Swal.fire({
                title: "Bạn chắc chẵn muốn đăng nhập lại số momo này ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.loginMomoOne') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            phone: phone,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                $("#status_" + phone).className = 'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success';
                                $("#status_" + phone).innerHTML = 'Hoạt động';
                            } else {
                                swal(data.message, "error");
                            }
                        },
                    });
                }
            });
        }

        function hideMomo(phone) {
            Swal.fire({
                title: "Bạn chắc chẵn muốn chỉnh trạng thái ẩn số momo này ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.hideMomo') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            phone: phone,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                $("#status_" + phone).className = 'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger';
                                $("#status_" + phone).innerHTML = 'Ẩn';
                            } else {
                                swal(data.message, "error");
                            }
                        },
                    });
                }
            });
        }

        function maintenanceMomo(phone) {
            Swal.fire({
                title: "Bạn chắc chẵn muốn chỉnh trạng thái bảo trì số momo này ?",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.maintenanceMomo') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            phone: phone,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                $("#status_" + phone).className = 'fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger';
                                $("#status_" + phone).innerHTML = 'Bảo trì';
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
