<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'usuarios';
	protected $allowedFields        = ['email', 'senha', 'tipo'];

	protected $beforeInsert         = ['beforeInsert'];
	protected $afterInsert          = [];
	protected $beforeUpdate         = ['beforeUpdate'];
	protected $afterUpdate          = [];

	protected function beforeInsert(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function beforeUpdate(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data)
	{
		if (isset($data['data']['senha']))
			$data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
		return $data;
	}
}
