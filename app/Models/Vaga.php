<?php

namespace App\Models;

use CodeIgniter\Model;

class Vaga extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'vagas';
	protected $allowedFields        = ['id', 'empregadorId', 'descricaoResumida', 'listaDeAtividades', 'habilidadesRequeridas', 'semestreRequerido', 'quantidadeHoras', 'remuneracao'];
	protected $afterDelete          = [];
}
