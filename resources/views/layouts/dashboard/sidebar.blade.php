<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('build/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->username}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navegacion Principal</li>
                <li> <a href="{{ URL('/home' )}}" class="sub">
                    <i class="fa fa-dashboard text-white"></i>
                         <span>Dashboard</span></a>
                </li>
                <li> <a href="{{ URL('/order' )}}" class="sub">
                    <i class="fa fa-folder text-white"></i>
                         <span>Nueva Orden</span></a>
                </li>
                <li> <a href="{{ URL('/my_orders' )}}" class="sub">
                    <i class="fa fa-folder-open text-white"></i>
                         <span>Mis Ordenes</span></a>
                </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>