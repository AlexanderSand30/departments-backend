<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company,
            'parent_id' => null,
            'level' => $this->faker->numberBetween(1, 10),
            'employee_count' => $this->faker->numberBetween(1, 10),
            'ambassador_name' => $this->faker->optional()->name,
        ];
    }

    public function withParent($parent_id)
    {
        return $this->state([
            'parent_id' => $parent_id,
        ]);
    }
}
