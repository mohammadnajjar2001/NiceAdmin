<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = Test::query();
        $age=$request->query('age');
        if($age){
            $query->whereAge($age);
        }
        $tests = $query->paginate(10);
        return view('pages.test.index',compact('tests'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.test.create');
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
            'birth' => 'required',
            'dep' => 'required',
            'gender' => 'required|in:male,female'
        ]);
    DB::table('tests')->insert([
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name,
]);


        return redirect()->route('test.index')->with('success','تم الاضافة');
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
        $test = Test::find($id);
        return view('pages.test.edit',compact('test'));
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
            'birth' => 'required',
            'dep' => 'required',
            'gender' => 'required|in:male,female'
        ]);
        $test = Test::find($id);
        $test->update($request->all());
        $test->save();
        return redirect()->route('test.index')->with('info','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::find($id);
        $test->delete();
        return redirect()->route('test.index')->with('danger','تم الحذف');
    }
}
