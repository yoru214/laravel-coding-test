<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'John Smith',
            'email' => 'JohnSmith@mail.com',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',            
            'comments' => 'Director'
        ]);
        
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Sarah Conner',
            'email' => 'SarahConner@mail.com',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',   
            'comments' => 'Manager'
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Dean Chester',
            'email' => 'DeanChester@mail.com',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',   
            'comments' => 'Sales Person'
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Timothy Atkins',
            'email' => 'TimothyAtkins@mail.com',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',   
            'comments' => 'Sales Person'
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'George Sanders',
            'email' => 'GeorgeSanders@mail.com',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',   
            'comments' => 'Sales Person'
        ]);
    }
}
