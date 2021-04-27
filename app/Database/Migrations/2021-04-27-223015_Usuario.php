<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
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
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE
			],
			'tipo' => [
				'type' => 'VARCHAR',
				'constraint' => '12'
			],
			'senha' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('usuario', true);
	}

	public function down()
	{
		$this->forge->dropTable('usuario');
	}
}
