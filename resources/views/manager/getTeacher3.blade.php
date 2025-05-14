  <?php use Carbon\Carbon;?>
@if (!empty($teacher))
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d">
        <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
          <h4 class="card-title text-center " style="color:white;">
           {{$teacher->name}} {{$teacher->surname}} <br>
           <b>({{$teacher->image}})</b>
          </h4>
          <hr>
        </div>

        </div>

        <div class="col-sm-5">
          <div class="card-body">
            <h4 class="card-title " ><b> Matière et Classe :  </b>
            <?php $subjects=$semesterP->subjects()->where('teacher_id',$teacher->id)->get();?>
            @foreach ($subjects as $subject)
              <span>{{$subject->name}} ({{$subject->classroom->name}}),</span>
            @endforeach
              @if( empty($subjects))
              <span class="text-danger"> <b>Aucune Classe</b></span>
              <span>
              <a class="btn btn-primary" href="/manager/affectSubject">
              LUI AFFECTER UNE MATIERE
              </a>
            </span>
              @endif
            </h4>

        <hr>
              <h4 class="card-title " ><b> Nationalité :  </b>
                <span>{{$teacher->nationality}}</span>
              </h4>
        <hr>
              <h4 class="card-title " ><b> Age : </b>
                <?php  $years = Carbon::parse($teacher->dateofbirth)->age;?>
                <span>{{$years}}</span>
              </h4>
        <hr>
             <h4 class="card-title " ><b> Genre : </b>
              <span>@if($teacher->gender=='M') Masculin @elseif($teacher->gender=='F') Feminin  @endif</span>
            </h4>


          </div>
        </div>


          <div class="col-sm-5">
            <div class="card-body">
                <h4 class="card-title " ><b> Email : </b>
                  <span>{{$teacher->email}}</span>
                </h4>
          <hr>
                <h4 class="card-title " ><b> Téléphone : </b>
                  <span>{{$teacher->tel}}</span>
                </h4>
          <hr>

                <h4 class="card-title " ><b> Adresse : </b>
                  <span>{{$teacher->address}}</span>
                </h4>
          <hr>


          </div>
        </div>

    </div>



  <div class="card-body">

<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

  <div class="row">

    <div class="col-sm-6"><!-- COL 6 -->

      <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MMTE3{{$teacher->id}}" ><b>MODIFIER</b></button></p> <!-- MODIFY BUTTON -->

    <!-- Modal Edit teacher -->
    <div class="modal fade" id="MMTE3{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
    <form action="{{ URL::to('/manager/modifyTeacher1') }}" method="post" enctype="multipart/form-data">
      <!--EDIT FORM-->
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant ce professeur
                <b>{{$teacher->name}} {{$teacher->surname}}</b>
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
                    <label><b>Modifier le nom du professeur</b></label>
                    <input type="text" name="name" placeholder="{{$teacher->name}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier le prénom(s) du professeur</b></label>
                    <input type="text" name="surname" placeholder="{{$teacher->surname}}" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Date de naissance du professeur ({{$teacher->dateofbirth}})</b></label>
                    <input type="date" name="dateofbirth"  class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier la nationalité du professeur</b></label>
                    <input type="texte" name="nationality" placeholder="{{$teacher->nationality}}" class="form-control">
                  </div>

              </div>

              <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Modifier le genre</b></label>
                        <select class="form-control" name="gender">
                          <option value="">Genre ({{$teacher->gender}})</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'email du professeur</b></label>
                        <input type="email" name="email" placeholder="{{$teacher->email}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier le contact du professeur</b></label>
                        <input type="number" name="tel" placeholder="{{$teacher->tel}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'adresse du professeur</b></label>
                        <input type="texte" name="address" placeholder="{{$teacher->address}}" class="form-control">
                      </div>


                      <input type="hidden" class="form-control" name="id" value="{{$teacher->id}}" hidden="">

              </div>

            </div> <!--END MODAL ROW -->

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

  </div><!-- Modal Edit teacher -->

  </div> <!-- END COL 6 -->

  <div class="col-sm-6"><!-- COL 6 -->

    <!-- START Delete teacher -->
    <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MDTE3{{$teacher->id}}" ><b>SUPPRIMER</b></button></p>

      <!-- Modal Delete teacher -->
      <div class="modal fade" id="MDTE3{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/manager/deleteTeacher1') }}" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un professeur </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CE PROFESSEUR?</p>
              <h4 class="card-title text-center">
              {{$teacher->name}} {{$teacher->surname}} <br>
              ({{$teacher->email}})
              </h4>

              <input type="hidden" class="form-control" name="id" value="{{$teacher->id}}" hidden="">
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
      <!--END DELETE FORM-->
      </form>
    </div>

  </div><!-- END COL 6 -->

    </div>
  </div>
</div>
@else
<h3 class="text-danger text-center"><b>AUCUN PROFESSEUR NE CORRESPOND A CETTE RECHERCHE</b></h3>
@endif
<hr>

        <!--  </div>-->
