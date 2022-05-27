<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Parents;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{

    public function index()
    {
        $parents=Parents::all();
        return view('parent.index', compact('parents'));
    }

     public function create()
    {
    return view('parent.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'integer','max:255'],
            'email'=> ['required', 'string',],
            'password'=> ['required', 'string',],
            'c-password'=> ['required', 'string', 'same|password'],
        ];
        $parent_data= [];
        if($request->has('name')) if(!is_null($request->name)) $parent_data['name'] = $request->name;
        if($request->has('address')) if(!is_null($request->address)) $parent_data['address'] = $request->address;
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $parent_data['phone_number'] = $request->phone_number;
        if($request->has('email')) if(!is_null($request->email)) $parent_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $parent_data['password'] = Hash::make($request->password);

        $parent = Parents::create( $parent_data);
        return view('parent.index');
    }

    public function show($id)
    {
        $parent = Parents::find($id);
        return view('parent.profile')->with('parent', $parent);
    }

    public function edit($id)
    {
        $parent = Parents::find($id);
        return view('parent.edit')->with('parent', $parent);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'phone_number' => ['integer','max:255', 'nullable'],
            'address' => ['integer','max:255', 'nullable'],
            'email'=> ['string', 'nullable'],
            'password'=> ['string', 'nullable'],
        ];
            
        $parent_data = [];
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $parent_data['phone_number'] = $request->phone_number;
        if($request->has('email')) if(!is_null($request->email)) $parent_data['email'] = $request->email;
        if($request->has('address')) if(!is_null($request->address)) $parent_data['address'] = $request->address;
        if($request->has('password')) if(!is_null($request->password)) $parent_data['password'] = $request->password;
        $parent= Parents::find($id);
        $parent->update($parent_data);
        return view('parent.profile',compact('parent'));
    }

    public function destroy($id)
    {
        $Parent = Parents::find($id);
        $Parent->delete($id);
        $parents=Parents::all();
        return view('parent.index', compact('parents'));        
    }
}
