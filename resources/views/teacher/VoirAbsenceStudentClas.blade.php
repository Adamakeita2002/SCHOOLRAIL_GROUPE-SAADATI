@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>
  <?php $q=$_GET["q"] ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
          </ol>
        </nav>

        <div class="container-fluid">
              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
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
              @if (session('status3'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status3') }}<br></b>
                      </div>
                  </div>
              @endif
      @foreach ($subjects as $subject)
        <div class="row">

            <div class="col-sm-12">

              <!-- Side Widget -->
              <div class="card">
          <h4 class="card-header text-white" style="background-color: #1f9924;">{{$subject->name}} </b> - {{$subject->classroom->name}}</h4>
                    <!-- Button trigger modal -->

                <div class="card-body ">
                @foreach ($subject->absences as $absence)
                
                  <?php $date=Carbon::parse($absence->absence_date, 'UTC');?>   

        <h5>
<b>{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}</b>
<a class="btn btn-danger btn-sm" data-toggle="modal" href="#R{{$absence->id}}" data-target="#R{{$absence->id}}"><b>SUPPRIMER <i class="icon-trash"></i></b></a>
        </h5>

              <!-- Modal -->
              <div class="modal fade" id="R{{$absence->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/teacher/DeleteAbsence') }}" method="post" enctype="multipart/form-data" id="theform3">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE LISTE D'ABSENCE <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">
        <h4> <b>{{$subject->name}} - {{$subject->classroom->name}} </b> à la date du <b>{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}}</b></h4> 
          

                    <input type="hidden" class="form-control" name="id" id="id" value="{{$absence->id}}" hidden="">
                    <input type="hidden" value="{{$q}}" name="classroom_id">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token"> 

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LA LISTE <i class="icon-trash"></i>
                  </button>
              
                  </div>

                </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                  </div>

                  </div>
                </div>
                </form>
<script type="text/javascript">
  $(function()
{
  $('#theform3').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
              </div>
              <!--End Modal --> 
                    @foreach ($absence->students as $student)
            <span class="badge badge-warning"><b> {{$student->name}} {{$student->surname}} </b></span>
                    @endforeach
                    <hr>
                @endforeach

                </div>

              </div>

            </div> <!--End sm6 -->

        </div> <!--End row -->
        <hr>

      @endforeach


        </div>


      </div>
    </div>
  </div>


@endsection
