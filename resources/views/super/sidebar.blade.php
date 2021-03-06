<!-- Sidebar -->
<!--
    Helper classes

    Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

    Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
    Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
        - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
-->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">v</span><span class="text-primary">g</span>
                            </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout"
                        data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="/">
                        <span class="font-size-xl text-dual-primary-dark">voyarge</span>
                        <img style="height: 90%" src="{{ asset('media/favicons/voyarge_logo.png') }}" alt="">
                        <span class="font-size-xl text-primary"></span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="javascript:void(0)">
                    <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase"
                           href="javascript:void(0)">{{$user->name}}</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout"
                           data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form2').submit();">
                            <i class="si si-logout"></i>
                        </a>
                        <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                        <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">
                    <span class="sidebar-mini-visible">SuperAdmin</span><span class="sidebar-mini-hidden">Super Administrator</span>
                </li>
                @if($user->can('manage-users'))
                    <li class="{{ request()->is('super/users*', 'super/roles*', 'super/abilities*') ? ' open' : '' }}">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span
                                class="sidebar-mini-hide">Manejo de Usuarios</span></a>
                        <ul>
                            <li>
                                <a class="{{ request()->is('super/users*') ? ' active' : '' }}"
                                   href="{{route('super.users.index')}}">Usuarios</a>
                            </li>
                            <li>
                                <a class="{{ request()->is('super/roles*') ? ' active' : '' }}"
                                   href="{{route('super.roles.index')}}">Roles</a>
                            </li>
                            <li>
                                <a class="{{ request()->is('super/abilities*') ? ' active' : '' }}"
                                   href="{{route('super.abilities.index')}}">Permisos</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-main-heading">
                    <span class="sidebar-mini-visible">CRUD</span><span class="sidebar-mini-hidden">CRUD's</span>
                </li>
                @if($user->can('manage-airplanes'))
                    <li>
                        <a class="{{ request()->is('airplanes*') ? ' active' : '' }}"
                           href="{{route('airplanes.index')}}">
                            <i class="si si-plane"></i><span class="sidebar-mini-hide">Aviones</span>
                        </a>
                    </li>
                @endif
                @if($user->can('manage-airlines'))
                    <li>
                        <a class="{{ request()->is('airlines*') ? ' active' : '' }}"
                           href="{{route('airlines.index')}}">
                            <i class="si si-paper-plane"></i><span class="sidebar-mini-hide">Aerolineas</span>
                        </a>
                    </li>
                @endif
                @if($user->can('manage-airports'))
                    <li>
                        <a class="{{ request()->is('airport*') ? ' active' : '' }}"
                           href="{{route('airports.index')}}">
                            <i class="si si-anchor"></i><span class="sidebar-mini-hide">Aeropuertos</span>
                        </a>
                    </li>
                @endif
                @if($user->can('manage-destinations'))
                    <li>
                        <a class="{{ request()->is('destinations*') ? ' active' : '' }}"
                           href="{{route('destinations.index')}}">
                            <i class="si si-map"></i><span class="sidebar-mini-hide">Destinos</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
