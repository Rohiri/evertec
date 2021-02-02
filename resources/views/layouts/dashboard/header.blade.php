<header class="main-header">
    <!-- Logo -->
    <a href="{{ URL('/home' )}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IG</b></span>
        <!-- logo for regular state and mobile devices -->
        {{-- <span class="logo-lg"><b>G</b>eocol</span> --}}
        <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">No tiene mensajes</li>
                        <li class="footer"><a href="#">Todos los mensajes</a></li>
                      </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">No tiene notificaciones</li>
                        <li class="footer"><a href="#">Ver todo</a></li>
                      </ul>
                    </li>
                @if(Auth::user())
                    <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('build/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->username }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <!-- Imagen de Usuario -->
                            <li class="user-header">
                                <img src="{{asset('build/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->username }}
                                    <small>Miembro desde {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                         class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> --}}
            </ul>
        </div>
    </nav>
</header>