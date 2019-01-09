<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('role')->insert([
            'name' => 'HR Manager',
            'slug' => 'hr-manager',
        ]);

        DB::table('role')->insert([
            'name' => 'Team Leader',
            'slug' => 'team-leader',
        ]);

        DB::table('role')->insert([
            'name' => 'Agent',
            'slug' => 'agent',
        ]);
    }
}
