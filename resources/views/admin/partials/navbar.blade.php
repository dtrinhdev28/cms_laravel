  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('dashboard.admin') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-lines-fill"></i></i><span>Manager</span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('getAllUsers') }}" class="active">
                        <i class="bi bi-person-lines-fill"></i><span>Manager Users</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Danh mục</span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('getAllcategory') }}" class="active">
                        <i class="bi bi-person"></i><span>Quản lí danh mục</span>
                      </a>
                  </li>
              </ul>
          </li>

          {{-- sản phẩm --}}
          <li class="nav-item">
              <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Sản phẩm</span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('getAllProduct') }}" class="active">
                        <i class="bi bi-person"></i><span>Quản lí sản phẩm</span>
                      </a>
                  </li>
              </ul>
          </li>



      </ul>

  </aside>
  <!-- End Sidebar-->
