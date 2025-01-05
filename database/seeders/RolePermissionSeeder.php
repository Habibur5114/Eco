<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        $permissions = [

            ['name'=>'user list'],
            ['name'=>'create user'],
            ['name'=>'edit user'],
            ['name'=>'delete user'],
            ['name'=>'role list'],
            ['name'=>'create user'],
            ['name'=>'edit user'],
            ['name'=>'delete user'],
        ];

        foreach($permissions as $item){
            permission::create($item);
        }
        $role->syncPermissions($permissions::all());

        $user = User::first();
        $user->assignRole($role);
    }
}
