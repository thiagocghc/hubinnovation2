<?php
define('TITLE','Relatório');

include __DIR__.'/vendor/autoload.php';
use App\Entity\Usuario;
use App\Entity\Palestra;
use App\Entity\Palestrante;
use \App\Session\Login;
//força login do usuário
Login::requireLogin();

$obj = new Palestra();
$palestras = $obj->buscar();

$new_obj = new Palestrante();
$palestrantes = $new_obj->buscar();

$usuario = new Usuario();
$quantidade = $usuario->contar();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/menu_user.php';
include __DIR__.'/includes/main_inscricoes.php';
include __DIR__.'/includes/footer.php';

?>


