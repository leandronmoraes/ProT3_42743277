<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class Panel_controller extends Controller
{

    public function index()
    {
        $session = session();
        $perfil = $session->get('perfil_id');

        $dato['titulo'] = 'Panel de usuario';

        echo view('front/head_view', $dato);
        echo view('front/navbar_view');

        // Mostrar vista según perfil
        if ($perfil == 1) {
            // Administrador
            echo view('back/usuario/usuario_logueado');
            echo view('back/admin/panel');
        } else {
            // Usuario normal (cliente)

            echo view('back/usuario/usuario_logueado');
            echo view('back/usuario/panel_cliente');
        }

        echo view('front/footer_view');
    }

    public function publicaciones()
    {
        $data['titulo'] = 'Mis publicaciones';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/mis_publicaciones');
        echo view('front/footer_view');
    }

    public function perfil()
    {
        $data['titulo'] = 'Mi perfil';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/mi_perfil');
        echo view('front/footer_view');
    }

    public function soporte()
    {
        $data['titulo'] = 'Soporte';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/soporte');
        echo view('front/footer_view');
    }

    public function reportes()
    {
        echo view('front/head_view', ['titulo' => 'Reportes']);
        echo view('front/navbar_view');
        echo view('back/admin/reportes');
        echo view('front/footer_view');
    }

    public function configuracion()
    {
        echo view('front/head_view', ['titulo' => 'Configuración']);
        echo view('front/navbar_view');
        echo view('back/admin/configuracion');
        echo view('front/footer_view');
    }
}
