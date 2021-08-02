<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                [
                    'title'=>'su',
                    'note' => 'Super User'
                ],
                [
                    'title'=>'users_management_access',
                    'note'=>'Access Users Management'
                ],
                [
                    'title'=>'users_access',
                    'note'=>'Access Users'
                ],
                [
                    'title'=>'users_create',
                    'note' => 'Create Users'
                ],
                [
                    'title'=>'users_read',
                    'note' => 'Read Users'
                ],
                [
                    'title'=>'users_update',
                    'note' =>'Update Users'
                ],
                [
                    'title'=>'users_delete',
                    'note' => 'Delete Users'
                ],
                [
                    'title'=>'roles_access',
                    'note' => 'Access Roles'
                ],
                [
                    'title'=>'roles_create',
                    'note' => 'Create Roles'
                ],
                [
                    'title'=>'roles_read',
                    'note'=> 'Read Roles'
                ],
                [
                    'title'=>'roles_update',
                    'note' => 'Update Roles'
                ],
                [
                    'title'=>'roles_delete',
                    'note' => 'Delete Roles'
                ],
                [
                    'title'=>'permissions_access',
                    'note' => 'Access Permissions'
                ],
                [
                    'title'=>'permissions_create',
                    'note' => 'Create Permissions'
                ],
                [
                    'title'=>'permissions_read',
                    'note' => 'Read Permissions'
                ],
                [
                    'title'=>'permissions_update',
                    'note'=>'Update Permissions'
                ],
                [
                    'title'=>'permissions_delete',
                    'note' => 'Delete Permissions'
                ],

        ]);
    }
}
