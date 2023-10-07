<?php

namespace Database\Factories;

use App\Models\Sadakat;
use Illuminate\Database\Eloquent\Factories\Factory;

class SadakatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sadakat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1,1000000)
        ];
    }
}
