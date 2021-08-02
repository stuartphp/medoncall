<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(2)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 6) != 'users_' && substr($permission->title, 0, 6) != 'roles_' && substr($permission->title, 0, 12) != 'permissions_' && substr($permission->title, 0, 2) != 'su';
        });
        Role::findOrFail(1)->permissions()->sync(1);
        Role::findOrFail(3)->permissions()->sync($user_permissions);
        Role::findOrFail(2)->permissions()->detach([1]);
    }
}
