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
                            <h3 class="block-title">Thêm Danh Sách Đen</h3>
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
                            <form action="{{ route('admin.blackListPost') }}" method="POST">
                                @csrf
                                <div class="row push">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="">Danh Sách Số Momo</label>
                                            <textarea rows="5" class="form-control" id="list_momo"
                                                      name="list_momo" placeholder=""></textarea>
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
                                DANH SÁCH ĐEN
                            </h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Số MOMO</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lists as $row)
                                    <tr id="td_{{ $row->id }}">
                                        <td class="text-center fs-sm">{{ $row->id }}</td>
                                        <td class="fs-sm">{{ $row->phone }}</td>
                                        <td>
                                            <span class="text-muted fs-sm">{{ $row->created_at }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button onclick="deleteMomo({{ $row->id }})" type="button"
                                                        class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
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
    <script>
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
                        url: "{{ route('admin.deleteMomoBlack') }}",
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
    </script>
@endsection
