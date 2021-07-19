<?php
namespace App\Controllers;

use App\Models\HomeModel;
use App\Views\HomeView;
use ACS\Classes\Indicacao;

class HomeController
{

    public function index(Indicacao $indicacao)
    {
        $model = new HomeModel();
        $view = new HomeView();
        $view->render($model->getText($indicacao));
    }
}
