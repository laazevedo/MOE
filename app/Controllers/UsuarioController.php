<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Estagiario;
use App\Models\Usuario;
use App\Models\Empregador;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\IncomingRequest;

class UsuarioController extends Controller
{

	public function index()
	{
		return view('cadastro');
	}

	public function empregadorIndex()
	{
		return view('empregador-home');
	}

	public function estagiarioIndex()
	{
		return view('estagiario-home');
	}

	public function fazerLogin()
	{
		helper(['form']);
		$request = \Config\Services::request();
		$email = $request->getVar('email');

		$regras = [
			'email' => 'required|min_length[6]|max_length[255]|valid_email',
			'senha' => 'required|min_length[6]|max_length[255]|validarUsuario[email, senha]'
		];
		$erros = [
			'senha' =>
			[
				'validarUsuario' => 'Email e/ou senha incorretos'
			]
		];
		if (!$this->validate($regras, $erros)) {
			$data['validacao'] = $this->validator;
			return view('login', $data);
		} else {
			$model = new Usuario();
			$usuario = $model->where('email', $email)->first();
			if ($usuario['tipo'] == 'empregador')
				return redirect()->to('/empregador');
			else
				return redirect()->to('/estagiario');
		}
	}

	public function cadastrarUsuario()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$email = $request->getVar('email');
		$senha = $request->getVar("senha");
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
			$data = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo
			];

			if ($tipo == 'empregador')
				return view('cadastro-empregador', $data);
			else
				return view('cadastro-estagiario', $data);
		}
	}

	public function cadastrarEstagiario()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$nome = $request->getVar('nomeEstagiario');
		$curso = $request->getVar("curso");
		$minicurriculo = $request->getVar("minicurriculo");
		$anoIngresso = $request->getVar("anoIngresso");
		$semestre = $request->getVar("semestre");
		$usuarioId = $request->getVar("usuarioId");

		// Dados usuário
		$email = $request->getVar('email');
		$senha = $request->getVar("senha");
		$tipo = $request->getVar("tipo");

		$dataIngresso = Time::createFromDate($anoIngresso);

		$regras = [
			'nomeEstagiario' => 'required|min_length[10]|max_length[255]',
			'curso' => 'required|min_length[6]|max_length[255]',
		];
		//TODO - PROCURAR COMO TRADUZIR MENSAGEM DE ERRO
		if (!$this->validate($regras)) {
			$data = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo,
				'nome' => $nome,
				'curso' => $curso,
				'minicurriculo' => $minicurriculo,
				'anoIngresso' => $dataIngresso,
				'semestre' => $semestre,
				'validacao' => $this->validator
			];
			return view('cadastro-estagiario', $data);
		} else {
			$usuario = new Usuario();
			$dados = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo
			];
			$usuario->save($dados);
			$usuarioId = $usuario->getInsertID();

			$estagiario = new Estagiario();
			$dados = [
				'nome' => $nome,
				'curso' => $curso,
				'minicurriculo' => $minicurriculo,
				'anoIngresso' => $dataIngresso,
				'semestre' => $semestre,
				'usuarioId' => $usuarioId
			];
			$estagiario->save($dados);

			return redirect()->to('/');
		}
	}


	public function cadastrarEmpregador()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$nomeEmpresa = $request->getVar('nomeEmpresa');
		$enderecoEmpresa = $request->getVar("enderecoEmpresa");
		$nomePessoaContato = $request->getVar("nomePessoaContato");
		$descricaoEmpresa = $request->getVar("descricaoEmpresa");
		$descricaoProdutos = $request->getVar("descricaoProdutos");
		$usuarioId = $request->getVar("usuarioId");

		// Dados usuário
		$email = $request->getVar('email');
		$senha = $request->getVar("senha");
		$tipo = $request->getVar("tipo");

		$regras = [
			'nomeEmpresa' => 'required|max_length[255]',
			'enderecoEmpresa' => 'required|min_length[6]|max_length[255]',
			'nomePessoaContato' => 'required|min_length[6]|max_length[255]'
		];
		//TODO - PROCURAR COMO TRADUZIR MENSAGEM DE ERRO
		if (!$this->validate($regras)) {
			$data = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo,
				'nomeEmpresa' => $nomeEmpresa,
				'enderecoEmpresa' => $enderecoEmpresa,
				'nomePessoaContato' => $nomePessoaContato,
				'descricaoEmpresa' => $descricaoEmpresa,
				'descricaoProdutos' => $descricaoProdutos,
				'validacao' => $this->validator
			];
			return view('cadastro-empregador', $data);
		} else {
			$usuario = new Usuario();
			$dados = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo
			];
			$usuario->save($dados);
			$usuarioId = $usuario->getInsertID();

			$empregador = new Empregador();
			$dados = [
				'nomeEmpresa' => $nomeEmpresa,
				'enderecoEmpresa' => $enderecoEmpresa,
				'nomePessoaContato' => $nomePessoaContato,
				'descricaoEmpresa' => $descricaoEmpresa,
				'descricaoProdutos' => $descricaoProdutos,
				'usuarioId' => $usuarioId
			];
			$empregador->save($dados);

			return redirect()->to('/');
		}
	}

	public function enviarEmail()
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.mailtrap.io',
			'smtp_port' => 2525,
			'smtp_user' => '7c9a7499bbe6a8',
			'smtp_pass' => '09330f40a19eff',
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];

		$emailUsuario = 'alyse8305@uorak.com';
		$email = \Config\Services::email();

		$email->initialize($config);
		$email->setFrom('teste@teste.com', 'MOE');
		$email->setTo($emailUsuario);

		$email->setSubject('Email Test');
		$email->setMessage('<p>Testing the email class.</p>');

		if ($email->send())
			error_log("ok");
	}
}
