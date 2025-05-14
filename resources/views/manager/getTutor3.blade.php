        <?php use Carbon\Carbon;?>
          
            <div class="card " style="background-color: #0b06cc45 !important;">


            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MATRICULE</th>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">PARENT</th>
                <th scope="col">AFFECTER OU MODIFIER</th>
                
              </tr>
            </thead>

            <tbody>
              @foreach ($classroom->students as $student)
              <tr> 
              	<td><b>{{$student->matricule}}</b></td>
                <td><b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?> 
                <td>{{$student->dateofbirth}} - <b>({{$years}} ans)</b></td>

                <td>
                  @if($student->tutor_id >0)
                  <span class="text-success"><b>{{$student->tutor->name}} {{$student->tutor->surname}}</b></span>@else 
                 <span class="text-danger"><b>Aucun Tuteur</b></span> 
                @endif
                </td>      
                <td>
                	<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->  
              <form action="{{ URL::to('/manager/affectationTutor') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" value="{{$student->id}}" name="student_id">
                <div class="form-group mt-2">
                  <label><b>@if($student->tutor_id >0)
                  <span class="text-warning"><b>MODIFIER</b></span>@else 
                 <span class="text-success"><b>AFFECTER</b></span> 
                @endif</b></label>
                  <input type="text" name="email" class="form-control" placeholder="@if($student->tutor_id >0){{$student->tutor->name}} {{$student->tutor->surname}} @endif" list="tutor_fullname"/>
                  <datalist  id="tutor_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    @foreach($tutors as $tutor )
                    <option value="{{$tutor->email}}">{{$tutor->name}} {{$tutor->surname}} - 
                      ({{$tutor->email}})
                    </option>
                    @endforeach
                  </select>
                   </label>
                  </datalist>
                </div>
                <p><button class="btn btn-success" type="submit">Valider l'affectation</button></p>    
              </form> 

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
          
       