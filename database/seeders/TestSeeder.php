<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students=[
            [
                'first_name' => 'عمر',
                'last_name' => 'إبراهيم',
                'age' => '24',
                'birth' => '2000-01-17',
                'dep' => 'آداب',
                'gender' => 'male'
            ],
            [
                'first_name' => 'ميساء',
                'last_name' => 'العلي',
                'age' => '22',
                'birth' => '2002-02-05',
                'dep' => 'علوم',
                'gender' => 'female'
            ],
            [
                'first_name' => 'سمير',
                'last_name' => 'الجاسم',
                'age' => '20',
                'birth' => '2004-07-01',
                'dep' => 'إدارة أعمال',
                'gender' => 'male'
            ],
            [
                'first_name' => 'سارة',
                'last_name' => 'النجار',
                'age' => '18',
                'birth' => '2006-10-27',
                'dep' => 'إعلام',
                'gender' => 'female'
            ],
            [
                'first_name' => 'محمود',
                'last_name' => 'الخالد',
                'age' => '19',
                'birth' => '2005-08-09',
                'dep' => 'هندسة',
                'gender' => 'male'
            ],
            [
                'first_name' => 'منى',
                'last_name' => 'حسن',
                'age' => '23',
                'birth' => '2001-11-03',
                'dep' => 'حقوق',
                'gender' => 'female'
            ]
            ];
        foreach($students as $student){
            DB::table('tests')->insert($student);
        }
    }
}
