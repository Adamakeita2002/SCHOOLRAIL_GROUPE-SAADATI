@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $timetable="activve" ;?>


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
            <li class="breadcrumb-item " aria-current="page">Programmation</li>
            <li class="breadcrumb-item active" aria-current="page">Cahier de texte</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-danger text-center">
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



<hr>

            <form  action="/teacher/CreateCahier" method="post" id="theform3" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

<div class="row">
    
          <div class="col-sm-5">

                  <div class="form-group">
                    <label>Classe / Matière</label>
                    <select class="form-control" name="subject_id" required>
                      <option value="">Classe et Matière</option>
                      @foreach ($teacher->subjects as $subject)
                      <option  value="{{$subject->id }}">
                        {{$subject->classroom->name}} / {{$subject->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  

                <div class="form-group">
                  <label><b>Entrer la date</b></label>
                  <input type="date" name="date" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>
          </div>

          <div class="col-sm-6">

                <div class="form-group">
                  <label><b>Entrer un titre</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="content" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>


                  <div class="form-group">
                   <p class="text-center"><button class="btn btn-success" name="submit" type="submit">
                     <b>Valider</b> 
                    </button></p> 
                  </div>

          </div>

</div>
    
    </form>   

<hr>

<h2 class="text-center"><b>CAHIER DE TEXTE</b> </h2>

        <div class="table-responsive">
     
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">Matière / Titre</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
                
              </tr>
            </thead>
            <tbody>

            @foreach ($teacher->cahiers as $cahier)
              <tr> 
                <td>
                    <p> <b>{{$cahier->subject->name}} </b> <br> 
                    {{$cahier->title}} </p>
                    
                </td>
                
                <td>
                    {{$cahier->content}}
                </td>
                
                <td>
                  <?php $cahier->date = Carbon::now()->locale('fr_FR'); 
                   echo $cahier->date->isoFormat('dddd DD MMMM YYYY'); 
                  ?>
                </td>
                
                <td>

                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#R{{$cahier->id}}">
                      SUPPRIMER <i class="icon-trash"></i>
                    </button>
                  </div>

              <!-- Modal -->
              <div class="modal fade" id="R{{$cahier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/teacher/DeleteCahier') }}" method="post" enctype="multipart/form-data" id="theform3">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CET ENREGISTREMENT <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                    <p>
                        <b>Titre du document: </b> {{$cahier->title}} <br>
                    </p>

                    <input type="hidden" class="form-control" name="id" id="id" value="{{$cahier->id}}" hidden="">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token"> 

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER CET ENREGISTREMENT <i class="icon-trash"></i>
                  </button>
              
                  </div>

                </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                  </div>

                  </div>
                </div>
                </form>


                </td>
                
              </tr>
            @endforeach

            </tbody>
          </table>




        </div>

        @if($teacher->cahiers->count() <= 0 ) 
        <p class="text-center">
          <button class="btn btn-danger"> Non Disponible </button>
        </p>
        @endif

            

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
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection