@extends ('layouts.master')


@section ('content')


<?php use Carbon\Carbon;?>
  <?php $parametre="activve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarM')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarM')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Arrêt des notes</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>
 <!-- Page Heading
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>-->

<div class="col-sm-12">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">SEMESTRE EN COURS
    </a>
    @if ($semesterP->arretDesNotes == 1)
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
    VUE GLOBALE
    </a>
    @endif
    @if ($semesterP->arretDesNotes == 1)
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">NOTES ARRETEES PAR CLASSE
    </a>
    @endif
  </div>
</nav>

<br>

              @if (session('status1'))
              @if ($semesterP->arretDesNotes == 1)
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
                  <br>
              @endif
              @endif
              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
                  <br>
              @endif

<div class="tab-content" id="nav-tabContent">
  <!-- START SEMESTRE EN COURS -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     @include ('layouts.errors')
      <form  action="/manager/STOPNOTE" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
          <div class="row">

            @if ($semesterP->arretDesNotes == 0)
               <div class="col-sm-8 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b>L'ARRET DES NOTES NE PEUT ETRE ACTIVE UNIQUEMENT QUE PAR L'ADMINISTRATEUR</b><br>Une fois cela fait, vous pourrez acceder aux paramètres de l'arrêt des notes</div>
                 </div>
              </div>

            @else

              <div class="col-sm-3 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b>{{$academicyearP->labelYear}}</b></div>
                 </div>
              </div>

              <div class="col-sm-3 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b>{{$semesterP->label}}</b></div>
                </div>
              </div>

              <div class="col-sm-3 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b>ARRET DES NOTES EN COURS ...</b></div>
                </div>
              </div>


            @endif


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Voulez-vous confirmer l'arrêt des notes?</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>En confirmant l'arrêt des notes, les professeurs pourrons procéder au calcul des moyennes du semestre en cours</p>
                    <p class="text-center"><button class="btn btn-bordo" type="submit" >CONFIRMER</button></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

      </form>
  </div>
<!-- END SEMESTRE EN COURS -->


<!-- START SITUATION -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    @foreach ($classrooms->sortByDesc('semesterAvg') as $classroom)
      @if ($classroom->semesterAvg == 1) <!-- START SEMESTERAVG -->
      <div class="card ">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-body bg-success" >
            <img src="/img/large/xclassroom.jpg" width="100" height="100" class="rounded-circle mx-auto d-block">
              <h4 class="card-title text-center " style="color:white;">
               <b>{{$classroom->name}}</b>
              </h4>
              <hr>
              <h4 class="text-center text-white"><b>LES MOYENNES DE CETTE CLASSE ONT ETE CALCULEES</b><br><b>{{$semesterP->label}}</b></h4>

            </div>
          </div>
        </div>
      </div>
      <hr>

      @else <!-- ELSE SEMESTERAVG -->

            <div class="card ">
        <div class="row">

          <div class="col-sm-2">
            <div class="card-body" style="background-color: #c22e6d">
            <img src="/img/large/xclassroom.jpg" width="100" height="100" class="rounded-circle mx-auto d-block">
              <h4 class="card-title text-center " style="color:white;">
               {{$classroom->name}}
              </h4>
              <hr>
            </div>
          </div>
           <div class="col-sm-8">
            <div class="card-body">
              <h6 class="card-title text-danger" >
                <?php $subjects=$semesterP->subjects()->where('classroom_id',$classroom->id)->get(); ?>
              @foreach ($subjects as $subject)
               @if($subject->arretDesNotes == 1)
               <span class="text-success">({{$subject->name}} - <b>{{$subject->teacher->name}} {{$subject->teacher->surname}}</b>) ,</span>
               @else
               ({{$subject->name}} - <b>{{$subject->teacher->name}} {{$subject->teacher->surname}}</b>) ,
               @endif
              @endforeach
              </h6>
              <hr>
                <?php
                $arreted=$semesterP->subjects()->where('classroom_id',$classroom->id)->where('arretDesNotes',1)->count();
                $NotArreted=$semesterP->subjects()->where('classroom_id',$classroom->id)->where('arretDesNotes',0)->count();
                $Csubjects=$semesterP->subjects()->where('classroom_id',$classroom->id)->count() ;
                ?>
              <span class="badge badge-dark mb-1" style="font-size: 15px">{{$semesterP->label}}</span><br>
              @if ($arreted == $Csubjects)

                 <a href="#" class="btn btn-bordo" data-toggle="modal" data-target="#exampleModal{{$classroom->id}}">
                   <b>CALCULER LES MOYENNES</b>
                 </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Voulez-vous confirmer le calcul des moyennes</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-center">En confirmant, les moyennes de <br><b>({{$classroom->name}})</b><br> au compte du {{$semesterP->label}} seront calculées et marquées définitives</p>
                         <form  action="/manager/buildSemesterMoy" method="post" enctype="multipart/form-data" id="theform">
                           <input type="hidden" value="{{ csrf_token() }}" name="_token">
                           <input type="hidden" name="classID" value="{{$classroom->id}}">
                           <p class="text-center" ><button class="btn btn-bordo"><b>CONFIRMER</b></button></p>
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script type="text/javascript">
                  $(function()
                {
                  $('#theform8').submit(function(){
                    $("button[type='submit']", this)
                     // .val('Please Wait...')
                      .attr('disabled', 'disabled')
                      .html('Veuillez patienter...');
                    return true;
                  });
                });
                </script>




              @endif
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card-body">
              <h4 class="card-title text-center " >
                @if ($arreted == $Csubjects)
               <i class="fa fa-check-circle text-success" style="font-size: 42px" aria-hidden="true"></i><br>
               <span class="text-success text-center"> Toutes les notes ont été arrêtées </span><br>
                @else
                <i class="fa fa-times-circle text-danger" style="font-size: 42px" aria-hidden="true"></i><br>
                <span class="text-danger text-center"> {{$arreted}} / {{$Csubjects}} </span> <br>
                <span class="text-danger text-center"> Notes arrêtées</span>
                @endif
              </h4>

            </div>
          </div>

        </div>
      </div>
      <hr>


      @endif <!-- END SEMESTERAVG -->


    @endforeach
    <br>
  </div>
<!--END SITUATION -->

<!--PAR CLASSE -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

        <div class="row"> <!-- START ROW -->

          <div class="col-12 col-lg-6">
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label><b>Déterminer la classe</b></label>
                  <input type="text" name="classroom_fullname" id="classroom3" class="form-control" placeholder="Déterminer la classe"
                  list="classroom_fullname"/>
                  <datalist  id="classroom_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    @foreach($classrooms as $classroom )
                    <option value="{{$classroom->name}}">{{$classroom->name}}</option>
                    @endforeach
                  </select>
                   </label>
                  </datalist>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showClassroom3();" value="RECHERCHER">
                </div>
              </div>
            </div>
          </div>

        </div> <!-- END ROW -->
        <br>
        <hr>

        <span id="demo3"></span>

  </div>
<!--END PAR CLASSE -->
</div>



  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->

<script>

$(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});

/*******************************************/

function showClassroom3() {

  var s3 = document.getElementById('classroom3');
  var classroom3 = s3.value ;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getStopMark?q="+classroom3,true);
  xhttp.send();
}

/*******************************************/

</script>


@endsection
