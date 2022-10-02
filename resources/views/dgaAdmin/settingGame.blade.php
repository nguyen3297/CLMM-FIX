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
                    <form action="{{ route('admin.settingGamePost') }}" method="POST">
                        <div class="block block-rounded">
                            @csrf
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Tỉ lệ / Nội dung</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Xác nhận
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Chẵn
                                                lẻ </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioCL"
                                                   value="{{ $setting->ratioCL }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Chẵn lẻ
                                                2 </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioCL2"
                                                   value="{{ $setting->ratioCL2 }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Tài
                                                xỉu </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioTX"
                                                   value="{{ $setting->ratioTX }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Tài xỉu
                                                2 </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioTX2"
                                                   value="{{ $setting->ratioTX2 }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận 1 phần
                                                3 </label>
                                            <input type="text" class="form-control form-control-alt" name="ratio1P3"
                                                   value="{{ $setting->ratio1P3 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Gấp
                                                3 </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioG3"
                                                   value="{{ $setting->ratioG3 }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Tiền nhận H3 </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioH3"
                                                   value="{{ $setting->ratioH3 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Lô </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioLO"
                                                   value="{{ $setting->ratioLO }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận Hũ </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioHu"
                                                   value="{{ $setting->ratioHu }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tổng tiền nhận
                                                Hũ </label>
                                            <input type="text" class="form-control form-control-alt" name="amount_hu"
                                                   value="{{ $setting->amount_hu }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận
                                                Xiên </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioXien"
                                                   value="{{ $setting->ratioXien }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Tiền nhận
                                                XSMB </label>
                                            <input type="text" class="form-control form-control-alt" name="ratioXSMB"
                                                   value="{{ $setting->ratioXSMB }}">
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Chẵn
                                                lẻ </label>
                                            <input type="text" class="form-control form-control-alt" name="contentCL"
                                                   value="{{ $setting->contentCL }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Chẵn lẻ
                                                2 </label>
                                            <input type="text" class="form-control form-control-alt" name="contentCL2"
                                                   value="{{ $setting->contentCL2 }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Tài
                                                xỉu </label>
                                            <input type="text" class="form-control form-control-alt" name="contentTX"
                                                   value="{{ $setting->contentTX }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Tài xỉu
                                                2 </label>
                                            <input type="text" class="form-control form-control-alt" name="contentTX2"
                                                   value="{{ $setting->contentTX2 }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung 1 phần
                                                3 </label>
                                            <input type="text" class="form-control form-control-alt" name="content1P3"
                                                   value="{{ $setting->content1P3 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Gấp
                                                3 </label>
                                            <input type="text" class="form-control form-control-alt" name="contentG3"
                                                   value="{{ $setting->contentG3 }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Nội dung H3 </label>
                                            <input type="text" class="form-control form-control-alt" name="contentH3"
                                                   value="{{ $setting->contentH3 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Lô </label>
                                            <input type="text" class="form-control form-control-alt" name="contentLO"
                                                   value="{{ $setting->contentLO }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung Xiên </label>
                                            <input type="text" class="form-control form-control-alt" name="contentXien"
                                                   value="{{ $setting->contentXien }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung XSMB </label>
                                            <input type="text" class="form-control form-control-alt" name="contentXSMB"
                                                   value="{{ $setting->contentXSMB }}">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Nội Dung Chuyển</h3>
                            </div>
                            <div class="block-content">
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung trả
                                                thưởng</label>
                                            <input type="text" class="form-control form-control-alt" name="content"
                                                   value="{{ $setting->content }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung trả thưởng
                                                nhiệm vụ </label>
                                            <input type="text" class="form-control form-control-alt" name="content_day"
                                                   value="{{ $setting->content_day }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung trả thưởng
                                                tuần </label>
                                            <input type="text" class="form-control form-control-alt" name="content_week"
                                                   value="{{ $setting->content_week }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung trả điểm
                                                danh </label>
                                            <input type="text" class="form-control form-control-alt"
                                                   name="content_muster"
                                                   value="{{ $setting->content_muster }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung trả
                                                hũ </label>
                                            <input type="text" class="form-control form-control-alt" name="content_hu"
                                                   value="{{ $setting->content_hu }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung hoàn
                                                tiền </label>
                                            <input type="text" class="form-control form-control-alt"
                                                   name="content_refund"
                                                   value="{{ $setting->content_refund }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Nội dung mã
                                                quà </label>
                                            <input type="text" class="form-control form-control-alt"
                                                   name="content_giftcode"
                                                   value="{{ $setting->content_giftcode }}">
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
@section('script')
    <script type="text/javascript">

        function update() {
            Swal.fire({
                title: "Bạn chắc chẵn muốn cập nhật phiên bản mới ?",
                showCancelButton: true,
                confirmButtonText: "Có",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('admin.updateVer') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
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
            });
        }

        $(document).ready(function () {
            $('.dga-select').select2();
        });
    </script>
@endsection
