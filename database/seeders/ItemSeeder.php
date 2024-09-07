<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            [
                'name' => 'nasi goreng',
                'description' => 'nasi goreng enak banget',
                'stock' => 12,
                'category_id' => 1,
            ],
            [
                'name' => 'es teh',
                'description' => 'es teh segar banget',
                'stock' => 19,
                'category_id' => 2,
            ],
           
           
        ]);
    }
}
