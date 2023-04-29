<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function add(){
        return view('add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'rno' => 'required',
            'sub' => 'required',
            'mark' => 'required'
        ]);
    
        Student::create($request->all());
     
        return redirect()->route('add')
                        ->with('success','Product created successfully.');
   
        echo " Kiran";
    }
}
