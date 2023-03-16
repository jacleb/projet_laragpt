<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Génère un nombre aléatoire pour l'id de image selon le nombre d'images disponible sur 'https://pravatar.cc/' (70)
        $nombre = rand(1, 70);

        return [
            'nom' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => "https://i.pravatar.cc/125?img=" . $nombre,
            'remember_token' => Str::random(10),
        ];
    }
}
