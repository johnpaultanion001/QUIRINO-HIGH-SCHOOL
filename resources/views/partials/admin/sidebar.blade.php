<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/admin/dashboard">
       <h3>LOGO</h3> 
      </a>
    </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    @can('admin_access')
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/classes') || request()->is('admin/classes/*') ? 'active' : '' }}" href="/admin/classes">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Classes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/subjects') || request()->is('admin/subjects/*') ? 'active' : '' }}" href="/admin/subjects">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Subjects</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/students') || request()->is('admin/students/*') ? 'active' : '' }}" href="/admin/students">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Students</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/teachers') || request()->is('admin/teachers/*') ? 'active' : '' }}" href="/admin/teachers">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Teachers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/parents') || request()->is('admin/parents/*') ? 'active' : '' }}" href="/admin/parents">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Manage Parent</span>
        </a>
      </li>
    
  
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/admins') ? 'active' : '' }}" href="/admin/admins">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Administrator</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/account_teachers') ? 'active' : '' }}" href="/admin/account_teachers">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Teachers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/account_parents') ? 'active' : '' }}" href="/admin/account_parents">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Parents</span>
          </a>
        </li>
    </ul>
    @endcan

    @can('teacher_access')
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('teacher/classes') || request()->is('teacher/classes/*') ? 'active' : '' }}" href="/teacher/classes">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('teacher/classes_attendance') || request()->is('teacher/classes_attendance/*') ? 'active' : '' }}" href="/teacher/classes_attendance">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Attendance</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('teacher/students') || request()->is('teacher/students/*') ? 'active' : '' }}" href="/teacher/students">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">All Classes</span>
        </a>
      </li>
    </ul>
    @endcan

    @can('parent_access')
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('parent/students') || request()->is('parent/students/*') ? 'active' : '' }}" href="/parent/students">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Students Record</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('parent/notifications') || request()->is('parent/notifications/*') ? 'active' : '' }}" href="/parent/notifications">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">Notification</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('parent/faq') || request()->is('parent/faq/*') ? 'active' : '' }}" href="/parent/faq">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-list text-dark text-sm"></i>
          </div>
          <span class="nav-link-text ms-1">FAQ</span>
        </a>
      </li>
    </ul>
    @endcan
  </div>

</aside>