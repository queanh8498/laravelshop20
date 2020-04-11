<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\loaisanpham; 
use App\sanpham;
//use App\Vanchuyen;
//use App\Khachhang;
//use App\Donhang;
//use App\Thanhtoan;
//use App\Chitietdonhang;
use Carbon\Carbon;
use DB;
//use Mail;
//use App\Mail\ContactMailer;
//use App\Mail\OrderMailer;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
         $ds_top3_newest_loaisanpham = DB::table('loaisanpham')
             ->join('sanpham', 'loaisanpham.lsp_id', '=', 'sanpham.lsp_id')
             ->orderBy('lsp_ngaytaomoi')->take(3)->get();

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);
         //$danhsachsanpham = sanpham::all();

         // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
         $danhsachhinhanhlienquan = DB::table('hinhanh')
        ->whereIn('sp_id', $danhsachsanpham->pluck('sp_id')->toArray())->get();
        // Query danh sách Loại
        $danhsachloai = loaisanpham::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.index')
            ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
    private function searchSanPham(Request $request)
    {
        $query = DB::table('sanpham')->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByLoaiMa = $request->query('searchByLoaiMa');
        $searchByTen = $request->query('search-product');
        // if ($searchByLoaiMa != null) {

        // }
        if ($searchByTen != null) {
            $query->where('sp_ten','LIKE','%'.$searchByTen.'%');
        }
        $data = $query->get();
        return $data;
    }
    public function product(Request $request)
    {
        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->whereIn('sp_id', $danhsachsanpham->pluck('sp_id')->toArray())
                                ->get();

        // Query danh sách Loại
        $danhsachloai = loaisanpham::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.pages.product')
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
    /**
     * Action hiển thị chi tiết Sản phẩm
     */
    public function productDetail(Request $request, $id)
    {
        $sanpham = sanpham::find($id);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->where('sp_id', $id)
                                ->get();

        // Query danh sách Loại
        $danhsachloai = loaisanpham::all();

        return view('frontend.pages.product-detail')
            ->with('sp', $sanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
