<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'nama_lengkap' => 'Administrator',
            'email' => 'admin@demo.com',
        ];

        $this->db->table('admin')->insert($data);
    }
}
