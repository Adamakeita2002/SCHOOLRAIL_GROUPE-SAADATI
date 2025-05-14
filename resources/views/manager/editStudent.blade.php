@extends ('layouts.master')


@section ('content')

<?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Editer un étudiant</li>
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
  <h4 class="my-4 text-center">LISTE DES ETUDIANTS</h4>

        <div class="row">
          @foreach ($students as $student)
          <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
              <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$student->name}} {{$student->surname}}
                </h2>
              </div>

              <div class="card-body">

                <h4 class="card-title text-center">

                  ({{$student->classroom->name}})

                </h4>


                @if(is_null($student->classroom))
                  <p class="text-danger text-center "> <b>Cet étudiant est affecté à aucune classe</b></p>
                @endif

                <hr>
                      <h4 class="card-title mt-2" ><b> Nationalité :  </b>
                        <span>{{$student->nationality}}</span>
                      </h4>
                <hr>
                      <h4 class="card-title mt-2" ><b> Age : </b>
                        <?php  $years = Carbon::parse($student->dateofbirth)->age;?>
                        <span>{{$years}}</span>
                      </h4>
                <hr>
                      <h4 class="card-title mt-2" ><b> Email : </b>
                        <span>{{$student->email}}</span>
                      </h4>
                <hr>
                      <h4 class="card-title mt-2" ><b> Téléphone : </b>
                        <span>{{$student->tel}}</span>
                      </h4>
                <hr>

                      <h4 class="card-title mt-2" ><b> Adresse : </b>
                        <span>{{$student->address}}</span>
                      </h4>




<!-- STARTING -->

            <hr>
            <div class="row" >
              <div class="col-sm-6">
              <span><!-- START Edit student -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM{{$student->id}}" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit student -->
                <div class="modal fade" id="MM{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/manager/modifyStudent') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant ce professeur
                            <b>{{$student->name}} {{$student->surname}}</b>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>

                      <div class="form-group">
                        <label><b>Entrer le nom du professeur</b></label>
                        <input type="text" name="name" placeholder="{{$student->name}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) du professeur</b></label>
                        <input type="text" name="surname" placeholder="{{$student->surname}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la date de naissance du professeur</b></label>
                        <input type="date" name="dateofbirth" placeholder="{{$student->dateofbirth}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la nationalité du professeur</b></label>
                        <input type="texte" name="nationality" placeholder="{{$student->nationality}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="genre">
                          <option value="">Genre ({{$student->genre}})</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'email du professeur</b></label>
                        <input type="email" name="email" placeholder="{{$student->email}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le contact du professeur</b></label>
                        <input type="number" name="tel" placeholder="{{$student->tel}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'adresse du professeur</b></label>
                        <input type="texte" name="address" placeholder="{{$student->address}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la spécialité du professeur</b></label>
                        <input type="text" name="speciality" placeholder="{{$student->speciality}}" class="form-control">
                        <small class="text-danger">Ex: Informatique, Litteraire, Marketeur... </small>
                      </div>


                        <input type="hidden" class="form-control" name="id" value="{{$student->id}}" hidden="">
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
              </span><!-- END Edit student -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete student -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD{{$student->id}}" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete student -->
                <div class="modal fade" id="MD{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/manager/deleteStudent') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'un professeur </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CE PROFESSEUR?</p>
                        <h4 class="card-title text-center">
                        {{$student->name}} {{$student->surname}}
                        </h4>

                        <input type="hidden" class="form-control" name="id" value="{{$student->id}}" hidden="">
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
              </span><!-- END Edit student -->
            </div>

          </div>

<!-- ENDING -->



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
