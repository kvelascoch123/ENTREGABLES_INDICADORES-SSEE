<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon; 


class DataServiceRepository {

 
	

    public function __construct() {
       
    }
    
    // Indicador Mes A���o
    public function indicatorMonthYear($indicador, $mes, $anio) {
        $indicadores = DB::select('SELECT * FROM `al_indicators_years` WHERE name ="' . $indicador . '" and  month = "' . $mes . '" and year =  ' . $anio . '');
        return $indicadores;
    }

    // Indicador A���o

    public function indicatorYear($indicador, $anio){
        $indicadores = DB::select('SELECT * FROM `al_indicators_years` WHERE name ="' . $indicador . '" and year =  ' . $anio . '');
        return $indicadores;
    }

    //-----  Calculos  -----

    // INDICADOR - A���O  (CURRENT_YEAR)
    public function indicatorYearValuesCurrent($indicador,$anio){
        $current_year = DB::select('SELECT SUM(current_year) as current_year FROM `al_indicators_years` WHERE name = "'.$indicador.'" and year = ' . $anio . '');
        return $current_year;

    }
     // INDICADOR - A���O (LAST_YEAR)
     public function indicatorYearValuesLast($indicador,$anio){

        $last_year = DB::select('SELECT SUM(last_year) as last_year FROM `al_indicators_years` WHERE name = "'.$indicador.'" and year = ' . $anio . '');
        return $last_year;

    }

    // CALCULOS DE PROPORSIONALIDADES

    // *********** proporcional total AÑO****************
    // Sumar todos los valores (ESTOS VALORES SUMADOS SON TOMADOS DE current_month
    public function proporcionalTotalYear($indicador,$anio){

        $current_year_total = DB::select('SELECT SUM(current_month) as total_months FROM `al_indicators_years` WHERE name = "'.$indicador.'" and year = ' . $anio . '');
        return $current_year_total;
    }

    public function calcularProporcional($indicador,$anio){
        $last_year_data = DB::select('SELECT * FROM `al_indicators_years` WHERE name = "'.$indicador.'" and year = ' . $anio . '');
        return $last_year_data;
    }


    // *********** proporcional total MES MAYOR ****************
    // POR MES MAYOR

    public function proporcionalTotalMonth($indicador,$anio){
        // MAXIMO VALOR DE LA COLUMNA CURRENT_MONTH
        $max_month_total = DB::select('SELECT MAX(current_month) AS maxCurrentMonth FROM  al_indicators_years WHERE name = "'.$indicador.'" and year = ' . $anio . '');
        return $max_month_total;
    }


    // **************** INTERPRETACIONES ALEXA **************************



public function interpretacionIndicador($indicador){
    // MAXIMO VALOR DE LA COLUMNA CURRENT_MONTH
    $interpretacion = DB::select('SELECT * FROM al_indicators WHERE name = "'.$indicador.'" ');
    return $interpretacion;
}
    // FUncionalidades Visual
    
      // ***************** DATOS MAX Y MIN DEL GRAFICO ***********
    public function valoresGraficoIndicador($indicador){
        // MAXIMO VALOR DE LA COLUMNA CURRENT_MONTH
        $valores_max_min = DB::select('SELECT * FROM al_indicators WHERE name = "'.$indicador.'" ');
        return $valores_max_min;
        }
    // ***************** al_token_user(consumido) ***********
    public function urlConsumido($token){
        // MAXIMO VALOR DE LA COLUMNA CURRENT_MONTH
        
        $token = str_replace('-', '/', $token);
        $token = str_replace(' ', '+', $token);
        
        $consumido = DB::select('SELECT consumido FROM al_token_user WHERE token = "'.$token.'"');
        return $consumido;
        }        

    public function mes_anterior_name($indicador){
        
        if($indicador == 'enero'){
            return 'Diciembre';    
        }
        if($indicador == 'febrero'){
            return 'Enero';    
        }
        if($indicador == 'marzo'){
            return 'Febrero';    
        }
        if($indicador == 'abril'){
            return 'marzo';    
        }
        if($indicador == 'mayo'){
            return 'Abril';    
        }
        if($indicador == 'junio'){
            return 'Mayo';    
        }
        if($indicador == 'julio'){
            return 'Junio';    
        }
        if($indicador == 'agosto'){
            return 'Lulio';    
        }
        if($indicador == 'septiembre'){
            return 'Agosto';    
        }
        if($indicador == 'octubre'){
            return 'Septiembre';    
        }
        if($indicador == 'noviembre'){
            return 'Octubre';    
        }
        if($indicador == 'Diciembre'){
            return 'Noviembre';    
        }
    }

    // INDICADOR - MES - ANIO 
    // NO CALCULOS SOLO (variacion y proporcionalidades)

}