<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب بيانات المستخدم الحالي
        $person = Auth::user();

        // جلب معلومات الهاتف الخاص بالمستخدم
        $user = $person->phone->select('number', 'age', 'address', 'image')->first();

        // جلب أسماء الأعمال المرتبطة بالمستخدم
        $works = $person->works->pluck('name_work');

        // إرجاع البيانات كـ JSON
        return response()->json([
            'person_name' => $person->name,
            'phone' => $user,
            'works' => $works
        ]);
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
