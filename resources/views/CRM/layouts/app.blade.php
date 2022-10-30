<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Orchid Architect's</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Icofont Icons-->
    <link rel="stylesheet" href=" {{ asset('backend/plugins/icofont/icofont.min.css') }}">
   
      <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('js/toastr/toastr.min.css')}} ">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css')}} ">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .imgWrap { display: flex; justify-content: center;}
        .imgcontain { position: relative; width: max-content}
        .imgcontain img { display: block; }
        .imgcontain .fa-trash { position: absolute; top:10px; right:10px; }
    </style>

    <!-- New font start-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
    <!-- New font end-->

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
 @include('CRM.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('CRM.layouts.sidebar')

  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script> -->
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('js/toastr/toastr.min.js')}} "></script>
<!-- new font start-->
<!-- {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>--}} -->
<!-- new font end-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- change -->
<!-- <script src="{{asset('backend/dist/js/vendor.bundle.base.js')}}"></script> -->
<script src="{{asset('backend/dist/js/custom.js')}}"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
</body>





<script>

    $(document).ready(function() {
        // $('.select2').select2();
        $('.search_select_box select').selectpicker();
    });
</script> 
<!-- <script>
  $(function() {
  
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 90000
    });

               $('.swalDefaultError').click(function() {
                event.preventDefault();
      Toast.fire({
        icon: 'error',
        title: 'Are you sure want to delete this?.'
      })
    });
  });
</script> -->
<!-- <script>
  
  function deleteGroup(id) {
  
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 90000
    });

      event.preventDefault();
      Toast.fire({
        icon: 'error',
        title: 'Are you sure want to delete this?.'
      })
    };
  
</script>  -->

<!-- <script>
  function deleteGroup(id) {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 90000
    });

      event.preventDefault();
      Toast.fire({
        icon: 'error',
        title: 'Are you sure want to delete this?.',
 
      })
      if(Toast.fire)
      {
          document.getElementById('deleteCompanyInfo'+id).submit();
      }
    };
</script>  -->

<script>
  function deleteGroup(id) {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,  
      timer: 90000
    });

      event.preventDefault();
      Toast.fire({
        icon: 'error',
        title: 'Are you sure want to delete this?.',
 
      })
      // if(.swal2-confirm)  .swal2-icon.swal2-error.swal2-icon-show
      $("button").click(function(){
        document.getElementById('deleteCompanyInfo'+id).submit();
        
});

$('.swal2-icon').css('cursor', 'pointer');
$(".swal2-icon").click(function(){
        $(".swal2-container.swal2-top-end.swal2-backdrop-show").css("display","none");
});
      
    };
</script> 

</html>
