<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->unsignedTinyInteger('nd_id')->autoIncrement();
            $table->string('nd_taikhoan');
            $table->string('nd_matkhau');
            $table->string('nd_hoten');
            $table->unsignedTinyInteger('nd_gioitinh')->default('1')->comment('giới tính 1: Nam; 2: nữ, 3: Khác');
            $table->string('nd_email');
            $table->string('nd_diachi');
            $table->string('nd_dienthoai');
            $table->timestamp('nd_ngaytaomoi')->nullable();
            $table->unsignedTinyInteger('nd_phanloai')->default('1')->comment('Phân loại 1: nhân viên; 2: Khách hàng');
            $table->unsignedTinyInteger('nd_trangthai')->default('1')->comment('Trạng thái 1: Khả dụng; 2: Xóa-ed');
            
            $table->unique(['nd_taikhoan', 'nd_email', 'nd_dienthoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
