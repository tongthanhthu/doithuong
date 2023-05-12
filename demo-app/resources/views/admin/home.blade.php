
@extends('admin.main')

@section('content')

<div class="col-md-12">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user shadow">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <h3 class="widget-user-username">{{ $app->name }}</h3>
        <h5 class="widget-user-desc">Dịch vụ quét mã</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="{{ url('upload/logo/'.$app->image ) }}" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="row">

          <!-- /.col -->
          <div class="col-sm-12 border-right">
            <div class="description-block">
              <h5 class="description-header">{{ $app->status == MyApp::ONE ? ' đang hoạt động' :'không hoạt động' }}</h5>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
@endsection

