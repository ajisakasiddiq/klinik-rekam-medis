<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Klinik Pratama Aisyiyah Ambulu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(Auth::user()->role == 'admin')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('/')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

     <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('user')) ? 'active' : ''}}" href="{{ route('user.index') }}">
            <i class="fas fa-user-alt" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Data User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('pasien')) ? 'active' : ''}}" href="{{ route('pasien.index') }}">
            <i class="fas fa-user-edit" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Data Pasien</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="fas fa-users" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Kunjungan Pasien</span></a>
    </li>

     <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="fas fa-fw fa-cog" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Laporan</span></a>
        </a>

        <hr class="sidebar-divider my-0">
        
         <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="far fa-file-alt" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Riwayat Kunjungan</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="far fa-file-alt" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Laporan Pembayaran</span></a>

     <hr class="sidebar-divider my-0">

    @elseif(Auth::user()->role == 'dokter')
    <li class="nav-item {{ (request()->is('/')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('user')) ? 'active' : ''}}" href="{{ route('user.index') }}">
            <i class="fa-duotone fa-user" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Pemeriksaan</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link {{ (request()->is('user')) ? 'active' : ''}}" href="{{ route('user.index') }}">
            <i class="fas fa-user-edit" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Resep Obat</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('tindakan')) ? 'active' : ''}}" href="{{ route('tindakan.index') }}">
            <i class="fas fa-user-edit" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Tindakan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="fa-duotone fa-user" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Rekam Medis</span></a>
    </li>
    @elseif(Auth::user()->role == 'apoteker')
    <li class="nav-item {{ (request()->is('/')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('obat')) ? 'active' : ''}}" href="{{ route('obat.index') }}">
            <i class="fas fa-pills" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Data Obat</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="fa-duotone fa-user" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Data Obat Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('material')) ? 'active' : ''}}" href="#">
            <i class="fa-duotone fa-user" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Data Obat Pasien</span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('supplier')) ? 'active' : ''}}" href="{{ route('supplier.index') }}">
            <i class="fas fa-user-edit" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Data Supplier</span></a>
    </li>

    @elseif(Auth::user()->role == 'perawat')
    <li class="nav-item {{ (request()->is('/')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('user')) ? 'active' : ''}}" href="{{ route('user.index') }}">
            <i class="fa-duotone fa-user" style="--fa-primary-color: #0b64fe; --fa-secondary-color: #0b64fe;"></i>
            <span>Pemeriksaan</span></a>
    </li>
    @else
    <h2>Halaman Tidak Tersedia</h2>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>