<?php

namespace App\Validation;

use App\Models\Usuario;

class RegraUsuario
{
	public function validarUsuario(string $str, string $fields, array $data): bool
	{
		$model = new Usuario();
		$usuario = $model->where('email', $data['email'])->first();

		if (!$usuario)
			return false;

		return password_verify($data['senha'], $usuario['senha']);
	}
}
