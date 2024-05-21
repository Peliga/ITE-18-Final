<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //get method
    public function view(){
        return Student::all();
    }
    public function viewStudent($name){
        // return $id?Student::find($id): Student::all();
        return Student::where("name","like","%".$name."%")->get();
    }



}
