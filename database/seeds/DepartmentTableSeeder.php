<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'name' => 'Information Technology',
            'slug' => 'it',
        ]);

        DB::table('department')->insert([
            'name' => 'Human Resource',
            'slug' => 'human-resource',
        ]);
    }
}
