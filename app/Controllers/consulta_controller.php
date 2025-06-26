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

            // Validaciones
            $rules = [
                'nombre' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'mensaje' => 'required|min_length[5]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->to('/contacto')->withInput()->with('msg', '❌ Verificá los datos ingresados.');
            }

            // Datos a guardar (sin fecha_envio)
            $data = [
                'nombre'  => $this->request->getPost('nombre'),
                'email'   => $this->request->getPost('email'),
                'mensaje' => $this->request->getPost('mensaje'),
            ];

            $model = new consulta_Model();

            if (! $model->save($data)) {
                return redirect()->to('/contacto')->withInput()->with('msg', '❌ Error al guardar en la base de datos.');
            }

            return redirect()->to('/contacto')->with('msg', '✅ ¡Mensaje enviado con éxito!');
        }

        return redirect()->to('/contacto');
    }
}
