<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class DataServiceRepository
/* CONSULTAS A LA BASE DE DATOS "WEB" */
{
    public function __construct()
    { }
    /* Indicador por Mes y Anio */
    public function indicatorMonthYear($indicador, $mes, $anio)
    {
        $indicadores = DB::select('SELECT * FROM `al_indicators_years` WHERE name ="' . $indicador . '" and  month = "' . $mes . '" and year =  ' . $anio . '');
        return $indicadores;
    }
    /* Indicador por Anio */
    public function indicatorYear($indicador, $anio)
    {
        $indicadores = DB::select('SELECT * FROM `al_indicators_years` WHERE name ="' . $indicador . '" and year =  ' . $anio . '');
        return $indicadores;
    }
    /***** CALCULOS *****/
    /* INDICADOR por Anio Actual(CURRENT_YEAR) */
    public function indicatorYearValuesCurrent($indicador, $anio)
    {
        $current_year = DB::select('SELECT SUM(current_year) as current_year FROM `al_indicators_years` WHERE name = "' . $indicador . '" and year = ' . $anio . '');
        return $current_year;
    }
    // INDICADOR por Anio Pasado(LAST_YEAR)
    public function indicatorYearValuesLast($indicador, $anio)
    {
        $last_year = DB::select('SELECT SUM(last_year) as last_year FROM `al_indicators_years` WHERE name = "' . $indicador . '" and year = ' . $anio . '');
        return $last_year;
    }
    /* CALCULOS DE PROPORSIONALIDADES RESPECTO AL ANIO*/
    public function proporcionalTotalYear($indicador, $anio)
    {
        $current_year_total = DB::select('SELECT SUM(current_month) as total_months FROM `al_indicators_years` WHERE name = "' . $indicador . '" and year = ' . $anio . '');
        return $current_year_total;
    }
    /***** CALCULOS DE PROPORSIONALIDADES RESPECTO AL MES MAYOR *****/
    public function proporcionalTotalMonth($indicador, $anio)
    {
        $max_month_total = DB::select('SELECT MAX(current_month) AS maxCurrentMonth FROM  al_indicators_years WHERE name = "' . $indicador . '" and year = ' . $anio . '');
        return $max_month_total;
    }
    /* Data del indicador a calcular proporsionalidad */
    public function calcularProporcional($indicador, $anio)
    {
        $last_year_data = DB::select('SELECT * FROM `al_indicators_years` WHERE name = "' . $indicador . '" and year = ' . $anio . '');
        return $last_year_data;
    }
    // **************** INTERPRETACIONES **************************
    public function interpretacionIndicador($indicador)
    {
        $interpretacion = DB::select('SELECT * FROM al_indicators WHERE name = "' . $indicador . '" ');
        return $interpretacion;
    }
    /******* FUNSIONALIDAD VISUAL *******************/
    /*DATOS MAX Y MIN DEL GRAFICO CHART*/
    public function valoresGraficoIndicador($indicador)
    {
        $valores_max_min = DB::select('SELECT * FROM al_indicators WHERE name = "' . $indicador . '" ');
        return $valores_max_min;
    }
    /*****  DETERMINAR SI FUE CONSUMIDO EL LINK  ****/
    public function urlConsumido($token)
    {
        $token = str_replace('-', '/', $token);
        $token = str_replace(' ', '+', $token);
        $consumido = DB::select('SELECT consumido FROM al_token_user WHERE token = "' . $token . '"');
        return $consumido;
    }

    /* DETERMINAR MES ANTERIOR */
    public function mes_anterior_name($indicador)
    {

        if ($indicador == 'enero') {
            return 'Diciembre';
        }
        if ($indicador == 'febrero') {
            return 'Enero';
        }
        if ($indicador == 'marzo') {
            return 'Febrero';
        }
        if ($indicador == 'abril') {
            return 'marzo';
        }
        if ($indicador == 'mayo') {
            return 'Abril';
        }
        if ($indicador == 'junio') {
            return 'Mayo';
        }
        if ($indicador == 'julio') {
            return 'Junio';
        }
        if ($indicador == 'agosto') {
            return 'Lulio';
        }
        if ($indicador == 'septiembre') {
            return 'Agosto';
        }
        if ($indicador == 'octubre') {
            return 'Septiembre';
        }
        if ($indicador == 'noviembre') {
            return 'Octubre';
        }
        if ($indicador == 'Diciembre') {
            return 'Noviembre';
        }
    }
}
