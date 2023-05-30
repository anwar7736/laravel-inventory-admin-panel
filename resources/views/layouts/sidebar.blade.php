  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('product.index') }}">
              <i class="bi bi-circle"></i><span>List Product</span>
            </a>
          </li>          
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Add Product</span>
            </a>
          </li>          
          <li>
            <a href="{{ route('manage.stock') }}">
              <i class="bi bi-circle"></i><span>Manage Stock</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
        <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
        <form action="{{route('logout')}}" method="POST" id="logout_form" class="d-none">
          @csrf
        </form>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->