        <?php use Carbon\Carbon;?>

  <div class="row">
   <!-- START COL-4
    <div class="col-sm-4">-->
    <!-- CLASSROOM -->
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card ">
        <div class="card-body" style="background-color: #c22e6d">
          <h2 class="card-title text-center mt-2" style="color:white;">
           {{$classroom->name}}
          </h2>
        </div>
        <div class="card-body">
          <p class="card-text text-center text-success" style="font-size: 70px">
            <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xclassroom.jpg" alt="Card image" width="60" height="60">
          </p>
          <h4 class="card-title text-center">
          {{$classroom->program->levelVar}} <br> {{$classroom->program->fullname}}
          </h4>

            <hr>
            <div class="row" >
              <div class="col-sm-6">
                <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
              <span><!-- START Edit classroom -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MMC{{$classroom->id}}" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit classroom -->
                <div class="modal fade" id="MMC{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/kuro/admin/modifyClassroom1') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette classe
                            <b>{{$classroom->name}}</b>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>

                      <div class="form-group">
                        <label><b>Nom de la classe</b></label>
                        <input type="text" class="form-control" placeholder="{{$classroom->name}}" name="name" id="sample1" required>
                        <small class="text-danger">Ex: GESTION COMMERCIALE = GESCOM </small>
                      </div>


                        <div class="form-group">
                          <label><b>Entrer le niveau</b></label>
                          <select class="form-control" required name="level" >
                            <option value="">Re-confirmer le niveau de la classe</option>
                            <option value="1">1ère Année</option>
                            <option value="2">2ème Année</option>
                            <option value="3">Licence Professionnelle</option>
                            <option value="4">Master I</option>
                            <option value="5">Master II</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label><b>Code de la classe</b></label>
                          <input type="text"  placeholder="Re-confirmer le code si besoin" class="form-control" name="code" id="sample3" placeholder="A ou B...">
                          <small class="text-danger">Le code permet de differencier deux ou plusieurs classes ayant le meme programme  </small>
                          <small class="text-danger">GESCOM 1 A, GESCOM 1 B, GESCOM 1 C...  </small>
                        </div>

                        <div class="form-group">
                          <label>Programme de la classe</label>
                        <select class="form-control" name="program_name" id="sample4" required>
                          <option value="">Re-confirmer le programme de la classe</option>
                          @foreach ($programs as $program)
                          <option value="{{$program->name}}" >{{$program->fullname}} : {{$program->name}} </option>
                          @endforeach
                        </select>
                        </div>


                        <input type="hidden" class="form-control" name="id" value="{{$classroom->id}}" hidden="">
                      <button type="submit" class="btn btn-warning text-white">
                        Valider la modification
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
              </span><!-- END Edit classroom -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete classroom -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MDC{{$classroom->id}}" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete classroom -->
                <div class="modal fade" id="MDC{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ URL::to('/kuro/admin/deleteClassroom1') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="{{ csrf_token() }}" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'un classroomme d'étude</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CE CLASSE?</p>
                        <h4 class="card-title text-center">
                        {{$classroom->name}}
                        </h4>

                        <input type="hidden" class="form-control" name="id" value="{{$classroom->id}}" hidden="">
                      <button type="submit" class="btn btn-danger">
                        Valider la suppression
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
                  </span><!-- END Edit classroom -->
                </div>

                </div>

              </div>
            </div>
          </div>
      <!-- END CARD
          </div> -->
      <!-- END COL-4 -->
          <div class="col-sm-8">

          <div class="accordion pt-2 pb-2" id="accordionExample{{$classroom->id}}">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne{{$classroom->id}}">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne{{$classroom->id}}" aria-expanded="true" aria-controls="collapseOne{{$classroom->id}}">
                <b>{{$classroom->program->fullname}}  {{$classroom->program->levelInt}} -  {{$classroom->name}}</b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne{{$classroom->id}}" class="collapse" aria-labelledby="headingOne{{$classroom->id}}" data-parent="#accordionExample{{$classroom->id}}">

            <div class="card-body">

            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MATRICULE</th>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($classroom->students as $student)
              <tr>
                <td><b>{{$student->matricule}}</b></td>
                <td><b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?>
                <td>{{$student->dateofbirth}} - <b>({{$years}} ans)</b></td>

                <td>{{$student->tel}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

                  <!-- NOTE TOGGLE -->
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample{{$classroom->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$classroom->id}}">
                      PLUS D'INFOS <b>({{$classroom->name}})</b>
                    </a>
                  </p>

              <div class="collapse" id="collapseExample{{$classroom->id}}">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">EFFECTIF</h3>
                      <h1 class="text-center">{{$classroom->students->count()}}</h1>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">HOMMES</h3>
                      <h1 class="text-center">{{$classroom->students->where('gender','M')->count()}}</h1>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">FEMMES</h3>
                      <h1 class="text-center">{{$classroom->students->where('gender','F')->count()}}</h1>
                    </div>
                  </div>
                </div>

              </div>
                  <!-- NOTE TOGGLE -->

                </div>

              </div>
            </div>

          </div>

          </div>
        </div>


