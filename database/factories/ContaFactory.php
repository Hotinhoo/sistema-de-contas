<?php

namespace Database\Factories;

use App\Models\Conta;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContaFactory extends Factory
{
    protected $model = Conta::class;

    public function definition()
    {

        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->paragraph,
            'valor' => $this->faker->randomFloat(2, 10, 1000),
            'data_vencimento' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['pago' , 'pendente']),
            'user_id' => User::factory()
        ];

    }

}
