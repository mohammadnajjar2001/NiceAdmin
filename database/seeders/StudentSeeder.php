<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'first_name' => 'Ahmed',
            'last_name' => 'haj ahmed',
            'age' => '26',
            'birth' => '2000-01-01',
            'dep' => 'برمجيات',
            'gender' => 'male'
        ]);
        Student::create([
            'first_name' => 'Rawan',
            'last_name' => 'Mohammed',
            'age' => '28',
            'birth' => '1998-09-26',
            'dep' => 'تمريض',
            'gender' => 'female'
        ]);
        Student::create([
            'first_name' => 'منار',
            'last_name' => 'محيسن',
            'age' => '20',
            'birth' => '2004-06-27',
            'dep' => 'آثار ومتاحف',
            'gender' => 'female'
        ]);
        Student::create([
            'first_name' => 'محمد',
            'last_name' => 'نجار',
            'age' => '23',
            'birth' => '2001-09-15',
            'dep' => 'IT',
            'gender' => 'male'
        ]);
        Student::create([
            'first_name' => 'هبة',
            'last_name' => 'الخالد',
            'age' => '18',
            'birth' => '2006-01-01',
            'dep' => 'طالب',
            'gender' => 'female'
        ]);
        Student::create([
            'first_name' => 'قاسم',
            'last_name' => 'شبيب',
            'age' => '19',
            'birth' => '2005-02-15',
            'dep' => 'طالب',
            'gender' => 'male'
        ]);
                // بيانات ثابتة لـ 15 طالب
                $students = [
                    [
                        'first_name' => 'أحمد',
                        'last_name' => 'الحسن',
                        'age' => '22',
                        'birth' => '2002-03-15',
                        'dep' => 'هندسة',
                        'gender' => 'male'
                    ],
                    [
                        'first_name' => 'مروان',
                        'last_name' => 'اليوسف',
                        'age' => '24',
                        'birth' => '2000-05-10',
                        'dep' => 'طب',
                        'gender' => 'male'
                    ],
                    [
                        'first_name' => 'ريم',
                        'last_name' => 'الحميدي',
                        'age' => '21',
                        'birth' => '2003-07-20',
                        'dep' => 'علوم',
                        'gender' => 'female'
                    ],
                    [
                        'first_name' => 'سعاد',
                        'last_name' => 'الخطيب',
                        'age' => '23',
                        'birth' => '2001-01-12',
                        'dep' => 'حقوق',
                        'gender' => 'female'
                    ],
                    [
                        'first_name' => 'خالد',
                        'last_name' => 'المحمد',
                        'age' => '20',
                        'birth' => '2004-09-30',
                        'dep' => 'إدارة أعمال',
                        'gender' => 'male'
                    ],
                    [
                        'first_name' => 'نور',
                        'last_name' => 'عبد الله',
                        'age' => '22',
                        'birth' => '2002-11-22',
                        'dep' => 'إعلام',
                        'gender' => 'female'
                    ],
                    [
                        'first_name' => 'علي',
                        'last_name' => 'العلي',
                        'age' => '19',
                        'birth' => '2005-04-18',
                        'dep' => 'هندسة',
                        'gender' => 'male'
                    ],
                    [
                        'first_name' => 'هبة',
                        'last_name' => 'الموسى',
                        'age' => '21',
                        'birth' => '2003-12-08',
                        'dep' => 'آداب',
                        'gender' => 'female'
                    ],
                    [
                        'first_name' => 'فارس',
                        'last_name' => 'الدرويش',
                        'age' => '25',
                        'birth' => '1999-06-14',
                        'dep' => 'طب',
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
                    ],
                    [
                        'first_name' => 'عمر',
                        'last_name' => 'إبراهيم',
                        'age' => '24',
                        'birth' => '2000-01-17',
                        'dep' => 'آداب',
                        'gender' => 'male'
                    ]
                ];

                // إدخال البيانات إلى قاعدة البيانات
                foreach ($students as $student) {
                    Student::create($student);
                }
    }
}
