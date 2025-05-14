@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $school="activvve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Actualités</li>
            <li class="breadcrumb-item " aria-current="page">BDE</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
<!--
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

              @include ('layouts.errors')

            <form  action="/manager/CreateSchoolNews" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <div class="form-group">
                  <label><b>Entrer le titre de l'actualité</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <small class="text-danger">100 mots maximum</small>
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>

                  <div class="form-group">

                      <label class="btn btn-primary" for="my-file-selector">
                      <input id="my-file-selector" type="file" style="display:none;" name="upload_file"
                      onchange="$('#upload-file-info').html(this.files[0].name)" accept="image/*" >
                      Selectionner une image
                      <i class="fa fa-camera" style="font-size: 15px"></i>
                      </label><br>
                      <span class='badge badge-warning' id="upload-file-info">Aucune image selectionnée</span>
                      <small class="text-secondary">Taille recommandée (700/500).</small>


                  </div>

                  <div class="form-group">
                    <button class="btn btn-bordo" type="submit">
                      Créer l'actualité
                    </button>
                  </div>

              </form>

              </div>

                <div class="col-md-4">

                  <div class="callout callout-warning">
                    <h5>Champ obligatoire <i class="icon-pin"></i></h5>
                    <p>Vous devez imperativement remplir tous les champs, pour que le document soit ajouté à la bibliothèque</p>
                    <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
                    <p>Le document ne doit pas depasser la taille de 5Mo</p>
                  </div>

                </div>


        </div>

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

<hr>
-->

<!-- NEWS ACTUALITES -->

  <div class="row justify-content-md-center">

      <!-- Blog Entries Column offset-md-1 -->
      <div class="col-md-7 ">

        <h1 class="my-4 card-header text-center bg-primary text-white">INFOS BDE</h1>

        <!-- Blog Post -->

        @foreach ($news as $new)
        <div class="card mb-4">

          <div class="card-body">
            <h2 class="card-title">{{$new->title}}</h2>
            <p class="card-text">{{$new->description}}</p>
          </div>
          @if(!empty($new->upload))
          <img class="card-img-top" src="/files/schoolNews/{{$new->upload}}" alt="IMAGE">
          @endif
          <div class="card-footer text-muted">
            <p>- Posté il y a <b>{{$new->created_at->diffForHumans()}}</b></p>
          </div>
        </div>
        @endforeach

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

            <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Mot du Président du BDE</h5>
            <img class="rounded-circle mt-4 mx-auto d-block" alt="directeur" width="200" height="200" src="/assets/img/john-doe.png" alt="Card image">
            <div class="card-body">
              <h4 class="card-title text-center">{{$studentP->name}} {{$studentP->surname}}</h4>
              <p class="card-text">{{$studentP->Pmessage}}</p>
            </div>
        </div>


      </div>

    </div>
    <!-- /.row -->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

            <script type="text/javascript">

            window.addEventListener("DOMContentLoaded", function(e) {

              var form_being_submitted = false;

              var checkForm = function(e) {
                var form = e.target;
                if(form_being_submitted) {
                  alert("Inscription en cours, Veuillez patienter...");
                  form.submit_button.disabled = true;
                  e.preventDefault();
                  return;
                }
                form.submit_button.value = "Inscription en cours";
                form_being_submitted = true;
              };

              document.getElementById("inscription").addEventListener("submit", checkForm, false);

            }, false);

            </script>

@endsection
