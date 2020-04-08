<?php

namespace App\Http\Controllers\Auth;

use App\nguoidung;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
    logout as performLogout;}

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend/danhsachsanpham';//'/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        return 'nd_taikhoan';
    }  
    protected function credentials(Request $request)
    {
        $cred = $request->only($this->username(), 'nd_matkhau');
        return $cred;
    }
    /**
     * Hàm dùng để Kiểm tra tính hợp lệ của dữ liệu (VALIDATE) khi Xác thực tài khoản
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string', // tên tài khoản bắt buộc nhập
            'nd_matkhau' => 'required|string',      // mật khẩu bắt buộc nhập
        ]);
    }
    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

}
