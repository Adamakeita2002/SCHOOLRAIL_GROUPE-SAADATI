@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $ressource="activve" ;?>
<!-- CHECK BOX HANDLER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>
<!--END CHECK BOX HANDLER -->

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
            <li class="breadcrumb-item " aria-current="page">Ressources</li>
            <li class="breadcrumb-item active" aria-current="page">Par élève</li>
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

  <h6 class="my-4 text-center">LISTE DES ELEVES DE LA CLASSE <b>{{$classroom->name}}</b></h6>

<hr>

@if (!empty($classroom->students))


            <form  action="/teacher/CreateRessourceDocumentStudent" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

<div class="row">

          <div class="col-sm-5">

                <div class="form-group">
                  <label><b>Entrer un titre à cette ressource</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>
                  <label><b>Sélectionner le document</b></label>
                  <div class="form-group">
                   <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>-->
                    <input type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation , text/plain, application/pdf, .jpg, .jpeg, .png" class="btn btn-secondary" name="upload_file" required>
                  </div>
          </div>

          <div class="col-sm-6">


                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>




        </div>

</div>
                <!--  </form>    -->

<hr>



  @foreach($classroom->students as $student)
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #26bc2c">
        <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
          <h4 class="card-title text-center " style="color:white;">
           {{$student->name}} {{$student->surname}}
          </h4>
          <hr>
          <h4 class="card-title text-center " style="color:white;">
           <b>{{$student->matricule}}</b>
          </h4>
        </div>

      </div>

        <div class="col-sm-5">
          <div class="card-body">
            <h6 ><b> Classe :  </b>
              <span>{{$student->classroom->name}}</span>
            </h6>

          <hr>
                <h6 ><b> Email : </b>
                  <span>{{$student->email}}</span>
                </h6>
          <hr>
                <h6 ><b> Téléphone : </b>
                  <span>{{$student->tel}}</span>
                </h6>
          <hr>

                <h6 ><b> Adresse : </b>
                  <span>{{$student->address}}</span>
                </h6>

        <hr>
             <h6 ><b> Genre : </b>
              <span>@if($student->gender=='M') Masculin @elseif($student->gender=='F') Feminin  @endif</span>
            </h6>
        <hr>

          </div>
        </div>

        <div class="col-sm-5">
          <div class="card-body">

                  <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="student[]" required id="S{{$student->id}}" value="{{$student->id}}"/>
                          <span class="check-mark"></span>COCHEZ
                      </label>
                  </div>
                  <br>
                <h6 ><b> Ressources envoyées personnellement à cet élève : <br> </b>
          <?php // dd($student->ressources);  ?>
                @if ($student->ressources->count() >0 )
                  @foreach ($student->ressources as $ressource)
<a href="#" title="{{$ressource->description}}"><span class="text-center badge badge-primary" ><b>{{$ressource->title}}</b><br>
<i>{{$ressource->teacher->name}} {{$ressource->teacher->surname}}</i></span></a> ,
                  @endforeach
                @else
                <span class="text-danger"> <b>AUCUNE RESSOURCE ENVOYEE PERSONNELLEMENT A CET ELEVE</b></span>
                @endif
                </h6>

          </div>
        </div>

    </div>


    </div>
    <hr>
    @endforeach
                  <div class="form-group">
                   <p class="text-center"><button class="btn btn-success" name="submit" type="submit">
                     <b>Créer la ressource pour les élèves sélectionnés</b>
                    </button></p>
                  </div>
    <hr>
@else
<h3 class="text-danger text-center"><b>AUCUN ELEVE DANS CETTE CLASSE</b></h3>
@endif
</form>
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
