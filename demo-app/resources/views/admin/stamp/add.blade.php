@extends('admin.main')


@section('content')
  @include('admin.alert')
    <form action="{{ route('stamp.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <label for="quantity">số tem</label>
            <input type="number" name="stamp_number" min="1" max="10" >
        <div>
        <div class="form-group">
            <label>cho tích trong ngày</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="many_time">
                <label class="form-check-label">không</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio"  value="1" name="many_time" checked>
                <label class="form-check-label">có</label>
            </div>
            </div>
        </div>
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
        </div>

    </form>
@endsection

