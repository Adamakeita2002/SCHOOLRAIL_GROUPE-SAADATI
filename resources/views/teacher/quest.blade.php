@extends ('layouts.master')


@section ('content')

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $quest="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Requête</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <p class="text-center text-primary" style="font-size: 150px;"><i class="icon-envelope-letter"></i></p>


    <div class="row justify-content-md-center">
        <div class="col-sm-6">

            <form  action="/student/CreateQuest" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                  <div class="row justify-content-md-center">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>SELECTIONNER LA REQUETE</label>
                        <select class="form-control" name="quest" required="" >
                          <option value="">Selectionner</option> 
                          @foreach($quests as $quest)
                          <option value="{{$quest->id}}">{{$quest->description}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <p class="text-center"><button class="btn btn-primary" type="submit"> ENVOYER LA REQUETE</button></p>
                      </div>

                    </div>
                  </div>
                  <br>

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
      <th class="text-center">DEMANDE</th>
      <th class="text-center">DATE D'ENVOI</th>
      <th class="text-center">SITUATION</th>
    </tr>
  </thead>

  <tbody>
    @foreach($squests as $squest)
    <tr>
      <?php $demande= $quests->where('id',$squest->quest_id)->first(); ?>
      <td class="text-center">{{$demande->description}}</td>

      <td class="text-center"><?php $date=Carbon::parse($squest->created_at, 'UTC');?>   
      {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}
      </td>

      <td class="text-center"><p class="@if($squest->state == 0) badge badge-dark @else ($squest->state == 2) badge badge-success @endif " style="font-size: 15px">
      @if($squest->state == 0) En cours de traitement... @else ($squest->state == 2) Disponible  @endif </p>
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
