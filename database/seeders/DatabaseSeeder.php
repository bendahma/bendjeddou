<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Magazin;
use App\Models\Activation;
use Carbon\Carbon ;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        Magazin::create([
            'name' => 'BENDJEDDOU ELECTROMENAGER',
            'address' => 'Skikda',
            'commune' => 'Skikda',
        ]);
        // $trailStart = Carbon::today();
        // $trailEnd = Carbon::today()->addDays(15) ;
        // Activation::create([
        //    'trailStart' => $trailStart,
        //     'trailEnd' => $trailEnd,
        //     'code_activation' => '$2y$10$Wx5hpn4abcZH6x6ZrQpBF.tbbu8xjJpFFSN/YrJhS08j6w8H4Q64q' ,
        // ]);
    }
}
