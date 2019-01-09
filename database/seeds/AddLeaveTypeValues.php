<?php

use Illuminate\Database\Seeder;

class AddLeaveTypeValues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_type')->insert([
        	'name'=>'Sick Leave',
        	'slug'=>'sick-leave',
        ]);
        DB::table('leave_type')->insert([
        	'name'=>'Vacation Leave',
        	'slug'=>'vacation-leave',
        ]);
        DB::table('leave_type')->insert([
        	'name'=>'Paternity Leave',
        	'slug'=>'paternity-leave',
        ]);
        DB::table('leave_type')->insert([
        	'name'=>'Without Pay Leave',
        	'slug'=>'without-pay-leave',
        ]);

    }
}
