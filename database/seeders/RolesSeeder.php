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
            'name'=>'super admin',
            'email'=>'admin@aa.net',
            'password'=>bcrypt('123456789')
        ]);
        $user->assignRole('admin');

        // $role= new ModelHasRole;
        // $role->role_id=1;
        // $role->model_type='App\Models\User';
        // $role->model_id=$user->id;
        // $role->save();
    }

}

