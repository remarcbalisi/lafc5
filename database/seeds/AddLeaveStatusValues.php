<?php

use Illuminate\Database\Seeder;

class AddLeaveStatusValues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	 DB::table('leave_status')->insert([
       	 	'name'=>'Approved',
       	 	'slug'=>'aprroved'
       	 ]);
       	 DB::table('leave_status')->insert([
       	 	'name'=>'Denied',
       	 	'slug'=>'denied'
       	 ]);
       	 DB::table('leave_status')->insert([
       	 	'name'=>'Pending',
       	 	'slug'=>'pending'
       	 ]);
    }
}
