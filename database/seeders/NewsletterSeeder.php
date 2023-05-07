<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Newsletter::create([
            'email' => 'abeer@gmail.com',
            'status'=>1
        ]);
        Newsletter::create([
            'email' => 'abeersami611@gmail.com',
            'status'=>1
        ]);
    }
}
