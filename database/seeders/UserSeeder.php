<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mohammed Najjar',
            'email' => 'mohammed.najjar@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Manar',
            'email' => 'manar@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Khaled',
            'email' => 'khaled@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'محمد نجار',
            'email' => 'a@gmail.com',
            'password' => Hash::make('12345678')
        ]);

    }
}
