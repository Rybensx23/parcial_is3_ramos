<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['USUARIO_NOMBRE', 'USUARIO_CATALOGO', 'USUARIO_PASSWORD', 'USUARIO_SITUACION', 'USUARIO_ESTADO'];
    protected static $idTabla = 'USUARIO_ID';

    public $usuario_id;
    public $usuario_nombre;
    public $usuario_catalogo;
    public $usuario_password;
    public $usuario_situacion;    
    public $usuario_estado;

    public function __construct($args = [])
    {
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->usuario_nombre = $args['usuario_nombre'] ?? '';
        $this->usuario_catalogo = $args['usuario_catalogo'] ?? '';
        $this->usuario_password = $args['usuario_password'] ?? '';
        $this->usuario_situacion = $args['usuario_situacion'] ?? '1';        
        $this->usuario_estado = $args['usuario_estado'] ?? '1';
    }
}