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
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xfiliere.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

            <form  action="/manager/CreateProgram" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <div class="form-group">
                  <label><b>Entrer le nom du programme</b></label>
                  <input type="text" name="fullname" class="form-control" required>
                 <small class="text-danger">Ex: COURS ELEMENTAIRE</small>
                </div>

                <div class="form-group">
                  <label><b>Entrer le diminutif du programme</b></label>
                  <input type="text" name="name" class="form-control" required>
                  <small class="text-danger">Ex: COURS ELEMENTAIRE = CE </small>
                </div>

    <!--
                  <div class="form-group">
                    <label><b>Entrer le niveau</b></label>
                    <select class="form-control" name="levelInt" required>
                      <option value="">Niveau</option>
                      <option value="1">1ère Année</option>
                      <option value="2">2ème Année</option>
                      <option value="3">Licence Professionnelle</option>
                      <option value="4">Master I</option>
                      <option value="5">Master II</option>
                    </select>
                  </div>
    -->           
                <div class="form-group">
                    <label><b>Entrer la catégorie</b></label>
                    <select class="form-control" name="levelVar" required>
                      <option value="">Catégorie</option>
                      <option value="CRECHE">CRECHE</option>
                      <option value="PRIMAIRE">PRIMAIRE</option>
                      <option value="COLLEGE">COLLEGE</option>
                    </select>
                  </div>
              
                <div class="form-group">
                    <label><b>Entrer le niveau</b></label>
                    <select class="form-control" name="levelInt" required>
                      <option value="">Niveau</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="0">Aucun à préciser</option>
                    </select>
                  </div>    
                
                <!--
                <div class="form-group">
                  <label><b>Entrer le niveau</b></label>
                  <input type="number" name="level" min="1" max="2" class="form-control" required>
                  <small class="text-danger">Ex: Première Année = 1 </small>
                </div>
                -->

                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Créer le programme
                    </button>
                  </div>

                  </form>
              
              </div>

                <div class="col-md-4">

                  <div class="callout callout-warning">
                    <h5>Champ obligatoire <i class="icon-pin"></i></h5>
                    <p>Vous devez imperativement remplir tous les champs, pour que le document soit ajouté à la bibliothèque</p>
                    <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
                    <p>Le document ne doit pas depasser la taille de 5Mo</p>
                  </div>

                </div>


        </div>

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
                    @foreach ($program->classrooms->where('academicyear_id',$academicyearP->id) as $classroom)
                    <span> <a href=""> {{$classroom->name}} </a> </span> ,
                    @endforeach
                    </h6>

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
        <!-- END EMPTY HANDLER -->
        

        <!-- Pagination 
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
          </li>
        </ul> -->
                  <!-- /.row -->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<!-- CARD CAROUSEL JS 
<script type="text/javascript">

(function ($) {
  "use strict";
  // Auto-scroll
  $('#myCarousel').carousel({
    interval: 200
  });

  // Control buttons
  $('.next').click(function () {
    $('.carousel').carousel('next');
    return false;
  });
  $('.prev').click(function () {
    $('.carousel').carousel('prev');
    return false;
  });

  // On carousel scroll
  $("#myCarousel").on("slide.bs.carousel", function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;
    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide -
          (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end 
        if (e.direction == "left") {
          $(
            ".carousel-item").eq(i).appendTo(".carousel-inner");
        } else {
          $(".carousel-item").eq(0).appendTo(".carousel-inner");
        }
      }
    }
  });
})
(jQuery);

</script>  -->

@endsection
