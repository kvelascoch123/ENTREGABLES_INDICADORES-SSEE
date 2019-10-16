<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use App\Repositories\APIServiceRepository;
use DateTime;

class BaseController extends Controller
{
    public function sendResponse($result, $message)
    {
    	$response = [
            'status' => 1,
            'data'    => $result
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => 0,
            'mensaje' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

/**
 * @group APIs Alexa
 *
	 * Validacion Usuario Token Web.
	 *
	 * Desencriptar el toquen verificar segun el usuario, determinar el limite de visualización de la página web. 
	 *
    * @queryParam token required Token encrypt.
  
  
   * @bodyParam token string required Token encrypt.

	 */
    public function validateUserToken($tokenEncript){
        $api = new  APIServiceRepository();
        
        $tokenEncript = str_replace('-', '/', $tokenEncript);
        $tokenEncript = str_replace(' ', '+', $tokenEncript);
        
        $token = $api->getUserValidateToken($tokenEncript);
       
        if(empty($token)){
          return $this->sendError('No existe el token asignado');
          
        }else{
            date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
           // $fecha = new DateTime('NOW');
           // $dataToken->created_at =  $fecha->format('Y-m-d H:i:s'); //param

         
            $datetime1 = new DateTime($token[0]->created_at);
            $datetime2 = new DateTime(date("Y-m-d H:i:s"));   
                   
            $difference = $datetime1->diff($datetime2);
            $horasDiferencia = $difference->h;   
            
            if($horasDiferencia >= 1){
                $token = $api->updateConsumido($token[0]->al_user_id); //MODIFICAR EL CAMPO CONSUMIDO
                return []; // ES No puede entrar a la pagina 
            }else{
                return $token;   // Es 1 Puede entrar a la pagina
            }
  
        }
    }
}
