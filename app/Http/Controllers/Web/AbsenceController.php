<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Absence;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with('student')->get();
        return view('attendance.index')->with('absences', $absences);
    }

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'student_id'=> ['integer|required'],
            'day_id'=> ['integer|required'],
            'reason'=> ['string|required'],
            'date'=> ['date|required'],
        ];

        $validated = Validator::make($request->all(),  $rules);
        $Absence_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $Absence_data['student_id'] = $request->student_id;
        if($request->has('reason')) if(!is_null($request->reason)) $Absence_data['reason'] = $request->reason;
        if($request->has('day_id')) if(!is_null($request->day_id)) $Absence_data['day_id'] = $request->day_id;
        if($request->has('date')) if(!is_null($request->date)) $Absence_data['date'] = $request->date;
        $absence = Absence::create($Absence_data);
    }

    public function show($id)
    {
        $absence = Absence::find($id)->with('student');
        return view('attendance.show')->with('absence', $absence);
    }
    public function edit($id)
    {   
        $absence = Absence::find($id);
        return view('Student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'student_id'=> ['integer|required','nullable'],
            'day_id'=> ['integer|required','nullable'],
            'reason'=> ['string|required','nullable'],
            'date'=> ['date|required','nullable'],
        ];

        $validated = Validator::make($request->all(),  $rules);
        $Absence_data = [];
        if($request->has('student_id')) if(!is_null($request->student_id)) $Absence_data['student_id'] = $request->student_id;
        if($request->has('reason')) if(!is_null($request->reason)) $Absence_data['reason'] = $request->reason;
        if($request->has('day_id')) if(!is_null($request->day_id)) $Absence_data['day_id'] = $request->day_id;
        if($request->has('date')) if(!is_null($request->date)) $Absence_data['date'] = $request->date;
    
        $absence = Absence::find($id);
        $absence->update($Absence_data);
        return view('attendance.show')->with('absence', $absence);
    }

    public function destroy($id)
    {
        $absence = Absence::find($id);
        $absence->delete();
        $absences=Absence::all();
        return view('attendance.show')->with('absence', $absence);
    }

}
