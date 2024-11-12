<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Student::query();
        $age_C=$date_C="=";
        // الحصول على القيم من الـ query string
        $first_name = $request->query('first_name');
        $last_name = $request->query('last_name');
        $dep = $request->query('dep');
        $age = $request->query('age');
        $gender = $request->query('gender');
        $birth = $request->query('birth');
        $age_C = $request->query('age_C');
        $date_C = $request->query('date_C');

        // تطبيق الفلترة بناءً على القيم المستلمة
        if ($first_name) {
            $query->where('first_name', 'LIKE', "%{$first_name}%");
        }
        if ($last_name) {
            $query->where('last_name', 'LIKE', "%{$last_name}%");
        }
        if ($dep) {
            $query->where('dep', 'LIKE', "%{$dep}%");
        }
        if ($gender) {
            $query->where('gender', $gender);
        }

        if ($age && $age_C) {
            $query->where('age', $age_C, $age);
        }

        if ($birth && $date_C) {
            $query->where('birth', $date_C, $birth);
        }

        // استرجاع النتائج
        $students = $query->paginate(15);

        // إرجاع النتيجة بتنسيق JSON
        return response()->json($students);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:100',
            'birth' => 'required|date',
            'dep' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
        ]);

        // إنشاء الطالب في قاعدة البيانات
        $student = Student::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'age' => $validatedData['age'],
            'birth' => $validatedData['birth'],
            'dep' => $validatedData['dep'],
            'gender' => $validatedData['gender'],
        ]);

        // إعادة استجابة بنجاح مع بيانات الطالب المضاف
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        return response()->json($student);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        // العثور على الطالب باستخدام ID
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'first_name' => 'sometimes|min:3|max:20',
            'last_name' => 'sometimes|min:3|max:20',
            'age' => 'sometimes|integer',
            'birth' => 'sometimes|before_or_equal:today',
            'dep' => 'sometimes|required|string',
            'gender' => 'sometimes|required|in:male,female',
        ], [
            'first_name.min' => 'اسم الطالب يجب أن يحتوي على 3 أحرف على الأقل.',
            'age.integer' => 'يجب أن يكون العمر رقمًا صحيحًا.',
            'gender.in' => 'القيمة المحددة للجنس غير صحيحة.',
        ]);


        // إذا كانت البيانات صحيحة، نقوم بتحديث الطالب
        $student->update([
            'first_name' => $validatedData['first_name'] ?? $student->first_name,
            'last_name' => $validatedData['last_name'] ?? $student->last_name,
            'age' => $validatedData['age'] ?? $student->age,
            'birth' => $validatedData['birth'] ?? $student->birth,
            'dep' => $validatedData['dep'] ?? $student->dep,
            'gender' => $validatedData['gender'] ?? $student->gender,
        ]);

        // إرجاع الطالب المعدل
        return response()->json($student);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $student =Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
