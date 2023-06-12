<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MensParfume>
 */
class MensParfumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => mt_rand(1, 2),
            'user_id' => '2',
            'nama' => $this->faker->sentence(mt_rand(1, 2)),
            'deskripsi' => $this->faker->paragraph(),
        ];
    }
}
