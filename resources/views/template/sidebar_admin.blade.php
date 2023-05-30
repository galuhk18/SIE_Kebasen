<ul class="navbar-nav bg-side sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
           
           <img width="50px" src="{{ asset('assets/img/logo-bms.png') }}" alt="logo">
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

    <hr class="sidebar-divider">



 

    <div class="sidebar-heading text-dark">
        Master
    </div>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('population.index') }}">
            <i class="fas fa-users"></i>
            <span>Data Warga Penduduk</span></a>
    </li>




    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Data Penduduk</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('birth.index') }}">Data Kelahiran</a>
                <a class="collapse-item" href="{{ route('death.index') }}">Data Kematian</a>
                <a class="collapse-item" href="{{ route('service.index') }}">Data Layanan</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('activity.index') }}">
            <i class="fas fa-calendar"></i>
            <span>Jadwal Kegiatan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('facility.index') }}">
            <i class="fas fa-building"></i>
            <span>Facility</span></a>
    </li>
    
    <div class="sidebar-heading text-dark">
        Profile
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.executive.index') }}">
            <i class="fas fa-user-secret"></i>
            <span>Executive</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.admin.index') }}">
            <i class="fas fa-user"></i>
            <span>Admin</span></a>
    </li>
    @if (session()->has('admin_id'))
        
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.admin.profile') }}">
            <i class="fa fa-user-circle"></i>
            <span>Profile Saya</span>
        </a>
    </li>
    @endif

    <hr class="sidebar-divider my-0">






    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
