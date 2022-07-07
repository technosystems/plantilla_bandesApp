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

    <!-- class="menu-item open" -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class=' menu-icon  tf-icons bx bx-lock-alt'></i>
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

    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon  tf-icons bx bx-plus-medical' > </i>
        <div data-i18n="Pruebas Covid">Pruebas Covid</div>
      </a>
      <ul class="menu-sub">
        
        <li class="menu-item {{ request()->routeIs('user*') ? 'active open' : '' }}">
          <a href="{{ url('/') }}" class="menu-link">
            <div data-i18n="Tablero Principal">Panel Principal</div>
          </a>
        
        </li>
         <li class="menu-item {{ request()->routeIs('roles*') ? 'active open' : '' }}">
           <a href="/personal" class="menu-link">
            <div data-i18n="Empleados">Empleados</div>
          </a>
      
        </li>
         <li class="menu-item {{ request()->routeIs('permisos*') ? 'active open' : '' }}">
          <a href="/visitante" class="menu-link">
            <div data-i18n="Visitantes">Visitantes</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('permisos*') ? 'active open' : '' }}">
          <a href="/inventario" class="menu-link">
            <div data-i18n="Inventario">Inventario</div>
          </a>
        </li>
         <li class="menu-item {{ request()->routeIs('permisos*') ? 'active open' : '' }}">
          <a href="/view" class="menu-link">
            <div data-i18n="Consulta">Consulta</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('permisos*') ? 'active open' : '' }}">
          <a href="/reportes" class="menu-link">
            <div data-i18n="Reportes">Reportes</div>
          </a>
          
        </li>
      </ul>
    </li>

  </ul>
  