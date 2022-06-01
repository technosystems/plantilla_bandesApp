<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tx_nombres' => $this->faker->name(),
            'tx_apellidos' => $this->faker->name(),
            'nb_usuario' => 'usergeneral',
            'tx_email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'nb_password' => bcrypt('password'), // password
            'nu_status' => 0, // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
