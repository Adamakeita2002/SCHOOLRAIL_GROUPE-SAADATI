@extends ('layouts.master')


@section ('content')


<?php use Carbon\Carbon;?>
  <?php $parametre="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Rechercher un professeur</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>
 <!-- Page Heading 
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>-->

<div class="col-sm-12">

<div class="nav-tabs-responsive">
  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a href="#identifiant" class="nav-link active" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR EMAIL
      </a>
    </li>
    <li class="nav-item">
      <a href="#room" class="nav-link" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR CLASSE
      </a>
    </li>
    <li class="nav-item">
      <a href="#name" class="nav-link" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR NOM ET PRENOM
      </a>
    </li>
  </ul>
  <form id="formOrder" class="tab-content">


    <div id="identifiant" class="tab-pane show active"><!-- START IDENTIFIANT-->
      <div class="mb-3">
        <a href="#identifiant-collapse" data-toggle="collapse">
          <i class="icon-lock"></i> EMAIL
        </a>
      </div>

      <div id="identifiant-collapse" class="collapse show" data-parent="#formOrder">

        <div class="row"> <!-- START ROW -->



        </div> <!-- END ROW -->
        <br>
        <hr>

      </div>

    </div><!-- END IDENTIFIANT-->

    <div id="room" class="tab-pane">
      <div class="mb-3">
        <a href="#room-collapse" data-toggle="collapse">
          <i class="icon-user"></i> CLASSE
        </a>
      </div>
      <div id="room-collapse" class="collapse" data-parent="#formOrder">
        <div class="row">

        </div>

        <br>
        <hr>
      </div>
    </div>

    <div id="name" class="tab-pane">
      <div class="mb-3">
        <a href="#name-collapse" data-toggle="collapse">
          <i class="icon-credit-card"></i> NOM ET PRENOM
        </a>
      </div>

      <div id="name-collapse" class="collapse" data-parent="#formOrder">

        <div class="row"> <!-- START ROW -->

          <div class="col-12 col-lg-6">
            <div class="row">

            </div>
          </div>

        </div> <!-- END ROW -->
        <br>
        <hr>

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
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif

  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->




@endsection
