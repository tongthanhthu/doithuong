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
                                <th>NAME APP</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                    <tbody>

                        @foreach($listUser as $list)
                            <tr class="text-center">
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->status == MyApp::ONE ? 'hoạt động' :'không hoạt động' }}</td>
                                <td>{{ $list->app->name }}
                                <td class="center"><a href="/admin/user/edit/{{ $list->id }}"><i class='fas fa-pencil-alt'></a></td>
                                <td class="center"><a href="/admin/user/delete/{{ $list->id }}"><i class='fa fa-trash'></a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

  @endsection
