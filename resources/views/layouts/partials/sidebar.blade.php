<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}"
             alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">My System</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Admin' }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">USER MANAGEMENT</li>

                <li class="nav-item">
                    <a href="{{ route('admin.userlist') }}"
                       class="nav-link {{ request()->routeIs('admin.userlist') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User List</p>
                    </a>
                </li>

                <li class="nav-header">ACCOUNT</li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>