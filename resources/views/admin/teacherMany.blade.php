@extends ('layouts.master')


@section ('content')


  <?php

  use Carbon\Carbon;
  $teacher="activvve" ;
  $box = session()->get( 'box' );
  $boxName = session()->get( 'boxName' );
  $boxSurname = session()->get( 'boxSurname' );
  $boxC = session()->get( 'boxC' );
  $students = session()->get( 'teachers' );

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter un professeur</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xprofesseur.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            @include ('layouts.errors')
            <form  action="/kuro/admin/CreateManyTeacher" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value="{{$admin->id}}" name="id">

                <div class="row">

                  <div class="col-sm-6">

                      <label><b>SELECTIONNER LE CANEVAS PROFESSEUR</b></label>
                      <div class="form-group">
                       <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                          <i class="icon-folder"></i> Selectionner la resource
                        </button>-->
                        <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel," class="btn btn-secondary" name="upload_file" required>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-success" type="submit">
                          Créer les comptes professeurs
                        </button>
                      </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="callout callout-warning">
                      <h4>CANEVAS DE REMPLISSAGE <i class="icon-pin"></i></h5>
                      <p>Vous pouvez télécharger le canevas et le remplir</p>
                      <a href="/files/canevas/canevasEtudiant.xlsx" class="btn btn-bordo mr-2" download="canevasEtudiant.xlsx"> <i class="fa fa-file-excel-o" style="font-size:20px;" aria-hidden="true"></i> Télécharger le canevas ETUDIANT <i class="fa fa-download" aria-hidden="true"></i></a><br><br>
                      <h4>CONSIGNE A RESPECTER</h4>
                      <p>
                      <b>Veuiller ne pas modifier les en-têtes.</b><br>
                      <b>Veuiller ne pas supprimer les en-têtes.</b><br>
                      <b>Inserer les informations de chaque professeur juste après les en-têtes.</b><br>
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
                       <p>Veuillez télécharger le canevas correct et inserer les professeurs</p>
                       <a href="/files/canevas/canevasProfesseur.xlsx" class="btn btn-bordo mr-2" download="canevasEtudiant.xlsx"> <i class="fa fa-file-excel-o" style="font-size:20px;" aria-hidden="true"></i> Télécharger le canevas PROFESSEUR <i class="fa fa-download" aria-hidden="true"></i></a>
                      </div>
                  </div>
              @endif

          @if(isset($boxC))
              @if (count($boxC) >=1)
              <hr>
                  <div align="center">
                    <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i>
                        LES PROFESSEURS AVEC CES ADRESSES EMAILS ONT ETE AJOUTES AVEC SUCCES
                        <br></b>

                       @for( $i = 0; $i < count($boxC); $i++)

                       <?php $BOX=$teachers->where('email',$boxC[$i])->first(); ?>

                        {{$i + 1}} -  <b>{{$BOX->name}} {{$BOX->surname}} / {{$BOX->email}} </b> <br>

                       @endfor
                      </div>
                  </div>
              @endif
          @endif


          @if(isset($box))
              @if (count($box) >=1)
              <hr>
                  <div align="center">
                    <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> LES PROFESSEURS AVEC CES ADRESSES EMAILS N'ONT PAS PU ETRE AJOUTES<br></b>

                       @for( $i = 0; $i < count($box); $i++)

                       <?php $BOX=$teachers->where('email',$box[$i])->first(); ?>

                        {{$i + 1}} -  <b>{{$boxName[$i]}} {{$boxSurname[$i]}} / {{$box[$i]}}</b> EXISTE DEJA EN TANT QUE : <b>{{$BOX->name}} {{$BOX->surname}} / {{$BOX->email}} </b>  <br>

                       @endfor

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
