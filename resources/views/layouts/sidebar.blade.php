  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/')}}">
          <i class="bi bi-grid"></i>
          <span>{{ __('lang.dashboard') }}</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>{{ __('lang.manage_inventory') }}</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('product.index') }}">
              <i class="bi bi-circle"></i><span>{{ __('lang.list_product') }}</span>
            </a>
          </li>          
          <li>
            <a href="{{ route('product.create') }}">
              <i class="bi bi-circle"></i><span>{{ __('lang.add_product') }}</span>
            </a>
          </li>          
          <li>
            <a href="{{ route('manage.stock') }}">
              <i class="bi bi-circle"></i><span>{{ __('lang.stock_manage') }}</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
        <i class="bi bi-box-arrow-right"></i>
          <span>{{ __('lang.sign_out') }}</span>
        </a>
        <form action="{{route('logout')}}" method="POST" id="logout_form" class="d-none">
          @csrf
        </form>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->