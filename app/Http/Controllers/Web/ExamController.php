<?php

namespace App\Http\Controllers\web;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\HelperClasses\Message;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with('student')->get();
        return view('exam.index')->with('exams', $exams);
    }

    public function create()
    {    
        $student=Student::all();
        $subject=Subject::all();
        return view('exam.create', compact('student','subject'));
    }

    public function store(Request $request)
    {
        $rules = [
            'student'=>'integer|required',
            'subject_id'=>'integer|required',
            'class_id' => ['required', 'string'],
            'type'=> 'in:first exam,second exam, final exam',
            'mark'=> 'integer|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->with($validated->errors());
        }

        $exam_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $exam_data['student_id'] = $request->student_id;
        if($request->has('subject_id')) if(!is_null($request->subject_id)) $exam_data['subject_id'] = $request->subject_id;
        if($request->has('type')) if(!is_null($request->type)) $exam_data['type'] = $request->type;
        if($request->has('mark')) if(!is_null($request->mark)) $exam_data['mark'] = $request->mark;

        $exam = Exam::create($exam_data);
    }

    public function show(Exam  $exam)
    {
        return view('exam.show');
    }

    public function update(Request $request, Exam  $exam)
    {
        $rules = [
            'mark'=> 'integer',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->with($validated->errors());
        }
        if($request->has('mark')) if(!is_null($request->mark)) $exam_data['mark'] = $request->mark;

        $exam->update($exam_data);
    }

    public function destroy($id)
    {
        $exam = Exam::find($id)->delete();
        return  redirect()->back();
    }
}
