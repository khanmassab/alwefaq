<?php

namespace Database\Factories;

use App\Models\Ashom;
use Illuminate\Database\Eloquent\Factories\Factory;

class AshomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ashom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1,1000000),
            'total_stocks' => $this->faker->numberBetween(1,1000000),
        ];
    }
}
