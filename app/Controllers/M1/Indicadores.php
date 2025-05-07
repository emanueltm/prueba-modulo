<?php

namespace App\Controllers\M1;
use App\Controllers\BaseController;
use App\Models\M1\Tabla_grupos;
use App\Models\Tabla_escuelas;

class Indicadores extends BaseController{
    public function index(){
        return $this->crear_vista("M1\indicadores", $this->cargar_datos());
    }

    private function cargar_datos(){
        $datos = array();

        $tabla_grupos = new Tabla_grupos();
        $tabla_escuelas = new Tabla_escuelas();
        
        $escuelas_activas = $tabla_grupos->escuelas_activas();
        foreach ($escuelas_activas as $key => $escuela) {
            $esc = $tabla_escuelas->informacion_escuela($escuela->id_escuela);
            $escuela->nombre = $esc->nombre;
            $escuela->municipio = $esc->municipio;
        }
        
        $datos['total_escuelas'] = count($escuelas_activas);
        $datos['escuelas'] = $escuelas_activas;
        // dd($datos);
        return $datos;
    }

    private function crear_vista($nombre_vista, $contenido = array()){
        return view($nombre_vista, $contenido);
    }
}//end indicadores
