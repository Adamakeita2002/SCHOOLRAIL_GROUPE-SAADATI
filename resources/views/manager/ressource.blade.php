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
      @include('layouts.sidebarM')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarM')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Standard</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

      <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xressource.jpg" alt="Card image" style="width:260px; padding-top: 20px">
      <br>

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

       <div class="col-md-12">

          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-document-tab" data-toggle="pill" href="#pills-document" role="tab" aria-controls="pills-document" aria-selected="true">Mettre un document en ligne</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-lien-tab" data-toggle="pill" href="#pills-lien" role="tab" aria-controls="pills-lien" aria-selected="false">Mettre un lien en ligne</a>
            </li>
          </ul>

          <!--START TAB FULL CONTENT -->
          <div class="tab-content" id="pills-tabContent">

            <!--START TAB DOCUMENT -->
            <div class="tab-pane fade show active" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab">

            <form  action="/manager/CreateRessourceDocument" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <div class="row">
                <div class="col-sm-6">
                <label><b>SELECTIONNER LES CLASSES</b></label><br>
                @if($classrooms1->count() >= 1)
                <p class="text-center" style="color: #c22e6d"><b>Crèche</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms1 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms2->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Primaire</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms2 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms3->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>College</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms3 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                 </div>
                @if($classrooms4->count() >= 1)
                <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master I</b></p>
                @endif
                <div class="row">
                  @foreach ($classrooms4 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms4->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master II</b></p>
                @endif
                <div class="row">
                  @foreach ($classrooms5 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                  </div>
                </div>

                <div class="col-sm-6">
                  <label><b>SELECTIONNER LE DOCUMENT</b></label>
                  <div class="form-group">
                   <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>-->
                    <input type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation , text/plain, application/pdf" class="btn btn-secondary" name="upload_file" required>
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
                      Créer une ressource standard
                    </button>
                  </div>
                </div>

              </div><!--END ROW-->




                  </form>
              </div>
              <!--END TAB DOCUMENT -->


              <!--START TAB LIEN -->
              <div class="tab-pane fade" id="pills-lien" role="tabpanel" aria-labelledby="pills-lien-tab">

              <form  action="/manager/CreateRessourceLien" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

              <div class="row">
                <div class="col-sm-6">
                <label><b>SELECTIONNER LES CLASSES</b></label><br>
                <p class="text-center" style="color: #c22e6d"><b>1ère Année</b></p>
                  <div class="row">
                  @foreach ($classrooms1 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms1->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>2ème Année</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms2 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms2->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Licence</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms3 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                 </div>
                @if($classrooms4->count() >= 1)
                <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master I</b></p>
                @endif
                <div class="row">
                  @foreach ($classrooms4 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms4->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master II</b></p>
                @endif
                <div class="row">
                  @foreach ($classrooms5 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                  </div>
                </div>

                <div class="col-sm-6">
                  <label><b>ENTRER LE LIEN</b></label>
                  <div class="form-group">
                    <input type="url" name="lien" required>
                    <small class="text-danger">Exemple: http://www.schoolrail.com</small>
                  </div>

                <div class="form-group">
                  <label><b>Entrer un titre à ce lien</b></label>
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
                      Créer une ressource standard
                    </button>
                  </div>
                 </div>
               </div>
                  </form>

                  </div>
                  <!--END TAB LIEN -->

              </div>
              <!--START TAB FULL CONTENT -->

            </div>
<hr>
         <!--   <div class="col-md-4">

            <div class="callout callout-warning">
              <h5>Champ obligatoire <i class="icon-pin"></i></h5>
              <p>Vous devez imperativement remplir tous les champs, pour que le document soit ajouté à la bibliothèque numérique</p>
            </div>

            <div class="callout callout-warning">
              <h5>Le document <i class="icon-pin"></i></h5>
              <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
              <p>Le document ne doit pas dépasser la taille de 5Mo</p>
            </div>

            <div class="callout callout-warning">
              <h5>Le tableau ci dessous <i class="icon-pin"></i></h5>
              <p>Vous avez une illustration des documents que vous avez mis en ligne dans le tableau ci-dessous</p>
            </div>

            </div> -->

              </div>


<hr>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
