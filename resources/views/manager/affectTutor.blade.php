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
            <li class="breadcrumb-item active" aria-current="page">Affecter un etudiant à un parent</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>

<div class="d-flex justify-content-center">
  <div class="col-sm-4">
      <div class="form-group">
        <label><b>Selectionner la classe de l'étudiant</b></label>
        <select class="form-control" name="classroom" onchange="showStudent3(this.value)">
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
<div id="demo3"></div>

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



</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>


function showStudent3(str) {
    if (str == "") {
        document.getElementById("demo3").innerHTML = "";
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
                document.getElementById("demo3").innerHTML = this.responseText;
            }
        };
      //  xmlhttp.open("GET","getuser?q="+str+"&country="+country,true);
        xmlhttp.open("GET","/manager/getTutor3?q="+str,true);
        xmlhttp.send();
    }
}

</script>

@endsection
