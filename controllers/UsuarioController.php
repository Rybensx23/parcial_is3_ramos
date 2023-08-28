<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class UsuarioController
{

    public static function index(Router $router)
    {
        $usuarios = usuario::all();
        $router->render('usuarios/index', [
            'usuarios' => $usuarios,
        ]);
    }

    public static function guardarAPI()
    {
        try {
            $nombre = $_POST["usuario_nombre"];
            $catalogo = $_POST["usuario_catalogo"];
            $password = $_POST["usuario_password"];
            $confirm_password = $_POST["usu_confirm_password"];

            if ($password) {
                // Hash de la contraseña
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $usuario = new Usuario([
                    'usuario_nombre' => $nombre,
                    'usuario_catalogo' => $catalogo,
                    'usuario_password' => $hashed_password,
                ]);

                $resultado = $usuario->crear();

                if ($resultado['resultado'] == 1) {
                    echo json_encode([
                        'mensaje' => 'usuario guardado correctamente',
                        'codigo' => 1
                    ]);
                } else {
                    echo json_encode([
                        'mensaje' => 'Ocurrió un error',
                        'codigo' => 0
                    ]);
                }
            } else {
                echo json_encode([
                    'mensaje' => 'Las contraseña no es correcta.',
                    'codigo' => 0
                ]);
            }

        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'El CATALOGO que intenta usar ya existe, por favor ingreesar un nuevo Catalogo',
                'codigo' => 0
            ]);
        }
    }
}