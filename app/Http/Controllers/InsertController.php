<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Student;
use App\Teacher;
use App\Tutor;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    public function insertform()
    {
        return view('student/insert');
    }
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->email = "johndoe@gmail.com";
        $student->matricule = $request->nummat;
        $student->password = $request->password;
        $student->responsable = 0;
        $student->pmessage = "null";
        $student->postBDE = "null";
        $student->save();
    }

    public function teacherinsterform()
    {
        return view('teacher/insert');
    }
    public function teacherstore(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = "Mike";
        $teacher->surname = "Doe";
        $teacher->email = $request->email;
        $teacher->password = $request->password;
        $teacher->save();
        dd($teacher);
    }

    public function managerinsterform()
    {
        return view('manager.insert');
    }

    public function managerstore(Request $request)
    {
        $manager = new Manager();
        $manager->name = "John";
        $manager->surname = "Doe";
        $manager->email = $request->email;
        $manager->password = $request->password;
        $manager->image = "1233455.jpg";
        $manager->save();
        dd($manager);
    }
    public function tuteurinsterform()
    {
        return view('tutor.insert');
    }
    public function tuteurstore(Request $request)
    {
        $tutor = new Tutor();
        $tutor->name = "Jane";
        $tutor->surname = "Doe";
        $tutor->image = "1233455.jpg";
        $tutor->email = $request->email;
        $tutor->password = $request->password;
        $tutor->save();
        dd($tutor);
    }
}
