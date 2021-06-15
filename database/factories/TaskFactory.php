<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reporter_id' => $this->faker->randomElement([1,2,3,4]),
            'user_id' => $this->faker->randomElement([3,4,5,6]),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text(1000),
            'date' => $this->faker->dateTime,
            'status' => $this->faker->randomElement([1,2,3])
        ];
    }
}
