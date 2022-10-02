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
                    <form action="{{ route('admin.settingEdit') }}" method="POST">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Cài Đặt Hệ Thống</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Xác nhận
                                    </button>
                                    <a onclick="update()" class="btn btn-sm btn-warning">
                                        Cập nhật phiên bản mới
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Tiêu đề</label>
                                            <input type="text" class="form-control form-control-alt" name="title"
                                                   value="{{ $setting->title }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Tên website</label>
                                            <input type="text" class="form-control form-control-alt" name="name"
                                                   value="{{ $setting->name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Keywords</label>
                                            <input type="text" class="form-control form-control-alt" name="keywords"
                                                   value="{{ $setting->keywords }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Mô tả</label>
                                            <input type="text" class="form-control form-control-alt" name="description"
                                                   value="{{ $setting->description }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Logo</label>
                                            <input type="text" class="form-control form-control-alt" name="logo"
                                                   value="{{ $setting->logo }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Favicon</label>
                                            <input type="text" class="form-control form-control-alt" name="favicon"
                                                   value="{{ $setting->favicon }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Background</label>
                                            <input type="text" class="form-control form-control-alt" name="background"
                                                   value="{{ $setting->background }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Quảng cáo</label>
                                            <textarea type="text" class="form-control form-control-alt"
                                                      name="ads">{{ $setting->ads }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Thông báo</label>
                                            <textarea type="text" class="form-control form-control-alt dga-edit"
                                                      id="editor"
                                                      name="note">{{ $setting->note }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Color</label>
                                            <input type="color"
                                                   class="form-control" name="color"
                                                   value="{{ $setting->color }}"/>
                                        </div>
                                    </div>

                                    @if($setting->status == 1)
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Bảo trì</label>
                                                <select class="form-select" id="status" name="status">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Bảo trì</label>
                                                <select class="form-select" id="status" name="status">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->only_win == 1)
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Chỉ hiện thắng</label>
                                                <select class="form-select" id="only_win" name="only_win">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Chỉ hiện thắng</label>
                                                <select class="form-select" id="only_win" name="only_win">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->day_mission == 1)
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Nhiệm vụ</label>
                                                <select class="form-select" id="day_mission" name="day_mission">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Nhiệm vụ</label>
                                                <select class="form-select" id="day_mission" name="day_mission">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->week_top == 1)
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Top tuần</label>
                                                <select class="form-select" id="week_top" name="week_top">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Top tuần</label>
                                                <select class="form-select" id="week_top" name="week_top">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->day_top == 1)
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Top ngày</label>
                                                <select class="form-select" id="day_top" name="day_top">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Top ngày</label>
                                                <select class="form-select" id="day_top" name="day_top">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Phần thưởng tuần (Tách
                                                bởi dấu |)</label>
                                            <input type="text" class="form-control form-control-alt" name="gift_week"
                                                   value="{{ $setting->gift_week }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Phần thưởng ngày (Tách
                                                bởi dấu |)</label>
                                            <input type="text" class="form-control form-control-alt" name="gift_day"
                                                   value="{{ $setting->gift_day }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Chỉ tiêu phần thưởng
                                                ngày (Tách bởi dấu |)</label>
                                            <input type="text" class="form-control form-control-alt" name="level_day"
                                                   value="{{ $setting->level_day }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> Giới hạn lịch
                                                sử </label>
                                            <input type="text" class="form-control form-control-alt" name="limit"
                                                   value="{{ $setting->limit }}">
                                        </div>
                                    </div>
                                    @if($setting->hu == 1)
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Hũ</label>
                                                <select class="form-select" id="hu" name="hu">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Hũ</label>
                                                <select class="form-select" id="hu" name="hu">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->muster == 1)
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Điểm danh</label>
                                                <select class="form-select" id="muster" name="muster">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Điểm danh</label>
                                                <select class="form-select" id="muster" name="muster">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->refund == 1)
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Hoàn tiền</label>
                                                <select class="form-select" id="refund" name="refund">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Hoàn tiền</label>
                                                <select class="form-select" id="refund" name="refund">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->giftcode == 1)
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Giftcode</label>
                                                <select class="form-select" id="giftcode" name="giftcode">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Giftcode</label>
                                                <select class="form-select" id="giftcode" name="giftcode">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if($setting->pay_muster == 1)
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Trả điềm danh</label>
                                                <select class="form-select" id="pay_muster" name="pay_muster">
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="example-select">Trả điềm danh</label>
                                                <select class="form-select" id="pay_muster" name="pay_muster">
                                                    <option value="0">OFF</option>
                                                    <option value="1">ON</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> SỐ TIỀN NHẬN ĐIỂM DANH
                                                (|)</label>
                                            <input type="text" class="form-control form-control-alt"
                                                   name="amount_muster"
                                                   value="{{ $setting->amount_muster }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> SỐ NGƯỜI CHƠI ĐỂ QUÉT
                                                ĐIỂM DANH</label>
                                            <input type="text" class="form-control form-control-alt" name="total_muster"
                                                   value="{{ $setting->total_muster }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> TOP TUẦN SỐ CHƠI (FAKE
                                                TOP)</label>
                                            <input type="text" class="form-control form-control-alt" name="top_phone"
                                                   value="{{ $setting->top_phone }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> TOP TUẦN TIỀN CHƠI
                                                (FAKE TOP)</label>
                                            <input type="text" class="form-control form-control-alt" name="top_amount"
                                                   value="{{ $setting->top_amount }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> SỐ LƯỢT HOÀN TIỀN
                                                TRONG NGÀY</label>
                                            <input type="text" class="form-control form-control-alt" name="limit_refund"
                                                   value="{{ $setting->limit_refund }}">
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> CHỮ CHẠY</label>
                                            <input type="text" class="form-control form-control-alt" name="text_run"
                                                   value="{{ $setting->text_run }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> % HOÀN TIỀN</label>
                                            <input type="text" class="form-control form-control-alt" name="amountRF"
                                                   value="{{ $setting->amountRF }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username"> NỘI DUNG NẠP</label>
                                            <input type="text" class="form-control form-control-alt" name="cmtPay"
                                                   value="{{ $setting->cmtPay }}">
                                        </div>
                                    </div>

                                    {{--                                    <div class="col-sm-6">--}}
                                    {{--                                        <div class="mb-4">--}}
                                    {{--                                            <label class="form-label" for="example-select">Minigame</label>--}}
                                    {{--                                            <select class="js-select2 form-select dga-select" id="example-select2-multiple"--}}
                                    {{--                                                    name="example-select2-multiple" style="width: 100%;" multiple>--}}
                                    {{--                                                <option></option>--}}
                                    {{--                                                <option value="1">Chẵn lẻ</option>--}}
                                    {{--                                                <option value="2"></option>--}}
                                    {{--                                                <option value="3">JavaScript</option>--}}
                                    {{--                                                <option value="4">PHP</option>--}}
                                    {{--                                                <option value="5">MySQL</option>--}}
                                    {{--                                                <option value="6">Ruby</option>--}}
                                    {{--                                                <option value="7">Angular</option>--}}
                                    {{--                                                <option value="8">React</option>--}}
                                    {{--                                                <option value="9">Vue.js</option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

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
        tinymce.init({
            selector: '#editor'
        });


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
