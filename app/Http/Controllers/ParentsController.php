<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use PDF;



class ParentsController extends Controller

{

     public function index ( )

    {

        return view('parent.index') ;
    }


    public function account ( )

    {

        return view('parent.account') ;
    }

        public function profile ( )

    {

        return view('parent.profile') ;
    }

    public function editProfile ( )

    {

        return view('parent.editProfile') ;
    }

        public function child ( )

    {

        return view('parent.child') ;
    }


    public function test ( )

    {

        return view('parent.test') ;
    }


    public function createTest ( )

    {

        return view('parent.createTest') ;
    }

    public function schoolNews ( )

    {

        return view('parent.schoolNews') ;
    }

    public function schoolBde ( )

    {

        return view('parent.schoolBde') ;
    }




    public function adTeam ( )

    {

        return view('parent.adTeam') ;
    }

    public function standard ( )

    {

        return view('parent.standard') ;
    }

    public function materiel ( )

    {

        return view('parent.materiel') ;
    }

        public function calendar ( )

    {

        return view('parent.calendar') ;
    }



    public function forum ( )

    {

        return view('parent.forum') ;
    }


    public function specForum ( )

    {

        return view('parent.specForum') ;
    }


    public function setForum ( )

    {

        return view('parent.setForum') ;
    }

}


