@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $materiel="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Ressources Standards</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="table-responsive">

            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col"><p class="text-center">Ressources disponibles</p></th>
                <th scope="col"><p >Descriptions</p></th>
              </tr>
            </thead>
            <tbody>

            @foreach ($ressources as $ressource)
              <tr id="R{{$ressource->id}}">
                <td><p class="text-center">
                  @if($ressource->extension == "pdf") <i class="fa fa-file-pdf-o text-danger" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif($ressource->extension == "doc" OR $ressource->extension == "docx") <i class="fa fa-file-word-o text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "xls" OR  $ressource->extension == "xlsx") <i class="fa fa-file-excel-o text-success" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "ppt" OR $ressource->extension == "pptx") <i class="fa fa-file-powerpoint-o text-warning" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "txt") <i class="fa fa-file-text-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @elseif ($ressource->extension == "url") <i class="fa fa-link text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  @else <i class="fa fa-file-file-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
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
                  @else DOCUMENT
                  @endif
                 </b>
                 </p>

                </td>
                <td>

                <p> {{$ressource->description}}</p>
                <p><b>Titre du document: </b> {{$ressource->title}}</p>


                  <div class="btn-group">
                    @if ($ressource->extension == "url")
                    <a href="{{$ressource->lien}}" class="btn btn-primary mr-2" target="_blank" >ACCEDER <i class="fa fa-globe" aria-hidden="true"></i></a>
                    @else
                    <a href="/files/ressource/standard/{{$ressource->upload}}" class="btn btn-success mr-2" download="{{$ressource->upload}}"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>




        </div>

        @if ($ressources->count() <=0)

        <h2 class="text-center text-danger"> AUNCE RESSOURCE STANDARD DISPONIBLE POUR L'INSTANT</h2>

        @endif

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
