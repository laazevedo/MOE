<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Vaga;
use App\Models\InteresseEmpresa;
use App\Models\InteresseVaga;

class EmpregadorController extends BaseController
{
	public function getEstagiarioId()
	{
		$db = \Config\Database::connect();
		$usuarioId = session()->get('usuarioId');
		$query = $db->table('estagiarios')->where('usuarioId', $usuarioId)->get()->getFirstRow();
		return $query->id;
	}

	public function getEmpregadorId()
	{
		$db = \Config\Database::connect();
		$usuarioId = session()->get('usuarioId');
		$query = $db->table('empregadores')->where('usuarioId', $usuarioId)->get()->getFirstRow();
		return $query->id;
	}

	public function index()
	{
		return view('cadastro-vaga');
	}

	// Função para cadastrar Vaga
	public function cadastrarVaga()
	{
		helper(['form']);
		$request = \Config\Services::request();

		$descricaoResumida = $request->getVar('descricaoResumida');
		$listaDeAtividades = $request->getVar('listaDeAtividades');
		$habilidadesRequeridas = $request->getVar('habilidadesRequeridas');
		$semestreRequerido = $request->getVar('semestreRequerido');
		$quantidadeHoras = $request->getVar('quantidadeHoras');
		$remuneracao = $request->getVar('remuneracao');
		$empregadorId = $this->getEmpregadorId();

		$regras = [
			'quantidadeHoras' => 'required|in_list[20, 30]',
		];
		// Mensagens de erro customizadas
		$erros = [
			'quantidadeHoras' =>
			[
				'in_list' => 'A quantidade de horas é de 20 ou 30 horas'
			]
		];
		// Verifica se os dados estão incorretos
		if (!$this->validate($regras, $erros)) {
			$data = [
				'descricaoResumida' => $descricaoResumida,
				'listaDeAtividades' => $listaDeAtividades,
				'habilidadesRequeridas' => $habilidadesRequeridas,
				'semestreRequerido' => $semestreRequerido,
				'quantidadeHoras' => $quantidadeHoras,
				'remuneracao' => $remuneracao,
				'validacao' => $this->validator
			];
			return view('cadastro-vaga', $data);
		} else {
			$vaga = new Vaga();
			$dados = [
				'descricaoResumida' => $descricaoResumida,
				'listaDeAtividades' => $listaDeAtividades,
				'habilidadesRequeridas' => $habilidadesRequeridas,
				'semestreRequerido' => $semestreRequerido,
				'quantidadeHoras' => $quantidadeHoras,
				'remuneracao' => $remuneracao,
				'empregadorId' => $empregadorId,
			];
			// Cria uma vaga no banco 
			$vaga->save($dados);

			return redirect()->to('/empregador');
		}
	}

	public function getEmpregadores()
	{
		$db = \Config\Database::connect();
		$empregadores_query = $db->table('empregadores')->get();
		$estagiarioId = $this->getEstagiarioId();
		$interesse_query = $db->table('interesseEmpresa')->where('estagiarioId', $estagiarioId)->get();
		$interesse = array();
		foreach ($interesse_query->getResult() as $i) {
			array_push($interesse, $i->empregadorId);
		}
		$data = [
			'empregadores' => $empregadores_query->getResult(),
			'interesse' => $interesse
		];
		return view('lista-empregadores', $data);
	}

	public function getVagas()
	{
		$db = \Config\Database::connect();
		$empregadores_query = $db->table('vagas')->get();
		$estagiarioId = $this->getEstagiarioId();
		$interesse_query = $db->table('interesseVaga')->where('estagiarioId', $estagiarioId)->get();
		$interesse = array();
		foreach ($interesse_query->getResult() as $i) {
			array_push($interesse, $i->vagaId);
		}
		$data = [
			'vagas' => $empregadores_query->getResult(),
			'interesse' => $interesse
		];
		return view('lista-vagas', $data);
	}

	public function getEstagiariosInteressados()
	{
		$db = \Config\Database::connect();
		$empregadorId = $this->getEmpregadorId();
		$builder = $db->table('interesseEmpresa');
		$builder->where('empregadorId', $empregadorId);
		$query = $builder->get();
		$estagiarios = array();
		foreach ($query->getResult() as $e) {
			$estagiario = $db->table('estagiarios')->where('id', $e->estagiarioId)->get()->getFirstRow();
			array_push($estagiarios, $estagiario);
		}
		$data = [
			'estagiarios' => $estagiarios,
		];
		return view('lista-estagiarios-interessados', $data);
	}

	public function cadastrarInteresse($empregadorId)
	{
		$db = \Config\Database::connect();

		$estagiarioId = $this->getEstagiarioId();

		$interesse = new InteresseEmpresa();

		$dados = [
			'estagiarioId' => $estagiarioId,
			'empregadorId' => $empregadorId
		];
		$interesse->save($dados);
		return redirect()->to('/lista/empregadores');
	}

	public function descadastrarInteresse($empregadorId)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('interesseEmpresa');

		$estagiarioId = $this->getEstagiarioId();

		$builder->delete([
			'empregadorId' => $empregadorId,
			'estagiarioId' => $estagiarioId,
		]);
		return redirect()->to('/lista/empregadores');
	}

	public function cadastrarInteresseVaga($vagaId)
	{
		$estagiarioId = $this->getEstagiarioId();

		$interesse = new InteresseVaga();
		$dados = [
			'estagiarioId' => $estagiarioId,
			'vagaId' => $vagaId
		];
		$interesse->save($dados);
		return redirect()->to('/lista/vagas');
	}

	public function descadastrarInteresseVaga($vagaId)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('interesseVaga');

		$estagiarioId = $this->getEstagiarioId();
		$builder->delete([
			'vagaId' => $vagaId,
			'estagiarioId' => $estagiarioId,
		]);
		return redirect()->to('/lista/vagas');
	}
}
