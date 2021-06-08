<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Modules;

class InteresseVaga extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'interesseVaga';
	protected $allowedFields        = ['vagaId', 'estagiarioId'];
}
