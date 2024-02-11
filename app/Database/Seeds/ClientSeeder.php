<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Surya Santosa Budi',
                'email' => 'suryasantosabudi@gmail.com',
                'phone' => '08777777777',
                'password' => password_hash('suryasantosabudi', PASSWORD_DEFAULT),
                'address' => 'Ciawi',
            ],
            // name Arya Arga Dinata
            [
                'name' => 'Arya Arga Dinata',
                'email' => 'aryaargadinata@gmail.com',
                'phone' => '0866666666666',
                'password' => password_hash('aryaargadinata', PASSWORD_DEFAULT),
                'address' => 'pasawahan',
            ]
        ];

        // Using Query Builder
        $this->db->table('client')->insertBatch($data);
    }
}
