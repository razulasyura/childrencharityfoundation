<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('public/adminlte_assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
             <li><a href="{{ url('admin/slide') }}"><i class="fa fa-desktop"></i> <span>Slide</span></a></li>
             <li><a href="{{ url('admin/content') }}"><i class="fa fa-newspaper-o"></i> <span>Content</span></a></li>
             <!-- <li><a href="{{ url('admin/adoption') }}"><i class="fa fa-user-plus"></i> <span>Adoption</span></a></li> -->
             <!-- <li><a href="{{ url('admin/volunteer') }}"><i class="fa fa-users"></i> <span>Volunteer</span></a></li> -->
             <!-- <li><a href="{{ url('admin/veterinarian') }}"><i class="fa fa-users"></i> <span>Veterinarian</span></a></li> -->
             <li><a href="{{ url('admin/team') }}"><i class="fa fa-users"></i> <span>Team</span></a></li>
             <li><a href="{{ url('admin/program') }}"><i class="fa fa-navicon"></i> <span>Program</span></a></li>
             <li><a href="{{ url('admin/event') }}"><i class="fa fa-navicon"></i> <span>Events</span></a></li>
             <li><a href="{{ url('admin/album') }}"><i class="fa fa-camera"></i> <span>Album</span></a></li>
             <li><a href="{{ url('admin/gallery') }}"><i class="fa fa-photo"></i> <span>Gallery</span></a></li>
             <!-- <li><a href="{{ url('/admin/user') }}"><i class="fa fa-user"></i> <span>User</span></a></li> -->
            {{--
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Default</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/default/index') }}">Index</a></li>
                <li><a href="{{ url('admin/default/create') }}">Create</a></li>
              </ul>
            </li>
            --}}
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>