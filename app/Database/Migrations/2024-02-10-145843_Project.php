<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Project extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_project' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            // harga
            'price' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            // id client
            'id_client' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            // id_project_manager
            'id_project_manager' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            // id team
            'id_team' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            // id_task
            'id_task' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'start_date' => [
                'type' => 'DATE',
            ],
            'end_date' => [
                'type' => 'DATE',
            ],
            // status
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Start', 'On Progress', 'Completed', 'Canceled', 'Pending', 'On Hold', 'In Review'],
                'default' => 'Start',
            ],
            // PROGRESS
            'progress' => [
                'type' => 'INT',
                'constraint' => 3,
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
        $this->forge->addKey('id_project', true);
        $this->forge->createTable('project');
    }

    public function down()
    {
        $this->forge->dropTable('project');
    }
}
