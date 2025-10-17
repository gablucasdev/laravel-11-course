<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {

        User::firstOrCreate(
            [
                'email' => 'gabriellucas3301@gmail.com'
            ],
            [
                'name' => 'Gabriel Lucas',
                'password' => Hash::make('Gato3010')
            ]
        );
    }
}
