<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HỆ THỐNG QUẢN TRỊ CLMM CRE DUNGA</title>
    <link rel="shortcut icon" href="{{ $setting->favicon }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="/dgaAdmin/assets/css/oneui.min-5.2.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <link rel="stylesheet" href="/dgaAdmin/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/dgaAdmin/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="/dgaAdmin/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/dgaAdmin/assets/js/plugins/select2/css/select2.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-16158021-6"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-16158021-6');</script>
</head>
<body>
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <aside id="side-overlay">
        <div class="content-header border-bottom">
            <a class="img-link me-1" href="javascript:void(0)">
                <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar10.jpg" alt="">
            </a>
            <div class="ms-2">
                <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">Có Cái Nịt</a>
            </div>
            <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
        <div class="content-side">
            <div class="block block-transparent pull-x pull-t">
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" id="so-overview-tab" data-bs-toggle="tab" data-bs-target="#so-overview" role="tab" aria-controls="so-overview" aria-selected="true">
                            <i class="fa fa-fw fa-coffee text-gray opacity-75 me-1"></i> Overview
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" id="so-sales-tab" data-bs-toggle="tab" data-bs-target="#so-sales" role="tab" aria-controls="so-sales" aria-selected="false">
                            <i class="fa fa-fw fa-chart-line text-gray opacity-75 me-1"></i> Sales
                        </button>
                    </li>
                </ul>
                <div class="block-content tab-content overflow-hidden">
                    <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel" aria-labelledby="so-overview-tab">
                        <div class="block block-transparent mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Cài đặt</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                    <div class="mb-4">
                                        <p class="fs-sm fw-semibold mb-2">
                                            Online Status
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="" id="so-settings-check1" name="so-settings-check1" checked>
                                            <label class="form-check-label fs-sm" for="so-settings-check1">Show your status to all</label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="fs-sm fw-semibold mb-2">
                                            Auto Updates
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="" id="so-settings-check2" name="so-settings-check2" checked>
                                            <label class="form-check-label fs-sm" for="so-settings-check2">Keep up to date</label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="fs-sm fw-semibold mb-1">
                                            Application Alerts
                                        </p>
                                        <div class="space-y-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value="" id="so-settings-check3" name="so-settings-check3" checked>
                                                <label class="form-check-label fs-sm" for="so-settings-check3">Email Notifications</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value="" id="so-settings-check4" name="so-settings-check4" checked>
                                                <label class="form-check-label fs-sm" for="so-settings-check4">SMS Notifications</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="fs-sm fw-semibold mb-1">
                                            API
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="" id="so-settings-check5" name="so-settings-check5" checked>
                                            <label class="form-check-label fs-sm" for="so-settings-check5">Enable access</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane pull-x fade fade-right" id="so-sales" role="tabpanel" aria-labelledby="so-sales-tab">
                        <div class="block block-transparent mb-0">
                            <div class="block-content">
                                <div class="row items-push pull-t">
                                    <div class="col-6">
                                        <div class="fs-sm fw-semibold text-uppercase">Trả</div>
                                        <a class="fs-lg" href="javascript:void(0)">{{ number_format(DB::table('history_plays')->whereDate('created_at', Carbon\Carbon::now()->toDateString())->sum('receive')) }}</a>
                                    </div>
                                    <div class="col-6">
                                        <div class="fs-sm fw-semibold text-uppercase">Nhận</div>
                                        <a class="fs-lg" href="javascript:void(0)">{{ number_format(DB::table('history_plays')->whereDate('created_at', Carbon\Carbon::now()->toDateString())->sum('amount')) }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="fs-sm fw-semibold text-uppercase">Today</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="ext-muted">{{ number_format(DB::table('history_plays')->where('status', '!=', 1)->whereDate('created_at', Carbon\Carbon::now()->toDateString())->sum('amount')) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="nav-items push">
                                    @foreach(DB::table('history_plays')->where('status', '!=', 1)->orderBy('id', 'desc')->limit(10)->get() as $row)
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-3 ms-2">
                                                <i class="fa fa-fw fa-plus text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 fs-sm">
                                                <div class="fw-semibold">Nhận + {{ number_format($row->amount) }} VND</div>
                                                <small class="text-muted">{{ Carbon\Carbon::setLocale('vi') }}{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <nav id="sidebar" aria-label="Main Navigation">
        <div class="content-header">
            <a class="fw-semibold text-dual" href="{{ route('admin.home') }}">
      <span class="smini-visible">
        <i class="fa fa-circle-notch text-primary"></i>
      </span>
                <span class="smini-hide fs-5 tracking-wider">CL<span class="fw-normal">MM</span></span>
            </a>
            <div>
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
                    <i class="far fa-moon"></i>
                </button>
                <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-fw fa-times"></i>
                </a>
            </div>
        </div>
        <div class="js-sidebar-scroll">
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="{{ route('admin.home') }}">
                            <i class="nav-main-link-icon si si-speedometer"></i>
                            <span class="nav-main-link-name">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">MOMO</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.addMomo') }}">
                            <i class="nav-main-link-icon si si-phone"></i>
                            <span class="nav-main-link-name">Thêm số</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-refresh"></i>
                            <span class="nav-main-link-name">Lịch sử chơi</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlayALL') }}">
                                    <span class="nav-main-link-name">Tất cả</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'CL']) }}">
                                    <span class="nav-main-link-name">Chẵn lẻ</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'CL2']) }}">
                                    <span class="nav-main-link-name">Chẵn lẻ 2</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'TX']) }}">
                                    <span class="nav-main-link-name">Tài xỉu</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'TX2']) }}">
                                    <span class="nav-main-link-name">Tài xỉu 2</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => '1P3']) }}">
                                    <span class="nav-main-link-name">1 Phần 3</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'G3']) }}">
                                    <span class="nav-main-link-name">Gấp 3</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'H3']) }}">
                                    <span class="nav-main-link-name">H3</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'LO']) }}">
                                    <span class="nav-main-link-name">LÔ</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'XIEN']) }}">
                                    <span class="nav-main-link-name">Xiên</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyPlay', ['game' => 'XSMB']) }}">
                                    <span class="nav-main-link-name">XSMB</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-refresh"></i>
                            <span class="nav-main-link-name">Lịch sử</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyDayMission') }}">
                                    <span class="nav-main-link-name">Nhiệm vụ ngày</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyBank') }}">
                                    <span class="nav-main-link-name">Lịch sử chuyển tiền</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyMuster') }}">
                                    <span class="nav-main-link-name">Lịch sử điểm danh</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyHu') }}">
                                    <span class="nav-main-link-name">Lịch sử nổ hũ</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyTransMomo') }}">
                                    <span class="nav-main-link-name">Lịch sử momo</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-gifts"></i>
                            <span class="nav-main-link-name">Giftcode</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.giftcode') }}">
                                    <span class="nav-main-link-name">Mã quà</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('admin.historyGiftCode') }}">
                                    <span class="nav-main-link-name">Lịch sử</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.weekTop') }}">
                            <i class="nav-main-link-icon fa fa-arrow-trend-up"></i>
                            <span class="nav-main-link-name">Top tuần - ngày - tháng</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.blackList') }}">
                            <i class="nav-main-link-icon si si-lock"></i>
                            <span class="nav-main-link-name">Danh sách đen</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">OTHER</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.changePass') }}">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.setting') }}">
                            <i class="nav-main-link-icon si si-settings"></i>
                            <span class="nav-main-link-name">Cài đặt chung</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.settingGame') }}">
                            <i class="nav-main-link-icon si si-settings"></i>
                            <span class="nav-main-link-name">Cài đặt game</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('admin.support') }}">
                            <i class="nav-main-link-icon si si-support"></i>
                            <span class="nav-main-link-name">Hỗ trợ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="page-header">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                    <i class="fa fa-fw fa-ellipsis-v"></i>
                </button>
                <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout" data-action="header_search_on">
                    <i class="fa fa-fw fa-search"></i>
                </button>
                <form class="d-none d-md-inline-block" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                        <span class="input-group-text border-0">
            <i class="fa fa-fw fa-search"></i>
          </span>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown d-inline-block ms-2">
                    <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" src="https://i.imgur.com/U4kvmYv.png" alt="Header Avatar" style="width: 21px;">
                        <span class="d-none d-sm-inline-block ms-2">Có Cái Nịt</span>
                        <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="https://i.imgur.com/U4kvmYv.png" alt="">
                            <p class="mt-2 mb-0 fw-medium">Có Cái Nịt</p>
                            <p class="mb-0 text-muted fs-sm fw-medium">Web Developer</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-alt-secondary ms-2" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
                </button>
            </div>
        </div>
        <div id="page-header-loader" class="overlay-header bg-body-extra-light">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                </div>
            </div>
        </div>
    </header>
@yield('main')
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                                                                               href="https://1.envato.market/ydb"
                                                                               target="_blank">DDDDD</a>
                </div>
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                    <a class="fw-semibold" href="#" target="_blank">{{ $setting->name }}</a> &copy;
                    <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="/dgaAdmin/assets/js/oneui.app.min-5.2.js"></script>
<script src="/dgaAdmin/assets/js/plugins/chart.js/chart.min.js"></script>
<script src="/dgaAdmin/assets/js/pages/be_pages_dashboard.min.js"></script>
<script src="/dgaAdmin/assets/js/lib/jquery.min.js"></script>
<script src="/dgaAdmin/assets/js/dunga.js"></script>
<script src="/dgaAdmin/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
<script src="/dgaAdmin/assets/js/pages/be_tables_datatables.min.js"></script>
<script src="/dgaAdmin/assets/js/plugins/editable/editable.js"></script>
<script src="/dgaAdmin/assets/js/plugins/ckeditor/ckeditor.js"></script>
<script src="https://cdn.tiny.cloud/1/2fmm6ia2vlt4f1qqaebsnhb5rhguo3u8vc6h17h3quk8oup8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="/dgaAdmin/assets/js/plugins/select2/js/select2.full.min.js"></script>
@yield('script')
</body>
</html>
