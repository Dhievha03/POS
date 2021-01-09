<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@kasir.com',
            'password' => bcrypt('12345678'),
        ]);

        $kasir->assignRole('kasir');

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('12345678'),
        ]);

        $manager->assignRole('manager');
    }
}
