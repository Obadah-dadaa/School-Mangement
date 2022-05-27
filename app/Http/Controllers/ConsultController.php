<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\HelperClasses\Message;
use App\Models\Consult;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ConsultController extends Controller
{
    public function index()
    {
        $consult = Consult::get();
//        return response()->json(new Message($Consult, '200', true, 'info', 'done', 'تم'));
        return view('Teachers.index',compact('consult'));
    }

    public function store(Request $request)
    {
        $rules = [
            'parent_id'=> 'integer|required',
            'title'=> 'string|required',
            'description'=> 'string|required',
            'rating'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Consult_data = [];
        if($request->has('parent_id')) if(!is_null($request->parent_id)) $Consult_data['parent_id'] = $request->parent_id;
        if($request->has('title')) if(!is_null($request->title)) $Consult_data['title'] = $request->title;
        if($request->has('description')) if(!is_null($request->description)) $Consult_data['description'] = $request->description;
        if($request->has('rating')) if(!is_null($request->rating)) $Consult_data['rating'] = $request->rating;


        try
        {
            $Consult = Consult::create($Consult_data);
            $Consult = $Consult->Consult()->create($Consult_data);
            return response()->json(new Message($Consult->load('Consult'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }

    public function show(Consult $Consult)
    {
        return response()->json(new Message($Consult->load('Consult'), '200', true, 'info', 'done', 'تم'));
    }

    public function update(Request $request, Consult $Consult)
    {
        $rules = [
            'parent_id'=> 'integer|required',
            'title'=> 'string|required',
            'description'=> 'string|required',
            'rating'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $Consult_data = [];
        if($request->has('parent_id')) if(!is_null($request->parent_id)) $Consult_data['parent_id'] = $request->parent_id;
        if($request->has('title')) if(!is_null($request->title)) $Consult_data['title'] = $request->title;
        if($request->has('description')) if(!is_null($request->description)) $Consult_data['date'] = $request->description;
        if($request->has('rating')) if(!is_null($request->rating)) $Consult_data['rating'] = $request->rating;



        try
        {
            $Consult->update($Consult_data);
            $Consult->update($Consult_data);
            return response()->json(new Message($Consult->load('Consult'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }
    public function destroy(Consult $Consult)
    {
        try
        {
            $Consult->delete();
            return response()->json(new Message($Consult->load('Consult'),'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
