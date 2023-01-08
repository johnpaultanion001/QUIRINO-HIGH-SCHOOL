<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Parents;
use App\Models\Teacher;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // For admin
            [
                'id'                => '1',
                'name'              => 'Admin sample',
                'email'             => 'admin@admin.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
          
            // For Teacher
            [
                'id'                => '2',
                'name'              => 'Teacher sample',
                'email'             => 'teacher@teacher.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            // For parent
            [
                'id'                => '3',
                'name'              => 'Parent sample',
                'email'             => 'parent@parent.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $teachers = [
            // Teacher Info
            [
                'id'                => '1',
                'name'              => 'test teacher',
                'contact_number'              => '09775556682',
                'profession'              => 'Teacher',
                'user_id'   => '2',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
               
            ],
        ];

        $parents = [
            // parent Info
            [
                'id'                => '1',
                'name'              => 'test parent',
                'contact_number'              => '09775556682',
                'user_id'   => '3',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
               
            ],
        ];

        User::insert($users);
        Teacher::insert($teachers);
        Parents::insert($parents);
    }
}
