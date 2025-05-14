<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;
use App\Models\Tabla_usuarios;
use App\Models\Tabla_roles;

class Login extends BaseController{
    
  public function index(){
    return $this->crear_vista("usuario/login");
  }

  public function validar_datos(){
    $usuario = $this->request->getPost('usuario');
    $contrasena = $this->request->getPost('contrasena');
    
    $tabla_usuarios = new Tabla_usuarios;
    $usuario = $tabla_usuarios->login($usuario, hash("sha256", $contrasena));
    
    if($usuario != null){
      $session = session();
      $session->set("id_usuario", $usuario->id_usuario);
      $session->set("nombre_completo", $usuario->nombre_completo);

      // mensaje();
      return redirect()->to(route_to("modulos"));
    }//end if usuario != null
    else{
      // mensaje("");
      //mensaje
      session()->setFlashdata('error_login', 'Usuario o contraseña incorrectos');
      return redirect()->to(route_to("login"));
    }//end if else usuario != null

  }//end function validar_datos

  public function crear_vista($nombre_vista, $contenido = array()){
    return view($nombre_vista, $contenido);
  }
}


