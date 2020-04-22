@extends('backend.layouts.master');

@section('title')
Thêm mới sản phẩm | Create
@endsection

@section('feature-title')
<b>Thêm mới | C R E A T E 
</b>
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/angularjs/angular.min.js') }}"></script>
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')
<style>
        .error {color: red;}
        .valid {color: green;}
</style>
<!-- show lỗi sai lên màn hình nếu có -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div ng-app="validationApp" ng-controller="mainController">
<form name="userForm" ng-submit="submitForm()" novalidate
 method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <!-- id, tên -->
  <div class="form-row">
    
    <!-- /^.+@gmail.com$/ -->

    <div class="form-group col-sm-7">
      <label for="sp_ten">Tên sản phẩm</label>
      <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Sản phẩm"
      ng-model="sp_ten" ng-minlength="5" ng-maxlength="30" ng-required=true>
      <span class="error" ng-show="userForm.sp_ten.$error.required">Vui lòng nhập tên sản phẩm</span>
        <span class="error" ng-show="userForm.sp_ten.$error.minlength">Tên phải có it nhất 5 ký tự</span>
        <span class="error" ng-show="userForm.sp_ten.$error.maxlength">Chỉ cho phép tên nhiều nhất 30 ký tự</span>
    </div>
  </div>
  <!-- end id, tên -->
  <!-- thong tin -->
  <div class="form-row">
    <div class="form-group col-sm-10">
      <label for="sp_thongtin">Thông tin sản phẩm</label>
      <input type="text" class="form-control" id="sp_thongtin" name="sp_thongtin" placeholder="Sản phẩm"
      ng-model="sp_thongtin" ng-maxlength="100">
      <span class="error" ng-show="userForm.sp_thongtin.$error.required">Vui lòng nhập tên sản phẩm</span>
        <span class="error" ng-show="userForm.sp_thongtin.$error.maxlength">Chỉ cho phép tên nhiều nhất 100 ký tự</span>
    </div>
  </div>
  <!-- end thong tin -->

  <!-- loại, cl, dvt -->
  <div class="form-row">
    <div class="form-group col-sm-4">
    <label for="lsp_id">Loại sản phẩm</label>
        <select name="lsp_id" class="form-control">
            @foreach($danhsachloai as $loai)
                @if(old('lsp_id') == $loai->lsp_id)
                <option value="{{ $loai->lsp_id }}" selected>{{ $loai->lsp_ten }}</option>
                @else
                <option value="{{ $loai->lsp_id }}">{{ $loai->lsp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-3">
    <label for="cl_id">Chất liệu</label>
        <select name="cl_id" class="form-control">
            @foreach($danhsachchatlieu as $cl)
                @if(old('cl_id') == $cl->cl_id)
                <option value="{{ $cl->cl_id }}" selected>{{ $cl->cl_ten }}</option>
                @else
                <option value="{{  $cl->cl_id }}">{{ $cl->cl_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-3">
    <label for="dvt_id">Đơn vị</label>
        <select name="dvt_id" class="form-control">
            @foreach($danhsachdonvi as $dv)
                @if(old('dvt_id') == $dv->dvt_id)
                <option value="{{ $dv->dvt_id }}" selected>{{ $dv->dvt_ten }}</option>
                @else
                <option value="{{  $dv->dvt_id }}">{{ $dv->dvt_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

  </div>
  <!-- end loại, cl, dvt -->

  <!-- Gía -->
 <div class="form-row">
    <div class="form-group col-sm-5">
      <label for="sp_giagoc">Gía gốc</label>
      <input type="number" class="form-control" id="sp_giagoc" name="sp_giagoc" placeholder="Gía gốc"
      ng-model="sp_giagoc" min="50000" max="30000000" ng-required=true>
      <span class="error" ng-show="userForm.sp_giagoc.$error.required">Vui lòng nhập giá gốc</span>
      <span class="error" ng-show="userForm.sp_giagoc.$error.min">Giá gốc phải > 50,000 đ</span>
      <span class="error" ng-show="userForm.sp_giagoc.$error.max">Giá gốc phải < 30,000,000 đ</span>
      <span class="valid" ng-show="userForm.sp_giagoc.$valid">Hợp lệ</span>

    </div>
    <div class="form-group col-sm-5">
      <label for="sp_giaban">Gía bán</label>
      <input type="number" class="form-control" id="sp_giaban" name="sp_giaban" placeholder="Gía bán"
      ng-model="sp_giaban" min="50000" max="30000000" ng-required=true>
      <span class="error" ng-show="userForm.sp_giaban.$error.required">Vui lòng nhập giá bán</span>
      <span class="error" ng-show="userForm.sp_giaban.$error.min">Giá bán phải > 50,000 đ</span>
      <span class="error" ng-show="userForm.sp_giaban.$error.max">Giá bán phải < 30,000,000 đ</span>
      <span class="valid" ng-show="userForm.sp_giaban.$valid">Hợp lệ</span>
    </div>
  </div>
  <!-- end giá -->
  <!-- hinh dai dien, hình liên quan -->
  <div class="form-row">
    <div class="form-group col-sm-5">
        <div class="file-loading">
            <label>Hình đại diện</label>
            <input id="sp_hinh" type="file" name="sp_hinh" ng-model="sp_hinh" ng-required=true>
        </div>
        <span class="error" ng-show="userForm.sp_hinh.$error.required">Vui lòng chọn hình đại diện</span>

    </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-10">
          <div class="file-loading">
              <label>Hình liên quan</label>
              <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
          </div>
      </div>
    </div>

<!-- ngày tạo mới, trạng thái -->
  <div class="form-row">
    <!-- <div class="form-group col-sm-3">
        <label for="sp_ngaytaomoi">Ngày tạo mới</label>
        <input type="date" class="form-control" id="sp_ngaytaomoi" name="sp_ngaytaomoi"
        ng-required=true >
        <span class="error" ng-show="userForm.sp_ngaytaomoi.$error.required">Vui lòng chọn ngày tạo mới</span>
    </div> -->
    <div class="form-group col-sm-7">
            <label for="sp_trangthai">Trạng thái</label>
            <select id="sp_trangthai" name="sp_trangthai" class="form-control">
                    <option value="1" {{ old('sp_trangthai') == 1 ? "selected" : "" }}>Khóa</option>
                    <option value="2" {{ old('sp_trangthai') == 2 ? "selected" : "" }}>Khả dụng</option>
            </select>
    </div>

  </div>

  <button type="submit" class="btn btn-dark">Lưu</button>

</form>

<script>
    // tạo angular app
    var validationApp = angular.module('validationApp', []);
    // tạo Controller
    validationApp.controller('mainController', function ($scope) {
        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitForm = function () {
            // kiểm tra các ràng buộc là hợp lệ
            if ($scope.userForm.$valid) {
                alert('Hợp lệ, dữ liệu đã được gởi đăng ký.');
            }
        };
    });
</script>
</div>



@endsection

@section('custom-scripts')
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
            browseClass: "btn btn-primary btn-sm",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
            
        });

        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-sm",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"],
            
        });
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
@endsection



