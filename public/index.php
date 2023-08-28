<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\UsuarioController;
$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//usuarios
$router->get('/usuarios', [UsuarioController::class,'index']);
$router->get('/API/usuarios/buscar', [UsuarioController::class,'buscarApi']);
$router->post('/API/usuarios/guardar', [UsuarioController::class,'guardarApi']);
$router->post('/API/usuarios/modificar', [UsuarioController::class,'modificarApi']);
$router->post('/API/usuarios/eliminar', [UsuarioController::class,'eliminarApi']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
