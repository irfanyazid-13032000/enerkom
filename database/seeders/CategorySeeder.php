<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'name' => 'Food',
                'description' => 'you can eat that',
            ],
            [
                'name' => 'Drink',
                'description' => 'you can drink that',
            ],
           
        ]);
    }
}
