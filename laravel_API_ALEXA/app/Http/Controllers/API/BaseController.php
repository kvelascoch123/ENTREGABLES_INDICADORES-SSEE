<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\APIServiceRepository;
use DateTime;

class BaseController extends Controller
{
    /* RESPUESTAS 200 o 404 */
    public function sendResponse($result, $message)
    {
        $response = [
            'status' => 1,
            'data'    => $result
        ];

        return response()->json($response, 200);
    }
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'status' => 0,
            'mensaje' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
    /* Validación del token segun tiempo limite */
    public function validateUserToken($tokenEncript)
    {
        $api = new  APIServiceRepository();
        $tokenEncript = str_replace('-', '/', $tokenEncript);
        $tokenEncript = str_replace(' ', '+', $tokenEncript);
        $token = $api->getUserValidateToken($tokenEncript); // VAlidar si existe el token
        if (empty($token)) {
            return $this->sendError('No existe el token asignado');
        } else {
            date_default_timezone_set('America/Guayaquil'); //configuro un nuevo timezone
            $datetime1 = new DateTime($token[0]->created_at);
            $datetime2 = new DateTime(date("Y-m-d H:i:s"));
            $difference = $datetime1->diff($datetime2); // Calculo Limite de tiempo WEB
            $horasDiferencia = $difference->h;
            if ($horasDiferencia >= 1) {
                $token = $api->updateConsumido($token[0]->al_user_id); //MODIFICAR EL CAMPO CONSUMIDO
                return []; // ES No puede entrar a la pagina 
            } else {
                return $token;   //Puede entrar a la pagina
            }
        }
    }
}
