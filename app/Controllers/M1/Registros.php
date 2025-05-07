<?php

namespace App\Controllers\M1;
use App\Controllers\BaseController;
use App\Models\M1\Tabla_grupos;
use App\Models\Tabla_escuelas;
use App\Models\Tabla_municipios;


class Registros extends BaseController{

    public function index(){
        session()->set("M1_id_municipio_reporte", "-60");
        return $this->crear_vista("m1/registros", $this->cargar_datos());
    }//end function index

    private function cargar_datos(){
        $datos = array();

        $tabla_escuelas = new Tabla_escuelas();
        $tabla_grupos = new Tabla_grupos();
        $tabla_municipios = new Tabla_municipios();
        $escuelas_activas = $tabla_grupos->escuelas_activas();

        foreach ($escuelas_activas as $key => $escuela) {
            $esc = $tabla_escuelas->informacion_escuela($escuela->id_escuela);
            $escuela->nombre = $esc->nombre;
            $escuela->municipio = $esc->municipio;
            $escuela->grupos = $tabla_grupos->total_grupos_de($escuela->id_escuela)->total_grupo;
        }        
        $datos['escuelas'] = $escuelas_activas;
        $datos['municipios'] = $tabla_municipios->input_select();
        $datos['nombre_vista'] = "Todos los registros";

        return $datos;
    }//end function cargar_datos

    public function buscar(){
        $datos = array();
        $id_municipio = $this->request->getPost("id_municipio");
        session()->set("M1_id_municipio_reporte", $id_municipio);

        if($id_municipio == "-60"){
            return $this->crear_vista("m1/registros", $this->cargar_datos());
        }
        else{     
            $tabla_escuelas = new Tabla_escuelas();
            $tabla_grupos = new Tabla_grupos();
            $tabla_municipios = new Tabla_municipios();
    
            $escuelas_activas = $tabla_grupos->escuelas_activas_por_municipio($id_municipio);
            foreach ($escuelas_activas as $key => $escuela) {
                $esc = $tabla_escuelas->informacion_escuela($escuela->id_escuela);
                $escuela->nombre = $esc->nombre;
                $escuela->municipio = $esc->municipio;
                $escuela->grupos = $tabla_grupos->total_grupos_de($escuela->id_escuela)->total_grupo;
            } 
    
            $datos['escuelas'] = $escuelas_activas;
            $datos['municipios'] = $tabla_municipios->input_select();
            $datos['nombre_vista'] = "Registros de ".$tabla_municipios->datos_de($id_municipio)->municipio;
            return $this->crear_vista("m1/registros", $datos);
        }

    }//end function buscar

    public function generar_reporte(){
        // dd(session()->get("M1_id_municipio_reporte"));
        $tabla_escuelas = new Tabla_escuelas();
        $tabla_grupos = new Tabla_grupos();
        if(session()->get("M1_id_municipio_reporte") == "-60"){
            $escuelas = $tabla_grupos->escuelas_activas();
            foreach ($escuelas as $key => $escuela) {
                $esc = $tabla_escuelas->informacion_escuela($escuela->id_escuela);
                $escuela->nombre = $esc->nombre;
                $escuela->municipio = $esc->municipio;
                $escuela->grupos = $tabla_grupos->grupos_de($escuela->id_escuela);
            }        
        }
        else{
            $escuelas = $tabla_escuelas->escuelas_de(session()->get("M1_id_municipio_reporte"));
            foreach ($escuelas as $key => $value) {
                $value->grupos = $tabla_grupos->grupos_de($value->id_escuela);
            }
        }
        dd($escuelas);
    }//end function generar_reporte

    private function crear_vista($nombre_vista, $contenido = array()){
        return view($nombre_vista, $contenido);
    }//end function crear_vista
}//end class registros
