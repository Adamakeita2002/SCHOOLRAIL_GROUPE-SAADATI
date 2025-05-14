<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Lang;
use App\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

class AdminLoginsController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }


    public function showLoginForm()

    {
        return view('auth.admin-login');
    }

        public function login(Request $request)
    {
        // Validation

        $this->validate($request, [
            'login'=> 'required',  
            'password'=> 'required|min:8'
        ]);

        // Attempt to log
       if (Auth::guard('admin')->attempt(['login'=> $request->login, 'password' => $request->password], $request->remember)) {
            // If success
            return redirect()->intended(route('admin.dashboard'));
            } 

         if ( ! Admin::where('login', $request->login)->first() ) {
            return redirect()->back()
                ->withInput($request->only('login', 'remember'))
                ->withErrors([
                     $request->login => Lang::get('auth.email'),
                ]);
            }

        if ( ! Admin::where('login', $request->login)->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only('login', 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        } 

        
    }

    public function logout()
    
        {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
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
