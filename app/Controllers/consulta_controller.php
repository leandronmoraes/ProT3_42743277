<?php

namespace App\Controllers;

use App\Models\consulta_Model;
use CodeIgniter\Controller;

class consulta_controller extends Controller
{
    public function enviar()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {

            // Validación primero
            if (! $this->validate([
                'nombre' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'mensaje' => 'required|min_length[5]'
            ])) {
                return redirect()->back()->withInput()->with('msg', 'Error: Verificá los datos ingresados.');
            }

            // Guardar después de validar
            $data = [
                'nombre'  => $this->request->getPost('nombre'),
                'email'   => $this->request->getPost('email'),
                'mensaje' => $this->request->getPost('mensaje'),
                'fecha_envio' => date('Y-m-d H:i:s')
            ];

            $model = new consulta_Model();
            $model->save($data);

            return redirect()->to('/contacto')->with('msg', '¡Mensaje enviado con éxito!');
        }
    }
}
