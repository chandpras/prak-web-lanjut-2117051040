<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKapasitasColumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('kelas', [
            'kapasitas_kelas'  =>  [
                'type'          => 'INT',
                'constraint'    => 3,
                'null'          => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('kelas', ['kapasitas_kelas']);
    }
}
