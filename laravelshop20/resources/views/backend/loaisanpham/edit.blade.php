@extends('backend.layouts.master');

@section('title')
Sửa | Edit
@endsection

@section('feature-title')
<b>Sửa | E D I T 
</b>
@endsection

@section('main-content')

<script src="{{ asset('vendor/angularjs/angular.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<!-- show lỗi sai lên màn hình nếu có -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <!-- <li>{{ $error }}</li> -->
                <li>Loại sản phẩm đã tồn tại</li>
            @endforeach
        </ul>
    </div>
@endif

<form name="userForm" method="post" action="{{ route('danhsachloai.update',['id'=>$l->lsp_id]) }}">
<input type="hidden" name="_method" value="PUT" />
{{ csrf_field() }}
  <div class="form-row">

    <div class="form-group col-sm-3">
      <label for="lsp_id">ID</label>
      <input type="text" class="form-control" id="lsp_id" name="lsp_id" value="{{ $l->lsp_id }}" readonly>
    </div>
    <!-- /^.+@gmail.com$/ -->

    <div class="form-group col-sm-7">
      <label for="lsp_ten">Tên loại sản phẩm</label>
      <input type="text" class="form-control" id="lsp_ten" name="lsp_ten" value="{{ old('lsp_ten',$l->lsp_ten) }}" >
      </div>

  </div>

  <div class="form-row">
    <div class="form-group col-sm-7">
            <label for="lsp_trangthai">Trạng thái</label>
            <select id="lsp_trangthai" name="lsp_trangthai" class="form-control">
                    <option value="1" {{ old('lsp_trangthai',$l->lsp_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
                    <option value="2" {{ old('lsp_trangthai',$l->lsp_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
            </select>

    </div>

  </div>
  <button type="submit" class="btn btn-dark">Lưu</button>

</form>

</div>


@endsection



