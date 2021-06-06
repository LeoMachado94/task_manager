<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'id' => 1,
            'name' => 'Português',
            'abbreviation' => 'pt-BR'
        ]);
        Language::create([
            'id' => 2,
            'name' => 'Inglês',
            'abbreviation' => 'en-US'
        ]);
        Language::create([
            'id' => 3,
            'name' => 'Espanhol',
            'abbreviation' => 'es-ES'
        ]);
    }
}
