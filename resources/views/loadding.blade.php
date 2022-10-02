<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="google" content="notranslate"/>
    <meta name="title" content=""/>
    <meta name="description" content="">
    <meta name="keywords" content=""/>
    <meta name="author" content="">
    <link rel="canonical" href=""/>
    <meta name="referrer" content="no-referrer"/>
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="{{ url('') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{ url('') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700,900" rel="stylesheet"
          type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{ url('') }}/build/style.min.css?v=6.1.17" rel="stylesheet">
</head>
<style>

</style>
<body id="page-top">
<h1></h1>
<div>
    <header>
        <div class="container">
            <div class="row">
                <a class="logo text-center">
                    <img class="img-responsive" src="{{ $setting->logo }}" data-src="{{ url('') }}/images/logo.png"
                         alt="" style="width: 10px;height: 10px;">
                </a>
            </div>
            <div class="row">
                <a class="slogan text-center">
                    <img class="img-responsive showpc" src="{{ url('') }}/images/slogan-lazy.png"
                         data-src="{{ url('') }}/images/slogan.png" alt="">
                    <img class="img-responsive hidepc" src="{{ url('') }}/images/slogan-mb-lazy.png"
                         data-src="{{ url('') }}/images/slogan-mb.png"
                         alt="">
                </a>
            </div>
        </div>
    </header>
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="tab-content">
                    <ul class="nav nav-tabs">
                        <marquee direction="left" >
                            <font color="white" style="font-size: 15px; text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>HỖ TRỢ TELE @gadev27</b></font>
                        </marquee>
                    </ul>
                    <div id="login" class="tab-pane fade in active show">
                        <div class="form-box" style="margin-top: 100px;">

                        </div>
                        <div class="form-group btn-form">
                            <button class="btnsubmit" type="submit">
                                <a href="{{ route('play') }}"><img src="{{ url('') }}/images/choi-ngay.png"
                                                                   data-src="{{ url('') }}/images/choi-ngay.png" alt=""
                                                                   width="100%"></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="thankform">
    <div class="container text-center">
        <div class="thankinfo">
            <div class="title-tks">
                BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG:
            </div>
            <p class="thankinfo_user"></p>
            <p class="thankinfo_pass"></p>
        </div>
    </div>
</section><!-- DOWNLOAD -->
<section id="main">
    <div class="container text-center">
        <div class="dacotaikhoan"><img src="{{ url('') }}/images/dacotaikhoan-lazy.png"
                                       data-src="{{ url('') }}/images/dacotaikhoan.png" border="0">
        </div>
        <div id="android" class="row">
            <a id="taiggplay" href="javascript:;" onclick="onDownloadAndroid()" rel="nofollow" name=""
               class="store btn-store">
                <img src="{{ url('') }}/images/btn-dl-lazy.png" data-src="{{ url('') }}/images/btn-android.png" alt=""
                     width="100%"/>
            </a>
            <small>Bản cài đặt đã đổi tên nhằm vượt qua sự kiểm duyệt.</small>
        </div>
        <div id="ios" class="row">
            <a id="taiios" href="javascript:;" onclick="onDownloadIOS();" rel="nofollow" name=""
               class="store btn-store">
                <img src="{{ url('') }}/images/btn-dl-lazy.png" data-src="{{ url('') }}/images/btn-ios.png" alt=""
                     width="100%"/>
            </a>
            <small>Bản cài đặt đã đổi tên nhằm vượt qua sự kiểm duyệt.</small>
        </div>
        <div id="playonweb" class="row btn1111">
            <div class="vuottuonglua"><img src="{{ url('') }}/images/vuottuonglua-lazy.png"
                                           data-src="{{ url('') }}/images/vuottuonglua.png"
                                           border="0"></div>
            <a id="taiios" href="https://1.1.1.1/" target="_blank" class="store playweb">
                <img src="{{ url('') }}/images/btn-dl-lazy.png" data-src="{{ url('') }}/images/btn-face1111.png" alt=""
                     width="100%"/>
            </a>
            <small>Cài đặt 1.1.1.1, không lo bị chặn.</small>
        </div>
    </div>
</section>
<div class="loading">
    <img src="{{ url('') }}/images/loading.gif" alt="">
</div>
<div id="alertModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center"></div>
            <button type="button" data-dismiss="modal"><img src="{{ url('') }}/images/icon-close.png" alt=""></button>
        </div>
    </div>
</div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="/build/app.min.js?v=6.1.9"></script>
</body>

</html>
