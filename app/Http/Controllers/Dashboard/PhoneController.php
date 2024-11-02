<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->phone;
        $person = Auth::user();
        $works= Auth::user()->works;
        return view('pages.phone.index', compact('user','works','person'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->phone;
        if($user){

            return view('pages.phone.create',compact('user'));
        }
        else{
            return view('pages.phone.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $request->validate([
            'number' => 'required|min:3|max:15',
            'age' => 'required|integer',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // تحديد نوع الصورة والحجم الأقصى
        ]);

        $user = Auth::user(); // الحصول على المستخدم الحالي

        // تحقق مما إذا كان لدى المستخدم رقم هاتف
        if ($user->phone) {
            // إذا كان لديه رقم هاتف، قم بتحديثه
            $data = [
                'number' => $request->number,
                'age' => $request->age,
                'address' => $request->address,
            ];

            // تحقق مما إذا كانت الصورة قد تم تحميلها
            if ($request->hasFile('image')) {
                // حفظ الصورة
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $data['image'] = $imageName; // إضافة اسم الصورة إلى البيانات
            }

            $user->phone->update($data);
        } else {
            // إذا لم يكن لديه رقم هاتف، قم بإضافة رقم جديد
            $data = [
                'number' => $request->number,
                'age' => $request->age,
                'address' => $request->address,
            ];

            // تحقق مما إذا كانت الصورة قد تم تحميلها
            if ($request->hasFile('image')) {
                // حفظ الصورة
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $data['image'] = $imageName; // إضافة اسم الصورة إلى البيانات
            }

            $user->phone->create($data);
        }

        return redirect()->back()->with('success', 'تم حفظ رقم الهاتف بنجاح.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
