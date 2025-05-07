<?php
namespace App\Controllers\M1;
use App\Controllers\BaseController;
use App\Models\Tabla_municipios;
use App\Models\Tabla_escuelas;
use App\Models\M1\Tabla_grupos;
use App\Models\M1\Tabla_estudiantes;

class Registrar extends BaseController {

  public function index(){
    return $this->crear_vista("m1/registrar", $this->cargar_datos());
  }//end index

  private function cargar_datos(){
    $datos = array();

    $tabla_municipios = new Tabla_municipios();
    $datos['municipios'] = $tabla_municipios->input_select();
    
    $tabla_grupos = new Tabla_grupos();
    $datos['grupo'] = $tabla_grupos->datos_grupo(1);
    if(session()->get("escuela") === null){
      $datos['escuela'] = array(
        'grupo' => null,
        "id_grupo" => null,
        "nombre_escuela" => null,
        'municipio' => null,
        "id_escuela" => null,
        "turno" => null,
        "clave" => null,
        "total_alumnos" => null,
      );

      $grupo = new \stdClass;
      $grupo->ninas = 0;
      $grupo->ninos = 0;
      $grupo->peso_bajo_ninos = 0;
      $grupo->peso_normal_ninas = 0;
      $grupo->peso_normal_ninos = 0;
      $grupo->sobrepeso_ninas = 0;
      $grupo->sobrepeso_ninos = 0;
      $grupo->peso_bajo_ninas = 0;
      $grupo->hemo_ninas = 0;
      $grupo->hemo_ninos = 0;
      $grupo->anemia_ninas = 0;
      $grupo->anemia_ninos = 0;
      $datos['grupo'] = $grupo;
      $datos['total_grupo'] = 0;
    }
    else{
      $tabla_escuela = new Tabla_escuelas();
      $escuela = $tabla_escuela->informacion_escuela(session()->get("escuela")['escuela']);
      $datos['escuela'] = array(
        'grupo' => session()->get("escuela")['grupo'],
        "id_grupo" => session()->get("escuela")['id_grupo'],
        "nombre_escuela" => $escuela->nombre,
        'municipio' => $escuela->municipio,
        "id_escuela" => $escuela->id_escuela,
        "turno" => $escuela->turno1,
        "clave" => $escuela->clave,
        "total_alumnos" => $escuela->total_alumnos,
      );

      $datos['grupo'] = $tabla_grupos->datos_grupo(session()->get("escuela")['id_grupo']);
      
      $datos['total_grupo'] = $datos['grupo']->ninas + $datos['grupo']->ninos;
    }
    // dd($datos);
    return $datos;
  }//end cargar datos

  public function obtener_escuelas(){
    $tabla_escuelas = new Tabla_escuelas(); 
    $id_municipio = $this->request->getPost('id_municipio');
    $datos = array('error' => 0, 'data' => $tabla_escuelas->escuelas_de($id_municipio));
    return $this->response->setJSON($datos);
  }//end obtener_escuelas

  public function selecionar_escuela(){
    $tabla_escuela = new Tabla_escuelas();
    $tabla_grupos = new Tabla_grupos();

    $escuela = $tabla_escuela->informacion_escuela($this->request->getPost("input-escuela"));
    $data = array(
      'grupo' => $this->request->getPost("grupo"),
      'id_escuela' => $escuela->id_escuela,
      'turno' => $escuela->turno1,
    );
    if($tabla_grupos->insert($data)){
      $id_grupo = $tabla_grupos->insertID();
      session()->set("escuela", ["escuela" => $escuela->id_escuela, "id_grupo" => $id_grupo, "grupo" => $this->request->getPost("grupo")]);
    }
    else{
      mensaje("Error al seleccionar escuela", 2);
    }

    return redirect()->to(route_to("registrar_alumnos"));
    
  }//end function seleccionar_escuela

  public function guardar(){
    $tabla_estudiantes = new Tabla_estudiantes();
    $tabla_grupos = new Tabla_grupos();
    // dd($this->request->getPost());

    $data = array(
      'nombre_completo' => $this->request->getPost("nombre_alumno"),
      'sexo' => $this->request->getPost("sexo"),
      'peso' => $this->request->getPost("peso"),
      'talla' => $this->request->getPost("talla"),
      'imc' => ($this->request->getPost("imc") == 0.0 || $this->request->getPost("imc") == "") ? 0 : $this->request->getPost("imc"),
      'hemoglabina' => ($this->request->getPost("hemo") == 0 || $this->request->getPost("hemo") == "") ? 0 : $this->request->getPost("hemo"),
      'id_grupo' => $this->request->getPost("id_grupo"),
      'anemia' => ($this->request->getPost("hemo") > 0 && $this->request->getPost("hemo") < 11.5 ) ? 1 : 0,
      'consentimiento' => $this->request->getPost("consentimiento")
    );

    if($tabla_estudiantes->insert($data)){

      $grupo = $tabla_grupos->datos_grupo($data['id_grupo']);
      $actualizar = $this->categorizar_imc($data['sexo'], $data['imc'], $data['hemoglabina'], $grupo, $data['consentimiento']);
      $tabla_grupos->update($data['id_grupo'], $actualizar);
      
      mensaje("Insertado correctamente"); 
    }
    else{
      mensaje("Error al registrar, intentelo de nuevo", 2); 
    }

    return redirect()->to(route_to("registrar_alumnos"));
  }//end function guardar

  private function categorizar_imc($sexo, $imc, $hemo, $grupo, $consentimiento){
    $actualizar = array();
    
    // Si el alumno no firma consentimiento y/o no asistio
    if($consentimiento > 1){
      if($sexo == 1){
        $actualizar['ninas'] = $grupo->ninas + 1;
      }
      else{
        $actualizar['ninos'] = $grupo->ninos + 1;
      }
      
      return $actualizar;
    }

    // Si el alumno SI firma consentimiento
    if($sexo == 1){

      $actualizar['ninas'] = $grupo->ninas + 1;
      $actualizar['peso_bajo_ninas'] = ($imc > 0 && $imc <= 14.3) ? $grupo->peso_bajo_ninas + 1 : $grupo->peso_bajo_ninas;
      $actualizar['peso_normal_ninas'] = ($imc >= 14.4 && $imc <= 20.8) ? $grupo->peso_normal_ninas + 1 : $grupo->peso_normal_ninas;
      $actualizar['sobrepeso_ninas'] = ($imc >= 20.9  && $imc <= 25.0) ? $grupo->sobrepeso_ninas + 1 : $grupo->sobrepeso_ninas;
      $actualizar['obesidad_ninas'] = ($imc >= 25.1) ? $grupo->obesidad_ninas + 1 : $grupo->obesidad_ninas; 
      $actualizar['hemo_ninas'] = ($grupo->hemo_ninas > 0) ? $grupo->hemo_ninas + 1 : $grupo->hemo_ninas;
      $actualizar['anemia_ninas'] = ($hemo > 0 && $hemo < 11.5 ) ? $grupo->anemia_ninas + 1 : $grupo->anemia_ninas;

    }
    else{

      $actualizar['ninos'] = $grupo->ninos + 1;
      $actualizar['peso_bajo_ninos'] = ($imc > 0 && $imc <= 14.3) ? $grupo->peso_bajo_ninos + 1 : $grupo->peso_bajo_ninos;
      $actualizar['peso_normal_ninos'] = ($imc >= 14.4 && $imc <= 20.8) ? $grupo->peso_normal_ninos + 1 : $grupo->peso_normal_ninos;
      $actualizar['sobrepeso_ninos'] = ($imc >= 20.9 && $imc <= 25.0) ? $grupo->sobrepeso_ninos + 1 : $grupo->sobrepeso_ninos;
      $actualizar['obesidad_ninos'] = ($imc >= 25.1) ? $grupo->obesidad_ninos + 1 : $grupo->obesidad_ninos;
      $actualizar['hemo_ninos'] = ($grupo->hemo_ninos > 0) ? $grupo->hemo_ninos + 1 : $grupo->hemo_ninos;
      $actualizar['anemia_ninos'] = ($hemo > 0 && $hemo < 11.5 ) ? $grupo->anemia_ninos + 1 : $grupo->anemia_ninos;

    }
    
    return $actualizar;
    
  }//end function categorizar_imc

  public function cerrar_grupo(){
    session()->set("escuela", null);
    mensaje("Grupo cerrado");
    return redirect()->to(route_to("registrar_alumnos"));
  }

  private function crear_vista($nombre_vista, $contenido = array()){
    return view($nombre_vista, $contenido);
  }//end crear_vista
}

?>