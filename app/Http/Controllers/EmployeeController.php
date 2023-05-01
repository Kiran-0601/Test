<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index(){

        return view('Employee.index');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'dob' => 'required',           
            'country'=> 'required',
            'state' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'profile_image' => 'required',
        ]);

        $input = $request->all();
  
        if ($image = $request->file('profile_image')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['profile_image'] = "$postImage";
        }
  
        Employee::create($input);
    }

    public function edit(Employee $employee){

    }

    public function update(Employee $employee){
        
    }

}
