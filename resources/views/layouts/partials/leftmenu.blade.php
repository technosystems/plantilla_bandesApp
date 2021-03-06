  <ul class="menu-inner py-1">
    <!-- Dashboards -->
   <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Redirección</span>
    </li>
    <li class="menu-item">
      <a href="{{ url('/') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div data-i18n="Inicio">Inicio</div>
      </a>
    </li>

    

    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Opciones principales</span>
    </li>
    <li class="menu-item open">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Seguridad">Seguridad</div>
      </a>
      <ul class="menu-sub">
        
        <li class="menu-item {{ request()->routeIs('user*') ? 'active open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="Usuarios">Usuarios</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item  {{ request()->routeIs('user*') ? 'active ' : '' }}">
              <a href="/user" class="menu-link">
                <div data-i18n="Ver listado">Ver listado</div>
              </a>
            </li>
          </ul>
        </li>
         <li class="menu-item {{ request()->routeIs('roles*') ? 'active open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="Roles">Roles</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item  {{ request()->routeIs('roles*') ? 'active ' : '' }}">
              <a href="/roles" class="menu-link">
                <div data-i18n="Ver listado">Ver listado</div>
              </a>
            </li>
          </ul>
        </li>
         <li class="menu-item {{ request()->routeIs('permisos*') ? 'active open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="Permisos">Permisos</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item  {{ request()->routeIs('permisos*') ? 'active ' : '' }}">
              <a href="/permisos" class="menu-link">
                <div data-i18n="Ver listado">Ver listado</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
  