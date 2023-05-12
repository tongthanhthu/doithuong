@extends('admin.main')

@section('content')
  @include('admin.alert')
<form action="/admin/user/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên </label>
        <input type="text" class="form-control" name="name" placeholder="nhập tên đăng nhập">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input  type="password" name="password" class="form-control" placeholder="nhập mật khẩu">
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Tên app quản lý </label>
        <select style="width:300px" name="appid">
                @foreach($listApp as $list)
                    <option value ="{{$list->id}}" > {{$list->name}} </option>
                @endforeach
        </select>
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
