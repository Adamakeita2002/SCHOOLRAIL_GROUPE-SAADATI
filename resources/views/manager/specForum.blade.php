@extends ('layouts.master')


@section ('content')
  <?php $forum="activve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebar')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarM')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Forum</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

            <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4 card-header text-center bg-primary text-white">FORUM</h1>

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
          <div class="card-body">
            <div class="row">
              <div class="col-sm-2">
                <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
              </div>
              <div class="col-sm-10">
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              </div>
              <div class="card-footer text-muted" style="background-color:rgba(117, 127, 134, 0.3);">
                <p>- Posté le <b>20/07/19</b> par <i><b><a href="/account/profile" >Keita Mamadou</a></b></i> -</p>
              </div>
            </div>
            <hr >
            <div class="row">
              <div class="col-sm-2">
                <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
              </div>
              <div class="col-sm-10">
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              </div>
              <div class="card-footer text-muted" style="background-color:rgba(117, 127, 134, 0.3);">
                  <p>- Posté le <b>20/07/19</b> par <i><b><a href="/account/profile" >Keita Mamadou</a></b></i> -</p>
              </div>
            </div>
            <hr >
            <div class="row">
              <div class="col-sm-2">
                <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <label><b>Commentaire</b></label>
                  <textarea rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-success">
                    Envoyer
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>




      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
              <div class="card text-white bg-success mb-3" >
                <div class="card-header">Clos</div>
                <div class="card-body">
                  <p class="card-text">Un forum clos est un forum qu'on ne peut plus commenter</p>
                </div>
              </div>
              <div class="card text-white bg-success mb-3" >
                <div class="card-header">Resolu</div>
                <div class="card-body">
                  <p class="card-text">Un forum resolu est un forum qui a au moins une bonne reponse</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" >
                <div class="card-header">Non-Resolu</div>
                <div class="card-body">
                  <p class="card-text">Un forum non-resolu est un forum qui n'a pas de bonne reponse</p>
                </div>
              </div>

      <!-- CALENDAR -->
      <div class="calendar light mx-auto d-block">
      <div class="calendar_header">
        <h1 class = "header_title">Calendrier Scolaire</h1>
        <p class="header_copy"> 2019-2020</p>
      </div>
      <div class="calendar_plan">
        <div class="cl_plan">
          <div class="cl_title">Date d'aujourdhui</div>
          <div class="cl_copy">22 Avril 2019</div>
         <!-- <div class="cl_add">
            <i class="fas fa-plus"></i>
          </div> -->
        </div>
      </div>
      <div class="calendar_events">
        <p class="ce_title">Evenement à venir</p>
        <div class="event_item">
          <div class="ei_Dot dot_active"></div>
          <div class="ei_Title">Lundi / 10:30 am</div>
          <div class="ei_Copy">Monday briefing with the team</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Mardi / 12:00 pm</div>
          <div class="ei_Copy">Lunch for with the besties</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Mercredi / 13:00 pm</div>
          <div class="ei_Copy">Meet with the client for final design <br> @foofinder</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Jeudi / 14:30 am</div>
          <div class="ei_Copy">Plan event night to inspire students</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Vendredi / 15:30 am</div>
          <div class="ei_Copy">Add some more events to the calendar</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Mardi / 12:00 pm</div>
          <div class="ei_Copy">Lunch for with the besties</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Mercredi / 13:00 pm</div>
          <div class="ei_Copy">Meet with the client for final design <br> @foofinder</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Jeudi / 14:30 am</div>
          <div class="ei_Copy">Plan event night to inspire students</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Vendredi / 15:30 am</div>
          <div class="ei_Copy">Add some more events to the calendar</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Mardi / 12:00 pm</div>
          <div class="ei_Copy">Lunch for with the besties</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Mercredi / 13:00 pm</div>
          <div class="ei_Copy">Meet with the client for final design <br> @foofinder</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Jeudi / 14:30 am</div>
          <div class="ei_Copy">Plan event night to inspire students</div>
        </div>
        <div class="event_item">
          <div class="ei_Dot"></div>
          <div class="ei_Title">Vendredi / 15:30 am</div>
          <div class="ei_Copy">Add some more events to the calendar</div>
        </div>

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
