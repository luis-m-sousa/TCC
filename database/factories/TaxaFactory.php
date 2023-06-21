<?php

namespace Database\Factories;

use App\Models\Taxa;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxaFactory extends Factory
{
    protected $model = Taxa::class;

    public function definition()
    {
        return [
            'banco' => $this->faker->company,
            'taxa' => $this->faker->randomFloat(2, 1, 10),
        ];
    }
}
