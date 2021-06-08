<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Modules;

class InteresseEmpresa extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'interesseEmpresa';
	protected $allowedFields        = ['empregadorId', 'estagiarioId'];
}
