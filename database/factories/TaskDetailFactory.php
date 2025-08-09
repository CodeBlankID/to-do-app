<?php

namespace Database\Factories;

use App\Models\TaskDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskDetail>
 */
class TaskDetailFactory extends Factory
{
    protected $model = TaskDetail::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        return [
               'task_id'    => fake()->numberBetween( 1, 10 ),
                'activity'   => fake()->word(),
                'keterangan' => fake()->sentence(),
                'status'     => fake()->boolean(),
        ];
    }
}
