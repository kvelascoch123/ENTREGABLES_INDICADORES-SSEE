<?php

use Illuminate\Http\Request;
use App\TokenModel;
/*
|--------------------------------------------------------------------------
| API Routes Alexa
|--------------------------------------------------------------------------
|
*/

Route::prefix('alexa')->group(function () {
    /*  USUARIO */
    Route::get('user/{nombre}/{contrasena}', 'API\APIController@getUser'); // login
    Route::get('user/{nombre}', 'API\APIController@getUser_validate'); // usuario en sesión
    /*  AREAS   */
    Route::get('areas', 'API\APIController@getArea');
    Route::get('area/{description}', 'API\APIController@getAreaDescription'); // area by description
    /*  INDICADORES por factor  */
    Route::get('indicadores/{nombreFactor}', 'API\APIController@getIndicatorByFactor');
    /*  CURRENT YEAR AND MONTH  */
    Route::get('monthly/{anio}/{nombreIndicador}', 'API\APIController@getMonthly');
    Route::get('monthly/{mes}/{anio}/{nombreIndicador}', 'API\APIController@getMonthlyMonth');
    /*  INSERTAR TOKEN   */
    Route::get('tokenInsert/{indicador}/{mes}/{anio}/{tokenEncrpt}', 'API\APIController@insertToken');
    /*  UPDATE TOKEN APP  */
    Route::post('tokenUpdate', 'API\APIController@updateUserToken');
    /*  VALIDAR TOKEN   */
    Route::get('validateTokenUser/{token}/{idUser}', 'API\BaseController@validateUserToken');
    /*  CONFIGURACIÓN ORGANIZACIÓN   */
    Route::get('configuration/{id_org}', 'API\APIController@configurationData');
    /*  COMPARACIÓN INDICADORES   */
    Route::get('comparation/{nombreIndicador}', 'API\APIController@comparation');
});
/****************** URL API (Ejemplos) *****************************
Login => 2 parmas (nombreUser, contraseña)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/user/kevin/abcd

UserGet => 1 param (nombreUser)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/user/kevin

INDICADORES Respuestas de Alexa
AreasGet => 0 params
http://www.sidesoft.com.ec/app_indicadores/api/alexa/areas

AreaGet => 1 param (nombreArea)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/area/area%20financiera

IndicadoresGet => 1 param (nombreFactor)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/indicadores/Liquidez

Current Year and Month
MonthlyByYear => 2 params (anio, indicador)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/monthly/2019/liquidez%20corriente

MonthlyByMonth => 3 params(mes, anio, indicador)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/monthly/enero/2019/liquidez%20corriente

TOKEN 
InsertDataToken => 4 params(indicador, mes, anio, tokenEncrypt)
http://www.sidesoft.com.ec/app_indicadores/api/alexa/tokenInsert/liquidez%20corriente/enero/2019/fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj

ValidarTokenDB
http://www.sidesoft.com.ec/app_indicadores/api/alexa/validateTokenUser/fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj/1
 */
