<?php

namespace App\Models;
use CodeIgniter\Model;

class consulta_Model extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consultas';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'fecha_envio'];
    public $timestamps = false;
}
