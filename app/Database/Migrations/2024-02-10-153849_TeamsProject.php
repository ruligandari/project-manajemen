<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TeamsProject extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_teams_project' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_project' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_team' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->addKey('id_teams_project', true);
        $this->forge->createTable('teams_project');
    }

    public function down()
    {
        $this->forge->dropTable('teams_project');
    }
}
