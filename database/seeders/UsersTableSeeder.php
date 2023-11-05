<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Developer',
                'email' => 'developer@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ro2hhN618DZkOxqHLVqb6ug.C/xExVZnhjArhRI.m79Dhs6.iW8pG',
                'role_id' => 1,
                'photo' => 'users/gTI1NATHsxN3jA653b47fwxyrZ4bNadPFEWN5hZ1.jpg',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Ka.yQ2rjml90y.tVu8XHOO..eiaQWWkq/C32fat.78tbzM6Opf/vW',
                'role_id' => 2,
                'photo' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}