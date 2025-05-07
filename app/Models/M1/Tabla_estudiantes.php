<?php

namespace App\Models\M1;
use CodeIgniter\Model;

class Tabla_estudiantes extends Model{

  protected $table         = 'm1_estudiantes';
  protected $primaryKey    = 'id_estudiante';
  protected $returnType    = 'object';
  protected $allowedFields = ['estatus', 'nombre_completo', 'sexo', 'peso', 'talla', 'imc', 'hemoglabina', 'anemia', 'fecha_entrega_farmacos', 'id_grupo'];
  protected $useTimestamps = true;
  protected $createdField  = 'fecha_creacion';
  protected $updatedField  = 'fecha_actualizacion';
  protected $deletedField  = 'fecha_eliminacion';

}
//end class Tabla_estudiantes