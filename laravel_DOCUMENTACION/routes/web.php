<?php
Route::get('/', function () {
    return view('welcome');
});

// -------- VERSIO 1.0 ---------------
Route::get('indicadorMYv1/{nombre}/{mes}/{anio}','Indicador@indicatorMonthYearV1'); //http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019
Route::get('indicadorYv1/{nombre}/{anio}','Indicador@indicatorYearV1'); //http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019

// -------- VERSIO 1.1 ---------------
// Con Plantilla
// ***************************************************** //
Route::get('indicadorMY/{nombre}/{mes}/{anio}/{token}','Indicador@indicatorMonthYear'); //http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019
Route::get('indicadorY/{nombre}/{anio}/{token}','Indicador@indicatorYear'); //http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019
Route::get('push/{token}','Indicador@push'); //http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019

