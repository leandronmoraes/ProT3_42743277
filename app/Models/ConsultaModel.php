<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table      = 'consultas';
    protected $primaryKey = 'id_consultas';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'fecha_envio'];

    
    protected $useTimestamps = false;

   
    protected $validationRules = [
        'nombre'  => 'required|max_length[100]',
        'email'   => 'required|valid_email|max_length[150]',
        'mensaje' => 'required',
    ];
}
