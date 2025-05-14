<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Lang;

use App\Student;
use App\Academicyear;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

class StudentLoginsController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:student', ['except' => ['logout']]);
    }


    public function showLoginForm()

    {

        $academicyearP = Academicyear::where('state', 'process')->first();

        return view('auth.student-login', compact('academicyearP'));
    }

    public function login(Request $request)
    {
        // Validation

        $this->validate($request, [
            'matricule' => 'required',
            // 'password'=> 'required|min:8'
            'password' => 'required'
        ]);

        // Attempt to log
        if (Auth::guard('student')->attempt(['matricule' => $request->matricule, 'password' => $request->password], $request->remember)) {
            // If success
            return redirect()->intended(route('student.dashboard'));
        }

        if (! Student::where('matricule', $request->matricule)->first()) {
            return redirect()->back()
                ->withInput($request->only('matricule', 'remember'))
                ->withErrors([
                    $request->matricule => Lang::get('auth.matricule'),
                ]);
        }

        if (! Student::where('matricule', $request->matricule)->where('password', bcrypt($request->password))->first()) {
            return redirect('/student/login')
                ->withInput($request->only('matricule', 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        }
    }


    public function logout()

    {
        Auth::guard('student')->logout();
        return redirect('/student/login');
    }



    public function index() {}

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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
