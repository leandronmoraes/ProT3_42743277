<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class login_controller extends Controller
{
    public function index()
    {
        helper(['form', 'url']);

        $dato['titulo'] = 'Login';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }

    public function auth()
    {
        $session = session();
        $model = new usuario_Model();

        //Traemos los datos del formulario

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/login_controller');
            }
            //Verificamos los datos ingresados para iniciar, si se cumle la verificación
            //Iniciamos sesión

            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'usuario' => $data['usuario'],
                    'email' => $data['email'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                session()->setFlashdata('msg', 'Bienvenido ' . $data['nombre']);
                return redirect()->to('/panel');
            } else {
                //Si no cumple la verificación
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login_controller');
            }
        } else {
            $session->setFlashdata('msg', 'No existe el email o es incorrecto');
            return redirect()->to('/login_controller');
        }
    }
    /*Cerramos la sesión */
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
