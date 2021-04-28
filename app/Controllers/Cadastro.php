<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuario;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;

class Cadastro extends Controller
{

	public function index()
	{
		return view('cadastro');
	}

	public function cadastrarUsuario()
	{
		$request = \Config\Services::request();

		$email = $request->getVar('email');
		$senha = $request->getVar("senha");
		$repetirSenha = $request->getVar("repetirSenha");
		$tipo = $request->getVar("tipo");

		//TODO - VERIFICAR SE SENHA TEM CARACTERES ESPECIAIS
		$regras = [
			'email' => 'required|min_length[6]|max_length[255]|valid_email|is_unique[usuarios.email]',
			'senha' => 'required|min_length[6]|max_length[255]',
			'repetirSenha' => 'matches[senha]',
		];
		//TODO - PROCURAR COMO TRADUZIR MENSAGEM DE ERRO
		if (!$this->validate($regras)) {
			$data['validacao'] = $this->validator;
			return view('cadastro', $data);
		} else {
			$model = new Usuario();
			$dados = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo
			];
			//TODO - PEGAR ID DE VOLTA PARA PRÓXIMA ETAPA
			$model->save($dados);
			//TODO - REDIRECIONAR DE ACORDO COM O TIPO
			return redirect()->to('/');
		}
	}
}
