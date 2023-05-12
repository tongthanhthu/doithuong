@extends('admin.main')

@section('head')
 <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
  @include('admin.alert')
    <form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên coupon</label>
            <input type="text" class="form-control" name="name" placeholder="nhập tên coupon" autofocus>
        </div>
        <div class="form-group">
            <label> Ảnh coupon</label>
            <input  type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Giới thiệu</label>
            <textarea name="introduce" id="editor1" class="form-control ckeditor" rows="2"></textarea>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">chú thích</label>
            <textarea name="note" id="editor1" class="form-control ckeditor" rows="2"></textarea>
        </div class="form-group">
            <label for="quantity">số tem</label>
            <input type="number" name="stamp_number" min="1" max="10" >
        <div>

        </div>
        </div>

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
@endsection

@section('script')

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
