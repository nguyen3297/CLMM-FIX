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
                            <h3 class="block-title">Thêm Mã Quà</h3>
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
                            <form action="{{ route('admin.giftcodePost') }}" method="POST">
                                @csrf
                                <div class="row push">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Mã quà</label>
                                            <input type="text" class="form-control" id="code"
                                                   name="code" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Số lượt dùng</label>
                                            <input type="text" class="form-control" id="used"
                                                   name="used" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Số tiền nhận</label>
                                            <input type="text" class="form-control" id="amount"
                                                   name="amount" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-secondary w-100">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                DANH SÁCH HỖ TRỢ
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table
                                class="table table-bordered table-striped table-vcenter js-dataTable-responsive dga-edits">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Mã quà</th>
                                    <th>Còn lại</th>
                                    <th>Nhận</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($giftcode as $row)
                                    <tr data-id="{{ $row->id }}">
                                        <td data-field="id" class="text-center fs-sm">{{ $row->id }}</td>
                                        <td data-field="code" class="fw-semibold fs-sm">{{ $row->code }}</td>
                                        <td data-field="used" class="fs-sm">{{ $row->used }}</td>
                                        <td data-field="amount" class="fs-sm">{{ number_format($row->amount) }}</td>
                                        <td class="fw-semibold fs-sm">@if ($row->status == 1 && $row->used > 0) <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Đang sử dụng</span> @else
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Hết hạn</span> @endif
                                        </td>
                                        <td>
                                            <span class="text-muted fs-sm">{{ $row->created_at }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                        class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button
                                                    onclick="statusGiftcode({{ $row->id }}, 'delete', 'Bạn chắc chắn muốn xóa ?')"
                                                    type="button"
                                                    class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled dropdown-toggle" id="dropdown-split-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu fs-sm"
                                                     aria-labelledby="dropdown-default-outline-dark">
                                                    <a class="dropdown-item" onclick="statusGiftcode({{ $row->id }}, 'show', 'Bạn chắc chặn muốn cho sử dụng tiếp ?')">Sử dụng</a>
                                                    <a class="dropdown-item" onclick="statusGiftcode({{ $row->id }}, 'hidden', 'Bạn chắc chặn muốn hết hạn ?')">Hết hạn</a>
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

@endsection
@section('script')
    <script>
        $(function () {
            var e = {};
            $(".dga-edits tr").editable({
                dropdowns: {
                    status: ["Hiện", "Ẩn"]
                },
                edit: function (t) {
                    $(".edit i", this).removeClass("fa-pencil-alt").addClass("fa-save").attr("title", "Save")
                },
                save: function (t) {
                    $(".edit i", this).removeClass("fa-save").addClass("fa-pencil-alt").attr("title", "Edit"), this in e && (e[this].destroy(), delete e[this])
                    saveGiftcode(t.id, t.code, t.used, t.amount);
                },
                cancel: function (t) {
                    $(".edit i", this).removeClass("fa-save").addClass("fa-pencil-alt").attr("title", "Edit"), this in e && (e[this].destroy(), delete e[this])
                }
            })
        });

        function saveGiftcode(id, code, used, amount) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "{{ route('admin.giftcodeEdit') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    code: code,
                    used: used,
                    amount: amount
                },
                success: function (data) {
                    if (data.status == "success") {
                        swal(data.message, "success");
                    } else {
                        swal(data.message, "error");
                    }
                },
            });
        }

        function statusGiftcode(id, type, mess) {
            Swal.fire({
                title: mess,
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.giftcodeStatus') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id,
                            type: type
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal(data.message, "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 2000)
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
