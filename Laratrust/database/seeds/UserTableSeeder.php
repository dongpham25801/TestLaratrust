<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $spAdmin = User::create([
            'name' => 'Manager',
            'email' => 'manager@ad.com',
            'password' => bcrypt('password')
        ]);

        $admin = User::create([
            'name' => 'Admin1',
            'email' => 'admin01@ad.com',
            'password' => bcrypt('admin')
        ]);

        $spAdmin->attachRole('sp_admin');
        $admin->attachRole('admin');

//        DB::table('admin')->insert($spAdmin);

    }
}
