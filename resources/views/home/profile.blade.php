@extends ('layouts.master')


@section ('content')

  <?php $profile="activve" ;?>

    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebar')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
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
                    <img class="card-img-top mx-auto d-block" src="/assets/img/john-doe.png" alt="Card image" style="width:100%; padding-top: 20px">
                </div>

                <div class="col-sm-8 mt-3">

                    <div class="card-body">
                      <h4 class="card-title">Keita Mamadou</h4>
                      <p class="card-text">Etudiant en Informatique Developpeur d'Application </p>
                      
                      <div class="row">

                          <div class="col-sm-6">

                          <h6><b>Email: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>
                          
                          <h6><b>Telephone:</b> <br><span style="font-size: 14px">77557950</span> </h6>

                          <h6><b>Date:</b><br> <span style="font-size: 14px">24/08/82</span> </h6>
                             
                          </div>

                          <div class="col-sm-6">

                          <h6><b>Filière:</b><br> <span style="font-size: 14px">IDA</span> </h6>

                          <h6><b>Classe:</b><br> <span style="font-size: 14px">IDA 1</span> </h6>

                          <h6><b>Date:</b><br> <span style="font-size: 14px">24/08/82</span> </h6>

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
                 <h4>Questions posées</h4> 
                 <h4><b>15</b></h4>
                 <h4>Commentaires posées</h4>
                  <h4><b>15</b></h4>
                 <h4>Commentaires parmis les bonnes réponses</h4>
                  <h4><b>15</b></h4> 
                </div>

              </div>
              
            </div>

          </div>

          <hr>

          <div class="row">

            <div class="col-sm-4">
                <div class="card bg-primary">
            
                <h3 class="text-center mt-3" style="color:white;">LICENCE PROFESSIONNELLE</h3>

                <h5 class="text-center" style="color:white;"> <b>NIVEAU </b></h5>

                <h1 class="text-center" style="font-size: 100px; color:white;">1/3</h1>
              
              </div>
            </div>

            <div class="col-sm-4 pt-2">
                <div class="card bg-danger">
            
                <h3 class="text-center  mt-3" style="color:white;">MOYENNE 1er SEMESTRE</h3>

                <h5 class="text-center " style="color:white;"> <b>PAS DISPONIBLE </b></h5>

                <h1 class="text-center " style="font-size: 100px; color:white;">X</h1>
              
              </div>
            </div>

            <div class="col-sm-4 pt-2">
                <div class="card bg-danger">
            
                <h3 class="text-center mt-3" style="color:white;">MOYENNE 2ème SEMESTRE</h3>

                <h5 class="text-center" style="color:white;"> <b>PAS DISPONIBLE </b></h5>

                <h1 class="text-center" style="font-size: 100px; color:white;">X</h1>
              
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
