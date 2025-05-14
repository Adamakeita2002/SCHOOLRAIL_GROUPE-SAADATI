@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $subject="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Affecter une matière</li>
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

              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status3'))
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> {{ session('status3') }}<br></b>
                       Le jour et l'heure que vous avez programmé, existe déja!
                      </div>
                  </div>
              @endif

@if($Nsubjects AND $Nsubjects->count() >0)
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES MATIERES NON AFFECTEES</h4>

          @foreach ($Nsubjects as $subject)
        <!--  <div class="row">-->
        <!--  <div class="col-lg-4 col-sm-6 mb-4"> -->
            <div class="card">

                <div class="row">

                <div class="col-sm-3">
                  <div class="card-body" style="background-color: #c22e6d">
                    <h2 class="card-title text-center mt-1" style="color:white;">
                     {{$subject->name}}
                    </h2>
                  <div class="card-body">
                     <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmatiere.jpg" alt="Card image" style="width:100px; padding-top: 15px">

                    <h4 class="card-title text-white text-center">
                    Coefficient <br> {{$subject->credit}}
                    </h4>
                  </div>
                  </div>
                </div>

              <div class="col-sm-8">
              <form action="{{ URL::to('/kuro/admin/affectationSubject') }}" method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="col-sm-6">

                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <input type="hidden" value="{{$subject->id}}" name="id">

                <div class="form-group pt-2">
                <!--  <small class="text-danger text-center"> <b>Cette matière est affectée à <u>aucune classe</u></b></small>-->
                  <label><b>Affecter la matière a une classe</b></label>
                  <select class="form-control" name="classroom_id" required>
                    <option value="">Choisir la classe</option>
                    @foreach($classrooms as $classroom )
                    <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                    @endforeach
                  </select>
                </div>




                <div class="form-group">
                <!--  <small class="text-danger text-center"> <b>Cette matière est affectée à <u>aucun professeur</u></b></small>-->
                  <label><b>Affecter la matière a un professeur</b></label>
                  <input type="text" name="teacher_fullname" class="form-control" placeholder="Entrer le nom du professeur" list="teacher_fullname"/>
                  <datalist  id="teacher_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    @foreach($teachers as $teacher )
                    <option value="{{$teacher->fullname}}">{{$teacher->fullname}} ({{$teacher->email}})</option>
                    @endforeach
                  </select>
                   </label>
                  </datalist>
                </div>

                  </div>


                  <div class="col-sm-6">
                    <div class="form-group pt-2 ">
                      <label><b>Le jour d'enseignement</b> </label>
                      <select class="form-control" name="day" required>
                        <option value="">Déterminer le jour d'enseignement</option>
                        <option value="LUNDI">LUNDI</option>
                        <option value="MARDI">MARDI</option>
                        <option value="MERCREDI">MERCREDI</option>
                        <option value="JEUDI">JEUDI</option>
                        <option value="VENDREDI">VENDREDI</option>
                        <option value="SAMEDI">SAMEDI</option>
                      </select>
                    </div>

                      <div class="form-group ">
                        <label><b>Entrez l'heure debut</b> </label>
                        <input type="time" name="startime" class="form-control" required="">
                      </div>

                      <div class="form-group ">
                        <label><b>Entrez l'heure fin</b> </label>
                        <input type="time" name="endtime" class="form-control" required="">
                      </div>
                  </div>

                </div>
<p class="text-center"><button class="btn btn-success" type="submit">Valider l'affectation</button></p>

          </form>

              </div>


              </div>
            </div>
        <!--  </div> -->
    <!--  </div> END ROW -->
          <hr>
          @endforeach



@endif

 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES MATIERES AFFECTEES</h4>

        <div class="row">
          @foreach ($semesterP->subjects as $subject)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                @if ($subject->classroom AND $subject->teacher)
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$subject->name}} <br> {{$subject->classroom->name}}
                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>
                <h4 class="card-title text-center">
                Coefficient <br> {{$subject->credit}}
                </h4>

              <h6 class="text-center"><b>Professeur Responsable:</b></h6>
              <p class="text-success text-center" style="font-size: 20px"><b>{{$subject->teacher->name}} {{$subject->teacher->surname}}</b></p>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div><!-- END ROW -->




        <!-- EMPTY HANDLER -->
        @if($semesterP->subjects->count() <= 0 )
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucune matière créée </button>
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
