<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Repositories\APIServiceRepository;
use App\Http\Controllers\API\BaseController;

/************* API ALEXA ****************/
class APIController extends BaseController
{
  /* Inicio de seción Login*/
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
  /* Inicio de seción DATA*/
  public function getUser($nombre, $contrasena)
  {
    $api = new  APIServiceRepository(); // Repositorio de la API ALEXA
    $usuario = $api->getUser($nombre, $contrasena); // Enviar parámetros y ejecutar SQL
    if (empty($usuario)) {
      return $this->sendError('Usuario no encontrado');
    } else {
      // Usuario encontrado, determinar Organización
      $config = $this->configurationData($usuario[0]->al_org_id); // Metodo 1)
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
  // Metodo 1) Ejecutar SQL segun idOrganización
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
  // Areas
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
  // GET FACTORES MEDIANTE DESCRIPTION AREAS 
  public function getAreaDescription($description)
  {
    $api = new  APIServiceRepository();
    $factores = $api->getAreaDescription($description); // $area financiera
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
  // INDICADOR MEDIANTE NOMBRE FACTOR
  public function getIndicatorByFactor($factor)
  {

    $api = new  APIServiceRepository();
    $indicadores = $api->getIndicatorByFactor($factor); // $Liquidez
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
  // ***** CALCULO CURRENTH****
  // Currenth_Year
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
  // Currenth_month
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
  // Alexa, comparación del indicador 
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
 // Comparacion respecto a todos los indicadores
  public function comparationGetAll()
  {
    $api = new  APIServiceRepository();
    $comparationData = $api->comparationGetAll();
    if (empty($comparation)) {
      return $this->sendError('No data comparation');
    } else {
      return $this->sendResponse($comparationData, '');
    }
  }
  //********************  TOKEN *********************
  // Insertar DATA al_user_token
  public function insertToken($indicador, $mes, $anio, $tokenEncript)
  {
    $api = new  APIServiceRepository();
    $data = $api->insertDataToken($indicador, $mes, $anio, $tokenEncript);
    return $data;
  }
  // Update al_user el toquen de la columna app_token => NOTIFICACION
  // POST 
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
