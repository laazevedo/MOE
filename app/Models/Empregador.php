<?php

namespace App\Models;

use CodeIgniter\Model;

class Empregador extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'empregadores';
	protected $allowedFields = ['usuarioId', 'nomeEmpresa', 'enderecoEmpresa', 'nomePessoaContato', 'descricaoEmpresa', 'descricaoProdutos'];
}
