@extends('admin.main')

@section('content')
  @include('admin.alert')
<body>

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="{{ route('customer-coupon.export') }}" method="POST" name="importform"
                   enctype="multipart/form-data">
                   @csrf
                   <label for="start">chọn ngày:</label>
                        <input type="date" id="start" name="date"
                            value="2022-01-22"
                            min="2022-01-01" max="2050-12-31">
                    <button class="btn btn-primary" type="submit">export</button>
                </form>
            </div>
        </div>
    </div>

    </body>
    @endsection
