<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estagiario extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
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
		$this->forge->addForeignKey('usuarioId', 'usuarios', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('estagiarios', true);
	}

	public function down()
	{
		$this->forge->dropTable('estagiario');
	}
}
