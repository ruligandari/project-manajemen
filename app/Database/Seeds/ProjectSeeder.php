<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Project 1',
                'description' => 'Description Project 1',
                'price' => 1000000,
                'id_client' => 1,
                'id_project_manager' => 1,
                'id_team' => 1,
                'id_task' => 1,
                'status' => 'Start',
                'progress' => '0',
                'start_date' => '2024-02-10',
                'end_date' => '2024-02-10',
            ],
            [
                'name' => 'Project 2',
                'description' => 'Description Project 2',
                'price' => 2000000,
                'id_client' => 2,
                'id_project_manager' => 1,
                'id_team' => 2,
                'id_task' => 2,
                'status' => 'Start',
                'progress' => '0',
                'start_date' => '2024-02-10',
                'end_date' => '2024-02-10',
            ],
        ];

        // Using Query Builder
        $this->db->table('project')->insertBatch($data);
    }
}
