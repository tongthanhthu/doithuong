@extends('admin.main')

@section('head')
 <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
  @include('admin.alert')
  @if($app->coupon)
    <form action="{{ route('coupon.update', $app->coupon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên coupon</label>
            <input type="text" value="{{ $app->coupon->name }}" class="form-control" name="name" placeholder="nhập tên coupon" >
        </div>
        <div class="form-group">
            <label> Ảnh coupon hiện tại </label>
            <p> <img width="100px" height="100px" src="{{ url('upload/coupon/'.$app->coupon->image ) }}"></p>
            <label> thay đổi ảnh coupon </label>
            <input  type="file" name="image" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Giới thiệu</label>
            <textarea name="introduce"  id="editor1" class="form-control ckeditor" rows="2">{{ $app->coupon->introduce }}</textarea>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">chú thích</label>
            <textarea name="note" id="editor1" class="form-control ckeditor" rows="2">{{ $app->coupon->note }} </textarea>
        </div class="form-group">
            <label for="quantity">số tem</label>
            <input type="number" value="{{ $app->coupon->stamp_number }}" name="stamp_number" min="1" max="20">
        <div>
            <input type="hidden" name="id" value="{{ $app->coupon->id }}">

        </div>
        </div>

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </form>
    @else
    <div><h2> bạn cần cài đặt coupon trước</h2></div>
    @endif
@endsection

@section('script')

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
