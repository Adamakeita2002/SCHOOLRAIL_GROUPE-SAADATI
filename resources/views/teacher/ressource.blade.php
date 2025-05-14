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
            <li class="breadcrumb-item active" aria-current="page">Par Classe</li>
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

          <div class="row">

      <div class="col-md-3">
        <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xressource.jpg" alt="Card image" style="width:260px; padding-top: 20px">
      </div>

       <div class="col-md-5">

          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-document-tab" data-toggle="pill" href="#pills-document" role="tab" aria-controls="pills-document" aria-selected="true">Mettre un document en ligne</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-lien-tab" data-toggle="pill" href="#pills-lien" role="tab" aria-controls="pills-lien" aria-selected="false">Mettre un lien en ligne</a>
            </li>
          </ul>

          @if($teacher->subjects->count() >=1)
          <!--START TAB FULL CONTENT -->
          <div class="tab-content" id="pills-tabContent">

            <!--START TAB DOCUMENT -->
            <div class="tab-pane fade show active" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab">

            <form  action="/teacher/CreateRessourceDocument" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <label><b>Sélectionner la classe</b></label>
                  <?php
                      for ($i=0; $i < count($UniqueClassrooms); $i++) { ?>
                  <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="c{{$classrooms->where('name',$UniqueClassrooms[$i])->pluck('id')->first()}}" value="{{$classrooms->where('name',$UniqueClassrooms[$i])->pluck('id')->first()}}"/>
                          <span class="check-mark"></span>{{$UniqueClassrooms[$i]}}
                      </label>
                  </div>
                  <?php
                  }
                  ?>

                  <label><b>Sélectionner le document</b></label>
                  <div class="form-group">
                   <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>-->
                    <input type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation , text/plain, application/pdf, .jpg, .jpeg, .png" class="btn btn-secondary" name="upload_file" required>
                  </div>

                <div class="form-group">
                  <label><b>Entrer un titre a cette resource</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>



                  <div class="form-group">
                    <button class="btn btn-success" name="submit" type="submit">
                      Créer une ressource
                    </button>
                  </div>

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
              <!--END TAB DOCUMENT -->


              <!--START TAB LIEN -->
              <div class="tab-pane fade" id="pills-lien" role="tabpanel" aria-labelledby="pills-lien-tab">

              <form  action="/teacher/CreateRessourceLien" method="post" enctype="multipart/form-data" id="theform2">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <label><b>Sélectionner la classe</b></label>
                  <?php
                      for ($i=0; $i < count($UniqueClassrooms); $i++) { ?>
                  <div class="form-group options">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" required name="classroom[]" id="c{{$classrooms->where('name',$UniqueClassrooms[$i])->pluck('id')->first()}}" value="{{$classrooms->where('name',$UniqueClassrooms[$i])->pluck('id')->first()}}"/>
                          <span class="check-mark"></span>{{$UniqueClassrooms[$i]}}
                      </label>
                  </div>

                  <?php
                  }
                  ?>

                  <label><b>Entrer le lien</b>
                    <small class="text-danger"> <b>(Exemple: http://www.schoolrail.com)</b> </small>
                  </label>
                  <div class="form-group">
                    <input type="url" name="lien" class="form-control" required>

                  </div>

                <div class="form-group">
                  <label><b>Entrer un titre a cette resource</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>



                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Créer une ressource
                    </button>
                  </div>

                  </form>
<script type="text/javascript">
  $(function()
{
  $('#theform2').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
                  </div>
                  <!--END TAB LIEN -->

              </div>
              <!--START TAB FULL CONTENT -->

              @endif

            </div>

            <div class="col-md-4">

            <div class="callout callout-warning">
              <h5>Consignes <i class="icon-pin"></i></h5>
              <p>Vous devez imperativement remplir tous les champs, pour que le document soit ajouté à la bibliothèque</p>
              <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
              <p>Le document ne doit pas depasser la taille de 5Mo</p>
              <p>Vous avez une illustration des documents que vous avez mis en ligne dans le tableau ci-dessous</p>
            </div>

            <div class="callout callout-warning">
                <div class="row">
                    <div class="col-sm-6">
                    <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/logo-loom.png" alt="Card image" style="width:120px; padding-top: 5px">
                    <p class="text-center mt-2" ><a class="btn btn-danger" href="https://www.loom.com" target="_blank" ><b>loom</b></a></p>
                    </div>
                    <div class="col-sm-6">
                    <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/llogo-zoom.png" alt="Card image" style="width:130px; padding-top: 5px">
                    <p class="text-center mt-2" ><a class="btn btn-primary" href="https://www.zoom.us" target="_blank" ><b>zoom</b></a></p>
                    </div>
                </div>
                <br>
              <p>Ayez recours aux outils de vidéo en ligne <b><span class="text-danger" >(loom)</span></b> et de video conférence <b><span class="text-primary" >(zoom)</span></b>  </p>
            </div>
<!--
            <div class="callout callout-warning">
              <h5>Le document <i class="icon-pin"></i></h5>
              <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
              <p>Le document ne doit pas depasser la taille de 5Mo</p>
            </div>

            <div class="callout callout-warning">
              <h5>Le tableau ci dessous <i class="icon-pin"></i></h5>
              <p>Vous avez une illustration des documents que vous avez mis en ligne dans le tableau ci-dessous</p>
            </div>
-->
            </div>

              </div>


<hr>


        <div class="table-responsive">

            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Mes Ressources mises en ligne</th>
                <th scope="col">Descriptions</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($ressources as $ressource)
              <tr>
                <td><p class="text-center">
                  @if($ressource->extension == "pdf") <i class="fa fa-file-pdf-o text-danger" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif($ressource->extension == "doc" OR $ressource->extension == "docx") <i class="fa fa-file-word-o text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "xls" OR  $ressource->extension == "xlsx") <i class="fa fa-file-excel-o text-success" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "ppt" OR $ressource->extension == "pptx") <i class="fa fa-file-powerpoint-o text-warning" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "txt") <i class="fa fa-file-text-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "url") <i class="fa fa-link text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @else <i class="fa fa-file-image-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @endif
                  </p>

                  <p class="text-center" style="font-size:20px">
                  <b>
                  @if($ressource->extension == "pdf") DOCUMENT PDF
                  @elseif($ressource->extension == "doc" OR $ressource->extension == "docx") DOCUMENT WORD
                  @elseif ($ressource->extension == "xls" OR  $ressource->extension == "xlsx") DOCUMENT EXCEL
                  @elseif ($ressource->extension == "ppt" OR $ressource->extension == "pptx") DOCUMENT POWERPOINT
                  @elseif ($ressource->extension == "txt") DOCUMENT TEXT
                  @elseif ($ressource->extension == "url") LIEN EXTERNE
                  @else DOCUMENT ou IMAGE
                  @endif
                 </b>
                 </p>

                </td>
                <td>
                <p> {{$ressource->description}}</p>
                <p><b>Titre du document: </b> {{$ressource->title}} <br>
                <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}<br>

                @if($ressource->classrooms->count() > 0)
                <b>Classe(s):</b>
                @foreach ($ressource->classrooms as $classroom)
                {{$classroom->name}} -
                @endforeach
                @endif

                @if($ressource->students->count() > 0)
                <b>Elève(s):</b>
                @foreach ($ressource->students as $student)
                {{$student->name}} {{$student->surname}} <b>({{$student->classroom->name}})</b> -
                @endforeach
                @endif
                </p>

                  <div class="btn-group">
                    @if ($ressource->extension == "url")
                    <a href="{{$ressource->lien}}" class="btn btn-primary mr-2" target="_blank" >ACCEDER <i class="fa fa-globe" aria-hidden="true"></i></a>
                    @else
                    <a href="/files/ressource/{{$ressource->upload}}" class="btn btn-success mr-2" download="{{$ressource->upload}}"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#R{{$ressource->id}}">
                      SUPPRIMER <i class="icon-trash"></i>
                    </button>
                  </div>

              <!-- Modal -->
              <div class="modal fade" id="R{{$ressource->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/teacher/DeleteRessource') }}" method="post" enctype="multipart/form-data" id="theform3">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE RESSOURCE <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                    <p><b>Titre du document: </b> {{$ressource->title}} <br>
                    <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                    {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}<br>
                    <b>Classe(s):</b>
                    @foreach ($ressource->classrooms as $classroom)
                    {{$classroom->name}} -
                    @endforeach
                    </p>

                    <input type="hidden" class="form-control" name="id" id="id" value="{{$ressource->id}}" hidden="">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LA RESSOURCE <i class="icon-trash"></i>
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
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>




        </div>

        @if($ressources->count() <= 0 )
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucune ressource en ligne </button>
        </p>
        @endif

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
