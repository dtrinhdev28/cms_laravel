  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Manager</span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('getAllUsers') }}" class="active">
                        <i class="bi bi-person"></i><span>Manager Users</span>
                      </a>
                  </li>
                  <li>
                      <a href="components-modal.html">
                          <i class="bi bi-circle"></i><span>Modal</span>
                      </a>
                  </li>
                 
              </ul>
          </li><!-- End Components Nav -->



      </ul>

  </aside>
  <!-- End Sidebar-->
