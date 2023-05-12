@extends('admin.main')

@section('content')
  @include('admin.alert')
<form action="{{route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên </label>
        <input type="text" class="form-control" name="name" placeholder="nhập tên đăng nhập" value="{{ $user->name }}">
      </div>
      <div class="form-group">
        <input type="checkbox" name="changePassword" id="changePassword">
        <label>đổi mật khẩu</label>
        <input  type="password" name="password" id="password" class="form-control password" placeholder="nhập mật khẩu" disabled>
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Tên app quản lý </label>
        <select style="width:300px" name="appid" >
                @foreach($listApp as $list)
                    <option {{ $user->app_id == $list->id ? 'selected':''}} value="{{ $list->id }}"> {{$list->name}} </option>
                @endforeach
        </select>
       </div>
      <div class="form-group">
        <label>kích hoạt</label>
        <div class="form-check">
          <input class="form-check-input" type="radio"
            {{ $user->status == MyApp::ZERO ? ' checked ' : '' }}
           value="0" name="status">
          <label class="form-check-label">không</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio"  value="1"
            {{ $user->status == MyApp::ONE ? ' checked ' : '' }}
          name="status" >
          <label class="form-check-label">có</label>
        </div>
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    <input type="hidden" name="id" value="{{ $user->id }}">
  </form>
@endsection

@section('script')
<script >
    $(document).ready(function(){
       $("#changePassword").change(function(){
           if($(this).is(":checked")){
               $(".password").removeAttr('disabled');
           }
           else{
               $(".password").attr('disabled','');
           }
       });
    });
</script>

@endsection
