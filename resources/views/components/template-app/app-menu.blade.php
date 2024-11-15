<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background:#777777">
    <ul class="nav">
        <!-- Item de inicio -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Inicio</span>
            </a>
        </li>

        <!-- Item Administracion -->
        @if(session('SESSION_ROLE_USER'))
            @if(in_array(config('custom_config.ADM_TOTAL'), session('SESSION_ROLE_USER')))
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="fa fa-cog menu-icon"></i>
                        <span class="menu-title">Administraci&oacuten</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Usuarios</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Roles</a></li>
                        </ul>
                    </div>
                </li>
            @endif
        @endif


        <!-- Item Acerca de -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Acerca de</span>
            </a>
        </li>
    </ul>
</nav>