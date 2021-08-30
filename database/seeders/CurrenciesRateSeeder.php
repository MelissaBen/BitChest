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
        $firstDayThisMonth = date('Y-m-01');
        $lastDayThisMonth = date("Y-m-t");
        $period = CarbonPeriod::between($firstDayThisMonth, $lastDayThisMonth);

        foreach ($period as $date) {
            $days[] = $date->format('Y-m-d');
        }
        foreach($days as $day){
            for($i = 1; $i<11 ; $i++){
                $user = new CurrencyRate([
                    'price' => rand(1000,1200),
                    'id_cryptocurrency' => $i,
                    'created_at' => $day
                ]);
                $user->timestamps = false;
                $user->save();
            }
        }
    }
}
