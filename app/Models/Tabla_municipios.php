<?php

namespace App\Models;
use CodeIgniter\Model;

class Tabla_municipios extends Model{

  protected $table         = 'municipio';
  protected $primaryKey    = 'id_municipio';
  protected $returnType    = 'object';
  protected $allowedFields = ['estatus', 'municipio'];
  protected $useTimestamps = true;
  protected $createdField  = 'fecha_creacion';
  protected $updatedField  = 'fecha_actualizacion';
  protected $deletedField  = 'fecha_eliminacion';

  public function input_select(){
    $resultado = $this->select('id_municipio, municipio')
                      ->findAll();
    return $resultado;
  }//end input_select

  public function datos_de($id_municipio){
    $resultado = $this->select('id_municipio, municipio')
                      ->where('id_municipio', $id_municipio)
                      ->first();
    return $resultado;
  }
}//end class Tabla_usuarios
