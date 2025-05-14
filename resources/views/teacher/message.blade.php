@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $message="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Messages</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">

<div class="chat">
  <div class="chat-body">
    <div class="chat-content">
      <div class="chat-messages">
        <div class="container-fluid">


          @foreach($tmsgs->sortByDesc('created_at') as $tmsg)

          <p class="text-center">

            <small class="text-secondary">
              <?php 
               $date=Carbon::parse($tmsg->created_at, 'UTC');?>   
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}                     
            </small>
          </p>

          <div class="message-sent">
            <!--<img src="@@webRoot/assets/img/john-doe.png">-->
            <p style="background-color: #26bc2c">
              <b>{{$tmsg->title}}</b><br>
              {{$tmsg->description}}
              <br><small style="color:#fff"><b><i>{{$tmsg->created_at->diffForHumans()}}</i></b></small>
            </p>
          </div>
          <hr>
          @endforeach

        @if ($tmsgs->count() <=0)

        <p class="text-center">
          <button class="btn btn-danger"> AUCUN MESSAGE RECU </button>
        </p>

        @endif

        </div>
      </div>
    </div>
  </div>

  <br>
  <hr>

<!--
  <div class="chat-footer">

    </div>
-->

</div>



        </div>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
