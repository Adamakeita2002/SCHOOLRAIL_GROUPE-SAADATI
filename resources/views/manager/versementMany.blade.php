@extends ('layouts.master')


@section ('content')


  <?php

  use Carbon\Carbon;
  $student="activve" ;
  $box = session()->get( 'box' );
  $boxName = session()->get( 'boxName' );
  $boxSurname = session()->get( 'boxSurname' );
  $boxC = session()->get( 'boxC' );
  $students = session()->get( 'students' );

  ?>

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter many versement</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmetudiant.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            @include ('layouts.errors')
            <form  action="/manager/CreateManyVersement" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value="{{$manager->id}}" name="id">

                <div class="row">

                  <div class="col-sm-6">

                      <label><b>SELECTIONNER LE CANEVAS VERSEMENT</b></label>
                      <div class="form-group">
                       <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                          <i class="icon-folder"></i> Selectionner la resource
                        </button>-->
                        <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel," class="btn btn-secondary" name="upload_file" required>
                      </div>

                      <div class="form-group">

                          <button class="btn btn-success" type="submit">
                            Créer les compte des étudiants
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
                      <b>Inserer les informations de chaque étudiant juste après les en-têtes.</b><br>
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
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                  </div>
              @endif


<hr>



      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
