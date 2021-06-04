<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{

    public function run()
    {
        $brands = [
            [
                'title' => 'Сибртех',
                'image' => '1.png'
            ],
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
               'title' => $brand['title'],
               'image' => $brand['image'],
            ]);
        }
    }
}
