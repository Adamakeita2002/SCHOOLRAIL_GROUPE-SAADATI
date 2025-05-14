@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $parent="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Rechercher un tuteur</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>

<div class="col-sm-12">

<div class="nav-tabs-responsive">
  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a href="#identifiant" class="nav-link active" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR EMAIL
      </a>
    </li>
    <li class="nav-item">
      <a href="#name" class="nav-link" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR NOM ET PRENOM
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
                <label for =""> Entrer l'email du tuteur</label>
                  <input required="" class="form-control" type="email" id="tutor1" placeholder="Identifiant"  >
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showtutor1();" value="RECHERCHER"> 
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



    <div id="name" class="tab-pane">
      <div class="mb-3">
        <a href="#name-collapse" data-toggle="collapse">
          <i class="icon-credit-card"></i> NOM ET PRENOM
        </a>
      </div>

      <div id="name-collapse" class="collapse" data-parent="#formOrder">

        <div class="row"> <!-- START ROW -->

          <div class="col-12 col-lg-6">
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                <label for =""> Entrer le nom du tuteur</label>
                  <input required="" class="form-control" type="text" id="tutor3" placeholder="Nom "  >
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                <label for =""> Entrer le prénom du tuteur</label>
                  <input required="" class="form-control" type="text" id="tutor4" placeholder="Prénom"  >
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showtutor3();" value="RECHERCHER"> 
                </div>
              </div>
            </div>
          </div>

        </div> <!-- END ROW -->
        <br>
        <hr>

        <span id="demo3"></span>
 

      </div>
    </div>
  </form>
</div>


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

              @if (session('status3'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status3') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status4'))
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> {{ session('status4') }}<br></b>
                      </div>
                  </div>
              @endif

  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>

function showtutor1() {
  
  var s1 = document.getElementById('tutor1');
  var tutor1 = s1.value ;
 /* 
    if(s1.value == "") {
      alert("Veuillez entrer un mot");
      s1.value.focus();
      return false;
    }
 */
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo1").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getTutor1?q="+tutor1,true);
  xhttp.send();
}

/*******************************************/  

function showtutor3() {
  
  var s3 = document.getElementById('tutor3');
  var tutor3 = s3.value ;

  var s4 = document.getElementById('tutor4');
  var tutor4 = s4.value ;
  

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getTutor2?q="+tutor3+"&qq="+tutor4,true);
  xhttp.send();
}



</script>

@endsection
