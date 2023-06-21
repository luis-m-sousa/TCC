<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Simulacao;
use App\Models\User;

class SimulacaoTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Simulacao::factory()->create([
                'user_id' => $user->id,
                'tempo' => rand(1, 12)
            ]);
        }
}
}
