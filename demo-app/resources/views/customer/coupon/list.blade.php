@extends('customer.main')

@section('contents')
@include('customer.layout.alert')

<form>
    <div id="page-wrapper">
        <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped table-bordered table-hover table-responsive  " id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Trạng Thái</th>
                                <th>Ảnh</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $i=1;?>

                        @foreach($listCoupon as $list)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $list->name }}</td>
                                <td class="project-state text-center">
                                    @if($list->status == MyApp::ONE)
                                      <span class="badge badge-success">chưa sử dụng</span>
                                    @else
                                    <span class="badge badge-danger">đã sử dụng</span>
                                    @endif
                                </td>
                                <td class="text-center"  ><img width="50xp" height="50xp" src="{{ url('upload/coupon/'.$list->image ) }}"/></td>
                                <td class="text-center"><a href="{{ route('customer.show',$list->id) }}"><i class='fas fa-envelope-open'></a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</form>

 @endsection
