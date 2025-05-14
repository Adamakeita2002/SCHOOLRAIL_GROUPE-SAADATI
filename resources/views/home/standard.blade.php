@extends ('layouts.master')


@section ('content')
  
  <?php $materiel="activve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebar')
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
