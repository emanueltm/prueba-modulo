<?php

namespace App\Models\M1;
use CodeIgniter\Model;

class Tabla_grupos extends Model{

  protected $table         = 'm1_grupos';
  protected $primaryKey    = 'id_grupo';
  protected $returnType    = 'object';
  protected $allowedFields = ['estatus', 'grupo', 'turno', 'id_escuela', 'ninos', 'ninas', 'peso_bajo_ninos', 
                              'peso_normal_ninos', 'sobrepeso_ninos', 'peso_bajo_ninas', 'peso_normal_ninas', 
                              'sobrepeso_ninas', 'hemo_ninos', 'hemo_ninas', 'anemia_ninos', 'anemia_ninas'];
  protected $useTimestamps = true;
  protected $createdField  = 'fecha_creacion';
  protected $updatedField  = 'fecha_actualizacion';
  protected $deletedField  = 'fecha_eliminacion';

  public function datos_grupo($id){
    $resultado = $this->select("ninos, ninas, peso_bajo_ninos, peso_normal_ninos, sobrepeso_ninos, peso_bajo_ninas, peso_normal_ninas, sobrepeso_ninas, hemo_ninos, hemo_ninas, anemia_ninos, anemia_ninas")
                      ->where("id_grupo", $id)
                      ->first();
    return $resultado;
  }

  public function grupos_de($id_escuela){
    $resultado = $this->select("grupo, ninos, ninas, peso_bajo_ninos, peso_normal_ninos, sobrepeso_ninos, peso_bajo_ninas, peso_normal_ninas, sobrepeso_ninas, hemo_ninos, hemo_ninas, anemia_ninos, anemia_ninas")
                      ->where("id_escuela", $id_escuela)
                      ->findAll();
    return $resultado;
  }

  public function escuelas_activas(){
    $resultado = $this->select('id_escuela, count(id_grupo) as total_grupos')
                      ->groupBy('id_escuela')
                      ->findAll();
    return $resultado;
  }

  public function escuelas_activas_por_municipio($id_municipio){
    $resultado = $this->select('m1_grupos.id_escuela, count(m1_grupos.id_grupo) as total_grupos')
                      ->join('escuelas', 'escuelas.id_escuela = m1_grupos.id_escuela')
                      ->where('escuelas.id_municipio', $id_municipio)
                      ->groupBy('m1_grupos.id_escuela')
                      ->findAll();
    return $resultado;
  }

  public function total_grupos_de($id_escuela){
    $resultado = $this->select("count(*) as total_grupo")
                      ->where('id_escuela', $id_escuela)
                      ->first();
    return $resultado;
  }
}
//end class Tabla_grupos