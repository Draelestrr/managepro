<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="#">
            <img src="/material/assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
            <span class="ms-1 text-sm text-dark">ManagePro</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->is('products*') || request()->is('suppliers*') || request()->is('categories*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#inventorySubmenu" role="button" aria-expanded="{{ request()->is('products*') || request()->is('suppliers*') || request()->is('categories*') ? 'true' : 'false' }}" aria-controls="inventorySubmenu">
                    <i class="material-symbols-rounded opacity-5">inventory_2</i>
                    <span class="nav-link-text ms-1">Inventario</span>
                </a>
                <div class="collapse {{ request()->is('products*') || request()->is('suppliers*') || request()->is('categories*') ? 'show' : '' }}" id="inventorySubmenu">
                    <ul class="list-unstyled ms-4">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('products.*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('products.index') }}">
                                <span class="nav-link-text">Productos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('suppliers.*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('suppliers.index') }}">
                                <span class="nav-link-text">Proveedores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('categories.index') }}">
                                <span class="nav-link-text">Categorías</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Páginas de Cuenta</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('profile.edit') }}">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->is('user_gestor*') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#userManagementSubmenu" role="button" aria-expanded="{{ request()->is('user_gestor*') ? 'true' : 'false' }}" aria-controls="userManagementSubmenu">
                    <i class="material-symbols-rounded opacity-5">group</i>
                    <span class="nav-link-text ms-1">Gestión de Usuarios</span>
                </a>
                <div class="collapse {{ request()->is('user_gestor*') ? 'show' : '' }}" id="userManagementSubmenu">
                    <ul class="list-unstyled ms-4">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user_gestor.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('user_gestor.index') }}">
                                <span class="nav-link-text">Usuarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user_gestor.create') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('user_gestor.create') }}">
                                <span class="nav-link-text">Crear Usuario</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-symbols-rounded opacity-5">logout</i>
                    <span class="nav-link-text ms-1">Cerrar Sesión</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
