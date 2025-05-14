<?php

namespace App\Http\Controllers;

use Auth;
use App\Tutor;
use App\Teacher;
use App\Student;
use App\Test;
use App\Classroom;
use App\Ressource;
use App\Actuality;
use App\Calendar;
use App\Epreuve;
use App\Homework;
use App\Ahomework;
use App\Academicyear;
use App\Subject;
use App\Mark;

use Carbon\Carbon;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:tutor');
    }

    /*   DASHBOARD      */
    public function index()
    {
        $tutor=Tutor::find(Auth::user()->id);


        return view('tutor.schoolNews', compact('tutor'));
    }


    public function schoolBde ( )

    {
        $tutor=Tutor::find(Auth::user()->id);

        return view('tutor.schoolBde', compact('tutor')) ;
    }

    public function adTeam ( )

    {
        $tutor=Tutor::find(Auth::user()->id);

        return view('tutor.adTeam',compact('tutor')) ;
    }

        public function child (Student $student)

    {
        //$calendars->where('classroom_id',$student->classroom_id)->get()
        $Student=$student;
        $calendars=Calendar::where('classroom_id',$student->classroom_id)->get();
        $Subjects=Subject::where('classroom_id',$student->classroom_id)->get();
        $tutor=Tutor::find(Auth::user()->id);
        $subjects=Subject::get();
        $epreuves=Epreuve::get();
        $classroom=$student->classroom;
        $marks=$student->marks()->get();
        $tests=$student->tests()->get();
       // $calendars=Calendar::get();

        $academicyearP=$student->academicyears()->where('state','process')->first();
        $academicyearsD=$student->academicyears()->where('state','done')->get();
        $academicyears=Academicyear::get();

        return view('tutor.child', compact('tutor','calendars','subjects','epreuves','Student','Subjects','classroom','marks','tests','academicyearP','academicyearsD','academicyears')) ;
    }

        public function mark (Student $student)

    {
        //$calendars->where('classroom_id',$student->classroom_id)->get()
        $Student=$student;
        $calendars=Calendar::where('classroom_id',$student->classroom_id)->get();
        $Subjects=Subject::where('classroom_id',$student->classroom_id)->get();
        $tutor=Tutor::find(Auth::user()->id);
        $subjects=Subject::get();
        $epreuves=Epreuve::get();
        $classroom=$student->classroom;
        $marks=$student->marks()->get();
        $tests=$student->tests()->get();
       // $calendars=Calendar::get();

        $academicyearP=$student->academicyears()->where('state','process')->first();
        $academicyearsD=$student->academicyears()->where('state','done')->get();
        $academicyears=Academicyear::get();

        return view('tutor.mark', compact('tutor','calendars','subjects','epreuves','Student','Subjects','classroom','marks','tests','academicyearP','academicyearsD','academicyears')) ;
    }

        public function timetable (Student $student)

    {

        $tutor=Tutor::find(Auth::user()->id);
        $classroom=$student->classroom;
        $Timetable=$classroom->subjects()->get();


        #8
        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi8=$classroom->subjects->where('startime','08:00:00')->where('day','LUNDI')->first();
                if (empty($lundi8)) {
                    $lundi8='X';
                }
            }

        } //endfor



        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi8=$classroom->subjects->where('startime','08:00:00')->where('day','MARDI')->first();
                if (empty($mardi8)) {
                    $mardi8='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi8=$classroom->subjects->where('startime','08:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi8)) {
                    $mercredi8='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi8=$classroom->subjects->where('startime','08:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi8)) {
                    $jeudi8='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi8=$classroom->subjects->where('startime','08:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi8)) {
                    $vendredi8='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi8=$classroom->subjects->where('startime','08:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi8)) {
                    $samedi8='X';
                }
            }

        } //endfor

#9

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi9=$classroom->subjects->where('startime','09:00:00')->where('day','LUNDI')->first();
                if (empty($lundi9)) {
                    $lundi9='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi9=$classroom->subjects->where('startime','09:00:00')->where('day','MARDI')->first();
                if (empty($mardi9)) {
                    $mardi9='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi9=$classroom->subjects->where('startime','09:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi9)) {
                    $mercredi9='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi9=$classroom->subjects->where('startime','09:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi9)) {
                    $jeudi9='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi9=$classroom->subjects->where('startime','09:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi9)) {
                    $vendredi9='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi9=$classroom->subjects->where('startime','09:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi9)) {
                    $samedi9='X';
                }
            }

        } //endfor
#10

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi10=$classroom->subjects->where('startime','10:00:00')->where('day','LUNDI')->first();
                if (empty($lundi10)) {
                    $lundi10='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi10=$classroom->subjects->where('startime','10:00:00')->where('day','MARDI')->first();
                if (empty($mardi10)) {
                    $mardi10='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi10=$classroom->subjects->where('startime','10:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi10)) {
                    $mercredi10='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi10=$classroom->subjects->where('startime','10:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi10)) {
                    $jeudi10='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi10=$classroom->subjects->where('startime','10:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi10)) {
                    $vendredi10='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi10=$classroom->subjects->where('startime','10:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi10)) {
                    $samedi10='X';
                }
            }

        } //endfor



#11

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi11=$classroom->subjects->where('startime','11:00:00')->where('day','LUNDI')->first();
                if (empty($lundi11)) {
                    $lundi11='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi11=$classroom->subjects->where('startime','11:00:00')->where('day','MARDI')->first();
                if (empty($mardi11)) {
                    $mardi11='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi11=$classroom->subjects->where('startime','11:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi11)) {
                    $mercredi11='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi11=$classroom->subjects->where('startime','11:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi11)) {
                    $jeudi11='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi11=$classroom->subjects->where('startime','11:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi11)) {
                    $vendredi11='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi11=$classroom->subjects->where('startime','11:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi11)) {
                    $samedi11='X';
                }
            }

        } //endfor



#12

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi12=$classroom->subjects->where('startime','12:00:00')->where('day','LUNDI')->first();
                if (empty($lundi12)) {
                    $lundi12='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi12=$classroom->subjects->where('startime','12:00:00')->where('day','MARDI')->first();
                if (empty($mardi12)) {
                    $mardi12='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi12=$classroom->subjects->where('startime','12:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi12)) {
                    $mercredi12='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi12=$classroom->subjects->where('startime','12:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi12)) {
                    $jeudi12='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi12=$classroom->subjects->where('startime','12:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi12)) {
                    $vendredi12='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi12=$classroom->subjects->where('startime','12:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi12)) {
                    $samedi12='X';
                }
            }

        } //endfor


#13

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi13=$classroom->subjects->where('startime','13:00:00')->where('day','LUNDI')->first();
                if (empty($lundi13)) {
                    $lundi13='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi13=$classroom->subjects->where('startime','13:00:00')->where('day','MARDI')->first();
                if (empty($mardi13)) {
                    $mardi13='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi13=$classroom->subjects->where('startime','13:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi13)) {
                    $mercredi13='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi13=$classroom->subjects->where('startime','13:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi13)) {
                    $jeudi13='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi13=$classroom->subjects->where('startime','13:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi13)) {
                    $vendredi13='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi13=$classroom->subjects->where('startime','13:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi13)) {
                    $samedi13='X';
                }
            }

        } //endfor


#14

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi14=$classroom->subjects->where('startime','14:00:00')->where('day','LUNDI')->first();
                if (empty($lundi14)) {
                    $lundi14='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi14=$classroom->subjects->where('startime','14:00:00')->where('day','MARDI')->first();
                if (empty($mardi14)) {
                    $mardi14='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi14=$classroom->subjects->where('startime','14:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi14)) {
                    $mercredi14='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi14=$classroom->subjects->where('startime','14:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi14)) {
                    $jeudi14='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi14=$classroom->subjects->where('startime','14:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi14)) {
                    $vendredi14='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi14=$classroom->subjects->where('startime','14:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi14)) {
                    $samedi14='X';
                }
            }

        } //endfor



#15

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi15=$classroom->subjects->where('startime','15:00:00')->where('day','LUNDI')->first();
                if (empty($lundi15)) {
                    $lundi15='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi15=$classroom->subjects->where('startime','15:00:00')->where('day','MARDI')->first();
                if (empty($mardi15)) {
                    $mardi15='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi15=$classroom->subjects->where('startime','15:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi15)) {
                    $mercredi15='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi15=$classroom->subjects->where('startime','15:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi15)) {
                    $jeudi15='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi15=$classroom->subjects->where('startime','15:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi15)) {
                    $vendredi15='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi15=$classroom->subjects->where('startime','15:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi15)) {
                    $samedi15='X';
                }
            }

        } //endfor



#16

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi16=$classroom->subjects->where('startime','16:00:00')->where('day','LUNDI')->first();
                if (empty($lundi16)) {
                    $lundi16='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi16=$classroom->subjects->where('startime','16:00:00')->where('day','MARDI')->first();
                if (empty($mardi16)) {
                    $mardi16='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi16=$classroom->subjects->where('startime','16:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi16)) {
                    $mercredi16='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi16=$classroom->subjects->where('startime','16:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi16)) {
                    $jeudi16='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi16=$classroom->subjects->where('startime','16:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi16)) {
                    $vendredi16='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi16=$classroom->subjects->where('startime','16:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi16)) {
                    $samedi16='X';
                }
            }

        } //endfor

#17

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi17=$classroom->subjects->where('startime','17:00:00')->where('day','LUNDI')->first();
                if (empty($lundi17)) {
                    $lundi17='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi17=$classroom->subjects->where('startime','17:00:00')->where('day','MARDI')->first();
                if (empty($mardi17)) {
                    $mardi17='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi17=$classroom->subjects->where('startime','17:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi17)) {
                    $mercredi17='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi17=$classroom->subjects->where('startime','17:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi17)) {
                    $jeudi17='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi17=$classroom->subjects->where('startime','17:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi17)) {
                    $vendredi17='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi17=$classroom->subjects->where('startime','17:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi17)) {
                    $samedi17='X';
                }
            }

        } //endfor



#18

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi18=$classroom->subjects->where('startime','18:00:00')->where('day','LUNDI')->first();
                if (empty($lundi18)) {
                    $lundi18='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi18=$classroom->subjects->where('startime','18:00:00')->where('day','MARDI')->first();
                if (empty($mardi18)) {
                    $mardi18='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi18=$classroom->subjects->where('startime','18:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi18)) {
                    $mercredi18='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi18=$classroom->subjects->where('startime','18:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi18)) {
                    $jeudi18='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi18=$classroom->subjects->where('startime','18:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi18)) {
                    $vendredi18='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi18=$classroom->subjects->where('startime','18:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi18)) {
                    $samedi18='X';
                }
            }

        } //endfor



#19

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi19=$classroom->subjects->where('startime','19:00:00')->where('day','LUNDI')->first();
                if (empty($lundi19)) {
                    $lundi19='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi19=$classroom->subjects->where('startime','19:00:00')->where('day','MARDI')->first();
                if (empty($mardi19)) {
                    $mardi19='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi19=$classroom->subjects->where('startime','19:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi19)) {
                    $mercredi19='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi19=$classroom->subjects->where('startime','19:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi19)) {
                    $jeudi19='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi19=$classroom->subjects->where('startime','19:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi19)) {
                    $vendredi19='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi19=$classroom->subjects->where('startime','19:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi19)) {
                    $samedi19='X';
                }
            }

        } //endfor


#20

        for($i=0; $i<=5 ; $i++) {

           if ($i==0) {
            $lundi20=$classroom->subjects->where('startime','20:00:00')->where('day','LUNDI')->first();
                if (empty($lundi20)) {
                    $lundi20='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==1) {
            $mardi20=$classroom->subjects->where('startime','20:00:00')->where('day','MARDI')->first();
                if (empty($mardi20)) {
                    $mardi20='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==2) {
            $mercredi20=$classroom->subjects->where('startime','20:00:00')->where('day','MERCREDI')->first();
                if (empty($mercredi20)) {
                    $mercredi20='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==3) {
            $jeudi20=$classroom->subjects->where('startime','20:00:00')->where('day','JEUDI')->first();
                if (empty($jeudi20)) {
                    $jeudi20='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==4) {
            $vendredi20=$classroom->subjects->where('startime','20:00:00')->where('day','VENDREDI')->first();
                if (empty($vendredi20)) {
                    $vendredi20='X';
                }
            }

        } //endfor


        for($i=0; $i<=5 ; $i++) {

           if ($i==5) {
            $samedi20=$classroom->subjects->where('startime','20:00:00')->where('day','SAMEDI')->first();
                if (empty($samedi20)) {
                    $samedi20='X';
                }
            }

        } //endfor

        return view('tutor.findTimetable', compact('tutor','classroom','Timetable','lundi8','mardi8','mercredi8','jeudi8','vendredi8','samedi8','lundi9','mardi9','mercredi9','jeudi9','vendredi9','samedi9','lundi10','mardi10','mercredi10','jeudi10','vendredi10','samedi10','lundi11','mardi11','mercredi11','jeudi11','vendredi11','samedi11','lundi12','mardi12','mercredi12','jeudi12','vendredi12','samedi12','lundi13','mardi13','mercredi13','jeudi13','vendredi13','samedi13','lundi14','mardi14','mercredi14','jeudi14','vendredi14','samedi14','lundi15','mardi15','mercredi15','jeudi15','vendredi15','samedi15','lundi16','mardi16','mercredi16','jeudi16','vendredi16','samedi16','lundi17','mardi17','mercredi17','jeudi17','vendredi17','samedi17','lundi18','mardi18','mercredi18','jeudi18','vendredi18','samedi18','lundi19','mardi19','mercredi19','jeudi19','vendredi19','samedi19','lundi20','mardi20','mercredi20','jeudi20','vendredi20','samedi20')) ;
    }



    /**

$student=Student::find(Auth::user()->id);
        $marks=$student->marks()->get();
        $classroom=$student->classroom;
        $subjects=Subject::where('classroom_id',$student->classroom_id)->get();
        $epreuves=Epreuve::get();
        $tests=$student->tests()->get();
       // $testsP=$teacher->tests()->where('academicyear_id',$academicyearP->id)->orderBy('type','ASC')->get();

        $academicyearP=$student->academicyears()->where('state','process')->first();
        $academicyearsD=$student->academicyears()->where('state','done')->get();
        $academicyears=Academicyear::get();


        return view('student.mark',compact('subjects','epreuves','classroom','academicyearP','academicyearsD','academicyears','student','marks','tests'));


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
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
