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
  
  // Nuevo método para obtener los módulos y roles del usuario
  public function modulos_con_roles($id_usuario)
  {
      return $this->db
          ->table('modulo_usuario_rol mur')
          ->select('m.id_modulo, m.nombre AS nombre_modulo, r.rol AS nombre_rol')
          ->join('modulos m', 'm.id_modulo = mur.id_modulo')
          ->join('roles r', 'r.id_rol = mur.id_rol')
          ->where('mur.id_usuario', $id_usuario)
          ->where('mur.estatus', 1)
          ->get()
          ->getResultArray();
  }

}
//end class Tabla_usuarios