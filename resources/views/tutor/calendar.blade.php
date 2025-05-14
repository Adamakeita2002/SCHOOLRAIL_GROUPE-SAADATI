@extends ('layouts.master')


@section ('content')

  
  <?php $calendar="activve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarP')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

                  <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:260px; padding-top: 20px">
            </div>

            <div class="col-md-5">

                  <div class="form-group">
                    <label>Classe / Matière</label>
                    <select class="form-control">
                      <option>Classe et matière</option>
                      <option>IDA 1 / C++</option>
                      <option>Telecom 2 / Systeme d'exploitation</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Déterminer le type de test 
                      <span class="badge badge-primary ml-3" >Interrogation</span>
                      <span class="badge badge-success ml-3" >Devoir</span>
                      <span class="badge badge-dark ml-3" >Examen</span>
                    </label>
                    <select class="form-control">
                      <option>Test  </option>
                      <option>Interrogation</option>
                      <option>Devoir</option>
                      <option>Examen</option>
                    </select>
                  </div>

                  <div class="form-group ">
                    <label>Entrez la date du test </label>
                    <input type="date" class="form-control">
                  </div>


                  <div class="form-group">
                    <button class="btn btn-success">
                      Inserer dans le calendrier
                    </button>
                  </div>

            </div>

            <div class="col-md-4">
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>Champ obligatoire</b></div>
                <div class="card-body">
                  <p class="card-text">Vous devez imperativement choisir la classe, la matiere et definir la date limite du test</p>
                </div>
              </div>
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>Date limite</b></div>
                <div class="card-body">
                  <p class="card-text">La date limite permet de definir la durée de submission des devoirs</p>
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
                <th scope="col">MATIERE</th>
                <th scope="col">TEST</th>
                <th scope="col">DATE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>

              <tr> 
                <td>IDA 1</td>
                <td>C++</td>
                <td><p class="badge badge-success " style="font-size: 18px" >Devoir</p></td>
                <td><b>24 - Avril - 2017</b> </td>
                <td><button class="btn btn-danger">Supprimer</button></td>
              </tr>

              <tr> 
                <td>IDA 2</td>
                <td>Web Design</td>
                <td><p class="badge badge-primary " style="font-size: 18px">Interrogation</p></td>
                <td><b>24 - Avril - 2017</b> </td>
                <td><button class="btn btn-danger">Supprimer</button></td>
              </tr>

              <tr> 
                <td>Telecom 1</td>
                <td>Systeme d'exploitation</td>
                <td><p class="badge badge-dark " style="font-size: 18px">Examen</p></td>
                <td><b>24 - Avril - 2017</b> </td>
                <td><button class="btn btn-danger">Supprimer</button></td>
              </tr>

            </tbody>
          </table>

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
