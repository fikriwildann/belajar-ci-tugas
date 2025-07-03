<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $startDate = new \DateTime();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'tanggal' => $startDate->format("Y-m-d"),
                'nominal' => $faker->randomElement([100000, 200000, 300000]),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            print_r($data);
            $this->db->table('diskon')->insert($data);
            $startDate->modify('+1 day');
        }
    }
}