  <?php use Carbon\Carbon;?>
@if (!empty($student))
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d">
        <img src="/public/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
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
              <a class="btn btn-primary" href="/kuro/admin/affectStudent">
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

@include ('layouts.errors')
            <form  action="/kuro/admin/CreateCandidate" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value="{{$student->id}}" name="student_id">

                <div class="form-group">
                  <label>Confirmer le choix</label>
                  <select class="form-control" name="candidate" >
                    <option value="">Choix</option> 
                    <option value="yes">Déterminer comme candidat</option>
                  </select>
                </div>

                <div class="form-group">
                   <input class="btn btn-bordo btn-md btn-block" type="submit" value="CONFIRMER"> 
                </div>
              </form>

  </div>

  </div>
</div>
@else
<h3 class="text-danger text-center"><b>AUCUN ETUDIANT NE CORRESPOND A CETTE RECHERCHE</b></h3>
@endif
<hr>

        <!--  </div>-->
 