<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_project' => 1,
                'id_activity' => 1,
                'task' => 'BAB 1',
                'status' => 'done',
                'file' => 'file1.pdf',
            ],
            [
                'id_project' => 1,
                'id_activity' => 1,
                'task' => 'BAB 2',
                'status' => 'done',
                'file' => 'file1.pdf',
            ],
            [
                'id_project' => 2,
                'id_activity' => 2,
                'task' => 'Membuat desain',
                'status' => 'done',
                'file' => 'file1.pdf',
            ],
            [
                'id_project' => 2,
                'id_activity' => 2,
                'task' => 'BAB 1',
                'status' => 'done',
                'file' => 'file1.pdf',
            ],
            [
                'id_project' => 2,
                'id_activity' => 2,
                'task' => 'BAB 2',
                'status' => 'done',
                'file' => 'file1.pdf',
            ],

        ];

        // Using Query Builder
        $this->db->table('task')->insertBatch($data);
    }
}
