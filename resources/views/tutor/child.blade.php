@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php 
  $child="activve";
  $idS=$Student->id;
  ?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarP')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarP')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Profile</li>
            <li class="breadcrumb-item active" aria-current="page">{{$Student->name}} {{$Student->surname}}</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          <div class="row">

      <!-- Blog Entries Column -->
           <div class="col-sm-9">

            <h4 class="card-header bg-secondary text-white">Informations personnelles</h4>
            <div class="card">
            
             <div class="row">

                <div class="col-sm-4">
                    <img class="card-img-top mx-auto d-block" src="/assets/img/john-doe.png" alt="Card image" style="width:70%; padding-top: 20px">
                </div>

                <div class="col-sm-8 mt-3">

                    <div class="card-body">
                      <h4 class="card-title">{{$Student->name}} {{$Student->surname}}</h4>
                   <!--   <p class="card-text">Etudiant en Informatique Developpeur d'Application </p>-->
                      
                      <div class="row">

                          <div class="col-sm-6">

                          <h6><b>Email: </b><br><span style="font-size: 14px">{{$Student->email}}</span> </h6>
                          
                          <h6><b>Telephone:</b> <br><span style="font-size: 14px">{{$Student->tel}}</span> </h6>
                             
                          </div>

                          <div class="col-sm-6">

                          <h6><b>Filière:</b><br> <span style="font-size: 14px">{{$Student->classroom->program->fullname}}</span> </h6>

                          <h6><b>Classe:</b><br> <span style="font-size: 14px">{{$Student->classroom->name}}
                          </span> </h6>

                          </div>


                      </div>

                    </div>
                </div>

              </div>

            </div>

          <div class="row">

            <div class="col-sm-4 pt-2">
                <div class="card bg-secondary">
            
                <h3 class="text-center  mt-3" style="color:white;">MOYENNE SEMESTRE 1</h3>

                <h5 class="text-center " style="color:white;"> <b>PAS DISPONIBLE </b></h5>

                <h1 class="text-center " style="font-size: 100px; color:white;">X</h1>
              
              </div>
            </div>

            <div class="col-sm-4 pt-2">
                <div class="card bg-secondary">
            
                <h3 class="text-center  mt-3" style="color:white;">MOYENNE SEMESTRE 2</h3>

                <h5 class="text-center " style="color:white;"> <b>PAS DISPONIBLE </b></h5>

                <h1 class="text-center " style="font-size: 100px; color:white;">X</h1>
              
              </div>
            </div>

            <div class="col-sm-4 pt-2">
                <div class="card bg-secondary">
            
                <h3 class="text-center mt-3" style="color:white;">MOYENNE GENERALE</h3>

                <h5 class="text-center" style="color:white;"> <b>PAS DISPONIBLE </b></h5>

                <h1 class="text-center" style="font-size: 100px; color:white;">X</h1>
              
              </div>
            </div>

          </div>


            </div>
      <!--End Blog Post -->

      <!-- Sidebar Widgets Column -->
      <div class="col-md-3">

      <!-- CALENDAR -->

        <div class="calendar light mx-auto d-block">
          <div class="calendar_header">
            <h1 class = "text-center">Calendrier Scolaire</h1>
            <p class="header_copy"> 2019-2020</p>
          </div>
          <div class="calendar_plan">
            <div class="cl_planP">
              <div class="cl_title">Date d'aujourdhui</div>
              <div class="cl_copy">
                <?php $date = Carbon::now()->locale('fr_FR'); 
                 echo $date->isoFormat('dddd DD MMMM YYYY'); 
                ?>
              </div>
             <!-- <div class="cl_add">
                <i class="fas fa-plus"></i>
              </div> -->
            </div>
          </div>

          <div class="calendar_events">
     <?php 

     ?>
            <p class="ce_title">EVENEMENT A VENIR</p>

            @foreach ($calendars as $calendar)
            @if(now()->lessThanOrEqualTo($calendar->date))
            <div class="event_item">
              <div class="ei_Dot Tdot_active"></div>
              <div class="ei_Title">
                <b><?php $date=Carbon::parse($calendar->date, 'UTC');?>   
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}
                </b>
                / 
                <b><?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <?php echo date("G:i", strtotime($calendar->time)); ?>
                </b>
              </div>
              <div class="ei_Copy">
                <p>
                  <b>{{$subjects->where('id',$calendar->subject_id)->pluck('name')->first()}}
                  </b> <br>
                <span class="@if($calendar->epreuve_id == 1) badge badge-primary @elseif($calendar->epreuve_id == 2) badge badge-success @else badge badge-dark @endif " style="font-size: 13px" >{{$epreuves->where('id',$calendar->epreuve_id)->pluck('name')->first()}}
                </span>
                </p>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>

  <!-- END CALENDAR CALENDAR -->

      </div>

    </div>
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
