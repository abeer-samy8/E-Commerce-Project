<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\ModelHasRole;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'customer'
        ]);
        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@aa.net',
            'password'=>bcrypt('123456789')
        ]);
        $user->assignRole('Super Admin');


    }

}

