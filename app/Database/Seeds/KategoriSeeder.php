<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            $nama = $faker->unique()->word;
            $data = [
                'nama_kategori' => ucfirst($nama),
                'slug'          => url_title($nama, '-', true),
                'status'        => $faker->randomElement(['Aktif', 'Non-Aktif']),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ];
            $this->db->table('kategori')->insert($data);
        }
    }
}
