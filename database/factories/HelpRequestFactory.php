<?php

namespace Database\Factories;

use App\Models\HelpRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class HelpRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HelpRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'user_id' => $this->faker->id
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phoneNumber' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,

        ];
    }
}
