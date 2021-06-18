<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserInitialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adm = User::create([
            'name' => 'Thales Meachado',
            'email' => 'thalesmmengue@gmail.com',
            'password' => bcrypt('Thales99'),
            'level_access' => 99,
        ]);
        $user1 = User::create([
            'name' => 'Silvana Guimarães',
            'email' => 'guimaraes_silvana@yahoo.com.br',
            'password' => bcrypt('Senha12345'),
            'level_access' => 98,
        ]);
        $user1->address()->create();

        $user2 = User::create([
            'name' => 'Monica Matos',
            'email' => 'monicamatosbarbaosa@gmail.com',
            'password' => bcrypt('Senha12345'),
            'level_access' => 98,
        ]);
        $user2->address()->create();
    }
}
