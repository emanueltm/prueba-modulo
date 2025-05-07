<?php

namespace App\Models;
use CodeIgniter\Model;

class Tabla_escuelas extends Model{

  protected $table         = 'escuelas';
  protected $primaryKey    = 'id_escuela';
  protected $returnType    = 'object';
  protected $allowedFields = ['estatus', 'nombre', 'clave', 'region', 'total_alumnos', 'turno1', 'turno2', 'id_municipio'];
  protected $useTimestamps = true;
  protected $createdField  = 'fecha_creacion';
  protected $updatedField  = 'fecha_actualizacion';
  protected $deletedField  = 'fecha_eliminacion';

  public function escuelas_de($id_municipio){
    $resultado = $this->select('id_escuela, nombre, clave')
                      ->where('id_municipio', $id_municipio)
                      ->findAll();
    return $resultado;
  }

  public function informacion_escuela($id_escuela){
    $resultado = $this->select('escuelas.id_escuela, escuelas.nombre, escuelas.clave, escuelas.region, escuelas.total_alumnos, escuelas.turno1, escuelas.turno2, municipio.municipio')
                      ->join('municipio', 'municipio.id_municipio = escuelas.id_municipio')
                      ->where('escuelas.id_escuela', $id_escuela)
                      ->first();
    return $resultado;
  }
}
//end class Tabla_usuarios