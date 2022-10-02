@extends('dgaAdmin.app')
@section('main')
    <main id="main-container">
        <div class="content">
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        CHANGE PASSWORD
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
                    <form action="{{ route('admin.changePassPost') }}" method="POST">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Đổi Mật Khẩu</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Xác nhận
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row justify-content-center py-sm-3 py-md-5">
                                    <div class="col-sm-10 col-md-8">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-username">Mật khẩu cũ</label>
                                            <input type="password" class="form-control form-control-alt" name="oldpass" placeholder="************">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-password">Mật khẩu mới</label>
                                            <input type="password" class="form-control form-control-alt" name="newpass" placeholder="************">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="block-form1-password">Nhập lại mật khẩu mới</label>
                                            <input type="password" class="form-control form-control-alt" name="confpass" placeholder="************">
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
