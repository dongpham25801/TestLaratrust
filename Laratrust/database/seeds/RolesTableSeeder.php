<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $manager = Role::create([
            'name' => 'sp_admin',
            'display_name' => 'Manager',
            'description' => 'User Management',
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator',
            'description' => 'User is allowed to manage and edit other users',
        ]);
    }
}
