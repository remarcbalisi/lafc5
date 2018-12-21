<?php

use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->insert([
            'user_id' => 1,
            'status_id' => 1,
        ]);

        DB::table('user_status')->insert([
            'user_id' => 2,
            'status_id' => 1,
        ]);

    }
}
