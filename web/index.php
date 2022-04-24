<?php

// carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';

//Si no hay sesion la iniciamos, y en caso de haberla y no conocer el nivel ponerlo a 0(usuario no logueado)

if(!isset($_SESSION))
{
    ini_set("session.cookie_lifetime", 600);
    session_start();
}

if(!isset($_SESSION["userLevel"])){
    $_SESSION["userLevel"] = 0;
}

// enrutamiento
$map = array(
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'userLevel' => 0)
);
// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        echo $_GET['ctl'] . "doesn't exists.";
    }
} else {
    $ruta = 'inicio';
}
$controlador = $map[$ruta];
// Ejecución del controlador asociado a la ruta

if (method_exists($controlador['controller'],$controlador['action'])) {
    
    if($_SESSION["userLevel"] >= $controlador["userLevel"]){
        
        call_user_func(array(new $controlador['controller'], $controlador['action']));
        
    }else{
        
        header("location:index.php?ctl=loguearse");
        
    }

} else {
    
    header("location:index.php?ctl=error");
    
}
?>
