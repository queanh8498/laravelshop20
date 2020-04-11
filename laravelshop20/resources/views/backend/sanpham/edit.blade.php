@extends('backend.layouts.master')

@section('title')
Sửa | Edit
@endsection

@section('feature-title')
<b>Sửa | E D I T 
</b>
@endsection


@section('main-content')
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<!-- show lỗi sai lên màn hình nếu có -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <!-- <li>{{ $error }}</li> -->
                <li>Sản phẩm đã tồn tại</li>
            @endforeach
        </ul>
    </div>
@endif

<form name="userForm" method="post" action="{{ route('danhsachsanpham.update',['id'=>$sp->sp_id]) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT" />
{{ csrf_field() }}
  <div class="form-row">

    <div class="form-group col-sm-2">
      <label for="sp_id">ID</label>
      <input type="text" class="form-control" id="sp_id" name="sp_id" value="{{ $sp->sp_id }}" readonly>
    </div>
    <!-- /^.+@gmail.com$/ -->

    <div class="form-group col-sm-8">
      <label for="sp_ten">Tên sản phẩm</label>
      <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten',$sp->sp_ten) }}" >
    </div>
    <div class="form-group col-sm-5">
      <label for="sp_giagoc">Gía gốc</label>
      <input type="number" class="form-control" id="sp_giagoc" name="sp_giagoc" value="{{ old('sp_giagoc',$sp->sp_giagoc) }}" >
    </div>
    <div class="form-group col-sm-5">
      <label for="sp_giaban">Gía bán</label>
      <input type="number" class="form-control" id="sp_giaban" name="sp_giaban" value="{{ old('sp_giaban',$sp->sp_giaban) }}" >
    </div>
    

  </div>

  <div class="form-row">
    <div class="form-group col-sm-5">
            <label for="lsp_id">Loại</label>
            <select name="lsp_id" class="form-control">
            @foreach($danhsachloai as $l)
                @if($l->lsp_id == $sp->lsp_id)
                <option value="{{ $l->lsp_id }}" selected>{{ $l->lsp_ten }}</option>
                @else
                <option value="{{ $l->lsp_id }}">{{ $l->lsp_ten }}</option>
                @endif
            @endforeach
        </select>
        </div>
    <div class="form-group col-sm-5">
            <label for="cl_id">Chất liệu</label>
            <select name="cl_id" class="form-control">
            @foreach($danhsachchatlieu as $cl)
                @if($cl->cl_id == $sp->cl_id)
                <option value="{{ $cl->cl_id }}" selected>{{ $cl->cl_ten }}</option>
                @else
                <option value="{{ $cl->cl_id }}">{{ $cl->cl_ten }}</option>
                @endif
            @endforeach
        </select>
        </div>
  </div>

  <div class="form-row">
  <div class="form-group col-sm-10">
      <label for="sp_thongtin">Thông tin sản phẩm</label>
      <input type="text" class="form-control" id="sp_thongtin" name="sp_thongtin" value="{{ old('sp_thongtin',$sp->sp_thongtin) }}" >
    </div>  
  </div>

    <div class="form-group">
        <label for="sp_hinh">Hình đại diện</label>
        <div class="file-loading">
            <input id="sp_hinh" type="file" name="sp_hinh">
        </div>
    
    </div>
    <div class="form-row">
        <div class="form-group">
        <label>Hình ảnh liên quan sản phẩm</label>
            <div class="file-loading">
                <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
            </div>
        </div>
    </div>


  <div class="form-row">
    <div class="form-group col-sm-3">
            <label for="sp_trangthai">Trạng thái</label>
            <select id="sp_trangthai" name="sp_trangthai" class="form-control">
                <option value="1" {{ old('sp_trangthai', $sp->sp_trangthai) == 1 ? "selected" : "" }}>Khóa</option>
                <option value="2" {{ old('sp_trangthai', $sp->sp_trangthai) == 2 ? "selected" : "" }}>Khả dụng</option>
            </select>

    </div>
  </div>
  <button type="submit" class="btn btn-dark">Lưu</button>

</form>

</div>


@endsection


@section('custom-scripts')
<script src="{{ asset('vendor/angularjs/angular.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            append: false,
            showRemove: false,
            autoReplace: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('/storage/photos/' . $sp->sp_hinh) }}" //asset mặc định vào thư mục public
            ],
            initialPreviewConfig: [
                {
                    caption: "{{ $sp->sp_hinh }}", 
                    size: {{ Storage::exists('public/photos/' . $sp->sp_hinh) ? Storage::size('public/photos/' . $sp->sp_hinh) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: 1
                },
            ]
        });
        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-sm",
            fileType: "any",
            append: false,
            showRemove: false,
            autoReplace: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"],
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                @foreach($sp->hinhanhlienquan()->get() as $hinhanh)
                "{{ asset('/storage/photos/' . $hinhanh->ha_ten) }}",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($sp->hinhanhlienquan()->get() as $index=>$hinhanh)
                {
                    caption: "{{ $hinhanh->ha_ten }}", 
                    size: {{ Storage::exists('public/photos/' . $hinhanh->ha_ten) ? Storage::size('public/photos/' . $hinhanh->ha_ten) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: {{ ($index + 1) }}
                },
                @endforeach
            ]
        });
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
@endsection


