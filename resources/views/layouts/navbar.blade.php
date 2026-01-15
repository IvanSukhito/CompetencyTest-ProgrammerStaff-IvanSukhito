    <nav class="navbar navbar-static-top secondary">
      <div class="container secondary">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand">
             <i class="fa fa-home"></i>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
            <li><a href="#">Activities</a></li>
            <li><a href="#">Relationship</a></li>
            <li><a href="#">Transactions</a></li>
            <li><a href="#">Invetory</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">User</a></li>
                <li><a href="{{ route('jabatan.index') }}">Role</a></li>
                <li><a href="{{ route('karyawan.index') }}">Employee</a></li>
                <li><a href="{{ route('kota.index') }}">City</a></li>
              
              </ul>
            </li>
            <li><a href="#">Report</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
 
      </div>
      <!-- /.container-fluid -->
    </nav>
    