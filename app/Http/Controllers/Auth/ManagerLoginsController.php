<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Lang;

use App\Manager;
use App\Academicyear;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

class ManagerLoginsController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:manager', ['except' => ['logout']]);
    }


    public function showLoginForm()

    {
        $academicyearP=Academicyear::where('state','process')->first();
//[ 'student' => $student , 'academicyearP'=> $academicyearP ]

         return redirect('/teamator/login?opt=manager')->with('academicyearP',$academicyearP);

       // return view('auth.manager-login');
    }

        public function login(Request $request)
    {


        // Validation

        $this->validate($request, [
            'email'=> 'required',
            'password'=> 'required|min:8'
        ]);

        // Attempt to log
       if (Auth::guard('manager')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)) {
            // If success
            return redirect()->intended(route('manager.dashboard'));
            } 

         if ( ! Manager::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                     $request->email => Lang::get('auth.email'),
                ]);
            }

        if ( ! Manager::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        } 

        
    }

    public function logout()
    
        {
        Auth::guard('manager')->logout();
        $academicyearP=Academicyear::where('state','process')->first();

        return redirect('teamator/login?opt=manager')->with('academicyearP' , $academicyearP);
        }



    public function index()
    {
        
    }

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
