@extends ('layouts.master')


@section('content')
    <?php use Carbon\Carbon; ?>
    <?php $account = 'active'; ?>
    <div class="app">
        <div class="app-body">

            <!--SIDEBAR -->
            @include('layouts.sidebarS')
            <!--END SIDEBAR -->

            <div class="app-content">

                <!--NAVBAR -->
                @include('layouts.navbar')
                <!--END NAVBAR -->

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Accueil</li>
                    </ol>
                </nav>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-9"> <!-- sm9 -->

                            <div class="row"> <!-- row -->

                                <div class="col-sm-4 mt-3">
                                    <div class="card">
                                        <div style="padding-top: 20px; text-align: center;">
                                            <i class="icon-notebook font-lg text-primary" style="font-size: 120px;"></i>
                                            @if ($Ressourceltn->count() >= 1)
                                                <span class="badge badge-pill badge-primary"
                                                    style="font-size: 20px">{{ $Ressourceltn->count() }}</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center;"> E-Learning</h4>
                                            <!--  <p class="card-text">Some example text.</p>-->
                                            <p class="text-center"><a href="/student/materiel" class="btn btn-primary"> Voir
                                                </a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <div class="card">
                                        <div style="padding-top: 20px; text-align: center;">
                                            <i class="icon-note font-lg text-success" style="font-size: 120px"></i>
                                            @if ($Testltn->count() >= 1)
                                                <span class="badge badge-pill badge-success"
                                                    style="font-size: 20px">{{ $Testltn->count() }}</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center;"> Test (Exercice)</h4>
                                            <!--  <p class="card-text">Some example text.</p>-->
                                            <p class="text-center"><a href="/student/homework" class="btn btn-success"> Voir
                                                </a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <div class="card">
                                        <div style="padding-top: 20px; text-align: center;">
                                            <i class="fa fa-money font-lg text-warning" style="font-size: 120px"></i>
                                            @if ($Markltn->count() >= 1)
                                                <span class="badge badge-pill badge-warning text-white"
                                                    style="font-size: 20px">{{ $Markltn->count() }}</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center;"> Paiements </h4>
                                            <!--  <p class="card-text">Some example text.</p>-->
                                            <p class="text-center"><a href="/student/mark"
                                                    class="btn btn-warning text-white"> Voir </a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <div class="card">
                                        <div style="padding-top: 20px; text-align: center;">
                                            <i class="icon-info font-lg text-info" style="font-size: 120px"></i>
                                            @if ($Newsltn->count() >= 1)
                                                <span class="badge badge-pill badge-info"
                                                    style="font-size: 20px">{{ $Newsltn->count() }}</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center;"> HETEC Infos</h4>
                                            <!--  <p class="card-text">Some example text.</p>-->
                                            <p class="text-center"><a href="/student/schoolNews" class="btn btn-info"> Voir
                                                </a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <div class="card">
                                        <div style="padding-top: 20px; text-align: center;">
                                            <i class="icon-emotsmile font-lg text-danger" style="font-size: 120px"></i>
                                            @if ($Bdeltn->count() >= 1)
                                                <span class="badge badge-pill badge-danger"
                                                    style="font-size: 20px">{{ $Bdeltn->count() }}</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center;"> APE/Conseils</h4>
                                            <!--  <p class="card-text">Some example text.</p>-->
                                            <p class="text-center"><a href="/student/schoolBde" class="btn btn-danger"> Voir
                                                </a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <div class="card">
                                        <div style="padding-top: 20px; text-align: center;">
                                            <i class="icon-globe-alt font-lg" style="font-size: 120px"></i>
                                            <span class="badge badge-pill badge-dark"
                                                style="font-size: 15px">Bientôt!</span>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align: center;"> Schoorail</h4>
                                            <!--  <p class="card-text">Some example text.</p>-->
                                            <p class="text-center"><a href="#" class="btn btn-dark"> Voir </a></p>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                                    <div class="col-sm-4">
                                                     <div class="card" >
                                                      <img class="card-img-top" src="./assets/img/john-doe.png" alt="Card image">
                                                      <div class="card-body">
                                                        <h4 class="card-title">Schedule</h4>
                                                        <p class="card-text">Some example text.</p>
                                                        <a href="#" class="btn btn-primary">See Profile</a>
                                                      </div>
                                                     </div>
                                                    </div>
                                                -->
                            </div>

                            <style type="text/css">
                                .sticky {
                                    position: -webkit-sticky;
                                    position: fixed;
                                    top: 50%;
                                    left: 50%;
                                    background-color: #cae8ca;
                                    border: 2px solid #4CAF50;
                                }
                            </style>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                            <!--<p id="easyy" class="sticky">This is a paragraph.</p>-->


                            <script>
                                $("#easyy").delay(3000).fadeOut(3000);
                            </script>




                            <br>


                            <!-- CARDS CAROUSEL -->

                            <div class="container-fluid">


                                @if (!empty($news))
                                    <h1 class="text-center my-3">Actualités</h1>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner row w-100 mx-auto">
                                            @foreach ($news as $new)
                                                <div class="carousel-item col-md-4 active">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <?php $limitt = 30; ?>
                                                            @if (strlen($new->title) > $limitt)
                                                                <?php $summaryt = substr($new->title, 0, strrpos(substr($new->title, 0, $limitt), ' ')) . '...'; ?>
                                                                <h4 class="card-title">{{ $summaryt }}</h4>
                                                            @else
                                                                <h4 class="card-title">{{ $new->title }}</h4>
                                                            @endif

                                                            <?php $limit = 75; ?>
                                                            @if (strlen($new->description) > $limit)
                                                                <?php $summary = substr($new->description, 0, strrpos(substr($new->description, 0, $limit), ' ')) . '...'; ?>
                                                                <p class="card-text">{{ $summary }}</p>
                                                            @else
                                                                <p class="card-text">{{ $new->description }}</p>
                                                            @endif
                                                            <p class="card-text">
                                                                <small
                                                                    class="text-muted">{{ $new->created_at->diffForHumans() }}</small>
                                                            </p>
                                                            <!--
                                              <p class="card-text">
                                                <a href="/student/schoolNews?k#N{{ $new->id }}" class="btn btn-primary">Lire</a>
                                              </p>
                                            -->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                @endif

                                <!-- EMPTY HANDLER -->
                                @if ($news->count() <= 0)
                                    <p class="text-center">
                                        <button class="btn btn-danger"> AUCUNE ACTUALITE DISPONIBLE </button>
                                    </p>
                                @endif
                                <!-- END EMPTY HANDLER -->
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


                        </div>

                        <!-- END CAROUSEL -->


                    </div> <!--End sm9 -->

                    <div class="col-sm-3 mt-3"> <!--START CALENDRIER -->

                        <div class="calendar light mx-auto d-block">
                            <div class="calendar_header">
                                <h1 class = "text-center">Calendrier Scolaire</h1>
                                <p class="header_copy"> {{ $academicyearP->labelYear }}</p>
                            </div>
                            <div class="calendar_plan">
                                <div class="cl_planS">
                                    <div class="cl_title">Date d'aujourdhui</div>
                                    <div class="cl_copy">
                                        <?php $date = Carbon::now()->locale('fr_FR');
                                        echo $date->isoFormat('dddd DD MMMM YYYY');
                                        ?>
                                    </div>
                                    <!-- <div class="cl_add">
                                                              <i class="fas fa-plus"></i>
                                                            </div> -->
                                </div>
                            </div>

                            <div class="calendar_events">
                                <?php
                                
                                ?>
                                <p class="ce_title">EVENEMENT A VENIR</p>

                                @foreach ($calendars as $calendar)
                                    @if (now()->lessThanOrEqualTo($calendar->date))
                                        <div class="event_item">
                                            <div class="ei_Dot Tdot_active"></div>
                                            <div class="ei_Title">
                                                <b><?php $date = Carbon::parse($calendar->date, 'UTC'); ?>
                                                    {{ $date->locale('fr_FR')->isoFormat('dddd DD MMMM') }}
                                                </b>
                                                /
                                                <b><?php $time = Carbon::parse($calendar->time, 'UTC'); ?>
                                                    <?php echo date('G:i', strtotime($calendar->time)); ?>
                                                </b>
                                            </div>
                                            <div class="ei_Copy">
                                                <p>
                                                    <b>{{ $subjects->where('id', $calendar->subject_id)->pluck('name')->first() }}
                                                    </b> <br>
                                                    <span
                                                        class="@if ($calendar->epreuve_id == 1) badge badge-primary @elseif($calendar->epreuve_id == 2) badge badge-success @else badge badge-dark @endif "
                                                        style="font-size: 13px">{{ $epreuves->where('id', $calendar->epreuve_id)->pluck('name')->first() }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                    </div><!--END CALENDRIER -->

                </div>

                <hr>

                <div class="callout callout-info">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3 mt-4">
                                <img src="/assets/img/logo-hetec.jpg" class="img-fluid" width="263px" height="100px">
                            </div>
                            <div class="col-sm-3" style="margin-top: 35px">
                                <h3 class="mt-4">EN PARTENARIAT AVEC :</h3>
                            </div>
                            <div class="col-sm-3 mt-4">
                                <img src="/assets/img/protech.jpeg" class="" width="263px" height="100px">
                            </div>
                            <div class="col-sm-2 mt-1">
                                <img src="/assets/img/logo-schoolrail.png" class="" width="150px" height="150px">
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
                                    (function($) {
                                        "use strict";
                                        // Auto-scroll
                                        $('#myCarousel').carousel({
                                            interval: 200
                                        });

                                        // Control buttons
                                        $('.next').click(function() {
                                            $('.carousel').carousel('next');
                                            return false;
                                        });
                                        $('.prev').click(function() {
                                            $('.carousel').carousel('prev');
                                            return false;
                                        });

                                        // On carousel scroll
                                        $("#myCarousel").on("slide.bs.carousel", function(e) {
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
