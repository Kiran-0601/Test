<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Country;
use App\Models\State;
use PhpParser\Node\Stmt\Echo_;

class EmployeeController extends Controller
{
    //
    public function index(Request $request){
        $employee = Employee::get();
        $countries = Country::get(["name","id"]);
        return view('Employee.index',compact('employee','countries'));
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
            $destinationPath = 'public/images';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['profile_image'] = "$postImage";
        }
  
        Employee::create($input);
        echo "Data Updated";
    }

    public function edit(Employee $employee){

        return view('Employee.edit',compact('employee'));

    }

    public function update(Employee $employee , Request $request){

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
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }else{
            unset($input['image']);
        }
          
        $employee->update($input);
        echo "Data Updated";
        
    }
    public function delete(Employee $employee){
        $employee->delete();
        
        echo "Data Deleted";
    }

}
