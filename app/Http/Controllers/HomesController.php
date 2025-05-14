<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Student;
use App\Admin;
use App\Classroom;
use App\Teacher;
use App\Manager;
use App\Tutor;
use App\Mark;
use App\Academicyear;
use App\Semester;
use App\Subject;
use PDF;



class HomesController extends Controller

{

    public function downloadPDF()
    {

        ini_set('max_execution_time', 18000); //3 minutes

        $students = Student::where('classroom_id', 21)->get();
        $semesterP = Semester::where('state', 'process')->first();

        $pdf = PDF::loadView('pdf', ['students' => $students, 'semesterP' => $semesterP]);

        //  $pdf->setPaper('A4', 'landscape');
        //  $pdf->stream();
        //   return $pdf->download('hetecStudent.pdf');

        return $pdf->stream('hetecStudent.pdf');
    }

    public function downloadPDF7()
    {

        ini_set('max_execution_time', 18000); //3 minutes
        $data = Classroom::find(4);

        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];

        // $teachers= Teacher::orderBy('name','ASC')->get();
        // $subjects= Subject::get();

        $pdf = PDF::loadView('pdf7', ['data' => $data]);

        return $pdf->download('hetecStudent.pdf');
    }


    public function downloadPDF3()
    {

        ini_set('max_execution_time', 18000); //3 minutes
        $data = Classroom::orderBy('level', 'ASC')->get();

        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];

        // $teachers= Teacher::orderBy('name','ASC')->get();
        // $subjects= Subject::get();

        $pdf = PDF::loadView('pdf3', ['data' => $data]);

        return $pdf->download('hetecStudent.pdf');
    }


    public function downloadPDF4()
    {

        ini_set('max_execution_time', 18000); //3 minutes
        $data = Teacher::orderBy('name', 'ASC')->get();

        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];

        // $teachers= Teacher::orderBy('name','ASC')->get();
        // $subjects= Subject::get();

        $pdf = PDF::loadView('pdf4', ['data' => $data]);

        return $pdf->download('hetecStudent.pdf');
    }

    public function downloadPDF5()
    {

        ini_set('max_execution_time', 18000); //3 minutes
        $data = Manager::orderBy('name', 'ASC')->get();

        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];

        // $teachers= Teacher::orderBy('name','ASC')->get();
        // $subjects= Subject::get();

        $pdf = PDF::loadView('pdf5', ['data' => $data]);

        return $pdf->download('hetecStudent.pdf');
    }


    public function bull()

    {

        ini_set('max_execution_time', 18000); //3 minutes

        $student = Student::find(13);
        $semesterP = Semester::where('state', 'process')->first();


        return view('home.bulletin', compact('student', 'semesterP'));
    }


    public function index()

    {
        // dd("hello");
        return view('home.index');
    }

    public function account()

    {

        return view('home.account');
    }


    public function test()

    {

        return view('home.test');
    }

    public function show()
    {

        $value = request()->get('q');

        return view('home.getuser', compact('value'));
    }

    public function showhint()
    {

        return view('home.gethint');
    }


    public function logins()

    {

        return view('home.login');
    }

    public function profile()

    {

        return view('home.profile');
    }

    public function editProfile()

    {

        return view('home.editProfile');
    }

    public function note()

    {

        return view('home.note');
    }


    public function schoolNews()

    {

        return view('home.schoolNews');
    }

    public function schoolBde()

    {

        return view('home.schoolBde');
    }


    public function adTeam()

    {

        return view('home.adTeam');
    }

    public function standard()

    {

        return view('home.standard');
    }

    public function materiel()

    {

        return view('home.materiel');
    }


    public function forum()

    {

        return view('home.forum');
    }


    public function specForum()

    {

        return view('home.specForum');
    }


    public function setForum()

    {

        return view('home.setForum');
    }


    public function xit()

    {

        ini_set('max_execution_time', 18000); //3 minutes

        $manager = Teacher::find(25);
        $manager->password = "password";
        $manager->save();

        /*
       $teachers=Teacher::all();

       foreach ($teachers as $teacher) {

        $pass = str_random(6); // FOR PASSWORD PURPOSE
        $pass=strtolower($pass);
        $teacher->password=$pass;
        $teacher->image=$pass;
       //$teacher->image=$pass;
        $teacher->save();

    }




        $admin=Admin::create([

            'name'=> 'ADMINE' ,
            'surname'=> 'ADMINE',
            'email' => 'admine@hetec-mali.com',
            'login' => 'kamehamee',
            'password' => 'hachimone' ,
            'tel' => '777777777' ,
            //'created_at'=>'2021-06-05'
        ]);

        dd($admin);



       $teachers=Teacher::all();

       foreach ($teachers as $teacher) {

        $pass = str_random(6); // FOR PASSWORD PURPOSE
        $pass=strtolower($pass);
        $teacher->password=$pass;
        $teacher->image=$pass;
       //$teacher->image=$pass;
        $teacher->save();

    }


        $admin=Admin::create([

            'name'=> 'ADMIN' ,
            'surname'=> 'ADMIN',
            'email' => 'admin@hetec-mali.com',
            'login' => 'kamehame',
            'password' => 'hachimon' ,
            'tel' => '777777777' ,
        ]);

        dd($admin);

*/



        return redirect('/');
    }
}
