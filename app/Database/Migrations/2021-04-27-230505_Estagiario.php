<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estagiario extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'usuarioId'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true
			],
			'nome'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'curso'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'anoIngresso'       => [
				'type'       => 'DATETIME'
			],
			'minicurriculo'       => [
				'type'       => 'TEXT'
			],
			'semestre'       => [
				'type'       => 'INT',
				'constraint' => 2
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('usuarioId', 'usuario', 'id');
		$this->forge->createTable('estagiario', true);
	}

	public function down()
	{
		$this->forge->dropTable('estagiario');
	}
}
