<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user1 = User::create([
            'name' => 'Leonardo Machado',
            'email' => 'leo94.machado@gmail.com',
            'password' => bcrypt('Leo12345'),
            'level_access' => 99,
        ]);
        $user1->address()->create();

        $user2 = User::create([
            'name' => 'Admin Tm',
            'email' => 'admin@taskmanager.com',
            'password' => bcrypt('Admin12345'),
            'level_access' => 99,
        ]);
        $user2->address()->create();

        $user3 = User::create([
            'name' => 'Adm Tm 1',
            'email' => 'adm1@taskmanager.com',
            'password' => bcrypt('Adm12345'),
            'level_access' => 98,
        ]);
        $user3->address()->create();

        $user4 = User::create([
            'name' => 'Adm Tm 2',
            'email' => 'adm2@taskmanager.com',
            'password' => bcrypt('Adm12345'),
            'level_access' => 98,
        ]);
        $user4->address()->create();

        $user5 = User::create([
            'name' => 'User Tm',
            'email' => 'user@taskmanager.com',
            'password' => bcrypt('User12345'),
            'level_access' => 1,
        ]);
        $user5->address()->create();

        $user6 = User::create([
            'name' => 'User Tm',
            'email' => 'user2@taskmanager.com',
            'password' => bcrypt('User12345'),
            'level_access' => 1,
        ]);
        $user6->address()->create();
    }
}
