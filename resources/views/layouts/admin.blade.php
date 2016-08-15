<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Concurso Twitter 21 Pilots :: Admin panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('/assets/admin/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('/assets/admin/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ url('/assets/admin/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ url('/assets/admin/css/admin.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Admin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if (Auth::guest())
              <li><a href="{{ url('/login') }}">Login</a></li>
              <!--<li><a href="{{ url('/register') }}">Registro</a></li>-->
          @else
	          <!-- User Account: style can be found in dropdown.less -->
	          <li class="dropdown user user-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" class="user-image" alt="User Image">
	              <span class="hidden-xs">{{ Auth::user()->name }}</span>
	            </a>
	            <ul class="dropdown-menu">
	              <!-- User image -->
	              <li class="user-header">
	                <img src="{{ Gravatar::src(Auth::user()->email, 200) }}" class="img-circle" alt="User Image">

	                <p>
	                  {{ Auth::user()->name }} - {{ Auth::user()->role->name }}
	                </p>
	              </li>
	              <!-- Menu Footer-->
	              <li class="user-footer">
	                <div class="pull-left">
	                  <a href="{{ URL::to('admin/users/' . Auth::user()->id . '/edit') }}" class="btn btn-primary btn-flat">Editar</a>
	                </div>
	                <div class="pull-right">
	                  <a href="{{ url('/logout') }}" class="btn btn-danger btn-flat">Salir <i class="fa fa-btn fa-sign-out"></i></a>
	                </div>
	              </li>
	            </ul>
	          </li>
	        @endif
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="{{ URL::to('admin/') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/users') }}"><i class="fa fa-circle-o"></i> Ver todos</a></li>
            <li><a href="{{ URL::to('admin/users/create') }}"><i class="fa fa-circle-o"></i> Crear usuario</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-photo"></i> <span>Concursantes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/contestants/photos') }}"><i class="fa fa-circle-o text-blue"></i> Ver todas las fotos del concurso</a></li>
            <li><a href="{{ url('/admin/contestants/preselected') }}"><i class="fa fa-circle-o text-yellow"></i> Preseleccionados</a></li>
            <li><a href="{{ url('/admin/contestants/finalists') }}"><i class="fa fa-circle-o text-green"></i> Finalistas</a></li>
            <li><a href="{{ url('/admin/contestants') }}"><i class="fa fa-circle-o"></i> Listado de concursantes</a></li>
            <li><a href="{{ url('/admin/contestants/create') }}"><i class="fa fa-circle-o"></i> Crear concursante</a></li>
            <li><a href="{{ url('/admin/contestants/exportcsv') }}"><i class="fa fa-file-excel-o"></i> Exportar todos como CSV</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <!--<div class="pull-right hidden-xs">
      <a href="http://www.albertofortes.com">Alberto Fortes</a>
    </div>-->
    <strong>Copyright &copy; 2016 <a href="http://warnermusic.es">Warner Music Spain</a>.</strong>
  </footer>

</div><!-- ./wrapper -->

<script src="{{ url('/assets/admin/js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('/assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/assets/admin/js/app.min.js') }}"></script>
<script src="{{ url('/assets/admin/js/demo.js') }}"></script>
<script src="{{ url('/assets/admin/js/admin.js') }}"></script>
<script src="{{ url('/assets/admin/third-party/masonry/masonry.pkgd.min.js') }}"></script>
</body>
</html>
