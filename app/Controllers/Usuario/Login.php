<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;
use App\Models\Tabla_usuarios;
use App\Models\Tabla_roles;

class Login extends BaseController{
    
  public function index(){
    if (session()->has('id_usuario')) {
      return redirect()->to('/modulos');
    }
    return $this->crear_vista("usuario/login");
  }

  public function validar_datos(){
    $usuario = $this->request->getPost('usuario');
    $contrasena = $this->request->getPost('contrasena');
    
    $tabla_usuarios = new Tabla_usuarios;
    $usuario = $tabla_usuarios->login($usuario, hash("sha256", $contrasena));
    
    if ($usuario != null) {
      $session = session();
      $session->set("id_usuario", $usuario->id_usuario);
      $session->set("nombre_completo", $usuario->nombre_completo);
  
      $tabla_roles = new \App\Models\Tabla_roles();
      $modulos = $tabla_roles->modulos_con_roles($usuario->id_usuario);
  
      // Estructura: [id_modulo => [modulo => nombre, roles => [rol1, rol2...]]]
      $estructura = [];
  
      foreach ($modulos as $fila) {
          $id_modulo = $fila['id_modulo'];
          if (!isset($estructura[$id_modulo])) {
              $estructura[$id_modulo] = [
                  'modulo' => $fila['nombre_modulo'],
                  'roles' => []
              ];
          }
          $estructura[$id_modulo]['roles'][] = $fila['nombre_rol'];
      }
  
      // Guardar estructura completa en sesión
      $session->set("modulos", $estructura);
  
      return redirect()->to(route_to("modulos"));
    }else{
      //mensaje
      session()->setFlashdata('error_login', 'Usuario o contraseña incorrectos');
      return redirect()->to(route_to("login"));
    }//end if else usuario != null

  }//end function validar_datos

  function esSuperAdmin($modulos, $nombreRol = 'Admin') {
    foreach ($modulos as $modulo) {
        if (!in_array($nombreRol, $modulo['roles'])) {
            return false; // En al menos un módulo no tiene el rol
        }
    }
    return true; // Tiene el rol SuperAdmin en todos los módulos
  }

  public function logout(){
    session()->destroy(); // Cierra sesión
    return redirect()->to('/login');
  }

  public function crear_vista($nombre_vista, $contenido = array()){
    return view($nombre_vista, $contenido);
  }
}

