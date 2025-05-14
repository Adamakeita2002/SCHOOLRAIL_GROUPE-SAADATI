@extends ('layouts.master')


@section ('content')
  
  <?php $school="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page">Actualités</li>
            <li class="breadcrumb-item active" aria-current="page">HETEC</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

            <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4 card-header text-center bg-primary text-white">ACTUALITES</h1>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="/assets/img/lg2.jpg" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">C'est la rentrée !</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="/assets/img/lg2.jpg" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">C'est la rentrée !</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="/assets/img/lg2.jpg" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">C'est la rentrée !</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Mot du directeur</h5>
        <img class="rounded-circle mt-4 mx-auto d-block" alt="directeur" width="200" height="200" src="/assets/img/john-doe.png" alt="Card image">
        <div class="card-body">
          <h4 class="card-title text-center">John Doe</h4>
          <p class="card-text">Some example text.Some example text.Some example text.Some example text.Some example text.Some example text.Some example text.Some example text.Some example text.</p>
        </div>

    </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Contacts Importants</h5>
          <div class="card-body">
            <h2 class="text-center"><b>Email: </b><br><span style="font-size: 20px">makeita777@gmail.com</span> </h2>
            <div class="row">
              <div class="col-sm-6">
                <h6><b>Chargé de l'information: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>
                
                <h6><b>Sécretaire générale</b> <br><span style="font-size: 14px">77557950</span> </h6>
              </div>
              <div class="col-sm-6">
              <h6><b>Chargé de la formation: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>
              
              <h6><b>Chargé de l'organisation</b> <br><span style="font-size: 14px">77557950</span> </h6>
              </div>
            </div>
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
