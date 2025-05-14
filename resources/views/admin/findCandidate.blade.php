@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $student="activvve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Confirmer un candidat</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif
             @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif


<hr>


<div class="col-sm-12">

@if($academicyearP->election=='no')

 <!-- Page Heading -->
  <h4 class="my-4 text-center">DEMARRER LA PROCEDURE DES ELECTIONS</h4>

    <!-- START Delete student -->
    <p class="text-center"><button class="btn btn-bordo" data-toggle="modal" data-target="#MDE1" ><b>DEMARRER</b></button></p>

      <!-- Modal Delete student -->
      <div class="modal fade" id="MDE1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/kuro/admin/election/prepare') }}" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Veuillez confirmer </h5>                        
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>Vous êtes sûr de vouloir demarrer la procédure des élections?</p>

            <button type="submit" class="btn btn-bordo">
              VALIDER
            </button>
            </div>
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
            </div>
        </div>
      </div>
      <!--END DELETE FORM-->
      </form>
    </div>

@elseif($academicyearP->election=='prepare')

 <!-- Page Heading -->
  <h4 class="my-4 text-center">DETERMINER LES DIFFERENTS CANDIDATS</h4>

<div class="nav-tabs-responsive">
  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a href="#identifiant" class="nav-link active" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER LE CANDIDAT
      </a>
    </li>
  </ul>
  <form id="formOrder" class="tab-content">
    <div id="identifiant" class="tab-pane show active"><!-- START IDENTIFIANT-->
      <div class="mb-3">
        <a href="#identifiant-collapse" data-toggle="collapse">
          <i class="icon-lock"></i> IDENTIFIANT
        </a>
      </div>

      <div id="identifiant-collapse" class="collapse show" data-parent="#formOrder">

        <div class="row"> <!-- START ROW -->

          <div class="col-12 col-lg-6">
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                <label for =""> Entrer l'identifiant de l'étudiant</label>
                  <input required="" class="form-control" type="text" id="student1" placeholder="Identifiant"  >
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showStudent1();" value="RECHERCHER"> 
                </div>
              </div>
            </div>
          </div>

        </div> <!-- END ROW -->
        <br>
        <hr>

       <span id="demo1"></span>

      </div>

    </div><!-- END IDENTIFIANT-->

  </form>
</div>




@elseif($academicyearP->election=='start')


@endif
  </div><!-- END COL 12 -->
</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>

function showStudent1() {
  
  var s1 = document.getElementById('student1');
  var student1 = s1.value ;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo1").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/kuro/admin/getCtudent1?q="+student1,true);
  xhttp.send();
}

/*******************************************/


</script>

@endsection
