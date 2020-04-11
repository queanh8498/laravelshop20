@extends('backend.layouts.master');

@section('title')
Thêm mới loại | Create
@endsection

@section('feature-title')
<b>Thêm mới | C R E A T E 
</b>
@endsection

@section('main-content')

<script src="{{ asset('vendor/angularjs/angular.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<style>
        .error {color: red;}
        .valid {color: green;}
</style>
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

<div ng-app="validationApp" ng-controller="mainController">
<form name="userForm" ng-submit="submitForm()" novalidate
 method="post" action="{{ route('danhsachloai.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-row">

    <div class="form-group col-sm-3">
      <label for="lsp_id">ID</label>
      <input type="text" class="form-control" id="lsp_id" name="lsp_id" placeholder="ID" value="{{ old('lsp_id') }}"
      ng-model="lsp_id" ng-minlength="5" ng-maxlength="5" ng-pattern="/^L/" ng-required=true>
      <span class="error" ng-show="userForm.lsp_id.$error.required">Vui lòng nhập ID</span>
      <span class="error" ng-show="userForm.lsp_id.$error.pattern">ID phải bắt đầu bằng L</span>
        <span class="error" ng-show="userForm.lsp_id.$error.minlength">ID phải có 5 ký tự</span>
        <span class="error" ng-show="userForm.lsp_id.$error.maxlength">ID phải có 5 ký tự</span>
        <span class="valid" ng-show="userForm.lsp_id.$valid">Hợp lệ</span>
    </div>
    <!-- /^.+@gmail.com$/ -->

    <div class="form-group col-sm-7">
      <label for="lsp_ten">Tên loại sản phẩm</label>
      <input type="text" class="form-control" id="lsp_ten" name="lsp_ten" placeholder="Loại sản phẩm"
      ng-model="lsp_ten" ng-minlength="5" ng-maxlength="30" ng-required=true>
      <span class="error" ng-show="userForm.lsp_ten.$error.required">Vui lòng nhập tên Loại</span>
        <span class="error" ng-show="userForm.lsp_ten.$error.minlength">Tên phải có it nhất 5 ký tự</span>
        <span class="error" ng-show="userForm.lsp_ten.$error.maxlength">Chỉ cho phép tên nhiều nhất 30 ký tự</span>
    </div>

  </div>

  <div class="form-row">

    <div class="form-group col-sm-3">
        <label for="lsp_ngaytaomoi">Ngày tạo mới</label>
        <input type="date" class="form-control" id="lsp_ngaytaomoi" name="lsp_ngaytaomoi"
        ng-model="lsp_ngaytaomoi" ng-required=true>
        <span class="error" ng-show="userForm.lsp_ten.$error.required">Vui lòng chọn ngày tạo mới</span>

    </div>
    <div class="form-group col-sm-7">
            <label for="lsp_trangthai">Trạng thái</label>
            <select id="lsp_trangthai" name="lsp_trangthai" class="form-control">
                    <option value="1" {{ old('lsp_trangthai') == 1 ? "selected" : "" }}>Khóa</option>
                    <option value="2" {{ old('lsp_trangthai') == 2 ? "selected" : "" }}>Khả dụng</option>
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



