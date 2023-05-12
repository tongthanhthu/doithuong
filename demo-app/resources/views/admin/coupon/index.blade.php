
@extends('admin.main')

@section('content')
  @include('admin.alert')
<div class=" container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Coupon
        </h3>
      </div>
      <!-- /.card-header -->
      @if($app->coupon)
      <div class="card-body">
        <dl>
          <dt>Tên</dt>
          <dd>{{ $app->coupon->name }}</dd>
          <dt>Ảnh</dt>
          <dd><p> <img width="100px" height="100px" src="/upload/coupon/{{ $app->coupon->image }}"></p></dd>
          <dt>Giới thiệu</dt>
          <dd>{!! $app->coupon->introduce !!}</dd>
          <dt>Chú thích</dt>
          <dd>{!! $app->coupon->note !!}</dd>
          <dt>Số tem cần tích</dt>
          <dd>{{ $app->coupon->stamp_number }}</dd>
        </dl>
      </div>
      <div><a href="{{ route('coupon.show') }}"><button type="button" class="btn btn-block btn-outline-primary">Sửa</button></a></div>
      @else
           <div><h2>coupon chưa được cài đăt</h2></div>
           <div><a href="{{ route('coupon.create') }}"><button type="button" class="btn btn-block btn-outline-primary">cài đặt</button></a></div>
      @endif
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  @endsection
