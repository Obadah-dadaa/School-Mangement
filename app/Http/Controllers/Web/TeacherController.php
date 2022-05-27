<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
use Response;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers=Teacher::all();
        return view('teacher.index')->with('teachers', $teachers);
    }

    public function create()
    {
        return view('teacher.add-teacher');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string' , 'max:255'],
            'phone_number' => ['required', 'string'],
            'email'=> ['required', 'string'],
            'password'=> ['required', 'string', 'confirmed'],
            'c-password'=>['required', 'string','same:password']
        ];

        $teacher_data= [];
        if($request->has('name')) if(!is_null($request->name)) $teacher_data['name'] = $request->name;
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $teacher_data['phone_number'] = $request->phone_number;
        if($request->has('email')) if(!is_null($request->email)) $teacher_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $teacher_data['password'] = Hash::make($request->password);

        $teacher = Teacher::create($teacher_data);
        return view('teacher.profile',compact('teacher'));
    }

    public function show($id)
    {
        $teacher=Teacher::find($id);
        return view('teacher.profile', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher=Teacher::find($id);
        return view('teacher.edit-teacher', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'phone_number' => ['string'],
            'email'=> ['string'],
        ];

        $teacher_data= [];
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $teacher_data['phone_number'] = $request->phone_number;
        if($request->has('email')) if(!is_null($request->email)) $teacher_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $teacher_data['password'] = Hash::make($request->password);

        $teacher = Teacher::find($id);
        $teacher->update($teacher_data);
        return view('teacher.profile',compact('teacher'));
    }

    public function destroy($id)
    {
        $teacher=Teacher::find($id);
        $teacher->delete();
        $teachers=Teacher::all();
        return view('teacher.index')->with('teachers', $teachers);
    }
}
