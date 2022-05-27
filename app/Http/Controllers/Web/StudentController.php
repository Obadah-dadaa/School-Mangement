<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Parents;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::all();
        return view('student.index', compact('students'));
    }

    public function create($id)
    {   
        $parent = Parents::find($id);
        return view('student.addstudent')->with('parent',$parent);
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'section_id' => ['required', 'string'],
            'parent_id' => ['required', 'string'],
        ];
    
        $student_data= [];
        if($request->has('first_name')) if(!is_null($request->first_name)) $student_data['first_name'] = $request->first_name;
        if($request->has('last_name')) if(!is_null($request->last_name)) $student_data['last_name'] = $request->last_name;
        if($request->has('section_id')) if(!is_null($request->section_id)) $student_data['section_id'] = $request->section_id;
        if($request->has('parent_id')) if(!is_null($request->parent_id)) $student_data['parent_id'] = $request->parent_id;

        $student = Student::create($student_data);
        $students = Student::where('parent_id', $request->parent_id)->with('parent')->get();
        return view('student.show', compact('students'))->with('parent_id',$student_data['parent_id']);
    }    

    public function show($id,Request $request)
    {   
        $students = Student::where('parent_id', $request->id)->with('parent')->get();
        return view('student.show', compact('students'))->with('parent_id',$id);
    }

    public function edit($id)
    {   
        $student = Student::find($id);
        return view('Student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'first_name' => ['string', 'max:255', 'nullable'],
            'section_id' => ['integer' , 'nullable'],
        ];
        $student_data = [];
        if($request->has('first_name')) if(!is_null($request->first_name)) $student_data['first_name'] = $request->first_name;
        if($request->has('section_id')) if(!is_null($request->section_id)) $student_data['section_id'] = $request->section_id;

        $student = Student::find($id);
        $student->update($student_data);
        return view('Student.edit', compact('student'));
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        $students=Student::all();
        return view('student.index', compact('students'));
    }
}
