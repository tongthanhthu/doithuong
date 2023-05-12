@extends('admin.main')

@section('content')
  @include('admin.alert')

    <form action="{{ route('app.update', $app->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên App</label>
                <input type="text" class="form-control" name="name" placeholder="nhập tên app" value="{{ $app->name }}">
            </div>
            <div class="form-group">
                <label> Ảnh logo hiện tại </label>
                <p> <img width="100px" height="100px" src="{{ url('upload/logo/'.$app->image ) }}"></p>
                <label> thay đổi logo </label>
                <input  type="file" name="image" class="form-control" value="{{ $app->image }}" >
            </div>
            <div class="form-group">
                <label>kích hoạt</label>
                <div class="form-check">
                <input class="form-check-input" type="radio"
                    {{ $app->status == MyApp::ZERO ? ' checked ' : '' }}
                value="0" name="status">
                <label class="form-check-label">không</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio"
                    {{ $app->status == MyApp::ONE ? ' checked ' : '' }}
                value="1" name="status">
                <label class="form-check-label">có</label>
            </div>
            <input type="hidden" name="id" value="{{ $app->id }}">
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">cập nhật</button>
        </div>
    </form>

@endsection
