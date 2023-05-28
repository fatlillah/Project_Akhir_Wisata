<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'user',
        ]);

        $admin = User::create([
            'name' => 'Dwi Fatlillah',
            'email' => 'fatlillahdwi@gmail.com',
            'password' => bcrypt('12345ila')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Olin',
            'email' => 'nurulcholilah@gmail.com',
            'password' => bcrypt('12345olin')
        ]);
        $user->assignRole('user');
    }
}
