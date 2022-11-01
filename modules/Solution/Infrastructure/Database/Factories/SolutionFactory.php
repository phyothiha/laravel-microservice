<?php

namespace Meraki\Solution\Infrastructure\Database\Factories;

use Meraki\Solution\Domain\Models\Solution;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(200),
            'status' => rand(0, 3),
            'user_id' => rand(31, 40),
        ];
    }
}
