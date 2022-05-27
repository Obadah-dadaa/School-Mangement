<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index()
    {
        $grade = Grade::with('section')->get();
        return view('grades.index')->with('grades', $grade);
    }

    public function create()
    {
        return view('grade.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=> 'string|required',
            'section_number'=> 'string|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->with($validated->errors());
        }

        if($request->has('name')) if(!is_null($request->name)) $grade_data['name'] = $request->name;
        $section_data = [];
        if($request->has('section_number')) if(!is_null($request->section_number)) $section_data['section_number'] = $request->section_number;

        $grade = Grade::create($grade_data);
        $section = $grade->section()->create($section_data);
    }

    public function show($id)
    {
        $grade = Grade::find($id)->with('section');
        return view('grade.show')->with('grade', $grade);
    }

    public function edit($id)
    {
        $grade = Grade::find($id)->with('section');
        return view('grade.edit')->with('grade', $grade);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'section_number'=> ['string'],
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->with($validated->errors());
        }

        $section_data = [];
        if($request->has('section_number')) if(!is_null($request->section_number)) $section_data['section_number'] = $request->section_number;

        $grade = Grade::find($id);
        $grade->section()->update( $section_data);
    }

    public function destroy($id)
    {
        $grade = Grade::find($id)->delete;
        return redirect()->back();
    }
}
