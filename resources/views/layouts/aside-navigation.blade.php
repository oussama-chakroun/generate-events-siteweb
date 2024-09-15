<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{route('event.index')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="{{asset('assets/img/logo/logo.png')}}" width="50px" alt="">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Source d'art</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{route('event.index')}}" class="menu-link">
          <i class='bx bx-calendar-event'></i>
          <div data-i18n="Analytics">Les événements</div>
        </a>
      </li>


    </ul>
  </aside>
  <!-- / Menu -->