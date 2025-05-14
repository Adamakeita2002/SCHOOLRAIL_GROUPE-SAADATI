@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>

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
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          @foreach($tltns as $ltn)
            <div class="callout @if($ltn->type=='MESSAGE') callout-info @endif " style="@if($ltn->state=='read') background-color:#f50d0d1c; @endif" >
            
              @if($ltn->type =='NEWS')<h5><b>Infos School</b>   
               <a href="/teacher/schoolNews#N{{$ltn->reference}}?k=clicked"> (voir l' infos)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
              @endif

              @if($ltn->type =='MESSAGE')<h5><b>Message</b>   
               <a href="/teacher/message#M{{$ltn->reference}}?k=clicked"> (voir le message)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
              @endif

              @if($ltn->type =='QUIZ')<h5><b>Question</b>   
               <a href="/teacher/quiz?q={{$ltn->reference}}&k=clicked#Q{{$ltn->reference}}"> (voir la Qs/Rs)</a><span class="pull-right" style="font-size: 12px"> <b><i>{{$ltn->created_at->diffForHumans()}}</i></b> </span></h5>
              @endif

            <p>{{$ltn->label}} </p>
            </div>
          @endforeach

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
