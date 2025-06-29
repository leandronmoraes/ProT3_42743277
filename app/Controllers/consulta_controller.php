<?php

namespace App\Controllers;

use App\Models\ConsultaModel;

class Consulta_controller extends BaseController
{
    public function enviar()
    {
        $model = new ConsultaModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre'  => 'required|max_length[100]',
            'email'   => 'required|valid_email|max_length[150]',
            'mensaje' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()
                ->to('/contacto')
                ->withInput()
                ->with('msg', 'Por favor completa correctamente el formulario.')
                ->with('errors', $validation->getErrors());
        }

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'email'       => $this->request->getPost('email'),
            'mensaje'     => $this->request->getPost('mensaje'),
            'fecha_envio' => date('Y-m-d H:i:s'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('/contacto')->with('msg', 'Mensaje enviado correctamente. Gracias por contactarnos.');
        } else {
            return redirect()
                ->to('/contacto')
                ->withInput()
                ->with('msg', 'Hubo un problema al enviar el mensaje. Intenta nuevamente.');
        }
    }
}
