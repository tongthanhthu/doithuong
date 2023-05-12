@extends('customer.main')

@section('contents')
@include('customer.layout.alert')

<div class="card card-success">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-4">
          <div class="card mb-2 bg-gradient-dark">
            <img class="card-img-top" src="upload/img/photo1.jpg" alt="Dist Photo 1">
            <div class="card-img-overlay d-flex flex-column justify-content-end">
              <h5 class="card-title text-primary text-white">Xin chào </h5>
              <p class="card-text text-white pb-2 pt-1">cảm ơn đã sử dùng dịch vụ của chúng tui</p>
              <a href="#" class="text-white">một ngày tốt lành</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection
