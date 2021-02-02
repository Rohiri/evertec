<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    /**
     * Reemplaza las comas por punto para guardar en BD.
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public static function moneyFormat($value= '')
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }

    /**
     * Formatea un número con los millares agrupados
     * @param  string $valor   [description]
     * @param  [type] $decimal [description]
     * @return [type]          [description]
     */
    public static function money($valor='', $decimal)
    {
        return number_format($valor, $decimal, ',', '.');
    }

}
