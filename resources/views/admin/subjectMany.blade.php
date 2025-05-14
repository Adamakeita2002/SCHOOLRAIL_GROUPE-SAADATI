@extends ('layouts.master')


@section ('content')


  <?php

  use Carbon\Carbon;
  $subject="activvve" ;
  $Ebox = session()->get( 'Ebox' );
  $EboxClassroom = session()->get( 'EboxClassroom' );
  $EboxClassroomID = session()->get( 'EboxClassroomID' );
  $EboxFullName = session()->get( 'EboxFullName' );
  $SboxS = session()->get( 'SboxS' );
  $SboxC = session()->get( 'SboxC' );
  $XboxF = session()->get( 'XboxF' );
  $XboxM = session()->get( 'XboxM' );
  $XboxC = session()->get( 'XboxC' );


  $subjects = session()->get( 'subjects' );

  ?>

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter (x) matière(s)</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmatiere.jpg" alt="MATIERE" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            @include ('layouts.errors')
            <form  action="/kuro/admin/CreateManySubject" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value="{{$admin->id}}" name="id">

                <div class="row">

                  <div class="col-sm-6">

                      <label><b>SELECTIONNER LE CANEVAS MATIERE</b></label>
                      <div class="form-group">
                       <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                          <i class="icon-folder"></i> Selectionner la resource
                        </button>-->
                        <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel," class="btn btn-secondary" name="upload_file" required>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-success" type="submit">
                          Créer les matières
                        </button>
                      </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="callout callout-warning">
                      <h4>CANEVAS DE REMPLISSAGE <i class="icon-pin"></i></h5>
                      <p>Vous pouvez télécharger le canevas et le remplir</p>
                      <a href="/files/canevas/canevasMatiere.xlsx" class="btn btn-bordo mr-2" download="canevasEtudiant.xlsx"> <i class="fa fa-file-excel-o" style="font-size:20px;" aria-hidden="true"></i> Télécharger le canevas MATIERE <i class="fa fa-download" aria-hidden="true"></i></a><br><br>
                      <h4>CONSIGNE A RESPECTER</h4>
                      <p>
                      <b>Veuiller ne pas modifier les en-têtes.</b><br>
                      <b>Veuiller ne pas supprimer les en-têtes.</b><br>
                      <b>Inserer les informations de chaque matière juste après les en-têtes.</b><br>
                      <b>Le document ne doit pas dépasser la taille de 5Mo.</b><br>
                      </p>
                    </div>

                  </div>

                </div>
                      <br>
              </form>

              </div>



        </div>


              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                       <p>Le canevas que vous avez utilisé n'est pas conforme.</p>
                       <p>Veuillez télécharger le canevas correct et inserer les matières</p>
                       <a href="/files/canevas/canevasMatiere.xlsx" class="btn btn-bordo mr-2" download="canevasMatiere.xlsx"> <i class="fa fa-file-excel-o" style="font-size:20px;" aria-hidden="true"></i> Télécharger le canevas ETUDIANT <i class="fa fa-download" aria-hidden="true"></i></a>
                      </div>
                  </div>
              @endif


          @if(isset($SboxS))
              @if (count($SboxS) >=1)
              <hr>
                  <div align="center">
                    <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i>
                        LES MATIERES SUIVANTES, ONT ETE BIEN CREEES
                        <br></b>

                       @for( $i = 0; $i < count($SboxS); $i++)

                       <?php $BOX=$subjects->where('name',$SboxS[$i])->where('classroom_id',$SboxC[$i])->first(); ?>

                        {{$i + 1}} -  <b>{{$BOX->name}} -> {{$BOX->teacher->fullname}} en {{$BOX->classroom->name}} </b> <br>

                       @endfor
                      </div>
                  </div>
              @endif
          @endif


          @if(isset($Ebox))
              @if (count($Ebox) >=1)
              <hr>
                  <div align="center">
                    <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> LES MATIERES SUIVANTES N'ONT PAS PU ETRE CREEES<br></b>

                       @for( $i = 0; $i < count($Ebox); $i++)

                       <?php $BOX=$subjects->where('name',$Ebox[$i])->where('classroom_id',$EboxClassroomID[$i])->first(); ?>

                        {{$i + 1}} -  <b>{{$Ebox[$i]}} -> {{$EboxFullName[$i]}} en {{$EboxClassroom[$i]}}</b> EXISTE DEJA     <br>

                       @endfor

                      </div>
                  </div>
              @endif
          @endif


          @if(isset($XboxC) OR isset($XboxF))
              @if (count($XboxC) >=1 OR count($XboxF) >=1 )
              <hr>
                  <div align="center">
                    <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> LES MATIERES SUIVANTES N'ONT PAS PU ETRE CREEES<br></b>
                       <b><i class="icon-info"></i> UNE ERREUR AVEC LE NOM DU PROF OU DE LA CLASSE<br></b>

                       @for( $i = 0; $i < count($XboxC); $i++)

                        {{$i + 1}} -  <b> Le cours "{{$XboxM[$i]}}" du professeur "{{$XboxF[$i]}}" en "{{$XboxC[$i]}}"</b><br>

                       @endfor

                       @for( $i = 0; $i < count($XboxF); $i++)

                        {{$i + 1}} -  <b> Le cours "{{$XboxM[$i]}}" du professeur "{{$XboxF[$i]}}" en "{{$XboxC[$i]}}"</b><br>

                       @endfor

                       <b><i class="icon-info"></i> VERIFIER SI LES PROFESSEURS ET LES CLASSES ONT ETE CREEE EN AMONT <br></b>

                      </div>
                  </div>
              @endif
          @endif

<hr>



      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
