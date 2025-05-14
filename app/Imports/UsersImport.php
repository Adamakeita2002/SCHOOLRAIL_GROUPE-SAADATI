<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new Student([

            'name'=> $row['NOM'],
            'surname'=>$row['PRENOM'],
            'tel'=> $row['TEL'],
            'email'=> $row['EMAIL'],
            'address'=> $row['ADRESSE'],
            'nationality'=> $row['NATIONALITE'],
            'gender'=> $row['GENRE'],
            'dateofbirth'=> $row['DATE_DE_NAISSANCE'],
            'classroom_id'=> $row['CLASSE'],
        ]);
    }
}
