@extends ('layouts.master')


@section ('content')

  <?php $profile="activve" ;?>

    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarT')
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
                    <img class="card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:100%; padding-top: 20px">
                </div>

                <div class="col-sm-8 mt-3">

                    <div class="card-body">
                      <h4 class="card-title">Keita Mamadou</h4>
                      <br>
                      <div class="row">

                          <div class="col-sm-6">

                          <h6><b>Email: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>
                          
                          <h6><b>Telephone:</b> <br><span style="font-size: 14px">77557950</span> </h6>

    
                          </div>

                          <div class="col-sm-6">


                          <h6><b>Classe tenue:</b><br> <span style="font-size: 14px">IDA 1, Telecom 1, Telecom 2</span> </h6>


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
                <h4 class="card-header bg-secondary text-white">Matière Dispensée</h4>

                <div class="card-body ">
                 <h4>C++</h4> 
                 <h4>Developpement Web</h4> 
                 <h4>PHP</h4> 
                 <h4>Web Design</h4> 
                </div>

              </div>
              
            </div>

          </div>

          <hr>

          <div class="row">

                <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">CLASSE</th>
                <th scope="col">RESPONSABLE</th>
                <th scope="col">RESOURCES</th>
                <th scope="col">NOMBRE DE TEST</th>
              </tr>
            </thead>
            <tbody>

              <tr> 
                <td>IDA 1</td>
                <td>Coulibaly Desmey <br> <span><b>77155524<b></span></td>
                <td>Developpement Java, Apprendre a coder en C++, Reseaux Informatiques</td>
                <td><b>(C++ / 4) - (Developpement Web / 3) - (PHP / 3)</b> </td>
              </tr>

              <tr> 
                <td>IDA 2</td>
                <td>Oumar Konate <br> <span><b>77155524<b></span></td>
                <td>Developpement Java, Apprendre a coder en C++, Reseaux Informatiques</td>
                <td><b>(Visual Basic / 1) - (Projet / 3) - (Base de données / 3)</b> </td>
              </tr>

              <tr> 
                <td>Telecom 1</td>
                <td>Diakite Djeneba <br> <span><b>77155524<b></span></td>
                <td>Developpement Java, Apprendre a coder en C++, Reseaux Informatiques</td>
                <td><b>(Visual Basic / 1) - (Projet / 3) - (Base de données / 3)</b> </td>
              </tr>

            </tbody>
          </table>

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
