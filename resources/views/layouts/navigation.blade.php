<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block">{{ auth()->user()->first_name . auth()->user()->last_name  }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.slides.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-image"></i>
                    <p>
                        {{ __('Slide') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>
                        {{ __('Manajemen Kategori') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>
                        {{ __('Manajemen Barang') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>
                        {{ __('Manajemen Pesanan') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.reports.inventory') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        {{ __('Laporan Stok Barang') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->