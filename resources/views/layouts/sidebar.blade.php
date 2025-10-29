<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Mykonos</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Kelola -->
    <li class="nav-item">
        <a class="nav-link collapsed"
           href="#collapseKelola"
           data-toggle="collapse"
           aria-expanded="false"
           aria-controls="collapseKelola">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola</span>
        </a>
        <div id="collapseKelola" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengelolaan:</h6>
                <a class="collapse-item" href="{{ url('user') }}">User</a>
                <a class="collapse-item" href="{{ url('produk') }}">Produk</a>
                <a class="collapse-item" href="{{ url('kategori') }}">Kategori</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
