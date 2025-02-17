<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function addStudent(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:students',
            'age'=>'nullable|integer',
            'phone'=>'required',
        ]);

        $studentData = Student::create($request->all());
        return response()->json([
            'message'=>'success',
            'student'=>$studentData
        ]);
    }


    public function updateStudent(Request $request , $id){
        $student = Student::find($id);

        if($student){
            $student->update($request->all());
            return response()->json($student);
        }
        return response()->json([
            'message'=>'user not found'
        ]);
    }

    public function deleteStudent($id){
        $student = Student::find($id);
        if($student){
            $student->delete();
            return reponse()->json([
                'message'=>'user deletd'
            ]);
        }
        return response()->json([
            'message'=>'user not found'
        ]);
    }


    public function getStudent($id){
        $student = Student::find($id);
        if($student){
            return response()->json($student);
        }
        return response()->json([
            'message'=>'user not found'
        ]);
    }


    public function getAll(){
        $students = Student::all();

        return response()->json($students);
    }
}
