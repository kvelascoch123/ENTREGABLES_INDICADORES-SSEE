<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=big5">

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
<!--- ****************** SIDEBAR DATOS CURREN LAST VARIACION ********************************
******************************************************************************************-->
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @yield('contenido')
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-left"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">

                                <!-- INDICADOR / AÑO -->
                                @if ($mes == '')
                                Año Anterior {{$año_anterior}}
                                <span class="info-box-number">

                                    {{$anio_anterior_value}} <!-- Valor del sumatoria current_year -->
                                    <small>%</small></span>
                                @else
                                <!-- INDICADOR /MES /AÑO -->

                                Mes Anterior {{$mes_anterior_name}}
                                <span class="info-box-number">

                                    {{$mes_anterior}} <!-- Valor del mes_actual current_month -->
                                    <small>%</small>

                                </span>
                                @endif
                            </span> </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-o-down"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">

                                <!-- INDICADOR / AÑO -->
                                @if ($mes == '')
                                Año Actual {{$anio}}
                                <span class="info-box-number">

                                    {{$anio_actual_value}} <!-- Valor del sumatoria current_year -->
                                    <small>%</small></span>
                                @else
                                <!-- INDICADOR /MES /AÑO -->

                                Mes Actual {{$mes}}
                                <span class="info-box-number">

                                    {{$mes_actual}} <!-- Valor del mes_actual current_month -->
                                    <small>%</small>

                                </span>
                                @endif
                            </span>
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
                                <table>
                                    <tr>
                                        <td style="padding-right:3px">
                                            @if ($variacion > 0)
                                            <span class="info-box-number text-green"><i class="fa fa-caret-up"></i> {{$variacion}}%</span>

                                            @else
                                            <!-- INDICADOR /MES /AÑO -->
                                            <span class="info-box-number text-red"><i class="fa fa-caret-down"></i> {{$variacion}}%</span>

                                            @endif
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
            </div>
            <!-- /.row -->
            <!--GRAFICO-->
<!--- ****************** INDICADOR GRAFICO - PROPORCIONALIDADES  ********************************
******************************************************************************************-->      
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Indicador</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
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
                                                <div id="container"></div>
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
                            <!--********************** PROPORCIONALES ****************-->

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="box box-solid">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title" style="text-transform: uppercase;">Proporcionales</h3>
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
                                                                                            <div class="col-md-11">
                                                                                                <div class="chart-responsive">
                                                                                                   
                                                                                                        <strong>Sumatoria todos los meses / mes actual</strong>

                                                                                                    @for ($i = 0; $i < count($proporcionla_data); $i++) <div class="progress-group">

                                                                                                        <span class="progress-text" style="text-transform: uppercase;">{{$proporcionla_data[$i]['mes']}}</span>
                                                                                                        <span class="progress-number"><b>{{$proporcionla_data[$i]['valor_año']}}</b>/{{$proporcionla_data[$i]['baseTotal_año']}}</span>


                                                                                                        <div class="progress sm">

                                                                                                            <div class="progress-bar progress-bar-{{$proporcionla_data[$i]['color_bar']}}" style="width: {{$proporcionla_data[$i]['porcentaje_año']}}%"></div>

                                                                                                        </div>

                                                                                                </div>



                                                                                                @endfor



                                                                                                <!-- /.progress-group -->

                                                                                                <!-- /.col -->
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
                                                                                        <div class="col-md-11">
                                                                                            <div class="chart-responsive">
                                                                                                
                                                                                                    <strong>Proprocional al respecto al mes con mayor valor</strong>
                                                                                                

                                                                                                @for ($i = 0; $i < count($proporcionla_data); $i++) <div class="progress-group">

                                                                                                    <span class="progress-text" style="text-transform: uppercase;">{{$proporcionla_data[$i]['mes_mes']}}</span>
                                                                                                    <span class="progress-number"><b> {{$proporcionla_data[$i]['valor_mes_unico']}}</b>/{{$proporcionla_data[$i]['baseTotal_mes']}}</span>
                                                                                                    <span>{{$proporcionla_data[$i]['valor_mes']}}%</span>
                                                                                                    <div class="progress sm">

                                                                                                        <div class="progress-bar progress-bar-{{$proporcionla_data[$i]['color_bar']}}" style="width: {{$proporcionla_data[$i]['porcentaje_mes']}}%"></div>

                                                                                                    </div>

                                                                                            </div>

                                                                                            @endfor
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
<!--- ******************  INTERPRETACION ********************************
******************************************************************************************-->
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
                              @if ($valor_interpretacion)
                              <h4>{{$valor_interpretacion}}</h4>
                              @else
                              No existe interpretación del indicador
                              @endif


                            </p>

                          </div>
                          <!-- /.post -->


                        </div>

                        <!-- /.row -->

    </section>






  </div>
  </div>
  </div>




  @extends('layouts.footer')
@section('footer')

@endsection




  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

  </div>
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

  // VALORES DATA RELOJ A MODIFICAR
  yAxis: {
    min: 0,
    max: {{$data_chart[0]->graph_max_value}},

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
      text: ''
    },
    plotBands: [{
      from: {{$data_chart[0]->graph_green_min_value}}, //0
      to: {{$data_chart[0]->graph_green_max_value}}, // 6
      color: '#55BF3B' // green
    }, {
      from: {{$data_chart[0]->graph_yellow_min_value}},
      to: {{$data_chart[0]->graph_yellow_max_value}},
      color: '#DDDF0D' // yellow
    }, {
      from: {{$data_chart[0]->graph_red_min_value}},
      to: {{$data_chart[0]->graph_red_max_value}},
      color: '#DF5353' // red
    }]
  },

  series: [{
    name: 'Speed',
    @if ($mes == '')
    data: [{{$anio_actual_value}}],
 
@else
    data: [{{$valor}}],
    
@endif


    tooltip: {
      valueSuffix: ' km/h'
    }
  }]

},
// Add some life
function (chart) {

});     
    </script>
<!-- GAUGE CHARTS GOOGLE -->


</html>