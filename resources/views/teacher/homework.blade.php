@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $homework="activve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarT')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Devoirs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xtest.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

            <form  action="/teacher/CreateHomework" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                  <div class="form-group">
                    <label>Classe / Matière</label>
                    <select class="form-control" name="subject_id" required>
                      <option value="">Classe et Matière</option>
                      @foreach ($subjects as $subject)
                      <option  value="{{$subject->id }}">
                        {{$subject->classroom->name}} / {{$subject->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  <label><b>Sélectionner le document(Devoir)</b></label>
                  <div class="form-group">
                   <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>-->
                    <input type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation , text/plain, application/pdf" class="btn btn-secondary" name="upload_file" required>
                  </div>

                <div class="form-group">
                  <label><b>Déterminer la date limite </b></label>
                  <small class="text-danger"><b>(Un délai de 1 jour minimum à respecter)</b></small>
                  <input type="date" name="dateLimite" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>



                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Créer un devoir
                    </button>
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

                <div class="col-md-4">

                  <div class="callout callout-warning">
                    <h5>Champ obligatoire <i class="icon-pin"></i></h5>
                    <p>Vous devez imperativement remplir tous les champs, pour que le document soit ajouté à la bibliothèque</p>
                    <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
                    <p>Le document ne doit pas depasser la taille de 5Mo</p>
                  </div>

                </div>


        </div>

            <!--
              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif -->

                @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success sticky text-center" id="success-alert">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
                @endif
                @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-danger sticky text-center" id="success-alert">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
                @endif
                <script>
                /*******************************************/
                $(document).ready(function() {
                  $("#success-alert").hide();
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                      $("#success-alert").slideUp(500);
                    });

                });
                /*******************************************/
                </script>

<hr>
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DE VOS DEVOIRS (EXERCICES)</h4>

        <div class="row">
          @foreach ($homeworks as $homework)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body bg-primary">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$homework->classroomName}}
                </h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">
                  {{$subjects->where('id',$homework->subject_id)->pluck('name')->first()}} ({{$homework->testNum}})
                </h4>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="card-title text-center text-primary">
                      <u>Mise en ligne :</u>
                    </h6>
                    <h6 class="card-title text-center text-primary">
                        <?php $date=Carbon::parse($homework->created_at, 'UTC');?>
                        {{$date->locale('fr_FR')->isoFormat('DD MMMM YYYY')}}
                    </h6>
                  </div>
                  <div class="col-sm-6">
                     <h6 class="card-title text-center text-danger">
                     <u>Date Limite :</u>
                    </h6>
                    <h6 class="card-title text-center text-danger">
                        <?php $date=Carbon::parse($homework->dateLimite, 'UTC');?>
                        {{$date->locale('fr_FR')->isoFormat('DD MMMM YYYY')}}
                    </h6>
                  </div>
                </div>

                 @if(now()->lessThanOrEqualTo($homework->dateLimite))
                <p class="card-text text-center text-success" style="font-size: 100px"><i class="icon-check"></i></p>
                <p class="card-text text-center text-success">En ligne !</p>
                 @else
                <p class="card-text text-center text-danger" style="font-size: 100px"><i class="icon-close"></i></p>
                <p class="card-text text-center text-danger">Clos !</p>
                 @endif

              </div>
            </div>
          </div>
          @endforeach
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        @if($homeworks->count() <= 0 )
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun devoir (exercice) en ligne </button>
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
