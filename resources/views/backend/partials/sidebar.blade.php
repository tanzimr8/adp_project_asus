 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="/" class="brand-link">
      <img src="{{asset('frontend/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class=" text-uppercase d-block">{{Auth::user()->name}}'s<br>Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('superadmin.dashboard')}}" class="nav-link {{Request::is('superadmin/dashboard') || Request::is('admin/dashboard') || Request::is('customer/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ADP Request
              </p>
            </a>
          </li>
          <!-- ADMIN AREA -->
          @if(Request::is('superadmin*') || Auth::user()->role->id == 1)
          <li class="nav-item">
            <a href="{{route('superadmin.pending')}}" class="nav-link {{Request::is('superadmin/pendingrequests') ? 'active' : '' }}">
              <i class="nav-icon fa fa-pencil-alt"></i>
              <p>Pending ADP Requests
                <span class="right badge badge-danger">{{$totalpending}}</span>
              </p>
            </a>
          </li>
          @elseif(Request::is('admin*') || Auth::user()->role->id == 2)
          <li class="nav-item">
            <a href="{{route('admin.pending')}}" class="nav-link {{Request::is('admin/pendingrequests') ? 'active' : '' }}">
              <i class="nav-icon fa fa-pencil-alt"></i>
              <p>Pending Requests
                <span class="right badge badge-danger">{{$totalpending}}</span>
              </p>
            </a>
          </li>
          @endif
          <!-- ADMIN AREA ENDS -->
          <!-- CUSTOMER AREA -->
          @if(Request::is('customer*'))
          <li class="nav-item disabled">
            <a href="" class="nav-link disabled">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Edit Profile
              </p>
            </a>
          </li>
          @endif
          <!-- CUSTOMER AREA ENDS -->
          <li class="nav-header">SYSTEM</li>
          <li class="nav-item">
            <a href={{route('terms')}} class="nav-link">
              <i class="nav-icon fa fa-pencil-alt"></i>
              <p>
                Terms & Condition
              </p>
            </a>
          </li>
          <li class="nav-item">
              <!-- <p>
                LOGOUT
                <span class="badge badge-info right">2</span>
              </p> -->
              <form method="POST" action="{{ route('logout') }}">@csrf <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"><i class="nav-icon fa fa-sign-out-alt"></i>{{ __('Logout') }}</x-dropdown-link></form>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>