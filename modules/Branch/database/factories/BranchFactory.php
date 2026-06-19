<?php

namespace Panelis\Branch\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Panelis\Branch\Models\Branch;
use Panelis\User\Models\User;

/**
 * @extends Factory<Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'name' => $name = fake()->unique()->company,
            'slug' => Str::slug($name),
            'phone' => fake()->phoneNumber,
            'email' => fake()->email,
        ];
    }
}
