  <?php use Carbon\Carbon;?>
@if (!empty($subjects))

@foreach ($subjects as $subject)
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d; width: 220px">
        <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
          <h4 class="card-title text-center " style="color:white;">
           {{$subject->name}}
          </h4>
          <hr>
          <h4 class="card-title text-center " style="color:white;">
          {{$subject->classroom->name}}
          </h4>
        </div>

        </div>

        <div class="col-sm-5">
          <div class="card-body">
            <h4 class="card-title " ><b> Classe :  </b>
              @if( empty($subject->classroom_id))
              <span class="text-danger"> <b>Aucune Classe</b></span>
              <span>
              <a class="btn btn-primary" href="/kuro/admin/affectSubject">
              AFFECTER
              </a>
            </span>
              @else
            <span>{{$subject->classroom->name}}</span>
              @endif
            </h4>

            <hr>


              @if( empty($subject->credit))
              <h4 class="card-title " ><b> Coefficient :  </b>
              <span class="text-danger"> <b>Aucun coéfficient </b></span>
              </h4>
              @else
              <h4 class="card-title " ><b> Coefficient :  </b>
              <span>{{$subject->credit}}</span>
              </h4>
              @endif


            <hr>

            <h4 class="card-title " ><b> Programme :  </b>
              @if( empty($subject->program_id))
              <span class="text-danger"> <b>Aucun Programme</b></span>
              <span>
              <a class="btn btn-primary" href="/kuro/admin/affectSubject">
              AFFECTER
              </a>
            </span>
              @else
            <span>{{$subject->program->fullname}}</span>
              @endif
            </h4>
            <hr>

          </div>
        </div>


          <div class="col-sm-5">
            <div class="card-body">
                <h4 class="card-title " ><b> Professeur : </b>
                @if( empty($subject->teacher_id))
                <span class="text-danger"> <b>Aucun Professeur</b></span>
                <span>
                <a class="btn btn-primary" href="/kuro/admin/affectSubject">
                AFFECTER
                </a>
                </span>
                </h4>
                @else

                  <span>{{$subject->teacher->name}} {{$subject->teacher->surname}} </span>
          <hr>
                <h4 class="card-title " ><b> Téléphone : </b>
                  <span>{{$subject->teacher->tel}}</span>
                </h4>
          <hr>

                <h4 class="card-title " ><b> Adresse : </b>
                  <span>{{$subject->teacher->address}}</span>
                </h4>
          <hr>
                @endif

          </div>
        </div>

    </div>



  <div class="card-body">

<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

  <div class="row">

    <div class="col-sm-6"><!-- COL 6 -->

      <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MMS1{{$subject->id}}" ><b>MODIFIER</b></button></p> <!-- MODIFY BUTTON -->

    <!-- Modal Edit subject -->
    <div class="modal fade" id="MMS1{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit subject -->
    <form action="{{ URL::to('/kuro/admin/modifySubject1') }}" method="post" enctype="multipart/form-data">
      <!--EDIT FORM-->
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant cette matière
                <b>{{$subject->name}}</b>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

        <div class="modal-body"> <!--MODAL BODY -->
          <div class="text-center">
            <p>Modifier la correction:</p>
          </div>

            <div class="row justify-content-md-center"> <!--MODAL ROW -->

                 <div class="col-sm-6">
                  <div class="form-group">
                    <label><b>Modifier le nom de la matière</b></label>
                    <input type="text" name="name" placeholder="{{$subject->name}}" class="form-control">
                  </div>
                 </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label><b>Modifier le coefficient</b></label>
                    <input type="text" name="credit" placeholder="{{$subject->credit}}" class="form-control">
                  </div>
                </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><b>Affecter la matière a un autre professeur</b></label>
                  <input type="text" name="teacher_fullname" class="form-control" placeholder="{{$subject->teacher->fullname}} - ({{$subject->teacher->email}})" list="teacher_fullname"/>
                  <datalist  id="teacher_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    @foreach($teachers as $teacher )
                    <option value="{{$teacher->fullname}}">{{$teacher->fullname}} - ({{$teacher->email}})</option>
                    @endforeach
                  </select>
                   </label>
                  </datalist>
                </div>
               </div>

          <div class="col-sm-6">
                <div class="form-group">
                  <label><b>Validation</b></label><br>
                  <button type="submit" class="btn btn-warning text-white">
                    <b>Valider la modification</b>
                  </button>
                </div>
          </div>

                <input type="hidden" class="form-control" name="id" value="{{$subject->id}}" hidden="">

            </div> <!--END MODAL ROW -->

    </div><!--END MODAL BODY -->

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
          </div>

      </div><!--MODAL CONTENT -->
    </div><!--MODAL DIALOG -->

<!--END EDIT FORM-->
    </form>

  </div><!-- Modal Edit subject -->

  </div> <!-- END COL 6 -->

  <div class="col-sm-6"><!-- COL 6 -->

    <!-- START Delete subject -->
    <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MDS1{{$subject->id}}" ><b>SUPPRIMER</b></button></p>

      <!-- Modal Delete subject -->
      <div class="modal fade" id="MDS1{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/kuro/admin/deleteSubject1') }}" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'une matière </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CETTE MATIERE?</p>
              <h4 class="card-title text-center">
              {{$subject->name}} / {{$subject->classroom->name}}
              </h4>

              <input type="hidden" class="form-control" name="id" value="{{$subject->id}}" hidden="">
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
<hr>
@endforeach

@else
<h3 class="text-danger text-center"><b>AUCUNE MATIERE NE CORRESPOND A CETTE RECHERCHE</b></h3>
@endif


        <!--  </div>-->
