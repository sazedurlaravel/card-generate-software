 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link">

    <span class="brand-text font-weight-light">Card Generate Software</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="{{route('dashboard')}}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>

        </li>
        @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
        @endphp

        @if (Auth::user()->role == "superadmin")
             <li class="nav-item has-treeview {{($prefix == '/users')?"menu-open":""}}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manage Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('users.view')}}" class="nav-link {{($route == 'users.view')?"active":""}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li>

          </ul>
        </li>
        @endif



        <li class="nav-item has-treeview {{($prefix == '/profiles')?"menu-open":""}}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Manage Profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('profiles.edit')}}" class="nav-link {{($route == 'profiles.edit')?"active":""}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Update Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('profiles.password.view')}}" class="nav-link {{($route == 'profiles.password.view')?"active":""}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix == '/company')?"menu-open":""}}">
          <a href="#" class="nav-link">
            <i class="fas fa-building"></i>
            <p>
              Company Profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('company.view')}}" class="nav-link {{($route == 'company.view')?"active":""}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Company Profiles</p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item has-treeview {{($prefix == '/card')?"menu-open":""}}">
            <a href="#" class="nav-link">
              <i class="fas fa-id-card"></i>
                <p>
                Card Generate
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('card.view')}}" class="nav-link {{($route == 'card.view')?"active":""}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Cards</p>
                </a>
                </li>

            </ul>
        </li>





      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
