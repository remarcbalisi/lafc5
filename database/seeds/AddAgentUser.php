<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;	
use App\User;
class AddAgentUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idnum = 1000;
    	$faker = Faker::create();
    	foreach (range(1,50) as $index){
    		$let = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 3)), 0, 3);
    		DB::table('users')->insert([
    			'fname' => $faker->firstname,
    			'mname' => $faker->lastname,
    			'lname' => $faker->lastname,
    			'b_day' => date('Y-m-d'),
    			'date_hired' => date('Y-m-d'),
    			'employee_id' => $let.'-'.$idnum++,
    			'username' => 'acc'.$idnum,
    			'email' => $faker->unique()->email,
    			'password' => bcrypt('12345'),
    			'gender_id' => 1,
    			'department_id' => 1
    		]);
    	$latest_id = User::all()->last()->id;

    		DB::table('contact')->insert([
    			'number' => $faker->tollFreePhoneNumber,
    			'contact_type_id' => 1,
    			'user_id' => $latest_id,
    			'country_code' => '+63'

    		]);

    		DB::table('address')->insert([
    			'street' => $faker->streetName,
    			'unit_no' => $faker->buildingNumber,
    			'barangay' => $faker->cityPrefix,
    			'city' => $faker->city,
    			'province' => $faker->state,
    			'postal_code' => $faker->postcode,
    			'address_type_id' => 1,
    			'user_id' => $latest_id
    		]);

    		DB::table('user_role')->insert([
    			'user_id'=>$latest_id,
    			'role_id'=>4
    		]);

    		DB::table('user_status')->insert([
    			'user_id' => $latest_id,
    			'status_id' => rand(1,3)
    		]);
    	}
    }
}
