<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name' => 'Active',
            'slug' => 'active',
        ]);

        DB::table('status')->insert([
            'name' => 'Inactive',
            'slug' => 'inactive',
        ]);

        DB::table('status')->insert([
            'name' => 'Suspended',
            'slug' => 'suspended',
        ]);

        DB::table('status')->insert([
            'name' => 'Pending',
            'slug' => 'pending',
        ]);

    }
}
