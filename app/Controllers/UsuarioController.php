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
		$db = \Config\Database::connect();
		$empregadorId = session()->get('usuarioId');
		$empregador = $db->table('empregadores')->where('usuarioId', $empregadorId)->get()->getFirstRow();
		$dados = [
			'nome' => $empregador->nomeEmpresa
		];
		return view('empregador-home', $dados);
	}

	public function estagiarioIndex()
	{
		$db = \Config\Database::connect();
		$estagiarioId = session()->get('usuarioId');
		$estagiario = $db->table('estagiarios')->where('usuarioId', $estagiarioId)->get()->getFirstRow();
		$dados = [
			'nome' => $estagiario->nome
		];
		return view('estagiario-home', $dados);
	}

	// Função para verificar login
	public function fazerLogin()
	{
		helper(['form']);
		$request = \Config\Services::request();
		$email = $request->getVar('email');

		$regras = [
			'email' => 'required|min_length[6]|max_length[255]|valid_email',
			'senha' => 'required|min_length[6]|max_length[255]|validarUsuario[email, senha]'
		];
		// Mensagem de erro para regra customizada validarUsuario 
		$erros = [
			'senha' =>
			[
				'validarUsuario' => 'Email e/ou senha incorretos'
			]
		];
		// Verifica se os dados informados estão incorretos
		if (!$this->validate($regras, $erros)) {
			$data['validacao'] = $this->validator;
			return view('login', $data);
		} else {
			// Encaminha para a página inicial de acordo com o tipo de usuário
			// TODO - CRIAR SESSAO AO FAZER LOGIN
			$model = new Usuario();
			$usuario = $model->where('email', $email)->first();
			$session = session();
			$session->set([
				'usuarioId' => $usuario['id']
			]);
			if ($usuario['tipo'] == 'empregador')
				return redirect()->to('/empregador');
			else
				return redirect()->to('/estagiario');
		}
	}

	public function fazerLogout()
	{
		$session = session();
		$session->destroy();
		return view('login');
	}
	// Função para verificar se dados de usuário no cadastro estão corretos
	public function verificarUsuario()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$email = $request->getVar('email');
		$senha = $request->getVar('senha');
		$tipo = $request->getVar('tipo');

		//TODO - VERIFICAR SE SENHA TEM CARACTERES ESPECIAIS
		$regras = [
			'email' => 'required|min_length[6]|max_length[255]|valid_email|is_unique[usuarios.email]',
			'senha' => 'required|min_length[6]|max_length[255]',
			'repetirSenha' => 'matches[senha]',
		];
		// Mensagens de erro customizadas
		$erros = [
			'repetirSenha' =>
			[
				'matches' => 'As senhas devem ser iguais'
			],
			'email' =>
			[
				'is_unique' => 'O email já está cadastrado'
			]
		];
		// Verifica se os dados estão incorretos
		if (!$this->validate($regras, $erros)) {
			$data['validacao'] = $this->validator;
			return view('cadastro', $data);
		} else {
			$data = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo
			];
			// De acordo com o tipo informado, continua para a próxima tela de cadastro
			if ($tipo == 'empregador')
				return view('cadastro-empregador', $data);
			else
				return view('cadastro-estagiario', $data);
		}
	}

	// Função para cadastrar Estagiário
	public function cadastrarEstagiario()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$nome = $request->getVar('nomeEstagiario');
		$curso = $request->getVar('curso');
		$minicurriculo = $request->getVar('minicurriculo');
		$anoIngresso = $request->getVar('anoIngresso');
		$semestre = $request->getVar('semestre');
		$usuarioId = $request->getVar('usuarioId');

		// Dados usuário
		$email = $request->getVar('email');
		$senha = $request->getVar('senha');
		$tipo = $request->getVar('tipo');

		// Criação de data com o ano informado
		$dataIngresso = Time::createFromDate($anoIngresso);

		$regras = [
			'nomeEstagiario' => 'required|min_length[10]|max_length[255]',
			'curso' => 'required|min_length[6]|max_length[255]',
		];
		// Mensagens de erro customizadas
		$erros = [
			'nomeEstagiario' =>
			[
				'min_length' => 'O nome deve conter no mínimo 10 caracteres'
			],
			'curso' =>
			[
				'min_length' => 'O curso deve conter no mínimo 6 caracteres'
			]
		];
		// Verifica se os dados estão incorretos
		if (!$this->validate($regras, $erros)) {
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
			// Cria um usuário no banco com o tipo estagiário
			$usuario->save($dados);
			$usuarioId = $usuario->getInsertID();

			// Salva o estagiário no banco com o usuarioId cadastrado acima
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

	// Função para cadastrar Empregador
	public function cadastrarEmpregador()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$nomeEmpresa = $request->getVar('nomeEmpresa');
		$enderecoEmpresa = $request->getVar('enderecoEmpresa');
		$nomePessoaContato = $request->getVar('nomePessoaContato');
		$descricaoEmpresa = $request->getVar('descricaoEmpresa');
		$descricaoProdutos = $request->getVar('descricaoProdutos');
		$usuarioId = $request->getVar('usuarioId');

		// Dados usuário
		$email = $request->getVar('email');
		$senha = $request->getVar('senha');
		$tipo = $request->getVar('tipo');

		$regras = [
			'nomeEmpresa' => 'required|max_length[255]',
			'enderecoEmpresa' => 'required|min_length[6]|max_length[255]',
			'nomePessoaContato' => 'required|min_length[10]|max_length[255]'
		];
		// Mensagens de erro customizadas
		$erros = [
			'enderecoEmpresa' =>
			[
				'min_length' => 'O endereço deve conter no mínimo 6 caracteres'
			],
			'nomePessoaContato' =>
			[
				'min_length' => 'O nome da pessoa de contato deve conter no mínimo 10 caracteres'
			]
		];
		// Verifica se os dados estão incorretos
		if (!$this->validate($regras, $erros)) {
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
			// Cria um usuário no banco com o tipo empregador
			$usuario = new Usuario();
			$dados = [
				'email' => $email,
				'senha' => $senha,
				'tipo' => $tipo
			];
			$usuario->save($dados);
			$usuarioId = $usuario->getInsertID();

			// Salva o empregador no banco com o usuarioId cadastrado acima
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

	// EM TESTE - Função para enviar email de confirmação
	public function enviarEmail()
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.mailtrap.io',
			'smtp_port' => 2525,
			'smtp_user' => '7c9a7499bbe6a8',
			'smtp_pass' => '09330f40a19eff',
			'crlf' => '\r\n',
			'newline' => '\r\n'
		];

		$emailUsuario = 'alyse8305@uorak.com';
		$email = \Config\Services::email();

		$email->initialize($config);
		$email->setFrom('teste@teste.com', 'MOE');
		$email->setTo($emailUsuario);

		$email->setSubject('Email Test');
		$email->setMessage('<p>Testing the email class.</p>');

		if ($email->send())
			error_log('ok');
	}
}
