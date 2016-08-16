<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                </a>
            </li>

            <li>
                <a href="/report">
                    <i class="fa fa-th"></i> <span>Daily Reports</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">*</small>
            </span>
                </a>
            </li>

            <li><a href="/profile"><i class="fa fa-user"></i><span>My Profile</span></a></li>

            @can('is_allowed', 'Admin')

            <li><a href="/manage-user/create"><i class="fa fa-group"></i><span>Add New User</span></a></li>
            <li><a href="/manage-user"><i class="fa fa-wrench"></i><span>User Management</span></a></li>
            <li><a href="/roles"><i class="fa fa-graduation-cap"></i><span>Create User Roles</span></a></li>

            @endcan

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>