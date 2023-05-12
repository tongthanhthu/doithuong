
<!DOCTYPE html>
<html lang="en">
<head>
   @include('customer.layout.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Quét mã "lào"</b>hihi</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng ký Hoặc Đăng Nhập </p>
       @include('customer.layout.alert')
      <form action="{{ route('register.store') }}" method="post">
        @csrf
        <div class="input-group mb-3 d-flex flex-row">
          <input type="phone" name="phone"  class="form-control" placeholder="nhập số điện thoại">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-4">Đi Tiếp</button>
        </div>

      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
 @include('customer.layout.footer')

</body>
</html>
