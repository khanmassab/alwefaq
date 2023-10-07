<?php

namespace Database\Factories;

use App\Models\Administrative;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrativeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Administrative::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'positions' => $this->faker->jobTitle,
            'order' => $this->faker->randomDigit
        ];
    }
}
