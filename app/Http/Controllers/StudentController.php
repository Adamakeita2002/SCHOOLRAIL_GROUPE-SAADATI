<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Student;
use App\Test;
use App\Classroom;
use App\Ressource;
use App\Actuality;
use App\Bde;
use App\Calendar;
use App\Epreuve;
use App\Homework;
use App\Ahomework;
use App\Academicyear;
use App\Semester;
use App\Subject;
use App\Mark;
use App\Forum;
use App\Ftheme;
use App\Commentfrm;
use App\Quest;
use App\Question;
use App\Qcomment;
use App\Squest;
use App\Sltn;
use App\Tltn;
use App\Smsg;

use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /*   DASHBOARD      */
    public function index()
    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->where('semester_id', $semesterP->id)->get();
        $subjects = $semesterP->subjects();
        #$ressources=$teacher->ressources()->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->get();
        $tests = Test::where('academicyear_id', $academicyearP->id)->get();
        $news = Actuality::where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'Desc')->get();
        $epreuves = Epreuve::get();


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.dashboard', compact('academicyearP', 'student', 'news', 'calendars', 'subjects', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    #--------------------------------------------------------------------------------------------------------------


    /*   TACTILEO     */
    public function tactileo()
    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();



        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.tactileo', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    /*  END  TACTILEO     */
    #--------------------------------------------------------------------------------------------------------------

    /*############ START CALENDAR ###########################################################################*/

    public function calendar()

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $calendars = Calendar::where('classroom_id', $student->classroom->id)->get();

        if ($k = 'clicked') {

            $Calendarltns = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->get();

            foreach ($Calendarltns as $Calendarltn) {

                $Calendarltn->state = 'read';
                $Calendarltn->save();
            }
        }

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.calendar', compact('academicyearP', 'student', 'calendars', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    #--------------------------------------------------------------------------------------------------------------

    /*############ END CALENDAR ###########################################################################*/


    /*############ START MESSAGE ###########################################################################*/


    public function message(Request $request)

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $quests = Quest::get();
        $smsgs = $student->smsgs()->orderBy('created_at', 'ASC')->get();


        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Messageltns = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->get();

            foreach ($Messageltns as $Messageltn) {

                $Messageltn->state = 'read';
                $Messageltn->save();
            }
        }
        $ltns = Sltn::where('student_id', $student->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.message', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'ltns', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'quests', 'smsgs', 'Quizltn'));
    }

    public function quest(Request $request)

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $quests = Quest::get();
        $squests = Squest::where('student_id', $student->id)->get();

        $ltns = Sltn::where('student_id', $student->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.quest', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'ltns', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'quests', 'squests', 'Quizltn'));
    }


    public function CreateQuest()

    {
        $this->validate(request(), [

            'quest' =>  'required',
        ]);

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $squests = Squest::where('student_id', $student->id)->get();

        //GET ARRAY OF UNIQUE SQUEST ID
        $stuQuests = array();

        foreach ($squests as $squest) {

            array_push($stuQuests, $squest->quest_id);
        }

        if (in_array(request('quest'), $stuQuests)) {

            return redirect('/student/quest')->with('status2', 'Vous avez deja envoyé cette requête!');
        } else {

            $quest = Squest::create([

                'quest_id' => request('quest'),
                'student_id' => Auth::user()->id,
            ]);

            return redirect('/student/quest')->with('status1', 'Requête envoyé!');
        }
    }


    #--------------------------------------------------------------------------------------------------------------

    /*############ END MESSAGE ###########################################################################*/

    /*############ START NOTIFICATION ###########################################################################*/


    public function notification(Request $request)

    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $epreuves = Epreuve::get();
        $ressources = Ressource::where('academicyear_id', $academicyearP->id)->get();

        $ltns = Sltn::where('student_id', $student->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.notification', compact('academicyearP', 'student', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'ltns', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'ressources', 'Quizltn'));
    }


    public function specnotif(Request $request)

    {
        $q = request()->get('q');

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $epreuves = Epreuve::get();
        $ressources = Ressource::where('academicyear_id', $academicyearP->id)->get();

        $ltns = Sltn::where('student_id', $student->id)->where('type', $q)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.specnotif', compact('academicyearP', 'student', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'ltns', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'q', 'ressources', 'Quizltn'));
    }



    public function unnotif(Request $request)

    {


        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
    }


    /*############ END NOTIFICATION  ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START PROFILE ###########################################################################*/


    public function profile(Request $request)

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $epreuves = Epreuve::get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.profile', compact('academicyearP', 'semesterP', 'student', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    public function editStudent(Request $request)

    {



        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        /*
            if ($request->filled('name')) {
            $teacher->name = $request->name;
            }
            if ($request->filled('surname')) {
            $teacher->surname = $request->surname;
            }
*/

        $date = date_create($request->input('dateofbirth'));
        $dateofbirth = date_format($date, "Y-m-d");

        if ($request->filled('dateofbirth')) {
            $student->dateofbirth = $dateofbirth;
        }

        if ($request->filled('gender')) {
            $student->gender = $request->input('gender');
        }

        if ($request->filled('address')) {
            $student->address = $request->input('address');
        }
        if ($request->filled('tel')) {
            $student->tel = $request->input('tel');
        }
        if ($request->filled('email')) {
            $student->email = $request->input('email');
        }

        $student->save();

        return redirect('/student/EditProfile')->with('status1', 'Modification pris en compte!');
    }


    public function EditProfile(Request $request)

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.EditProfile', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    /*############ END PROFILE  ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START NOTE ###########################################################################*/

    public function mark()

    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semester = Semester::where('state', 'process')->first();
        $marks = $student->marks()->where('semester_id', $semester->id)->get();

        $classroom = $student->classroom;
        $subjects = Subject::where('classroom_id', $student->classroom_id)->get();
        $epreuves = Epreuve::get();
        $tests = $student->tests()->get();
        // $academicyearP=$student->academicyears()->where('state','process')->first();

        //Newly added
        /* if($student->tests()->count() >= 1){
        $testsP=$student->tests()->where('academicyear_id',$academicyearP->id)->orderBy('type','ASC')->get();
        }
       */

        $testsP = $student->tests()->where('academicyear_id', $academicyearP->id)->orderBy('type', 'ASC')->get();

        $Bdeltn = Bde::get();
        $Forumltn = Forum::get();

        #To work on it
        #$academicyearsD=$student->academicyears()->where('state','done')->get();

        #$academicyears=Academicyear::get();



        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Markltns = Sltn::where('student_id', $student->id)->where('type', 'MARK')->get();

            foreach ($Markltns as $Markltn) {

                $Markltn->state = 'read';
                $Markltn->save();
            }
        }


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.mark', compact('academicyearP', 'subjects', 'epreuves', 'classroom', 'academicyearP', 'semester', 'student', 'marks', 'tests', 'testsP', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    /*############ END NOTE ###########################################################################*/


    /*############ START HOMEWORK ###########################################################################*/

    public function homework()

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        //      $ressources=$teacher->ressources()->orderBy('created_at','DESC')->get();
        $classrooms = Classroom::get();
        $ahomeworks = $student->ahomeworks()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //        $homeworks=Homeworks()->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $subjects = Subject::where('classroom_id', $student->classroom_id)->orderBy('created_at', 'DESC')->get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Testltns = Sltn::where('student_id', $student->id)->where('type', 'TEST')->get();

            foreach ($Testltns as $Testltn) {

                $Testltn->state = 'read';
                $Testltn->save();
            }
        }



        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.homework', compact('academicyearP', 'student', 'subjects', 'classrooms', 'ahomeworks', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    public function CreateAhomework(Request $request)

    {

        $this->validate(request(), [

            'upload_file' =>  'required',

        ]);

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $ahomework = Ahomework::create([

            'label' => request('label'),
            'student_id' => $student->id,
            'homework_id' => request('homework_id'),
            'academicyear_id' => $academicyearP->id,
        ]);

        if (request()->hasFile('upload_file')) {
            $uploadedFile = $request->file('upload_file');
            $FileName = $student->name . ' ' . $student->surname . '_' . $ahomework->label . '.' . $uploadedFile->getClientOriginalExtension();
            $destinationPath = public_path('/files/ahomework/');
            $uploadedFile->move($destinationPath, $FileName);
            $ahomework->upload = $FileName;
            $ahomework->save();
        }

        return redirect('/student/homework')->with('status1', 'Reponse envoyé!');
    }

    public function DeleteHomework(Request $request)

    {

        $calendar = Calendar::find($request->input('id'));

        $calendar->delete();


        return redirect('/teacher/homework')->with('status2', 'La date a été supprimée avec succès!');
    }


    /*############ END HOMEWORK ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START RESSOURCE ###########################################################################*/

    public function standard()

    {


        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $classroom = $student->classroom;
        $ressources = $classroom->ressources()->whereNull('teacher_id')->orderBy('created_at', 'DESC')->get();


        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Ressourceltns = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->get();

            foreach ($Ressourceltns as $Ressourceltn) {

                $Ressourceltn->state = 'read';
                $Ressourceltn->save();
            }
        }


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.standard', compact('academicyearP', 'student', 'classroom', 'ressources', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    public function materiel()

    {


        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $classroom = $student->classroom;
        $ressources = $classroom->ressources()->whereNotNull('teacher_id')->orderBy('created_at', 'DESC')->get();
        $ressources1 = $student->ressources()->whereNotNull('teacher_id')->orderBy('created_at', 'DESC')->get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Ressourceltns = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->get();

            foreach ($Ressourceltns as $Ressourceltn) {

                $Ressourceltn->state = 'read';
                $Ressourceltn->save();
            }
        }


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.materiel', compact('academicyearP', 'student', 'classroom', 'ressources', 'ressources1', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    /*############ END RESSOURCE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START FORUM ###########################################################################*/

    public function forum()

    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $forums = Forum::orderBy('created_at', 'DESC')->get();
        $fthemes = Ftheme::get();
        $subjects = Subject::get();
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $tests = Test::get();
        $epreuves = Epreuve::get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Forumltns = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->get();

            foreach ($Forumltns as $Forumltn) {

                $Forumltn->state = 'read';
                $Forumltn->save();
            }
        }


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.forum', compact('academicyearP', 'forums', 'student', 'calendars', 'fthemes', 'subjects', 'epreuves', 'tests', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    public function BestComment()

    {
        $commentfrm = Commentfrm::find(request('commentfrm_id'));

        $commentfrm->state = 1;
        $commentfrm->save();

        return redirect('/student/forum');
    }

    public function UnBestComment()

    {
        $commentfrm = Commentfrm::find(request('commentfrm_id'));

        $commentfrm->state = 0;
        $commentfrm->save();

        return redirect('/student/forum');
    }



    public function specForum(Ftheme $ftheme)

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $forums = Forum::where('ftheme_id', $ftheme->id)->orderBy('created_at', 'DESC')->get();
        $specFtheme = Ftheme::find($ftheme->id);
        $fthemes = Ftheme::get();
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $subjects = Subject::get();
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $tests = Test::get();
        $epreuves = Epreuve::get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.specForum', compact('academicyearP', 'forums', 'student', 'calendars', 'fthemes', 'specFtheme', 'subjects', 'calendars', 'tests', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    public function setForum()

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $fthemes = Ftheme::get();
        $forums = $student->forums()->orderBy('created_at', 'DESC')->get();
        $subjects = Subject::get();
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $tests = Test::get();
        $epreuves = Epreuve::get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.setForum', compact('academicyearP', 'fthemes', 'forums', 'student', 'subjects', 'calendars', 'tests', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    public function CreateForum()

    {
        $this->validate(request(), [

            'ftheme_id' => 'required',
            'title' =>  'required',
            'description' =>  'required',
        ]);

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $forum = Forum::create([

            'title' => request('title'),
            'description' => request('description'),
            'student_id' => Auth::user()->id,
            'ftheme_id' => request('ftheme_id'),
            'academicyear_id' => $academicyearP->id,
        ]);

        return redirect('/student/setForum?q=' . $forum->id . '#F' . $forum->id)->with('status1', 'Commentaire ajouté!');
    }

    public function CreateCommentfrm()

    {
        $this->validate(request(), [

            'description' =>  'required',
        ]);

        $student = Student::find(Auth::user()->id);

        $commentfrm = Commentfrm::create([

            'description' => request('description'),
            'student_id' => Auth::user()->id,
            'forum_id' => request('forum_id'),
        ]);


        #####// START Inform the forum owner
        if ($commentfrm->forum->student->id !== $student->id) {

            $ltn = Sltn::create([
                'label' => 'Votre sujet ' . $commentfrm->forum->title . ' a été commenté par ' . $student->name . ' ' . $student->surname,
                'type' => 'FORUM',
                'reference' => $commentfrm->forum_id,
                'student_id' => $commentfrm->forum->student->id, // Inform the forum owner
            ]);
        }
        #####// END Inform the forum owner

        $oldcommenters = Commentfrm::where('forum_id', $commentfrm->forum_id)->get();

        #####// START GET ARRAY OF UNIQUE STUDENT OLDCOMMENTERS ID
        $StudentCommentersID = array();

        foreach ($oldcommenters as $oldcommenter) {

            array_push($StudentCommentersID, $oldcommenter->student->id);
        }

        $collection = collect($StudentCommentersID);
        $unique = $collection->unique();
        $UniqueStudentCommentersID = $unique->values()->all();

        ######//END GET ARRAY OF UNIQUE STUDENT OLDCOMMENTERS ID


        for ($i = 0; $i <= count($UniqueStudentCommentersID); $i++) {

            if ($UniqueStudentCommentersID[$i] == $student->id or $UniqueStudentCommentersID[$i] == $commentfrm->forum->student->id) {

                unset($UniqueStudentCommentersID[$i]);
            }
        }

        #####// START Inform the commenters of the forum

        if (count($UniqueStudentCommentersID) >= 1) {

            foreach ($UniqueStudentCommentersID as $ID) {

                $ltn = Sltn::create([
                    'label' => 'Le sujet ' . $commentfrm->forum->title . ' auquel vous avez réagi, a été commenté par ' . $student->name . ' ' . $student->surname,
                    'type' => 'FORUM',
                    'reference' => $commentfrm->forum_id,
                    'student_id' => $ID, // Inform the commenters of the forum
                ]);
            }
        }
        #####// END Inform the commenters of the forum


        if (request('create') == 'specF') {
            return redirect('/student/specForum/' . request('link') . '?q=' . request('forum_id') . '#F' . request('forum_id'))->with('status1', 'Commentaire ajouté!');
        } else if (request('create') == 'normF') {
            return redirect('/student/forum?q=' . request('forum_id') . '#F' . request('forum_id'))->with('status1', 'Commentaire ajouté!');
        } else {
            return redirect('/student/setForum?q=' . request('forum_id') . '#F' . request('forum_id'))->with('status1', 'Commentaire ajouté!');
        }
    }


    /*############ END FORUM ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ SCHOOL NEWS ###########################################################################*/

    public function schoolNews()

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $news = Actuality::where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Newsltns = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->get();

            foreach ($Newsltns as $Newsltn) {

                $Newsltn->state = 'read';
                $Newsltn->save();
            }
        }

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.schoolNews', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'news', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }



    public function schoolBde()

    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $BDEnews = Bde::orderBy('created_at', 'DESC')->get();

        if ($k = 'clicked') {

            $Bdeltns = Sltn::where('student_id', $student->id)->where('type', 'BDE')->get();

            foreach ($Bdeltns as $Bdeltn) {

                $Bdeltn->state = 'read';
                $Bdeltn->save();
            }
        }


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.schoolBde', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'BDEnews', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    public function CreateBDE(Request $request)

    {


        $this->validate(request(), [

            'title' => 'required',
            'description' => 'required',

        ]);

        $news = Bde::create([

            'title' => request('title'),
            'description' => request('description'),

        ]);

        if (request()->hasFile('upload_file')) {
            $uploadedFile = $request->file('upload_file');
            $FileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $extension = $uploadedFile->getClientOriginalExtension();
            $destinationPath = public_path('/files/schoolNews/');
            $uploadedFile->move($destinationPath, $FileName);
            $news->upload = $FileName;
            $news->extension = $extension;
        }
        $news->save();

        $students = Student::get();
        foreach ($students as $student) {

            $ltn = Sltn::create([
                'label' => $news->title,
                'type' => 'BDE',
                'student_id' => $student->id,
            ]);
        }



        return redirect('/student/schoolBde?q=Created')->with('status1', 'Nouvelle Actualité ajoutée!');
    }


    public function adTeam()

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.adTeam', compact('academicyearP', 'student', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    /*############ END SCHOOL NEWS ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START TIMETABLE ###########################################################################*/

    public function findTimetable()
    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        $classroom = $student->classroom;
        $Timetable = $classroom->subjects()->get();
        #8
        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi8 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '08:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi8)) {
                    $lundi8 = 'X';
                }
            }
        } //endfor



        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi8 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '08:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi8)) {
                    $mardi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi8 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '08:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi8)) {
                    $mercredi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi8 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '08:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi8)) {
                    $jeudi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi8 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '08:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi8)) {
                    $vendredi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi8 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '08:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi8)) {
                    $samedi8 = 'X';
                }
            }
        } //endfor

        #9

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi9 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '09:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi9)) {
                    $lundi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi9 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '09:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi9)) {
                    $mardi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi9 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '09:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi9)) {
                    $mercredi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi9 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '09:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi9)) {
                    $jeudi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi9 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '09:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi9)) {
                    $vendredi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi9 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '09:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi9)) {
                    $samedi9 = 'X';
                }
            }
        } //endfor
        #10

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi10 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '10:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi10)) {
                    $lundi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi10 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '10:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi10)) {
                    $mardi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi10 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '10:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi10)) {
                    $mercredi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi10 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '10:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi10)) {
                    $jeudi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi10 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '10:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi10)) {
                    $vendredi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi10 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '10:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi10)) {
                    $samedi10 = 'X';
                }
            }
        } //endfor



        #11

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi11 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '11:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi11)) {
                    $lundi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi11 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '11:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi11)) {
                    $mardi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi11 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '11:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi11)) {
                    $mercredi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi11 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '11:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi11)) {
                    $jeudi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi11 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '11:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi11)) {
                    $vendredi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi11 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '11:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi11)) {
                    $samedi11 = 'X';
                }
            }
        } //endfor



        #12

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi12 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '12:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi12)) {
                    $lundi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi12 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '12:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi12)) {
                    $mardi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi12 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '12:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi12)) {
                    $mercredi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi12 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '12:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi12)) {
                    $jeudi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi12 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '12:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi12)) {
                    $vendredi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi12 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '12:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi12)) {
                    $samedi12 = 'X';
                }
            }
        } //endfor


        #13

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi13 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '13:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi13)) {
                    $lundi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi13 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '13:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi13)) {
                    $mardi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi13 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '13:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi13)) {
                    $mercredi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi13 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '13:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi13)) {
                    $jeudi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi13 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '13:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi13)) {
                    $vendredi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi13 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '13:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi13)) {
                    $samedi13 = 'X';
                }
            }
        } //endfor


        #14

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi14 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '14:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi14)) {
                    $lundi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi14 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '14:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi14)) {
                    $mardi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi14 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '14:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi14)) {
                    $mercredi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi14 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '14:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi14)) {
                    $jeudi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi14 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '14:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi14)) {
                    $vendredi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi14 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '14:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi14)) {
                    $samedi14 = 'X';
                }
            }
        } //endfor



        #15

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi15 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '15:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi15)) {
                    $lundi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi15 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '15:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi15)) {
                    $mardi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi15 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '15:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi15)) {
                    $mercredi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi15 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '15:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi15)) {
                    $jeudi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi15 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '15:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi15)) {
                    $vendredi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi15 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '15:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi15)) {
                    $samedi15 = 'X';
                }
            }
        } //endfor



        #16

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi16 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '16:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi16)) {
                    $lundi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi16 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '16:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi16)) {
                    $mardi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi16 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '16:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi16)) {
                    $mercredi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi16 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '16:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi16)) {
                    $jeudi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi16 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '16:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi16)) {
                    $vendredi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi16 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '16:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi16)) {
                    $samedi16 = 'X';
                }
            }
        } //endfor

        #17

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi17 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '17:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi17)) {
                    $lundi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi17 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '17:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi17)) {
                    $mardi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi17 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '17:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi17)) {
                    $mercredi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi17 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '17:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi17)) {
                    $jeudi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi17 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '17:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi17)) {
                    $vendredi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi17 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '17:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi17)) {
                    $samedi17 = 'X';
                }
            }
        } //endfor



        #18

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi18 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '18:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi18)) {
                    $lundi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi18 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '18:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi18)) {
                    $mardi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi18 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '18:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi18)) {
                    $mercredi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi18 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '18:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi18)) {
                    $jeudi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi18 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '18:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi18)) {
                    $vendredi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi18 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '18:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi18)) {
                    $samedi18 = 'X';
                }
            }
        } //endfor



        #19

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi19 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '19:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi19)) {
                    $lundi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi19 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '19:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi19)) {
                    $mardi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi19 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '19:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi19)) {
                    $mercredi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi19 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '19:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi19)) {
                    $jeudi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi19 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '19:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi19)) {
                    $vendredi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi19 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '19:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi19)) {
                    $samedi19 = 'X';
                }
            }
        } //endfor


        #20

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi20 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '20:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi20)) {
                    $lundi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi20 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '20:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi20)) {
                    $mardi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi20 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '20:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi20)) {
                    $mercredi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi20 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '20:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi20)) {
                    $jeudi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi20 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '20:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi20)) {
                    $vendredi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi20 = $semesterP->subjects()->where('classroom_id', $classroom->id)->where('startime', '20:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi20)) {
                    $samedi20 = 'X';
                }
            }
        } //endfor



        return view('student.findTimetable', compact('academicyearP', 'student', 'classroom', 'Timetable', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn', 'lundi8', 'mardi8', 'mercredi8', 'jeudi8', 'vendredi8', 'samedi8', 'lundi9', 'mardi9', 'mercredi9', 'jeudi9', 'vendredi9', 'samedi9', 'lundi10', 'mardi10', 'mercredi10', 'jeudi10', 'vendredi10', 'samedi10', 'lundi11', 'mardi11', 'mercredi11', 'jeudi11', 'vendredi11', 'samedi11', 'lundi12', 'mardi12', 'mercredi12', 'jeudi12', 'vendredi12', 'samedi12', 'lundi13', 'mardi13', 'mercredi13', 'jeudi13', 'vendredi13', 'samedi13', 'lundi14', 'mardi14', 'mercredi14', 'jeudi14', 'vendredi14', 'samedi14', 'lundi15', 'mardi15', 'mercredi15', 'jeudi15', 'vendredi15', 'samedi15', 'lundi16', 'mardi16', 'mercredi16', 'jeudi16', 'vendredi16', 'samedi16', 'lundi17', 'mardi17', 'mercredi17', 'jeudi17', 'vendredi17', 'samedi17', 'lundi18', 'mardi18', 'mercredi18', 'jeudi18', 'vendredi18', 'samedi18', 'lundi19', 'mardi19', 'mercredi19', 'jeudi19', 'vendredi19', 'samedi19', 'lundi20', 'mardi20', 'mercredi20', 'jeudi20', 'vendredi20', 'samedi20'));
    }


    /*############ END TIMETABLE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START QUIZ ###########################################################################*/

    public function quiz()

    {

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $classroom = $student->classroom;
        $questions = Question::where('classroom_id', $student->classroom->id)->orderBy('created_at', 'DESC')->get();
        $subjects = $semesterP->subjects()->where('classroom_id', $student->classroom->id)->get();
        $Qsubjects = $semesterP->subjects()->where('classroom_id', $student->classroom->id)->get();
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $tests = Test::get();
        $epreuves = Epreuve::get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Quizltns = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->get();

            foreach ($Quizltns as $Quizltn) {

                $Quizltn->state = 'read';
                $Quizltn->save();
            }
        }


        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('student.quiz', compact('questions', 'academicyearP', 'student', 'classroom', 'calendars', 'subjects', 'Qsubjects', 'epreuves', 'tests', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }



    public function specQuiz(Subject $subject)

    {


        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $classroom = $student->classroom;
        $questions = Question::where('subject_id', $subject->id)->orderBy('created_at', 'DESC')->get();
        $specSubject = Subject::find($subject->id);
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $subjects = $semesterP->subjects()->where('classroom_id', $student->classroom->id)->get();
        $Qsubjects = $semesterP->subjects()->where('classroom_id', $student->classroom->id)->get();
        //dd($Qsubjects);
        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $tests = Test::get();
        $epreuves = Epreuve::get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        $AQsubjects = $Qsubjects->pluck('id')->toArray();

        //dd($subject->id);

        if (!in_array($subject->id, $AQsubjects)) { // IF SUBJECT IS TAUGHT IN THE CLASSROOM

            return redirect('/student');
        }

        return view('student.specQuiz', compact('academicyearP', 'questions', 'student', 'classroom', 'calendars', 'specSubject', 'subjects', 'Qsubjects', 'calendars', 'tests', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    public function setQuiz()

    {
        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $classroom = $student->classroom;
        $questions = Question::where('student_id', $student->id)->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        $subjects = $semesterP->subjects()->where('classroom_id', $student->classroom->id)->get();
        $Qsubjects = $semesterP->subjects()->where('classroom_id', $student->classroom->id)->get();

        $calendars = Calendar::where('classroom_id', $student->classroom_id)->get();
        $tests = Test::get();
        $epreuves = Epreuve::get();

        $Markltn = Sltn::where('student_id', $student->id)->where('type', 'MARK')->where('state', 'unread')->get();
        $Ressourceltn = Sltn::where('student_id', $student->id)->where('type', 'RESSOURCE')->where('state', 'unread')->get();
        $Testltn = Sltn::where('student_id', $student->id)->where('type', 'TEST')->where('state', 'unread')->get();
        $Calendarltn = Sltn::where('student_id', $student->id)->where('type', 'CALENDAR')->where('state', 'unread')->get();
        $Bdeltn = Sltn::where('student_id', $student->id)->where('type', 'BDE')->where('state', 'unread')->get();
        $Forumltn = Sltn::where('student_id', $student->id)->where('type', 'FORUM')->where('state', 'unread')->get();
        $Newsltn = Sltn::where('student_id', $student->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Sltn::where('student_id', $student->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Sltn::where('student_id', $student->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('student.setQuiz', compact('academicyearP', 'questions', 'classroom', 'student', 'subjects', 'Qsubjects', 'calendars', 'tests', 'epreuves', 'Calendarltn', 'Testltn', 'Ressourceltn', 'Markltn', 'Bdeltn', 'Forumltn', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    public function CreateQuiz()

    {
        $this->validate(request(), [

            'subject_id' => 'required',
            //  'title' =>  'required',
            'description' =>  'required',
        ]);

        $student = Student::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $subject = Subject::find(request('subject_id'));

        $question = Question::create([

            'title' => $subject->name,
            'description' => request('description'),
            'student_id' => Auth::user()->id,
            'subject_id' => request('subject_id'),
            'classroom_id' => request('classroom_id'),
            'academicyear_id' => $academicyearP->id,
        ]);


        $limit = 75;
        if (strlen($question->description) > $limit) {

            $summary = substr(
                $question->description,
                0,
                strrpos(substr($question->description, 0, $limit), ' ')
            ) . '...';
        } else {

            $summary = $question->description;
        }


        #####// START Inform the teacher
        $tltn = Tltn::create([
            'label' =>  $question->student->name . ' ' . $question->student->surname . ' vient de poser la question ( ' . $summary . ' ) concernant la matière : ' . $question->title,

            'type' => 'QUIZ',
            'reference' => $question->id,
            'teacher_id' => $question->subject->teacher->id, // Inform the teacher
        ]);
        #####// END Inform the teacher

        #####// START Inform the class


        foreach ($question->subject->classroom->students as $student) {

            if ($student->id !== Auth::user()->id) {

                $ltn = Sltn::create([
                    'label' =>  $question->student->name . ' ' . $question->student->surname . ' vient de poser la question ( ' . $summary . ' ) concernant la matière : ' . $question->title,
                    'type' => 'QUIZ',
                    'reference' => $question->id,
                    'student_id' => $student->id, // Inform the class
                ]);
            }
        }

        #####// END Inform the class


        return redirect('/student/setQuiz?q=' . $question->id . '#Q' . $question->id)->with('status1', 'Commentaire ajouté!');
    }

    public function CreateQcomment()

    {
        $this->validate(request(), [

            'description' =>  'required',
        ]);

        $student = Student::find(Auth::user()->id);

        $Qcomment = Qcomment::create([

            'description' => request('description'),
            'student_id' => Auth::user()->id,
            'question_id' => request('question_id'),
            // 'teacher_id'=> request('teacher_id'),
        ]);

        $limit = 75;
        if (strlen($Qcomment->question->description) > $limit) {

            $summary = substr(
                $Qcomment->question->description,
                0,
                strrpos(substr($Qcomment->question->description, 0, $limit), ' ')
            ) . '...';
        } else {

            $summary = $Qcomment->question->description;
        }


        #####// START Inform the teacher
        $tltn = Tltn::create([
            'label' =>  $Qcomment->student->name . ' ' . $Qcomment->student->surname . ' vient de réagir à la question ( ' . $summary . ' ) concernant la matière : ' . $Qcomment->question->title,

            'type' => 'QUIZ',
            'reference' => $Qcomment->question->id,
            'teacher_id' => request('teacher_id'), // Inform the teacher
        ]);
        #####// END Inform the teacher


        #####// START Inform the class


        foreach ($Qcomment->question->subject->classroom->students as $student) {

            if ($student->id !== Auth::user()->id) {

                $ltn = Sltn::create([
                    'label' => 'La question (' . $summary . ') a été commenté par ' . $Qcomment->student->name . ' ' . $Qcomment->student->surname,
                    'type' => 'QUIZ',
                    'reference' => $Qcomment->question->id,
                    'student_id' => $student->id, // Inform the class
                ]);
            }
        }

        #####// END Inform the class


        if (request('create') == 'specQ') {
            return redirect('/student/specQuiz/' . request('link') . '?q=' . request('question_id') . '#Q' . request('question_id'))->with('status1', 'Commentaire ajouté!');
        } else if (request('create') == 'normQ') {
            return redirect('/student/quiz?q=' . request('question_id') . '#Q' . request('question_id'))->with('status1', 'Commentaire ajouté!');
        } else {
            return redirect('/student/setQuiz?q=' . request('question_id') . '#Q' . request('question_id'))->with('status1', 'Commentaire ajouté!');
        }
    }


    /*############ END QUIZ ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
