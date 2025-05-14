@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $school="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Voir notes</li>
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
      <a href="#room" class="nav-link active" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR CLASSE
      </a>
    </li>
  </ul>
  <form id="formOrder" class="tab-content">
    <div id="room" class="tab-pane show active">
      <div class="mb-3">
        <a href="#room-collapse" data-toggle="collapse">
          <i class="icon-user"></i> CLASSE
        </a>
      </div>
      <div id="room-collapse" class="collapse show" data-parent="#formOrder">
        <div class="row">
          <div class="col-md-12">

          <div class="col-12 col-lg-6">
            <div class="row">
              <div class="col-12 col-md-6 ">
                <div class="form-group">
                  <label>Selectionner la classe de la matière</label>
                  <select class="form-control" name="classroom" onchange="showClassroom7(this.value)">
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
        <div id="demo7"></div>
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

  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>



/*******************************************/

function showClassroom7(str) {
    if (str == "") {
        document.getElementById("demo7").innerHTML = "";
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
                document.getElementById("demo7").innerHTML = this.responseText;
            }
        };
      //  xmlhttp.open("GET","getuser?q="+str+"&country="+country,true);
        xmlhttp.open("GET","/kuro/admin/getClassroom7?q="+str,true);
        xmlhttp.send();
    }
}

/*******************************************/  


</script>

@endsection
