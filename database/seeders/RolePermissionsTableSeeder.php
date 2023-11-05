<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'permission_id' => 1,
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'permission_id' => 3,
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'permission_id' => 4,
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 2,
                'permission_id' => 1,
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 2,
                'permission_id' => 3,
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'permission_id' => 4,
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}