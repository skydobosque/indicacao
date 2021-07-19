<?php
require __DIR__ . "/../vendor/autoload.php";
use App\Controllers\HomeController as Home;
use ACS\Classes\Indicacao;

$indicacao = new Indicacao("USUARIO 1", 0);
$indicacao->Indicacao("USUARIO 2", 200);
$indicacao->Indicacao("USUARIO 3", 100);
// $indicacao->Indicacao("USUARIO 4", 300);
// $indicacao->Indicacao("USUARIO 5", 400);
// $indicacao->Indicacao("USUARIO 6", 500);
$home = new Home();
echo $home->index($indicacao);

/*
// $indicacao->Indicacao("USUARIO 4", 300);
// $indicacao->Indicacao("USUARIO 5", 400);
// $indicacao->Indicacao("USUARIO 6", 500);

var_dump($indicacao->usuario->getPontuacao());
echo "<pre>";
print_r(get_object_vars($indicacao));

$home = new Home();
echo $home->index($indicacao);
*/