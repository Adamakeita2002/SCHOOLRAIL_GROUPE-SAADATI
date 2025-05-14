        <?php use Carbon\Carbon;?>

        @foreach ($students->sortBy('name') as $student)
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d">
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
            <h4 class="card-title " ><b> Classe :  </b>
              <span>{{$student->classroom->name}}</span>
              @if( empty($student->classroom_id))
              <span class="text-danger"> <b>Aucune Classe</b></span>
              <span>
              <a class="btn btn-primary" href="/manager/affectStudent">
              AFFECTER
              </a>
            </span>
              @endif
            </h4>

        <hr>
              <h4 class="card-title " ><b> Nationalité :  </b>
                <span>{{$student->nationality}}</span>
              </h4>
        <hr>
              <h4 class="card-title " ><b> Age : </b>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?>
                <span>{{$years}}</span>
              </h4>
        <hr>
             <h4 class="card-title " ><b> Genre : </b>
              <span>@if($student->gender=='M') Masculin @elseif($student->gender=='F') Feminin  @endif</span>
            </h4>


          </div>
        </div>


          <div class="col-sm-5">
            <div class="card-body">
                <h4 class="card-title " ><b> Email : </b>
                  <span>{{$student->email}}</span>
                </h4>
          <hr>
                <h4 class="card-title " ><b> Téléphone : </b>
                  <span>{{$student->tel}}</span>
                </h4>
          <hr>

                <h4 class="card-title " ><b> Adresse : </b>
                  <span>{{$student->address}}</span>
                </h4>
          <hr>


          </div>
        </div>

    </div>



  <div class="card-body">

<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

  <div class="row">

    <div class="col-sm-6"><!-- COL 6 -->

      <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM3{{$student->id}}" ><b>MODIFIER</b></button></p> <!-- MODIFY BUTTON -->

    <!-- Modal Edit student -->
    <div class="modal fade" id="MM3{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit student -->
    <form action="{{ URL::to('/manager/modifyStudent') }}" method="post" enctype="multipart/form-data">
      <!--EDIT FORM-->
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant cet étudiant
                <b>{{$student->name}} {{$student->surname}}</b>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

        <div class="modal-body"> <!--MODAL BODY -->
          <div class="text-center">
          <p>Modifier la correction:</p>

            <div class="row"> <!--MODAL ROW -->

              <div class="col-sm-6">

                  <div class="form-group">
                    <label><b>Modifier le nom de l' étudiant</b></label>
                    <input type="text" name="name" placeholder="{{$student->name}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier le prénom(s) de l' étudiant</b></label>
                    <input type="text" name="surname" placeholder="{{$student->surname}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Date de naissance de l' étudiant {{$student->dateofbirth}}</b></label>
                    <input type="date" name="dateofbirth" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier la nationalité de l' étudiant</b></label>
                    <input type="texte" name="nationality" placeholder="{{$student->nationality}}" class="form-control">
                  </div>

              </div>

              <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Modifier le genre</b></label>
                        <select class="form-control" name="gender">
                          <option value="">Genre ({{$student->gender}})</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'email de l' étudiant</b></label>
                        <input type="email" name="email" placeholder="{{$student->email}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier le contact de l' étudiant</b></label>
                        <input type="number" name="tel" placeholder="{{$student->tel}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'adresse de l' étudiant</b></label>
                        <input type="texte" name="address" placeholder="{{$student->address}}" class="form-control">
                      </div>


                      <input type="hidden" class="form-control" name="id" value="{{$student->id}}" hidden="">

              </div>

            </div> <!--END MODAL ROW -->

                <p class="text-center">
                      <div class="form-group">
                        <label><b>Modifier la classe</b></label>
                        <select class="form-control" name="classroom_id">
                          <option value="">{{$student->classroom->name}}</option>
                        @foreach ($classrooms as $classroom)
                          <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                        @endforeach

                        </select>
                      </div>
                </p>

              <p class="text-center">
                <button type="submit" class="btn btn-warning text-white"><b>Valider la modification</b></button>
              </p>

      </div>

    </div><!--END MODAL BODY -->

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
    </div>

      </div><!--MODAL CONTENT -->
    </div><!--MODAL DIALOG -->

<!--END EDIT FORM-->
    </form>

  </div><!-- Modal Edit student -->

  </div> <!-- END COL 6 -->

  <div class="col-sm-6"><!-- COL 6 -->

    <!-- START Delete student -->
    <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD3{{$student->id}}" ><b>SUPPRIMER</b></button></p>

      <!-- Modal Delete student -->
      <div class="modal fade" id="MD3{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/manager/deleteStudent') }}" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un étudiant </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CET ETUDIANT?</p>
              <h4 class="card-title text-center">
              {{$student->name}} {{$student->surname}}
              </h4>

              <input type="hidden" class="form-control" name="id" value="{{$student->id}}" hidden="">
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
      <!--END DELETE FORM -->
      </form>
    </div>

  </div><!-- END COL 6 -->

    </div>
  </div>
</div>
<hr>
@endforeach

@if ($students->count()<=0)
<h3 class="text-danger text-center"><b>AUCUN ETUDIANT NE CORRESPOND A CETTE RECHERCHE</b></h3>
<hr>
@endif
