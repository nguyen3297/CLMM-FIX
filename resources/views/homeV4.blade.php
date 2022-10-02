<!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Hệ Thống chẵn lẻ Momo uy tín Giao dịch tự động 24/7 </title>
    <link href="{{ $setting->favicon }}" rel="apple-touch-icon"/>
    <link href="{{ $setting->favicon }}" rel="shortcut icon" type="image/x-icon"/>

    <meta name="csrf-token" content="tARpYSDg4Wuqy3nHQ6OwJUlEbKajc7Z1TrCvBNdPImLG"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="Hệ Thống chẵn lẻ Momo uy tín Giao dịch tự động 24/7"/>
    <meta name="description"
          content="Chẵn lẻ momo là game thuộc dạng xanh chín nhất hiện tại, được rất nhiều người chơi tham gia. Trong này rất nhiều game  cho anh em kiếm tiền được đảo bảo uy tín 100% và được đóng bảo hiểm"/>
    <meta name="keywords" content=""/>
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Hệ Thống chẵn lẻ Momo uy tín Giao dịch tự động 24/7">
    <meta property="og:description"
          content="Chẵn lẻ momo là game thuộc dạng xanh chín nhất hiện tại, được rất nhiều người chơi tham gia. Trong này rất nhiều game  cho anh em kiếm tiền được đảo bảo uy tín 100% và được đóng bảo hiểm">
    <link rel="stylesheet" href="{{ url('') }}/themes-v4/assets/css2/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/themes-v4/assets/css2/style.css">
    <link rel="stylesheet" href="{{ url('') }}/themes-v4/assets/css2/custom-ui.min.css">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ url('') }}/themes-v4/assets/css2/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.4/dist/simple-notify.min.css"/>
    <style>
        .footer {
            padding: 10px 0;
            margin-top: 2em;
            font-size: 12px;
            background: {{ $setting->color }};
        }

        .navbar {
            position: relative;
            z-index: 501;
            min-height: 60px;
            margin-bottom: 0;
            background-color: {{ $setting->color }};
            border: none;
            border-top-right-radius: 0;
            border-top-left-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0
        }

        .mainbar {
            width: 100%;
            padding: 5px 0;
            text-align: center;
            background: {{ $setting->color }};
            border-bottom: 10px solid #fff;
        }

        .btn-default {
            color: #fff;
            background-color: {{ $setting->color }};
            border-color: {{ $setting->color }};
        }

        .panel-primary {
            border-radius: 15px;
            border-color: #000000
        }

        .panel-primary > .panel-heading {
            color: #fff;
            background-color: {{ $setting->color }};
            border-color: {{ $setting->color }};
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
        }

        .panel-primary > .panel-heading + .panel-collapse .panel-body {
            border-top-color: {{ $setting->color }}
        }

        .panel-primary > .panel-footer + .panel-collapse .panel-body {
            border-bottom-color: {{ $setting->color }}
        }

        .aa:hover,
        .aa:focus {
            background: #000000;
            border-radius: 5px
        }

        .bg-primary {
            color: #fff;
            background-color: {{ $setting->color }} !important;
        }

        .btn-secondary {
            color: #fff;
            background-color: #000000;
            border-color: #000000;
        }

        .table-bordered thead tr th,
        .table-bordered tfoot tr th {
            color: {{ $setting->color }};
            font-size: 13px;
            font-weight: 800;
            background-color: transparent;
            border-bottom-width: 1px;
            vertical-align: middle
        }

        .coffer-box {
            display: block;
            position: fixed;
            bottom: 90px;
            right: 15px;
            width: 15%;
            z-index: 1000;
            cursor: pointer;
            border-radius: 10px;
            text-align: center;
            padding: 15px;
        }

        @media (max-width: 767px) {
            .coffer-box {
                background: unset;
                width: 50%;
                bottom: 20px;
            }
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .dot-text-1 {
            color: #f0ad4e
        }

        .dot-text-2 {
            color: #5bc0de
        }

        .dot-text-3 {
            color: #5cb85c
        }

        .dot-text-4 {
            color: #d9534f
        }

        .dot-text-5 {
            color: #5bc0de
        }

        .dot-text-6 {
            color: #5bc0de
        }

        .dot-text-7 {
            color: #5cb85c
        }

        .dot-text-8 {
            color: #d9534f
        }

        .dot-text-9 {
            color: #f0ad4e
        }

        .dot-text-10 {
            color: #f0ad4e
        }

        .dot-text-11 {
            color: #5cb85c
        }

        .dot-text-12 {
            color: #d9534f
        }

        .dot-text-13 {
            color: #f0ad4e
        }

        .dot-text-14 {
            color: #5bc0de
        }

        .dot-text-15 {
            color: #5cb85c
        }

        .dot-text-16 {
            color: #d9534f
        }

        .dot-text-17 {
            color: #f0ad4e
        }

        .dot-text-18 {
            color: #5bc0de
        }

        .dot-text-19 {
            color: #5cb85c
        }

        .alert-danger {
            color: #000000;
            border-color: #bce8f1;
            background-color: #d9edf7;
        }

        .my-notify .notify-content .notify__title {
            font-size: 15px;
        }

        .my-notify .notify-content .notify__text {
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="container">
        <div class="navbar-header">
            <marquee width="100%" behavior="scroll"
                     style="display: block;position: fixed;bottom: 70 px;left: 15 px;z-index: 1000;cursor: pointer;width: 100%;">
                <font color="white"
                      style="font-size: 15px; text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Cảnh
                        báo: Hiện nay có rất nhiều Website lừa đảo, anh em chú ý chỉ chơi trên này và không nên thử các
                        web khác tránh mất tiền oan!</b></font>
            </marquee>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand navbar-brand-image" href="/">
                <div class="hidden-xs">
                    <img src="{{ $setting->logo }}"
                         style="margin-top: -5px;margin-bottom: 10px;width: 160px;" alt="Logo">
                </div>
                <div class="visible-xs">
                    <img src="{{ $setting->logo }}" style="margin-top: -0px;/* margin: 10px; */width: 160px;"
                         alt="Logo">
                </div>
            </a>
        </div>
    </div>
</div>
<div class="mainbar hidden-xs">
    <div class="container"></div>
</div>
<div class="container">
    <div class="content">
        <div class="content-container">
            <div class="py-5" style="min-height:80px !important;">
                <div class="output" id="output">
                    <h3 class="cursor">Hệ Thống MiniGame MoMo Tự Động</h3>
                    <h4>Uy Tín - Nhanh Gọn - Hỗ Trợ 24/7 - Giao Dịch Tự Động - Trả Thưởng 3 Giây</h4>
                    <strong class="text-primary-2">Mỗi Lần Chơi AE Chú Ý Load Lại WEB Lấy Số Chơi Nhá</strong>
                </div>
                <div class="text-center mt-5">
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#noteModal">Xem
                            Lưu Ý
                        </button>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="chanle">
                        Chẵn Lẻ
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="chanle2">
                        Chẵn Lẻ 2
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="taixiu">
                        Tài Xỉu
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="taixiu2">
                        Tài Xỉu 2
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="x3">
                        1 Phần 3
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="gap3">
                        Gấp 3
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="tong3so">
                        Tổng 3 Số
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="hieu2so">
                        H3
                    </button>
                    <button class="btn btn-default btn-primary mt-1 hidden" data-game="lo">
                        Lô
                    </button>
                    <div class="text-center mt-5" role="group">
                        <button class="btn btn-outline-primary mt-1 hidden" data-minigame="day_mission"
                                style="position: relative;">
                            Nhiệm Vụ Ngày
                            <b class="text-danger"
                               style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 25px;font-size: 9px;"><font
                                    color="red">(HOT)</font></b>
                        </button>
                        <button class="btn btn btn-outline-primary mt-1 hidden" data-minigame="refer_friend"
                                style="position: relative;">
                            Giới thiệu bạn bè
                            <b class="text-danger"
                               style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 25px;font-size: 9px;"><font
                                    color="red">(NEW)</font></b>
                        </button>
                        <button class="btn btn-outline-primary mt-1 hidden" data-minigame="wheel"
                                style="position: relative;">
                            Vòng Xoay May Mắn
                            <b class="text-danger"
                               style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 25px;font-size: 9px;"><font
                                    color="red">(NEW)</font></b>
                        </button>
                        <button class="btn btn-outline-primary mt-1 hidden" data-minigame="diemdanh"
                                style="position: relative;">
                            Điểm danh nhận quà
                            <b class="text-danger"
                               style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 25px;font-size: 9px;"><font
                                    color="green"><i class="fa fa-clock-o" aria-hidden="true"></i> <b
                                        id="diemdanh_time">0</b></font> <font color="6861b1"><i class="fa fa-users"
                                                                                                aria-hidden="true"></i>
                                    <b id="diemdanh_users">0</b></font></b>
                        </button>
                        <button class="btn btn btn-outline-primary mt-1 hidden" data-minigame="giftcode"
                                style="position: relative;">
                            Nhập CODE Khuyến Mãi
                            <b class="text-danger"
                               style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 25px;font-size: 9px;"><font
                                    color="red">(NEW)</font></b>
                        </button>
                    </div>
                    <div class="row justify-content-md-center box-cl">
                        <div class="col-md-6 mt-3 cl">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center"> Cách chơi</div>
                                <div class="play-rules">
                                </div>
                                <div class="minigame-rules">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3 text-center cl">
                            <div class="panel panel-primary">
                                <div class="panel-heading"> KIỂM TRA MÃ GIAO DỊCH</div>
                                <div class="panel-body">
                                    <div class="alert alert-danger text-left">
                                        <p>Nếu quá 10 phút chưa nhận được tiền vui lòng dán mã giao dịch vào đây để kiểm
                                            tra. </p>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <label for="tran_id">Nhập mã giao dịch</label>
                                            <input type="number" class="form-control" id="tran_id" name="tran_id"
                                                   placeholder="Mã giao dịch: Ví dụ 11223344556">
                                            <small id="checkHelp" class="form-text text-muted">Nhập mã giao dịch của bạn
                                                để kiểm tra.</small>
                                        </div>
                                        <button type="button" onclick="DUNGA.check_tranid()"
                                                class="btn btn-primary mb-2">Kiểm tra
                                        </button>
                                        <div id="result-check" style="margin-top: 5px;"></div>
                                    </div>
                                    <div id="contact" class="mt-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 25px; margin-bottom: 25px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="text-center mt-3" style="font-size: 24px"> TRẠNG THÁI MOMO</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                            <tr role="row" class="bg-primary">
                                                <th class="text-center text-white">Số điện thoại</th>
                                                <th class="text-center text-white">Trạng thái</th>
                                                <th class="text-center text-white">Hạn mức</th>
                                                <th class="text-center text-white">Số GD</th>
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all"
                                                   id="momo-status" class="">
                                            </tbody>
                                        </table>
                                        <div class="text-center font-weight-bold"><b>Làm mới sau <span
                                                    class="text-danger coundown-time">0</span> s</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="panel panel-primary">
                            <div class="text-center mt-3" style="font-size: 24px"> LỊCH SỬ THAM GIA</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center">
                                        <thead>
                                        <tr role="row" class="bg-primary">
                                            <th class="text-center text-white">Số điện thoại</th>
                                            <th class="text-center text-white">Tiền cược</th>
                                            <th class="text-center text-white">Nội dung</th>
                                            <th class="text-center text-white">Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all" id="history">
                                        </tbody>
                                    </table>
                                    <div class="text-center font-weight-bold"><b>Làm mới sau <span
                                                class="text-danger coundown-time">0</span> s</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 25px; margin-bottom: 25px;">
                <div class="row week_top hidden" id="list">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="text-center mt-3" style="font-size: 24px"> TOP TUẦN</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                            <tr role="row" class="bg-primary">
                                                <th class="text-center text-white">Top</th>
                                                <th class="text-center text-white">Số điện thoại</th>
                                                <th class="text-center text-white">Số tiền</th>
                                                <th class="text-center text-white">Phần thưởng</th>
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all"
                                                   id="week_top" class="">
                                            </tbody>
                                        </table>
                                        <div class="text-center h4 font-weight-bold text-danger"><b>Lưu ý: Phần
                                                thưởng top sẽ được trao vào 24h chủ nhật hàng tuần!</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white text-center">
                <img src="{{ $setting->logo }}"
                     style="margin-top: -5px;margin-bottom: 10px;width: 160px;" alt="Logo">
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="note_modal">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đã hiểu</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hu-info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h3 class="modal-title"></h3>
                <h2 class="text-danger"><b>NỔ HŨ GAME</b></h2>
            </div>
            <div class="modal-body" id="result_hu">
                <center><img class="animate__animated animate__heartBeat animate__infinite infinite"
                             src="/upload/files/hu.png" width="30%" style=""/></center>
                1. Hệ thống tự động thêm vào hũ <b>{{ number_format($setting->amount_hu) }}đ</b> sau khi người chơi được
                nổ hũ <br>
                2. Người chơi sẽ được nổ hũ với điều kiện: <br>
                - <b>Nổ 100% hũ:</b> Nếu 5 số cuối của mã giao dịch momo trùng nhau. <br>
                - <b>Nổ {{ $setting->ratioHu }}% hũ:</b> Nếu 4 số cuối của mã giao dịch momo trùng nhau. <br>
                - Ví dụ 1: Mã giao dịch <b>20235788888</b> có 5 số cuối là <b>88888</b> đều là <b>8</b>. <br>
                + Người chơi sẽ ăn toàn bộ tiền trong hũ. <br>
                - Ví dụ 2: Mã giao dịch <b>20235786666</b> có 4 số cuối là <b>6666</b> đều là <b>6</b>. <br>
                + Người chơi sẽ ăn <b>{{ $setting->ratioHu }}%</b> tiền trong hũ. <br>
                3. Sau khi bạn được Nổ Hũ vui lòng LH chát <b>CSKH</b> gửi mã giao dịch để nhận tiền. <br>
                (Lưu ý trương trình chỉ áp dụng trong ngày, qua ngày sẽ không được tính)
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="border-radius: 0;" data-dismiss="modal">Đóng
                </button>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('') }}/themes-v4/assets/js/jquery.min.js"></script>
<script src="{{ url('') }}/themes-v4/assets/js/jquery-ui.custom.min.js"></script>
<script src="{{ url('') }}/themes-v4/assets/js/jquery.validate.min.js"></script>
<script src="{{ url('') }}/themes-v4/assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.4/dist/simple-notify.min.js"></script>
<script src="{{ url('') }}/themes-v4/assets/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/themes-v4/assets/js/script.js"></script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('[data-toggle="tooltip"]').tooltip();
        $('.cash-format').each(function (index) {
            $(this).html(parseInt($(this).text()).toLocaleString('it-IT', {
                style: 'currency',
                currency: 'VND'
            }));
        });
        $('button[data-game]').click(function () {
            let button = $(this);
            let game = button.attr('data-game');
            game_active = game;
            $('.game').addClass('hidden');
            $(`.game[game-tab=${game}]`).removeClass("hidden");
            $("button[data-game]").removeClass("btn-info").addClass("btn-primary");
            $("[data-minigame]").removeClass("btn-success");
            button.removeClass("btn-primary").addClass("btn-info");
        });
        $('button[data-minigame]').click(function () {
            let button = $(this);
            let game = button.attr('data-minigame');
            game_active = "minigame";
            $('.game').addClass('hidden');
            $(`.game[game-tab=${game}]`).removeClass("hidden");
            $("[data-minigame]").removeClass("btn-success");
            $("[data-game]").removeClass("btn-success").addClass("btn-primary");
            button.addClass("btn-success");
        });
    });
</script>

</body>
</html>
