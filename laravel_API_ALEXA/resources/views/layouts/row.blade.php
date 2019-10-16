<!DOCTYPE html>
<html lang="en">

<head>
 
</head>

<body class="hold-transition skin-blue sidebar-mini">
   @yield('row')
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

    
    @extends('layouts.content')
@section('contenido')
  <!-- GRAFICO , PORCENTUALES , ACTIVITY -->
@endsection
</div>

  <!-- ACTIVITY AQUI.. -->

  <!--INTERPRETACION HERE -->


</body>

</html>