<?php

use Illuminate\Database\Seeder;

class AdminAddInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('contact')->insert([
                'number' => '9675842177',
                'contact_type_id' => 1,
                'user_id' => 1,
                'country_code' => '+63'

            ]);

            DB::table('address')->insert([
                'street' => 'lahug street',
                'unit_no' => '1108',
                'barangay' => 'lahug',
                'city' => 'cebu',
                'province' => 'central visayas',
                'postal_code' => '6000',
                'address_type_id' => 1,
                'user_id' => 1
            ]);

           

            DB::table('contact')->insert([
                'number' => '910512600',
                'contact_type_id' => 1,
                'user_id' => 2,
                'country_code' => '+63'

            ]);

            DB::table('address')->insert([
                'street' => 'lahug',
                'unit_no' => '1108',
                'barangay' => 'lahug',
                'city' => 'cebu',
                'province' => 'central visayas',
                'postal_code' => '6000',
                'address_type_id' => 1,
                'user_id' => 2
            ]);

    }
}
