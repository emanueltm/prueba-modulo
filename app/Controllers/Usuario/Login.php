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
      $tabla_roles = new Tabla_roles();
      $roles = $tabla_roles->roles_de($usuario->id_usuario);
      $session->set("rol_actual", $roles[0]);
      $session->set("roles", $roles);//quitar el rol que se pone por default en esta lista

      // mensaje();
      return redirect()->to(route_to("dashboard"));
    }//end if usuario != null
    else{
      // mensaje("");
      //mensaje
      session()->setFlashdata('error_login', 'Usuario o contraseña incorrectos, vuelve a intentarlo o comunicate con el area de TI');
      return redirect()->to(route_to("login"));
    }//end if else usuario != null

  }//end function validar_datos

  public function crear_vista($nombre_vista, $contenido = array()){
    return view($nombre_vista, $contenido);
  }
}
