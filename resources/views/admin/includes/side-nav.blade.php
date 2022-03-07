<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ \Request::is('dashboard') ? 'active' : "collapsed" }}" href="{{url('/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <a class="nav-link {{ \Request::is('subscriber/list') ? '' : "collapsed" }}" href="{{url('/subscriber/list')}}">
        <i class="bi bi-list-check"></i><span>Subscribers</span>
      </a>
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person"></i>
        <span>System Users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      
      <ul id="users-nav" class="nav-content collapse {{ \Request::is('users') || \Request::is('role')  ? 'show' : "" }}" data-bs-parent="#sidebar-nav">
       
        <li>
          <a class="nav-link {{ \Request::is('users') ? '' : "collapsed" }}" href="{{url('/users')}}">
            <i class="bi bi-gear"></i>
            <span>List</span>
          </a>
        </li>
        <li>
          <a class="nav-link {{ \Request::is('role') ? '' : "collapsed" }}" href="{{url('/role')}}">
            <i class="bi bi-circle"></i><span>Role</span>
          </a>
        </li>
  
        </ul>

      <a class="nav-link collapsed" data-bs-target="#manage-site-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Manage Site</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="manage-site-nav" class="nav-content collapse {{ \Request::is('manage-site/*') ? 'show' : "" }}" data-bs-parent="#sidebar-nav">
       
      <li>
        <a class="nav-link {{ \Request::is('manage-site/general-settings') ? '' : "collapsed" }}" href="{{url('/manage-site/general-settings')}}">
          <i class="bi bi-gear"></i>
          <span>General Settings</span>
        </a>
      </li>
      <li>
        <a class="nav-link {{ \Request::is('manage-site/homepage-settings') ? '' : "collapsed" }}" href="{{url('/manage-site/homepage-settings')}}">
          <i class="bi bi-circle"></i><span>Home Page</span>
        </a>
      </li>
      <li>
        <a class="nav-link {{ \Request::is('manage-site/gallery') ? '' : "collapsed" }}" href="{{url('/manage-site/gallery')}}">
          <i class="bi bi-circle"></i><span>Gallery</span>
        </a>
      </li>

      </ul>

      <a class="nav-link collapsed" data-bs-target="#manage-pages-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-text"></i><span>Manage Pages</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="manage-pages-nav" class="nav-content collapse {{ \Request::is('manage-page/*') || \Request::is('post/*') ? 'show' : "" }}" data-bs-parent="#sidebar-nav">
       
      <li>
        <li>
          <a class="nav-link {{ \Request::is('manage-page/about') ? '' : "collapsed" }}" href="{{url('/manage-page/about')}}">
            <i class="bi bi-circle"></i><span>About</span>
          </a>
        </li>
        <li>
          <a class="nav-link {{ \Request::is('post/events') ? '' : "collapsed" }}" href="{{url('/post/events')}}">
            <i class="bi bi-circle"></i><span>Events</span>
          </a>
        </li>
        <li>
          <a class="nav-link {{ \Request::is('post/projects') ? '' : "collapsed" }}" href="{{url('/post/projects')}}">
            <i class="bi bi-circle"></i><span>Projects</span>
          </a>
        </li>
        <li>
          <a class="nav-link {{ \Request::is('post/news') ? '' : "collapsed" }}" href="{{url('/post/news')}}">
            <i class="bi bi-circle"></i><span>News</span>
          </a>
        </li>
      </li>

      </ul>


    </li><!-- End Components Nav -->


    </ul>

  </aside><!-- End Sidebar-->