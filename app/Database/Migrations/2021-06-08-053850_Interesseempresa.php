<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Interesseempresa extends Migration
{
	public function up()
	{
		$this->forge->addField([
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
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('empregadorId', 'empregadores', 'usuarioId');
		$this->forge->addForeignKey('estagiarioId', 'estagiarios', 'usuarioId');
		$this->forge->createTable('interesseVaga', true);
	}

	public function down()
	{
		//
	}
}
