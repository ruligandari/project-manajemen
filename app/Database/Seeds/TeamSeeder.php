<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Ruli Gandari',
                'email'    => 'ruligandari@gmail.com',
                'password'    => password_hash('ruligandari', PASSWORD_DEFAULT),
            ],
            [
                'name' => 'Saefillah Akbar',
                'email'    => 'saefillah.akbar@gmail.com',
                'password'    => password_hash('saefillahakbar', PASSWORD_DEFAULT),
            ],
            // name Pebi Pebriansah
            [
                'name' => 'Pebi Pebriansah',
                'email'    => 'pebipebriansah@gmail.com',
                'password'    => password_hash('pebipebriansah', PASSWORD_DEFAULT),
            ]
        ];

        // Using Query Builder
        $this->db->table('team')->insertBatch($data);
    }
}
