<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeamsProjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_project' => 1,
                'id_team' => 1,
            ],
            [
                'id_project' => 1,
                'id_team' => 2,
            ],
            [
                'id_project' => 2,
                'id_team' => 1,
            ],
            [
                'id_project' => 2,
                'id_team' => 2,
            ],
            [
                'id_project' => 2,
                'id_team' => 3,
            ],

        ];

        // Using Query Builder
        $this->db->table('teams_project')->insertBatch($data);
    }
}
