<ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
           
           <i class="fa fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
           {{env('APP_NAME')}}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider my-0">



    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-user-secret"></i>
            <span>Executive</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('population.index') }}">
            <i class="fas fa-users"></i>
            <span>Population</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('facility.index') }}">
            <i class="fas fa-building"></i>
            <span>Facility</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.admin.index') }}">
            <i class="fas fa-users"></i>
            <span>Admin</span></a>
    </li>

    <hr class="sidebar-divider my-0">






    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
