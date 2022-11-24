<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayOfPermissionNames = [
            'create a ticket',
            'create a parent ticket',
            'create a child ticket',
            'create a linked ticket',
            'respond to a ticket',
            'send a ticket reply',
            'add public notes',
            'forward a conversation',
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $permissionsByRole = [
            'customer-admin' => [
                'create a ticket',
                'create a parent ticket',
                'create a child ticket',
            ],
            'customer' => [
                'create a ticket',
                'create a parent ticket',
                'create a child ticket',
            ],
            'agent-admin' => [
                'create a ticket',
                'create a parent ticket',
                'create a child ticket',
                'create a linked ticket',
                'respond to a ticket',
                'send a ticket reply',
                'add public notes',
            ],
            'agent' => [
                'create a ticket',
                'create a parent ticket',
                'create a child ticket',
                'create a linked ticket',
                'respond to a ticket',
                'send a ticket reply',
                'add public notes',
            ],
            'admin' => [
                'create a ticket',
                'create a parent ticket',
                'create a child ticket',
                'create a linked ticket',
                'respond to a ticket',
                'send a ticket reply',
                'add public notes',
                'forward a conversation',
            ]
        ];

        foreach ($permissionsByRole as $role => $permissions) {
            $role = Role::create(['name' => $role]);

            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }
    }
}
