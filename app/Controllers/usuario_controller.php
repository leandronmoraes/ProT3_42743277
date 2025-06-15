<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_controller extends Controller
{


    //Convocamos el helper (Biblioteca de código en codeIgniter)
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {

        $dato['titulo'] = 'Registro';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]',
            'email' => 'min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[10]',
            'confirmar' => 'required|min_length[3]|max_length[10]',
        ]);

        $formModel = new usuario_Model();

        if (!$input) {
            $data['titulo'] = 'Registro';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
        }
        //  Validación de contraseña confirmada 
        elseif ($this->request->getVar('pass') !== $this->request->getVar('confirmar')) {
            $data['titulo'] = 'Registro';
            session()->setFlashdata('fail', 'Las contraseñas no coinciden');
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
            return;
        }
        // Guardado si todo está bien 
        else {
            $formModel->save([
                'nombre'   => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email'   => $this->request->getVar('email'),
                'pass'    => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id' => 2, // por defecto, usuario normal
                'baja' => 'NO'
            ]);

            session()->setFlashdata('success', 'Usuario registrado correctamente');
            return $this->response->redirect('/login');
        }
    }
}
