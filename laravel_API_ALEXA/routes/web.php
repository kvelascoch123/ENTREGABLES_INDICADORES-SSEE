<?php
Route::get('/', function () {
    return view('welcome');
});

// ******************* VERSION 2 ****************************
Route::get('indicadorMY/{nombre}/{mes}/{anio}/{token}', 'Indicador@indicatorMonthYear'); // Por Mes
Route::get('indicadorY/{nombre}/{anio}/{token}', 'Indicador@indicatorYear'); // Por Anio
// NOTIFICACIÓN APP MÓVIL
Route::get('push/{token}', 'Indicador@push');

// ******************* VERSION 1 ****************************
Route::get('indicadorMYv1/{nombre}/{mes}/{anio}', 'Indicador@indicatorMonthYearV1');
Route::get('indicadorYv1/{nombre}/{anio}', 'Indicador@indicatorYearV1');




/******************** URL WEB (Ejemplos V2) ****************************
INDICADOR MES AÑO => 4 params (indicador , mes , año, TOKEN)
http://www.sidesoft.com.ec/app_indicadores/indicadorMY/liquidez%20corriente/enero/2019/fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj

INDICADOR AÑO => 3 params (indicador , año, TOKEN)
http://www.sidesoft.com.ec/app_indicadores/indicadorY/liquidez%20corriente/2019/fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj
 */

/******************** URL WEB (Ejemplos V1) ****************************
INDICADOR MES AÑO => http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019
INDICADOR AÑO =>http://www.sidesoft.com.ec/app_indicadores/indicadorT/liquidez%20corriente/enero/2019
 */
