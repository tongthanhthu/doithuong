@extends('admin.main')

@section('content')
  @include('admin.alert')
<form action="{{ route('app.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên App</label>
        <input type="text" class="form-control" name="name" placeholder="nhập tên app">
      </div>
      <div class="form-group">
        <label> Ảnh logo</label>
        <input  type="file" name="image" class="form-control">
       </div>
      <div class="form-group">
        <label>kích hoạt</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="0" name="status">
          <label class="form-check-label">không</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio"  value="1" name="status" checked>
          <label class="form-check-label">có</label>
        </div>
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
  </form>
@endsection
