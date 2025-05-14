  <?php use Carbon\Carbon;?>
@if (!empty($classroom))
      <div class="card ">
        <div class="row">

          <div class="col-sm-2">
            <div class="card-body" style="background-color: #c22e6d">
            <img src="/img/large/xclassroom.jpg" width="100" height="100" class="rounded-circle mx-auto d-block">
              <h4 class="card-title text-center " style="color:white;">
               {{$classroom->name}}
              </h4>
              <hr>
            </div>
          </div>
           <div class="col-sm-8">
            <div class="card-body">
              <h6 class="card-title text-danger" >
              @foreach ($classroom->subjects->sortByDesc('arretDesNotes') as $subject)
               @if($subject->arretDesNotes == 1)
               <span class="text-success">({{$subject->name}} - <b>{{$subject->teacher->name}} {{$subject->teacher->surname}}</b>) ,</span>
               @else
               ({{$subject->name}} - <b>{{$subject->teacher->name}} {{$subject->teacher->surname}}</b>) ,
               @endif
              @endforeach
              </h6>
              <hr>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card-body">
              <h4 class="card-title text-center " >
                <?php
                $arreted=$classroom->subjects->where('arretDesNotes',1)->count() ;
                $NotArreted=$classroom->subjects->where('arretDesNotes',0)->count() ;
                $Csubjects=$classroom->subjects->count() ;
                ?>
                @if ($arreted == $Csubjects)
               <i class="fa fa-check-circle text-success" style="font-size: 42px" aria-hidden="true"></i><br>
               <span class="text-success text-center"> Toutes les notes ont été arrêtées </span>
                @else
                <i class="fa fa-times-circle text-danger" style="font-size: 42px" aria-hidden="true"></i><br>
                <span class="text-danger text-center"> {{$arreted}} / {{$Csubjects}} </span> <br>
                <span class="text-danger text-center"> Notes arrêtées</span>
                @endif
              </h4>

            </div>
          </div>

        </div>
      </div>
@else
<h3 class="text-danger text-center"><b>AUCUNE CLASSE NE CORRESPOND A CETTE RECHERCHE</b></h3>
@endif
<hr>

        <!--  </div>-->
