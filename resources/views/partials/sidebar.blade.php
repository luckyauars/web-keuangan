<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-coins"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MyKita Sukses</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="transaksi">
            <i class="fas fa-fw fa-exchange-alt"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Akun -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('akun.index') }}">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Akun Keuangan</span></a>
    </li>
    <!-- Kategori -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Akun (Hanya untuk Admin) -->
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('akun.index') }}">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Akun Keuangan</span></a>
        </li>

        <!-- Kategori (Hanya untuk Admin) -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kategori.index') }}">
                <i class="fas fa-fw fa-tags"></i>
                <span>Kategori</span></a>
        </li>
    @endcan

    @php $role = Auth::user()->role; @endphp

    @if ($role === 'admin')

        <!-- Laporan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('laporan.index') }}">
                <i class="fas fa-fw fa-report"></i>
                <span>Laporan Keuangan </span>
            </a>
        </li>
        <!-- Logout -->
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-white">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    @endif

</ul>
