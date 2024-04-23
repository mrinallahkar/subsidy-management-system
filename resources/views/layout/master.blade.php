<!DOCTYPE html>
<html>

<head>
  <title>School Management System</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
  
  <!-- <script type="text/javascript" src="{{ asset('assets/js/datatables.js') }}"></script> -->
  <script type="text/javascript">
    function preventBack() {
      window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
      null
    };
  </script>
  <style>
    .ajax-loader {
      /* width: 100%;
      height: 100%;
      top: 0;
      margin: 0;
      background: rgba(0, 0, 0, 0.3);
      visibility: hidden;
      position: fixed;
      z-index: 2000; */

      visibility: hidden;
      background-color: rgba(255, 255, 255, 0.5);
      position: fixed;
      z-index: 2000 !important;
      width: 100%;
      height: 100%;
    }

    .ajax-loader img {
      position: fixed;
      top: 35%;
      left: 45%;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }
  </style>
  <!-- plugin css -->
  <!-- {!! Html::style('assets/css/bootstrap-select.css') !!} -->
  {!! Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
  {!! Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('css/app.css') !!}
  {!! Html::style('assets/css/jquery-collapsible-fieldset.css') !!}
  {!! Html::style('assets/css/report.css') !!}
  {!! Html::style('assets/css/table.css') !!}
  {!! Html::style('assets/css/tooltips.css') !!}
  <!-- data table  css-->
  {!! Html::style('assets/css/jquery.dataTables.min.css') !!}
  <!-- {!! Html::style('assets/css/responsive.bootstrap4.min.css') !!} -->
  <!-- {!! Html::style('assets/css/dataTables.bootstrap4.min.css') !!} -->
  <!-- {!! Html::style('assets/css/bootstrap.css') !!} -->
  <!-- choosen select css-->
  {!! Html::style('assets/css/chosen.min.css') !!}

  <!-- end common css -->
  @stack('style')
</head>

<!-- <body data-base-url="#" onclick="fnLeftSubMenuNavigation(this,'{{url('/')}}');"> -->

<body data-base-url="#">
  <div class="container-scroller" id="app">
    <div class="ajax-loader">
      <img src="{{ url('assets/images/loading-dots.gif') }}" class="img-responsive" />
    </div>
    @include('layout.header')
    <div class="container-fluid page-body-wrapper" id="containArea">
      @include('layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layout.footer')
      </div>
    </div>
  </div>
  <!-- base js -->
  {!! Html::script('js/app.js') !!}
  {!! Html::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  {!! Html::script('assets/js/common_script.js') !!}
  {!! Html::script('assets/js/loader.js') !!}
  {!! Html::script('assets/js/off-canvas.js') !!}
  {!! Html::script('assets/js/hoverable-collapse.js') !!}
  {!! Html::script('assets/js/misc.js') !!}
  {!! Html::script('assets/js/settings.js') !!}
  {!! Html::script('assets/js/todolist.js') !!}
  {!! Html::script('assets/js/jsPDF.js') !!}

  {!! Html::script('assets/js/export.js') !!}
  {!! Html::script('assets/tableExport/jquery.base64.js') !!}
  {!! Html::script('assets/tableExport/tableExport.js') !!}
  {!! Html::script('assets/tableExport/html2canvas.js') !!}

  <!-- {!! Html::script('js/jquery-1.9.1.js') !!} -->
  {!! Html::script('js/benificiary,js') !!}
  {!! Html::script('js/fund_allocation.js') !!}
  {!! Html::script('js/multiselect-dropdown.js') !!}
  <!--  {!! Html::script('js/jquery-2.1.0.js') !!} -->
  {!! Html::script('js/master_page.js') !!}
  {!! Html::script('js/sweetalert.min.js') !!}
  {!! Html::script('js/popeper.js') !!}
  {!! Html::script('js/bootstrap.min.js') !!}
  {!! Html::script('js/jquery-3.5.1.js') !!}
  {!! Html::script('js/jquery.serializeObject.js') !!}
  <!-- end common js -->
  @stack('custom-scripts')
  @yield('page-css')
  @yield('page-js-files')
  @yield('page-js-script')
  @section('page-js-files')

  @stop

  <!-- <script src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/kt-2.2.1/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.2/datatables.js"></script> -->
  <script type="text/javascript" src="{{ asset('assets/tableExport/tableExport.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/tableExport/html2canvas.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/tableExport/jquery.base64.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/export.js') }}"></script>
  <!-- data table  js-->
  <script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/tooltip.js') }}"></script>
  <!-- <script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script> -->
</body>

</html>