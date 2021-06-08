<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Vaga;
use App\Models\InteresseVaga;

class EmpregadorController extends BaseController
{
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
		$empregadorId = session()->get('usuarioId');

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
		$estagiarioId = session()->get('usuarioId');
		$interesse_query = $db->table('interesseVaga')->where('estagiarioId', $estagiarioId)->get();
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

	public function cadastrarInteresse($empregadorId)
	{
		$estagiarioId = session()->get('usuarioId');
		$interesse = new InteresseVaga();
		error_log($estagiarioId);
		error_log($empregadorId);
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
		$builder = $db->table('interesseVaga');
		$estagiarioId = session()->get('usuarioId');
		$builder->delete([
			'empregadorId' => $empregadorId,
			'estagiarioId' => $estagiarioId,
		]);
		return redirect()->to('/lista/empregadores');
	}
}
