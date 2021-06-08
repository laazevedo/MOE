<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vaga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'empregadorId'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true
			],
			'descricaoResumida'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'listaDeAtividades'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'habilidadesRequeridas'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'semestreRequerido'       => [
				'type'       => 'INT'
			],
			'quantidadeHoras'       => [
				'type'       => 'INT'
			],
			'remuneracao'       => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('empregadorId', 'empregadores', 'usuarioId');
		$this->forge->createTable('vagas', true);
	}

	public function down()
	{
		$this->forge->dropTable('vagas');
	}
}
