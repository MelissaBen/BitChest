<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CurrencyRate;
use Carbon\Carbon;

use Carbon\CarbonPeriod;
class CurrenciesRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstDayThisMonth = date('01-m-Y');
      
        $lastDayThisMonth = date("t-m-Y");
        $period = CarbonPeriod::between($firstDayThisMonth, $lastDayThisMonth);

        foreach ($period as $date) {
            $days[] = $date->format('d-m-Y');
        }
        
        foreach($days as $day){
            for($i = 1; $i<11 ; $i++){
                $currencyRate = new CurrencyRate([
                    'price' => rand(1000,1200),
                    'id_cryptocurrency' => $i,
                    'created_at' => $day
                    
                ]);
                $currencyRate->timestamps = false;
                $currencyRate->save();
            }
        }
    }
}
