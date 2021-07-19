<?php
namespace App\Models;

use ACS\Classes\Indicacao;

class HomeModel
{

    public function getText(Indicacao $indicacao)
    {
        $str = $indicacao->usuario->toHtml();
        return $str;
    }
}