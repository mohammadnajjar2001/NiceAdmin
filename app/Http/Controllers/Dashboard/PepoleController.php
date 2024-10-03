<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pepole;
use Illuminate\Http\Request;

class PepoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pepole = Pepole::all();
        return view('pepole.index', compact('pepole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pepole.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pepole = new Pepole($request->all());
        $pepole->save();
        return redirect()->route('pepole.index')->with('added', 'data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Pepole::findOrFail($id); // جلب بيانات الشخص من قاعدة البيانات باستخدام المعرف (id)
        return view('pepole.edit', compact('person')); // تمرير البيانات إلى صفحة التعديل
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $person = Pepole::findOrFail($id); // البحث عن الشخص
        $person->update($request->all()); // تحديث البيانات باستخدام المدخلات من الطلب
        return redirect()->route('pepole.index')->with('updated', 'Person updated successfully'); // إعادة التوجيه بعد التحديث مع رسالة نجاح
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Pepole::findOrFail($id);
        $person->delete();
        return redirect()->route('pepole.index')->with('delete', 'Person delete successfully');
    }
}
