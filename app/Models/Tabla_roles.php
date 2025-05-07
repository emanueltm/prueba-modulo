<?php

namespace App\Models;
use CodeIgniter\Model;

class Tabla_roles extends Model{

  protected $table         = 'roles';
  protected $primaryKey    = 'id_rol';
  protected $returnType    = 'object';
  protected $allowedFields = ['estatus', 'rol'];
  protected $useTimestamps = true;
  protected $createdField  = 'fecha_creacion';
  protected $updatedField  = 'fecha_actualizacion';
  protected $deletedField  = 'fecha_eliminacion';

  public function roles_de($id_usuario){
    $resultado = $this->select('roles.id_rol, roles.rol')
                      ->join('usuario_rol', 'usuario_rol.id_rol = roles.id_rol')
                      ->where('usuario_rol.id_usuario', $id_usuario) 
                      ->findAll();
    return $resultado;
  }//end function login
  


}
//end class Tabla_usuarios