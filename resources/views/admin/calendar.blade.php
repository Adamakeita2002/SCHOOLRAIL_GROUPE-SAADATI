@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>

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
            <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:260px; padding-top: 20px">
            </div>

            <div class="col-md-5">

            @include ('layouts.errors')
              <form  action="/teacher/CreateCalendar" method="post" enctype="multipart/form-data">
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
                    <select class="form-control" name="epreuve_id" required>
                      <option value="">Test  </option>
                      @foreach ($epreuves as $epreuve)
                      <option value="{{$epreuve->id}}">{{$epreuve->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group ">
                    <label>Entrez la date du test </label>
                    <input type="date" name="date" class="form-control" required="">
                  </div>

                  <div class="form-group ">
                    <label>Entrez l'heure du test </label>
                    <input type="time" name="time" class="form-control" required="">
                  </div>


                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Inserer dans le calendrier
                    </button>
                  </div>

              </form>

              @if (session('status1'))
              <?php $Tcalendar= $calendars->sortByDesc('id')->first(); ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br>
                            <?php $date=Carbon::parse($Tcalendar->date, 'UTC');?>
                            {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}
                       </b><br> à <br>
                            <?php $time=Carbon::parse($Tcalendar->time, 'UTC'); ?>
                        <b><?php echo date("G:i", strtotime($Tcalendar->time)); ?></b>
                      </div>
                  </div>
              @endif
              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif

            </div>

          <div class="col-md-4">

            <div class="callout callout-warning">
              <h5>Champ obligatoire <i class="icon-pin"></i></h5>
              <p>Vous devez imperativement remplir tous les champs, pour que la date soit ajoutée au calendrier</p>
            </div>

            <div class="callout callout-warning">
              <h5>Le tableau ci dessous <i class="icon-pin"></i></h5>
              <p>Vous avez une illustration de vos dates dans le tableau ci-dessous, classées par ordre decroissant</p>
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
                <th scope="col">MATIERE</th>
                <th scope="col">TEST</th>
                <th scope="col">DATE / HEURE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($calendars->sortBy('timing') as $calendar)
              <tr>
                <td>{{$classrooms->where('id',$calendar->classroom_id)->pluck('name')->first()}}</td>

                <td>{{$subjects->where('id',$calendar->subject_id)->pluck('name')->first()}}</td>

                <td><p class="@if($calendar->epreuve_id == 1) badge badge-primary @elseif($calendar->epreuve_id == 2) badge badge-success @else badge badge-dark @endif " style="font-size: 18px" >{{$epreuves->where('id',$calendar->epreuve_id)->pluck('name')->first()}}</p></td>

                <td>
                  <?php $date=Carbon::parse($calendar->date, 'UTC');?>
                 <b>{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}</b>
                  <br>
                  <?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <b><?php echo date("G:i", strtotime($calendar->time)); ?></b>

                </td>

                <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#T{{$calendar->id}}">
                SUPPRIMER <i class="icon-trash"></i>
              </button>
              <!-- Modal -->
              <div class="modal fade" id="T{{$calendar->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/teacher/DeleteCalendar') }}" method="post" enctype="multipart/form-data">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE DATE <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                  <p><b>{{$classrooms->where('id',$calendar->classroom_id)->pluck('name')->first()}} / {{$subjects->where('id',$calendar->subject_id)->pluck('name')->first()}}</b>
                  </p>

                  <p class=" @if($calendar->epreuve_id == 1) badge badge-primary @elseif($calendar->epreuve_id == 2) badge badge-success @else badge badge-dark @endif " style="font-size: 15px;" >{{$epreuves->where('id',$calendar->epreuve_id)->pluck('name')->first()}}
                  </p>

                  <p>
                    <b><?php $date=Carbon::parse($calendar->date, 'UTC');?>
                    {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}
                     </b>

                    <b><?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                    <?php echo date("G:i", strtotime($calendar->time)); ?>
                    </b>
                  </p>

                    <input type="hidden" class="form-control" name="id" id="id" value="{{$calendar->id}}" hidden="">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LA DATE <i class="icon-trash"></i>
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
              <!--End Modal -->

                </td>

              </tr>
            @endforeach
            </tbody>
          </table>

                </div>

          </div>

        <!-- EMPTY HANDLER -->
        @if($calendars->count() <= 0 )
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun calendrier en ligne </button>
        </p>
        @endif
        <!-- END EMPTY HANDLER -->





        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
