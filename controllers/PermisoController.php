<?php

namespace Controllers;

use Exception;
use Model\Permiso;
use Model\Usuario;
use Model\Rol;
use MVC\Router;

class PermisoController
{
    public static function index(Router $router){
        $usuarios = static::buscarUsuario();
        $roles = static::buscarRol();
        $permisos = Permiso::all();

        $router->render('permisos/index', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'permisos' => $permisos,
        ]);
    }
    public static function buscarUsuario(){
        $sql = "SELECT * FROM usuario where usuario_situacion = 1";
    
        try {
            $usuarios = Usuario::fetchArray($sql);
    
            return $usuarios;
        } catch (Exception $e) {

            return [];
            
        }
    }
    public static function buscarRol(){
        $sql = "SELECT * FROM rol where rol_situacion = 1";
    
        try {
            $roles = Rol::fetchArray($sql);
            return $roles;

        } catch (Exception $e) {
            return [];
            
        }
    }

    public static function guardarAPI()
    {
        try {
            $permiso = new Permiso($_POST);
            $resultado = $permiso->crear();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI()
    {
   
        try {
            $permiso = new Permiso($_POST);
            $resultado = $permiso->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }

        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function eliminarAPI()
    {
        try {
            $permiso_id = $_POST['permiso_id'];
            $permiso = Permiso::find($permiso_id);
            $permiso->permiso_situacion = 0;
            $resultado = $permiso->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
           
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function activarAPI(){
       
    
        try {
            $usuario_id = $_POST['usuario_id'];
            $sql = "UPDATE usuario set usuario_estado = 'ACTIVO' where usuario_id = ${usuario_id}";
            $resultado = Usuario::SQL($sql);
            $resultado=1;

            if ($resultado == 1) {
                echo json_encode([
                    'mensaje' => 'Usuario activado correctamente' ,
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error al actualizar',
                    'codigo' => 0
                ]);
            }
           
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    public static function desactivarAPI(){
       
    
        try {
            $usuario_id = $_POST['usuario_id'];
            $sql = "UPDATE usuario set usuario_estado = 'INACTIVO' where usuario_id = ${usuario_id}";
            $resultado = Usuario::SQL($sql);
            $resultado=1;

            if ($resultado == 1) {
                echo json_encode([
                    'mensaje' => 'Usuario activado correctamente' ,
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error al actualizar',
                    'codigo' => 0
                ]);
            }
           
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
   
    
    public static function buscarAPI()
    {
        $usuario_id = $_GET['usuario_id'];
        $rol_id = $_GET['rol_id'];

        $sql = "SELECT
        p.permiso_id,
        u.usuario_nombre AS permiso_usuario,
        u.usuario_id,
        r.rol_nombre AS permiso_rol,
        r.rol_id,
        u.usuario_estado
    FROM
        permiso p
    INNER JOIN
        usuario u ON p.permiso_usuario = u.usuario_id
    INNER JOIN
        rol r ON p.permiso_rol = r.rol_id
    WHERE
        p.permiso_situacion = 1";
    
    if ($usuario_id != '') {
        $sql .= " AND usuarios.usuario_id = '$usuario_id'";
    }
    
    if ($rol_id != '') {
        $sql .= " AND roles.rol_id = '$rol_id'";
    }

        try {

            $permisos = Permiso::fetchArray($sql);

            echo json_encode($permisos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}