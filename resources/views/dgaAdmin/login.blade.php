<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>HỆ THỐNG QUẢN TRỊ CLMM CRE DUNGA</title>
    <link rel="shortcut icon" href="{{ $setting->favicon }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="/dgaAdmin/assets/css/oneui.min-5.2.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-16158021-6"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-16158021-6');</script>
</head>
<body>
<div id="page-container">
    <main id="main-container">
        <div class="hero-static d-flex align-items-center">
            <div class="content">
                <div class="row justify-content-center push">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            @foreach($errors->all() as $error)
                            <p class="mb-0">
                                {{ $error }}
                            </p>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="block block-rounded mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Đăng nhập</h3>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                    <h1 class="h2 mb-1">CLMM</h1>
                                    <p class="fw-medium text-muted">
                                        Xin chào đã quay lại, vui lòng đăng nhập.
                                    </p>
                                    <form class="js-validation-signin" action="{{ route('admin.login.post') }}" method="POST">
                                        @csrf
                                        <div class="py-3">
                                            <div class="mb-4">
                                                <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="username" placeholder="Username">
                                            </div>
                                            <div class="mb-4">
                                                <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn w-100 btn-alt-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Đăng nhập
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fs-sm text-muted text-center">
                    <strong>{{ $setting->name }}</strong> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="/dgaAdmin/assets/js/oneui.app.min-5.2.js"></script>
<script src="/dgaAdmin/assets/js/lib/jquery.min.js"></script>
</body>
</html>


