<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Interesseempresa extends Migration
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
			'estagiarioId'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('empregadorId', 'empregadores', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('estagiarioId', 'estagiarios', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('interesseEmpresa', true);
	}

	public function down()
	{
		$this->forge->dropTable('interesseEmpresa');
	}
}
