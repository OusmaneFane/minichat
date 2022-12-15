<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name' => "Test$i",
                "email" => "test$i@test.com",
                "password" => bcrypt('0000')
            ]);
        }

    }
}
