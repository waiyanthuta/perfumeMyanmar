<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Pwint Phyu',
                'email' => 'yanantadmin01@gmail.com',
                'password' => Hash::make('pwintphyu@ynt111'),
                'phno' => 959400584721,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Than Htet',
            //     'email' => 'yanantadmin02@gmail.com',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('thanhtet@ynt222'),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
