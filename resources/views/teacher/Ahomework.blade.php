@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $homework="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Devoirs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
        @foreach ($teacher->homeworks->where('academicyear_id',$academicyearP->id) as $homework)
            <h2 class=" text-center mb-0">
              {{$homework->subject->name}} <br> ({{$homework->testNum}} - {{$homework->subject->classroom->name}} )
            </h2>
            <div class="accordion"  id="accordionExample{{$homework->id}}">
            <div class="card " style="background-color:#bbf59d;">
              <div class="card-header bg-secondary " id="heading{{$homework->id}}">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse{{$homework->id}}" aria-expanded="true" aria-controls="collapse{{$homework->id}}">
                   {{$homework->testNum}} - {{$homework->subject->classroom->name}} /
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

        <div class="table-responsive">
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
              @foreach($homework->ahomeworks as $ahomework)
              <tr>
                <td>{{$ahomework->student->name}} {{$ahomework->student->surname}}</td>
                <td>{{$ahomework->upload}}</td>
                <td>
                  @if(now()->lessThanOrEqualTo($homework->dateLimite))
                  <p class="card-text text-danger">Disponible à partir du <b>{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}</b> </p>
                  @else
                  <a href="/files/ahomework/{{$ahomework->upload}}" class="btn btn-primary mr-2" download="{{$ahomework->upload}}"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                  @endif
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>

                  <!-- HOMEWORK STATS -->
                <div class="row justify-content-center">
                  <div class="col-sm-6">
                    <div class="card card-body ">
                      <h3 class="text-center">TOTAL PARTICIPANT</h3>
                      <h1 class="text-center">{{$homework->ahomeworks->count()}}/{{$homework->subject->classroom->students->count()}}</h1>
                    </div>
                  </div>
                </div>

                  <!-- HOMEWORK STATS -->

                </div>
              </div>

              </div>
            </div>


          </div>


         <br>
        @endforeach
      </div> <!-- END container-fluid -->


      </div>
    </div>

  </div>


@endsection
