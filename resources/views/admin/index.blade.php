<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Data</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('/public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/public/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('/public/dist/css/jquery-ui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('/public/dist/css/jquery.dataTables.min.css')}}" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('/public/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  @yield('css')
  <link rel="stylesheet" href="{{url('public/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('public/dist/css/adminokxe.css')}}">
  <link rel="stylesheet" href="{{url('public/css/dropzone.css')}}">
  <link href="{{url('public/dist/css/theme.jui.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{url('public/dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
  <header class="main-header">
  <input type="hidden" value="{{Lang::locale()}}" id="lang">
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" ><img src="{{url('/public/images/okxe.png')}}" width="30px"></span>
      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><img src="{{url('/public/images/okxe.png')}}" width="40px"></span>
    </a>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
  
     <div class="navbar-static-top">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview {!! Request::is('admin/items') || Request::is('admin/feedbacks') || Request::is('admin/accounts') ? 'active' : '' !!}" >
          <a href="#"><i class="fa fa-refresh"></i> <span>Administrator</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('admin/items') ? 'selected' : ''}}"><a href="{{ url('/admin/item/list') }}">items</a></li>
            <li class="{{Request::is('admin/items') ? 'selected' : ''}}"><a href="{{ url('/admin/user/list') }}">user</a></li>
            <li class="{{Request::is('admin/accounts') ? 'selected' : ''}}"><a href="{{ url('/admin/report') }}">report</a></li>
            <li class="{{Request::is('admin/accounts') ? 'selected' : ''}}"><a href="{{ url('/admin/list/payment') }}">payment</a></li>
          </ul>
        </li>
        <li class="treeview {!! Request::is('admin/items') || Request::is('admin/feedbacks') || Request::is('admin/accounts') ? 'active' : '' !!}" >
          <a href="#"><i class="fa fa-refresh"></i> <span>User</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('admin/items') ? 'selected' : ''}}"><a href="{{url('/item/list')}}">items</a></li>
            <li class="{{Request::is('admin/accounts') ? 'selected' : ''}}"><a href="{{ url('/admin/user/detail'.'/'.Auth::user()->id)}}">report</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a></li>
      </ul>
      </ul>
      </div>
      <nav>
     <a href="#" class="alignCenter" data-toggle="push-menu" role="button"><center><i  class="fa fa-bars" aria-hidden="true"></i></center>
     </a>
     </nav>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    @yield('content')
  
  </div>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{url('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('/public/dist/js/jquery-ui.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/public/dist/js/adminlte.min.js')}}"></script>
<script src="{{url('/public/dist/js/datatables.min.js')}}"></script>
<script src="{{url('/public/js/index.js')}}"></script>
{{--  <script src="{{url('public/dist/js/moment.js')}}"></script>  --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.js"></script>
{{--  <script type="text/javascript" src="{{url('public/dist/js/charts.js')}}"></script>  --}}
<script src="{{url('/public/js/dropzone.js')}}"></script>
<script>
    var baseUrl = "{{url('')}}";
</script>
@yield('js')
</body>
</html>