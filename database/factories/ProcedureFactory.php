<?php

namespace Database\Factories;

use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcedureFactory extends Factory
{
    protected $model = Procedure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departments = ['MRC', 'Raisebore', 'Electric', 'DMLZ', 'GBC'];
        return [
            'title' => $this->faker->sentence(5),
            'department' => $departments[rand(0,4)],
            'submitter' => $this->faker->name,
            'status' => rand(1,4),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
