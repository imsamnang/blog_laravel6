@include('layouts.includes._head')

@stack('css')

<body class="sidebar-mini skin-red fixed">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    @include('layouts.includes._logo')
    <!-- Header Navbar -->
    @include('layouts.includes._topnav')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('layouts.includes._sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- @include('layouts.includes._breadcrumb') --}}
    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    @include('layouts.includes._footer')
  <!-- Control Sidebar -->
    {{-- @include('layouts.includes._control_sidebar') --}}
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
  @include('layouts.includes._script')
  @stack('js')
</body>
</html>