<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Modulos extends BaseController
{
    public function index()
    {
        // Verifica que el usuario esté logueado
        if (!session()->has('id_usuario')) {
            return redirect()->to('/login');
        }

        // Obtener datos de sesión
        $rol = session('rol_actual');
        $modulos_permitidos = [];

        // Si es TI, muestra todos los módulos disponibles
        if ($rol === 'TI') {
            $modulos_permitidos = ['1'];
        } else {
            // Si no, se extraen los módulos desde la sesión (cadena tipo "1,2")
            $modulos_permitidos = explode(',', session('modulos') ?? '');
        }

        return view('modulos/index', [
            'modulos' => $modulos_permitidos,
            'rol' => $rol
        ]);
    }
}
