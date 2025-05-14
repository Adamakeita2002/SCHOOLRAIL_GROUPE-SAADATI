@extends ('layouts.master')


@section ('content')

  <?php $materiel="activvve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Standard</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

                  <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:260px; padding-top: 20px">
            </div>

            <div class="col-md-5">

                  <div class="form-group">
                    <label>Selectionner la classe</label>
                    <select class="form-control">
                      <option>Classe</option>
                      <option>IDA 1</option>
                      <option>Telecom 2</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>
                    <small class="text-secondary">Only .jpeg and .png and maximum 1MB.</small>
                  </div>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Filename</th>
                        <th>Size</th>
                      </tr>
                      <tr id="file-data" class="d-none">
                        <td class="align-middle">
                          <img id="file-preview" class="rounded d-none" width="64">
                          <span id="file-name"></span>
                          <i id="is-invalid" class="icon-close text-danger d-none"></i>
                          <i id="is-valid" class="icon-check text-success d-none"></i>
                        </td>
                        <td class="align-middle">
                          <span id="file-size"></span>
                        </td>
                      </tr>
                      <tr id="file-empty">
                        <td colspan="2" class="text-secondary">
                          Aucun fichier selectionné
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-success">
                      Créer une resource
                    </button>
                  </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">
                  <label>Entrer un titre a cette resource</label>
                  <input type="text" class="form-control">
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea rows="5" class="form-control"></textarea>
                  <small class="text-secondary">Maximum of 1000 characters.</small>
                </div>

            </div>


        </div>

<hr>

            <div class="form-group">
              <label>Rechercher une resource?</label>
              <div class="input-suggestion">
                <input id="my-input" type="text" class="form-control" data-toggle="suggestion" data-async>
                <div class="input-suggestion-list">
                  <div class="list-group loading">
                    <p class="list-group-item text-muted">Recherche...</p>
                  </div>
                  <div class="list-group empty">
                    <p class="list-group-item text-muted">Aucune resource trouvée</p>
                  </div>
                    <div class="list-group items">
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Apple, carrot, and orange</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Beet, carrot, ginger, and turmeric</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Homemade tomato juice</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Orange and grapefruit</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Pumpkin seed</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Spinach, lettuce, and kale</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Strawberry and mango</a>
                      <a href="#" class="list-group-item list-group-item-action" tabindex="-1">Strawberry-kiwi mint</a>
                    </div>
                </div>
              </div>
            </div>

        <div class="row">


            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Resources</th>
                <th scope="col">Descriptions</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td><p class="text-center"><i class="fa fa-file-pdf-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i></p>
                    <p class="text-center" style="font-size:20px"><b>DOCUMENT PDF</b></p>

                </td>
                <td><p>Ce livre contient les bases de la programmation en Java,Ce livre contient les bases de la programmation en Java,Ce livre contient les bases de la programmation en Java,Ce livre contient les bases de la programmation en Java,Ce livre contient les bases de la programmation en Java,Ce livre contient les bases de la programmation en Java|</p>
                <p><b>Titre du document: </b> Developpement Java <br>
                <b>Date d'Emission: </b> 20/07/19
                </p>
                <p><button class="btn btn-success">Télécharger</button></p>
                </td>
              </tr>

              <tr>
                <td><p class="text-center"><i class="fa fa-link" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i></p>
                    <p class="text-center" style="font-size:20px"><b>LIEN EXTERNE</b></p>

                </td>
                <td><p>Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap,Ce lien contient les bases de Bootstrap</p>
                <p><b>Titre du lien: </b> Le site officiel de Bootstrap <br>
                <b>Date d'Emission: </b> 20/07/19
                </p>
                <p><button class="btn btn-primary">Acceder</button></p>
                </td>
              </tr>

              <tr>
              <td><p class="text-center"><i class="fa fa-file-word-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i></p>
                    <p class="text-center" style="font-size:20px"><b>DOCUMENT WORD</b></p>

                </td>
                <td><p>Ce livre contient les bases de la programmation en C++,Ce livre contient les bases de la programmation en C++,Ce livre contient les bases de la programmation en C++,Ce livre contient les bases de la programmation en Java,Ce livre contient les bases de la programmation en C++,Ce livre contient les bases de la programmation en C++|</p>
                <p><b>Titre du document: </b> Developpement C++ <br>
                <b>Date d'Emission: </b> 20/07/19
                </p>
                <p><button class="btn btn-success">Télécharger</button></p>
                </td>
              </tr>

            </tbody>
          </table>




        </div>

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
