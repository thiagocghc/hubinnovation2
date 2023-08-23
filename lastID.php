<?php

include __DIR__.'/vendor/autoload.php';
use App\Entity\User;


$usuario = new User();

$usuario->hello();

$usuario->nome = "THIAGO ALMEIDA";
$usuario->email = "thiagoalmeida@live.com";

print_r($usuario);

$ultimoid = $usuario->cadastrar();

echo "ULTIMO ID: " . $ultimoid;
?>


