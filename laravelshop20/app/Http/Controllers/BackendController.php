<?php

namespace App\Http\Controllers;

use App\nguoidung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function activate(Request $request, $nd_id) 
    {
        $nd = nguoidung::find($nd_id);
        $nd->nd_trangthai = 1; // Khả dụng
        $nd->save();
        return redirect()->route('backend/danhsachsanpham');
    }
}