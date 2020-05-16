<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    public function permission(){
        $createAcc = Permission::create([
            'name' => 'create-acc',
            'display_name' => 'Create Accounts',
            'description' => 'Create new account admin',
        ]);

        $editUser = Permission::create([
            'name' => 'edit-users',
            'display_name' => 'Edit Users',
            'description' => 'edit existing users',
        ]);

        $delUser = Permission::create([
            'name' => 'delete-users',
            'display_name' => 'Delete Users',
            'description' => 'delete existing users',
        ]);
    }

}
