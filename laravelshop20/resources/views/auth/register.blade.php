<!-- dieu huong den trang ban muon phù hợp với quyền người dùng - vào file registercontroller -->
@extends('backend.layouts.master')

@section('main-content')

<form name="frmdangky" id="frmdangky" method="post" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h1>Đăng ký</h1>
                        <p class="text-muted">Tạo tài khoản</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Mã tài khoản" name="nd_id" value="{{ old('nd_id') }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Tên tải khoản" name="nd_taikhoan" value="{{ old('nd_taikhoan') }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Mật khẩu" name="nd_matkhau" value="{{ old('nd_matkhau') }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Xác nhận Mật khẩu" name="nd_matkhau_confirmation" value="{{ old('nd_matkhau_confirmation') }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Họ tên" name="nd_hoten" value="{{ old('nd_hoten') }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <select name="nd_gioitinh" class="form-control">
                                <option value="1" {{ old('nd_gioitinh') == "1" ? 'selected' : ''}}>Nam</option>
                                <option value="2" {{ old('nd_gioitinh') == "2" ? 'selected' : ''}}>Nữ</option>
                                <option value="3" {{ old('nd_gioitinh') == "3" ? 'selected' : ''}}>Khác</option>
                            </select>
                        </div>
                        <!-- Start Form group EMAIL -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="email" placeholder="Email" name="nd_email" value="{{ old('nd_email') }}">
                        </div><!-- /form group EMAIL -->
                        <!-- ============== END Form group EMAIL ================= -->
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Địa chỉ" name="nd_diachi" value="{{ old('nd_diachi') }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Điện thoại" name="nd_dienthoai" value="{{ old('nd_dienthoai') }}">
                        </div>
                        <button class="btn btn-block btn-success" name="btnDangKy">Tạo tài khoản</button>
                    </div>
                    <div class="card-footer p-4">
                        <div class="row">
                            <div class="col-12">
                                <center>Nếu bạn đã có Tài khoản, xin mời Đăng nhập</center>
                                <a class="btn btn-primary form-control" href="{{ route('login') }}">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection