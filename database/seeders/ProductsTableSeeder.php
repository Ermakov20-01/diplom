<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++)
        DB::table('products')->insert([
           'title' => 'Product',
           'price' => rand(200, 1500),
           'in_stock' => 1,
           'description' => 'Lorem Ipsum - это текст',
            'category_id' => 1,
        ]);
    }
}
