<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_team' => 1,
                'task_id' => 1,
                'activity' => 'Create Project',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_team' => 2,
                'task_id' => 1,
                'activity' => 'Create Task',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_team' => 2,
                'task_id' => 2,
                'activity' => 'Create User Story',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('activity')->insertBatch($data);
    }
}
