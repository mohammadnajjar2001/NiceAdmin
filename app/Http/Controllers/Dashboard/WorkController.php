<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(4);
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('pages.work.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_work' => 'required|max:50'
        ]);

        DB::table('works')->insert([
            'name_work' => $request->name_work,
            'user_id' => Auth::id(), // إضافة user_id الخاص بالمستخدم الحالي
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('phonemy.index')->with('success', 'تم تعيين الوظيفة بنجاح.');
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
        $work = Work::find($id);
        return view('pages.work.edit' , compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_work' => 'required|max:50|unique:works,name_work," . $request->id . ,id'
        ]);
        $work = Work::find($id);
        $work->update($request->all());
        $work->save();
        return redirect()->route('phonemy.index')->with('info','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work = Work::find($id);
        $work->delete();
        return redirect()->route('phonemy.index')->with('delete','تم الحذف');
    }
}
