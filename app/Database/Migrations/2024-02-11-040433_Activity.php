<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Activity extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_team' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'task_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'activity' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('activity');
    }

    public function down()
    {
        $this->forge->dropTable('activity');
    }
}
