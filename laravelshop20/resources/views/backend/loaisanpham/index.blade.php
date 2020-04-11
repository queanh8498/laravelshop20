<!-- trang này sử dụng khung được thiết kế trong file master -->
@extends('backend.layouts.master') 

<!-- điền lỗ title trong master -->
@section('title')
Danh sách loại sản phẩm | Categories List
@endsection


@section('feature-title')
<b>Danh sách Loại | List of Categories
</b>
@endsection

<!-- điền lỗ main-content trong master -->
@section('main-content')

<style>

th{
    font-size: 15px;
    text-align: center;

}
td{
        font-size: 13px;
        text-align: center;


    }

    .btn-1 {
  background: none;
  border: 3px solid black;
  border-radius: 5px;
  color: black;
  
  font-size: 15px;
  font-weight: bold;
  margin: 10px auto;
  padding: 10px 15px;
  position: relative;
  text-transform: uppercase;
}
.btn-1:hover {
  color: white; /*chữ sau khi hover */
}

.btn-1:hover:after {
  height: 100%;
}
.btn-1::after {
  height: 0;
  left: 0;
  top: 0;
  width: 100%;
  background: black;
  content: '';
  position: absolute;
  z-index: -1;
  -webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
  -o-transition: all 0.3s;
	transition: all 0.3s;
}
</style>

<!-- thẻ cảnh báo -->
<div class="flash-message">
    @foreach(['danger','warning','success','info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </p>
        @endif
    @endforeach
</div>


<!-- nút thêm -->
<a href="{{ route('danhsachloai.create') }}" class="btn-1">Create</a>
<br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên</th>
            <th>Ngày tạo mới</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

    <?php $stt = 1; ?>
    @foreach($danhsachloai as $l)
        <tr>

            <td> {{ $loop->index + 1 }}</td>
            <td> {{ $l->lsp_id }} </td>
            <td> {{ $l->lsp_ten }}</td>
            <td> {{ $l->lsp_ngaytaomoi }} </td>

            @if($l->lsp_trangthai == 1)
                <td><span class="badge badge-danger">Khóa</span></td>
            @else
                <td><span class="badge badge-secondary">Khả dụng</span></td>
            @endif

            <td >
            <a href="{{ route('danhsachloai.edit', ['id' => $l->lsp_id]) }}" class="btn btn-outline-primary pull-left"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>

            <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $l->lsp_id]) }}" class="pull-left">
                <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                <input type="hidden" name="_method" value="DELETE" />
                <!-- Khi gởi bất kỳ Request POST, Laravel Framework mặc định cần có token để chống lỗi bảo mật CSRF 
                - Bạn có thể tắt đi, nhưng lời khuyên là không nên tắt chế độ bảo mật CSRF đi.
                - Thay vào đó, sử dụng hàm `csrf_field()` để tự sinh ra 1 input có token dành riêng cho CSRF
                -->
                {{ csrf_field() }}
                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> </button>
            </form>
            
            </td>

        </tr>
    <?php $stt++; ?>
    @endforeach
    </tbody>
</table>

{{ $danhsachloai->links() }}

@endsection

