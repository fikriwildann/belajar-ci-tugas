<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'product_id' => $faker->numberBetween(1, 3),
                'category_name' => $faker->randomElement(['Elektronik', 'Perabotan']),
                'deskripsi' => $faker->randomElement(['Tersedia', 'Tidak Tersedia']),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            print_r($data);
            $this->db->table('product_category')->insert($data);
        }
    }
}