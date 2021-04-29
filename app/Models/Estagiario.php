<?php

namespace App\Models;

use CodeIgniter\Model;

class Estagiario extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'estagiarios';
	protected $allowedFields        = ['nome', 'anoIngresso', 'minicurriculo', 'curso', 'semestre', 'usuarioId'];
}
