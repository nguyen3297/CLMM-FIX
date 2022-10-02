
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> {{ $setting->title }} </title>
    <link href="https://i.imgur.com/hm7QMr7.png" rel="apple-touch-icon"/>
    <link href="https://i.imgur.com/hm7QMr7.png" rel="shortcut icon" type="image/x-icon"/>
    <!-- Required Meta Tags Always Come First -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="Hệ thống chẳn lẻ MoMo uy tín giao dịch tự động 24/7" />
    <meta name="description" content="Chẳn lẻ momo - Uy tín , giao dịch tự động 24/7 - bank 30s !" />
    <meta name="keywords" content="Chẳn lẻ momo" />
    <link rel="canonical" href="https://txmm88.com/">
    <meta name="robots" content="index, follow">
    <meta property="fb:app_id" content="" />
    <meta property="og:url" content="https://txmm88.com/">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Hệ thống chẳn lẻ MoMo uy tín giao dịch tự động 24/7">
    <meta property="og:description" content="Chẳn lẻ momo - Uy tín , giao dịch tự động 24/7 - bank 30s !">
    <!-- Link css -->
    <link rel="stylesheet" href="{{ url('') }}/themes-v2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/themes-v2/css/custom.css">
    <link rel="stylesheet" href="{{ url('') }}/themes-v2/fonts/fontawesome/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.js"></script>
    <style>

        .modal-open {
            overflow: hidden
        }

        .modal {
            display: none;
            overflow: auto;
            overflow-y: scroll;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            -webkit-overflow-scrolling: touch;
            outline: 0
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform .3s ease-out;
            -moz-transition: -moz-transform .3s ease-out;
            -o-transition: -o-transform .3s ease-out;
            transition: transform .3s ease-out
        }

        .modal.in .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            transform: translate(0, 0)
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 16px;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
            /* background-clip: padding-box; */
            outline: 0
        }

        .modal-backdrop {

            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000
        }

        .modal-backdrop.fade {
            opacity: 0;
            filter: alpha(opacity=0)
        }

        .modal-backdrop.in {
            opacity: .5;
            filter: alpha(opacity=50)
        }

        .modal-header {
            padding: 15px;
            border-bottom: 1px solid #e5e5e5;
            min-height: 16.42857143px
        }

        .modal-header .close {
            margin-top: -2px
        }

        .modal-title {
            margin: 0;
            line-height: 1.42857143
        }

        .modal-body {
            position: relative;
            padding: 20px
        }

        .modal-footer {
            margin-top: 15px;
            padding: 19px 20px 20px;
            text-align: right;
            border-top: 1px solid #e5e5e5
        }

        .modal-footer .btn+.btn {
            margin-left: 5px;
            margin-bottom: 0
        }

        .modal-footer .btn-group .btn+.btn {
            margin-left: -1px
        }

        .modal-footer .btn-block+.btn-block {
            margin-left: 0
        }

        @media (min-width:768px) {
            .modal-dialog {
                width: 600px;
                margin: 30px auto
            }
            .modal-content {
                -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
                box-shadow: 0 5px 15px rgba(0, 0, 0, .5)
            }
            .modal-sm {
                width: 300px
            }
        }
        .modal-footer:before,
        .modal-footer:after {
            content: " ";
            display: table
        }
        .modal-footer:after {
            clear: both
        }
    </style>
</head>

<body>
<div id="page-wrapper">
    <div id="main">
        <div class="container">
            <div class="bg-top"></div>
            <div class="bg-bottom"></div>
            <!-- Content -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Home -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                    <header>
                        <div class="logo">
                            <a href="#"><img src="{{ $setting->logo }}" alt="logo"></a>
                        </div>
                        <p class="title">Chẵn lẽ momo tự động 5s</p>
                        <p class="sub-title">Uy tín - nhanh gọn - tự động</p>
                    </header>
                    <div class="notify">
                        <button class="btn btn-primary">Thông báo</button>
                    </div>
                    <div id="tab-type">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">


                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456472-tab" data-toggle="pill" href="#game456472"
                                   role="tab" aria-controls="game456472" aria-selected="false">Chẵn Lẻ</a>
                            </li>


                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456473-tab" data-toggle="pill" href="#game456473"
                                   role="tab" aria-controls="game456473" aria-selected="false">Tài Xỉu</a>
                            </li>


                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456474-tab" data-toggle="pill" href="#game456474"
                                   role="tab" aria-controls="game456474" aria-selected="false">Chẵn Lẻ 2 + Tài Xỉu 2</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456476-tab" data-toggle="pill" href="#game456476"
                                   role="tab" aria-controls="game456476" aria-selected="false">1 Phần 3</a>
                            </li>


                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456477-tab" data-toggle="pill" href="#game456477"
                                   role="tab" aria-controls="game456477" aria-selected="false">Gấp 3</a>
                            </li>


                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456478-tab" data-toggle="pill" href="#game456478"
                                   role="tab" aria-controls="game456478" aria-selected="false">Hiệu</a>
                            </li>


                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="game456479-tab" data-toggle="pill" href="#game456479"
                                   role="tab" aria-controls="game456479" aria-selected="false">Lô</a>
                            </li>



                        </ul>

                    </div>

                    <div class="tab-content" id="pills-types">

                        <div class="tab-pane fade " id="game456479" role="tabpanel" aria-labelledby="game456479-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Lì Xì</h3>
                                <p class="intro">- Lì Xì là một game tính kết quả bằng 2 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>LIXI</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">01</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">03</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">12</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">19</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">23</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-6"> </span><span class="fa-stack-1x text-white" id="">24</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-7"> </span><span class="fa-stack-1x text-white" id="">30</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-8"> </span><span class="fa-stack-1x text-white" id="">33</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-9"> </span><span class="fa-stack-1x text-white" id="">39</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-10"> </span><span class="fa-stack-1x text-white" id="">35</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-11"> </span><span class="fa-stack-1x text-white" id="">48</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-12"> </span><span class="fa-stack-1x text-white" id="">54</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-13"> </span><span class="fa-stack-1x text-white" id="">55</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-14"> </span><span class="fa-stack-1x text-white" id="">60</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-15"> </span><span class="fa-stack-1x text-white" id="">61</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-16"> </span><span class="fa-stack-1x text-white" id="">71</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-17"> </span><span class="fa-stack-1x text-white" id="">77</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-18"> </span><span class="fa-stack-1x text-white" id="">81</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-19"> </span><span class="fa-stack-1x text-white" id="">65</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-20"> </span><span class="fa-stack-1x text-white" id="">82</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-21"> </span><span class="fa-stack-1x text-white" id="">83</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-22"> </span><span class="fa-stack-1x text-white" id="">67</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-23"> </span><span class="fa-stack-1x text-white" id="">88</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-24"> </span><span class="fa-stack-1x text-white" id="">76</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-25"> </span><span class="fa-stack-1x text-white" id="">64</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-26"> </span><span class="fa-stack-1x text-white" id="">79</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-26"> </span><span class="fa-stack-1x text-white" id="">29</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-26"> </span><span class="fa-stack-1x text-white" id="">99</span></span>



                                            </td>
                                            <td class="money">X 4</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456478" role="tabpanel" aria-labelledby="game456478-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Hiệu</h3>
                                <p class="intro">- Hiệu là một game tính kết quả bằng hiệu 2 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>H3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">9</span></span>


                                            </td>
                                            <td class="money">X 8</td>
                                        </tr>

                                        <tr>
                                            <td><span>H3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">7</span></span>


                                            </td>
                                            <td class="money">X 7</td>
                                        </tr>

                                        <tr>
                                            <td><span>H3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">5</span></span>


                                            </td>
                                            <td class="money">X 5</td>
                                        </tr>

                                        <tr>
                                            <td><span>H3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">3</span></span>


                                            </td>
                                            <td class="money">X 3</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456477" role="tabpanel" aria-labelledby="game456477-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Gấp 3</h3>
                                <p class="intro">- Gấp 3 là một game vô cùng dễ, tính kết quả bằng 2 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>G3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">123</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">234</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">456</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">678</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">789</span></span>


                                            </td>
                                            <td class="money">X 5</td>
                                        </tr>

                                        <tr>
                                            <td><span>G3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">69</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">66</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">99</span></span>


                                            </td>
                                            <td class="money">X 4</td>
                                        </tr>

                                        <tr>
                                            <td><span>G3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">02</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">13</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">17</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">19</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">21</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-6"> </span><span class="fa-stack-1x text-white" id="">29</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-7"> </span><span class="fa-stack-1x text-white" id="">35</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-8"> </span><span class="fa-stack-1x text-white" id="">37</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-9"> </span><span class="fa-stack-1x text-white" id="">47</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-10"> </span><span class="fa-stack-1x text-white" id="">49</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-11"> </span><span class="fa-stack-1x text-white" id="">51</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-12"> </span><span class="fa-stack-1x text-white" id="">54</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-13"> </span><span class="fa-stack-1x text-white" id="">57</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-14"> </span><span class="fa-stack-1x text-white" id="">63</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-15"> </span><span class="fa-stack-1x text-white" id="">64</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-16"> </span><span class="fa-stack-1x text-white" id="">74</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-17"> </span><span class="fa-stack-1x text-white" id="">83</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-18"> </span><span class="fa-stack-1x text-white" id="">91</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-19"> </span><span class="fa-stack-1x text-white" id="">95</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-20"> </span><span class="fa-stack-1x text-white" id="">96</span></span>


                                            </td>
                                            <td class="money">X 3</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456476" role="tabpanel" aria-labelledby="game456476-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI 1 Phần 3</h3>
                                <p class="intro">- 1 phần 3 là một game vô cùng dễ, tính kết quả bằng 1 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>N3</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">7</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">8</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">9</span></span>


                                            </td>
                                            <td class="money">X 3</td>
                                        </tr>

                                        <tr>
                                            <td><span>N2</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">4</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">5</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">6</span></span>


                                            </td>
                                            <td class="money">X 3</td>
                                        </tr>

                                        <tr>
                                            <td><span>N1</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">1</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">2</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">3</span></span>


                                            </td>
                                            <td class="money">X 3</td>
                                        </tr>

                                        <tr>
                                            <td><span>N0</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">0</span></span>


                                            </td>
                                            <td class="money">X 8</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456475" role="tabpanel" aria-labelledby="game456475-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Xiên</h3>
                                <p class="intro">- Xiên là một game tính kết quả bằng 1 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>LX</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">1</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">3</span></span>


                                            </td>
                                            <td class="money">X 3.5</td>
                                        </tr>

                                        <tr>
                                            <td><span>CT</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">6</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">8</span></span>


                                            </td>
                                            <td class="money">X 3.5</td>
                                        </tr>

                                        <tr>
                                            <td><span>LT</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">5</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">7</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">9</span></span>


                                            </td>
                                            <td class="money">X 3.5</td>
                                        </tr>

                                        <tr>
                                            <td><span>CX</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">0</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">2</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">4</span></span>


                                            </td>
                                            <td class="money">X 3.5</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456474" role="tabpanel" aria-labelledby="game456474-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Chẵn Lẻ 2 + Tài Xỉu 2</h3>
                                <p class="intro">Chẵn lẻ 2 + Tài Xỉu 2 là game tính kết quả bằng số cuối mã giao dịch
                                </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>X2</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">0</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">1</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">2</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">3</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">4</span></span>


                                            </td>
                                            <td class="money">X 1.95</td>
                                        </tr>

                                        <tr>
                                            <td><span>T2</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">5</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">6</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">7</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">8</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">9</span></span>


                                            </td>
                                            <td class="money">X 1.95</td>
                                        </tr>

                                        <tr>
                                            <td><span>L2</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">1</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">3</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">5</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">7</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">9</span></span>


                                            </td>
                                            <td class="money">X 1.95</td>
                                        </tr>

                                        <tr>
                                            <td><span>C2</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">0</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">2</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">4</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">6</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-5"> </span><span class="fa-stack-1x text-white" id="">8</span></span>


                                            </td>
                                            <td class="money">X 1.95</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456473" role="tabpanel" aria-labelledby="game456473-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Tài Xỉu</h3>
                                <p class="intro">- Tài Xỉu là một game tính kết quả bằng 1 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>T</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">5</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">6</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">7</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">8</span></span>


                                            </td>
                                            <td class="money">X 2.4</td>
                                        </tr>

                                        <tr>
                                            <td><span>X</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">1</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">2</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">3</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">4</span></span>


                                            </td>
                                            <td class="money">X 2.4</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                        <div class="tab-pane fade " id="game456472" role="tabpanel" aria-labelledby="game456472-tab">
                            <div class="tutorial border-main overlay">
                                <h3 class="title">HƯỚNG DẪN CHƠI Chẵn Lẻ</h3>
                                <p class="intro">- Chẵn lẻ là một game tính kết quả bằng 1 số cuối mã giao dịch. </p>
                                <p class="intro">  chuyển
                                    tiền
                                    vào một trong
                                    những số điện thoại sau :</p>
                                <table class="table table-borderless ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Cược tối thiểu</th>
                                        <th scope="col">Cược tối đa</th>

                                        <th scope="col">Giao dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="65">
                                    <tr>
                                        <td scope="row" class="phone">0569424654<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424654')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">5/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="63">
                                    <tr>
                                        <td scope="row" class="phone">0569424661<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424661')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>
                                    <tr>
                                        <td id="61">
                                    <tr>
                                        <td scope="row" class="phone">0569424551<span class="label label-success text-uppercase" onclick="copyStringToClipboard('0569424551')">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </span>  <i class="fa-solid fa-play"></i></td>
                                        <td>10,000 <span class="vnd">VND</span></td>
                                        <td>2,000,000 <span class="vnd">VND</span></td>
                                        <td><span class="full">0/200</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Làm mới sau <span>5s</span></h3>

                                <div class="table-money border-main overlay">
                                    <p class="intro">nội dung chuyển tiền và <span></span>  <span></span>tỉ lệ thắng như sau:</p>
                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">1 số cuối</th>
                                            <th scope="col">Tiền nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><span>C</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">2</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">4</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">6</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">8</span></span>


                                            </td>
                                            <td class="money">X 2.4</td>
                                        </tr>

                                        <tr>
                                            <td><span>L</span></td>
                                            <td>
                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-1"> </span><span class="fa-stack-1x text-white" id="">1</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-2"> </span><span class="fa-stack-1x text-white" id="">3</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-3"> </span><span class="fa-stack-1x text-white" id="">5</span></span>

                                                <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-4"> </span><span class="fa-stack-1x text-white" id="">7</span></span>


                                            </td>
                                            <td class="money">X 2.4</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>

                            <div class="tutorial-2">
                                <h3 class="title">Lịch sử <span>Thắng</span></h3>

                                <div class="table-money border-main overlay">

                                    <table class="table table-borderless ">
                                        <thead>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Trò chơi</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                200000
                                            </td>
                                            <td class="money">Tài Xỉu</td>
                                            <td class="money">t </td>
                                            <td class="money">17/06/2022 21:13:38</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                10033
                                            </td>
                                            <td class="money">Chẵn Lẻ</td>
                                            <td class="money">l</td>
                                            <td class="money">17/06/2022 18:38:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">016871**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money">Hiệu</td>
                                            <td class="money">H3</td>
                                            <td class="money">16/06/2022 18:04:59</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                494000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:49</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                400000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:02:04</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                40000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">t</td>
                                            <td class="money">15/06/2022 11:01:26</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09646**** </td>
                                            <td class="money">
                                                300000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">l</td>
                                            <td class="money">15/06/2022 01:33:46</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09085**** </td>
                                            <td class="money">
                                                10000
                                            </td>
                                            <td class="money"></td>
                                            <td class="money">L</td>
                                            <td class="money">15/06/2022 00:53:50</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                56000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">X</td>
                                            <td class="money">14/06/2022 22:34:51</td>
                                        </tr>

                                        <tr>
                                            <td class="money">09184**** </td>
                                            <td class="money">
                                                65000
                                            </td>
                                            <td class="money">Chẵn Lẻ + Tài Xỉu</td>
                                            <td class="money">T</td>
                                            <td class="money">14/06/2022 22:34:02</td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <p class="note">lưu ý: số tiền đặt nhỏ nhất của c và l là 10,000 vnd và tối đa là
                                    2,000,000 vnd tiền thắng sẽ bằng số tiền đặt * tỉ lệ

                                </p>
                            </div>


                        </div> <!---end tab 1---->


                    </div>


                </div>
                <!-- Ho tro -->
                <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="support-tab">
                    <h3 class="tab-name">Trung tâm hỗ trợ</h3>
                    <div class="transaction border-main overlay">
                        <form class="check-code" id="check_tranid" action="">
                            <h3>Kiểm tra mã giao dịch</h3>
                            <p class="note">nếu quá 15 phút chưa nhận được tiền vui lòng
                                nhập mã vào đây để kiểm tra</p>
                            <div class="form-group">
                                <label for="code">nhập mã giao dịch</label>
                                <div class="form-group-icon">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="text" name="code" id="code" placeholder="Mã giao dịch vd: 123456789">

                                </div>
                            </div>
                            <div>
                                <button type="button" id="submit" name="submit" class="btn btn-primary btn-check" onclick="check_tranid()">Kiểm tra</button>

                            </div>
                        </form>
                    </div>
                    <div class="contact border-main overlay">
                        @foreach($contact as $row)
                        <div class="text-center">
                            <a href="{{ $row->href }}" class="btn btn-primary">{{ $row->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Bang xep hang -->
                <div class="tab-pane fade" id="pills-rank" role="tabpanel" aria-labelledby="rank-tab">
                    <h3 class="tab-name">Bảng xếp hạng</h3>
                    <img src="./assets/images/cup.png" alt="">
                    <h3 class="top-rank">Top thắng tuần</h3>
                    <div class="border-main overlay">
                        <table class="table table-borderless  ">
                            <thead>
                            <tr>
                                <th scope="col">Top</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tổng cược</th>
                                <th scope="col">Phần Thưởng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="top-1"><span class="d-none">1</span></th>                                        <td>09184**** </td>
                                <td>6,825,000<span class="unit"> VND</span></td>
                                <td>3,000,000<span class="vnd"> VND</span></td>
                            </tr>

                            <tr>
                                <th scope="row" class="top-number">2</th>                                        <td>09646**** </td>
                                <td>4,612,366<span class="unit"> VND</span></td>
                                <td>2,000,000<span class="vnd"> VND</span></td>
                            </tr>

                            <tr>
                                <th scope="row" class="top-number">3</th>                                        <td>018694**** </td>
                                <td>70,000<span class="unit"> VND</span></td>
                                <td>1,000,000<span class="vnd"> VND</span></td>
                            </tr>

                            <tr>
                                <th scope="row" class="top-number">4</th>                                        <td>016871**** </td>
                                <td>70,000<span class="unit"> VND</span></td>
                                <td>500,000<span class="vnd"> VND</span></td>
                            </tr>

                            <tr>
                                <th scope="row" class="top-number">5</th>                                        <td>016987**** </td>
                                <td>40,000<span class="unit"> VND</span></td>
                                <td>300,000<span class="vnd"> VND</span></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <p class="note">top sẼ được trao giải vào 24h chủ nhật hàng tuần</p>
                </div>
                <!-- Gioi thieu -->
                <div class="tab-pane fade" id="pills-intro" role="tabpanel" aria-labelledby="intro-tab">
                    <h3 class="tab-name">Giới thiệu</h3>
                    <div class="content border-main overlay"><h2>&nbsp;</h2>
                        {!! $setting->ads !!}
                    </div>
                </div>
            </div>
            <!-- Menu tab -->
            <ul class="nav nav-pills" id="main-menu" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="pill" href="#pills-home" role="tab"
                       aria-controls="pills-home" aria-selected="true">
                        <img src="{{ url('') }}/themes-v2/images/icon/home.svg" alt="icon">
                        HOME</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="support-tab" data-toggle="pill" href="#pills-support" role="tab"
                       aria-controls="pills-support" aria-selected="false">
                        <img src="{{ url('') }}/themes-v2/images/icon/support.svg" alt="">
                        Hỗ trợ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="rank-tab" data-toggle="pill" href="#pills-rank" role="tab"
                       aria-controls="pills-rank" aria-selected="false">
                        <img src="{{ url('') }}/themes-v2/images/icon/rank.svg" alt="">
                        BXH
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="intro-tab" data-toggle="pill" href="#pills-intro" role="tab"
                       aria-controls="pills-intro" aria-selected="false">
                        <img src="{{ url('') }}/themes-v2/images/icon/intro.svg" alt="">
                        Giới thiệu</a>
                </li>
            </ul>
        </div>
    </div>

</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ url('') }}/themes-v2/js/bootstrap.min.js"></script>

<script src="{{ url('') }}/themes-v2/js/libs/jquery-1.10.1.min.js"></script>
<script src="{{ url('') }}/themes-v2/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{ url('') }}/themes-v2/js/jquery.validate.min.js"></script>
<script src="{{ url('') }}/themes-v2/js/libs/bootstrap.min.js"></script>
<script src="https://codeseven.github.io/toastr/glimpse.toastr.js"></script>
<script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
<script src="{{ url('') }}/themes-v2/js/d.js"></script>
</body>

</html>
