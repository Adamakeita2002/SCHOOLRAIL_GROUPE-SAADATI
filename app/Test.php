<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  protected $fillable = [
    'testNum',
    'type',
    'state',
    'participant',
    'subject_id',
    'academicyear_id',
    'teacher_id',
    'classroom_id',
    'semester_id',

  ];

  public function students()
  {
    return $this->belongsToMany(Student::class);
  }

  public function subject()
  {
    return $this->belongsTo(Subject::class);
  }

  public function teacher()
  {
    return $this->belongsTo(Teacher::class);
  }

  public function academicyear()
  {
    return $this->belongsTo(Academicyear::class);
  }

  public function marks()
  {
    return $this->hasMany(Mark::class);
  }
}
