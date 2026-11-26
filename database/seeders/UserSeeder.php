<?php

namespace Database\Seeders;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat akun
        User::Create ([
            'name'=>'Admin Petshop',
            'email'=>'admin@petshopku.com',
            'password'=>Hash::make('admin1616'),
        ]);
    }
}
