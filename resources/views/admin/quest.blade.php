@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $quest="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Requête</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

     <!-- <p class="text-center text-primary" style="font-size: 150px;"><i class="icon-envelope-letter"></i></p>-->

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success sticky text-center" id="success-alert">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-danger sticky text-center" id="success-alert">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif

<div class="row">

  <table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center">DEMANDEUR</th>
      <th class="text-center">OBJET/DATE D'ENVOI</th>
      <th class="text-center">ACTION</th>
    </tr>
  </thead>

  <tbody>
    @foreach($squests as $squest)
    <tr id="Q{{$squest->id}}">
      <?php $demande= $quests->where('id',$squest->quest_id)->first(); ?>
      <?php $date=Carbon::parse($squest->created_at, 'UTC');?>

      <td class="text-center">{{$squest->student->name}} {{$squest->student->surname}}<br> 
        <b>({{$squest->student->classroom->name}})</b></td>

      <td class="text-center">
     <b>{{$demande->description}}</b><br>   
     {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}
      </td>

      <td class="text-center">
      @if($squest->state == 0) 
      <a href="/kuro/admin/confirm/quest?Qt={{$squest->id}}#QT={{$squest->id}}" class="btn btn-success">Confirmer</a> <b>|</b> 
      <a href="/kuro/admin/abort/quest?Qt={{$squest->id}}#QT={{$squest->id}}" class="btn btn-danger">Avorter</a> 
      @elseif ($squest->state == 1) 
      <span class="badge badge-success"> <b> Disponible </b> </span> 
      @elseif ($squest->state == 2) 
      <span class="badge badge-danger"> <b> Avorté </b> </span>  
      @endif 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>   

</div>

@if($squests->count() == 0)

<p class="text-center"> <button class="btn btn-danger"><b>PAS DE DEMANDE</b></button> </p>

@endif



      </div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>


/*******************************************/

$(document).ready(function() {
  $("#success-alert").hide();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });

});

/*******************************************/  


</script>

@endsection
