<?php

namespace Database\Factories;

use App\Models\Court;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['PARTIDO', 'SNP', 'FAP', 'MONITOR', 'OTRO']),
            'state' => $this->faker->randomElement(['RESERVADO', 'ALQUILADO', 'FIN']),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'court_id' => Court::factory(),
            'user_id' => User::factory(),
        ];
    }
}

