<?php

namespace Meraki\Ticket\Infrastructure\Database\Factories;

use Meraki\Ticket\Domain\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(),
            'description' => $this->faker->text(200),
            'type' => rand(1, 5),
            'status' => rand(1, 6),
            'priority' => rand(1, 4),
            'customer_id' => rand(1, 30),
            'agent_id' => rand(31, 40),
        ];
    }
}
