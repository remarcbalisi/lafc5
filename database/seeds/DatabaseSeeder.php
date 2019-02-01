<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(ContactTypeTableSeeder::class);
        $this->call(AddressTypeTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(AdminAddInfo::class);
        $this->call(AddLeaveStatusValues::class);
        $this->call(AddAgentUser::class);
        $this->call(AddLeaveTypeValues::class);
//        $this->call(AddTeamLeaderUser::class);
    }
}
