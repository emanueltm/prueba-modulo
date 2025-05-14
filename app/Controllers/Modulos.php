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

        // Obtener estructura de módulos con roles desde la sesión
        $estructura = session('modulos');

        // Si no hay estructura (algo falló)
        if (!$estructura || !is_array($estructura)) {
            return redirect()->to('/login');
        }

        return view('modulos/index', [
            'modulos' => $estructura
        ]);
    }
}

