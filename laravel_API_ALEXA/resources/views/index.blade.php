<!DOCTYPE html>
<html lang="en">
<head>


</head>
<body>

@extends('layouts.row')
@section('row')

@endsection


@extends('layouts.header_section')
@section('header')
<header class="main-header">

</header>
@endsection


</body>

<!-- jQuery 2.2.0 -->
{{-- <script src="../../../plugins/jQuery/jQuery-2.2.0.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>

<!-- Bootstrap 3.3.6 -->
{{-- <script src="../../../bootstrap/js/bootstrap.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
{{-- <script src="../../../plugins/fastclick/fastclick.js"></script> --}}
<script type="text/javascript" src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
{{-- <script src="../../../dist/js/app.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('dist/js/app.min.js')}}"></script>
<!-- Sparkline -->
{{-- <script src="../../../plugins/sparkline/jquery.sparkline.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
{{-- <script src="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> --}}
<script type="text/javascript" src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{ asset('plugins/sparkline/jquery-jvectormap-world-mill-en.js')}}"></script> --}}
<!-- SlimScroll 1.3.0 -->
{{-- <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
{{-- <script src="../../../plugins/chartjs/Chart.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('plugins/chartjs/Chart.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="../../../dist/js/pages/dashboard2.js"></script> --}}
<script type="text/javascript" src="{{ asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../../dist/js/demo.js"></script> --}}
<script type="text/javascript" src="{{ asset('dist/js/demo.js')}}"></script>

<!-- GAUGE CHARTS GOOGLE -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

</html>
