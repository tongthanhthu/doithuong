@extends('admin.main')

@section('content')
  @include('admin.alert')

<form>
    <div id="page-wrapper">
        <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>lần tích</th>
                                <th>ảnh đầu</th>
                                <th>ảnh sau</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($app->stamp->imagestamp as $image)
                            <tr class="text-center">
                                <td>{{$i++}}</td>
                                <td ><img width="50xp" height="50xp" src="{{ url('upload/stamp/'.$image->current_image) }}"/></td>
                                <td ><img width="50xp" height="50xp" src="{{ url('upload/stamp/'.$image->image_change) }}"/></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</form>
@endsection
