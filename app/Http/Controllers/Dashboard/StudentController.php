<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query=Student::query();
        $first_name=$request->query('first_name');
        $last_name=$request->query('last_name');
        $dep=$request->query('dep');
        $age=$request->query('age');
        $gender=$request->query('gender');
        $birth=$request->query('birth');
        if($first_name){
            $query->where('first_name','LIKE',"%{$first_name}%");
        }
        if($last_name){
            $query->where('last_name','LIKE',"%{$last_name}%");
        }
        if($age){
            $query->where('age','=',$age);
        }
        if($birth){
            $query->where('birth','<=',$birth);
        }
        if($dep){
            $query->where('dep','LIKE',"%{$dep}%");
        }
        if($gender){
            $query->where('gender',$gender);
        }
        $students =$query->paginate(10);
        return view('pages.student.index',compact('students','first_name','last_name','dep','age','gender','birth'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'age' => 'required|integer',
            'birth' => 'required|before_or_equal:today',
            'dep' => 'required',
            'gender' => 'required|in:male,female'
        ]);
        $student = new Student($request->all());
        $student->save();
        return redirect()->route('student.index')->with('add','تم الاضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('pages.student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'age' => 'required|integer',
            'birth' => 'required|before_or_equal:today',
            'dep' => 'required',
            'gender' => 'required|in:male,female'
        ]);
        $student = Student::find($id);
        $student->update($request->all());
        $student->save();
        return redirect()->route('student.index')->with('update','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('delete','تم الحذف');
    }
}
