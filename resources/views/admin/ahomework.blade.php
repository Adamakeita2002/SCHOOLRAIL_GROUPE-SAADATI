@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $homework="activvve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Devoirs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
        @foreach ($teacher->homeworks as $homework)
          <div class="row">
            
            <div class="accordion" style="width:1300px" id="accordionExample{{$homework->id}}">
            <div class="card " style="background-color:#bbf59d;">
              <div class="card-header bg-secondary " id="heading{{$homework->id}}">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse{{$homework->id}}" aria-expanded="true" aria-controls="collapse{{$homework->id}}">
                  {{$homework->subject->name}} - {{$homework->testNum}} - {{$homework->subject->classroom->name}} {{$homework->subject->classroom->code}} / 
                  <?php $date=Carbon::parse($homework->dateLimite, 'UTC');?>
                  @if(now()->lessThanOrEqualTo($homework->dateLimite))
                  <span class="badge badge-danger" >{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}</span>
                  @else
                  <span class="badge badge-success" >{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}</span>
                  @endif
                  </button>
                </h2>
              </div>

              <div id="collapse{{$homework->id}}" class="collapse" aria-labelledby="heading{{$homework->id}}" data-parent="#accordionExample{{$homework->id}}">

                <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">ETUDIANTS</th>
                <th scope="col">FICHIERS</th>
                <th scope="col">TELECHARGER</th>
              </tr>
            </thead>
            <tbody>
              @foreach($homework->ahomeworks as $ahomeworks)
              <tr> 
                <td>{{$ahomeworks->student->name}} {{$ahomeworks->student->surname}}</td>
                <td>{{$ahomeworks->upload}}</td>
                <td>
                  @if(now()->lessThanOrEqualTo($homework->dateLimite))
                  <p class="card-text text-center text-danger">Pas encore disponible! </p>
                  @else
                  <button class="btn btn-primary">TELECHARGER</button>
                  @endif
                </td>
              </tr>
             @endforeach 
            </tbody>
          </table>

                  <!-- HOMEWORK STATS -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card card-body ">
                      <h3 class="text-center">TOTAL PARTICIPANT</h3>
                      <h1 class="text-center">{{$homework->ahomeworks->count()}}/{{$homework->subject->classroom->students->count()}}</h1>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card card-body ">
                @if(now()->lessThanOrEqualTo($homework->dateLimite))
                <p class="card-text text-center text-danger" style="font-size: 40px"><i class="icon-close"></i></p>
                <?php $date=Carbon::parse($homework->dateLimite, 'UTC');?>
                <p class="card-text text-center text-danger">Disponible le {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}</p>
                @endif
                @if(now()->greaterThanOrEqualTo($homework->dateLimite) AND $homework->ahomeworks->count() >0)
                <p class="card-text text-center text-primary" style="font-size: 40px"><i class="icon-layers font-lg " style="font-size: 40px"></i></p>
                <a href="#" class="text-center"> Télécharger le tout</a>
                @endif
                @if($homework->ahomeworks->count() == 0)
                <p class="card-text text-center text-primary" style="font-size: 40px"><i class="icon-layers font-lg " style="font-size: 40px"></i></p>
                <p class="card-text text-center text-primary" >Aucun Participant</p>
                @endif

                    </div>
                  </div>
                </div>

                  <!-- HOMEWORK STATS -->

                </div>

              </div>
            </div>


          </div>
          
         </div>
        @endforeach


      </div> <!-- END container-fluid -->


      </div>
    </div>

  </div>


@endsection
