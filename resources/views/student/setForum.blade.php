@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $forum="activve" ;?>
    @if(isset($_GET['q']))
    <?php $X=$_GET['q'];  ?>
    @endif
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
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item " aria-current="page">Forum</li>
            <li class="breadcrumb-item active" aria-current="page">Engager un sujet</li>
          </ol>
        </nav>

        <div class="container-fluid"> <!-- FLUID CONTAINER -->

          <div class="row">

            <div class="col-md-3">
             @if($student->gender == 'M')
              <img src="/img/large/xmetudiant.jpg" style="width:250px; padding-top: 20px" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              @else
              <img src="/img/large/xfetudiant.jpg" style="width:250px; padding-top: 20px" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              @endif
            </div>

            <div class="col-md-5">

            <form  action="/student/CreateForum" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                  <div class="form-group">
                    <label>Selectionner un sujet</label>
                    <select class="form-control" name="ftheme_id" required>
                      <option value="">Choix du sujet</option>
                      @foreach ($fthemes as $ftheme)
                      <option  value="{{$ftheme->id }}">
                        {{$ftheme->label}}
                      </option>
                      @endforeach
                    </select>
                  </div>

              <div class="form-group ">
                <label>Entrez un titre</label>
                <input type="text" name="title" required="" class="form-control">
              </div>

              <div class="form-group">
                <label>Message</label>
                <textarea rows="3" name="description" required class="form-control"></textarea>
              <!--  <small class="text-secondary">Maximum of 255 characters.</small>-->
              </div>

              <div class="form-group">
                <button class="btn btn-success" type="submit">
                  Valider
                </button>
              </div>

            </form>
<script type="text/javascript">
  $(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
            </div>

            <div class="col-md-4">
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>RESOLU</b></div>
                <div class="card-body">
                  <p class="card-text">Un sujet resolu est un sujet comportant au moins une reponse satisfaisant l'auteur</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" >
                <div class="card-header"><b>NON-RESOLU</b></div>
                <div class="card-body">
                  <p class="card-text">Un sujet non-resolu est un sujet qui n'a pas de reponse satisfaisant l'auteur</p>
                </div>
              </div>
            </div>


        </div>

        <hr>

        <div class="row">

            <div class="col-sm-8">
              <h1 class="mb-3 card-header text-center bg-primary text-white">MES FORUMS</h1>
                       <!-- Blog Post -->
            @foreach($forums as $forum)
            <div class="card mb-4" id="F{{$forum->id}}">
              <div class="card-body" style="color:white; background:#082644cc !important; ">
                <div class="row">
                  <div class="col-sm-2">
                    @if($forum->student->gender =='M')
                    <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                    @else
                    <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                    @endif
                  </div>
                  <div class="col-sm-10">
                    <h2 class="card-title">{{$forum->title}}</h2>
                    <p class="card-text ">{{$forum->description}}</p>
                    <p>- Posté <b>{{$forum->created_at->diffForHumans()}}</b> par <i><b> {{$forum->student->name}} {{$forum->student->surname}} </b></i> -/- <b>{{$forum->ftheme->label}}</b></p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p>
                <span class="pull-left" >
                    <a class="text-secondary" data-toggle="collapse" href="#collapseExample{{$forum->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                      {{$forum->commentfrms->count()}} Commentaires
                      <i class="icon-bubble" style="font-size: 20px;"></i>
                    </a>
                </span>

                @if($forum->commentfrms->where('state',1)->count() >= 1)
                <span class="pull-right text-success pr-3">
                  Résolu !
                <i class="fa fa-thumbs-o-up" style="font-size: 20px;" aria-hidden="true"></i>
                </span>
                @else
                <span class="pull-right text-danger">
                 <i class="fa fa-thumbs-o-down" style="font-size: 20px;" aria-hidden="true"></i>
                 Non Resolu !
                </span>
                @endif
                <!--
                <span class="pull-right pr-3">
                 <a href="#"><u>Commentez</u> </a>
                </span>
                -->
                </p>
                <br>


                <!-- COMMENT TOGGLE -->
                  <div class="collapse @if(isset($X) AND $X==$forum->id) show @endif" id="collapseExample{{$forum->id}}">
                    <div class="card-footer">
                    <?php $Bcomment=$forum->commentfrms->where('state',1)->first(); //dd($Bcomment->description); ?>
                    @if(!empty($Bcomment))
                      <div class="row"   style=" @if( $Bcomment->state == 1) background:#00800024;@endif " >
                        <div class="col-sm-2">
                          @if($Bcomment->student->gender =='M')
                          <img src="/assets/img/john-doe.png" class="rounded-circle" height="90" width="100">
                          @else
                          <img src="/assets/img/jane-doe.png" class="rounded-circle" height="90" width="100">
                          @endif
                        </div>
                        <div class="col-sm-10 pt-2">
                          <p class="card-text text-dark">{{$Bcomment->description}}</p>
                        </div>
                        <div class="card-footer text-muted mt-2" style="background-color:rgba(117, 127, 134, 0.3);">
                          <p>- Commenté <b>{{$Bcomment->created_at->diffForHumans()}}</b> par <i><b><a href="/account/profile" >{{$Bcomment->student->name}} {{$Bcomment->student->surname}}</a></b></i> -
                          </p>
                          <p>
                            @if( $Bcomment->state == 0 AND $student->id == $forum->student_id)
                          <form  action="/student/BestComment" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">SSS
                            <input type="hidden" value="{{$Bcomment->id}}" name="commentfrm_id">
                            <button type="submit" class="btn btn-vide btn-circle">
                              <i class="fa fa-check"></i>
                            </button>
                            Cliquer pour marquer comme meilleur reponse
                          </form>
                            @elseif( $Bcomment->state == 1 AND $student->id == $forum->student_id)
                            <form  action="/student/UnBestComment" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="hidden" value="{{$Bcomment->id}}" name="commentfrm_id">
                            <button type="button" class="btn btn-vert btn-circle">
                              <i class="fa fa-check"></i>
                            </button>
                            Démarquer comme meilleur reponse? <button type="submit" class="btn btn-danger">
                              <i class="fa fa-check"></i> Cliquer ici
                            </button>
                          </form>
                            @endif

                          </p>
                        </div>
                      </div>
                      <hr >
                      @endif

                      @forelse ($forum->commentfrms->where('state',0) as $comment)
                      <div class="row" >
                        <div class="col-sm-2">
                          @if($comment->student->gender =='M')
                          <img src="/assets/img/john-doe.png" class="rounded-circle" height="90" width="100">
                          @else
                          <img src="/assets/img/jane-doe.png" class="rounded-circle" height="90" width="100">
                          @endif
                        </div>
                        <div class="col-sm-10 pt-2">
                          <p class="card-text text-dark">{{$comment->description}}</p>
                        </div>
                        <div class="card-footer text-muted mt-2" style="background-color:rgba(117, 127, 134, 0.3);">
                          <p>- Commenté <b>{{$comment->created_at->diffForHumans()}}</b> par <i><b><a href="/account/profile" >{{$comment->student->name}} {{$comment->student->surname}}</a></b></i> -
                          </p>
                          <p>
                            @if( $comment->state == 0 AND $student->id == $forum->student_id)
                          <form  action="/student/BestComment" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="hidden" value="{{$comment->id}}" name="commentfrm_id">
                            <button type="submit" class="btn btn-vide btn-circle">
                              <i class="fa fa-check"></i>
                            </button>
                            Cliquer pour marquer comme meilleur reponse
                          </form>
                            @elseif( $comment->state == 1 AND $student->id == $forum->student_id)
                            <form  action="/student/UnBestComment" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="hidden" value="{{$comment->id}}" name="commentfrm_id">
                            <button type="button" class="btn btn-vert btn-circle">
                              <i class="fa fa-check"></i>
                            </button>
                            Démarquer comme meilleur reponse? <button type="submit" class="btn btn-danger">
                              <i class="fa fa-check"></i> Cliquer ici
                            </button>
                          </form>
                            @endif

                          </p>
                        </div>
                      </div>
                      <hr >
                      @empty
                      <p class="card-text text-danger">Ce Sujet n'a pas encore été commenté</p>
                      <hr >
                      @endforelse

                      <div class="row justify-content-end">
                        <div class="col-sm-2">
                          @if($student->gender =='M')
                          <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                          @else
                          <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                          @endif

                        </div>
                        <div class="col-sm-9">

                          <form  action="/student/CreateCommentfrm" method="post" enctype="multipart/form-data" id="theform2">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <div class="form-group">
                              <label><b>Voulez vous commenter?</b></label>
                              <textarea rows="3" name="description" required class="form-control"></textarea>
                              <input type="hidden" value="{{$forum->id}}" name="forum_id">
                              <input type="hidden" value="normF" name="create">
                            </div>
                            <div class="form-group">
                              <button class="btn btn-success" type="submit">
                                Commenter
                              </button>
                            </div>
                          </form>
<script type="text/javascript">
  $(function()
{
  $('#theform2').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- COMMENT TOGGLE -->

              </div>
            </div>
            <hr>
            @endforeach

            <!-- EMPTY HANDLER -->
            @if($forums->count() <= 0 )
            <br>
            <p class="text-center">
              <button class="btn btn-danger"> AUCUN FORUM EN LIGNE </button>
            </p>
            @endif
            <!-- END EMPTY HANDLER -->

          </div>
          <!--End Blog Post -->

          <div class="col-sm-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              @foreach ($fthemes as $ftheme)
              <div class="col-sm-6 mt-2">
                    <a href="/student/specForum/{{$ftheme->label}}">{{$ftheme->label}}</a>
              </div>
              @endforeach
            </div>
          </div>
        </div>

          <!-- CALENDAR -->
        <div class="calendar light mx-auto d-block">
          <div class="calendar_header">
            <h1 class = "text-center">Calendrier Scolaire</h1>
            <p class="header_copy"> {{$academicyearP->labelYear}}</p>
          </div>
          <div class="calendar_plan">
            <div class="cl_planS">
              <div class="cl_title">Date d'aujourdhui</div>
              <div class="cl_copy">
                <?php $date = Carbon::now()->locale('fr_FR');
                 echo $date->isoFormat('dddd DD MMMM YYYY ');
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
            @if(now()->lessThanOrEqualTo($calendar->date))
            <div class="event_item">
              <div class="ei_Dot Tdot_active"></div>
              <div class="ei_Title">
                <b><?php $date=Carbon::parse($calendar->date, 'UTC');?>
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM ')}}
                </b>
                /
                <b><?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <?php echo date("G:i", strtotime($calendar->time)); ?>
                </b>
              </div>
              <div class="ei_Copy">
                <p>
                  <b>{{$subjects->where('id',$calendar->subject_id)->pluck('name')->first()}}
                  </b> <br>
                <span class="@if($calendar->epreuve_id == 1) badge badge-primary @elseif($calendar->epreuve_id == 2) badge badge-success @else badge badge-dark @endif " style="font-size: 13px" >{{$epreuves->where('id',$calendar->epreuve_id)->pluck('name')->first()}}
                </span>
                </p>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>

  <!-- END CALENDAR CALENDAR -->

          </div>

        </div>

                  <!-- NOTE TOGGLE
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
