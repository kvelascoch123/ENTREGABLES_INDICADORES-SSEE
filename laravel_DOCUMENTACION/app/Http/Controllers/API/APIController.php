<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\APIServiceRepository;
use App\Http\Controllers\API\BaseController;
use App\TokenModel;

/**
 * @group APIs Alexa
 *
 * 
 */
class APIController extends BaseController
{
  /**
   * Autenticación del usuario.
   *
   * Validación del usuario registrado. Table: al_user 
   * 
   * @queryParam alias_name required  Nombre del usuario. Example: kevin
   * @queryParam user_password required Contraseña del usuario. Example: abcd


   * @bodyParam nombreUsuario string requireddel usuario. Example: kevin
   * @bodyParam contraseña string required Contraseña del usuario'. Example: abcd
   *@response {"status":1,"data":{"id_user":"2","email":"kav.chuga@yavirac.edu.ec","name":"Kevin"}}
   */
  public function getUser($nombre, $contrasena)
  {
    $api = new  APIServiceRepository();
    $usuario = $api->getUser($nombre, $contrasena);
    if (empty($usuario)) {
      return $this->sendError('Usuario no encontrado');
    } else {


      $config = $this->configurationData($usuario[0]->al_org_id);

      $data = [
        'id_user' => $usuario[0]->al_user_id,
        'email' => $usuario[0]->email,
        'name' => $usuario[0]->name,
        'id_org' => $usuario[0]->al_org_id,
        'config' =>  $config
      ];
      return $this->sendResponse($data, '');
    }
  }
  /**
   * Configuración.
   *
   * Configuración del usuario y organización. 
   * Utilidad: Determinar la organización del usuario.
   * @queryParam id_org required Nombre del indicador. Example: 1
   * @bodyParam Id_Organización string required Nombre del indicador. Example: 1
   *@response {"status":1,"data":{"id_al_configuration":"1","value":"100.00","isactive":"y","description":"configuracion de Sidesoft","created":"2019-09-02 16:18:13","created_by":"100","updated":"2019-09-02 16:18:27","updated_by":"100","name":"Sidesoft","al_org_id":"1","url_api":"http:\/\/www.sidesoft.com.ec","url_project":"app_indicadores","url_endpoint":"api\/alexa","mail":"2","smt_port":"3380","token_p1":"0123456789abcdef0123456789abcdef","token_p2":"abcdef9876543210abcdef9876543210"}}

   */
  public function configurationData($id_org)
  {

    $api = new  APIServiceRepository();
    $data = $api->configurationData($id_org);
    if (empty($data)) {
      return array();
    } else {
      return $data[0];
    }
  }
  //usuario -- valdiacion
  /**
   * Reconocimiento del usuario.
   *
   * Solicitud del nombre del usuario, bienvenida. Table: al_user 
   * 
   * @queryParam alias_name required Nombre del usuario. Example: kevin

   * @bodyParam nombreUsuario string required Nombre del usuario. Example: kevin
   *@response {"status":1,"data":{"mensaje":"Usuario encontrado"}}

   */
  public function getUser_validate($nombre)
  {
    $api = new  APIServiceRepository();
    $usuario = $api->getUser_validate($nombre);
    if (empty($usuario)) {
      return $this->sendError('Usuario no encontrado');
    } else {
      $data = [
        'mensaje' => "Usuario encontrado",

      ];
      return $this->sendResponse($data, '');
    }
  }

  /**
   * Áreas.
   *
   * Todas las áreas registradas. 
   * 
   * @queryParam ninguno optional Ningun parametro.
   * @bodyParam ninguno ninguno optional Ninguno.
   */
  public function getArea()
  {

    $api = new APIServiceRepository();
    $areas_name = $api->getArea();
    //validacion
    if (empty($areas_name)) {
      return $this->sendError('Area no encontrada');
    } else {

      $nombres_areas = array();
      for ($i = 0; $i < count($areas_name); $i++) {
        array_push($nombres_areas, $areas_name[$i]->name);
      }
      $data = [
        'areas' => $nombres_areas,

      ];
      return $this->sendResponse($data, '');
    }
  }

  // GET FACTORES MEDIANTE AREAS DESCRIPTION
  /**
   * Factor.
   *
   * Todos los factors registrados mediante el área. Table: al_factor inner al_area
   * 
   * @queryParam description required Descripción del área . Example: area financiera


   * @bodyParam nombreArea string required Nombre del area. Example: area financiera
   *@response {"status":1,"data":{"factoresPorArea":["Liquidez","Solvencia","Gestion","Rentabilidad"]}}
   */
  public function getAreaDescription($description)
  {
    $api = new  APIServiceRepository();
    $factores = $api->getAreaDescription($description);
    if (empty($factores)) {
      return $this->sendError('Factores segun el area no encontradas');
    } else {
      $factoresPorArea = array();
      for ($i = 0; $i < count($factores); $i++) {
        array_push($factoresPorArea, $factores[$i]->name);
      }
      $data = [
        'factoresPorArea' => $factoresPorArea,

      ];
      return $this->sendResponse($data, '');
    }
  }
  // indicadores mediante factor nombre
  /**
   * Indicadores.
   *
   * Todos los indicadores registrados según el factor. Table: al_indicators inner al_factor
   * @queryParam factor required Nombre del factor. Example: liquidez
   * @bodyParam nombreFactor string required Nombre del factor.  Example: liquidez
   *@response {"status":1,"data":{"factor":"Liquidez","indicadores":["liquidez corriente","prueba acida"]}}

   */
  public function getIndicatorByFactor($factor)
  {

    $api = new  APIServiceRepository();
    $indicadores = $api->getIndicatorByFactor($factor);
    if (empty($indicadores)) {
      return $this->sendError('Indicadore segun factor no encontrado');
    } else {
      $indicadorPorFactor = array();
      for ($i = 0; $i < count($indicadores); $i++) {
        array_push($indicadorPorFactor, $indicadores[$i]->name);
      }
      $data = [
        'factor' => $factor,
        'indicadores' => $indicadorPorFactor,

      ];
      return $this->sendResponse($data, '');
    }
  }

  // *****  MONTHLY ****
  // YEAR
  /**
   * Monto Actual Año.
   *
   * Cálculo del monto actual respecto al Año. Table: al_indicators_years
   * @queryParam name required Nombre del indicador.  Example: liquidez corriente
   * @queryParam year required Año de busqueda.  Example: 2019


   * @bodyParam nombreIndicador string required Nombre del indicador.  Example: liquidez corriente
   * @bodyParam año string required Año de busqueda . Example: 2019
   *@response {"status":1,"data":{"indicator":"liquidez corriente","monthly":[{"sumaActual":"1.46","sumaAnterior":"1.37"}],"resta":0.09,"variacion":6.57,"definicion":"es de 1.46, versus el a\u00f1o  anterior, que fue de 1.37 . La variacion es de 0.09, correspondiente al 6.57 %"}}

   */
  public function getMonthly($anio, $nombre)
  {
    $api = new  APIServiceRepository();
    $monthly = $api->getMonthly($anio, $nombre);
    if ($monthly[0]->sumaActual === null) {
      return $this->sendError('No monthly');
    } else {

      $data = [
        'indicator' => $nombre,
        'monthly' => $monthly,
        'resta' => round($monthly[0]->sumaActual - $monthly[0]->sumaAnterior, 2),
        'variacion' => round((($monthly[0]->sumaActual - $monthly[0]->sumaAnterior) / $monthly[0]->sumaAnterior) * 100, 2),
        'definicion' => 'es de ' . $monthly[0]->sumaActual . ', versus el anio  anterior, que fue de ' . $monthly[0]->sumaAnterior . ' . La variacion es de ' . round($monthly[0]->sumaActual - $monthly[0]->sumaAnterior, 2) . ', correspondiente al ' . round((($monthly[0]->sumaActual - $monthly[0]->sumaAnterior) / $monthly[0]->sumaAnterior) * 100, 2) . ' %',

      ];
      return $this->sendResponse($data, '');
    }
  }

  //MONTH
  /**
   * Monto Actual Mes.
   *
   * Cálculo del monto actual respecto al Mes. Table: al_indicators_years
   * @queryParam month required Mes de busqueda.  Example: enero
   * @queryParam name required Nombre del indicador. Example: liquidez corriente
   * @queryParam year required Año registrado.  Example: 2019



   * @bodyParam mes string required Mes de busqueda.  Example: enero
   * @bodyParam nombreIndicador string required Nombre del indicador.  Example: liquidez corriente
   * @bodyParam año int required Año de busqueda.  Example: 2019
   *@response {"status":1,"data":{"indicator":"rotacion de cartera","monthly":[{"last_month":"20.05","current_month":"25.01","variation_between_months":"5.10","criterial":"N","description":"gestion"}],"resta":4.96,"variacion":"5.10","definicion":"es de 25.01, versus el mes anterior, que fue de 20.05 . La variacion es de 4.96, correspondiente al 5.10 %"}}

   */
  public function getMonthlyMonth($mes, $anio, $nombre)
  {
    $api = new  APIServiceRepository();
    $monthlyMonth = $api->getMonthlyMonth($mes, $anio, $nombre);


    if (empty($monthlyMonth)) {
      return $this->sendError('No monthly');
    } else {
      $data = [
        'indicator' => $nombre,
        'monthly' => $monthlyMonth,
        'resta' => round($monthlyMonth[0]->current_month - $monthlyMonth[0]->last_month, 2),
        'variacion' => $monthlyMonth[0]->variation_between_months,
        'definicion' => 'es de ' . $monthlyMonth[0]->current_month . ', versus el mes anterior, que fue de ' . $monthlyMonth[0]->last_month . ' . La variacion es de ' . round($monthlyMonth[0]->current_month - $monthlyMonth[0]->last_month, 2) . ', correspondiente al ' . $monthlyMonth[0]->variation_between_months . ' %',

      ];
      return $this->sendResponse($data, '');
    }
  }
  /**
   * Comparación.
   *
   * Comparación del indicador. 
   * Utilidad: Txt_affirmative, respuesta de alexa.
   *
   * @queryParam indicador required Ningun parametro. Example: liquidez corriente
   * @bodyParam indicador string required Ninguno. Example: liquidez corriente
   *@response {"status":1,"data":{"indicator":"rotacion de cartera","txt_affirmative":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes."}}

   */
  public function comparation($indicador)
  {
    $api = new  APIServiceRepository();
    $comparation = $api->comparation($indicador);
    if (empty($comparation)) {
      return $this->sendError('No comparation');
    } else {
      $data = [
        'indicator' => $indicador,
        'txt_affirmative' => $comparation[0]->txt_affirmative,

      ];
      return $this->sendResponse($data, '');
    }
  }


  //********************  TOKEN *********************
  /**
   * Token Insert.
   *
   * Insertar token. 
   * Guardar el token , usuario, indicador consultado en la tabla al_token_user.
   * @queryParam nombre_indicador required Nombre del indicador. Example: liquidez corriente
   * @queryParam month required Mes de busqueda. Example: agosto
   * @queryParam year required Año de busqueda. Example: 2019
   * @queryParam token required Token encrypt.Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj

   * @bodyParam nombreIndicador string required Nombre del indicador. Example: liquidez corriente
   * @bodyParam mes string required Mes de busqueda. Example: liquidez corriente
   * @bodyParam año int required Año de busqueda. Example: 2019
   * @bodyParam token string required Token encrypt. Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj
   *@response {"status":1,"data":{"Insert in table al_token_user"}}.  

   */
  public function insertToken($indicador, $mes, $anio, $tokenEncript)
  {
    $api = new  APIServiceRepository();
    $data = $api->insertDataToken($indicador, $mes, $anio, $tokenEncript);
    return $data;
  }
  /**
   *  @group App Móvil
   * Token Update App.
   *
   * POST token app móvil. 
   * Modificar el token en el campo app_user de la tabla al_user.
   * @queryParam token required Token. Example: fwdst48uh7tc6s8yu8sadjA
   * @queryParam idUser required Id del usuario. Example: 1
   * @bodyParam token string required Token. Example: lasd5678cjdez
   * @bodyParam idUser int required Id del usuario. Example: 1
   *@response {"status": 1,"data": "Token Modificado"}.  
   */
  public function updateUserToken(Request $request)
  {
    $api = new  APIServiceRepository();
    if (!$request->input('idUser') || !$request->input('token')) {
      return $this->sendError('No existe la informacion solicitada');
    } else {
      //Verifico si existe el Usuario
      $dataUser = $api->existUser($request->input('idUser'));
      if (empty($dataUser)) {
        return $this->sendError('No existe el id del usuario');
      } else {
        $api->updateUserToken($request->input('idUser'), $request->input('token'));
        return $this->sendResponse('Token Modificado', '');
      }
    }
  }
}
