<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Remarc',
            'mname' => 'Espinosa',
            'lname' => 'Balisi',
            'email' => 'remarc.balisi@gmail.com',
            'b_day' => date("Y-m-d"),
            'gender_id' => 1,
            'date_hired' => date("Y-m-d"),
            'employee_id' => '123-remarc',
            'department_id' => 1,
            'username' => 'remarcbalisi',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'fname' => 'Julven Rey',
            'mname' => 'Gumisad',
            'lname' => 'Condor',
            'email' => 'julven_conder@yahoo.com',
            'b_day' => date("Y-m-d"),
            'gender_id' => 1,
            'date_hired' => date("Y-m-d"),
            'employee_id' => '123-julven',
            'department_id' => 1,
            'username' => 'julvencondor',
            'password' => bcrypt('admin'),
        ]);

    }
}
