        <?php use Carbon\Carbon;?>

      <div class="row">
   
          <div class="col-sm-12">

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
                <th scope="col">*</th>
                <th scope="col">MATRICULE</th>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">ACTION(s)</th>
              <!--  <th scope="col">TELEPHONE</th> -->
              </tr>
            </thead>

            <tbody>
              <?php $i=0; ?>
              @foreach ($classroom->students->sortBy('name'); as $student)
              <tr> 
                <td><b><?php $i++;?> {{$i}} </b></td>
                <td><b>{{$student->matricule}}</b></td>
                <td><b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> </td>
               
                <td>
                          <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
 
          <?php //dd($semesters); ?>                
          @foreach($semesters as $semesterP)

          <?php // dd($semesterP->label); ?> 

          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#MRKK1{{$student->id}}{{$semesterP->id}}">
            <i class="icon-eye"></i>{{$semesterP->label}} </a>|
          
          <!-- Modal STUDENT MARK -->
            <div class="modal fade" id="MRKK1{{$student->id}}{{$semesterP->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal STUDENT MARK -->

              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <div class="modal-dialog modal-lf" role="document"><!--MODAL DIALOG -->
                <div class="modal-content"> <!--MODAL CONTENT -->
                  <div class="modal-header"> <!--MODAL HEADER -->
                      <h5 class="modal-title" id="exampleModalLabel">LES NOTES DU {{$semesterP->label}} de
                        <b>{{$student->name}} {{$student->surname}}</b> 
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
               
                <div class="modal-body"> <!--MODAL BODY -->

                <!-- BULLETIN DE NOTE -->

          <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">MATIERE</th>
                <th scope="col">PROFESSEUR</th>
                <th scope="col">NOTES</th>
                <th scope="col">MOYENNE</th>
                <th scope="col">RANG</th>
              </tr>
            </thead>
                <div class="text-center">
                  @foreach($epreuves as $epreuve)
                  <span class="@if($epreuve->id == 1) badge badge-primary ml-3 @elseif($epreuve->id == 2) badge badge-success @else badge badge-dark @endif" style="font-size: 20px">{{$epreuve->name}}</span>
                  @endforeach
                </div>
            <tbody>
              
              @foreach ($semesterP->subjects->where('classroom_id',$classroom->id) as $subject)
              <tr> 
                <td>{{$subject->name}}</td>

                <td>{{$subject->teacher->name}} {{$subject->teacher->surname}}</td>
                <td>
                <?php $tests= $subject->tests()->get(); 
                $Smark=0;
                $j=0;
                ?>

                @foreach ($tests as $test)
                  <?php   
                    $j++;
                  ?>
                  @foreach ($student->marks->where('test_id',$test->id) as $mark )
                  <span class="@if($test->type == 1 AND $mark->value==!null ) badge badge-primary @elseif($test->type == 2 AND $mark->value==!null) badge badge-success @elseif($test->type == 3 AND $mark->value==!null) badge badge-dark @else badge badge-danger  @endif ml-1 " style="font-size: 20px;" >
                    {{$test->testNum}} <hr class="hrr">@if($mark->value==null) N @else{{$mark->value}}@endif 
                  </span>
                    <?php 
                    $Smark=$Smark + $mark->value;  
                   // $j++;
                    ?>
                  @endforeach
                @endforeach
               </td>
              
                <td> <!-- START CALCULE DE MOYENNE -->
                  <strong>
                    <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                    <span class="@if($subjectavg) @if($subjectavg->valueGrle >= 10) badge btn-vert text-white @else badge badge-danger text-white @endif @else badge btn-vert text-white  @endif  " style="font-size: 20px; width:65px;" >@if($subjectavg) {{$subjectavg->valueGrle}} @else ... @endif </span> 
                  </strong> 
                </td> <!-- END CALCULE DE MOYENNE -->

                <td> <!-- START RANK -->
                  <strong>
                    <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                    <span class=" badge badge-secondary text-white " style="font-size: 20px; width:65px;" >@if($subjectavg) {{$subjectavg->rank}} @else ... @endif </span> 
                  </strong> 
                </td> <!-- END RANK -->

              </tr>
              @endforeach
            </tbody>
          </table>


                </div><!--END MODAL BODY -->
         
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                </div>

                </div><!--MODAL CONTENT -->
              </div><!--MODAL DIALOG -->


          </div><!-- Modal Edit teacher -->

          @endforeach


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
            
          </div>
        </div>


