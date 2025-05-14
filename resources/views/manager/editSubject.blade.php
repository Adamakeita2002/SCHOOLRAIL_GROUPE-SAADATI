@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $subject="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Editer une matière</li>
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

<hr>
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES MATIERES DISPONIBLES</h4>

        <div class="row">
          @foreach ($subjects as $subject)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$subject->name}} <br> @if ($subject->classroom)<b>({{$subject->classroom->name}})</b>  @endif
                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>
                <!--
                <h4 class="card-title text-center">
                Coefficient <br> {{$subject->credit}}
                </h4>-->

              <h6>
              @if(empty($subject->teacher))
              <span class="text-danger text-center"> <b>Cette matière est affectée à aucun professeur</b>  </span>
              <span class="text-danger text-center"> <b>Cette matière est affectée à aucune classe</b>  </span>
              @else
              <h6 class="text-center"><b>Professeur Responsable:</b></h6>
              <p class="text-success text-center" style="font-size: 20px"><b>{{$subject->teacher->name}} {{$subject->teacher->surname}}</b></p>     
              @endif
              </h6>

            <hr>
            <div class="row" > 
              <div class="col-sm-6">
              <span><!-- START Edit subject -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM{{$subject->id}}" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit subject -->
                <div class="modal fade" id="MM{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/manager/modifySubject') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette classe 
                            <b>{{$subject->name}}</b> 
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>
            
                <div class="form-group">
                  <label><b>Entrer le nom de la matière</b></label>
                  <input type="text" name="name" class="form-control" placeholder="{{$subject->name}}">
                 <small class="text-danger">Ex: Anglais, Mathématique Financière</small>
                </div>

                <div class="form-group">
                  <label><b>Entrer le coefficient de la matière</b></label>
                  <input type="number" name="credit" class="form-control" placeholder="{{$subject->credit}}">
                  <small class="text-danger">Ex: 2 ou 3... </small>
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


                        <input type="hidden" class="form-control" name="id" value="{{$subject->id}}" hidden="">
                      <button type="submit" class="btn btn-warning text-white">
                        Valider la modification
                      </button>
                      </div>
                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>
                  </div>
                </div>
                </form>
              </div>
              </span><!-- END Edit subject -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete subject -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD{{$subject->id}}" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete subject -->
                <div class="modal fade" id="MD{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/manager/deleteSubject') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'une matière d'étude</h5>                        
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CETTE MATIERE?</p>
                        <h4 class="card-title text-center">
                        {{$subject->name}} 
                        </h4>
            
                        <input type="hidden" class="form-control" name="id" value="{{$subject->id}}" hidden="">
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
                </form>
              </div>
              </span><!-- END Edit subject -->
            </div>

          </div>


              </div>
            </div>
          </div>
          @endforeach
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        @if($subjects->count() <= 0 ) 
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
