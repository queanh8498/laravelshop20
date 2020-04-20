<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nguoidung extends Model implements AuthenticatableContract
{
    const     CREATED_AT    = 'nd_ngaytaomoi';
    public $timestamps = false;
    protected $table        = 'nguoidung';
    
    protected $guard_name = 'web';

    protected $fillable     = ['nd_taikhoan', 'nd_matkhau', 'nd_hoten', 'nd_gioitinh', 'nd_email', 'nd_diachi', 'nd_dienthoai', 'nd_ngaytaomoi','nd_phanloai', 'nd_trangthai'];
    protected $guarded      = ['nd_id'];
    protected $primaryKey   = 'nd_id';
    protected $dates        = ['nd_ngaytaomoi'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    protected $rememberTokenName = 'nd_ghinhodangnhap';
    
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }
    /**
     * Hàm trả về tên cột dùng để tim `Mật khẩu`
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->nd_matkhau;
    }
    /**
     * Hàm dùng để trả về giá trị của cột "nv_ghinhodangnhap" session.
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }
    /**
     * Hàm dùng để set giá trị cho cột "nv_ghinhodangnhap" session.
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }
    /**
     * Hàm trả về tên cột dùng để chứa REMEMBER TOKEN
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['nd_matkhau'] = bcrypt($value);
    }
}
