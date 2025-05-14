@extends ('layouts.master')


@section ('content')

<?php use Carbon\Carbon;?>
  <?php $parent="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter un tuteur</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xparent.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            <form  action="/kuro/admin/CreateTutor" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer le nom du tuteur</b></label>
                        <input type="text" name="name" placeholder="Nom" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) du tuteur</b></label>
                        <input type="text" name="surname" placeholder="Prénom(s)" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="gender" required>
                          <option value="">Genre</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                  </div>

                  <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Entrer le contact du tuteur</b></label>
                        <input type="number" name="tel" placeholder="Telephone" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'email du tuteur</b></label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                      </div>
                      <br>
                      <div class="form-group">
                        <button class="btn btn-success" type="submit">
                          Créer le compte du tuteur
                        </button>
                      </div>
                  </div>

                </div>

            </form>

              </div>


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
<hr>

 <!-- Page Heading
  <h4 class="my-4 text-center">LISTE DES TUTEURS</h4>-->

@if (isset($_GET['q']))

  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d">
        <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
          <h4 class="card-title text-center " style="color:white;">
           {{$Ututor->name}} {{$Ututor->surname}}
          </h4>
        </div>

        </div>

        <div class="col-sm-5">
          <div class="card-body">
            <h4 class="card-title " ><b> Enfant(s)  </b> <br>
            @foreach ($Ututor->students as $student)
              <span>{{$student->name}} {{$student->surname}}, </span>
            @endforeach
              @if( $Ututor->students->count() <= 0 )
              <span class="text-danger"> <b>Cet tuteur n'a aucun enfant</b></span>

               <form action="{{ URL::to('/kuro/admin/affectationTutor1') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="{{$Ututor->id}}" name="tutor_id">
                <div class="form-group mt-2">
                  <label><b>AFFECTER UN ETUDIANT A CE TUTEUR</b></label>
                  <input type="text" name="matricule" class="form-control" placeholder="Entrer le nom ou le matricule" list="student_fullname"/>
                  <datalist  id="student_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    @foreach($students as $student )
                    <option value="{{$student->matricule}}">{{$student->name}} {{$student->surname}} - ({{$student->matricule}}) </option>
                    @endforeach
                  </select>
                   </label>
                  </datalist>
                </div>
                <p><button class="btn btn-success" type="submit">Valider l'affectation</button></p>

              </form>
              @endif
            </h4>

        <hr>

             <h4 class="card-title " ><b> Genre : </b>
              <span>@if($Ututor->gender=='M') Masculin @elseif($Ututor->gender=='F') Feminin  @endif</span>
            </h4>


          </div>
        </div>


          <div class="col-sm-5">
            <div class="card-body">
                <h4 class="card-title " ><b> Email : </b>
                  <span>{{$Ututor->email}}</span>
                </h4>
          <hr>
                <h4 class="card-title " ><b> Téléphone : </b>
                  <span>{{$Ututor->tel}}</span>
                </h4>
          <hr>

          </div>
        </div>

    </div>



  <div class="card-body">

<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

  <div class="row">

    <div class="col-sm-6"><!-- COL 6 -->

      <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM1{{$Ututor->id}}" ><b>MODIFIER</b></button></p> <!-- MODIFY BUTTON -->

    <!-- Modal Edit Ututor -->
    <div class="modal fade" id="MM1{{$Ututor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit Ututor -->
    <form action="{{ URL::to('/kuro/admin/modifyTutor1') }}" method="post" enctype="multipart/form-data">
      <!--EDIT FORM-->
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant cet étudiant
                <b>{{$Ututor->name}} {{$Ututor->surname}}</b>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

        <div class="modal-body"> <!--MODAL BODY -->
          <div class="text-center">
          <p>Modifier la correction:</p>

            <div class="row"> <!--MODAL ROW -->

              <div class="col-sm-6">

                  <div class="form-group">
                    <label><b>Modifier le nom du tuteur</b></label>
                    <input type="text" name="name" placeholder="{{$Ututor->name}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier le prénom(s) du tuteur</b></label>
                    <input type="text" name="surname" placeholder="{{$Ututor->surname}}" class="form-control">
                  </div>

              </div>

              <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Modifier le genre</b></label>
                        <select class="form-control" name="gender">
                          <option value="">Genre ({{$Ututor->gender}})</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'email du tuteur</b></label>
                        <input type="email" name="email" placeholder="{{$Ututor->email}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier le contact du tuteur</b></label>
                        <input type="number" name="tel" placeholder="{{$Ututor->tel}}" class="form-control">
                      </div>

                      <input type="hidden" class="form-control" name="id" value="{{$Ututor->id}}" hidden="">

              </div>

            </div> <!--END MODAL ROW -->

              <p class="text-center">
                <button type="submit" class="btn btn-warning text-white"><b>Valider la modification</b></button>
              </p>

      </div>

    </div><!--END MODAL BODY -->

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
    </div>

      </div><!--MODAL CONTENT -->
    </div><!--MODAL DIALOG -->

<!--END EDIT FORM-->
    </form>

  </div><!-- Modal Edit Ututor -->

  </div> <!-- END COL 6 -->

  <div class="col-sm-6"><!-- COL 6 -->

    <!-- START Delete Ututor -->
    <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD1{{$Ututor->id}}" ><b>SUPPRIMER</b></button></p>

      <!-- Modal Delete Ututor -->
      <div class="modal fade" id="MD1{{$Ututor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/kuro/admin/deleteTutor') }}" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un tuteur </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CE TUTEUR?</p>
              <h4 class="card-title text-center">
              {{$Ututor->name}} {{$Ututor->surname}}
              </h4>

              <input type="hidden" class="form-control" name="id" value="{{$Ututor->id}}" hidden="">
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
      <!--END DELETE FORM-->
      </form>
    </div>

  </div><!-- END COL 6 -->

    </div>
  </div>
</div>

@endif


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
