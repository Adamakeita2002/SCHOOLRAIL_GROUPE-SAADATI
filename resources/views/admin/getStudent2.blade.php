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
                <th scope="col">MATRICULE</th>
                <th scope="col">MOT DE PASSE</th>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">ACTION</th>
                
              </tr>
            </thead>
            
            <tbody>
              @foreach ($classroom->students->sortBy('name') as $student)
              <tr> 
              	<td><b>{{$student->matricule}}</b></td>
              	<td><b>{{$student->image}}</b></td>
                <td><b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?> 
                <td>{{$student->dateofbirth}} - <b>({{$years}} ans)</b></td>

                <td>{{$student->tel}}</td>      
                <td>
                	<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
	                <a href="#" data-toggle="modal" data-target="#MM2{{$student->id}}" style="color: orange;">Modifier</a>|
	                    <!-- Modal Edit student -->
    <div class="modal fade" id="MM2{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit student -->
    <form action="{{ URL::to('/kuro/admin/modifyStudent') }}" method="post" enctype="multipart/form-data"> 
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
                    <label><b>Date de naissance de l' étudiant ({{$student->dateofbirth}})</b></label>
                    <input type="date" name="dateofbirth"  class="form-control">
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



	                <a href="#" data-toggle="modal" data-target="#MD2{{$student->id}}" style="color: red;">Supprimer</a>
      <!-- Modal Delete student -->
      <div class="modal fade" id="MD2{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/kuro/admin/deleteStudent') }}" method="post" enctype="multipart/form-data">
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
      <!--END DELETE FORM-->
      </form>
    </div>

            	</td>         
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