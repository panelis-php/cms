<?php

namespace Panelis\Module\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Panelis\Module\Models\Module;

/**
 * @extends Factory<Module>
 */
class ModuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'is_enabled' => $this->faker->boolean(),
        ];
    }
}
