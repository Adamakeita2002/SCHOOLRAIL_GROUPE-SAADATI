@extends ('layouts.master')


@section ('content')



  <?php $school="activvve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Notes et Moyennes</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

                  <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:260px; padding-top: 20px">
            </div>

            <div class="col-md-5">
              <form  action="/teacher/CreateTest" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                  <div class="form-group">
                    <label>Classe / Matière</label>
                    <select class="form-control" name="subject_id" required>
                      <option value="">Classe et Matière</option>
                      @foreach ($subjects as $subject)
                      <option  value="{{$subject->id }}">{{$subject->classroom->name}} @if(!empty($subject->classroom->code )) {{$subject->classroom->code }}@endif / {{$subject->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Déterminer le type de test
                      <span class="badge badge-primary ml-3" >Interrogation</span>
                      <span class="badge badge-success ml-3" >Devoir</span>
                      <span class="badge badge-dark ml-3" >Examen</span>
                    </label>
                    <select class="form-control" name="type" required>
                      <option value="">Test  </option>
                      @foreach ($epreuves as $epreuve)
                      <option value="{{$epreuve->id}}">{{$epreuve->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <!--
              <div class="form-group">
                <label>Nombre de participant</label>
                <input class="form-control" name="participant" type="number" placeholder="Entre un nombre">
              </div>
                  -->

                  <div class="form-group">
                    <label>Année Scolaire / Semestre 1</label>
                    <select class="form-control" name="academicyear_id">
                      <option value="{{$academicyearP->id}}"> {{$academicyearP->labelYear}} / {{$academicyearP->labelSemester}} </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Créer une liste de note
                    </button>
                  </div>
            </form>
          </div>

          <div class="col-md-4">

            <div class="callout callout-warning">
              <h5>Notice <i class="icon-pin"></i></h5>
              <p>Vous devez imperativement remplir une liste de note que vous avez créée pour une matière specifique, avant de pouvoir créer une nouvelle liste de note pour la même matière</p>
            </div>

            <div class="callout callout-warning">
              <h5>Liste de note<i class="icon-pin"></i></h5>
              <p>Retrouvez ci-dessous, toutes vos listes de note créées</p>
            </div>

          </div>


        </div>

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}</b>
                      </div>
                  </div>
              @endif

              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> Impossible de créer une nouvelle liste de note!</b><br>
                       <b><i class="icon-check"></i> Veuillez remplir cette liste de note :</b> <br>
                       <span class="badge badge-danger" style="font-size: 15px;" > {{ session('status2') }} </span>
                      </div>
                  </div>
              @endif

              @if (session('status3'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status3') }}</b>
                      </div>
                  </div>
              @endif

              @if (session('status4'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status4') }}</b>
                      </div>
                  </div>
              @endif

              @if (session('status5'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status5') }}</b>
                      </div>
                  </div>
              @endif

              @if (session('status6'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status6') }}</b>
                      </div>
                  </div>
              @endif

              @if (session('status7'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status7') }}</b>
                      </div>
                  </div>
              @endif


<hr>

        <div class="row">


<!-- Start ACCORDION -->

      @for ($i=0; $i < count($UniqueSubjTests); $i++)
          <div class="accordion" style="width:1300px" id="accordion<?php echo $i; ?>">
            <div class="card " style="background-color:#bbf59d;">
              <div class="card-header bg-secondary " id="heading<?php echo $i; ?>">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                  <?php
                 // $schoolyear=$academicyears->where('id',$test->academicyear_id)->first();
                  $subject=$subjects->where('id',$UniqueSubjTests[$i])->first();
                  ;?>
                  {{$academicyearP->labelYear}} / {{$academicyearP->labelSemester}} / {{$subject->name}}/ {{$subject->classroom->name}}
                  </button>
                </h2>
              </div>

            <div id="collapse<?php echo $i; ?>" class="collapse  " aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion<?php echo $i; ?>">

          <div class="card-body">

            <table class="table ">
            <thead class="thead ">
              <tr>

                <th scope="col">
                  <span class="badge" style="background:#fff; font-size: 20px; color:black;" >Nom & Prenoms</span>
                </th>
                <th scope="col">
                  @foreach($epreuves as $epreuve)
                  <span class="@if($epreuve->id == 1) badge badge-primary @elseif($epreuve->id == 2) badge badge-success @else badge badge-dark @endif" style="font-size: 20px">{{$epreuve->name}}</span>
                  @endforeach
                </th>
                <th scope="col">
                 <span class="badge" style="background:#fff; font-size: 20px; color:black;"> Moyenne Actuelle</span>
                </th>
              </tr>
            </thead>

            <tbody>
<?php $ClaStudents=$students->where('classroom_id',$subject->classroom->id)->all(); ?>

  <form action="{{ URL::to('/teacher/CreateMark') }}" method="post" enctype="multipart/form-data">
        @foreach($ClaStudents as $ClaStudent)
          <tr>
            <td><b>{{$ClaStudent->surname}}</b> {{$ClaStudent->name}} </td>
            <?php $testsTF=$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',0)->all(); ?>
            <?php $testsFD=$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->all(); ?>

            <td>
            <!--Display Mark -->
            @forelse($testsTF as $test)
              <span class="@if($test->type == 1) badge badge-primary @elseif($test->type == 2) badge badge-success @else badge badge-dark @endif ml-1" style="font-size: 20px; width:65px;" >
                <b>{{$test->testNum}}</b> <hr class="hrr">
                <input type="number" step="0.01" name="{{$ClaStudent->id}}" min="0" max="20" class="form-control" style="padding: 2px 2px;">
                <input type="hidden" class="form-control" name="classroom_id" value="{{$subject->classroom->id}}" hidden="">
                <input type="hidden" class="form-control" name="test_id" value="{{$test->id}}" hidden="">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
              </span>
                    @if($ClaStudent === end($ClaStudents))
                    <div class="pt-1">
                      <button type="submit" class="btn @if($test->type == 1)  btn-primary @elseif($test->type == 2)  btn-success @else  btn-dark @endif pt-2">
                        Valider
                      </button>
    </form>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger pt-2" data-toggle="modal" data-target="#T{{$test->id}}">
                    Supprimer <i class="icon-trash"></i>
                  </button>
                  <!-- Modal DELETE SAISI DE testTF -->
                  <div class="modal fade" id="T{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ URL::to('/teacher/DeleteTest') }}" method="post" enctype="multipart/form-data">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE SAISIE DE NOTE <i class="icon-trash"></i></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Voulez-vous vraiment supprimer cette saisie de note?</p>
                        <p class="@if($test->type == 1) badge badge-primary @elseif($test->type == 2) badge badge-success @else badge badge-dark @endif" style="font-size: 15px;" >
                        {{$subject->name}} / @if($test->type == 1) Interrogation @elseif($test->type == 2) Devoir @else Examen @endif N{{$test->testNum}}
                        </p>

                        <input type="hidden" class="form-control" name="id" id="id" value="{{$test->id}}" hidden="">

                        <input type="hidden" value="{{ csrf_token() }}" name="_token">

                      <button type="submit" class="btn btn-danger">
                        OUI, SUPPRIMER CETTE SAISIE DE NOTE <i class="icon-trash"></i>
                      </button>

                      </div>

                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>

                      </div>
                    </div>
                    </form>
                    </div><!-- Modal DELETE SAISI DE testTF -->

                  </div>
                  @endif
              @empty

                @foreach($testsFD as $test)
                <?php  $mark=$marks->where('test_id',$test->id)->where('student_id',$ClaStudent->id)->first(); ?>
                @if (!empty($mark))
                  <a class="btn text-white mr-2 @if($test->type == 1  ) btn-primary @elseif($test->type == 2 ) btn-success @elseif($test->type == 3 ) btn-dark @endif ml-1 " href="#" data-toggle="modal" data-target="#M{{$mark->id}}" style="font-size: 20px;" >
                   <b>{{$test->testNum}}</b> <hr class="hrr">@if($mark->value==null) Nul @else{{$mark->value}}@endif
                  </a>
                  <!-- Modal Edit Mark -->
                  <div class="modal fade" id="M{{$mark->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ URL::to('/teacher/EditMark') }}" method="post" enctype="multipart/form-data">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette note de l'etudiant <b>{{$ClaStudent->surname}} {{$ClaStudent->name}}</b> </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Entrer la correction:</p>

              <span class="@if($test->type == 1) badge badge-primary @elseif($test->type == 2) badge badge-success @else badge badge-dark @endif" style="font-size: 20px; width:65px;" >
                {{$test->testNum}} <hr class="hrr">
                <input type="number" step="0.01" name="value" min="0" max="20" placeholder="@if($mark->value==null) Nul @else{{$mark->value}}@endif" class="form-control" required style="padding: 2px 2px;">
                <input type="hidden" class="form-control" name="mark_id" value="{{$mark->id}}" hidden="">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
              </span><br><br>

                      <button type="submit" class="btn btn-warning text-white">
                        Valider
                      </button>

                      </div>

                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>

                      </div>
                    </div>
                    </form>
                    </div>
                  @else
                  <a class="btn text-white mr-2 @if($test->type == 1) btn-primary @elseif($test->type == 2) btn-success @elseif($test->type == 3) btn-dark @else btn-danger  @endif ml-1 " href="#" data-toggle="modal" data-target="#M{{$test->id}}" style="font-size: 20px;" >
                    {{$test->testNum}} <hr class="hrr">Abs
                  </a>
                  <!-- Modal Edit Mark -->
                  <div class="modal fade" id="M{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ URL::to('/teacher/CreateAbsMark') }}" method="post" enctype="multipart/form-data">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette note de l'etudiant <b>{{$ClaStudent->surname}} {{$ClaStudent->name}}</b> </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Entrer la correction:</p>

              <span class="@if($test->type == 1) badge badge-primary @elseif($test->type == 2) badge badge-success @else badge badge-dark @endif ml-1" style="font-size: 20px; width:65px;" >
                {{$test->testNum}} <hr class="hrr">
                <input type="number" step="0.01" name="value" min="0" max="20" placeholder="Abs" class="form-control" required style="padding: 2px 2px;">
                <input type="hidden" class="form-control" name="student_id" value="{{$ClaStudent->id}}" hidden="">
                <input type="hidden" class="form-control" name="test_id" value="{{$test->id}}" hidden="">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
              </span><br> <br>

                      <button type="submit" class="btn btn-warning text-white">
                        Valider
                      </button>

                      </div>

                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>

                      </div>
                    </div>
                    </form>
                    </div>

                  @endif
                @endforeach
              @endforelse

            </td>


            <td> <!-- START CALCULE DE MOYENNE -->
              @if(empty($testsTF))
              <?php
                $tests=$testsP->where('subject_id',$subject->id)->all();
                $Smark=0;
                $j=0;
               ?>
            @foreach ($tests as $test)
              <?php $j++;?>

              @foreach ($ClaStudent->marks->where('test_id',$test->id) as $mark)
              <?php
              $Smark=$Smark + $mark->value;
              ?>
              @endforeach

            @endforeach

              <?php
              $Moyenne=$Smark/$j;
              ?>
              <strong><span class="@if($Moyenne >= 10) badge btn-vert text-white  @elseif($Smark/$j < 10) badge badge-danger @endif" style="font-size: 20px; width:65px;" >{{round($Moyenne,2)}}</strong>
              @endif
            </td> <!-- END CALCULE DE MOYENNE -->

        </tr>
        @endforeach


        <tr>

          <td class="text-danger"><b>SUPPRIMER UNE NOTE SAISIE</b></td>
          <td>
            @foreach($testsFD as $test)
              <button class="@if($test->type == 1) btn btn-primary @elseif($test->type == 2) btn btn-success @else btn btn-dark @endif ml-1" data-toggle="modal" data-target="#TFD{{$test->id}}" >@if($test->type == 1) Interrogation {{$test->testNum}} @elseif($test->type == 2) Devoir {{$test->testNum}} @else Examen {{$test->testNum}} @endif</button>

                  <!-- Modal DELETE testTF -->
                  <div class="modal fade" id="TFD{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{ URL::to('/teacher/DeleteMark') }}" method="post" enctype="multipart/form-data">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE LISTE DE NOTE SAISIE <i class="icon-trash"></i></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Voulez-vous vraiment supprimer cette liste de note saisie ?</p>
                        <p class="@if($test->type == 1) badge badge-primary @elseif($test->type == 2) badge badge-success @else badge badge-dark @endif" style="font-size: 15px;" >@if($test->type == 1) Interrogation {{$test->testNum}} @elseif($test->type == 2) Devoir {{$test->testNum}} @else Examen {{$test->testNum}} @endif
                        </p>
                        <input type="hidden" class="form-control" name="id" id="id" value="{{$test->id}}" hidden="">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">

                      <button type="submit" class="btn btn-danger">
                        OUI, SUPPRIMER  <i class="icon-trash"></i>
                      </button>

                      </div>

                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>

                      </div>
                    </div>
                    </form>
                    </div><!-- Modal DELETE testTF -->
            @endforeach
          </td>

          <!-- Last Row of action
          <td>
            <strong>15</strong>
          </td>
          -->
        </tr>

            </tbody>
          </table>

              <div class="row">
                <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                  <h3><b>Interrogation</b> : {{$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->where('type',1)->count()}} </h3>
                  <h3><b>Devoir</b> : {{$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->where('type',2)->count()}}</h3>
                  <h3><b>Examen</b> : {{$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->where('type',3)->count()}}</h3>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-body bg-dark" style="color:white;">
                <h3 class="text-center" ><b>{{$academicyearP->labelYear}} / {{$academicyearP->labelSemester}}<b></h3>
                <h3 class="text-center" >{{$subject->name}} </h3>
                <h3 class="text-center" >{{$subject->classroom->name}}</h3>
                    </div>
                </div>
              </div>

              </div>
            </div>
          </div>


          </div>
          @endfor
         <!-- END ACCORDION -->



        </div>

        <hr>

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
