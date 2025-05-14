@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>

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
            <li class="breadcrumb-item " aria-current="page">Notifications</li>
            <li class="breadcrumb-item active" aria-current="page">
            @if($q =='RESSOURCE') Ressource 
            @elseif($q =='MARK') Note 
            @elseif($q =='BDE')  BDE
            @elseif($q =='CALENDAR') Calendrier
            @elseif($q =='NEWS') Actualités
            @elseif($q =='TEST') Test (Exercice)
            @elseif($q =='FORUM') Forum
            @endif
          </li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          @foreach($ltns as $ltn)
          <div class="callout 
          @if($ltn->type =='RESSOURCE') callout-info 
          @elseif($ltn->type =='MARK') callout-warning 
          @elseif($ltn->type =='BDE')  callout-danger
          @elseif($ltn->type =='CALENDAR') callout-success
          @elseif($ltn->type =='NEWS')
          @elseif($ltn->type =='TEST')callout-test
          @elseif($ltn->type =='FORUM')callout-forum
          @elseif($ltn->type =='MESSAGE')callout-info
          @endif" style="@if($ltn->state=='read') background-color:#f50d0d1c; @endif" >
          
          @if($ltn->type =='RESSOURCE')<h5><b>Ressource</b>  
         <?php $ressource=$ressources->where('id',$ltn->reference)->first(); ?> 

           <a href="/student/<?php if(!is_null($ressource->teacher_id)){echo 'materiel';}else{echo 'standard';}?>?q={{$ltn->reference}}&k=clicked#R{{$ltn->reference}}"> (voir la ressource)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='MARK')<h5><b>Note</b>  <a href="/student/mark?k=clicked"> (voir les notes)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='BDE')<h5><b>Bureau des Etudiants</b>   
           <a href="/student/schoolBde#B{{$ltn->reference}}?k=clicked"> (voir l'actu BDE)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='CALENDAR')<h5><b>Calendrier</b>   
           <a href="/student/calendar#C{{$ltn->reference}}?k=clicked"> (voir le calendrier)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='NEWS')<h5><b>Infos School</b>   
           <a href="/student/schoolNews#N{{$ltn->reference}}?k=clicked"> (voir l' infos)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='TEST')<h5><b>Exercice (Test)</b>   
           <a href="/student/homework#H{{$ltn->reference}}?k=clicked"> (voir l'Exercice (Test))</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='FORUM')<h5><b>Forum</b>   
           <a href="/student/forum?q={{$ltn->reference}}&k=clicked#F{{$ltn->reference}}"> (voir le sujet)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='QUIZ')<h5><b>Question</b>   
           <a href="/student/quiz?q={{$ltn->reference}}&k=clicked#Q{{$ltn->reference}}"> (voir la Qs/Rs)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          @if($ltn->type =='MESSAGE')<h5><b>Message</b>   
           <a href="/student/message?q={{$ltn->reference}}&k=clicked#F{{$ltn->reference}}"> (voir le message)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
          @endif

          <p>{{$ltn->label}} </p>
          </div>
          @endforeach

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection

