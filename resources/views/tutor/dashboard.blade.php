@extends ('layouts.master')


@section ('content')

<?php $profile="activve" ;?>
    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarP')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarP')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
          </ol>
        </nav>

        <div class="container-fluid">

            <div class="row">

               <div class="col-sm-9"> <!-- sm9 -->

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


                             <!-- CARDS CAROUSEL -->

    <div class="container-fluid">
    <h1 class="text-center my-3">Actualités</h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner row w-100 mx-auto">
        <div class="carousel-item col-md-4 active">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 1</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 2</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 3</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 4</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 5</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 6</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 7</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
      </div>
    <!--
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mt-4">
            <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
              <i class="fa fa-lg fa-chevron-left"></i>
            </a>
            <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
              <i class="fa fa-lg fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>
     -->
    </div>
    
      <hr>
    <img src="./assets/img/lg4.jpg" class="img-fluid mx-auto d-block" >

  </div>

  <!-- END CAROUSEL -->


                </div> <!--End sm9 -->

                <div class="col-sm-3 mt-3">
                  
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
                            <div class="ei_Title">Vendredi / 15:30 am</div>
                            <div class="ei_Copy">Add some more events to the calendar</div>
                          </div>
                            <div class="event_item">
                            <div class="ei_Dot"></div>
                            <div class="ei_Title">Vendredi / 15:30 am</div>
                            <div class="ei_Copy">Add some more events to the calendar</div>
                          </div>
                          <div class="event_item">
                            <div class="ei_Dot"></div>
                            <div class="ei_Title">Vendredi / 15:30 am</div>
                            <div class="ei_Copy">Add some more events to the calendar</div>
                          </div>
                          <div class="event_item">
                            <div class="ei_Dot"></div>
                            <div class="ei_Title">Vendredi / 15:30 am</div>
                            <div class="ei_Copy">Add some more events to the calendar</div>
                          </div>
                        </div>
                      </div>
              
              
                 <!-- -->

                </div>

            </div>

        <hr>

        <div class="callout callout-info">
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-4 mt-2">
                <img src="./assets/img/protech.jpeg" class="" width="263px" height="100px"> 
              </div>
              <div class="col-sm-4 mt-2">             
               <img src="./assets/img/lg1.jpg" class="" width="263px" height="100px"> 
              </div>
              <div class="col-sm-4 mt-2">
               <p class="mt-5"><a  href="/term">Termes et conditions d'utilisation</a></p>  
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
