<?php

namespace Database\Factories;

use App\Models\Simulacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimulacaoFactory extends Factory
{
    protected $model = Simulacao::class;

    public function definition()
    {
        return [
            /*
            'valor_total' => $this->faker->randomFloat(2, 1000, 10000),
            'taxa' => $this->faker->randomFloat(2, 1, 10),
            'parcela' => $this->faker->randomNumber(3),
            'user_id' => $this->faker->randomNumber(1, 5)   
            */
        ];
    }
}
