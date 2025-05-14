<?php

namespace App\Http\Controllers;

// use Auth;

use App\Admin;
use App\Manager;
use App\Program;
use App\Teacher;
use App\Student;
use App\Test;
use App\Tutor;
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
use App\Director;
use App\Smsg;
use App\Tmsg;
use App\Pmsg;
use App\Semester;
use App\Semesteravg;
use App\Subjectavg;

use App\Quest;
use App\Squest;

use App\Tltn;
use App\Sltn;

use PDF;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{




    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = Student::get();
        $teachers = Teacher::get();
        $tutors = Tutor::get();
        $programs = Program::get();
        $ressources = Ressource::get();
        if ($academicyearP) {
            $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->get();
        } else {
            $classrooms = Classroom::get();
        }

        // $classroom=Classroom::find(9);

        //dd($classroom->students->count());

        return view('admin.dashboard', compact('admin', 'students', 'teachers', 'tutors', 'classrooms', 'ressources', 'programs', 'academicyearP'));
    }


    /*############  PROFILE ###########################################################################*/

    public function profile(Request $request)

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = Student::get();
        $teachers = Teacher::get();
        $tutors = Tutor::get();
        $programs = Program::get();
        $ressources = Ressource::get();
        if ($academicyearP) {
            $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->get();
        } else {
            $classrooms = Classroom::get();
        }


        return view('admin.profile', compact('admin', 'students', 'teachers', 'tutors', 'classrooms', 'ressources', 'programs', 'academicyearP'));
    }


    public function modiFprofile(Request $request)

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.editProfile', compact('academicyearP', 'admin'));
    }

    public function EditProfile(Request $request)

    {


        if ($request->filled('password')) {
            $this->validate(request(), [
                'password' => 'confirmed|min:8',
            ]);
        }


        $admin = Admin::find(Auth::user()->id);


        if ($request->filled('name')) {
            $admin->name = $request->name;
        }
        if ($request->filled('surname')) {
            $admin->surname = $request->surname;
        }

        if ($request->filled('tel')) {
            $admin->tel = $request->tel;
        }
        if ($request->filled('email')) {
            $admin->email = $request->email;
        }
        if ($request->filled('password')) {
            $admin->password = $request->password;
        }

        $admin->save();


        return redirect('/kuro/admin/profile')->with('status1', 'Modification prise en compte!');
    }




    /*############ END PROFILE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############  MANAGER ###########################################################################*/

    public function manager()
    {

        $admin = Admin::find(Auth::user()->id);
        $managers = Manager::get();
        $academicyearP = Academicyear::where('state', 'process')->first();


        return view('admin.manager', compact('academicyearP', 'admin', 'managers'));
    }

    public function affectManager()
    {

        $q = request()->get('q');
        $managger = Manager::find($q);
        $admin = Admin::find(Auth::user()->id);
        $managers = Manager::get();
        $academicyearP = Academicyear::where('state', 'process')->first();


        return view('admin.affectManager', compact('academicyearP', 'admin', 'managers', 'managger'));
    }

    public function DeleteManager(Request $request)

    {

        $manager = Manager::find($request->id);

        $manager->delete();

        return redirect('/kuro/admin/manager')->with('status3', 'Le manager a été supprimé');
    }


    public function CreateManager(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'surname' =>  'required',
            'email' =>  'required',
            'tel' =>  'required',

        ]);

        /*
if ($request->password!==$request->password_confirmation) {
return redirect('/kuro/admin/manager')->with('status2', 'La confirmation du mot de passe ne correspond pas!');
}
*/

        $varMachaine0 = request('name');
        $varMachaine1 = request('surname');

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);



        $manager = Manager::create([

            'name' => strtoupper($name),
            'surname' => strtoupper($surname),
            'email' => request('email'),
            'tel' => request('tel'),
            'image' => 'avatar.png',
            'password' => '12345678'
        ]);

        $pass = str_random(8); // FOR PASSWORD PURPOSE

        $manager->image = strtolower($pass);
        $manager->password = strtolower($pass);
        $manager->save();


        return redirect('/kuro/admin/manager')->with('status1', 'Nouveau manager ajouté!');
    }

    public function affectRole(Request $request)
    {

        $manager = Manager::find($request->id);

        if ($request->filled('program')) {
            $manager->program = $request->program;
        }
        if ($request->filled('classroom')) {
            $manager->classroom = $request->classroom;
        }
        if ($request->filled('teacher')) {
            $manager->teacher = $request->teacher;
        }

        if ($request->filled('subject')) {
            $manager->subject = $request->subject;
        }
        if ($request->filled('student')) {
            $manager->student = $request->student;
        }
        if ($request->filled('tutor')) {
            $manager->tutor = $request->tutor;
        }
        if ($request->filled('ressource')) {
            $manager->ressource = $request->ressource;
        }
        if ($request->filled('school')) {
            $manager->school = $request->school;
        }
        if ($request->filled('message')) {
            $manager->message = $request->message;
        }
        if ($request->filled('stopMark')) {
            $manager->stopMark = $request->stopMark;
        }
        if ($request->filled('bulletin')) {
            $manager->bulletin = $request->bulletin;
        }

        $manager->save();

        return redirect('/kuro/admin/affectManager?q=' . $manager->id)->with('status1', 'Les Rôles ont été modifiés!');
    }






    /*############ END MANAGER ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START PROGRAM ###########################################################################*/

    public function program()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $programs = Program::orderBy('levelInt', 'ASC')->get();


        return view('admin.program', compact('programs', 'admin', 'academicyearP'));
    }

    public function CreateProgram(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'fullname' =>  'required',
            'levelInt' =>  'required',
        ]);

        $varMachaine0 = request('name');
        $varMachaine1 = request('fullname');

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $fullname = str_replace($search0, $replace0, $varMachaine1);


        $program = Program::create([

            'name' => strtoupper($name),
            'fullname' => strtoupper($fullname),
            'levelInt' => request('levelInt'),
            'levelVar' => request('levelVar')
        ]);

        if ($program->levelInt == 1) {
            // $program->levelVar='CRECHE';
            $program->name = $program->name . ' ' . $program->levelInt;
        } elseif ($program->levelInt == 2) {
            //   $program->levelVar='PRIMAIRE';
            $program->name = $program->name . ' ' . $program->levelInt;
        }

        $program->save();

        return redirect('/kuro/admin/program')->with('status1', 'Nouveau program ajouté!');
    }

    public function editProgram()
    {

        $admin = Admin::find(Auth::user()->id);
        $programs = Program::orderBy('levelInt', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.editProgram', compact('academicyearP', 'programs', 'admin'));
    }

    public function modifyProgram(Request $request)

    {

        $program = Program::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->fullname;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $fullname = str_replace($search0, $replace0, $varMachaine1);


        if ($request->filled('fullname')) {
            $program->fullname = strtoupper($fullname);
        }
        if ($request->filled('name')) {
            $program->name = strtoupper($name);
        }
        if ($request->filled('levelInt')) {
            $program->levelInt = $request->levelInt;
        }


        if ($program->levelInt == 1) {
            $program->levelVar = '1ère Année';
            $program->name = $program->name . ' ' . $program->levelInt;
        } elseif ($program->levelInt == 2) {
            $program->levelVar = '2ème Année';
            $program->name = $program->name . ' ' . $program->levelInt;
        } elseif ($program->levelInt == 3) {
            $program->levelVar = 'Licence';
        } elseif ($program->levelInt == 4) {
            $program->levelVar = 'Master I';
        } elseif ($program->levelInt == 5) {
            $program->levelVar = 'Master II';
        }

        $program->save();



        return redirect('/kuro/admin/editProgram')->with('status1', 'Modification pris en compte!');
    }



    public function deleteProgram(Request $request)

    {

        $program = Program::find($request->id);

        $program->delete();

        return redirect('/kuro/admin/editProgram')->with('status2', 'Le programme a été supprimé');
    }


    /*############ END PROGRAM ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ CLASSROOM ###########################################################################*/

    public function classroom()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->get();
        $programs = Program::orderBy('fullname', 'ASC')->get();


        return view('admin.classroom', compact('classrooms', 'admin', 'programs', 'academicyearP'));
    }


    public function CreateClassroom(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'level' =>  'required',
            'program_name' => 'required'
        ]);

        $varMachaine0 = request('name');
        $varMachaine1 = request('code');

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $code = str_replace($search0, $replace0, $varMachaine1);


        $program = Program::where('name', request('program_name'))->first();
        $program_id = $program->id;

        if (request('level') > 2) {
            $level = '';
        } else {
            $level = request('level');
        }

        if ($request->filled('code')) {

            $classroom = Classroom::create([

                'name' => strtoupper($name) . ' ' . $level . '' . strtoupper($code),
                'code' => strtoupper($code),
                'program_id' => $program_id,
                'level' => request('level'),
                'academicyear_id' => request('academicyear_id'),
            ]);
        } else {
            $classroom = Classroom::create([

                'name' => strtoupper($name) . ' ' . $level,
                'program_id' => $program_id,
                'level' => request('level'),
                'academicyear_id' => request('academicyear_id'),
            ]);
        }

        return redirect('/kuro/admin/classroom')->with('status1', 'Nouvelle classe ajoutée!');
    }

    public function findClassroom()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = Student::orderBy('name', 'ASC')->get();
        $classrooms = Classroom::orderBy('name', 'ASC')->where('academicyear_id', $academicyearP->id)->get();

        return view('admin.findClassroom', compact('academicyearP', 'students', 'admin', 'classrooms'));
    }


    public function getClassroom2()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $classroom = Classroom::find($q);
        $programs = Program::orderBy('levelInt', 'ASC')->get();

        return view('admin.getClassroom2', compact('classroom', 'programs'));
    }


    public function editClassroom()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('level', 'ASC')->get();
        $programs = Program::get();

        return view('admin.editClassroom', compact('academicyearP', 'classrooms', 'admin', 'programs'));
    }

    public function modifyClassroom(Request $request)

    {

        $classroom = Classroom::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->code;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $code = str_replace($search0, $replace0, $varMachaine1);

        if ($request->filled('code')) {
            $classroom->name = strtoupper($name) . ' ' . $request->level . '' . strtoupper($code);
        } else {
            $classroom->name = strtoupper($name) . ' ' . $request->level;
        }

        if ($request->filled('level')) {
            $classroom->level = $request->level;
        }
        $program = Program::where('name', request('program_name'))->first();
        $program_id = $program->id;
        if ($request->filled('program_name')) {
            $classroom->program_id = $program_id;
        }

        $classroom->save();



        return redirect('/kuro/admin/editClassroom')->with('status1', 'Modification pris en compte!');
    }



    public function deleteClassroom(Request $request)

    {

        $classroom = Classroom::find($request->id);

        $classroom->delete();

        return redirect('/kuro/admin/editClassroom')->with('status2', 'La classe a été supprimée');
    }

    public function modifyClassroom1(Request $request)

    {

        $classroom = Classroom::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->code;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $code = str_replace($search0, $replace0, $varMachaine1);

        if ($request->filled('code')) {
            $classroom->name = strtoupper($name) . ' ' . $request->level . '' . strtoupper($code);
        } else {
            $classroom->name = strtoupper($name) . ' ' . $request->level;
        }

        if ($request->filled('level')) {
            $classroom->level = $request->level;
        }
        $program = Program::where('name', request('program_name'))->first();
        $program_id = $program->id;
        if ($request->filled('program_name')) {
            $classroom->program_id = $program_id;
        }

        $classroom->save();



        return redirect('/kuro/admin/findClassroom')->with('status1', 'Modification pris en compte!');
    }



    public function deleteClassroom1(Request $request)

    {

        $classroom = Classroom::find($request->id);

        $classroom->delete();

        return redirect('/kuro/admin/findClassroom')->with('status2', 'La classe a été supprimée');
    }

    /*############ END CLASSROOM ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ MARK ###########################################################################*/

    public function findMark()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = Student::orderBy('name', 'ASC')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();

        return view('admin.findMark', compact('academicyearP', 'students', 'admin', 'classrooms'));
    }

    public function getClassroom7()
    {
        $q = request()->get('q');

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $semesters = Semester::where('academicyear_id', $academicyearP->id)->get();


        $epreuves = Epreuve::get();
        $classroom = Classroom::find($q);
        $programs = Program::orderBy('levelInt', 'ASC')->get();

        return view('admin.getClassroom7', compact('classroom', 'programs', 'epreuves', 'academicyearP', 'semesters', 'semesterP'));
    }

    /*############ END MARK ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ TEACHER ###########################################################################*/

    public function teacher()
    {

        $admin = Admin::find(Auth::user()->id);
        $teachers = Teacher::get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.teacher', compact('teachers', 'admin', 'academicyearP'));
    }

    public function teacherMany()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $teachers = Teacher::get();
        $Uteacher = Teacher::latest()->first();


        return view('admin.teacherMany', compact('teachers', 'classrooms', 'admin', 'academicyearP', 'Uteacher'));
    }

    public function CreateTeacher(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'surname' =>  'required',
            //'speciality'=>'required',
            'email' => 'required',
            'tel' => 'required',
            //'address'=>'required',
            //'dateofbirth'=>'required',
            //'nationality'=>'required',
            'gender' => 'required'
        ]);


        $varMachaine0 = request('name');
        $varMachaine1 = request('surname');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);


        $teacher = Teacher::create([

            'name' => strtoupper($name),
            'surname' => strtoupper($surname),
            'fullname' => strtoupper($name) . ' ' . strtoupper($surname),
            'tel' => request('tel'),
            'address' => request('address'),
            'speciality' => request('speciality'),
            'gender' => request('gender'),
            'nationality' => request('nationality'),
            'dateofbirth' => request('dateofbirth'),
            'email' => request('email'),
            'password' => '12345678',
        ]);
        $pass = str_random(8); // FOR PASSWORD PURPOSE
        $pass = strtolower($pass);
        $teacher->password = $pass;
        $teacher->image = $pass;
        $teacher->save();

        return redirect('/kuro/admin/teacher')->with('status1', 'Nouveau professeur ajouté!');
    }

    public function findTeacher()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $teachers = Teacher::orderBy('name', 'ASC')->get();

        return view('admin.findTeacher', compact('academicyearP', 'admin', 'classrooms', 'teachers'));
    }

    /* START MANAGER GET Subject SECTION */
    public function getTeacher1()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $teacher = Teacher::where('email', $q)->first();
        $semesterP = Semester::where('state', 'process')->first();
        // $teachers=Teacher::orderBy('name','ASC')->get();

        return view('admin.getTeacher1', compact('teacher', 'semesterP'));
    }

    public function getTeacher2()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $classroom = Classroom::find($q);
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = Subject::where('classroom_id', $classroom->id)->get();
        // $subjects=$classroom->subjects();

        //GET ARRAY OF UNIQUE TEACHER ID
        $TeacherSubjs = array();

        foreach ($subjects as $subject) {

            array_push($TeacherSubjs, $subject->teacher_id);
        }

        $collection = collect($TeacherSubjs);
        $unique = $collection->unique();
        $UniqueTeacherSubjs = $unique->values()->all();
        //GET ARRAY OF UNIQUE TEACHER ID

        return view('admin.getTeacher2', compact('classroom', 'subjects', 'teachers', 'UniqueTeacherSubjs', 'semesterP'));
    }

    public function getTeacher3()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $semesterP = Semester::where('state', 'process')->first();
        $teacher = Teacher::where('email', $q)->first();
        // $teachers=Teacher::orderBy('name','ASC')->get();

        return view('admin.getTeacher3', compact('teacher', 'semesterP'));
    }

    /* END MANAGER GET Subject SECTION */


    public function editTeacher()
    {

        $admin = Admin::find(Auth::user()->id);
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();

        return view('admin.editTEacher', compact('academicyearP', 'teachers', 'admin', 'semesterP'));
    }

    public function modifyTeacher(Request $request)

    {

        $teacher = Teacher::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->surname;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);

        if ($request->filled('name')) {
            $teacher->name = strtoupper($name);
        }
        if ($request->filled('surname')) {
            $teacher->surname = strtoupper($surname);
        }
        if ($request->filled('dateofbirth')) {
            $teacher->dateofbirth = $request->dateofbirth;
        }
        if ($request->filled('gender')) {
            $teacher->gender = $request->gender;
        }

        if ($request->filled('nationality')) {
            $teacher->nationality = $request->nationality;
        }

        if ($request->filled('tel')) {
            $teacher->tel = $request->tel;
        }

        if ($request->filled('email')) {
            $teacher->email = $request->email;
        }

        if ($request->filled('address')) {
            $teacher->address = $request->address;
        }

        if ($request->filled('speciality')) {
            $teacher->speciality = $request->speciality;
        }
        $teacher->fullname = $teacher->name . ' ' . $teacher->surname;
        $teacher->save();



        return redirect('/kuro/admin/editTeacher')->with('status1', 'Modification prise en compte!');
    }

    public function modifyTeacher1(Request $request)

    {

        $teacher = Teacher::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->surname;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);


        if ($request->filled('name')) {
            $teacher->name = strtoupper($name);
        }
        if ($request->filled('surname')) {
            $teacher->surname = strtoupper($surname);
        }
        if ($request->filled('dateofbirth')) {
            $teacher->dateofbirth = $request->dateofbirth;
        }
        if ($request->filled('gender')) {
            $teacher->gender = $request->gender;
        }

        if ($request->filled('nationality')) {
            $teacher->nationality = $request->nationality;
        }

        if ($request->filled('tel')) {
            $teacher->tel = $request->tel;
        }

        if ($request->filled('email')) {
            $teacher->email = $request->email;
        }

        if ($request->filled('address')) {
            $teacher->address = $request->address;
        }

        if ($request->filled('speciality')) {
            $teacher->speciality = $request->speciality;
        }
        $teacher->fullname = $teacher->name . ' ' . $teacher->surname;
        $teacher->save();



        return redirect('/kuro/admin/findTeacher')->with('status1', 'Modification prise en compte!');
    }


    public function deleteTeacher(Request $request)

    {

        $teacher = Teacher::find($request->id);

        $teacher->delete();

        return redirect('/kuro/admin/editTeacher')->with('status2', 'Le professeur a été supprimé');
    }

    public function deleteTeacher1(Request $request)

    {

        $teacher = Teacher::find($request->id);

        $teacher->delete();

        return redirect('/kuro/admin/findTeacher')->with('status2', 'Le professeur a été supprimé');
    }


    /*############ END TEACHER ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ SUBJECT ###########################################################################*/

    public function subject()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('teacher_id', 'ASC')->get();



        return view('admin.subject', compact('subjects', 'admin', 'academicyearP', 'semesterP'));
    }

    public function subjectMany()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $subjects = Subject::get();
        $Usubject = Subject::latest()->first();


        return view('admin.subjectMany', compact('subjects', 'classrooms', 'admin', 'academicyearP', 'Usubject'));
    }

    public function affectSubject()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $Nsubjects = $semesterP->subjects()->whereNull('teacher_id')->whereNull('classroom_id')->get();
        $subjects = $semesterP->subjects()->whereNotNull('teacher_id')->whereNotNull('classroom_id')->get();

        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();


        return view('admin.affectSubject', compact('subjects', 'Nsubjects', 'teachers', 'admin', 'classrooms', 'academicyearP', 'semesterP'));
    }


    public function affectationSubject(Request $request)
    {

        $admin = Admin::find(Auth::user()->id);
        $subject = Subject::find($request->id);
        //dd($subject->name);

        $CHECKclass = Classroom::find($request->classroom_id);
        //dd($CHECKclass);
        $CHECKsubjects = $CHECKclass->subjects()->get();
        //dd($CHECKsubjects);

        foreach ($CHECKsubjects as $CHECKsubject) {

            if ($request->day == $CHECKsubject->day and $request->startime . ':' . '00' == $CHECKsubject->startime) {

                //dd($request->startime.':'.'00');
                return redirect('/kuro/admin/affectSubject')->with('status3', 'Affectation Non Reussie!');
            }
        }

        //dd($request->startime);

        if ($request->filled('teacher_fullname')) {
            $teacher = Teacher::where('fullname', $request->teacher_fullname)->first();
            $subject->teacher_id = $teacher->id;
        }
        if ($request->filled('classroom_id')) {
            $subject->classroom_id = $request->classroom_id;
            $subject->program_id = $subject->classroom->program->id;
        }
        if ($request->filled('day')) {
            $subject->day = $request->day;
        }
        if ($request->filled('startime')) {
            $subject->startime = $request->startime;
        }
        if ($request->filled('endtime')) {
            $subject->endtime = $request->endtime;
        }


        $subject->save();

        return redirect('/kuro/admin/affectSubject')->with('status2', 'Affectation Reussie');
    }


    public function CreateSubject(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'credit' =>  'required',
        ]);

        $varMachaine0 = request('name');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);


        $subject = Subject::create([

            'name' => strtoupper($name),
            'credit' => request('credit'),
            'day' => "Monday",
            'startime' => "08:00",
            'endtime' => "10:00",


        ]);

        $semesterP = Semester::where('state', 'process')->first();
        $subject->semesters()->attach($semesterP->id);


        return redirect('/kuro/admin/subject')->with('status1', 'Nouvelle matière ajouté!');
    }

    public function findSubject()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $subjects = Subject::orderBy('name', 'ASC')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $teachers = Teacher::orderBy('name', 'ASC')->get();

        return view('admin.findSubject', compact('academicyearP', 'subjects', 'admin', 'classrooms', 'teachers'));
    }

    /* START MANAGER GET Subject SECTION */
    public function getSubject1()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->where('name', $q)->get();
        $teachers = Teacher::orderBy('name', 'ASC')->get();

        return view('admin.getSubject1', compact('subjects', 'teachers'));
    }

    public function getSubject2()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $semesterP = Semester::where('state', 'process')->first();
        $classroom = Classroom::find($q);
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $subjects = $semesterP->subjects()->where('classroom_id', $classroom->id)->get();
        // $subjects=$classroom->subjects();

        return view('admin.getSubject2', compact('classroom', 'subjects', 'teachers'));
    }

    public function getSubject3()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $semesterP = Semester::where('state', 'process')->first();
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $teacher = Teacher::where('email', $q)->first();
        $subjects = $semesterP->subjects()->where('teacher_id', $teacher->id)->get();

        return view('admin.getSubject3', compact('subjects', 'teachers'));
    }

    /* END MANAGER GET Subject SECTION */




    public function editSubject()
    {

        $admin = Admin::find(Auth::user()->id);
        $semesterP = Semester::where('state', 'process')->first();
        $subjects = $semesterP->subjects()->orderBy('teacher_id', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();


        return view('admin.editSubject', compact('academicyearP', 'subjects', 'admin'));
    }

    public function modifySubject(Request $request)

    {

        $subject = Subject::find($request->id);

        $varMachaine0 = $request->name;


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);


        if ($request->filled('name')) {
            $subject->name = strtoupper($name);
        }
        if ($request->filled('credit')) {
            $subject->credit = $request->credit;
        }
        if ($request->filled('teacher_fullname')) {
            $teacher = Teacher::where('fullname', $request->teacher_fullname)->first();
            $subject->teacher_id = $teacher->id;
        }


        $subject->save();


        return redirect('/kuro/admin/editSubject')->with('status1', 'Modification prise en compte!');
    }

    public function modifySubject1(Request $request)

    {


        $subject = Subject::find($request->id);

        $varMachaine0 = $request->name;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);


        if ($request->filled('name')) {
            $subject->name = strtoupper($name);
        }
        if ($request->filled('credit')) {
            $subject->credit = $request->credit;
        }
        if ($request->filled('day')) {
            $subject->day = $request->day;
        }
        if ($request->filled('startime')) {
            $subject->startime = $request->startime;
        }
        if ($request->filled('endtime')) {
            $subject->endtime = $request->endtime;
        }
        if ($request->filled('teacher_fullname')) {
            $teacher = Teacher::where('fullname', $request->teacher_fullname)->first();
            $subject->teacher_id = $teacher->id;
        }


        $subject->save();

        return redirect('/kuro/admin/findSubject')->with('status1', 'Modification prise en compte!');
    }



    public function deleteSubject(Request $request)

    {

        $subject = Subject::find($request->id);

        $subject->delete();

        return redirect('/kuro/admin/editSubject')->with('status2', 'La matière a été supprimée');
    }

    public function deleteSubject1(Request $request)

    {

        $subject = Subject::find($request->id);

        $subject->delete();

        return redirect('/kuro/admin/findSubject')->with('status2', 'La matière a été supprimée');
    }


    /*############ END SUBJECT ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ TUTOR ###########################################################################*/

    public function tutor()
    {

        $admin = Admin::find(Auth::user()->id);
        $tutors = Tutor::get();
        $students = Student::whereNull('tutor_id')->whereNotNull('matricule')->get();
        $Ututor = Tutor::latest()->first();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.tutor', compact('tutors', 'admin', 'students', 'academicyearP', 'Ututor'));
    }

    public function affectTutor()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $Nstudents = Student::orderBy('name', 'ASC')->whereNull('classroom_id')->get();
        $students = Student::orderBy('name', 'ASC')->whereNotNull('classroom_id')->get();

        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();


        return view('admin.affectTutor', compact('students', 'Nstudents', 'admin', 'classrooms', 'academicyearP'));
    }



    public function affectationTutor(Request $request)
    {


        //$input = $request->all();


        $admin = Admin::find(Auth::user()->id);

        $NNtutor = Tutor::where('email', request('email'))->first();
        $AStudent = Student::find(request('student_id'));

        $AStudent->tutor_id = $NNtutor->id;
        $AStudent->save();

        if (!empty($AStudent)) {

            return redirect('/kuro/admin/affectTutor?q=Affected')->with('status3', 'Affectation Reussie');           # code...
        } else {
            return redirect('/kuro/admin/affectTutor?q=NonAffected')->with('status4', 'Aucun tuteur ne correspond à ce critère');
        }
    }



    public function affectationTutor1(Request $request)
    {


        //$input = $request->all();


        $admin = Admin::find(Auth::user()->id);

        $NNstudent = Student::where('matricule', request('matricule'))->first();
        $Atutor = Tutor::find(request('tutor_id'));

        $NNstudent->tutor_id = $Atutor->id;
        $NNstudent->save();

        if (!empty($NNstudent)) {

            return redirect('/kuro/admin/tutor?q=Affected')->with('status3', 'Affectation Reussie');           # code...
        } else {
            return redirect('/kuro/admin/tutor?q=NonAffected')->with('status4', 'Aucun etudiant ne correspond pour cette affectation');
        }
    }


    public function CreateTutor(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'surname' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'gender' => 'required',

        ]);

        $varMachaine0 = request('name');
        $varMachaine1 = request('surname');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);


        $tutor = Tutor::create([

            'name' => strtoupper($name),
            'surname' => strtoupper($surname),
            'tel' => request('tel'),
            'email' => request('email'),
            'gender' => request('gender'),
        ]);

        $pass = str_random(8); // FOR PASSWORD PURPOSE
        $pass = strtolower($pass);
        $tutor->password = $pass;
        $tutor->image = $pass;
        $tutor->save();

        return redirect('/kuro/admin/tutor?q=Created')->with('status1', 'Nouveau tuteur ajouté !');
    }

    public function findTutor()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = Student::whereNull('tutor_id')->whereNotNull('matricule')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();

        return view('admin.findTutor', compact('academicyearP', 'students', 'admin', 'classrooms'));
    }

    /* START MANAGER GET TUTOR SECTION */
    public function getTutor1()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $Ututor = Tutor::where('email', $q)->first();

        return view('admin.getTutor1', compact('Ututor'));
    }


    public function getTutor2()
    {
        $q = request()->get('q');
        $qq = request()->get('qq');
        $admin = Admin::find(Auth::user()->id);
        $tutors = Tutor::where('name', $q)->where('surname', $qq)->get();

        return view('admin.getTutor2', compact('tutors'));
    }

    public function getTutor3()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $classroom = Classroom::find($q);
        $tutors = Tutor::get();

        return view('admin.getTutor3', compact('classroom', 'tutors'));
    }

    /* END MANAGER GET TUTOR SECTION */


    public function editTutor()
    {

        $admin = Admin::find(Auth::user()->id);
        $students = Student::orderBy('name', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();


        return view('admin.editTutor', compact('academicyearP', 'Tutors', 'admin'));
    }


    public function modifyTutor(Request $request)

    {

        $tutor = tutor::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->surname;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);

        if ($request->filled('name')) {
            $tutor->name = strtoupper($name);
        }
        if ($request->filled('surname')) {
            $tutor->surname = strtoupper($surname);
        }
        if ($request->filled('gender')) {
            $tutor->gender = $request->gender;
        }
        if ($request->filled('tel')) {
            $tutor->tel = $request->tel;
        }
        if ($request->filled('email')) {
            $tutor->email = $request->email;
        }


        $tutor->save();


        return redirect('/kuro/admin/tutor?q=modified')->with('status1', 'Modification prise en compte!');
    }

    public function modifyTutor1(Request $request)

    {

        $tutor = tutor::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->surname;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);

        if ($request->filled('name')) {
            $tutor->name = strtoupper($name);
        }
        if ($request->filled('surname')) {
            $tutor->surname = strtoupper($surname);
        }
        if ($request->filled('gender')) {
            $tutor->gender = $request->gender;
        }
        if ($request->filled('tel')) {
            $tutor->tel = $request->tel;
        }
        if ($request->filled('email')) {
            $tutor->email = $request->email;
        }


        $tutor->save();


        return redirect('/kuro/admin/tutor?q=modified')->with('status1', 'Modification prise en compte!');
    }



    public function deleteTutor(Request $request)

    {

        $tutor = Tutor::find($request->id);

        $tutor->delete();

        return redirect('/kuro/admin/tutor')->with('status2', 'Le Tuteur a été supprimé');
    }


    /*############ END TUTOR ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ STUDENT ###########################################################################*/

    public function student()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $students = Student::get();
        $Ustudent = Student::latest()->first();


        return view('admin.student', compact('students', 'classrooms', 'admin', 'academicyearP', 'Ustudent'));
    }

    public function studentMany()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $students = Student::get();
        $Ustudent = Student::latest()->first();


        return view('admin.studentMany', compact('students', 'classrooms', 'admin', 'academicyearP', 'Ustudent'));
    }



    public function affectStudent()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $Nstudents = Student::whereNull('classroom_id')->orderBy('created_at', 'DESC')->get();
        $students = Student::whereNotNull('classroom_id')->orderBy('created_at', 'DESC')->get();

        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();


        return view('admin.affectStudent', compact('students', 'Nstudents', 'admin', 'classrooms', 'academicyearP'));
    }


    public function affectationStudent(Request $request)
    {


        $input = $request->all();


        $admin = Admin::find(Auth::user()->id);
        $Nstudents = Student::whereNull('classroom_id')->get();

        for ($i = 1; $i <= $Nstudents->count(); $i++) {

            $NNstudent = Student::find(request('student' . $i));
            $Aclassroom = Classroom::find(request('classroom' . $i));

            /*
            $num = mt_rand(1000, 9999);
            $NNstudent->classroom_id=$Aclassroom->id;
            $NNstudent->matricule= $NNstudent->name.$num;
            $NNstudent->password='password';
            $NNstudent->save();
            $academicyearP=Academicyear::where('state','process')->first();
            $NNstudent->academicyears()->attach($academicyearP->id);
*/
            $num = mt_rand(100, 999); // FOR MATRICULE PURPOSE
            $str = str_random(3); // FOR MATRICULE PURPOSE
            $pass = str_random(8); // FOR PASSWORD PURPOSE


            $pass = strtolower($pass);


            $NNstudent->classroom_id = $Aclassroom->id;
            $NNstudent->matricule = strtolower($NNstudent->name . $num . $str);
            $NNstudent->password = $pass;
            $NNstudent->image = $pass;
            $NNstudent->save();
            $academicyearP = Academicyear::where('state', 'process')->first();
            $NNstudent->academicyears()->attach($academicyearP->id);
        }

        return redirect('/kuro/admin/affectStudent')->with('status2', 'Affectation Reussie');
    }


    public function CreateStudent(Request $request)

    {

        $this->validate(request(), [

            'name' => 'required',
            'surname' => 'required',
            //'tel'=> 'required',
            'email' => 'required',
            // 'address'=> 'required',
            // 'nationality'=> 'required',
            'gender' => 'required',
            'dateofbirth' => 'required',
        ]);

        $varMachaine0 = request('name');
        $varMachaine1 = request('surname');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);

        $student = Student::create([

            'name' => strtoupper($name),
            'surname' => strtoupper($surname),
            'tel' => request('tel'),
            'email' => request('email'),
            'address' => request('address'),
            'nationality' => request('nationality'),
            'gender' => request('gender'),
            'dateofbirth' => request('dateofbirth'),
            'responsable' => '0',
            'Pmessage' => "NULL",
            "postBDE" => "NULL",
            'password' => '12345678'


        ]);


        return redirect('/kuro/admin/student?q=Created')->with('status1', 'Nouvel étudiant ajouté!');
    }

    public function findStudent()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = $academicyearP->students()->orderBy('name', 'ASC')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();

        return view('admin.findStudent', compact('academicyearP', 'students', 'admin', 'classrooms'));
    }

    /* START MANAGER GET STUDENT SECTION */
    public function getStudent1()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $student = $academicyearP->students()->where('matricule', $q)->first();

        return view('admin.getStudent1', compact('student'));
    }

    public function getStudent2()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        // $classroom=Classroom::where('academicyear_id',$academicyearP->id)->where('id',$q)->first();
        $classroom = Classroom::where('id', $q)->where('academicyear_id', $academicyearP->id)->first();
        // dd($classroom);

        return view('admin.getStudent2', compact('classroom'));
    }

    public function getStudent3()
    {
        $q = request()->get('q');
        $qq = request()->get('qq');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $students = $academicyearP->students()->where('name', $q)->where('surname', $qq)->get();
        //dd($students);

        return view('admin.getStudent3', compact('students'));
    }

    /* END MANAGER GET STUDENT SECTION */


    public function editStudent()
    {

        $admin = Admin::find(Auth::user()->id);
        $students = Student::orderBy('name', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();


        return view('admin.editStudent', compact('academicyearP', 'students', 'admin'));
    }

    public function modifyStudent(Request $request)

    {

        $student = Student::find($request->id);

        $varMachaine0 = $request->name;
        $varMachaine1 = $request->surname;

        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $name = str_replace($search0, $replace0, $varMachaine0);
        $surname = str_replace($search0, $replace0, $varMachaine1);

        if ($request->filled('name')) {
            $student->name = strtoupper($name);
        }
        if ($request->filled('surname')) {
            $student->surname = strtoupper($surname);
        }
        if ($request->filled('dateofbirth')) {
            $student->dateofbirth = $request->dateofbirth;
        }
        if ($request->filled('gender')) {
            $student->gender = $request->gender;
        }

        if ($request->filled('nationality')) {
            $student->nationality = $request->nationality;
        }

        if ($request->filled('tel')) {
            $student->tel = $request->tel;
        }

        if ($request->filled('email')) {
            $student->email = $request->email;
        }

        if ($request->filled('address')) {
            $student->address = $request->address;
        }

        $student->save();



        return redirect('/kuro/admin/findStudent')->with('status1', 'Modification prise en compte!');
    }



    public function deleteStudent(Request $request)

    {

        $student = Student::find($request->id);

        $student->delete();

        return redirect('/kuro/admin/findStudent')->with('status2', 'Etudiant a été supprimé');
    }


    /*############ END STUDENT ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ SCHOOL NEWS ###########################################################################*/

    public function schoolNews()

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $news = Actuality::where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();

        return view('admin.schoolNews', compact('academicyearP', 'news', 'admin'));
    }


    public function CreateSchoolNews(Request $request)

    {
        $academicyearP = Academicyear::where('state', 'process')->first();
        $this->validate(request(), [

            'title' => 'required',
            'description' => 'required',

        ]);

        $varMachaine0 = request('title');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $title = str_replace($search0, $replace0, $varMachaine0);

        $news = Actuality::create([

            'title' => strtoupper($title),
            'description' => request('description'),
            'academicyear_id' => $academicyearP->id,

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
        $teachers = Teacher::get();


        foreach ($students as $student) {

            $ltn = Sltn::create([
                'label' => $news->title,
                'type' => 'NEWS',
                'reference' => $news->id,
                'student_id' => $student->id,
            ]);
        }


        foreach ($teachers as $teacher) {

            $tltn = Tltn::create([
                'label' => $news->title,
                'type' => 'NEWS',
                'reference' => $news->id,
                'teacher_id' => $teacher->id,
            ]);
        }

        return redirect('/kuro/admin/schoolNews?q=Created')->with('status1', 'Nouvelle Actualité ajoutée!');
    }



    public function schoolBde()

    {
        $admin = Admin::find(Auth::user()->id);
        $news = Actuality::orderBy('created_at', 'DESC')->get();
        $studentP = Student::where('president', 1)->first();

        return view('admin.schoolBde', compact('news', 'admin', 'studentP'));
    }


    public function adTeam()

    {
        $admin = Admin::find(Auth::user()->id);
        $teachers = Teacher::orderBy('name', 'DESC')->get();
        $managers = Manager::orderBy('name', 'DESC')->get();
        $director = Director::find(1);
        $academicyearP = Academicyear::where('state', 'process')->first();
        return view('admin.adTeam', compact('academicyearP', 'admin', 'teachers', 'managers', 'director'));
    }

    /*############ END SCHOOL NEWS ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ RESSOURCES ###########################################################################*/

    public function ressource()

    {
        $admin = Admin::find(Auth::user()->id);
        $ressources = Ressource::whereNull('teacher_id')->orderBy('created_at', 'DESC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms1 = Classroom::where('level', 1)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms2 = Classroom::where('level', 2)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms3 = Classroom::where('level', 3)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms4 = Classroom::where('level', 4)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms5 = Classroom::where('level', 5)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();


        return view('admin.ressource', compact('academicyearP', 'admin', 'classrooms1', 'classrooms2', 'classrooms3', 'classrooms4', 'classrooms5', 'ressources'));
    }


    public function findRessource()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();

        return view('admin.findRessource', compact('academicyearP', 'teachers', 'admin', 'classrooms'));
    }


    public function getRessource1()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = Ressource::whereDate('created_at', $q)->get();

        return view('admin.getRessource1', compact('ressources', 'academicyearP'));
    }

    public function getRessource2()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classroom = Classroom::find($q);

        return view('admin.getRessource2', compact('classroom', 'academicyearP'));
    }

    public function getRessource3()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $teacher = Teacher::where('email', $q)->first();
        // $teachers=Teacher::orderBy('name','ASC')->get();

        return view('admin.getRessource3', compact('teacher', 'academicyearP'));
    }


    public function Rstandard()

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = Ressource::whereNull('teacher_id')->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();



        return view('admin.rstandard', compact('academicyearP', 'admin', 'ressources'));
    }

    public function Rteacher()

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $ressources = Ressource::whereNotNull('teacher_id')->where('academicyear_id', $academicyearP->id)->orderBy('created_at', 'DESC')->get();


        return view('admin.rteacher', compact('academicyearP', 'admin', 'ressources'));
    }


    public function CreateRessourceDocument(Request $request)

    {
        $academicyearP = Academicyear::where('state', 'process')->first();
        $this->validate(request(), [

            //    'classroom_id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'upload_file' => 'required',
        ]);

        $varMachaine0 = request('title');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $title = str_replace($search0, $replace0, $varMachaine0);

        $ressource = Ressource::create([

            'title' => strtoupper($title),
            'description' => request('description'),
            'academicyear_id' => $academicyearP->id,

        ]);

        if (request()->hasFile('upload_file')) {
            $uploadedFile = $request->file('upload_file');
            $FileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $extension = $uploadedFile->getClientOriginalExtension();
            $destinationPath = public_path('/files/ressource/standard');
            $uploadedFile->move($destinationPath, $FileName);
            $ressource->upload = $FileName;
            $ressource->extension = $extension;

            if ($request->input('classroom')) {
                $checkedclassroom = $request->input('classroom');

                foreach ($checkedclassroom as $checkedC) {
                    $ressource->classrooms()->attach($checkedC);

                    $students = Student::where('classroom_id', $checkedC)->get();

                    foreach ($students as $student) {

                        $ltn = Sltn::create([
                            'label' => 'Une nouvelle ressource a été ajoutée par l administration',
                            'type' => 'RESSOURCE',
                            'reference' => $ressource->id,
                            'student_id' => $student->id,
                        ]);
                    }
                }
            }

            $ressource->classrooms()->attach(request('classroom_id'));
            $ressource->save();
        }


        return redirect('/kuro/admin/ressource')->with('status1', 'Nouveau document ajouté!');
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

        $varMachaine0 = request('title');


        $search0  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', "’");
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace0 = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', "'");

        $title = str_replace($search0, $replace0, $varMachaine0);

        $ressource = Ressource::create([

            'title' => strtoupper($title),
            'description' => request('description'),
            'extension' => "url",
            'lien' => request('lien'),
            'academicyear_id' => $academicyearP->id,
        ]);

        if ($request->input('classroom')) {
            $checkedclassroom = $request->input('classroom');

            foreach ($checkedclassroom as $checkedC) {
                $ressource->classrooms()->attach($checkedC);

                $students = Student::where('classroom_id', $checkedC)->get();

                foreach ($students as $student) {

                    $ltn = Sltn::create([
                        'label' => 'Une nouvelle ressource a été ajoutée par l administration',
                        'type' => 'RESSOURCE',
                        'reference' => $ressource->id,
                        'student_id' => $student->id,
                    ]);
                }
            }
        }

        $ressource->classrooms()->attach(request('classroom_id'));
        $ressource->save();

        return redirect('/kuro/admin/ressource')->with('status2', 'Nouveau lien ajouté!');
    }



    public function DeleteRessource(Request $request)

    {

        $ressource = Ressource::find($request->id);

        $ressource->delete();

        $ressource->classrooms()->detach($request->id);


        return redirect('/kuro/admin/ressource')->with('status3', 'La Ressource a été supprimée avec succès!');
    }


    /*############ END RESSOURCES ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START CALENDAR ###########################################################################*/

    public function calendar()

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->get();
        $epreuves = Epreuve::get();

        return view('admin.calendar', compact('academicyearP', 'admin', 'subjects', 'epreuves', 'calendars', 'classrooms'));
    }


    public function findCalendar()

    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();


        return view('admin.findCalendar', compact('academicyearP', 'admin', 'classrooms'));
    }

    public function getCalendar()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classroom = Classroom::find($q);
        $calendars = Calendar::where('classroom_id', $classroom->id)->get();
        $epreuves = Epreuve::get();

        return view('admin.getCalendar', compact('academicyearP', 'classroom', 'calendars', 'epreuves'));
    }



    /*############ END CALENDAR ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ START QUEST ###########################################################################*/

    public function quest(Request $request)

    {
        $admin = Admin::find(Auth::user()->id);
        $quests = Quest::get();
        $squests = Squest::orderBy('state', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();


        return view('admin.quest', compact('academicyearP', 'admin', 'quests', 'squests'));
    }

    public function confirmQ(Request $request)

    {
        $Qt = request()->get('Qt');

        $squest = Squest::find($Qt);
        $squest->state = 1;
        $squest->save();
        // $squest->delete();

        $admin = Admin::find(Auth::user()->id);
        $quests = Quest::get();
        $squests = Squest::orderBy('state', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.quest', compact('academicyearP', 'admin', 'quests', 'squests'));
    }

    public function abortQ(Request $request)

    {
        $Qt = request()->get('Qt');

        $squest = Squest::find($Qt);
        $squest->state = 2;
        $squest->save();

        // $squest->delete();

        $admin = Admin::find(Auth::user()->id);
        $quests = Quest::get();
        $squests = Squest::orderBy('state', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.quest', compact('academicyearP', 'admin', 'quests', 'squests'));
    }




    /*############ END QUEST ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------

    /*############ MESSAGES ###########################################################################*/

    public function msgStudent()

    {
        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms1 = Classroom::where('level', 1)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms2 = Classroom::where('level', 2)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms3 = Classroom::where('level', 3)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms4 = Classroom::where('level', 4)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        $classrooms5 = Classroom::where('level', 5)->where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();



        return view('admin.smessage', compact('academicyearP', 'admin', 'classrooms1', 'classrooms2', 'classrooms3', 'classrooms4', 'classrooms5'));
    }

    public function msgTeacher()

    {
        $admin = Admin::find(Auth::user()->id);

        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.tmessage', compact('academicyearP', 'admin', 'teachers'));
    }

    /*############ END MESSAGES ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ MANAGER MESSAGE ###########################################################################*/

    public function CreateSmsg(Request $request)

    {
        ini_set('max_execution_time', 18000); //3 minutes

        $this->validate(request(), [

            'title' => 'required',
            'description' =>  'required',
        ]);

        $Smsg = Smsg::create([

            'title' => request('title'),
            'description' => request('description'),
            'manager_id' => Auth::user()->id,
        ]);


        if ($request->input('classroom')) {

            $checkedclassroom = $request->input('classroom');

            foreach ($checkedclassroom as $checkedC) {

                $students = Student::where('classroom_id', $checkedC)->get();

                foreach ($students as $student) {
                    if (!empty($student)) {
                        $Smsg->students()->attach($student->id);

                        $ltn = Sltn::create([
                            'label' => 'Vous avez un nouveau message : ' . $Smsg->title,
                            'type' => 'MESSAGE',
                            'reference' => $Smsg->id,
                            'student_id' => $student->id,
                        ]); // Send Notif to student


                    } //IF EMPTY
                } // Loop student

            } // loop classroom

        } // IF classroom


        return redirect('kuro/admin/message/student')->with('status1', 'Message Envoyé');
    }



    public function CreateTmsg(Request $request)

    {
        ini_set('max_execution_time', 18000); //3 minutes

        $this->validate(request(), [

            'title' => 'required',
            'description' =>  'required',
        ]);

        $Tmsg = Tmsg::create([

            'title' => request('title'),
            'description' => request('description'),
            'manager_id' => Auth::user()->id,
        ]);


        if ($request->input('teacher')) {

            $checkedteacher = $request->input('teacher');

            foreach ($checkedteacher as $checkedC) {

                $teacher = Teacher::find($checkedC);

                if (!empty($teacher)) {
                    $Tmsg->teachers()->attach($teacher->id);

                    $ltn = Tltn::create([
                        'label' => 'Vous avez un nouveau message : ' . $Tmsg->title,
                        'type' => 'MESSAGE',
                        'reference' => $Tmsg->id,
                        'teacher_id' => $teacher->id,
                    ]); // Send Notif to teacher


                } //IF EMPTY

            } // loop teacher

        } // IF teacher


        return redirect('kuro/admin/message/teacher')->with('status1', 'Message Envoyé');
    }

    /*############ END MANAGER MESSAGE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------


    /*############ START TIMETABLE ###########################################################################*/

    public function findTimetable()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();
        return view('admin.findTimetable', compact('academicyearP', 'admin', 'classrooms'));
    }

    /*############ END TIMETABLE ###########################################################################*/


    /*############ START SETTINGS ###########################################################################*/

    public function stopMark()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();

        // $subs=$semesterP->subjects()->where('classroom_id',1)->get();

        //dd($subs);

        return view('admin.stopMark', compact('admin', 'classrooms', 'academicyearP', 'semesterP'));
    }

    public function stopNote(Request $request)

    {

        $semesterP = Semester::where('state', 'process')->first();

        if ($request->filled('stopNote')) {
            $semesterP->arretDesNotes = $request->stopNote;
            $semesterP->save();
            return redirect('/kuro/admin/stop/mark')->with('status1', 'ARRÊT DES NOTES ACTIVE !');
        } else {
            return redirect('/kuro/admin/stop/mark');
        }
    }

    public function getStopMark()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $classroom = Classroom::where('name', $q)->first();
        // $teachers=Teacher::orderBy('name','ASC')->get();

        return view('admin.getStopMark', compact('classroom'));
    }

    public function generateBull(Request $request)
    {

        ini_set('max_execution_time', 18000); //3 minutes



        $classroom = Classroom::find($request->classID);


        $pdf = PDF::loadView('admin.pdf', ['data' => $classroom]);

        return $pdf->download('bull.pdf');
    }


    public function buildSemesterMoy(Request $request)
    {


        ini_set('max_execution_time', 18000); //3 minutes

        $semesterP = Semester::where('state', 'process')->first();

        $classroom = Classroom::find($request->classID);
        // $Students= $classroom->students;

        foreach ($classroom->students as $student) {

            $avgs = $student->subjectavgs->where('semester_id', $semesterP->id)->all();

            //  dd($avgs);

            $x = 0;
            $i = 0;

            foreach ($avgs as $avg) {

                $x = $x + $avg->valueGrle;

                $i++;
            }

            $z = $x / $i;
            $Moy = round($z, 2);

            $semesteravg = Semesteravg::create([

                'label' => $semesterP->label,
                'value' => $Moy,
                'student_id' => $student->id,
                'semester_id' => $semesterP->id,
                'classroom_id' => $classroom->id,
            ]);
        }

        // START RANK CALCULATION

        $semesteravgs = Semesteravg::where('classroom_id', $classroom->id)->where('semester_id', $semesterP->id)->orderBy('value', 'DESC')->get();


        foreach ($semesteravgs as $semesteravg) {

            $values = $semesteravgs->whereNotIn('id', [$semesteravg->id])->pluck('value')->toArray();

            $p = $semesteravgs->where('state', 'oui')->count();


            if (in_array($semesteravg->value, $values) and $semesteravg->state == 'non') {

                //   dd('this number exist in array '.$subjectavg->value);
                //   $subjectavg->rank = $r.'exe' ;
                $avgs = $semesteravgs->where('value', $semesteravg->value)->all();
                foreach ($avgs as $avg) {
                    $avg->rank = 1 + $p . 'ex';
                    $avg->state = 'oui';
                    $avg->save();
                }
            } elseif (!in_array($semesteravg->value, $values) and $semesteravg->state == 'non') {
                $semesteravg->rank = 1 + $p;
                $semesteravg->state = 'oui';
                $semesteravg->save();
            }
        }


        // END RANK CALCULATION


        $classroom->semesterAvg = 1;
        $classroom->save();

        return redirect('/kuro/admin/stop/mark')->with('status1', 'Les moyennes de la classe ' . $classroom->name . ' ont été bien calculée ');
    }



    public function transcript()
    {

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $classrooms = Classroom::where('academicyear_id', $academicyearP->id)->orderBy('name', 'ASC')->get();

        return view('admin.transcript', compact('academicyearP', 'admin', 'classrooms'));
    }

    public function getClassroom8()
    {
        $q = request()->get('q');

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $semesters = Semester::where('academicyear_id', $academicyearP->id)->get();


        $epreuves = Epreuve::get();
        $classroom = Classroom::find($q);
        $programs = Program::orderBy('levelInt', 'ASC')->get();

        return view('admin.getClassroom8', compact('classroom', 'programs', 'epreuves', 'academicyearP', 'semesters', 'semesterP'));
    }


    public function archive()
    {

        $admin = Admin::find(Auth::user()->id);
        $classrooms = Classroom::orderBy('name', 'ASC')->get();

        //GET ARRAY OF UNIQUE CLASSROOM NAME
        $Classroom1 = array();

        foreach ($classrooms as $classroom) {

            array_push($Classroom1, $classroom->name);
        }

        $collection = collect($Classroom1);
        $unique = $collection->unique();
        $UniqueClass = $unique->values()->all();
        //GET ARRAY OF UNIQUE CLASSROOM NAME


        $academicyears = Academicyear::orderBy('id', 'DESC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.archive', compact('academicyearP', 'admin', 'classrooms', 'academicyears', 'UniqueClass'));
    }

    public function getBulletin1()
    {
        $q = request()->get('q');
        $k = request()->get('k');

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::find($k);
        $semesters = Semester::where('academicyear_id', $academicyearP->id)->get();


        $epreuves = Epreuve::get();
        $classroom = Classroom::where('name', $q)->where('academicyear_id', $academicyearP->id)->first();
        $programs = Program::orderBy('levelInt', 'ASC')->get();

        return view('admin.getBulletin1', compact('classroom', 'programs', 'epreuves', 'academicyearP', 'semesters'));
    }

    public function getBulletin2()
    {
        $q = request()->get('q');
        $k = request()->get('k');

        $admin = Admin::find(Auth::user()->id);
        $academicyearP = Academicyear::find($k);
        $semesters = Semester::where('academicyear_id', $academicyearP->id)->get();


        $epreuves = Epreuve::get();
        $student = $academicyearP->students()->where('matricule', $q)->first();
        $programs = Program::orderBy('levelInt', 'ASC')->get();

        return view('admin.getBulletin2', compact('student', 'programs', 'epreuves', 'academicyearP', 'semesters'));
    }


    public function printBulletin1(Request $request)
    {

        ini_set('max_execution_time', 18000); //3 minutes

        // $students= Student::where('classroom_id',21)->get();

        $student = Student::find($request->id);
        $semesterP = Semester::find($request->semester_id);


        $pdf = PDF::loadView('pdf', ['student' => $student, 'semesterP' => $semesterP]);

        //  $pdf->setPaper('A4', 'landscape');
        //  $pdf->stream();

        return $pdf->download('hetecStudent.pdf');

        // return $pdf->stream('hetecStudent.pdf');

    }

    public function printBulletin2(Request $request)
    {

        ini_set('max_execution_time', 18000); //3 minutes

        // $students= Student::where('classroom_id',21)->get();

        $student = Student::find($request->id);
        $academicyearP = Academicyear::find($request->academicyear_id);
        //dd($academicyearP);

        $pdf = PDF::loadView('pdf2', ['student' => $student, 'academicyearP' => $academicyearP]);

        //  $pdf->setPaper('A4', 'landscape');
        //  $pdf->stream();

        return $pdf->download('hetecStudent.pdf');

        // return $pdf->stream('hetecStudent.pdf');

    }


    public function schoolYear()
    {

        $admin = Admin::find(Auth::user()->id);
        $classrooms = Classroom::orderBy('name', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.schoolYear', compact('academicyearP', 'admin', 'classrooms'));
    }


    public function schoolSemester()
    {

        $admin = Admin::find(Auth::user()->id);
        $classrooms = Classroom::orderBy('name', 'ASC')->get();
        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.schoolSemester', compact('academicyearP', 'admin', 'classrooms'));
    }

    public function CreateSY(Request $request)

    {

        $this->validate(request(), [

            'sy' => 'required',
        ]);

        $T = request('sy');
        $T1 = request('sy') + 1;



        $academicyear = Academicyear::where('state', 'process')->first();
        if ($academicyear) {
            $Csemester = $academicyear->semesters()->count();
        } else {
            $Csemester = 0;
        }

        if ($academicyear) {
            $classrooms = Classroom::where('academicyear_id', $academicyear->id)->get();
        } else {
            $classrooms = Classroom::get();
        }
        if ($classrooms) {
            $CSclassrooms = $classrooms->where('semesterAvg', 1)->count();
            $Cclassrooms = $classrooms->count();
        } else {
            $CSclassrooms = 0;
            $Cclassrooms = 0;
        }


        $subjects = subject::get();

        /* START SEMESTRE 0 ET ANNE SCOLAIRE 0 */

        if ($Csemester == 0) {

            $academicyearP = Academicyear::create([

                'labelYear' => 'ANNEE SCOLAIRE ' . $T . ' - ' . $T1,
                'state' => 'process',
                'startDate' => now(),
                // 'endDate' => ,
                'startYear' => $T,
                'endYear' => $T1,
            ]);

            $semesterP = Semester::create([

                'label' => 'SEMESTRE I - ' . $T . '/' . $T1,
                'level' => 1,
                'state' => 'process',
                'startDate' => now(),
                // 'endDate' => ,
                'arretDesNotes' => 0,
                'academicyear_id' => $academicyearP->id,
            ]);

            $academicyears = Academicyear::whereNotIn('id', [$academicyearP->id])->get();


            foreach ($academicyears as $academicyear) {

                $academicyear->state = 'DONE';
                $academicyear->save();
            }

            $semesters = Semester::whereNotIn('id', [$semesterP->id])->get();

            foreach ($semesters as $semester) {

                $semester->state = 'DONE';
                $semester->save();
            }


            return redirect('kuro/admin/school/year')->with('status1', $academicyearP->labelYear . ' CREEE');
        }
        /* END SEMESTRE 0 ET ANNE SCOLAIRE 0 */


        /* START SEMESTRE 1 ANNEE SCOLAIRE 1 */
        if ($Csemester == 1) {
            return redirect('kuro/admin/school/year')->with('status2', 'IMPOSSIBLE DE CREER UNE ANNEE SCOLAIRE');
        }
        /* END SEMESTRE 1 ANNEE SCOLAIRE 1 */




        /* START SEMESTRE 2 ET ANNE SCOLAIRE 1 */

        if ($Csemester == 2  and $CSclassrooms == $Cclassrooms) {


            $academicyearP = Academicyear::create([

                'labelYear' => 'ANNEE SCOLAIRE ' . $T . ' - ' . $T1,
                'state' => 'process',
                'startDate' => now(),
                // 'endDate' => ,
                'startYear' => $T,
                'endYear' => $T1,
            ]);

            $semesterP = Semester::create([

                'label' => 'SEMESTRE I - ' . $T . '/' . $T1,
                'level' => 1,
                'state' => 'process',
                'startDate' => now(),
                // 'endDate' => ,
                'arretDesNotes' => 0,
                'academicyear_id' => $academicyearP->id,
            ]);

            $academicyears = Academicyear::whereNotIn('id', [$academicyearP->id])->get();


            foreach ($academicyears as $academicyear) {

                $academicyear->state = 'DONE';
                $academicyear->save();
            }

            $semesters = Semester::whereNotIn('id', [$semesterP->id])->get();

            foreach ($semesters as $semester) {

                $semester->state = 'DONE';
                $semester->arretDesNotes = 0;
                $semester->save();
            }


            foreach ($classrooms as $classroom) {

                $classroom->semesterAvg = 0;
                $classroom->annualAvg = 0;
                $classroom->save();
            }

            foreach ($subjects as $subject) {

                $subject->arretDesNotes = 0;
                $subject->save();
            }

            return redirect('kuro/admin/school/year')->with('status3', $academicyearP->labelYear . ' CREEE');
        }
        /* END SEMESTRE 2 ET ANNE SCOLAIRE 1 */
    }


    public function CreateSS(Request $request)

    {


        $this->validate(request(), [

            'ss' => 'required',
        ]);



        $T = request('ss');
        $T1 = request('ss') + 1;



        $academicyear = Academicyear::where('state', 'process')->first();
        $Csemester = $academicyear->semesters()->count();
        // dd($Csemester);

        $classrooms = Classroom::where('academicyear_id', $academicyear->id)->get();
        if ($classrooms) {
            $CSclassrooms = $classrooms->where('semesterAvg', 1)->count();
            $Cclassrooms = $classrooms->count();
        } else {
            $CSclassrooms = 888; //faux chiffre lorsque ya pas de classe
            $Cclassrooms = 777; // faux chiffre lorsque ya pas de classe
        }

        $subjects = subject::get();

        // START SEMESTRE 0 , ANNEE SCOLAIRE 0

        if ($Csemester == 0) {

            return redirect('kuro/admin/school/semester')->with('status2', 'IMPOSSIBLE DE CREER CE SEMESTRE');
        }
        // END SEMESTRE 0 , ANNEE SCOLAIRE 0

        // START SEMESTRE 2 , ANNEE SCOLAIRE 1

        if ($Csemester == 2) {

            return redirect('kuro/admin/school/semester')->with('status20', 'IMPOSSIBLE DE CREER UN DEUXIEME SECOND SEMESTRE');
        }
        // END SEMESTRE 0 , ANNEE SCOLAIRE 0


        // START SEMESTRE 1 , ANNEE SCOLAIRE 1

        if ($Csemester == 1  and  $Cclassrooms !== 0 and $CSclassrooms == $Cclassrooms) {

            $semesterP = Semester::create([

                'label' => 'SEMESTRE II - ' . $T . '/' . $T1,
                'level' => 2,
                'state' => 'process',
                'startDate' => now(),
                // 'endDate' => ,
                'arretDesNotes' => 0,
                'academicyear_id' => $academicyear->id,
            ]);


            $semesters = Semester::whereNotIn('id', [$semesterP->id])->get();

            foreach ($semesters as $semester) {

                $semester->state = 'DONE';
                $semester->arretDesNotes = 0;
                $semester->save();
            }


            foreach ($classrooms as $classroom) {

                $classroom->semesterAvg = 0;
                $classroom->annualAvg = 0;
                $classroom->save();
            }

            /*
            foreach ($subjects as $subject ) {

                $subject->arretDesNotes= 0;
                $subject->semesters()->attach($semesterP->id);
                $subject->save();
            }
*/
            return redirect('kuro/admin/school/semester')->with('status1', $semesterP->label . ' CREEE');
        } else {

            return redirect('kuro/admin/school/semester')->with('status3', 'IMPOSSIBLE DE DEMARRER LE SECOND SEMESTRE');
        }
    }

    /*############ END SETTINGS ###########################################################################*/





    public function getTimetable()
    {
        $q = request()->get('q');
        $admin = Admin::find(Auth::user()->id);
        $classroom = Classroom::find($q);
        $academicyearP = Academicyear::where('state', 'process')->first();
        $semesterP = Semester::where('state', 'process')->first();
        $timetable = $semesterP->subjects()->where('classroom_id', $classroom->id)->get();
        #8
        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi8 = $classroom->subjects->where('startime', '08:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi8)) {
                    $lundi8 = 'X';
                }
            }
        } //endfor



        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi8 = $classroom->subjects->where('startime', '08:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi8)) {
                    $mardi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi8 = $classroom->subjects->where('startime', '08:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi8)) {
                    $mercredi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi8 = $classroom->subjects->where('startime', '08:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi8)) {
                    $jeudi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi8 = $classroom->subjects->where('startime', '08:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi8)) {
                    $vendredi8 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi8 = $classroom->subjects->where('startime', '08:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi8)) {
                    $samedi8 = 'X';
                }
            }
        } //endfor

        #9

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi9 = $classroom->subjects->where('startime', '09:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi9)) {
                    $lundi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi9 = $classroom->subjects->where('startime', '09:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi9)) {
                    $mardi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi9 = $classroom->subjects->where('startime', '09:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi9)) {
                    $mercredi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi9 = $classroom->subjects->where('startime', '09:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi9)) {
                    $jeudi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi9 = $classroom->subjects->where('startime', '09:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi9)) {
                    $vendredi9 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi9 = $classroom->subjects->where('startime', '09:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi9)) {
                    $samedi9 = 'X';
                }
            }
        } //endfor
        #10

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi10 = $classroom->subjects->where('startime', '10:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi10)) {
                    $lundi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi10 = $classroom->subjects->where('startime', '10:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi10)) {
                    $mardi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi10 = $classroom->subjects->where('startime', '10:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi10)) {
                    $mercredi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi10 = $classroom->subjects->where('startime', '10:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi10)) {
                    $jeudi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi10 = $classroom->subjects->where('startime', '10:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi10)) {
                    $vendredi10 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi10 = $classroom->subjects->where('startime', '10:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi10)) {
                    $samedi10 = 'X';
                }
            }
        } //endfor



        #11

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi11 = $classroom->subjects->where('startime', '11:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi11)) {
                    $lundi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi11 = $classroom->subjects->where('startime', '11:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi11)) {
                    $mardi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi11 = $classroom->subjects->where('startime', '11:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi11)) {
                    $mercredi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi11 = $classroom->subjects->where('startime', '11:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi11)) {
                    $jeudi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi11 = $classroom->subjects->where('startime', '11:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi11)) {
                    $vendredi11 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi11 = $classroom->subjects->where('startime', '11:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi11)) {
                    $samedi11 = 'X';
                }
            }
        } //endfor



        #12

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi12 = $classroom->subjects->where('startime', '12:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi12)) {
                    $lundi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi12 = $classroom->subjects->where('startime', '12:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi12)) {
                    $mardi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi12 = $classroom->subjects->where('startime', '12:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi12)) {
                    $mercredi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi12 = $classroom->subjects->where('startime', '12:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi12)) {
                    $jeudi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi12 = $classroom->subjects->where('startime', '12:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi12)) {
                    $vendredi12 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi12 = $classroom->subjects->where('startime', '12:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi12)) {
                    $samedi12 = 'X';
                }
            }
        } //endfor


        #13

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi13 = $classroom->subjects->where('startime', '13:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi13)) {
                    $lundi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi13 = $classroom->subjects->where('startime', '13:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi13)) {
                    $mardi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi13 = $classroom->subjects->where('startime', '13:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi13)) {
                    $mercredi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi13 = $classroom->subjects->where('startime', '13:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi13)) {
                    $jeudi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi13 = $classroom->subjects->where('startime', '13:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi13)) {
                    $vendredi13 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi13 = $classroom->subjects->where('startime', '13:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi13)) {
                    $samedi13 = 'X';
                }
            }
        } //endfor


        #14

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi14 = $classroom->subjects->where('startime', '14:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi14)) {
                    $lundi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi14 = $classroom->subjects->where('startime', '14:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi14)) {
                    $mardi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi14 = $classroom->subjects->where('startime', '14:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi14)) {
                    $mercredi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi14 = $classroom->subjects->where('startime', '14:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi14)) {
                    $jeudi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi14 = $classroom->subjects->where('startime', '14:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi14)) {
                    $vendredi14 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi14 = $classroom->subjects->where('startime', '14:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi14)) {
                    $samedi14 = 'X';
                }
            }
        } //endfor



        #15

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi15 = $classroom->subjects->where('startime', '15:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi15)) {
                    $lundi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi15 = $classroom->subjects->where('startime', '15:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi15)) {
                    $mardi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi15 = $classroom->subjects->where('startime', '15:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi15)) {
                    $mercredi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi15 = $classroom->subjects->where('startime', '15:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi15)) {
                    $jeudi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi15 = $classroom->subjects->where('startime', '15:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi15)) {
                    $vendredi15 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi15 = $classroom->subjects->where('startime', '15:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi15)) {
                    $samedi15 = 'X';
                }
            }
        } //endfor



        #16

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi16 = $classroom->subjects->where('startime', '16:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi16)) {
                    $lundi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi16 = $classroom->subjects->where('startime', '16:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi16)) {
                    $mardi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi16 = $classroom->subjects->where('startime', '16:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi16)) {
                    $mercredi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi16 = $classroom->subjects->where('startime', '16:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi16)) {
                    $jeudi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi16 = $classroom->subjects->where('startime', '16:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi16)) {
                    $vendredi16 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi16 = $classroom->subjects->where('startime', '16:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi16)) {
                    $samedi16 = 'X';
                }
            }
        } //endfor

        #17

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi17 = $classroom->subjects->where('startime', '17:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi17)) {
                    $lundi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi17 = $classroom->subjects->where('startime', '17:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi17)) {
                    $mardi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi17 = $classroom->subjects->where('startime', '17:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi17)) {
                    $mercredi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi17 = $classroom->subjects->where('startime', '17:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi17)) {
                    $jeudi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi17 = $classroom->subjects->where('startime', '17:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi17)) {
                    $vendredi17 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi17 = $classroom->subjects->where('startime', '17:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi17)) {
                    $samedi17 = 'X';
                }
            }
        } //endfor



        #18

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi18 = $classroom->subjects->where('startime', '18:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi18)) {
                    $lundi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi18 = $classroom->subjects->where('startime', '18:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi18)) {
                    $mardi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi18 = $classroom->subjects->where('startime', '18:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi18)) {
                    $mercredi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi18 = $classroom->subjects->where('startime', '18:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi18)) {
                    $jeudi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi18 = $classroom->subjects->where('startime', '18:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi18)) {
                    $vendredi18 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi18 = $classroom->subjects->where('startime', '18:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi18)) {
                    $samedi18 = 'X';
                }
            }
        } //endfor



        #19

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi19 = $classroom->subjects->where('startime', '19:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi19)) {
                    $lundi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi19 = $classroom->subjects->where('startime', '19:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi19)) {
                    $mardi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi19 = $classroom->subjects->where('startime', '19:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi19)) {
                    $mercredi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi19 = $classroom->subjects->where('startime', '19:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi19)) {
                    $jeudi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi19 = $classroom->subjects->where('startime', '19:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi19)) {
                    $vendredi19 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi19 = $classroom->subjects->where('startime', '19:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi19)) {
                    $samedi19 = 'X';
                }
            }
        } //endfor


        #20

        for ($i = 0; $i <= 5; $i++) {

            if ($i == 0) {
                $lundi20 = $classroom->subjects->where('startime', '20:00:00')->where('day', 'LUNDI')->first();
                if (empty($lundi20)) {
                    $lundi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 1) {
                $mardi20 = $classroom->subjects->where('startime', '20:00:00')->where('day', 'MARDI')->first();
                if (empty($mardi20)) {
                    $mardi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 2) {
                $mercredi20 = $classroom->subjects->where('startime', '20:00:00')->where('day', 'MERCREDI')->first();
                if (empty($mercredi20)) {
                    $mercredi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 3) {
                $jeudi20 = $classroom->subjects->where('startime', '20:00:00')->where('day', 'JEUDI')->first();
                if (empty($jeudi20)) {
                    $jeudi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 4) {
                $vendredi20 = $classroom->subjects->where('startime', '20:00:00')->where('day', 'VENDREDI')->first();
                if (empty($vendredi20)) {
                    $vendredi20 = 'X';
                }
            }
        } //endfor


        for ($i = 0; $i <= 5; $i++) {

            if ($i == 5) {
                $samedi20 = $classroom->subjects->where('startime', '20:00:00')->where('day', 'SAMEDI')->first();
                if (empty($samedi20)) {
                    $samedi20 = 'X';
                }
            }
        } //endfor

        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('admin.getTimetable', compact('academicyearP', 'classroom', 'timetable', 'lundi8', 'mardi8', 'mercredi8', 'jeudi8', 'vendredi8', 'samedi8', 'lundi9', 'mardi9', 'mercredi9', 'jeudi9', 'vendredi9', 'samedi9', 'lundi10', 'mardi10', 'mercredi10', 'jeudi10', 'vendredi10', 'samedi10', 'lundi11', 'mardi11', 'mercredi11', 'jeudi11', 'vendredi11', 'samedi11', 'lundi12', 'mardi12', 'mercredi12', 'jeudi12', 'vendredi12', 'samedi12', 'lundi13', 'mardi13', 'mercredi13', 'jeudi13', 'vendredi13', 'samedi13', 'lundi14', 'mardi14', 'mercredi14', 'jeudi14', 'vendredi14', 'samedi14', 'lundi15', 'mardi15', 'mercredi15', 'jeudi15', 'vendredi15', 'samedi15', 'lundi16', 'mardi16', 'mercredi16', 'jeudi16', 'vendredi16', 'samedi16', 'lundi17', 'mardi17', 'mercredi17', 'jeudi17', 'vendredi17', 'samedi17', 'lundi18', 'mardi18', 'mercredi18', 'jeudi18', 'vendredi18', 'samedi18', 'lundi19', 'mardi19', 'mercredi19', 'jeudi19', 'vendredi19', 'samedi19', 'lundi20', 'mardi20', 'mercredi20', 'jeudi20', 'vendredi20', 'samedi20'));
    }

    /*############ END TIMETABLE ###########################################################################*/
    #--------------------------------------------------------------------------------------------------------------
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
     * @param  \App\Manager  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $admin)
    {
        //
    }
}
