<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;

class Dashboard extends BaseController{

  public function index(){
    return $this->crear_vista('usuario/dashboard');
  }//end funciotn index

  public function cargar_datos(){

  }//end function cargar datos

  public function crear_vista($nombre_vista, $contenido = array()){
    return view($nombre_vista, $contenido);
  }//end function crear vista
}
