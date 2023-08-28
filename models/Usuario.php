<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['USUARIO_NOMBRE', 'USUARIO_CATALOGO', 'USUARIO_PASSWORD', 'USUARIO_SITUACION', 'USUARIO_ESTADO'];
    protected static $idTabla = 'USUARIO_ID';

    public $usuario_id;
    public $usuARIO_nombre;
    public $usuARIO_catalogo;
    public $usuARIO_password;
    public $usuARIO_situacion;    
    public $usuARIO_estado;

    public function __construct($args = [])
    {
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->usuario_nombre = $args['usuario_nombre'] ?? '';
        $this->usuario_catalogo = $args['usuario_catalogo'] ?? '';
        $this->usuario_password = $args['usuario_password'] ?? '';
        $this->usuario_situacion = $args['usuario_situacion'] ?? '1';        
        $this->usuario_estado = $args['usuario_estado'] ?? '';
    }
}