@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $program="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Créer un programme</li>
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
  <h4 class="my-4 text-center">LISTE DES PROGRAMMES DISPONIBLES</h4>

        <div class="row">
          @foreach ($programs as $program)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$program->name}}
                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px">
                  <img src="/img/large/xfiliere.jpg" width="60" height="60" alt="...">
                </p>
                <h4 class="card-title text-center">
                {{$program->levelVar}} <br> {{$program->fullname}}
                </h4>

                    <h5 class="card-title text-center" style="color: #c22e6d">
                      CLASSES:
                    </h5>

                    <h6>
                    @if($program->classrooms->count()==0)
                    <span class="text-danger text-center"> <b>Aucune classe est affectée à ce programme</b>  </span>
                    @endif
                    @foreach ($program->classrooms as $classroom)
                      @if($classroom->academicyear_id==$academicyearP->id)
                      <span> <a href=""> {{$classroom->name}} </a> </span> ,
                      @endif
                    @endforeach
                    </h6>
            <hr>
            <div class="row" >
              <div class="col-sm-6">
              <span><!-- START Edit PROGRAM -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM{{$program->id}}" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit PROGRAM -->
                <div class="modal fade" id="MM{{$program->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/manager/modifyProgram') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier ce programme
                            <b>{{$program->fullname}}</b>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>

                        <div class="form-group">
                          <label><b>Entrer le nom du programme</b></label>
                          <input type="text" name="fullname" placeholder="{{$program->fullname}}" class="form-control" >
                         <small class="text-danger">Ex: Finance Comptabilité</small>
                        </div>

                        <div class="form-group">
                          <label><b>Entrer le diminutif du programme</b></label>
                          <input type="text" name="name" required placeholder="{{$program->name}}" class="form-control" >
                          <small class="text-danger">Ex: Finance Comptabilité = FC </small>
                        </div>

                        <div class="form-group">
                          <label><b>Entrer le niveau</b></label>
                          <select class="form-control" name="levelInt" >
                            <option value="{{$program->levelInt}}">{{$program->levelVar}}</option>
                            <option value="1">1ère Année</option>
                            <option value="2">2ème Année</option>
                            <option value="3">Licence Professionnelle</option>
                            <option value="4">Master I</option>
                            <option value="5">Master II</option>
                          </select>
                        </div>
                        <input type="hidden" class="form-control" name="id" value="{{$program->id}}" hidden="">
                      <button type="submit" class="btn btn-warning text-white">
                        Valider la modification
                      </button>
                      </div>
                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>
                  </div>
                </div>
                </form>
              </div>
              </span><!-- END Edit PROGRAM -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete PROGRAM -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD{{$program->id}}" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete PROGRAM -->
                <div class="modal fade" id="MD{{$program->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/manager/deleteProgram') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'un programme d'étude</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CE PROGRAMME?</p>
                        <h4 class="card-title text-center">
                        {{$program->levelVar}} <br> {{$program->fullname}}
                        </h4>

                        <input type="hidden" class="form-control" name="id" value="{{$program->id}}" hidden="">
                      <button type="submit" class="btn btn-danger">
                        Valider la suppression
                      </button>
                      </div>
                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>
                  </div>
                </div>
                </form>
              </div>
              </span><!-- END Edit PROGRAM -->
            </div>

          </div>

              </div>
            </div>
          </div>
          @endforeach
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        @if($programs->count() <= 0 )
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun programme crée </button>
        </p>
        @endif


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>



@endsection
