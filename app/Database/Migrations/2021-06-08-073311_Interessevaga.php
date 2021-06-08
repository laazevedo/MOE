<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Interessevaga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'vagaId'          => [
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
		$this->forge->addForeignKey('vagaId', 'vagas', 'id');
		$this->forge->addForeignKey('estagiarioId', 'estagiarios', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('interesseVaga', true);
	}

	public function down()
	{
		$this->forge->dropTable('interesseVaga');
	}
}
