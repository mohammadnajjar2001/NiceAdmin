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
        User::create(
            [
                'name' => 'mohammed',
                'email' => 'mohammed@gmail.com',
                'password' => Hash::make('12345678')
            ]
        );
        User::create(
            [
                'name' => 'cdc ',
                'email' => 'sxc@gmail.com',
                'password' => Hash::make('12345678')
            ]
        );
        DB::table('users')->insert([
            'name' => 'rgr ',
            'email' => 'rrr@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
