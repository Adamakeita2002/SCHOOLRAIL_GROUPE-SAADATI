        <?php use Carbon\Carbon;?>
          <div class="accordion pt-2 pb-2" style="width:1250px" id="accordionExample{{$classroom->id}}">
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
                <th scope="col">NOM DE LA MATIERE</th>
                <th scope="col">COEFFICIENT</th>
                <th scope="col">PROFESSEUR</th>
                <th scope="col">ACTION</th>
                
              </tr>
            </thead>

            <tbody>
              @foreach ($subjects as $subject)
              <tr> 
                <td><b>{{$subject->name}}</b> <br> {{$subject->day}} / {{$subject->startime}} - {{$subject->endtime}}</td>
                <td><b>{{$subject->credit}}</b></td>

                <td><b>{{$subject->teacher->fullname}}</b> <br> <b>({{$subject->teacher->email}})</b></td>      
                <td>
                  <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
                  <a href="#" data-toggle="modal" data-target="#MMS2{{$subject->id}}" style="color: orange;">Modifier</a>|
    <!-- Modal Edit subject -->
    <div class="modal fade" id="MMS2{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit subject -->
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
                    <div class="form-group pt-2 ">
                      <label><b>Le jour d'enseignement</b> </label>
                      <select class="form-control" name="day" >
                        <option value="{{$subject->day}}">{{$subject->day}}</option>
                        <option value="LUNDI">LUNDI</option>
                        <option value="MARDI">MARDI</option>
                        <option value="MERCREDI">MERCREDI</option>
                        <option value="JEUDI">JEUDI</option>
                        <option value="VENDREDI">VENDREDI</option>
                        <option value="SAMEDI">SAMEDI</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                      <div class="form-group ">
                        <label><b>Entrez l'heure debut</b> ({{$subject->startime}}) </label>
                        <input type="time" name="startime" class="form-control" placeholder="{{$subject->startime}}" >
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group ">
                        <label><b>Entrez l'heure fin</b> ({{$subject->endtime}}) </label>
                        <input type="time" name="endtime" class="form-control" placeholder="{{$subject->endtime}}" >
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



   <a href="#" data-toggle="modal" data-target="#MDS2{{$subject->id}}" style="color: red;">Supprimer</a>
      <!-- Modal Delete subject -->
      <div class="modal fade" id="MDS2{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

              </td>         
              </tr>
              @endforeach
            </tbody>
          </table>

                  <!-- NOTE TOGGLE 
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample{{$classroom->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$classroom->id}}">
                      PLUS D'INFOS <b>({{$classroom->name}})</b>
                    </a>
                  </p>-->

              <div class="collapse" id="collapseExample{{$classroom->id}}">
                <div class="row">

                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">NOMBRE DE MATIERE</h3>
                      <h1 class="text-center">{{$subjects->count()}}</h1>
                    </div>
                  </div>
                 
                </div>

              </div> 
                  <!-- NOTE TOGGLE -->

                </div>

              </div>
            </div>
          
          </div>