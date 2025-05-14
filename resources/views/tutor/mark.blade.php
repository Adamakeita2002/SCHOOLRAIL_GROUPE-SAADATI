@extends ('layouts.master')


@section ('content')


  <?php use Carbon\Carbon;?>
  <?php 
  $child="activve";
  $idS=$Student->id;
  ?>

<style type="text/css">

.hrr{
margin-top: 0.2rem;
margin-bottom: 0.2rem;
border: 0;
border-top-color: currentcolor;
border-top-style: none;
border-top-width: 0px;
border-top: 1px solid rgba(255,255,255);
}

.hrr {
-webkit-box-sizing: content-box;
box-sizing: content-box;
height: 0;
overflow: visible;
}

.vl {
  border-left: 3px solid green;
  height: 500px;
}

</style>

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
            <li class="breadcrumb-item " aria-current="page">Note</li>
            <li class="breadcrumb-item active" aria-current="page">{{$Student->name}} {{$Student->surname}}</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          <div class="row">

      <!-- Blog Entries Column -->
           <div class="col-sm-9">

      
      <h1 class="my-4 card-header text-center text-white" style="background-color:#790fb1f2;">SEMESTRE EN COURS</h1>

        <div class="row"><!-- SEMESTRE EN COURS -->
          <div class="accordion" style="width:1300px" id="accordionExample">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  {{$academicyearP->labelYear}} / {{$academicyearP->labelSemester}} / {{$Student->classroom->name}}
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">MATIERE</th>
                <th scope="col">PROFESSEUR</th>
                <th scope="col">NOTES</th>
                <th scope="col">MOYENNE</th>
              </tr>
            </thead>
                <div class="text-center">
                  @foreach($epreuves as $epreuve)
                  <span class="@if($epreuve->id == 1) badge badge-primary ml-3 @elseif($epreuve->id == 2) badge badge-success @else badge badge-dark @endif" style="font-size: 20px">{{$epreuve->name}}</span>
                  @endforeach
                </div>
            <tbody>
              @foreach ($Subjects as $subject)
              <tr> 
                <td>{{$subject->name}}</td>

                <td>{{$subject->teacher->name}} {{$subject->teacher->surname}}</td>
                <td>
                <?php $tests= $subject->tests()->get(); 
                $Smark=0;
                $j=0;
                ?>

                @foreach ($tests as $test)
                  <?php   
                    $j++;
                  ?>
                  @foreach ($marks->where('test_id',$test->id) as $mark )
                  <span class="@if($test->type == 1 AND $mark->value==!null ) badge badge-primary @elseif($test->type == 2 AND $mark->value==!null) badge badge-success @elseif($test->type == 3 AND $mark->value==!null) badge badge-dark @else badge badge-danger  @endif ml-1 " style="font-size: 20px;" >
                    {{$test->testNum}} <hr class="hrr">@if($mark->value==null) N @else{{$mark->value}}@endif 
                  </span>
                    <?php 
                    $Smark=$Smark + $mark->value;  
                   // $j++;
                    ?>
                  @endforeach
                @endforeach
               </td>
              
            @if($tests->count()==0)
              <?php 
              $Moyenne="N";
              ?>
            @else
              <?php 
              $Moyenne=$Smark/$j;
              ?>
            @endif

                <td><span class="@if($Moyenne >=10) badge btn-vert ml-3 @elseif($Moyenne <10)badge badge-danger ml-3 @elseif($Moyenne == 'N')badge badge-danger ml-3 @endif " style="font-size: 20px;" >{{$Moyenne}}</span></td>
              </tr>
              @endforeach
            </tbody>
          </table>

                  <!-- NOTE TOGGLE -->
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      MOYENNE DU SEMESTRE I - 2019 / 2020
                    </a>
                  </p>

              <div class="collapse" id="collapseExample">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">MOYENNE DU 1ER SEMESTRE</h3>
                      <h1 class="text-center">Pas encore disponible</h1>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">RANG DU 1ER SEMESTRE</h3>
                      <h1 class="text-center">Pas encore disponible</h1>
                    </div>
                  </div>
                </div>

              </div> 
                  <!-- NOTE TOGGLE -->

                </div>

              </div>
            </div>


           

          </div>

        </div> <!-- SEMESTRE EN COURS -->

        

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
                <span style="font-size: 12px">
                <b><?php $date=Carbon::parse($calendar->date, 'UTC');?>   
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}
                </b>
                / 
                <b><?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <?php echo date("G:i", strtotime($calendar->time)); ?>
                </b>
                </span>
              </div>
              <div class="ei_Copy">
                <p style="font-size: 12px">
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
