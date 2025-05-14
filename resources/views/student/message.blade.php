@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $message="activve" ;?>
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

<!--

<div class="col-sm-4">
        <div class="callout callout-warning">


        <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/llogo-zoom.png" alt="Card image" style="width:130px; padding-top: 5px">
        <p class="text-center mt-2" ><a class="btn btn-primary" href="https://www.zoom.us" target="_blank" ><b>TELECHARGER ZOOM</b></a></p>

  <p>POUR ASSISTER AUX VIDEO-CONFERENCE, TELECHARGER ZOOM SUR <b>PLAYSTORE(POUR ANDROID)</b> OU SUR <b>APPLE STORE (POUR IPHONE)</b>  </p>
        </div>
</div>

-->

          @foreach($smsgs as $smsg)

          <p class="text-center">
            <small class="text-secondary">
              <?php
               $date=Carbon::parse($smsg->created_at, 'UTC');?>
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}
            </small>
          </p>

          <div class="message-sent">
            <!--<img src="@@webRoot/assets/img/john-doe.png">-->
            <p>
              <b>{{$smsg->title}}</b><br>
              {{$smsg->description}}
              <br><small style="color:#fff"><b><i>{{$smsg->created_at->diffForHumans()}}</i></b></small>
            </p>
          </div>
          <hr>
          @endforeach

          <!-- EMPTY HANDLER -->
          @if($smsgs->count() <= 0 )
          <p class="text-center">
            <button class="btn btn-danger"> Vous n'avez aucun message </button>
          </p>
          @endif
          <!-- END EMPTY HANDLER -->

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
