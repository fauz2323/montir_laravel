<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        $admin->assignRole('admin');
        
        $user = User::create([
            'name' => 'user',
            'email' => 'user@admin.com',
            'password' => bcrypt('user')
        ]);
        $user->assignRole('user');
    }
}
