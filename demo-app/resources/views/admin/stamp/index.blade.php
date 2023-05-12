
@extends('admin.main')
@section('content')
  @include('admin.alert')
<div class=" container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-text-width"></i>
          Stamp Card
        </h3>
      </div>
      <!-- /.card-header -->
      @if($app->stamp)
      <div class="card-body">
        <dl>
          <dt>Số tem trong vòng</dt>
          <dd>{{ $app->stamp->stamp_number }}</dd>
          <dt>Tích được trong ngày</dt>
          <dd>{{ $app->stamp->many_time == MyApp::ONE ? 'có' :'không' }}</dd>
        </dl>
      </div>
    <div><a href="{{ route('stamp.show') }}"><button type="button" class="btn btn-block btn-outline-primary">Sửa</button></a></div>
          <div><a href="{{ route('stamp.createImage') }}"><button type="button" class="btn btn-block btn-outline-primary">cài đặt image</button></a></div>
         <div><a href="{{ route('stamp.indexImage') }}"><button type="button" class="btn btn-block btn-outline-primary">danh sách image stamp</button></a></div>

      @else
           <div><h2>stamp chưa được cài đăt</h2></div>
           <div><a href="{{ route('stamp.create')}}"><button type="button" class="btn btn-block btn-outline-primary">cài đặt</button></a></div>
      @endif
    </div>
  </div>
  @endsection
