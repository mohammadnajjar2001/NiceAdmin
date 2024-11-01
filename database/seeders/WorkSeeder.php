<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Work::create([
            'user_id' =>4,
            'name_work' => 'Student'
        ]);
        Work::create([
            'user_id' =>4,
            'name_work' => 'Full Stack'
        ]);
        Work::create([
            'user_id' =>4,
            'name_work' => 'UI / UX'
        ]);
        Work::create([
            'user_id' =>2,
            'name_work' => 'Student'
        ]);
        Work::create([
            'user_id' =>2,
            'name_work' => 'Teacher'
        ]);
    }
}
