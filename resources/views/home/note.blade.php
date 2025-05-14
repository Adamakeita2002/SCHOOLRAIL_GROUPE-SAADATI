@extends ('layouts.master')


@section ('content')
  
  <?php $note="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Notes et Moyennes</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">

          <div class="accordion" style="width:1300px" id="accordionExample">
            <div class="card bg-primary">
              <div class="card-header bg-secondary " id="headingOne">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  ANNEE SCOLAIRE 2019 - 2020 / SEMESTRE I / NIVEAU I
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">MATIERE</th>
                <th scope="col">TEACHER</th>
                <th scope="col">NOTES</th>
                <th scope="col">MOYENNE</th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                <td>ANGLAIS</td>
                <td>M. OUATTARA OUSMANE</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>MATHEMATIQUE</td>
                <td>M. BOSSINA HAMED</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>SYSTEME D'EXPLOITATION</td>
                <td>M. KEITA MAMADOU</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr> 
                <td>MERISE</td>
                <td>M. OUATTARA OUSMANE</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>C++</td>
                <td>M. BOSSINA HAMED</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>JAVA</td>
                <td>M. KEITA MAMADOU</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
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
                      <h1 class="text-center">15</h1>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">RANG DU 1ER SEMESTRE</h3>
                      <h1 class="text-center">3 EME</h1>
                    </div>
                  </div>
                </div>

              </div> 
                  <!-- NOTE TOGGLE -->

                </div>

              </div>
            </div>

            <div class="card bg-primary">
              <div class="card-header bg-secondary " id="headingTwo">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  ANNEE SCOLAIRE 2019 - 2020 / SEMESTRE II / NIVEAU I
                  </button>
                </h2>
              </div>

              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">MATIERE</th>
                <th scope="col">TEACHER</th>
                <th scope="col">NOTES</th>
                <th scope="col">MOYENNE</th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                <td>ANGLAIS</td>
                <td>M. OUATTARA OUSMANE</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>MATHEMATIQUE</td>
                <td>M. BOSSINA HAMED</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>SYSTEME D'EXPLOITATION</td>
                <td>M. KEITA MAMADOU</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr> 
                <td>MERISE</td>
                <td>M. OUATTARA OUSMANE</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>C++</td>
                <td>M. BOSSINA HAMED</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
              <tr>
                
                <td>JAVA</td>
                <td>M. KEITA MAMADOU</td>
                <td><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span><span class="badge badge-primary ml-3" >15</span></td>
                <td><span class="badge badge-dark ml-3" >15</span></td>
              </tr>
            </tbody>
          </table>

                  <!-- NOTE TOGGLE -->
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      MOYENNE DU SEMESTRE II - 2019 / 2020
                    </a>
                  </p>
              <div class="collapse" id="collapseExample">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">MOYENNE DU 1ER SEMESTRE</h3>
                      <h1 class="text-center">15</h1>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">RANG DU 1ER SEMESTRE</h3>
                      <h1 class="text-center">3 EME</h1>
                    </div>
                  </div>
                </div>

              </div> 
                  <!-- NOTE TOGGLE -->

                </div>

              </div>
            </div>


          </div>




        </div>

        <hr>

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
