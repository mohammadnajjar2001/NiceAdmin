<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mohammed nassan najjar',
            'email' => 'njar88503@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Ahmed nassan najjar',
            'email' => 'ahmed200@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Khaled nassan najjar',
                'email' => 'khaled@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'haeel nassan najjar',
                'email' => 'haeel@gmail.com',
                'password' => Hash::make('12345678')
            ],
        ]);
    }
}
