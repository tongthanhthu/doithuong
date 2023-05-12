@extends('admin.main')

@section('content')
  @include('admin.alert')

  <body>
   <div class="container my-5">
       <div class="row">
           <div class="d-flex my-2">
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Store
                </button>
           </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên </th>
                    <th scope="col">Địa chỉ</th>
                    <th> ảnh qr</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($listStore as $key => $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                       <td>
                        @php
                            $qr_url = url('/customer/qr/'.$item->app_id)
                        @endphp
                            <div>
                                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(50)->generate($qr_url)) !!} ">
                            </div>
                            <div>
                                 <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($qr_url)) !!} " download>Downloads</a></div>
                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
            <div> {{ $listStore->links() }}</div>
       </div>
   </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/store/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>

 @endsection
