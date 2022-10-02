<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $setting->title }}</title>
<meta name="description"
content="{{ $setting->description }}">
<meta name="author" content="PRO">
<meta property="og:url" content="{{ url('') }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image" content="{{ $setting->title }}">
<meta property="og:type" content="article">
<meta property="og:title" content="description">
<meta property="fb:app_id" content="162841082312048">
<meta property="og:description"
content="{{ $setting->description }}">
<link rel="shortcut icon" href="{{ $setting->favicon }}">
<link rel="icon" type="image/png" href="{{ $setting->favicon }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/bootstrap.min.css?abpz">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/style.css?abprozz3">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/jquery-ui-1.9.2.custom.min.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/font-awesome.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/custom.1.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/bootstrap-social.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/animate.min.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/katex.min.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/monokai-sublime.min.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/quill.snow.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/quill.bubble.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="https://sieumomo.com/css/sweetalert2.min.css">
<link rel="stylesheet" href="{{ url('') }}/themes-v3/dist/simple-notify.min.css"/>
<style>

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
border-bottom-left-radius: 0;
}

.panel-primary > .panel-heading {
color: #fff;
background-color: #a50064;
border-color: #a50064;
}

.panel-primary {
border-color: #a50064;
}

.panel-primary > .panel-heading + .panel-collapse .panel-body {
border-top-color: #a50064;
}

.panel-primary > .panel-footer + .panel-collapse .panel-body {
border-bottom-color: #a50064;
}

.footer {
padding: 20px 0;
margin-top: 2em;
font-size: 12px;
/*background:








{{ $setting->color }}         ;
border-top: 7px solid








{{ $setting->color }}         ;*/
}

.bg-primary2 {
color: #fff;
background-color: #a50064 !important;
}

</style>
<style>
.aa:hover,
.aa:focus {
background: #ad4105;
border-radius: 5px
}

.my-element {
--animate-repeat: 20000;
}

center.solid {
border-style: solid;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar">
{{-- FIX --}}
<a class="text-center" href="/">
<div class="hidden-xs">
<img src="{{ $setting->logo }}" style="margin-top:10px; margin-bottom:10px; width: 315px;"
alt="SieuMoMo Logo">
</div>
<div class="visible-xs">
<img src="{{ $setting->logo }}" style="margin-top:10px;margin:13px; width: 260px;"
alt="Vjp Logo">
</div>
</a>
</div>
{{-- FIX --}}
</div>
</nav>
<div id="main">
<div class="mainbar hidden-xs">
<div class="container">
</div>
</div>
<div class="container">
<div class="content">
<div class="content-container">
<h2 style="text-align:center;font-weight: bold;" class="font-weight-bold text-primary-2">Hệ Thống Chẵn
Lẻ MoMo Top 1 VN</h2>
<div class="py-5" style="min-height:80px !important;">
<div class="output" id="output">
<h3 class="cursor"></h3>
<h4></h4>
</div>
</div>
<center>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#noteModal">Xem Lưu Ý
</button>
</center>
<div class="text-center mt-5">
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="chanle">
Chẵn Lẻ
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="chanle2">
Chẵn Lẻ 2
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="taixiu">
Tài Xỉu
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="taixiu2">
Tài Xỉu 2
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="x3">
1 Phần 3
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="gap3">
Gấp 3
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="tong3so">
Tổng 3 Số
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="hieu2so">
H3
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="lo">
Lô
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="xsmb">
XSMB
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-game="xien">
Xiên
</button>
<button class="btn btn-default mt-1 rounded-pill font-weight-bold hidden" data-minigame="giftcode">
Giftcode
</button>
</div>
<center>
<div class="text-center mt-5">
<div class="btn-group btn-group-lg" role="group">
<button class="btn btn-default rounded-pill mt-1 font-weight-bold hidden" data-minigame="day_mission" style="position: relative;">
Nhiệm Vụ Ngày
<b class="text-danger" style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 30px;font-size: 9px;"><font color="red">(HOT)</font></b>
</button>
<button class="btn btn-default rounded-pill mt-1 font-weight-bold mt-1 hidden" data-minigame="refer_friend" style="position: relative;">
Giới thiệu bạn bè
<b class="text-danger" style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 30px;font-size: 9px;"><font color="red">(NEW)</font></b>
</button>
<button class="btn btn-default rounded-pill mt-1 font-weight-bold hidden" data-minigame="wheel" style="position: relative;">
Vòng Xoay May Mắn
<b class="text-danger" style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 22px;font-size: 9px;"><font color="red">(NEW)</font></b>
</button>
<button class="btn btn-default rounded-pill mt-1 font-weight-bold hidden" data-minigame="diemdanh" style="position: relative;">
Điểm danh nhận quà
<b class="text-danger" style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 30px;font-size: 9px;"><font color="green"><i class="fa fa-clock-o" aria-hidden="true"></i> <b id="diemdanh_time">0</b></font> <font color="6861b1"><i class="fa fa-users" aria-hidden="true"></i> <b id="diemdanh_users">0</b></font></b>
</button>
{{--<button class="btn btn-default rounded-pill mt-1 font-weight-bold hidden" data-minigame="giftcode" style="position: relative;">--}}
{{--Nhập CODE Khuyến Mãi--}}
{{--<b class="text-danger" style="position: absolute;margin-left: auto;margin-right: auto;text-align: center;left: 0px;right: 0px;top: 30px;font-size: 9px;"><font color="red">(NEW)</font></b>--}}
{{--</button>--}}
</div>
</div>
</center>
<div class="row justify-content-md-center box-cl">
<div class="col-md-6 mt-3 cl">
<div class="panel panel-primary">
<div class="panel-heading text-center">
Cách chơi
</div>
<div class="play-rules">
</div>
<div class="minigame-rules">
</div>
</div>
</div>
<div class="col-md-3 mt-3 text-center cl">
<div class="panel panel-primary">
<div class="panel-heading text-center">
<div class="row">
<div class="col-xs-12">
🍀 KIỂM TRA GIAO DỊCH 🍭
</div>
</div>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover text-center">
<thead>
<tr role="row" class="bg-primary2">
<th class="text-center text-white">Số điện thoại</th>
<th class="text-center text-white">Trạng thái</th>

<th class="text-center text-white">Số lần bank</th>
<th class="text-center text-white">Đã bank</th>
</tr>
</thead>
<tbody id="momo-status2">
</tbody>
</table>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nhập mã giao dịch</label>
<input type="text" name="tran_id" id="tran_id" class="form-control"
placeholder="ví dụ 15154588566xxx">
<small id="emailHelp" class="form-text text-muted">Nhập mã giao dịch của bạn để
kiểm tra.</small>
</div>
<center>
<button class="btn btn-primary mb-2 check-tran" onclick="DUNGA.check_tranid()">Kiểm
tra
</button>
</center>
<br>
<div id="result-check" style="margin-top: 5px;">
</div>
</div>
<div id="contact" class="mt-5">
</div>
</div>
</div>
</div>
<hr style="margin-top: 25px; margin-bottom: 25px;">
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary week_top">
<div class="panel-heading text-center">
<h4>LỊCH SỬ THẮNG</h4>
</div>
<div class="panel-body">
<h5 style="color:black;font-weight: bold;text-align:center;" id="timer">(Cập nhật liên
tục) <img src="{{ url('') }}/themes-v3/images/loading_ab.jpeg" width="25px"></h5>

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover text-center">
<thead>
<tr class="bg-primary" role="row">
<th class="text-center text-white">
Số điện thoại
</th>
<th class="text-center text-white">
Tiền đặt
</th>
<th class="text-center text-white">
Nội dung
</th>
<th class="text-center text-white">
Trạng thái
</th>
</tr>
</thead>
<tbody id="history">
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@if($setting->day_top == 1)
<div class="table-responsive">
<div class="col-12">
<div class="panel panel-primary day_top">
<div class="panel-heading text-center">
<div class="row">
<div>
<h4 style="margin-top: 5px;">TOP NGÀY HÔM NAY {{ date('d-m-Y', time()) }}</h4>
</div>
</div>
</div>
<div class="panel-body">
<div class="row">
<table class="table table-striped table-hover">
<thead>
<tr>
<th scope="col" class="text-center">TOP</th>
<th scope="col" class="text-center">SĐT</th>
<th scope="col" class="text-center">Tiền đã chơi</th>
<th scope="col" class="text-center">Tiền thưởng</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" id="day_top" class="text-center">
</tbody>
</table>
<div id="top2"></div>
</div>
</div>
</div>
</div>
</div>
@elseif ($setting->week_top == 1)
<div class="table-responsive">
<div class="col-12">
<div class="panel panel-primary week_top">
<div class="panel-heading text-center">
<div class="row">
<div>
<h4 style="margin-top: 5px;">TOP NGÀY HÔM NAY {{ date('d-m-Y', time()) }}</h4>
</div>
</div>
</div>
<div class="panel-body">
<div class="row">
<table class="table table-striped table-hover">
<thead>
<tr>
<th scope="col" class="text-center">TOP</th>
<th scope="col" class="text-center">SĐT</th>
<th scope="col" class="text-center">Tiền đã chơi</th>
<th scope="col" class="text-center">Tiền thưởng</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" id="week_top" class="text-center">
</tbody>
</table>
<div id="top2"></div>
</div>
</div>
</div>
</div>
</div>
@endif
</div>
</div>
</div>
</div>
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
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h3 class="modal-title"></h3>
<h2 class="text-danger"><b>NỔ HŨ GAME</b></h2>
</div>
<div class="modal-body" id="result_hu">
<center><img class="animate__animated animate__heartBeat animate__infinite infinite" src="/upload/files/hu.png" width="30%" style="" /></center>
1. Hệ thống tự động thêm vào hũ <b>{{ number_format($setting->amount_hu) }}đ</b> sau khi người chơi được nổ hũ	<br>
2. Người chơi sẽ được nổ hũ với điều kiện:	<br>
- <b>Nổ 100% hũ:</b> Nếu 5 số cuối của mã giao dịch momo trùng nhau.	<br>
- <b>Nổ {{ $setting->ratioHu }}% hũ:</b> Nếu 4 số cuối của mã giao dịch momo trùng nhau.	<br>
- Ví dụ 1: Mã giao dịch <b>20235788888</b> có 5 số cuối là <b>88888</b> đều là <b>8</b>.	<br>
+ Người chơi sẽ ăn toàn bộ tiền trong hũ.	<br>
- Ví dụ 2: Mã giao dịch <b>20235786666</b> có 4 số cuối là <b>6666</b> đều là <b>6</b>.	<br>
+ Người chơi sẽ ăn <b>{{ $setting->ratioHu }}%</b> tiền trong hũ.	<br>
3. Sau khi bạn được Nổ Hũ vui lòng LH chát <b>CSKH</b> gửi mã giao dịch để nhận tiền.	<br>
(Lưu ý trương trình chỉ áp dụng trong ngày, qua ngày sẽ không được tính)
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" style="border-radius: 0;" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div> <div id="player" class="hidden"></div>
<style>
.grecaptcha-badge {
visibility: hidden;
}

.my-element {
--animate-repeat: 20000;
}

center.solid {
border-style: solid;
}
</style>
</div>
<div class="mt-5 panel panel-primary">
</div>
<div id="hu-left-display" style="position: fixed; bottom: 15px; left: 15px; z-index: 1000; cursor: pointer; width: 15%;" class="hidden">
<div onclick="$('#hu-left-display').hide()" class="" style="left: 100%; position: absolute;">
<font color="red">
<big><b>[X]</b></big>
</font>
</div>
<b onclick="DUNGA.hu_click()">
<center><img class="animate__animated animate__heartBeat animate__infinite infinite" src="/upload/files/hu.png" width="100%" style="max-height: 130px;max-width: 150px;min-height: 50px; min-width:80px;" /></center>
<div class="text-center">
<p class="animate__animated animate__shakeX animate__infinite infinite animate__slow 2 hu-balance" style="border-top-right-radius: 30px; border-top-left-radius: 30px; border-radius: 30px; background: aquamarine;">0</p>
</div>
</b>
</div>
</div>
</div>
</div>
<footer class="footer bg-grad-1">
<div class="container text-center">
<div class="row">
<div class="col-xs-12">
<img src="{{ $setting->logo }}" alt="logo-footer" width="150px">
</div>
<div class="col-xs-12 text-white ">
Copyright 2022 © <a style="color: white;" href="#">{{ $setting->name }}</a>
</div>
</div>
</div>
</footer>
</body>
<script src="{{ url('') }}/themes-v3/js/jquery-1.10.1.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/jquery.validate.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/bootbox.js"></script>
<script src="{{ url('') }}/themes-v3/js/tip.js"></script>
<script src="{{ url('') }}/themes-v3/js/alert.js?abcd"></script>
<script src="{{ url('') }}/themes-v3/js/moment.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/sweetalert2.all.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/sweetalert.min.js"></script>
<script src="{{ url('') }}/themes-v3/dist/simple-notify.min.js"></script>
<script src="{{ url('') }}/themes-v3/js/script.js?ver=28042003.v890">
</script>
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
$('.turn').removeClass('active');
$(`.turn[game-tab=${game}]`).addClass('active').removeClass("hidden");
$("button[data-game]").removeClass("btn-primary").addClass("btn-default");
$("[data-minigame]").removeClass("btn-success");
button.removeClass("btn-default").addClass("btn-primary");
});

$('button[data-minigame]').click(function () {
let button = $(this);
let game = button.attr('data-minigame');
game_active = "minigame";
$('.turn').removeClass('active');
$(`.turn[game-tab=${game}]`).addClass('active').removeClass("hidden");
$("[data-minigame]").removeClass("btn-primary");
$("[data-game]").removeClass("btn-primary").addClass("btn-default");
button.addClass("btn-primary");
});
});
</script>
</html>
