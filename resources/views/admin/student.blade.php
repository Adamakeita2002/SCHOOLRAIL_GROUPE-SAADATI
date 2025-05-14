@extends ('layouts.master')


@section ('content')

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter un étudiant</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmetudiant.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            <form  action="/kuro/admin/CreateStudent" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer le nom de l' étudiant</b></label>
                        <input type="text" name="name" placeholder="Nom" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) de l' étudiant</b></label>
                        <input type="text" name="surname" placeholder="Prénom(s)" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la date de naissance de l' étudiant</b></label>
                        <input type="date" name="dateofbirth" placeholder="Date de naissance" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la nationalité de l' étudiant</b></label>
                        <input type="texte" name="nationality" placeholder="Nationalité" class="form-control">

                      </div>


                  </div>

                  <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="gender" required>
                          <option value="">Genre</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'email de l' étudiant</b></label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le contact de l' étudiant</b></label>
                        <input type="number" name="tel" placeholder="Telephone" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'adresse de l' étudiant</b></label>
                        <input type="texte" name="address" placeholder="Adresse" class="form-control">
                      </div>

                  </div>

                </div>
                      <br>
                      <div align="center">
                        <?php $semester= $academicyearP->semesters->where('state','process')->first();
                              $Csemesters= $academicyearP->semesters->count();
                         ?>

                          @if( $semester->arretDesNotes == 0 AND $Csemesters==1 )
                          <button class="btn btn-success" type="submit">
                            Créer le compte de l' étudiant
                          </button>
                          @else
                          <span class="badge badge-danger">IMPOSSIBLE DE CREER UN ETUDIANT PENDANT LE SECOND SEMESTRE OU PENDANT QUE LES NOTES SONT ARRETEES</span>
                          @endif
                      </div>

                  </form>
<script type="text/javascript">
  $(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>

              </div>


        </div>

              @if (session('status1'))
              <hr>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

<hr>
@if (isset($_GET['q']))

  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d">
        <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
          <h4 class="card-title text-center " style="color:white;">
           {{$Ustudent->name}} {{$Ustudent->surname}}
          </h4>
          <hr>
          <h4 class="card-title text-center " style="color:white;">
           <b>{{$Ustudent->matricule}}</b>
          </h4>
        </div>

        </div>

        <div class="col-sm-5">
          <div class="card-body">
            <h4 class="card-title " ><b> Classe :  </b>
            @if( !empty($Ustudent->classroom_id))
            <span>{{$Ustudent->classroom->name}}</span>
            @else
            <span class="text-danger"> <b>Aucune Classe</b></span>
            <a class="btn btn-primary" href="/kuro/admin/affectStudent">
              AFFECTER
              </a>
            @endif
            </h4>

        <hr>
              <h4 class="card-title " ><b> Nationalité :  </b>
                <span>{{$Ustudent->nationality}}</span>
              </h4>
        <hr>
              <h4 class="card-title " ><b> Age : </b>
                <?php  $years = Carbon::parse($Ustudent->dateofbirth)->age;?>
                <span>{{$years}}</span>
              </h4>
        <hr>
             <h4 class="card-title " ><b> Genre : </b>
              <span>@if($Ustudent->gender=='M') Masculin @elseif($Ustudent->gender=='F') Feminin  @endif</span>
            </h4>


          </div>
        </div>


          <div class="col-sm-5">
            <div class="card-body">
                <h4 class="card-title " ><b> Email : </b>
                  <span>{{$Ustudent->email}}</span>
                </h4>
          <hr>
                <h4 class="card-title " ><b> Téléphone : </b>
                  <span>{{$Ustudent->tel}}</span>
                </h4>
          <hr>

                <h4 class="card-title " ><b> Adresse : </b>
                  <span>{{$Ustudent->address}}</span>
                </h4>
          <hr>


          </div>
        </div>

    </div>



  <div class="card-body">

<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

  <div class="row">

    <div class="col-sm-6"><!-- COL 6 -->

      <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM1{{$Ustudent->id}}" ><b>MODIFIER</b></button></p> <!-- MODIFY BUTTON -->

    <!-- Modal Edit student -->
    <div class="modal fade" id="MM1{{$Ustudent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit student -->
    <form action="{{ URL::to('/kuro/admin/modifyStudent') }}" method="post" enctype="multipart/form-data" id="theform2">
      <!--EDIT FORM-->
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant cet étudiant
                <b>{{$Ustudent->name}} {{$Ustudent->surname}}</b>
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
                    <label><b>Modifier le nom de l' étudiant</b></label>
                    <input type="text" name="name" placeholder="{{$Ustudent->name}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier le prénom(s) de l' étudiant</b></label>
                    <input type="text" name="surname" placeholder="{{$Ustudent->surname}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Date de naissance de l' étudiant ({{$Ustudent->dateofbirth}})</b></label>
                    <input type="date" name="dateofbirth"  class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier la nationalité de l' étudiant</b></label>
                    <input type="texte" name="nationality" placeholder="{{$Ustudent->nationality}}" class="form-control">
                  </div>

              </div>

              <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Modifier le genre</b></label>
                        <select class="form-control" name="gender">
                          <option value="">Genre ({{$Ustudent->gender}})</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'email de l' étudiant</b></label>
                        <input type="email" name="email" placeholder="{{$Ustudent->email}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier le contact de l' étudiant</b></label>
                        <input type="number" name="tel" placeholder="{{$Ustudent->tel}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'adresse de l' étudiant</b></label>
                        <input type="texte" name="address" placeholder="{{$Ustudent->address}}" class="form-control">
                      </div>


                      <input type="hidden" class="form-control" name="id" value="{{$Ustudent->id}}" hidden="">

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
<script type="text/javascript">
  $(function()
{
  $('#theform2').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
  </div><!-- Modal Edit student -->

  </div> <!-- END COL 6 -->

  <div class="col-sm-6"><!-- COL 6 -->

    <!-- START Delete student -->
    <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD1{{$Ustudent->id}}" ><b>SUPPRIMER</b></button></p>

      <!-- Modal Delete student -->
      <div class="modal fade" id="MD1{{$Ustudent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/kuro/admin/deleteStudent') }}" method="post" enctype="multipart/form-data" id="theform3">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un étudiant </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CET ETUDIANT?</p>
              <h4 class="card-title text-center">
              {{$Ustudent->name}} {{$Ustudent->surname}}
              </h4>

              <input type="hidden" class="form-control" name="id" value="{{$Ustudent->id}}" hidden="">
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
<script type="text/javascript">
  $(function()
{
  $('#theform3').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
    </div>

  </div><!-- END COL 6 -->

    </div>
  </div>
</div>
<hr>
@endif


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
