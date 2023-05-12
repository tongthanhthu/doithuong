@extends('customer.main')

@section('contents')
@include('customer.layout.alert')

<form>
    <div id="page-wrapper">
        <div class="form-group">
            <div class="card-body">
                <dl>
                  <dt>Tên</dt>
                  <dd>{{ $coupon->name }}</dd>
                  <dt>Ảnh</dt>
                  <dd><p> <img width="100px" height="100px" src="{{ url('upload/coupon/'.$coupon->image ) }}"></p></dd>
                  <dt>Giới thiệu</dt>
                  <dd>{!! $coupon->introduce !!}</dd>
                  <dt>trạng thái</dt>
                  <dd>{{ $coupon->status == MyApp::ONE ? 'chưa sử dụng' :'đã sử dụng'  }}</dd>
                  <dt>ngày nhận</dt>
                  <dd>{{ $coupon->created_at->format('d-m-y') }}</dd>
                </dl>
                @if($coupon->status == MyApp::ONE)
                 <div><a href="{{ route('customer.edit',$coupon->id) }}"><button type="button" class="btn btn-block btn-outline-primary">Sử dụng</button></a></div>
                @endif
              </div>
        </div>

    </div>
</form>

 @endsection
