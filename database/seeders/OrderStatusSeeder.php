<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\OrderStatus::create([
            'name'=> 'New'

        ]);
        \App\Models\OrderStatus::create([
            'name'=> 'In progress'

        ]);
        \App\Models\OrderStatus::create([
            'name'=> 'Sended'

        ]);
        \App\Models\OrderStatus::create([
            'name'=> 'Delivered'

        ]);
        \App\Models\OrderStatus::create([
            'name'=> 'Canceled'
        ]);
    }
}
