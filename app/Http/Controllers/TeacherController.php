<?php

namespace App\Http\Controllers;

// use Auth;
use App\Teacher;
use App\Absence;
use App\Student;
use App\Test;
use App\Classroom;
use App\Ressource;
use App\Actuality;
use App\Calendar;
use App\Epreuve;
use App\Cahier;
use App\Homework;
use App\Ahomework;
use App\Academicyear;
use App\Semester;
use App\Subject;
use App\Subjectavg;
use App\Mark;
use App\BDE;
use App\Sltn;
use App\Tltn;
use App\Question;
use App\Qcomment;
use App\Tmsg;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /*############ START DASHBOARD ###########################################################################*/

    public function index()
    {

        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        // dd($subjects);
        #$ressources=$teacher->ressources()->get();
        $students = Student::where('responsable', 1)->get();
        $classrooms = Classroom::get();
        $tests = Test::get();
        $news = Actuality::where('academicyear_id', $academicyearP)->get();
        $calendars = $teacher->calendars()->get();
        $epreuves = Epreuve::get();

        //GET ARRAY OF UNIQUE CLASSROOM ID
        $ClasSubjs = array();

        foreach ($subjects as $subject) {

            array_push($ClasSubjs, $subject->classroom_id);
        }

        $collection = collect($ClasSubjs);
        $unique = $collection->unique();
        $UniqueClasSubjs = $unique->values()->all();
        //GET ARRAY OF UNIQUE CLASSROOM ID


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('teacher.dashboard', compact('academicyearP', 'teacher', 'subjects', 'students', 'classrooms', 'tests', 'news', 'calendars', 'epreuves', 'UniqueClasSubjs', 'tltns', 'Newsltn', 'Messageltn', 'Quizltn'));
    }

    /*############ END DASHBOARD ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START NOTIFICATION ###########################################################################*/


    public function notification(Request $request)

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('teacher.notification', compact('academicyearP', 'teacher', 'tltns', 'Newsltn', 'Messageltn', 'Quizltn'));
    }


    public function specnotif(Request $request)

    {
        $q = request()->get('q');

        $teacher = teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('teacher.specnotif', compact('academicyearP', 'teacher', 'tltns', 'Newsltn', 'Messageltn', 'Quizltn', 'q'));
    }


    /*############ END NOTIFICATION  ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START MESSAGE ###########################################################################*/

    public function message(Request $request)

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        //$tmsgs=$teacher->Tmsgs()->orderBy('created_at','ASC')->get();
        //$tmsg=Tmsg::find(2);
        //$tmsgs=$tmsg->teachers()->get();
        $tmsgs = $teacher->tmsgs()->get();
        //dd($tmsgs);
        //$tmsgs=Tmsg::orderBy('created_at','ASC')->get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Messageltns = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->get();

            foreach ($Messageltns as $Messageltn) {

                $Messageltn->state = 'read';
                $Messageltn->save();
            }
        }

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('teacher.message', compact('academicyearP', 'teacher', 'Newsltn', 'Messageltn', 'tltns', 'tmsgs', 'Quizltn'));
    }

    /*############ END MESSAGE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############  PROFILE ###########################################################################*/

    public function profile(Request $request)

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $epreuves = Epreuve::get();

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.editProfile', compact('academicyearP', 'teacher', 'epreuves', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    public function EditProfile(Request $request)

    {

        if ($request->filled('password')) {
            $this->validate(request(), [
                'password' => 'confirmed|min:8',
            ]);
        }

        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        $date = date_create($request->dateofbirth);
        $dateofbirth = date_format($date, "Y-m-d");

        if ($request->filled('dateofbirth')) {
            $teacher->dateofbirth = $dateofbirth;
        }
        if ($request->filled('nationality')) {
            $teacher->nationality = $request->nationality;
        }

        if ($request->filled('address')) {
            $teacher->address = $request->address;
        }
        if ($request->filled('tel')) {
            $teacher->tel = $request->tel;
        }
        if ($request->filled('email')) {
            $teacher->email = $request->email;
        }
        if ($request->filled('speciality')) {
            $teacher->speciality = $request->speciality;
        }
        if ($request->filled('password')) {
            $teacher->image = $request->password;
            $teacher->password = $request->password;
        }

        $teacher->save();

        return redirect('/teacher/profile')->with('status1', 'Modification pris en compte!');
    }




    /*############ END PROFILE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############  SCHOOL INFOS ###########################################################################*/

    public function schoolNews()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $news = Actuality::where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        $calendars = $teacher->calendars()->get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Newsltns = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->get();

            foreach ($Newsltns as $Newsltn) {

                $Newsltn->state = 'read';
                $Newsltn->save();
            }
        }

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();



        return view('teacher.schoolNews', compact('academicyearP', 'teacher', 'news', 'calendars', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }

    public function schoolBde()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $BDEnews = Bde::orderBy('created_at', 'DESC')->get();

        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.schoolBde', compact('academicyearP', 'teacher', 'BDEnews', 'calendars', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }




    public function adTeam()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.adTeam', compact('academicyearP', 'teacher', 'calendars', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    /*############ END SCHOOL INFO ###############################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START NOTE ###########################################################################*/

    public function mark()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $semesterP = Semester::where('state', 'process')->first();
        $classrooms = Classroom::get();
        $students = Student::orderBy('surname', 'ASC')->get();
        $homeworks = $teacher->homeworks()->get();
        $epreuves = Epreuve::get();
        $marks = Mark::get();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();

        $semesterP = Semester::where('state', 'process')->first();
        $academicyearP = Academicyear::where('state', 'process')->first();

        $testsP = $teacher->tests()->where('academicyear_id', $academicyearP->id)->where('semester_id', $semesterP->id)->orderBy('type', 'ASC')->get();

        $testExamen = $teacher->tests()->where('semester_id', $semesterP->id)->where('type', 3)->get();


        $academicyearD = Academicyear::where('state', 'done')->get();
        $academicyears = Academicyear::get();

        //GET ARRAY OF UNIQUE SUBJECT ID
        $SubjTests = array();

        foreach ($testsP as $testP) {

            array_push($SubjTests, $testP->subject_id);
        }

        $collection = collect($SubjTests);
        $unique = $collection->unique();
        $UniqueSubjTests = $unique->values()->all();
        //GET ARRAY OF UNIQUE SUBJECT ID

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.mark', compact('teacher', 'subjects', 'testExamen', 'semesterP', 'classrooms', 'homeworks', 'epreuves', 'semesterP', 'academicyearP', 'academicyearD', 'testsP', 'academicyears', 'students', 'UniqueSubjTests', 'marks', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    public function CreateMark(Request $request)

    {

        $students = Student::where('classroom_id', request('classroom_id'))->get();
        $semesterP = Semester::where('state', 'process')->first();


        $test = Test::find(request('test_id'));

        foreach ($students as $student) {

            $note = Mark::create([
                'value' => request($student->id),
                'type' => $test->type,
                'student_id' => $student->id,
                'test_id' => $test->id,
                'subject_id' => $test->subject_id,
                'semester_id' => $semesterP->id,
            ]);
        }

        //dd($test);
        $test->state = 1;

        $test->save();

        $ltnSubject = Subject::find($test->subject_id);
        $ltnEpreuve = Epreuve::find($test->type);
        $ltnNum = $test->testNum;

        foreach ($students as $student) {

            $ltn = Sltn::create([
                'label' => 'La note ' . $ltnEpreuve->name . ' ' . $ltnNum . ' de la matière ' . $ltnSubject->name . ' est disponible',
                'type' => 'MARK',
                'reference' => $note->id,
                'student_id' => $student->id,
            ]);
        }



        return redirect('/teacher/mark')->with('status3', 'Les notes ont été ajoutées avec success!');
    }

    public function CreateAbsMark(Request $request)

    {
        $test = Test::find(request('test_id'));
        $semesterP = Semester::where('state', 'process')->first();

        $note = Mark::create([
            'value' => request('value'),
            'type' => $test->type,
            'student_id' => request('student_id'),
            'test_id' => request('test_id'),
            'subject_id' => $test->subject_id,
            'semester_id' => $semesterP->id,
        ]);




        $test->state = 1;
        $test->save();


        $ltnSubject = Subject::find($test->subject_id);
        $ltnEpreuve = Epreuve::find($test->type);
        // dd($test);
        $ltnNum = $test->testNum;


        $ltn = Sltn::create([
            'label' => 'La note ' . $ltnEpreuve->name . ' ' . $ltnNum . ' de la matière ' . $ltnSubject->name . ' est disponible',
            'type' => 'MARK',
            'reference' => $note->id,
            'student_id' => request('student_id'),
        ]);

        return redirect('/teacher/mark')->with('status7', 'La note a été ajoutée avec success!');
    }



    public function EditMark(Request $request)

    {

        $mark = Mark::find(request('mark_id'));
        $mark->value = request('value');
        $mark->save();


        return redirect('/teacher/mark')->with('status5', 'La note a été modifiée avec success!');
    }

    public function DeleteMark(Request $request)

    {
        //   dd($request->all());

        $test = Test::find($request->id);
        $marks = Mark::where('test_id', $test->id)->get();
        foreach ($marks as $mark) {
            $mark->delete();
        }
        $test->delete();

        return redirect('/teacher/mark')->with('status6', 'La liste de note saisie a été supprimée avec succès!');
    }


    public function CreateTest(Request $request)/*CREATE MARK LIST*/

    {

        $this->validate(request(), [

            'academicyear_id' =>  'required',
            'type' =>  'required',
            'subject_id' => 'required',

        ]);

        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $tests = $teacher->tests()->where('academicyear_id', $academicyearP->id)->where('semester_id', $semesterP->id)->where('subject_id', request('subject_id'))->get();
        $testNum = $tests->where('type', (request('type')))->count();
        // dd($tests,$testNum,request('type'));
        $subject = Subject::find(request('subject_id'));
        $classroom_id = $subject->classroom->id;


        // $testNum=Test::where('subject_id',request('subject_id'))->where('type',(request('type')))->count();

        foreach ($tests as $test) {

            if ($test->subject_id == request('subject_id') and $test->state == 0) {

                $subject = $teacher->subjects()->where('id', $test->subject_id)->first();
                $academicyearP = Academicyear::where('state', 'process')->first();

                return redirect('/teacher/mark')->with('status2', $academicyearP->labelYear . ' / ' . $semesterP->label . ' / ' . $subject->name . ' / ' . $subject->classroom->name);
            } elseif ($test->subject_id == request('subject_id') and $test->type == 3) {


                return redirect('/teacher/mark')->with('status0', 'Il ne peut pas exister 2 notes EXAMENS pour la matière ' . $subject->name . ' dans la classe ' . $subject->classroom->name . ' au compte du ' . $semesterP->label);
            }
        }


        $test = Test::create([

            'academicyear_id' => request('academicyear_id'),
            'semester_id' => request('semester_id'),
            'subject_id' => request('subject_id'),
            'classroom_id' => $classroom_id,
            'teacher_id' => $teacher->id,
            'type' => request('type'),
            'state' => 0,
            'testNum' => ++$testNum,
            'upload' => 'testprogrammation.pdf',

        ]);


        return redirect('/teacher/mark')->with('status1', 'Nouvelle Liste de Note ajoutée!');
    }

    public function DeleteTest(Request $request)

    {
        //   dd($request->all());

        $test = Test::find($request->id);

        $test->delete();

        return redirect('/teacher/mark')->with('status4', 'La liste de note a été supprimée avec succès!');
    }




    /*############ END NOTE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START SUBJECT AVG  ###########################################################################*/

    public function CreateSubjectAvg(Request $request)
    {

        ini_set('max_execution_time', 18000); //3 minutes

        $semesterP = Semester::where('state', 'process')->first();
        $subject = Subject::find($request->subjID);
        $tests = $subject->tests()->where('semester_id', $semesterP->id)->get();
        $extest = $tests->where('type', 3)->count();
        $classtest = $tests->whereIn('type', [1, 2])->count();

        $classroom = Classroom::find($subject->classroom_id);
        $Students = $classroom->students;


        if ($subject->marks->where('value', null)->where('semester_id', $semesterP->id)->count() > 0) { //IF ONE or Many STUDENTS MARK is NULL

            return redirect('/teacher/mark')->with('status02', $subject->name . ' / ' . $subject->classroom->name);
        }
        if ($extest == 0) { // IF NO EXAM MARK

            return redirect('/teacher/mark')->with('status01', $subject->name . ' / ' . $subject->classroom->name);
        }

        //  dd($classtest);

        if ($classtest == 0) { // IF CALCULATION WITH NO DEV, NO INTERRO, JUST EXAM

            foreach ($classroom->students as $student) {

                $exMark = $student->marks->where('subject_id', $subject->id)->where('type', 3)->where('semester_id', $semesterP->id)->first();

                //dd($exMark->value);

                $subjectavg = Subjectavg::create([

                    'label' => $subject->name,
                    'valueClass' => $exMark->value,
                    'valuExam' => $exMark->value,
                    'valueGrle' => $exMark->value,
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'classroom_id' => $subject->classroom->id,
                    'semester_id' => $semesterP->id,
                ]);
            }

            // START RANK CALCULATION

            $subjectavgs = Subjectavg::where('classroom_id', $classroom->id)
                ->where('subject_id', $subject->id)->where('semester_id', $semesterP->id)->orderBy('valueGrle', 'DESC')->get();


            foreach ($subjectavgs as $subjectavg) {

                $values = $subjectavgs->whereNotIn('id', [$subjectavg->id])->pluck('valueGrle')->toArray();

                $p = $subjectavgs->where('state', 'oui')->count();

                if (in_array($subjectavg->valueGrle, $values) and $subjectavg->state == 'non') {

                    //   dd('this number exist in array '.$subjectavg->value);
                    //   $subjectavg->rank = $r.'exe' ;
                    $avgs = $subjectavgs->where('valueGrle', $subjectavg->valueGrle)->all();

                    foreach ($avgs as $avg) {
                        $avg->rank = 1 + $p . 'ex';
                        $avg->state = 'oui';
                        $avg->save();
                    }
                } elseif (!in_array($subjectavg->valueGrle, $values) and $subjectavg->state == 'non') {
                    $subjectavg->rank = 1 + $p;
                    $subjectavg->state = 'oui';
                    $subjectavg->save();
                }
            }

            # code...
        } else { // IF CALCULATION WITH DEV,INTERRO,EXAM

            foreach ($classroom->students as $student) {



                $marks = $student->marks->where('subject_id', $subject->id)->where('semester_id', $semesterP->id)->whereNotIn('type', [3])->all();
                $exMark = $student->marks->where('subject_id', $subject->id)->where('semester_id', $semesterP->id)->where('type', 3)->first();


                $x = 0;
                $i = 0;

                foreach ($marks as $mark) {

                    $x = $x + $mark->value;

                    $i++;
                }

                $z = $x / $i;

                $MoyClass = round($z, 2);
                $g = ($MoyClass + $exMark->value) / 2;

                $MoyGrle = round($g, 2);

                // dd($exMark->value);

                $subjectavg = Subjectavg::create([

                    'label' => $subject->name,
                    'valueClass' => $MoyClass,
                    'valuExam' => $exMark->value,
                    'valueGrle' => $MoyGrle,
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'classroom_id' => $subject->classroom->id,
                    'semester_id' => $semesterP->id,
                ]);
            }

            // START RANK CALCULATION

            $subjectavgs = Subjectavg::where('classroom_id', $classroom->id)
                ->where('subject_id', $subject->id)->where('semester_id', $semesterP->id)->orderBy('valueGrle', 'DESC')->get();


            foreach ($subjectavgs as $subjectavg) {

                $values = $subjectavgs->whereNotIn('id', [$subjectavg->id])->pluck('valueGrle')->toArray();

                $p = $subjectavgs->where('state', 'oui')->count();

                if (in_array($subjectavg->valueGrle, $values) and $subjectavg->state == 'non') {

                    //   dd('this number exist in array '.$subjectavg->value);
                    //   $subjectavg->rank = $r.'exe' ;
                    $avgs = $subjectavgs->where('valueGrle', $subjectavg->valueGrle)->all();

                    foreach ($avgs as $avg) {
                        $avg->rank = 1 + $p . 'ex';
                        $avg->state = 'oui';
                        $avg->save();
                    }
                } elseif (!in_array($subjectavg->valueGrle, $values) and $subjectavg->state == 'non') {
                    $subjectavg->rank = 1 + $p;
                    $subjectavg->state = 'oui';
                    $subjectavg->save();
                }
            } // END RANK CALCULATION


        } // ENDIF CALCULATION WITH DEV,INTERRO,EXAM


        $subject->arretDesNotes = 1;
        $subject->save();

        return redirect('/teacher/mark')->with('status1', 'Les moyennes en ' . $subject->name . ' de ' . $classroom->name .  ' ont été bien calculée ');
    }
    /*############ END SUBJECT AVG ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------




    /*############ START CALENDAR ###########################################################################*/

    public function calendar()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $classrooms = Classroom::get();
        $epreuves = Epreuve::get();
        $calendars = $teacher->calendars()->where('semester_id', $semesterP->id)->get();

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.calendar', compact('academicyearP', 'teacher', 'subjects', 'epreuves', 'calendars', 'classrooms', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    public function CreateCalendar(Request $request)

    {

        $this->validate(request(), [

            'epreuve_id' => 'required',
            'date' =>  'required',
            'time' =>  'required',
            'subject_id' => 'required',
        ]);

        if (now() >= $request->date) {
            return redirect('/teacher/calendar')->with('status3', 'Délai non respecté, Veuillez reprendre!');
        }

        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $subject = $teacher->subjects()->where('id', request('subject_id'))->first();
        $semesterP = Semester::where('state', 'process')->first();
        $Tcalendar = Calendar::create([

            'epreuve_id' => request('epreuve_id'),
            'date' => request('date'),
            'time' => request('time'),
            'timing' => request('date') . " " . request('time'),
            'teacher_id' => Auth::user()->id,
            'subject_id' => request('subject_id'),
            'classroom_id' => $subject->classroom->id,
            'semester_id' => $semesterP->id,
        ]);

        $ltnSubject = Subject::find($Tcalendar->subject_id);
        $ltnEpreuve = Epreuve::find($Tcalendar->epreuve_id);

        $ClaStudent = Classroom::find($Tcalendar->classroom_id);

        $time = Carbon::parse($Tcalendar->time, 'UTC');
        $date = Carbon::parse($Tcalendar->date, 'UTC');


        foreach ($ClaStudent->students as $student) {

            $ltn = Sltn::create([
                'label' => $ltnEpreuve->name . ' de ' . $ltnSubject->name . ' ' . $date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY') .
                    ' à ' . date("G:i", strtotime($time)),

                'type' => 'CALENDAR',
                'reference' => $Tcalendar->id,
                'student_id' => $student->id,
            ]);
        }

        return redirect('/teacher/calendar')->with('status1', 'Nouvelle date ajoutée!');
    }

    public function DeleteCalendar(Request $request)

    {

        $calendar = Calendar::find($request->id);

        $calendar->delete();


        return redirect('/teacher/calendar')->with('status2', 'La date a été supprimée avec succès!');
    }


    /*############ END CALENDAR ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START HOMEWORK ###########################################################################*/

    public function homework()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        $ressources = $teacher->ressources()->orderBy('created_at', 'DESC')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->get();
        $homeworks = $teacher->homeworks()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.homework', compact('academicyearP', 'teacher', 'subjects', 'classrooms', 'homeworks', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    public function CreateHomework(Request $request)

    {

        $this->validate(request(), [

            'dateLimite' =>  'required',
            'upload_file' =>  'required',
            'subject_id' => 'required',

        ]);

        if (now() >= $request->dateLimite) {
            return redirect('/teacher/homework')->with('status2', 'Délai non respecté, Veuillez reprendre!');
        }
        $academicyearP = Academicyear::where('state', 'process')->first();
        $teacher = Teacher::find(Auth::user()->id);
        $subject = $teacher->subjects()->where('id', request('subject_id'))->first();
        $NbHomework = Homework::where('subject_id', request('subject_id'))->count();

        $text = $subject->name;
        function cleanString($text)
        {
            $utf8 = array(
                '/[áàâãªä]/u'   =>   'a',
                '/[ÁÀÂÃÄ]/u'    =>   'A',
                '/[ÍÌÎÏ]/u'     =>   'I',
                '/[íìîï]/u'     =>   'i',
                '/[éèêë]/u'     =>   'e',
                '/[ÉÈÊË]/u'     =>   'E',
                '/[óòôõºö]/u'   =>   'o',
                '/[ÓÒÔÕÖ]/u'    =>   'O',
                '/[úùûü]/u'     =>   'u',
                '/[ÚÙÛÜ]/u'     =>   'U',
                '/ç/'           =>   'c',
                '/Ç/'           =>   'C',
                '/ñ/'           =>   'n',
                '/Ñ/'           =>   'N',
                '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
                '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
                '/[“”«»„]/u'    =>   ' ', // Double quote
                '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
            );
            return preg_replace(array_keys($utf8), array_values($utf8), $text);
        }

        $new_str = preg_replace("/[^A-Za-z0-9 ]/", '', cleanString($text));

        $homework = Homework::create([

            'dateLimite' => request('dateLimite'),
            'subject_id' => request('subject_id'),
            'teacher_id' => $teacher->id,
            'classroomName' => $subject->classroom->name,

            //   'label'=>'Test '.++$NbHomework.'-'.$subject->classroom->name.'_'.$subject->name ,
            'label' => 'Test' . ++$NbHomework . '-' . $new_str,
            'testNum' => 'Test' . $NbHomework,
            'academicyear_id' => $academicyearP->id,
            'upload' => 'testprogrammation.pdf',
        ]);

        if (request()->hasFile('upload_file')) {
            $uploadedFile = $request->file('upload_file');
            $FileName = $homework->label . '.' . $uploadedFile->getClientOriginalExtension();
            //$extension = $uploadedFile->getClientOriginalExtension();
            $destinationPath = public_path('/files/homework/');
            $uploadedFile->move($destinationPath, $FileName);
            $homework->upload = $FileName;
            $homework->save();
        }
        ################################################
        $ltnSubject = Subject::find($subject->id);
        //$ltnEpreuve=Epreuve::find($Tcalendar->epreuve_id);

        $ClaStudent = Classroom::find($subject->classroom->id);

        //$time=Carbon::parse($homework->dateLimite, 'UTC');
        $date = Carbon::parse($homework->dateLimite, 'UTC');


        foreach ($ClaStudent->students as $student) {

            $ltn = Sltn::create([
                'label' => 'Un nouvel exercice de ' . $ltnSubject->name . ' a été ajouté (Date Limite :' . $date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY') . ' )',

                'reference' => $homework->id,
                'type' => 'TEST',

                'student_id' => $student->id,
            ]);
        }

        return redirect('/teacher/homework')->with('status1', 'Nouveau Test (Exercie) ajouté!');
    }


    public function DeleteHomework(Request $request)

    {

        $homework = Homework::find($request->id);

        $homework->delete();


        return redirect('/teacher/homework')->with('status2', 'La date a été supprimée avec succès!');
    }



    /*############ END HOMEWORK ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START ANSWER HOMEWORK ###########################################################################*/

    public function Ahomework()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        $classrooms = Classroom::get();

        $subjects = $teacher->subjects()->pluck('name')->toArray();
        $subjects = $teacher->subjects()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.Ahomework', compact('academicyearP', 'teacher', 'subjects', 'classrooms', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }



    /*############ END ANSWER HOMEWORK ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START ABSENCE ###########################################################################*/


    public function AbsenceStudentClas()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }

        $collection = collect($Classrooms);
        $unique = $collection->unique();
        $UniqueClassrooms = $unique->values()->all();

        //     dd($UniqueClassrooms);
        $classrooms = Classroom::all();
        $epreuves = Epreuve::get();
        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();




        return view('teacher.AbsenceStudentClas', compact('academicyearP', 'teacher', 'UniqueClassrooms', 'classrooms', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }

    public function absence()

    {
        $q = request()->get('q');

        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = $teacher->ressources()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }

        $classroom = Classroom::find($q);


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();



        return view('teacher.absence', compact('academicyearP', 'teacher', 'classroom', 'subjects', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }



    public function VoirAbsenceStudentClas()

    {
        $q = request()->get('q');
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)
            ->where('classroom_id', $q)->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();



        return view('teacher.VoirAbsenceStudentClas', compact('academicyearP', 'teacher', 'subjects', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }



    public function CreateAbsenceStudent(Request $request)

    {

        $academicyearP = Academicyear::where('state', 'process')->first();

        $this->validate(request(), [

            'classroom_id' => 'required',
            'absence_date' => 'required',
            'subject_id' => 'required',
        ]);

        $teacher = Teacher::find(Auth::user()->id);

        $absence = Absence::create([

            'absence_date' => request('absence_date'),
            'subject_id' => request('subject_id'),
            'teacher_id' => Auth::user()->id,
        ]);


        if ($request->input('student')) {
            $checkedstudent = $request->input('student');

            foreach ($checkedstudent as $checkedC) {
                $absence->students()->attach($checkedC);
            }
        }

        $q = request('classroom_id');

        /* NOTIF FOR ABSENCE
    foreach ($ressource->classrooms as $classroom ) {


        foreach ($classroom->students as $student ) {

            $ltn=Sltn::create([
            'label'=> 'Une nouvelle ressource a été ajoutée par le professeur : '.$ressource->teacher->name.' '.$ressource->teacher->surname ,
            'type'=> 'RESSOURCE',
            'reference'=> $ressource->id,
            'student_id'=> $student->id,
            ]);
        }
    }

*/


        return redirect("/teacher/VoirAbsenceStudentClas?q=$q")->with('status1', 'les absences ont été pointées!');
    }


    public function DeleteAbsence(Request $request)

    {

        $absence = Absence::find($request->id);
        $q = request('classroom_id');

        $absence->delete();


        return redirect("/teacher/VoirAbsenceStudentClas?q=$q")->with('status3', "La liste d'absence  a été supprimée avec succès!");
    }

    public function ListeStudent()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }

        $collection = collect($Classrooms);
        $unique = $collection->unique();
        $UniqueClassrooms = $unique->values()->all();

        //     dd($UniqueClassrooms);
        $classrooms = Classroom::all();
        $epreuves = Epreuve::get();
        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();




        return view('teacher.ListeStudent', compact('academicyearP', 'teacher', 'UniqueClassrooms', 'classrooms', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }

    public function ListeStudentInfo()

    {
        $q = request()->get('q');
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = $teacher->ressources()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }

        $classroom = Classroom::find($q);


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();



        return view('teacher.ListeStudentInfo', compact('academicyearP', 'teacher', 'classroom', 'subjects', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }
    /*############ END ABSENCE ###########################################################################*/





    /*############ START CAHIER ###########################################################################*/

    public function cahier()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();


        return view('teacher.cahier', compact('academicyearP', 'teacher', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    public function CreateCahier(Request $request)
    {

        $teacher = Teacher::find(Auth::user()->id);

        $this->validate(request(), [

            'title' => 'required',
            'content' => 'required',

        ]);


        $cahier = Cahier::create([

            'title' => request('title'),
            'content' => request('content'),
            'date' => request('date'),
            'teacher_id' => Auth::user()->id,
            'subject_id' => request('subject_id'),

        ]);

        return redirect('/teacher/cahier')->with('status1', 'Le cahier a été rempli');
    }


    public function DeleteCahier(Request $request)

    {
        //   dd($request->all());

        $cahier = Cahier::find($request->id);

        $cahier->delete();

        return redirect('/teacher/cahier')->with('status2', 'ENREGISTREMENT SUPPRIME!');
    }


    /*############ END CAHIER ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------




    /*############ START RESSOURCE ###########################################################################*/

    public function ressource()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = $teacher->ressources()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }

        $collection = collect($Classrooms);
        $unique = $collection->unique();
        $UniqueClassrooms = $unique->values()->all();

        //     dd($UniqueClassrooms);
        $classrooms = Classroom::all();
        $epreuves = Epreuve::get();
        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();




        return view('teacher.ressource', compact('academicyearP', 'teacher', 'UniqueClassrooms', 'classrooms', 'ressources', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }


    public function Sressource()

    {
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = $teacher->ressources()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }

        $collection = collect($Classrooms);
        $unique = $collection->unique();
        $UniqueClassrooms = $unique->values()->all();

        //     dd($UniqueClassrooms);
        $classrooms = Classroom::all();
        $epreuves = Epreuve::get();
        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();




        return view('teacher.Sressource', compact('academicyearP', 'teacher', 'UniqueClassrooms', 'classrooms', 'ressources', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }

    public function SressourceStudent()

    {
        $q = request()->get('q');
        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = $teacher->ressources()->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();
        //      $subjects=$teacher->subjects()->pluck('name')->toArray();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->name);
        }



        //
        $classroom = Classroom::find($q);
        $epreuves = Epreuve::get();
        $calendars = $teacher->calendars()->get();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();




        return view('teacher.SressourceStudent', compact('academicyearP', 'teacher', 'classroom', 'ressources', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }

    #RESOURCE POUR UN ELEVE
    public function CreateRessourceDocumentStudent(Request $request)

    {

        $academicyearP = Academicyear::where('state', 'process')->first();

        $this->validate(request(), [

            //    'classroom_id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'upload_file' => 'required',
        ]);

        $teacher = Teacher::find(Auth::user()->id);


        $ressource = Ressource::create([

            'title' => request('title'),
            'description' => request('description'),
            'teacher_id' => Auth::user()->id,
            'academicyear_id' => $academicyearP->id,
            'lien' => '/lien',
            'extension' => ".pdf",
        ]);

        if (request()->hasFile('upload_file')) {
            $uploadedFile = $request->file('upload_file');
            $FileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $extension = $uploadedFile->getClientOriginalExtension();
            $destinationPath = public_path('/files/ressource/');
            $uploadedFile->move($destinationPath, $FileName);
            $ressource->upload = $FileName;
            $ressource->extension = $extension;

            if ($request->input('student')) {
                $checkedstudent = $request->input('student');

                foreach ($checkedstudent as $checkedC) {
                    $ressource->students()->attach($checkedC);

                    $ltn = Sltn::create([
                        'label' => 'Une nouvelle ressource a été ajoutée par le professeur : ' . $ressource->teacher->name . ' ' . $ressource->teacher->surname,
                        'type' => 'RESSOURCE',
                        'reference' => $ressource->id,
                        //  'student_id'=> request('student_id'),
                        'student_id' => $checkedC,

                    ]);
                }
            }

            //$ressource->students()->attach(request('student_id'));
            $ressource->save();
        }



        return redirect('/teacher/Sressource')->with('status1', 'Le document a été envoyé avec succès');
    }
    #END RESOURCE POUR UN ELEVE


    public function CreateRessourceDocument(Request $request)

    {

        $academicyearP = Academicyear::where('state', 'process')->first();

        $this->validate(request(), [

            //    'classroom_id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'upload_file' => 'required',
        ]);

        $teacher = Teacher::find(Auth::user()->id);


        $ressource = Ressource::create([

            'title' => request('title'),
            'description' => request('description'),
            'teacher_id' => Auth::user()->id,
            'academicyear_id' => $academicyearP->id,
        ]);

        if (request()->hasFile('upload_file')) {
            $uploadedFile = $request->file('upload_file');
            $FileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $extension = $uploadedFile->getClientOriginalExtension();
            $destinationPath = public_path('/files/ressource/');
            $uploadedFile->move($destinationPath, $FileName);
            $ressource->upload = $FileName;
            $ressource->extension = $extension;

            if ($request->input('classroom')) {
                $checkedclassroom = $request->input('classroom');

                foreach ($checkedclassroom as $checkedC) {
                    $ressource->classrooms()->attach($checkedC);
                }
            }

            $ressource->classrooms()->attach(request('classroom_id'));
            $ressource->save();
        }

        // $ltnSubject=Subject::find($test->subject_id);
        // $ltnEpreuve=Epreuve::find($test->epreuve_id);
        // $ltnNum=$test->$testNum;

        foreach ($ressource->classrooms as $classroom) {


            foreach ($classroom->students as $student) {

                $ltn = Sltn::create([
                    'label' => 'Une nouvelle ressource a été ajoutée par le professeur : ' . $ressource->teacher->name . ' ' . $ressource->teacher->surname,
                    'type' => 'RESSOURCE',
                    'reference' => $ressource->id,
                    'student_id' => $student->id,
                ]);
            }
        }



        return redirect('/teacher/ressource')->with('status1', 'Nouveau document ajouté!');
    }


    public function CreateRessourceLien(Request $request)

    {
        $academicyearP = Academicyear::where('state', 'process')->first();

        $this->validate(request(), [

            //   'classroom_id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'lien' => 'required',
        ]);

        $teacher = Teacher::find(Auth::user()->id);

        $ressource = Ressource::create([

            'title' => request('title'),
            'description' => request('description'),
            'extension' => "url",
            'lien' => request('lien'),
            'teacher_id' => Auth::user()->id,
            'academicyear_id' => $academicyearP->id,
        ]);

        if ($request->input('classroom')) {
            $checkedclassroom = $request->input('classroom');

            foreach ($checkedclassroom as $checkedC) {
                $ressource->classrooms()->attach($checkedC);
            }
        }

        $ressource->classrooms()->attach(request('classroom_id'));
        $ressource->save();


        foreach ($ressource->classrooms as $classroom) {


            foreach ($classroom->students as $student) {

                $ltn = Sltn::create([
                    'label' => 'Une nouvelle ressource a été ajoutée par le professeur : ' . $ressource->teacher->name . ' ' . $ressource->teacher->surname,
                    'type' => 'RESSOURCE',
                    'reference' => $ressource->id,
                    'student_id' => $student->id,
                ]);
            }
        }



        return redirect('/teacher/ressource')->with('status2', 'Nouveau lien ajouté!');
    }



    public function DeleteRessource(Request $request)

    {

        $ressource = Ressource::find($request->id);

        $ressource->delete();

        $ressource->classrooms()->detach($request->id);

        $ltns = Sltn::where('reference', $ressource->id)->get();

        foreach ($ltns as $ltn) {

            $ltn->delete();
        }

        return redirect('/teacher/ressource')->with('status3', 'La Ressource a été supprimée avec succès!');
    }


    /*############ END RESSOURCES ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START TIMETABLE ###########################################################################*/

    public function findTimetable()
    {

        $teacher = Teacher::find(Auth::user()->id);
        $classrooms = Classroom::all();
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();


        $Classrooms = array();

        foreach ($subjects as $subject) {

            array_push($Classrooms, $subject->classroom->timetable);
        }

        $collection = collect($Classrooms);
        $unique = $collection->unique();
        $UniqueClassrooms = $unique->values()->all();


        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('teacher.findTimetable', compact('academicyearP', 'teacher', 'UniqueClassrooms', 'classrooms', 'subjects', 'Newsltn', 'Messageltn', 'tltns', 'Quizltn'));
    }



    public function getTimetable()
    {
        $q = request()->get('q');
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $teacher = Teacher::find(Auth::user()->id);
        $classroom = Classroom::find($q);
        $timetable = $classroom->subjects()->get();

        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

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



        return view('teacher.getTimetable', compact('academicyearP', 'classroom', 'timetable', 'Newsltn', 'Messageltn', 'Quizltn', 'tltns', 'lundi8', 'mardi8', 'mercredi8', 'jeudi8', 'vendredi8', 'samedi8', 'lundi9', 'mardi9', 'mercredi9', 'jeudi9', 'vendredi9', 'samedi9', 'lundi10', 'mardi10', 'mercredi10', 'jeudi10', 'vendredi10', 'samedi10', 'lundi11', 'mardi11', 'mercredi11', 'jeudi11', 'vendredi11', 'samedi11', 'lundi12', 'mardi12', 'mercredi12', 'jeudi12', 'vendredi12', 'samedi12', 'lundi13', 'mardi13', 'mercredi13', 'jeudi13', 'vendredi13', 'samedi13', 'lundi14', 'mardi14', 'mercredi14', 'jeudi14', 'vendredi14', 'samedi14', 'lundi15', 'mardi15', 'mercredi15', 'jeudi15', 'vendredi15', 'samedi15', 'lundi16', 'mardi16', 'mercredi16', 'jeudi16', 'vendredi16', 'samedi16', 'lundi17', 'mardi17', 'mercredi17', 'jeudi17', 'vendredi17', 'samedi17', 'lundi18', 'mardi18', 'mercredi18', 'jeudi18', 'vendredi18', 'samedi18', 'lundi19', 'mardi19', 'mercredi19', 'jeudi19', 'vendredi19', 'samedi19', 'lundi20', 'mardi20', 'mercredi20', 'jeudi20', 'vendredi20', 'samedi20'));
    }

    /*############ END TIMETABLE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START QUIZ ###########################################################################*/

    public function quiz()

    {

        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $Qsubjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $calendars = $teacher->calendars()->get();

        #TOSCHEDULE
        $k = request()->get('k');

        if ($k = 'clicked') {

            $Quizltns = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->get();

            foreach ($Quizltns as $Quizltn) {

                $Quizltn->state = 'read';
                $Quizltn->save();
            }
        }


        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();

        return view('teacher.quiz', compact('academicyearP', 'teacher', 'calendars', 'Qsubjects', 'Newsltn', 'Messageltn', 'Quizltn', 'tltns'));
    }



    public function specQuiz(Subject $subject)

    {


        $teacher = Teacher::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $Qsubjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();
        $AQsubjects = $Qsubjects->pluck('id')->toArray();
        $calendars = $teacher->calendars()->get();
        $specSubject = Subject::find($subject->id);


        $tltns = Tltn::where('teacher_id', $teacher->id)->orderBy('state', 'DESC')->orderBy('created_at', 'DESC')->get();
        $Newsltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'NEWS')->where('state', 'unread')->get();
        $Messageltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'MESSAGE')->where('state', 'unread')->get();
        $Quizltn = Tltn::where('teacher_id', $teacher->id)->where('type', 'QUIZ')->where('state', 'unread')->get();



        //dd($subject->id);

        if (!in_array($subject->id, $AQsubjects)) { // IF SUBJECT IS TAUGHT BY THE TEACHER

            return redirect('/teacher');
        }

        return view('teacher.specQuiz', compact('academicyearP', 'teacher', 'calendars', 'specSubject', 'Qsubjects', 'calendars', 'Newsltn', 'Messageltn', 'Quizltn', 'tltns'));
    }



    public function CreateQcomment()

    {
        $this->validate(request(), [

            'description' =>  'required',
        ]);

        $teacher = Teacher::find(Auth::user()->id);

        $Qcomment = Qcomment::create([

            'description' => request('description'),
            'teacher_id' => $teacher->id,
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


        #####// START Inform the class

        foreach ($Qcomment->question->subject->classroom->students as $student) {

            $ltn = Sltn::create([
                'label' => 'La question (' . $summary . ') a été commenté par le professeur ' . $Qcomment->teacher->fullname,
                'type' => 'QUIZ',
                'reference' => $Qcomment->question->id,
                'student_id' => $student->id, // Inform the class
            ]);
        }

        #####// END Inform the class

        if (request('create') == 'specQ') {
            return redirect('/teacher/specQuiz/' . request('link') . '?q=' . request('question_id') . '#Q' . request('question_id'))->with('status1', 'Commentaire ajouté!');
        } else {
            return redirect('/teacher/quiz?q=' . request('question_id') . '#Q' . request('question_id'))->with('status1', 'Commentaire ajouté!');
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
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
