@extends('backend.layouts.master')

@section('title')
Danh sách sản phẩm | Products List
@endsection

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

<style>
th{
    font-size: 15px;
    text-align: center;

}
td{
        font-size: 13px;
        text-align: center;


    }
</style>

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
<a href="{{ route('danhsachsanpham.create') }}" class="btn-1">Create</a>
<br><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên</th>
            <th>Hình</th>
            <th>Gía gốc</th>
            <th>Gía bán</th>
            <th>Đơn vị</th>
            <th>Chất liệu</th>
            <th>Trạng thái</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

    <?php $stt=1; ?>

    @foreach($danhsachsanpham as $sp)
        <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $sp->sp_id }}</td>
                <td>{{ $sp->sp_ten }}</td>
                <td><img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="img-list" style="width: 200px; height: 150px;" /></td>
                <td>{{ $sp->sp_giagoc }}</td>
                <td>{{ $sp->sp_giaban }}</td>
                <td>{{ $sp->donvitinh->dvt_ten }}</td>
                <td>{{ $sp->chatlieu->cl_ten }}</td>

                @if($sp->sp_trangthai==1)
                    <td><span class="badge badge-danger">Khóa</span></td>
                @else
                    <td><h5><span class="badge badge-secondary">Khả dụng</span></h5></td>
                @endif
                <td>{{ $sp->sp_ngaytaomoi }}</td>
                <td>{{ $sp->sp_ngaycapnhat }}</td>
                <td >
            <a href="{{ route('danhsachsanpham.edit', ['id' => $sp->sp_id]) }}" class="btn btn-outline-primary pull-left"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>

            <form method="post" action="{{ route('danhsachsanpham.destroy', ['id' => $sp->sp_id]) }}" class="pull-left">
                <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                <input type="hidden" name="_method" value="DELETE" />
                <!-- Khi gởi bất kỳ Request POST, Laravel Framework mặc định cần có token để chống lỗi bảo mật CSRF 
                - Bạn có thể tắt đi, nhưng lời khuyên là không nên tắt chế độ bảo mật CSRF đi.
                - Thay vào đó, sử dụng hàm `csrf_field()` để tự sinh ra 1 input có token dành riêng cho CSRF
                -->
                {{ csrf_field() }}
                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> </button>
            </form>        </tr>
    <?php $stt++; ?>
    @endforeach
    
    </tbody>

</table>
{{ $danhsachsanpham->links() }}


@endsection