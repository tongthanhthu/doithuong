
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="justify-content: space-between">
    <!-- Left navbar links -->
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

    @if(Auth::user()->role == 'system_admin')

    <form action="{{ route('admin.search') }}" method="post" >
      @csrf
        <div class="form-group">
            <h3 class="card-title card-header">Chọn App</h3>
            <select class="btn btn-outline-primary"  style="width:300px; height:38px; " name="id">
             @foreach($listApp as $list)
              <option {{ session('id_app') == $list->id ? 'selected':''}} value ="{{$list->id}}" > {{$list->name}} </option>
            @endforeach
            </select>
            <input type="submit" value="Đi đến" class="btn btn-outline-primary">
        </div>
    </form>

    @endif

    <ul class="nav navbar-top-links navbar-right" >
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
              <li><i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}
              </li>
              </li>
              <li><a href="/admin/user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
          </ul>
          <li>
          </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

    @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}} </h3>
              </div>

              @yield('content')

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  </div>
<!-- ./wrapper -->

 @include('admin.footer')
</body>
</html>
