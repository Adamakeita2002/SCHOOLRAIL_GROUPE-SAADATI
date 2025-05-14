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
            <li class="breadcrumb-item " aria-current="page">Profile</li>
            <li class="breadcrumb-item active" aria-current="page">Modifier</li>
          </ol>
        </nav>

        <div class="container-fluid">

          <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/john-doe.png" alt="Card image" style="width:250px; padding-top: 20px">

          <h2 class="text-center text-secondary">N* Matricule: XMT-12398</h2>

          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Nom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Keita" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Prénom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Mamadou" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Filière <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="IDA" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Date de naissance <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="28/09/2010" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Email</label>
                <input type="text" class="form-control">
                <small class="text-secondary">Ce champ ne peut pas être vide</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label>Téléphone</label>
                <input type="text" class="form-control">
                <small class="text-secondary">Ce champ ne peut pas être vide</small>
              </div>
            </div>

        </div>

        <div class="row">
          
          <div class="col-sm-6">
              <div class="card text-white bg-primary mb-3" >
              <div class="card-header"><b>Champ accessible</b></div>
              <div class="card-body">
                <p class="card-text">Vous pouvez modifier un champ accessible</p>
              </div>
            </div>
          </div>

        <div class="col-sm-6">
          <div class="card text-white bg-danger mb-3" >
            <div class="card-header"><b>Champ inaccessible</b></div>
            <div class="card-body">
              <p class="card-text">Seul <b>l'administration</b> peut modifier un champ inaccessible</p>
            </div>
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
