
<head>


<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 1px;
  font-size: 10px;

}

.page-break {
    page-break-after: always;
}

/*
th, td {
  padding: 15px;
}
*/



/* STYLE CSS */
/* Calendar CSS */
$off_white:#fafafa;
$light_grey:#A39D9E;
*{
  box-sizing:border-box;
}

/*
body{
  background-color: $off_white;
}
*/


.container{
  margin:100px auto;
  width:809px;
}

/* END CALENDAR CSS/ */


/* CARDS CAROUSEL CSS */

@media screen and (min-width: 768px) {
  .carousel-inner .active,
  .carousel-inner .active+.carousel-item {
    display: block;
  }
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item {
    -webkit-transition: none;
    transition: none;
  }
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    position: relative;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  .carousel-inner .active.carousel-item+.carousel-item+.carousel-item+.carousel-item {
    position: absolute;
    top: 0;
    right: -50%;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* left or forward direction */
  .active.carousel-item-left+.carousel-item-next.carousel-item-left,
  .carousel-item-next.carousel-item-left+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }
  /* farthest right hidden item must be abso position for animations */
  .carousel-inner .carousel-item-prev.carousel-item-right {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* right or prev direction */
  .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
  .carousel-item-prev.carousel-item-right+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
    display: block;
    visibility: visible;
  }
}

/* Desktop and up */

@media screen and (min-width: 992px) {
  .carousel-inner .active,
  .carousel-inner .active+.carousel-item,
  .carousel-inner .active+.carousel-item+.carousel-item {
    display: block;
  }
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item,
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item {
    -webkit-transition: none;
    transition: none;
  }
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    position: relative;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  .carousel-inner .active.carousel-item+.carousel-item+.carousel-item+.carousel-item {
    position: absolute;
    top: 0;
    right: -33.3333%;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* left or forward direction */
  .active.carousel-item-left+.carousel-item-next.carousel-item-left,
  .carousel-item-next.carousel-item-left+.carousel-item,
  .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item,
  .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }
  /* farthest right hidden item must be abso position for animations */
  .carousel-inner .carousel-item-prev.carousel-item-right {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* right or prev direction */
  .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
  .carousel-item-prev.carousel-item-right+.carousel-item,
  .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item,
  .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
    display: block;
    visibility: visible;
  }
}
/*END CARDS CAROUSEL CSS */

/* Style the active class (and buttons on mouse-over) */

.btn-circle {
    width: 25px;
    height: 25px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}

.btn-purple {
    color: #fff;
    background-color: #790fb1f2;
    border-color: #2e8cc2;
}

.btn-purple:hover {
    color: #fff;
    background-color: #570a80;
    border-color: #246e99;
}

.btn-vert {
    color: #fff;
    background-color: #26bc2c;
    border-color: #048f0a;
}

.btn-danger {
    color: #fff;
    background-color: red;
    border-color: #048f0a;
}

.text-green{
    color: #26bc2c;
}

.text-purple{
    color: #790fb1f2;
}

.text-bordo{
    color: #c22e6d;
}

.btn-vert:hover {
    color: #fff;
    background-color: #048f0a;
    border-color: #26bc2c;
}



/* Colors for teamator logins */


.text-danger{
  color: red;
}

.text-success{
  color: green;
}

/* END STYLE CSS /*


</style>

</head>

@foreach ($academicyearP->semesters as $semesterP)

<div>
  <span><img src="https://schoolrail.hetec-mali.com/assets/img/logo-hetec.jpg" style="width:20%;"></span> <br>
  <span style="font-size: 12px"> RELEVE DE NOTES <br> {{$semesterP->academicyear->labelYear}} <br> {{$semesterP->label}}</span>
</div>


<h4 style="text-align: center"> <i>Nom et Prenom(s): </i>  {{$student->name}} {{$student->surname}} </h4>
<h4 style="text-align: center"> {{$student->classroom->program->fullname}} - ({{$student->classroom->name}}) </h4>


<div>
  <table style="width:100%; padding-left: 20px; padding-right: 20px;" >
    <tr>
      <th>ENSEIGNEMENT</th>
      <th>MC</th>
      <th>ME</th>
      <th>MG / UE</th>
      <th>APPR.</th>
    </tr>

@foreach ($semesterP->subjects->where('classroom_id',$student->classroom->id) as $subject)

    <tr>
      <td>{{$subject->name}} </td>

      <td style="text-align: center">
        <strong>
        <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
        <span class="@if($subjectavg) @if($subjectavg->valueClass >= 10) badge btn-vert text-white @else badge btn-danger text-white @endif @else badge btn-vert text-white  @endif  " style="font-size: 15px; width:40px;" >@if($subjectavg) {{$subjectavg->valueClass}} @else ... @endif </span>
       </strong>
      </td>

      <td style="text-align: center">
          <span class=" @if($subjectavg) @if($subjectavg->valuExam >= 10) badge btn-vert @else badge btn-danger @endif @endif"
                style="font-size: 15px;width:40px;" >
            @if($subjectavg) {{$subjectavg->valuExam}} @else ... @endif
          </span>
      </td>

      <td style="text-align: center">
        <strong>
        <span class="@if($subjectavg) @if($subjectavg->valueGrle >= 10) badge btn-vert text-white @else badge btn-danger text-white @endif @else badge btn-vert text-white  @endif  " style="font-size: 15px; width:40px;" >@if($subjectavg) {{$subjectavg->valueGrle}} @else ... @endif </span>
       </strong>
      </td>

      <td>@if($subjectavg)
            @if($subjectavg->valueGrle >= 10)
            UE VALIDE
            @else
            UE NON VALIDE
            @endif
          @else
          ...
          @endif
      </td>

    </tr>
@endforeach
  </table>
</div>

  <div class="row">
    <div class="col-sm-6">
      <?php $semesterAvg=$student->semesterAvgs->where('semester_id',$semesterP->id)->first(); ?>

        <h6>
          <b>MOYENNE SEMESTRIELLE : </b>
         <span style="font-size: 20px; width:65px;" >@if($semesterAvg) {{$semesterAvg->value}} @else ... @endif </span>
            <b style="padding-left: 50px;">RANG : </b>
          <span style="font-size: 20px; width:65px;" >@if($semesterAvg) {{$semesterAvg->rank}} @else ... @endif </span>
         </h6>
    </div>
    <div class="col-sm-6 ">
      <?php $UEV=$student->subjectavgs->where('valueGrle','>=',10)->where('semester_id',$semesterP->id)->count(); ?>
      <?php $UENV=$student->subjectavgs->where('valueGrle','<',10)->where('semester_id',$semesterP->id)->count(); ?>
      <h6 style="float: right;" >
      <span class="text-success"> UE VALIDEE: {{$UEV}} </span>
       <br>
      <span class="text-danger"> UE NON VALIDEE: {{$UENV}} </span>
      </h6>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <?php $UEVS=$student->subjectavgs->where('valueGrle','>=',10)->where('semester_id',$semesterP->id)->all(); ?>
      <?php $UENVS=$student->subjectavgs->where('valueGrle','<',10)->where('semester_id',$semesterP->id)->all(); ?>
      <?php $semesterAvg=$student->semesterAvgs->where('semester_id',$semesterP->id)->first(); ?>

        <h6 ><b>AVIS DU CONSEIL DE CLASSE ET OBSERVATIONS EVENTUELLES:</b>  <br>
           @if($semesterAvg)
            @if($semesterAvg->value < 10)
            <span class="text-danger"><b>INSUFISSANT</b></span>
            @elseif ($semesterAvg->value <= 12 AND $semesterAvg->value >=10)
            <b>PASSABLE</b>
            @elseif ($semesterAvg->value > 12)
            <b>ADMISSIBLE</b>
            @endif
           @endif
            <br>
        </h6>
        <h6 >
          @if ($UENV !== 0)
          * SOUS RESERVE DE VALIDATION DES UE SUIVANTES*:
          @foreach ($UENVS as $UENV)
          {{$UENV->subject->name}} <br>
          @endforeach
          @endif
         </h6>
         <br>
    </div>
    <div class="col-sm-6 ">
      <h6 style="float: right;" >
       Le Directeur Délégué et Pédagogique
       <br><br><br><br><br><br><br><br>
       M.Souleymane SANGARE
      </h6>
    </div>
  </div>

<br><br><br><br><br><br><br><br><br><br>
  <small style="font-size: 10px"><i>NB : Veuillez conserver l'original de ce relevé de notes (bulletin). Aucun duplicata ne sera délivré ***</i> </small>
<div class="page-break"></div>
@endforeach













