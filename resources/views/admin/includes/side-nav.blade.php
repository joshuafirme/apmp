<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ \Request::is('dashboard') ? 'active' : "collapsed" }}" href="{{url('/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ \Request::is('users') ? 'active' : "collapsed" }}" href="{{url('/users')}}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>

      <a class="nav-link collapsed" data-bs-target="#manage-site-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Manage Site</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="manage-site-nav" class="nav-content collapse {{ \Request::is('general-settings*') ? 'show' : "" }}" data-bs-parent="#sidebar-nav">
       
      <li>
        <a class="nav-link {{ \Request::is('general-settings') ? '' : "collapsed" }}" href="{{url('/general-settings')}}">
          <i class="bi bi-gear"></i>
          <span>General Settings</span>
        </a>
      </li>
        <li>
          <a href="components-accordion.html">
            <i class="bi bi-circle"></i><span>Slider</span>
          </a>
        </li>
      </ul>

      <a class="nav-link collapsed" data-bs-target="#subscriber-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-list-check"></i><span>Subscriber</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="subscriber-nav" class="nav-content collapse {{ \Request::is('subscriber*') ? 'show' : "" }}" data-bs-parent="#sidebar-nav">
       
      <li>
        <a class="nav-link {{ \Request::is('subscriber/list') ? '' : "collapsed" }}" href="{{url('/subscriber/list')}}">
          <i class="bi bi-gear"></i>
          <span>List</span>
        </a>
      </li>
      </ul>

    </li><!-- End Components Nav -->


    </ul>

  </aside><!-- End Sidebar-->