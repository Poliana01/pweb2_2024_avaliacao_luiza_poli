<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Musica;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{

    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomeplay' => fake()->name(),
            'musica_1_id' => (Musica::inRandomOrder()->first())->id,
            'musica_2_id' => (Musica::inRandomOrder()->first())->id,
            'musica_3_id' => (Musica::inRandomOrder()->first())->id,
            'musica_4_id' => (Musica::inRandomOrder()->first())->id,
            'musica_5_id' => (Musica::inRandomOrder()->first())->id,
            'musica_6_id' => (Musica::inRandomOrder()->first())->id,
            'musica_7_id' => (Musica::inRandomOrder()->first())->id,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
