    <nav class="navbar navbar-static-top secondary">
      <div class="container secondary">
        <div class="navbar-header">
          <a href="{{ route('beranda') }}" class="navbar-brand">
             <i class="fa fa-home"></i>
          </a>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="{{ request()->routeIs('beranda') ? 'active' : '' }}"><a href="{{ route('beranda') }}">Home</a></li>
            <li><a href="#">Activities</a></li>
            <li><a href="#">Relationship</a></li>
            <li><a href="#">Transactions</a></li>
            <li><a href="#">Invetory</a></li>
            <li class="dropdown {{ request()->routeIs('jabatan.index') || request()->routeIs('karyawan.index') || request()->routeIs('kota.index') ? 'active' : '' }}" >
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">User</a></li>
                <li class="{{ request()->routeIs('jabatan.index') ? 'active' : '' }}"><a href="{{ route('jabatan.index') }}">Role</a></li>
                <li class="{{ request()->routeIs('karyawan.index') ? 'active' : '' }}"><a href="{{ route('karyawan.index') }}">Employee</a></li>
                <li class="{{ request()->routeIs('kota.index') ? 'active' : '' }}"><a href="{{ route('kota.index') }}">City</a></li>
              </ul>
            </li>
            <li><a href="#">Report</a></li>
          </ul>
        </div>
 
      </div>
    </nav>
    