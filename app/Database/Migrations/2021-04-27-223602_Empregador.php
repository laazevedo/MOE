<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empregador extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'usuarioId'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true
			],
			'nomeEmpresa'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'enderecoEmpresa'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'nomePessoaContato'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255'
			],
			'descricaoEmpresa'       => [
				'type'       => 'TEXT'
			],
			'descricaoProdutos'       => [
				'type'       => 'TEXT'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('usuarioId', 'usuario', 'id');
		$this->forge->createTable('empregador', true);
	}

	public function down()
	{
		$this->forge->dropTable('empregador');
	}
}
