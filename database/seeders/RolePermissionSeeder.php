<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $perms = ['create_post', 'edit_own_post', 'edit_any_post', 'delete_own_post', 'delete_any_post', 'publish_post'];

        foreach ($perms as $p)
        {
            Permission::firstOrCreate(['name' => $p], ['description' => ucfirst(str_replace('_', ' ', $p))]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin'], ['description' => 'Admin']);
        $editor = Role::firstOrCreate(['name' => 'editor'], ['description' => 'Editor']);
        $author = Role::firstOrCreate(['name' => 'author'], 'description' => 'Author');
        
        $allPerms = Permission::all();
        $admin->permission()->sync($allPerms->pluck('id')->toArray());
        $editor->permission()->sync($allPerms->WhereIn('name', ['create_post', 'edit_any_post', 'delete_any_post', 'publish_post'])->pluck('id')->toArray());
        $author->permission()->sync($allPerms->WhereIn('name', ['create_post', 'edit_own_post', 'delete_own_post'])->pluck('id')->toArray());

        User::firstOrCreate(['email' => 'gabriellucas3301@gmail.com'], ['name' => 'Gabriel Lucas', 'password' => Hash::make('Gato3010'), 'role_id' => $admin->id]);

        User::firstOrCreate(['email' => 'annyyanny90@gmail.com'], ['name' => 'Anny', 'password' => Hash::make('Gata3010'), 'role_id' => $editor->id]);
    }
}