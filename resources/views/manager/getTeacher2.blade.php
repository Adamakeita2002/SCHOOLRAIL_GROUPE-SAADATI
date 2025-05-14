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
                <th scope="col">NOM ET PRENOM DU PROFESSEUR</th>
                <th scope="col">MATIERE(s) ENSEIGNEE(s)</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ACTION</th>
                
              </tr>
            </thead>

            <tbody>
          @for ($i=0; $i < count($UniqueTeacherSubjs); $i++)
             <?php $teacher=$teachers->where('id',$UniqueTeacherSubjs[$i])->first();?>
              <tr> 
                <td><b>{{$teacher->name}} {{$teacher->surname}}</b> <br>
                    <b>({{$teacher->image}})</b>
              </td>

                <td>
                  <?php $subjects=$semesterP->subjects()->where('teacher_id',$teacher->id)->get();?> 
                  @foreach ($subjects->where('classroom_id',$classroom->id) as $subject)
                  <b>{{$subject->name}},</b>
                  @endforeach
                </td>

                <td> <b>({{$teacher->email}})</b></td>   

                <td>
                  <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
  <a href="#" data-toggle="modal" data-target="#MMTE2{{$teacher->id}}" style="color: orange;">Modifier</a>|
  
  <!-- Modal Edit teacher -->
    <div class="modal fade" id="MMTE2{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
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



   <a href="#" data-toggle="modal" data-target="#MDTE2{{$teacher->id}}" style="color: red;">Supprimer</a>
      <!-- Modal Delete teacher -->
      <div class="modal fade" id="MDTE2{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

              </td>         
              </tr>
              @endfor
            </tbody>
          </table>

                  <!-- NOTE TOGGLE -->
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample{{$classroom->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$classroom->id}}">
                      PLUS D'INFOS <b>({{$classroom->name}})</b>
                    </a>
                  </p>

                  <!-- NOTE TOGGLE -->
                  

                  <!--END NOTE TOGGLE -->

                </div>

              </div>
            </div>
          
          </div>