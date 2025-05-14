@extends ('layouts.master')


@section ('content')

  <?php $profile="activve" ;?>

    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarS')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>

      <div class="container-fluid">

        <div class="row">

          <div class="col-sm-8">
            <h4 class="card-header bg-secondary text-white">Informations personnelles</h4>
            <div class="card">

             <div class="row">

                <div class="col-sm-4">
             @if($student->gender == 'M')
              <img src="/img/large/xmetudiant.jpg" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              @else
              <img src="/img/large/xfetudiant.jpg" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              @endif

                </div>

                <div class="col-sm-8 mt-3">

                    <div class="card-body">
                      <h4 class="card-title">{{$student->name}} {{$student->surname}}</h4>
                      <br>
                    <!--  <p class="card-text">Etudiant en Informatique Developpeur d'Application </p>-->

                      <div class="row">

                          <div class="col-sm-6">

                          <h6><b>Email: </b><br><span style="font-size: 14px">{{$student->email}}</span> </h6>

                          <h6><b>Telephone:</b> <br><span style="font-size: 14px">{{$student->tel}}</span> </h6>

                          </div>

                          <div class="col-sm-6">

                          <h6><b>Filière:</b><br> <span style="font-size: 14px">{{$student->classroom->program->fullname}}</span> </h6>

                          <h6><b>Classe:</b><br> <span style="font-size: 14px">{{$student->classroom->name}}
                          </span> </h6>

                          </div>


                      </div>

                    </div>
                </div>

              </div>

            </div>


            </div>

            <div class="col-sm-4">

              <!-- Side Widget -->
              <div class="card">
                <h4 class="card-header bg-secondary text-white">Rapports</h4>

                <div class="card-body ">
                 <h6><b>Forums engagés</b></h6>
                 <h6>{{$student->forums->count()}}</h6>
                 <h6><b>Commentaires</b></h6>
                  <h6>{{$student->commentfrms->count()}}</h6>
                 <h6><b>Meilleure Commentaire</b></h6>
                  <h6>{{$student->commentfrms()->where('state',1)->count()}}</h6>
                 <h6><b>Exercices effectués</b></h6>
                  <h6>{{$student->ahomeworks->count()}}</h6>
                </div>

              </div>

            </div>

          </div>

          <hr>

          <div class="row">

            @foreach ($academicyearP->semesters as $semester )

            <div class="col-sm-4 pt-2">
                <div class="card bg-secondary">

                <h3 class="text-center  mt-3" style="color:white;">{{$semester->label}}</h3>
                <?php $semesterAvg=$student->semesterAvgs->where('semester_id',$semesterP->id)->first(); ?>

                <h3 class="text-center  mt-1" style="color:white;">Moyenne</h3>

                <h3 class="text-center " style="color:white;"> <b>@if($semesterAvg) {{$semesterAvg->value}} @else PAS DISPONIBLE @endif </b></h3>

                <h3 class="text-center  mt-1" style="color:white;">Rang : <b>@if($semesterAvg) {{$semesterAvg->rank}} @else PAS DISPONIBLE @endif</b> </h3>



              </div>
            </div>

            @endforeach

            <div class="col-sm-4 pt-2">

                <div class="card bg-secondary">

                <h3 class="text-center  mt-3" style="color:white;">ANNUEL</h3>
                <?php $semesterAvg=$student->semesterAvgs->where('semester_id',$semesterP->id)->first(); ?>

                <h3 class="text-center  mt-1" style="color:white;">MOYENNE GENERALE</h3>

                <h3 class="text-center " style="color:white;"> <b>PAS DISPONIBLE  </b></h3>

                <h3 class="text-center  mt-1" style="color:white;">Rang : <b>X</b> </h3>

              </div>
            </div>

          </div>




        </div>


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
