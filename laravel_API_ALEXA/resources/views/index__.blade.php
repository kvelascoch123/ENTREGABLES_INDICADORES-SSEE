<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indicadores</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!--<link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <!--<link rel="stylesheet" href="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
  <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Theme style -->
  <!--<link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">-->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!--<link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">-->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>A</b>LEXA</span>
           <img src="https://ripleycl.imgix.net/https%3A%2F%2Ftrello-attachments.s3.amazonaws.com%2F57f241c05e557d866cbb89d2%2F5c8bbc6e79dd6f6ee3b1fbce%2Feaa29d53eafc4b743a544f4ee5fa26a4%2Famazon-echo-dot-3rd-foto3.jpg?w=750&h=555&ch=Width&auto=format&cs=strip&bg=FFFFFF&q=60&trimcolor=FFFFFF&trim=color&fit=fillmax&ixlib=js-1.1.0&s=23239e45bf1a4cbf1d36eab5edf63708" style="border-radius: 50%; width: 60px; heigth: 45px" alt="">

    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- 
    
  <aside class="main-sidebar">
   
  </aside>

-->

  

    <!-- Main content -->
  
    <!-- Content Header (Page header)  SI PONGO div clas = CONTENT WRAPER APARECE EL SIDEBAR -->
    <section class="content-header" style="background-color:white">
      <h1 style="text-transform: uppercase;">
        {{$factor}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-area-chart"></i> Alexa</a></li>
        <li class="active">Indicadores</li>
        <li class="active">{{$indicator}}</li>
        <li class="active">{{$mes}}</li>
      </ol>
      </section>
    <section class="content">
      
    
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-left"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mes Anterior</span>
              <span class="info-box-number">{{$mes_anterior}}<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-o-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mes Actual</span>
              <span class="info-box-number">{{$mes_actual}}<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Variaci&oacute;n

                <!-- /.info-box-content -->
           <table >
             <tr >
               <td style="padding-right:3px">
                 <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> {{$variacion}}%</span>
                 <p class="description-text">TOTAL REVENUE</p>
                </td>
                <td style="padding-right:3px">
                <span class="description-percentage text-blue"><i class="fa fa-caret-left"></i> {{$variacion}}%</span>
                 <p class="description-text">TOTAL REVENUE</p>
              </td style="padding-right:3px">
                <td><span class="description-percentage text-red"><i class="fa fa-caret-down"></i> {{$variacion}}%</span>
                 
                <p class="description-text">TOTAL REVENUE</p>
              </td>
              </tr>
           </table>

              </span>
              
              <small></small> <!-- NO BORRAR EL SMALL LINKEADO CON CHART -->
                  
            
            </div>
          
                  <!-- /.description-block -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
        
          <!-- Aqui ultimo card del anterior, actual variacion, --- -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Indicador</h3>
              <!--AQUI, menu del Collapse -->
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!--AQUI, FIN menu del Collapse -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong style="text-transform: uppercase;">{{$indicator}}</strong>
                  </p>
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-5">
                          
                          <div id="container"> <!--CHART GAUGE -->   </div>
                          </div>
                      <div class="col-sm-2"></div>
                    </div>

                   </div>               
              
                               
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  

                            <div class="box box-default">
                              
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="chart-responsive">
                                                 <!-- /.col -->
               

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Proporcionales</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box-group" id="accordion">
          <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
          <div class="panel box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Por mes actual
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse ">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <p class="text-center">
                        <strong>Sumatoria todos los meses / mes actual</strong>
                      </p>

                      <div class="progress-group">
                        <span class="progress-text">Enero</span>
                        <span class="progress-number"><b>160</b>/200</span>

                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Febrero</span>
                        <span class="progress-number"><b>310</b>/400</span>

                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->

                      <!-- /.col -->
                    </div>
                    <div class="progress-group">
                      <span class="progress-text">Marzo</span>
                      <span class="progress-number"><b>480</b>/800</span>

                      <div class="progress sm">
                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Abril</span>
                      <span class="progress-number"><b>250</b>/500</span>

                      <div class="progress sm">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <!-- /.row -->
                </div>
              </div>
            </div>
          </div>
          <div class="panel box box-danger">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  Por mes mayor
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <p class="text-center">
                        <strong>Proprocional al respecto al mes con mayor valor</strong>
                      </p>

                      <div class="progress-group">
                        <span class="progress-text">Mayo</span>
                        <span class="progress-number"><b>160</b>/200</span>

                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Junio</span>
                        <span class="progress-number"><b>310</b>/400</span>

                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Julio</span>
                        <span class="progress-number"><b>480</b>/800</span>

                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Marso</span>
                        <span class="progress-number"><b>250</b>/500</span>

                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                  </div>

                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>
          </div>

        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  <!-- /.col -->
</div>
<!-- /.row -->




<div></div>
<!-- /.box -->
</div>

                          
                            

                                   </div>
                                    <!-- /.col -->
                                                          <!-- /.row -->
                                                </div>
                                                <!-- /.box-body -->
                                                
                                                <!-- /.footer -->
                                              </div>
                                              <!-- /.box -->

                                              
                                                    
                                                      </div>

                                            <!--Segundo Box Lateral -->         
                                           
                                    <!-- /.box -->
                                      </div>
                            
                                              <!-- /.col -->
                                                          </div>
                                            <!-- /.row -->

                                            <!-- ACTIVITY AQUI.. -->

                      <div>
                        </div>
                      </div>
       <!--Segundo Box Lateral -->         
       <div class="box box-default">
                <div class="box-header with-border">
                <h3 class="box-title">Interpretaci&oacute;n</h3>

               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
               </div>
   </div>
                  <!-- /.box-header -->
                  
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="chart-responsive">
                         <!-- *********************ACTIVITI****************** -->

                         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" style="text-transform: uppercase;">{{$factor}}</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="https://www.wgts919.com/sites/default/files/alexa-logo-thumb-large.png" image">
                        <span class="username">
                          <a href="#">Interpretacion del indicador <b style="text-transform: uppercase;">{{$indicator}}</b> </a>
                         
                        </span>
                    
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  
                </div>
                <!-- /.post -->


    </div>
     
      <!-- /.row -->
      
      </section>




 

      </div></div></div>






  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Alexa</b> Indicadores
    </div>
     <img class="img-circle img-bordered-sm" src="http://www.sidesoft.com.ec/wp-content/uploads/2015/10/Logo2014v1.png" image" style="width: 10%">
   
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

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



<script type="text/javascript">

 Highcharts.chart('container', {

  chart: {
    type: 'gauge',
    plotBackgroundColor: null,
    plotBackgroundImage: null,
    plotBorderWidth: 0,
    plotShadow: false
  },

  title: {
    text: ' '
  },

  pane: {
    startAngle: -150,
    endAngle: 150,
    background: [{
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#FFF'],
          [1, '#333']
        ]
      },
      borderWidth: 0,
      outerRadius: '109%'
    }, {
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#333'],
          [1, '#FFF']
        ]
      },
      borderWidth: 1,
      outerRadius: '107%'
    }, {
      // default background
    }, {
      backgroundColor: '#DDD',
      borderWidth: 0,
      outerRadius: '105%',
      innerRadius: '103%'
    }]
  },

  // the value axis
  yAxis: {
    min: 0,
    max: 200,

    minorTickInterval: 'auto',
    minorTickWidth: 1,
    minorTickLength: 10,
    minorTickPosition: 'inside',
    minorTickColor: '#666',

    tickPixelInterval: 30,
    tickWidth: 2,
    tickPosition: 'inside',
    tickLength: 10,
    tickColor: '#666',
    labels: {
      step: 2,
      rotation: 'auto'
    },
    title: {
      text: 'km/h'
    },
    plotBands: [{
      from: 0,
      to: 120,
      color: '#55BF3B' // green
    }, {
      from: 120,
      to: 160,
      color: '#DDDF0D' // yellow
    }, {
      from: 160,
      to: 200,
      color: '#DF5353' // red
    }]
  },

  series: [{
    name: 'Speed',
    data: [{{$mes_actual}}],
    tooltip: {
      valueSuffix: ' km/h'
    }
  }]

},
// Add some life
function (chart) {

});     
    </script>
</body>
</html>
