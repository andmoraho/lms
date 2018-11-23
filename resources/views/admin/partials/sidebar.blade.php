<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('storage/users/'.Auth::user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
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
        <li class="{{Request::is('admin/dashboard') ? 'active menu-open' : ''}} treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-circle-o"></i> {{__('Dashboard')}}</a></li>
          </ul>
        </li>
         <li class="{{Request::is('admin/users*') ? 'active menu-open' : ''}} treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>{{__('Users')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right">{{Auth::user()->countUsers()}}</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/users') }}"><i class="fa fa-circle-o"></i> {{__('List Users')}}</a></li>
            <li><a href="{{ url('admin/users/create') }}"><i class="fa fa-circle-o"></i> {{__('Create Users')}}</a></li>
          </ul>
        </li>
      </ul>
    </section>