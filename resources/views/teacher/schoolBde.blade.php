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
            <li class="breadcrumb-item " aria-current="page">Actualités</li>
            <li class="breadcrumb-item active " aria-current="page">BDE</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

  <div class="row justify-content-md-center">

      <!-- Blog Entries Column offset-md-1 -->
      <div class="col-md-7 ">

        <h1 class="my-4 card-header text-center bg-primary text-white">BUREAU DES ETUDIANTS</h1>

        <!-- Blog Post -->

        @foreach ($BDEnews as $new)
        <div class="card mb-4" id="B{{$new->id}}">

          <div class="card-body">
            <h2 class="card-title">{{$new->title}}</h2>
            <p class="card-text">{{$new->description}}</p>
          </div>
          @if(!empty($new->upload))
          <img class="card-img-top" src="/files/schoolNews/{{$new->upload}}" alt="IMAGE">
          @endif
          <div class="card-footer text-muted">
            <p>- Posté il y a <b>{{$new->created_at->diffForHumans()}}</b></p>
          </div>
        </div>
        @endforeach


        <!-- Pagination
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

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
