<?php

namespace App\Http\Controllers;

use App\Repositories\DataServiceRepository;
use App\Repositories\APIServiceRepository;
use App\Http\Controllers\API\BaseController;

/**
 * @group APIs Web
 *
 * 
 */
class Indicador extends BaseController
{
    /**
     * Indicador por mes.
     *
     * Datos del indicador respecto al mes y año. 
     * Utilidad: Visualización de la pagina respecto a los datos del Indicador y Mes
     * 
     * @queryParam name required Nombre del indicador. Example: liquidez corriente
     * @queryParam month required Mes de busqueda respecto al indicador. Example: agosto
     * @queryParam year required Año de busqueda respecto al indicador. Example: 2019
     * @queryParam token required Token encrypt.  Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj
  
     * @bodyParam nombreIndicador string required Nombre del indicador. Example: liquidez corriente
     * @bodyParam mes string required Mes de busqueda. Example: agosto
     * @bodyParam año int required Año de busqueda. Example: 2019
     * @bodyParam token string required Token encrypt. Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj
     *
     *
     * @response {"factor":"gestion","indicator":"rotacion de cartera","mes":"agosto","mes_anterior_name":"Lulio","mes_actual":"25.01","mes_anterior":"20.05","variacion":4.96,"valor":"25.01","base_total":[{"maxCurrentMonth":"25.01"}],"proporcionla_data":[{"mes":"marzo","valor_a\u00f1o":15.42,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":52.147446736557,"mes_mes":"marzo","valor_mes_unico":"4.56","valor_mes":18.23,"baseTotal_mes":"25.01","porcentaje_mes":72.890843662535,"color_bar":"brown"},{"mes":"agosto","valor_a\u00f1o":84.58,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":286.03314169767,"mes_mes":"agosto","valor_mes_unico":"25.01","valor_mes":100,"baseTotal_mes":"25.01","porcentaje_mes":399.84006397441,"color_bar":"red"}],"valor_interpretacion":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","data_chart":[{"al_indicator_id":"3","value":"100","isactive":"Y","description":"gestion","created":"2019-09-02 16:50:49","created_by":"100","updated":"2019-09-02 16:50:55","updated_by":"100","name":"rotacion de cartera","al_org_id":"1","al_user_role_id":"1","allow_monthly":"N","allow_not_compare":"Y","al_factor_id":"3","criterial":"B","interpretation_need_compare":"N","not_compare_value":null,"compare_middle_point_min":null,"compare_middle_point_max":null,"txt_affirmative":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","txt_negative":null,"graph_min_value":"0","graph_max_value":"50","graph_green_min_value":"35","graph_green_max_value":"50","graph_yellow_min_value":"25","graph_yellow_max_value":"35","graph_red_min_value":"25","graph_red_max_value":"0"}]}

     */
    public function indicatorMonthYear($indicador, $mes, $anio, $token)
    {
        $gestionBase =  new BaseController();
        $visitarpagina = $gestionBase->validateUserToken($token);
        $gestion =  new DataServiceRepository();
        $urlConsumida = $gestion->urlConsumido($token);

        if (empty($visitarpagina) || $urlConsumida[0]->consumido == 1) {
            return view('404');
        } else {
            $gestion =  new DataServiceRepository();
            //DATA
            $indicadores = $gestion->indicatorMonthYear($indicador, $mes, $anio);

            if (empty($indicadores)) {
                return view('empty');
            } else {

                $factor = $indicadores[0]->description;
                $indicator = $indicadores[0]->name;
                $mes = $indicadores[0]->month; // actual    
                $mes_anterior_name = $gestion->mes_anterior_name($mes);

                // DATA VALORES
                $mes_actual = $indicadores[0]->current_month;
                $mes_anterior = $indicadores[0]->last_month; // funcion determina el mes
                $variacion = $indicadores[0]->current_month - $indicadores[0]->last_month;

                // CALCULO 
                $valor = $indicadores[0]->current_month;

                // CALCULO DEL PROPORSIONAL
                $base_total = $gestion->proporcionalTotalMonth($indicadores[0]->name, $indicadores[0]->year); // SUMATORIA
                $proporcionla_data = $this->proporsionales_Year($indicadores[0]->name, $indicadores[0]->year); // [{"marzo":18.232706917233},{"agosto":100}]
                // *********************** INTERPRETACION *******************
                $valores_interpretacion = $gestion->interpretacionIndicador($indicadores[0]->name); // SUMATORIA
                $valor_interpretacion = $valores_interpretacion[0]->txt_affirmative;
                //************** VALORES GRAFICO MAX Y MIN *****************/
                $data_chart = $gestion->valoresGraficoIndicador($indicadores[0]->name);

                return view('index', compact('factor', 'indicator', 'mes', 'mes_anterior_name', 'mes_actual', 'mes_anterior', 'variacion', 'valor', 'base_total', 'proporcionla_data', 'valor_interpretacion', 'data_chart'));
            }
        }
    }

    // Todos los indicadores en el año
    /**
     * Indicador por año.
     *
     * Datos del indicador respecto al año. 
     * Utilidad: Visualización de la pagina respecto a los datos del Indicador respecto al Año.
    
     * @queryParam name required Nombre del indicador. Example:rotacion de cartera
     * @queryParam year required Año de busqueda respecto al indicador. Example 2019
     * @queryParam token required Token encrypt. Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj
  
     * @bodyParam nombreIndicador string required Nombre del indicador. Example: rotacion de cartera
     * @bodyParam año int required Año de busqueda. Example: 2019
     * @bodyParam token string required Token encrypt. Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj
     *
     * @response {"factor":"gestion","indicator":"Indicador rotacion de cartera respecto al a\u00f1o 2019","mes":"","anio":"2019","a\u00f1o_anterior":2018,"anio_actual_value":"36.34","anio_anterior_value":"27.31","variacion":9.03,"valor":"4.56","proporcionla_data":[{"mes":"marzo","valor_a\u00f1o":15.42,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":52.147446736557,"mes_mes":"marzo","valor_mes_unico":"4.56","valor_mes":18.23,"baseTotal_mes":"25.01","porcentaje_mes":72.890843662535,"color_bar":"green"},{"mes":"agosto","valor_a\u00f1o":84.58,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":286.03314169767,"mes_mes":"agosto","valor_mes_unico":"25.01","valor_mes":100,"baseTotal_mes":"25.01","porcentaje_mes":399.84006397441,"color_bar":"blue"}],"base_total":[{"total_months":"29.57"}],"valor_interpretacion":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","data_chart":[{"al_indicator_id":"3","value":"100","isactive":"Y","description":"gestion","created":"2019-09-02 16:50:49","created_by":"100","updated":"2019-09-02 16:50:55","updated_by":"100","name":"rotacion de cartera","al_org_id":"1","al_user_role_id":"1","allow_monthly":"N","allow_not_compare":"Y","al_factor_id":"3","criterial":"B","interpretation_need_compare":"N","not_compare_value":null,"compare_middle_point_min":null,"compare_middle_point_max":null,"txt_affirmative":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","txt_negative":null,"graph_min_value":"0","graph_max_value":"50","graph_green_min_value":"35","graph_green_max_value":"50","graph_yellow_min_value":"25","graph_yellow_max_value":"35","graph_red_min_value":"25","graph_red_max_value":"0"}]}
     */
    public function indicatorYear($indicator, $anio, $token)
    {
        $gestionBase =  new BaseController();
        $visitarpagina = $gestionBase->validateUserToken($token);
        $gestion =  new DataServiceRepository();
        $urlConsumida = $gestion->urlConsumido($token); // TAMBN EL ID de USUARIO


        if (empty($visitarpagina) || $urlConsumida[0]->consumido == 1) {
            return view('404');
        } else {
            $gestion =  new DataServiceRepository();
            //DATA
            $indicadores = $gestion->indicatorYear($indicator,  $anio);

            if (empty($indicadores)) {
                return view('empty');
            } else {
                $factor = $indicadores[0]->description;
                $indicator = 'Indicador ' . $indicadores[0]->name . ' respecto al año ' . $indicadores[0]->year;     //$indicadores[0]->name;
                $mes = '';
                $año = $indicadores[0]->year; //2019
                $año_anterior = $indicadores[0]->year - 1; // 2018

                $valoresCurrent = $gestion->indicatorYearValuesCurrent($indicadores[0]->name, $indicadores[0]->year);
                $anio_actual_value = $valoresCurrent[0]->current_year;  // Sumatoria del valor del año actual

                $valoresLast = $gestion->indicatorYearValuesLast($indicadores[0]->name, $indicadores[0]->year);
                $anio_anterior_value = $valoresLast[0]->last_year;  // Sumatoria del valor del año actual

                $variacion = $anio_actual_value - $anio_anterior_value;
                $valor = $indicadores[0]->current_month;

                // CALCULO DEL PROPORSIONAL
                $base_total = $gestion->proporcionalTotalYear($indicadores[0]->name, $indicadores[0]->year); // SUMATORIA
                $proporcionla_data = $this->proporsionales_Year($indicadores[0]->name, $indicadores[0]->year); // [{"marzo":18.232706917233},{"agosto":100}]

                // *********************** INTERPRETACION *******************
                $valores_interpretacion = $gestion->interpretacionIndicador($indicadores[0]->name); // SUMATORIA
                $valor_interpretacion = $valores_interpretacion[0]->txt_affirmative;
                //************** VALORES GRAFICO MAX Y MIN *****************/
                $data_chart = $gestion->valoresGraficoIndicador($indicadores[0]->name);

                return view('index', compact('factor', 'indicator', 'mes', 'anio', 'año_anterior', 'anio_actual_value', 'anio_anterior_value', 'variacion', 'valor', 'proporcionla_data', 'base_total', 'valor_interpretacion', 'data_chart'));
            }
        }
    }
    /**
     * Cálculo de proporcionales.
     * Los proporcionales se reflejan segun el acumulado total y respecto al total del mejor mes.
     * 
     * @queryParam name required Nombre del indicador. Example prueba acida
     * @queryParam year required Año de busqueda respecto al indicador. Example: 2019
  
     * @bodyParam nombreIndicador string required Nombre del indicador. Example: prueba acida
     * @bodyParam año int required Año de busqueda. Example: 2019
     *response {ststus: 1 , data: 200}
     */
    public function proporsionales_Year($indicador, $anio)
    {
        $gestion =  new DataServiceRepository();
        // respecto al YEAR
        $valor_proporcional_total = $gestion->proporcionalTotalYear($indicador, $anio); // SUMATORIA
        $total_proporcional_data = $gestion->calcularProporcional($indicador, $anio); //DATA

        // respecto al MES mayor
        $valor_proporcional_total_m = $gestion->proporcionalTotalMonth($indicador, $anio); //MAX VALOR
        $total_proporcional_data_m = $gestion->calcularProporcional($indicador, $anio); //DATA

        $array_data = array();
        for ($i = 0; $i < count($total_proporcional_data); $i++) {

            $arrX = array("aqua", "red", "green", "blue", "yellow", "orange", "brown");
            $randIndex = array_rand($arrX);
            $other = array(
                "mes" => $total_proporcional_data[$i]->month,
                "valor_año" => round(($total_proporcional_data[$i]->current_month * 100) / $valor_proporcional_total[0]->total_months, 2),
                "baseTotal_año" => $valor_proporcional_total[0]->total_months,
                "porcentaje_año" => (round(($total_proporcional_data[$i]->current_month * 100) / $valor_proporcional_total[0]->total_months, 2) * 100) / $valor_proporcional_total[0]->total_months,
                // MES MAYOR
                "mes_mes" => $total_proporcional_data_m[$i]->month,
                "valor_mes_unico" => $total_proporcional_data_m[$i]->current_month,

                "valor_mes" => round(($total_proporcional_data_m[$i]->current_month * 100) / $valor_proporcional_total_m[0]->maxCurrentMonth, 2),
                "baseTotal_mes" => $valor_proporcional_total_m[0]->maxCurrentMonth,
                "porcentaje_mes" => (round(($total_proporcional_data_m[$i]->current_month * 100) / $valor_proporcional_total_m[0]->maxCurrentMonth, 2) * 100) / $valor_proporcional_total_m[0]->maxCurrentMonth,
                "color_bar" => $arrX[$randIndex]

            );
            array_push($array_data, $other);
        }
        return $array_data;
    }

    /**
     * @group App Móvil
     *

     * Push Notifications.
     * Notificación del indicador en aplicación móvil.
     * 

     * @queryParam token required Token app_movil.
  

     * @bodyParam token string required Token app_movil.
     *
     */
    public function push($token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send?=",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"notification\":{\n    
                                        \"title\":\"Ionic 4 Notification\",\n    
                                        \"body\":\"Notificacion enviada por Alexa indicadores\",\n    
                                        \"sound\":\"default\",\n    
                                        \"click_action\":\"FCM_PLUGIN_ACTIVITY\",\n    
                                        \"icon\":\"fcm_push_icon\"\n  
                                    },\n  
                                    \"data\":{\n    
                                        \"indicador\":\"liquidez corriente\",\n    
                                        \"mes\":\"enero\"\n  
                                    },\n    
                                    \"to\":\"" . $token . "\",\n    
                                    \"priority\":\"high\",\n    
                                    \"restricted_package_name\":\"\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=AIzaSyD3LPdIRzp0LD2CPKhstrGwAasI6x2GcQQ",
                "Content-Type: application/json",
                "Postman-Token: ca5e9f46-ebe0-4062-ae08-cf165aa2a71f",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
        /**
	 * Indicador respecto al mes V1.
	 * Versión 1, permite ver la pagina sin cumplir la validación del token ni tiempo límite de visualización.
     * 
	   * @queryParam name required Nombre del indicador.
   * @queryParam month required Mes de busqueda respecto al indicador.
   * @queryParam year required Año de busqueda respecto al indicador.
  
   * @bodyParam nombreIndicador string required Nombre del indicador.
   * @bodyParam mes string required Mes de busqueda.
   * @bodyParam año int required Año de busqueda.
   *@response {"factor":"gestion","indicator":"Indicador rotacion de cartera respecto al a\u00f1o 2019","mes":"","anio":"2019","a\u00f1o_anterior":2018,"anio_actual_value":"36.34","anio_anterior_value":"27.31","variacion":9.03,"valor":"4.56","proporcionla_data":[{"mes":"marzo","valor_a\u00f1o":15.42,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":52.147446736557,"mes_mes":"marzo","valor_mes_unico":"4.56","valor_mes":18.23,"baseTotal_mes":"25.01","porcentaje_mes":72.890843662535,"color_bar":"green"},{"mes":"agosto","valor_a\u00f1o":84.58,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":286.03314169767,"mes_mes":"agosto","valor_mes_unico":"25.01","valor_mes":100,"baseTotal_mes":"25.01","porcentaje_mes":399.84006397441,"color_bar":"blue"}],"base_total":[{"total_months":"29.57"}],"valor_interpretacion":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","data_chart":[{"al_indicator_id":"3","value":"100","isactive":"Y","description":"gestion","created":"2019-09-02 16:50:49","created_by":"100","updated":"2019-09-02 16:50:55","updated_by":"100","name":"rotacion de cartera","al_org_id":"1","al_user_role_id":"1","allow_monthly":"N","allow_not_compare":"Y","al_factor_id":"3","criterial":"B","interpretation_need_compare":"N","not_compare_value":null,"compare_middle_point_min":null,"compare_middle_point_max":null,"txt_affirmative":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","txt_negative":null,"graph_min_value":"0","graph_max_value":"50","graph_green_min_value":"35","graph_green_max_value":"50","graph_yellow_min_value":"25","graph_yellow_max_value":"35","graph_red_min_value":"25","graph_red_max_value":"0"}]}
	 */
    public function indicatorMonthYearV1($indicador, $mes, $anio)
    {

        $gestion =  new DataServiceRepository();
        //DATA

        $indicadores = $gestion->indicatorMonthYear($indicador, $mes, $anio);

        if (empty($indicadores)) {
            return view('empty');
        } else {

            $factor = $indicadores[0]->description;
            $indicator = $indicadores[0]->name;
            $mes = $indicadores[0]->month; // actual    
            $mes_anterior_name = $gestion->mes_anterior_name($mes);

            // DATA VALORES
            $mes_actual = $indicadores[0]->current_month;
            $mes_anterior = $indicadores[0]->last_month; // funcion determina el mes
            $variacion = $indicadores[0]->current_month - $indicadores[0]->last_month;

            // CALCULO 
            $valor = $indicadores[0]->current_month;

            // CALCULO DEL PROPORSIONAL
            $base_total = $gestion->proporcionalTotalMonth($indicadores[0]->name, $indicadores[0]->year); // SUMATORIA
            $proporcionla_data = $this->proporsionales_Year($indicadores[0]->name, $indicadores[0]->year); // [{"marzo":18.232706917233},{"agosto":100}]
            // *********************** INTERPRETACION *******************
            $valores_interpretacion = $gestion->interpretacionIndicador($indicadores[0]->name); // SUMATORIA
            $valor_interpretacion = $valores_interpretacion[0]->txt_affirmative;
            //************** VALORES GRAFICO MAX Y MIN *****************/
            $data_chart = $gestion->valoresGraficoIndicador($indicadores[0]->name);

            return view('index', compact('factor', 'indicator', 'mes', 'mes_anterior_name', 'mes_actual', 'mes_anterior', 'variacion', 'valor', 'base_total', 'proporcionla_data', 'valor_interpretacion', 'data_chart'));
        }
    }

        /**
	 * Indicador respecto al año V1.
	 * Versión 1, permite ver la pagina sin cumplir la validación del token ni tiempo límite de visualización.
   * @queryParam name required Nombre del indicador.
   * @queryParam year required Año de busqueda respecto al indicador.
  
   * @bodyParam nombreIndicador string required Nombre del indicador.
   * @bodyParam año int required Año de busqueda.
   * @response {"factor":"gestion","indicator":"Indicador rotacion de cartera respecto al a\u00f1o 2019","mes":"","anio":"2019","a\u00f1o_anterior":2018,"anio_actual_value":"36.34","anio_anterior_value":"27.31","variacion":9.03,"valor":"4.56","proporcionla_data":[{"mes":"marzo","valor_a\u00f1o":15.42,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":52.147446736557,"mes_mes":"marzo","valor_mes_unico":"4.56","valor_mes":18.23,"baseTotal_mes":"25.01","porcentaje_mes":72.890843662535,"color_bar":"green"},{"mes":"agosto","valor_a\u00f1o":84.58,"baseTotal_a\u00f1o":"29.57","porcentaje_a\u00f1o":286.03314169767,"mes_mes":"agosto","valor_mes_unico":"25.01","valor_mes":100,"baseTotal_mes":"25.01","porcentaje_mes":399.84006397441,"color_bar":"blue"}],"base_total":[{"total_months":"29.57"}],"valor_interpretacion":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","data_chart":[{"al_indicator_id":"3","value":"100","isactive":"Y","description":"gestion","created":"2019-09-02 16:50:49","created_by":"100","updated":"2019-09-02 16:50:55","updated_by":"100","name":"rotacion de cartera","al_org_id":"1","al_user_role_id":"1","allow_monthly":"N","allow_not_compare":"Y","al_factor_id":"3","criterial":"B","interpretation_need_compare":"N","not_compare_value":null,"compare_middle_point_min":null,"compare_middle_point_max":null,"txt_affirmative":"El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.","txt_negative":null,"graph_min_value":"0","graph_max_value":"50","graph_green_min_value":"35","graph_green_max_value":"50","graph_yellow_min_value":"25","graph_yellow_max_value":"35","graph_red_min_value":"25","graph_red_max_value":"0"}]}
	 */
    public function indicatorYearV1($indicator, $anio)
    {

        $gestion =  new DataServiceRepository();
        //DATA
        $indicadores = $gestion->indicatorYear($indicator,  $anio);

        if (empty($indicadores)) {
            return view('empty');
        } else {
            $factor = $indicadores[0]->description;
            $indicator = 'Indicador ' . $indicadores[0]->name . ' respecto al año ' . $indicadores[0]->year;     //$indicadores[0]->name;
            $mes = '';
            $año = $indicadores[0]->year; //2019
            $año_anterior = $indicadores[0]->year - 1; // 2018


            //DATA VALORES
            $valoresCurrent = $gestion->indicatorYearValuesCurrent($indicadores[0]->name, $indicadores[0]->year);
            $anio_actual_value = $valoresCurrent[0]->current_year;  // Sumatoria del valor del año actual

            $valoresLast = $gestion->indicatorYearValuesLast($indicadores[0]->name, $indicadores[0]->year);
            $anio_anterior_value = $valoresLast[0]->last_year;  // Sumatoria del valor del año actual

            $variacion = $anio_actual_value - $anio_anterior_value;
            $valor = $indicadores[0]->current_month;

            // CALCULO DEL PROPORSIONAL
            $base_total = $gestion->proporcionalTotalYear($indicadores[0]->name, $indicadores[0]->year); // SUMATORIA
            $proporcionla_data = $this->proporsionales_Year($indicadores[0]->name, $indicadores[0]->year); // [{"marzo":18.232706917233},{"agosto":100}]

            // *********************** INTERPRETACION *******************
            $valores_interpretacion = $gestion->interpretacionIndicador($indicadores[0]->name); // SUMATORIA
            $valor_interpretacion = $valores_interpretacion[0]->txt_affirmative;
            //************** VALORES GRAFICO MAX Y MIN *****************/
            $data_chart = $gestion->valoresGraficoIndicador($indicadores[0]->name);

            return compact('factor', 'indicator', 'mes', 'anio', 'año_anterior', 'anio_actual_value', 'anio_anterior_value', 'variacion', 'valor', 'proporcionla_data', 'base_total', 'valor_interpretacion', 'data_chart');
        }
    }
}
