<?php

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
        DB::table('items')->insert([
            'name' => 'iPhone XX (20) Ultra Max & Knuckles',
            'price' => 1500,
            'description' => '[The word 8G several times.]',
            'aisle' => 'Electronics'
        ]);
        
        DB::table('items')->insert([
            'name' => 'Tea Bags (100 Pack)',
            'price' => 10,
            'description' => 'Excessively large pack of tea. Other options include medium (70) and small (5).',
            'aisle' => 'Drinks'
        ]);

        DB::table('items')->insert([
            'name' => 'Bread',
            'price' => 3,
            'description' => 'It\'s bread. What do you want me to say?',
            'aisle' => 'Bakery and baked goods.'
        ]);
    }
}
