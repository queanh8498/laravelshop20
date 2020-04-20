<?php

namespace App\Http\Controllers\Auth;

use App\nguoidung;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Mail;
use App\Mail\RegisterMailer;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login/'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nd_taikhoan' => 'required|string|max:50',
            'nd_matkhau' => 'required|string|min:6|confirmed',
            'nd_hoten' => 'required|string|max:100',
            'nd_gioitinh' => 'required',
            'nd_email' => 'required|email:rfc,dns',
            'nd_diachi' => 'required',
            'nd_dienthoai' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $nd = nguoidung::create([
            'nd_taikhoan' => $data['nd_taikhoan'],
            'nd_matkhau' => bcrypt($data['nd_matkhau']), //123456
            'nd_hoten' => $data['nd_hoten'],
            'nd_gioitinh' => $data['nd_gioitinh'],
            'nd_email' => $data['nd_email'],
            'nd_diachi' => $data['nd_diachi'],
            'nd_dienthoai' => $data['nd_dienthoai'],
            'nd_ngaytaomoi' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'nd_phanloai' => 1, // Mặc định là 1-Nhân viên
            'nd_trangthai' => 2, // Mặc định là 1-Khả dụng
        ]);
            //var_dump($nd);
            // Gởi mail thông báo đăng ký thành công
             Mail::to($nd['nd_email'])
             ->send(new RegisterMailer($nd));

            return $nd;
    }
}
