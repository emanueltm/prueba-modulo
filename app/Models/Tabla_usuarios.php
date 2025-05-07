<?php

namespace App\Models;
use CodeIgniter\Model;

class Tabla_usuarios extends Model{

  protected $table         = 'usuarios';
  protected $primaryKey    = 'id_usuario';
  protected $returnType    = 'object';
  protected $allowedFields = ['estatus', 'nombre_completo', 'usuario', 'contrasena'];
  protected $useTimestamps = true;
  protected $createdField  = 'fecha_creacion';
  protected $updatedField  = 'fecha_actualizacion';
  protected $deletedField  = 'fecha_eliminacion';

  public function login($usuario, $contrasena){
    $resultado = $this->select('*')
                      ->where('usuario', $usuario)
                      ->where('contrasena', $contrasena)
                      ->first();
    return $resultado;
  }//end function login
  


}
//end class Tabla_usuarios