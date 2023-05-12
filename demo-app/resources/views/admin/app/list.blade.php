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
                                <th>ID</th>
                                <th>NAME</th>
                                <th>SATUS</th>
                                <th>LOGO</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                    <tbody>

                        @foreach($listApp as $list)
                            <tr class="text-center">
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->status == MyApp::ONE ? 'hoạt động' :'không hoạt động' }}</td>
                                <td><img width="50xp" height="50xp" src="{{ url('upload/logo/'.$list->image ) }}"/></td>
                                <td class="center"><a href="{{ route('app.show',$list->id) }}"><i class='fas fa-pencil-alt'></a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</form>

 @endsection
