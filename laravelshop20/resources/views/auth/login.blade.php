@extends('backend.layouts.master')

@section('main-content')
<div class="container">
<form name="frmdangnhap" id="frmdangnhap" method="post" action="{{ route('login') }}"> {{ csrf_field() }}
    <div class="container mt-4">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Đăng nhập</h1>
                            <p class="text-muted">Nhập thông tin Tài khoản</p>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                
                                <input class="form-control" type="text" name="nd_taikhoan" value="{{ old('nd_taikhoan') }}" required autofocus placeholder="Tên đăng nhập">
                                @if ($errors->has('nd_taikhoan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nd_taikhoan') }}</strong>
                                    </span>
                                @endif
                            
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" name="nd_matkhau" required placeholder="Mật khẩu">
                                @if ($errors->has('nd_taikhoan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nd_taikhoan') }}</strong>
                                    </span>
                                @endif
                                </div>
                            <div class="col-md-6">
                            <div class="input-group-prepend">
                                   </div>

                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary" name="btnDangNhap">Đăng nhập</button>
                                </div>

                                <div class="col-6">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Quên mật khẩu?
                                </a>                               
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Đăng ký</h2>
                                <p>Đăng ký để làm thành viên của Trang web bán hàng. Bạn sẽ được một số quyền lợi nhất
                                    định khi làm thành viên của Chúng tôi.</p>
                                <a class="btn btn-primary active mt-3" href="{{ route('register') }}">Đăng
                                    ký ngay!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection