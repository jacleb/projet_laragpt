<?php

namespace Database\Seeders;

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
        // Le seeder du projet est appelé ici
        $this->call(UtilisateurSeeder::class);
    }
}
