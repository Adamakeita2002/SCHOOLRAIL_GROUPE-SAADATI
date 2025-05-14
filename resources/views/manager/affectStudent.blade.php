@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Affecter un étudiant</li>
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

@if($Nstudents->count() <=0)


<div class="d-flex justify-content-center">

  <div class="col-sm-6">
    <div class="card">
      <h4 class="card-header bg-danger text-white"><i class="fa fa-info-circle" aria-hidden="true"></i>
AFFECTATION
</h4>

      <div class="card-body ">
        <h4>Si vous apercevez cette notification, cela signifie que tous vos étudiants sont affectés à une classe.</h4> <h6>Vous devez créer des étudiants afin de pouvoir les affecter dans leur classe respective.</h6>
      </div>
    </div>
  </div>


</div>

<!--
          <div class="col-sm-4">

             Side Widget 
            <div class="card">
              <h4 class="card-header bg-secondary text-white">Matière Dispensée</h4>

              <div class="card-body ">
               <h4>C++</h4> 
               <h4>Developpement Web</h4> 
               <h4>PHP</h4> 
               <h4>Web Design</h4> 
              </div>

            </div>
            
          </div> -->

@endif

@if($Nstudents->count() >0)
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES ETUDIANTS NON AFFECTES</h4>

        <div class="row">
          <div class="card-body">

        <form action="{{ URL::to('/manager/affectationStudent') }}" method="post" enctype="multipart/form-data">
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">CLASSE D'AFFECTATION</th>
              </tr>
            </thead>

            <tbody>
              
             <?php $i=0;  ?>
              @foreach ($Nstudents as $student)
              <?php $i++; ?>
              <tr> 
                <td><b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?> 
                <td>{{$student->dateofbirth}} - <b>({{$years}} ans)</b></td>

                <td>{{$student->tel}}</td>
               
                <td>
                <div class="form-group">
                  <label><b>Affecter l'étudiant dans une classe</b></label>
                  <select class="form-control" name="classroom{{$i}}" required>
                    <option value="">Choisir la classe</option>
                    @foreach($classrooms as $classroom )
                    <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                    @endforeach
                  </select>
                </div>
                <input type="hidden" value="{{$student->id}}" name="student{{$i}}">
                </td>

              </tr>
              @endforeach
              
            </tbody>

          </table>    
          <p class="text-center">

            <button class="btn btn-success" type="submit"><b>VALIDER LES AFFECTATIONS</b></button>
          </p>     
      </form>
          </div>
        </div><!-- END ROW -->

<hr>
@endif


        <!-- EMPTY HANDLER -->
        @if($students->count() <= 0 ) 
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun étudiant </button>
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
