<?php

use Illuminate\Database\Seeder;

class nguoidungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $today = new DateTime('2020-3-12 09:00:00');

        array_push($list, [
            'nd_id'        => "N1",
            'nd_taikhoan'  => "queanh",
            'nd_matkhau'   => bcrypt('123456'),
            'nd_hoten'     => "Quế Anh",
            'nd_gioitinh'  => 1,
            'nd_email'     => "queanhst98@gmail.com",
            'nd_diachi'    => "30-4, NK, CT",
            'nd_dienthoai' => "01234567820",
            'nd_ngaytaomoi'    => $today->format('Y-m-d H:i:s')          
        ]);
        array_push($list, [
            'nd_id'        => "N2",
            'nd_taikhoan'  => "minhminh",
            'nd_matkhau'   => bcrypt('minhminh'),
            'nd_hoten'     => "Minh Minh",
            'nd_gioitinh'  => 2,
            'nd_email'     => "minhminh@gmail.com",
            'nd_diachi'    => "3-2, NK, CT",
            'nd_dienthoai' => "01234567825",
            'nd_ngaytaomoi'    => $today->format('Y-m-d H:i:s')          
        ]);
        array_push($list, [
            'nd_id'        => "N3",
            'nd_taikhoan'  => "didi",
            'nd_matkhau'   => bcrypt('didi'),
            'nd_hoten'     => "Nguyễn Duy",
            'nd_gioitinh'  => 1,
            'nd_email'     => "nguyenduy@gmail.com",
            'nd_diachi'    => "NVL, NK, CT",
            'nd_dienthoai' => "01234567822",
            'nd_ngaytaomoi'    => $today->format('Y-m-d H:i:s')          
        ]);
        array_push($list, [
            'nd_id'        => "N4",
            'nd_taikhoan'  => "dudu",
            'nd_matkhau'   => bcrypt('dudu'),
            'nd_hoten'     => "Dũ Trần",
            'nd_gioitinh'  => 1,
            'nd_email'     => "dutran@gmail.com",
            'nd_diachi'    => "XVNT, NK, CT",
            'nd_dienthoai' => "01234567833",
            'nd_ngaytaomoi'    => $today->format('Y-m-d H:i:s')          
        ]);
        DB::table('nguoidung')->insert($list);

    }
}
