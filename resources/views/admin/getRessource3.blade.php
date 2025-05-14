<?php use Carbon\Carbon;?>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">


            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">RESSOURCES DES PROFESSEURS EN LIGNE </th>
                <th scope="col">DESCRIPTIONS</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($teacher->ressources->where('academicyear_id',academicyearP->id)->sortByDesc('created_at') as $ressource)
              <tr>
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
                <b>{{$ressource->teacher->name}} {{$ressource->teacher->surname}}</b> <br>
                <p> {{$ressource->description}}</p>
                <p><b>Titre du document: </b> {{$ressource->title}} <br>
                <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                {{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}<br>
                <b>Classe(s):</b>
                @foreach ($ressource->classrooms as $classroom)
                {{$classroom->name}} -
                @endforeach
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
                <form action="{{ URL::to('/kuro/admin/DeleteRessource') }}" method="post" enctype="multipart/form-data">

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
              </div>
              <!--End Modal -->
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>




        </div>

        @if($teacher->ressources->where('academicyear_id',academicyearP->id)->count() <= 0 )
        <p class="text-center">
          <button class="btn btn-danger"> AUCUNE RESSOURCE EN LIGNE POUR CE PROFESSEUR  </button>
        </p>
        @endif

        <hr>

      </div> <!-- END container-fluid -->
