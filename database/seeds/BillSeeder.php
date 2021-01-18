<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            'user_id' => DB::table('users')->where('name', 'sub-admin')->first()->id,
            'name' => 'Lisa',
            'total' => 12345,
            'address' => '1235 The Room Street'
        ]);

        DB::table('bills')->insert([
            'user_id' => DB::table('users')->where('name', 'user')->first()->id,
            'name' => 'Denny',
            'total' => 123,
            'address' => '123 The Room Street'
        ]);

        DB::table('bills')->insert([
            'user_id' => DB::table('users')->where('name', 'user')->first()->id,
            'name' => 'Mark',
            'total' => 1234,
            'address' => '1234 The Room Street'
        ]);

        DB::table('bills')->insert([
            'user_id' => DB::table('users')->where('name', 'Other User')->first()->id,
            'name' => 'Tommy',
            'total' => 12345,
            'address' => '1235 The Room Street'
        ]);
    }
}
