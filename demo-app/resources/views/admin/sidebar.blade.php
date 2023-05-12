<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block" href="/admin/main">Home</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        @if(Auth::user()->role == 'system_admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý app
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('app.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('app.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý Admin-App
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>

        @endif
          <li class="nav-header">DANH MỤC QUẢN LÝ</li>
          <li class="nav-item">
            <a href="/admin/coupon/index" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                setting coupon
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('stamp.index') }}" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                setting stamp card
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('store.index') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                 store
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('customer-coupon.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                export coupone
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
