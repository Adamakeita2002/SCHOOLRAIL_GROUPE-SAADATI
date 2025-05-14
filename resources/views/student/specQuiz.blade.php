@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $quiz="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Questions - Réponses</li>
            <li class="breadcrumb-item active" aria-current="page">{{$specSubject->name}}</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4 card-header text-center bg-primary text-white">QUESTIONS / REPONSES <br>
        <b>({{$specSubject->name}})</b>
      </h1>

        @if ($questions->count() <= 0)
        <p class="text-center">
          <button class="btn btn-danger"> AUCUNE QUESTION EN LIGNE </button>
        </p>
        @endif

  <!-- Blog Post -->
            @foreach($questions as $question)
            <div class="card mb-4" id="Q{{$question->id}}">
              <div class="card-body" style="color:white; background:#51970ccc !important; ">
                <div class="row">
                  <div class="col-sm-2">
                    @if($question->student->gender =='M')
                    <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                    @else
                    <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                    @endif
                  </div>
                  <div class="col-sm-10">
                    <h2 class="card-title">{{$question->title}}</h2>
                    <p class="card-text ">{{$question->description}}</p>
                    <p>- Posté <b>{{$question->created_at->diffForHumans()}}</b> par <i><b> {{$question->student->name}} {{$question->student->surname}} </b></i> -/- </p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p>
                <span class="pull-left" >
                    <a class="text-secondary" data-toggle="collapse" href="#collapseExample{{$question->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                      {{$question->qcomments->count()}} Commentaires
                      <i class="icon-bubble" style="font-size: 20px;"></i>
                    </a>
                </span>

                @if($question->qcomments->where('teacher_id',$question->subject->teacher->id)->count() >= 1)
                <span class="pull-right text-success pr-3">
                 Le professeur <b>{{$question->subject->teacher->fullname}} </b> a réagi à cette question
                 {{$question->qcomments->where('teacher_id',$question->subject->teacher->id)->count()}} fois
                <i class="fa fa-thumbs-o-up" style="font-size: 20px;" aria-hidden="true"></i>
                </span>
                @else
                <span class="pull-right text-danger">
                 <i class="fa fa-thumbs-o-down" style="font-size: 20px;" aria-hidden="true"></i>
                 Le professeur <b>{{$question->subject->teacher->fullname}} </b> n'a pas encore réagi à cette question
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
                  <div class="collapse @if(isset($X) AND $X==$question->id) show @endif" id="collapseExample{{$question->id}}">
                    <div class="card-footer">
                      @forelse ($question->qcomments as $qcomment)
                @if($qcomment->student_id)
                      <div class="row" >
                        <div class="col-sm-2">
                          @if($qcomment->student->gender =='M')
                          <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                          @else
                          <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                          @endif
                        </div>
                        <div class="col-sm-10 pt-2">
                          <p class="card-text text-dark">{{$qcomment->description}}</p>
                        </div>
                        <div class="card-footer text-muted mt-2" style="background-color:rgba(117, 127, 134, 0.3);">
                          <p>- Commenté <b>{{$qcomment->created_at->diffForHumans()}}</b> par <i><b><a href="#" >{{$qcomment->student->name}} {{$qcomment->student->surname}}</a></b></i> -
                          </p>
                        </div>
                      </div>
                @else
                      <div class="row" style="background:white;" >
                        <div class="col-sm-2">
                          @if($qcomment->teacher->gender =='M')
                          <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                          @else
                          <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                          @endif
                        </div>
                        <div class="col-sm-10 pt-2">
                          <p class="card-text text-dark">{{$qcomment->description}}</p>
                        </div>
                        <div class="card-footer text-muted mt-2" style="background:white;">
                          <p>- Commenté <b>{{$qcomment->created_at->diffForHumans()}}</b> par le professeur <i><b><a href="#" >{{$qcomment->teacher->fullname}} </a></b></i> -
                          </p>
                        </div>
                      </div>
                @endif
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

                          <form  action="/student/CreateQcomment" method="post" enctype="multipart/form-data" id="theform">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <div class="form-group">
                              <label><b>Voulez vous commenter?</b></label>
                              <textarea rows="3" name="description" required class="form-control"></textarea>
                              <input type="hidden" value="{{$question->id}}" name="question_id">
                              <input type="hidden" value="{{$question->subject->teacher->id}}" name="teacher_id">
                              <input type="hidden" value="specQ" name="create">
                              <input type="hidden" value="{{$question->subject->id}}" name="link">
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
                      </div>
                    </div>
                  </div>
                  <!-- COMMENT TOGGLE -->

              </div>
            </div>
            <hr>
            @endforeach
          </div>
          <!--End Blog Post -->

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Matières</h5>
          <div class="card-body">
            <div class="row">
              @foreach ($subjects as $subject)
              <div class="col-sm-6 mt-2">
                    <a href="/student/specQuiz/{{$subject->id}}">{{$subject->name}}</a>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!--START ADVICE -->
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
        <!-- END ADVICE -->

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
                 echo $date->isoFormat('dddd DD MMMM ');
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
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}
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
    <!-- /.row -->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
