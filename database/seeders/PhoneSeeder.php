<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phone::create([
            'user_id' => 4,
            'number' => '+905352759256',
            'age' => '23',
            'address' => 'شمال اعزاز',
            'image' => '1730413750.jpg'
        ]);
        Phone::create([
            'user_id' => 2,
            'number' => '+963977664075',
            'age' => '20',
            'address' => 'حلب',
            'image' => '1730413543.jpg'
        ]);
    }
}
