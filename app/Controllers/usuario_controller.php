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
            'confirmar' => 'required|matches[pass]',
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
            return redirect()->to('/login');
        }
    }

    /*CRUD de Usuario*/
 public function index()
{
    $session = session();
    if ($session->get('perfil_id') != 1) {
        return redirect()->to('/')->with('fail', 'Acceso no autorizado');
    }

    $model = new usuario_Model();
    $data['usuarios'] = $model->where('baja', 'NO')->findAll(); // solo activos

    $data['titulo'] = 'Listado de usuarios activos';
    $data['modo'] = 'activos'; 

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/index', $data);
    echo view('front/footer_view');
}


    public function edit($id)
    {
        $model = new usuario_Model();
        $data['usuario'] = $model->find($id);
        $data['titulo'] = 'Editar usuario';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/editar', $data);
        echo view('front/footer_view');
    }

    public function update($id)
{
    $model = new usuario_Model();

    $usuarioActual = $model->find($id);

    // Reglas de validación dinámicas para evitar duplicados en usuario y email
    $validationRules = [
        'nombre' => 'required|min_length[3]',
        'apellido' => 'required|min_length[3]',
        'usuario' => "required|min_length[3]|is_unique[usuarios.usuario,id_usuario,{$id}]",
        'email' => "required|valid_email|is_unique[usuarios.email,id_usuario,{$id}]",
        'perfil_id' => 'required|in_list[1,2]',
    ];

    if (!$this->validate($validationRules)) {
        $data = [
            'titulo' => 'Editar usuario',
            'usuario' => $usuarioActual,
            'validation' => $this->validator
        ];

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/editar', $data);
        echo view('front/footer_view');
        return;
    }

    $data = [
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email'),
        'perfil_id' => $this->request->getVar('perfil_id'),
    ];

    $model->update($id, $data);

    return redirect()->to(base_url('usuarios'))->with('success', 'Usuario actualizado correctamente');
}

    public function baja($id)
    {
        $model = new usuario_Model();
        $model->update($id, ['baja' => 'SI']);

        return redirect()->to('/usuarios')->with('success', 'Usuario dado de baja');
    }

    public function alta($id)
    {
        $model = new usuario_Model();
        $model->update($id, ['baja' => 'NO']);

        return redirect()->to('/usuarios')->with('success', 'Usuario dado de alta');
    }

   public function inactivos()
{
    $session = session();
    if ($session->get('perfil_id') != 1) {
        return redirect()->to('/')->with('fail', 'Acceso no autorizado');
    }

    $model = new usuario_Model();
    $data['usuarios'] = $model->where('baja', 'SI')->findAll(); // solo inactivos

    $data['titulo'] = 'Usuarios dados de baja';
    $data['modo'] = 'inactivos'; 

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/index', $data); 
    echo view('front/footer_view');
}

}
