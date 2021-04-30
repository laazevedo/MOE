<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Modules;

class Estagiario extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'estagiarios';
	protected $allowedFields        = ['nome', 'anoIngresso', 'minicurriculo', 'curso', 'semestre', 'usuarioId'];
}
