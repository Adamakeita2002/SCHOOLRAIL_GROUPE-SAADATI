@extends ('layouts.master')


@section ('content')

<?php use Carbon\Carbon;?>
  <?php $classroom="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Emploi du temps </li>
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

<hr>
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES CLASSES DISPONIBLES</h4>

        <div class="row">
          @foreach ($classrooms as $classroom)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$classroom->name}}
                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>

            @if($classroom->timetable)
              <!-- START TIMETABLE -->
              <!-- PIECE 1 -->
              <p class="text-center"><a href="#"  data-toggle="modal" data-target="#exampleModal{{$classroom->id}}">
               <span style="font-size:17px;"> <b>Voir Emploi du temps</b> </span>
              </a></p>
              <!-- Modal 1 -->
              <div class="modal fade" id="exampleModal{{$classroom->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content" style="background-color:#fff0;border:rgba(0, 0, 0, 0);">
                   <p class="text-center"><img src="/files/timetable/{{$classroom->timetable}}" width="450px" height="450px" class=" mx-auto d-block" alt="Photo de Profile" ></p>
                  </div>
                </div>
              </div>
              <!-- PIECE 1 -->
              <!-- END SEE TIMETABLE -->
              @else
              <p class="text-center text-danger"><b>Emploi du temps non défini</b></p>
              @endif

                <h4 class="card-title text-center">
                {{$classroom->program->levelVar}} <br> {{$classroom->program->fullname}}
                </h4>
<form  action="/manager/CreateTimetable" class="tab-content" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="{{$academicyearP->id}}" name="academicyear_id">
    <input type="hidden" value="{{$classroom->id}}" name="classroom_id">

    <p class="text-center">
    <input type="file" accept=".jpg, .jpeg, .png, " class="btn btn-secondary" name="upload_file" required>
@if($classroom->timetable)
      <button class="btn btn-warning text-white mt-2"  type="submit">
       <b>Modifier emploi du temps</b>
      </button>
@else
      <button class="btn btn-success mt-2"  type="submit">
        <b>Créer emploi du temps</b>
      </button>
@endif
    </p>


</form>
              </div>
            </div>
          </div>
          @endforeach
        </div><!-- END ROW -->
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
