@extends ('layouts.master')


@section('content')
    <?php use Carbon\Carbon; ?>
    <?php $profile = 'activve'; ?>
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
                        <li class="breadcrumb-item active" aria-current="page">Accueil</li>
                    </ol>
                </nav>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-9"> <!-- sm9 -->

                            <div class="row">

                                <div class="col-sm-6">
                                    <h4 class="card-header bg-secondary text-white">Informations personnelles</h4>
                                    <div class="card">

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <img class="card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png"
                                                    alt="Card image" style="width:100%; padding-top: 20px">
                                            </div>

                                            <div class="col-sm-6 mt-3">

                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $teacher->name }} {{ $teacher->surname }}
                                                    </h4>

                                                    <h6><b>Email: </b><br><span
                                                            style="font-size: 14px">{{ $teacher->email }}</span> </h6>

                                                    <h6><b>Telephone:</b> <br><span
                                                            style="font-size: 14px">{{ $teacher->tel }}</span> </h6>

                                                    <h6><b>Profession/Specialite:</b> <br><span
                                                            style="font-size: 14px">{{ $teacher->speciality }}</span> </h6>


                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                </div>

                                <div class="col-sm-6">

                                    <!-- Side Widget -->
                                    <div class="card">
                                        <h4 class="card-header bg-secondary text-white">Matière(s) Dispensée(s)</h4>

                                        <div class="card-body ">

                                            <?php //dd($subjects) ;
                                            ?>

                                            @foreach ($subjects as $subject)
                                                <h5><b> {{ $subject->name }} </b> - {{ $subject->classroom->name }}
                                                    @if (!empty($subject->classroom->code))
                                                        {{ $subject->classroom->code }}
                                                    @endif
                                                </h5>
                                            @endforeach



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

                                                <th scope="col">CLASSES</th>
                                                <th scope="col">RESPONSABLES</th>
                                                <th scope="col">RESSOURCES</th>
                                                <th scope="col">EPREUVES</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @for ($i = 0; $i < count($UniqueClasSubjs); $i++)
                                                <?php $Uclassroom = $classrooms->where('id', $UniqueClasSubjs[$i])->first(); ?>
                                                <tr>
                                                    <td><b>
                                                            {{ $Uclassroom->name }}
                                                            @if (!empty($Uclassroom->code))
                                                                {{ $Uclassroom->code }}
                                                            @endif
                                                        </b>
                                                    </td>

                                                    <td>
                                                        {{ $students->where('classroom_id', $Uclassroom->id)->where('responsable', 1)->pluck('name')->first() }}
                                                        {{ $students->where('classroom_id', $Uclassroom->id)->pluck('surname')->first() }}
                                                        <br>
                                                        <span><b>{{ $students->where('classroom_id', $Uclassroom->id)->where('responsable', 1)->pluck('tel')->first() }}<b></span>
                                                    </td>

                                                    <td>

                                                        @if (!empty($Uclassroom->ressources->where('teacher_id', $teacher->id)->all()))
                                                            @foreach ($Uclassroom->ressources->where('teacher_id', $teacher->id)->all() as $ressource)
                                                                <p class="badge badge-dark" style="font-size: 15px;">
                                                                    {{ $ressource->title }} </p>
                                                            @endforeach
                                                        @else
                                                            <p class="badge badge-dark" style="font-size: 15px;">Aucune
                                                                ressource mise en ligne pour cette classe.
                                                            </p>
                                                        @endif
                                                    </td>

                                                    <td>

                                                        <?php $Tsubjects = $subjects->where('classroom_id', $Uclassroom->id)->all(); ?>
                                                        @foreach ($Tsubjects as $Tsubject)
                                                            <b>
                                                                ({{ $Tsubject->name }} /
                                                                {{ $Tsubject->tests()->count() }})
                                                                <br>
                                                            </b>
                                                        @endforeach

                                                    </td>
                                                </tr>
                                            @endfor

                                        </tbody>
                                    </table>

                                </div>

                            </div>


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
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                @endif
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
                                <p class="header_copy"> 2019-2020</p>
                            </div>
                            <div class="calendar_plan">
                                <div class="cl_plan">
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
                                                    <b>{{ $classrooms->where('id', $calendar->classroom_id)->pluck('name')->first() }}
                                                        /
                                                        {{ $subjects->where('id', $calendar->subject_id)->pluck('name')->first() }}
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
                                <img src="/assets/img/logo-sabile-12x12-1.webp" class="" width="263px"
                                    height="100px">
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
