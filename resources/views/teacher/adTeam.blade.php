@extends ('layouts.master')


@section ('content')
  
  <?php $school="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Administration</li>
          </ol>
        </nav>

    <div class="container-fluid"> <!-- container-fluid -->


    <h1 class="my-4 card-header font-weight-light text-center bg-primary text-white">ADMINISTRATION</h1>
        <!-- EMPTY HANDLER -->
        
        <p class="text-center">
          <button class="btn btn-success"> BIENTOT DISPONIBLE </button>
        </p>
        
        <!-- END EMPTY HANDLER -->

<!--

    <div class="row justify-content-md-center"> 

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">NAME SURNAME</h5>
          <div class="card-text text-black-50">EMAIL</div>
        </div>
      </div>
    </div>
  </div>

    <div class="row">
    foreach ($managers as $manager)  

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">NAME SURNAME</h5>
          <div class="card-text text-black-50">EMAIL</div>
        </div>
      </div>
    </div>
    endforeach

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
  </div> -->


  <!-- Header -->
    <h1 class="my-4 card-header font-weight-light text-center bg-primary text-white">CORPS PROFESSORAL</h1>

        <!-- EMPTY HANDLER -->
        
        <p class="text-center">
          <button class="btn btn-success"> BIENTOT DISPONIBLE </button>
        </p>
        
        <!-- END EMPTY HANDLER -->

<!--
    <div class="row">
    foreach($teachers as $teacher)  

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">NAME SURNAME</h5>
          <div class="card-text text-black-50">SPECIALITY</div>
        </div>
      </div>
    </div>
    endforeach

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
  </div>
 /.row -->

      </div> <!-- END container-fluid -->


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
