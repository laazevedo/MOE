<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Confirmacaoconta extends Migration
{
	public function up()
	{
		$fields = [
			'verificacao' => [
				'type' => 'TINYINT',
				'default' => '0'
			]
		];
		$this->forge->addColumn('usuarios', $fields);
	}

	public function down()
	{
		//
	}
}
