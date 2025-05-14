@extends ('layouts.master')


@section ('content')
  
  <?php $forum="activve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarP')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Forum</li>
            <li class="breadcrumb-item active" aria-current="page">Engager un sujet</li>
          </ol>
        </nav>

        <div class="container-fluid"> <!-- FLUID CONTAINER -->

          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/john-doe.png" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

              <div class="form-group ">
                <label>Selectionner le thème</label>
                <input type="text" class="form-control">
              </div>

              <div class="form-group ">
                <label>Entrez un titre</label>
                <input type="text" class="form-control">
              </div>

              <div class="form-group">
                <label>Message</label>
                <textarea rows="3" class="form-control"></textarea>
                <small class="text-secondary">Maximum of 255 characters.</small>
              </div>

              <div class="form-group">
                <button class="btn btn-success">
                  Send message
                </button>
              </div>

            </div>

            <div class="col-md-4">
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>CLOS</b></div>
                <div class="card-body">
                  <p class="card-text">Un forum clos est un forum qu'on ne peut plus commenter</p>
                </div>
              </div>
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>RESOLU</b></div>
                <div class="card-body">
                  <p class="card-text">Un forum resolu est un forum qui a au moins une bonne reponse</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" >
                <div class="card-header"><b>NON-RESOLU</b></div>
                <div class="card-body">
                  <p class="card-text">Un forum non-resolu est un forum qui n'a pas de bonne reponse</p>
                </div>
              </div>
            </div>


        </div>

        <hr>

        <div class="row">
          
            <!-- Blog Post -->
            <div class="card mb-4">
              <div class="card-body bg-secondary" style="color:white;">
                <div class="row">
                  <div class="col-sm-2">
                    <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                  </div>
                  <div class="col-sm-10">
                    <h2 class="card-title">C'est la rentrée !</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <p>- Posté le <b>20/07/19</b> par <i><b><a href="/account/profile" style="color:white;">Keita Mamadou</a></b></i> -/- <b>TECHNOLOGIE</b></p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p>
                <span class="pull-left" >
                <a href="#" class="text-secondary">13 Commentaires <i class="icon-bubble" style="font-size: 20px;"></i></a> 
                </span>

                <span class="pull-right text-danger">
                 Non Resolu!
                </span> 


                <span class="pull-right pr-3">
                 <a href="#"><u>Commentez</u> </a>
                </span> 

                </p>
                
              </div>
            </div>

            <!-- Blog Post -->
            <div class="card mb-4">
              <div class="card-body bg-secondary" style="color:white;">
                <div class="row">
                  <div class="col-sm-2">
                    <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                  </div>
                  <div class="col-sm-10">
                    <h2 class="card-title">C'est la rentrée !</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <p>- Posté le <b>20/07/19</b> par <i><b><a href="/account/profile" style="color:white;">Keita Mamadou</a></b></i> -/- <b>TECHNOLOGIE</b></p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p>
                <span class="pull-left" >
                <a href="#" class="text-secondary">13 Commentaires <i class="icon-bubble" style="font-size: 20px;"></i></a> 
                </span>

                <span class="pull-right text-danger">
                 Non Resolu!
                </span> 


                <span class="pull-right pr-3">
                 <a href="#"><u>Commentez</u> </a>
                </span> 

                </p>
                
              </div>
            </div>

            <!-- Blog Post -->
            <div class="card mb-4">
              <div class="card-body bg-secondary" style="color:white;">
                <div class="row">
                  <div class="col-sm-2">
                    <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                  </div>
                  <div class="col-sm-10">
                    <h2 class="card-title">C'est la rentrée !</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <p>- Posté le <b>20/07/19</b> par <i><b><a href="/account/profile" style="color:white;">Keita Mamadou</a></b></i> -/- <b>TECHNOLOGIE</b></p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p>
                <span class="pull-left" >
                <a href="#" class="text-secondary">13 Commentaires <i class="icon-bubble" style="font-size: 20px;"></i></a> 
                </span>

                <span class="pull-right text-danger">
                 Non Resolu!
                </span> 


                <span class="pull-right pr-3">
                 <a href="#"><u>Commentez</u> </a>
                </span> 

                </p>
                
              </div>
            </div>


        </div>



        </div> <!-- END FLUID CONTAINER -->


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
