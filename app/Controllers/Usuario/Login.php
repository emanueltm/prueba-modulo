<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;
use App\Models\Tabla_usuarios;
use App\Models\Tabla_roles;

class Login extends BaseController{
    
  public function index(){
    if (session()->has('id_usuario')) {
      return redirect()->to('modulos');
    }
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

// Obtener todos los módulos con sus roles asignados al usuario
$modulos = $tabla_roles->modulos_con_roles($usuario->id_usuario);

// Organizar la información como [id_modulo => [modulo => nombre, roles => [rol1, rol2...]]]
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

// Guardar en la sesión
$session->set("modulos", $estructura);

// Guardar el primer rol del primer módulo como "rol_actual"
$primer_modulo = reset($estructura);
$primer_rol = reset($primer_modulo['roles']);
$session->set("rol_actual", $primer_rol);
      
      $usuario->modulos = '1'; //módulo 1
      $session->set("modulos", $usuario->modulos); // ← módulos permitidos desde BD
      echo session()->get('modulos');

      // mensaje();
      return redirect()->to(route_to("modulos"));
    }//end if usuario != null
    else{
      // mensaje("");
      //mensaje
      session()->setFlashdata('error_login', 'Usuario o contraseña incorrectos, vuelve a intentarlo o comunicate con el area de TI');
      return redirect()->to(route_to("login"));
    }//end if else usuario != null

  }//end function validar_datos

  public function logout(){
    // Destruye todos los datos de la sesión activa
    session()->destroy();

    // Redirige al login
    return redirect()->to('/login');
  }//end function
  
  public function crear_vista($nombre_vista, $contenido = array()){
    return view($nombre_vista, $contenido);
  }
}
