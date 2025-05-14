@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $calendar="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

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
        <div class="row justify-content-md-center">
          <div class="col-md-4">

            <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xemploi.jpg" alt="Card image" style="width:250px;">

            <div class="form-group">
              <label class="text-center">Selectionner la classe </label>
              <select class="form-control" name="classroom" onchange="showTimetable(this.value)">
                <option value="">Selectionner</option>
                @foreach ($classrooms as $classroom)
                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                @endforeach
              </select>
            </div>

          </div>
        </div>
        <br>
        <hr>
        <div id="demo2"></div>
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

function showTimetable(str) {
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
        xmlhttp.open("GET","/manager/getCalendar?q="+str,true);
        xmlhttp.send();
    }
}

/*******************************************/


</script>

@endsection
