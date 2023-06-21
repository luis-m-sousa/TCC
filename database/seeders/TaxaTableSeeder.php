<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Taxa;

class TaxaTableSeeder extends Seeder
{
    public function run()
    {
        // Comando para inserir os dados
        // php artisan db:seed --class=TaxaTableSeeder
    
        $taxas = [
            ['BANCO SICOOB S.A.', 1.60],
            ['BRB - CFI S/A', 1.70],
            ['BANCO INBURSA', 1.71],
            ['BCO BRADESCO FINANC. S.A.', 1.75],
            ['FINANC ALFA S.A. CFI', 1.76],
            ['BCO COOPERATIVO SICREDI S.A.', 1.76],
            ['BCO BANESTES S.A.', 1.79],
            ['BCO CREFISA S.A.', 1.80],
            ['HS FINANCEIRA', 1.81],
            ['BANCO BARI S.A.', 1.84],
            ['PARANA BCO S.A.', 1.85],
            ['PARATI - CFI S.A.', 1.85],
            ['BCO SANTANDER (BRASIL) S.A.', 1.86],
            ['BCO AGIBANK S.A.', 1.86],
            ['BCO C6 CONSIG', 1.87],
            ['BCO BMG S.A.', 1.87],
            ['BANCO INTER', 1.88],
            ['CAIXA ECONOMICA FEDERAL', 1.88],
            ['BCO DA AMAZONIA S.A.', 1.90],
            ['BCO DO ESTADO DO RS S.A.', 1.90],
            ['BANCO PAN', 1.91],
            ['BCO BRADESCO S.A.', 1.93],
            ['FACTA S.A. CFI', 1.93],
            ['BCO DO BRASIL S.A.', 1.94],
            ['BCO DAYCOVAL S.A', 1.94],
            ['BANCO ITAÚ CONSIGNADO S.A.', 1.97],
            ['ZEMA CFI S/A', 1.98],
            ['BCO SAFRA S.A.', 1.98],
            ['ITAÚ UNIBANCO S.A.', 1.99],
            ['CREFISA S.A. CFI', 2.00],
            ['CREDIARE CFI S.A.', 2.00],
            ['BCO DO NORDESTE DO BRASIL S.A.', 2.01],
            ['BCO MERCANTIL DO BRASIL S.A.', 2.01],
            ['GAZINCRED S.A. SCFI', 2.01],
            ['BCO DO EST. DE SE S.A.', 2.07],
            ['BCO PAULISTA S.A.', 2.13],
        ];

        foreach ($taxas as $taxa) {
            DB::table('taxa')->insert([
                'banco' => $taxa[0],
                'taxa' => $taxa[1],
            ]);
        }
    }
}