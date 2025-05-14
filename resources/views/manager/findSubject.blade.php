@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $subject="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Rechercher une matière</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>
 <!-- Page Heading 
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>-->

<div class="col-sm-12">

<div class="nav-tabs-responsive">
  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a href="#identifiant" class="nav-link active" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR NOM
      </a>
    </li>
    <li class="nav-item">
      <a href="#room" class="nav-link" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR CLASSE
      </a>
    </li>
    <li class="nav-item">
      <a href="#name" class="nav-link" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR PROFESSEUR
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
                <label for =""> Entrer le nom de la matière</label>
                  <input required="" class="form-control" type="text" id="subject1" placeholder="Nom de la matière"  >
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showSubject1();" value="RECHERCHER"> 
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

    <div id="room" class="tab-pane">
      <div class="mb-3">
        <a href="#room-collapse" data-toggle="collapse">
          <i class="icon-user"></i> CLASSE
        </a>
      </div>
      <div id="room-collapse" class="collapse" data-parent="#formOrder">
        <div class="row">
          <div class="col-md-12">

          <div class="col-12 col-lg-6">
            <div class="row">
              <div class="col-12 col-md-6 ">
                <div class="form-group">
                  <label>Selectionner la classe de la matière</label>
                  <select class="form-control" name="classroom" onchange="showSubject2(this.value)">
                    <option value="">Selectionner</option> 
                    @foreach ($classrooms as $classroom)
                    <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            </div>
          </div>


          </div>
        </div>
        <br>
        <hr>
        <div id="demo2"></div>
      </div>
    </div>

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
                  <label><b>Déterminer le professeur</b></label>
                  <input type="text" name="teacher_fullname" id="subject3" class="form-control" placeholder="Déterminer le professeur" list="teacher_fullname"/>
                  <datalist  id="teacher_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    @foreach($teachers as $teacher )
                    <option value="{{$teacher->email}}">{{$teacher->fullname}} ({{$teacher->email}})</option>
                    @endforeach
                  </select>
                   </label>
                  </datalist>
                </div>
              </div>


              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showSubject3();" value="RECHERCHER"> 
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

  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>

function showSubject1() {
  
  var s1 = document.getElementById('subject1');
  var subject1 = s1.value ;
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
  xhttp.open("GET","/manager/getSubject1?q="+subject1,true);
  xhttp.send();
}

/*******************************************/

function showSubject2(str) {
    if (str == "") {
        document.getElementById("demo2").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo2").innerHTML = this.responseText;
            }
        };
      //  xmlhttp.open("GET","getuser?q="+str+"&country="+country,true);
        xmlhttp.open("GET","/manager/getSubject2?q="+str,true);
        xmlhttp.send();
    }
}

/*******************************************/  

function showSubject3() {
  
  var s3 = document.getElementById('subject3');
  var subject3 = s3.value ;  

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getSubject3?q="+subject3,true);
  xhttp.send();
}



</script>

@endsection
