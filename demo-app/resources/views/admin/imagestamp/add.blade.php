@extends('admin.main')

@section('content')
  @include('admin.alert')
<form action="{{ route('stamp.createImage.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        @for ($i = 1; $i <= $app->stamp->stamp_number; $i++)
        <div><label>lần tích thứ :{{$i}}</label></div>
      <div class="form-group">
        <label class=" font-weight-normal"> Ảnh trước </label>
        <input  type="file" name="image[{{$i}}][current_image]" class="form-control">
       </div>
       <div class="form-group">
        <label class=" font-weight-normal"> Ảnh sau </label>
        <input  type="file" name="image[{{$i}}][image_change]" class="form-control">
       </div>
       @endfor

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
  </form>
@endsection

