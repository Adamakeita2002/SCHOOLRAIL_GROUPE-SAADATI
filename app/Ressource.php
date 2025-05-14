<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{

  protected $fillable = [
    'title',
    'description',
    'upload',
    'teacher_id',
    'extension',
    'lien',
    'academicyear_id',
  ];


  public function students()
  {
    return $this->belongsToMany(Student::class);
  }


  public function teacher()
  {
    return $this->belongsTo(Teacher::class);
  }

  public function academicyear()
  {
    return $this->belongsTo(Academicyear::class);
  }


  public function classrooms()
  {
    return $this->belongsToMany(Classroom::class);
  }
}
