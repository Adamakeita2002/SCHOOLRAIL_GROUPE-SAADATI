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
          
          <!-- Modal Edit teacher -->
            <div class="modal fade" id="MRKK1{{$student->id}}{{$semesterP->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
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
                <th>ENSEIGNEMENT</th>
                <th>MC</th>
                <th>ME</th>
                <th>MG / UE</th>
                <th>APPR.</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($semesterP->subjects->where('classroom_id',$classroom->id) as $subject)
              <tr> 
                <td>{{$subject->name}}</td>

                <td>                  
                  <strong>
                  <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                  <span class="@if($subjectavg) @if($subjectavg->valueClass >= 10) badge btn-vert text-white @else badge badge-danger text-white @endif @else badge btn-vert text-white  @endif  " style="font-size: 20px; width:65px;" >@if($subjectavg) {{$subjectavg->valueClass}} @else ... @endif </span> 
                 </strong> 
                </td>

                <td>                  
                    <span class="@if($subjectavg)@if($subjectavg->valuExam >= 10) badge btn-vert @else badge badge-danger @endif @endif"
                          style="font-size: 20px;width:65px;" >
                          @if($subjectavg){{$subjectavg->valuExam}}@endif
                    </span>
                </td>
              
              <td>                  
                <strong>
                <span class="@if($subjectavg) @if($subjectavg->valueGrle >= 10) badge btn-vert text-white @else badge badge-danger text-white @endif @else badge btn-vert text-white  @endif  " style="font-size: 20px; width:65px;" >@if($subjectavg) {{$subjectavg->valueGrle}} @else ... @endif </span> 
               </strong> 
              </td>

              <td>
                  @if($subjectavg)
                    @if($subjectavg->valueGrle >= 10)
                    UE VALIDE
                    @else
                    UE NON VALIDE
                    @endif
                  @else
                  ...
                  @endif
              </td>

              </tr>
              @endforeach
            </tbody>
          </table>

  <div class="row">
    <div class="col-sm-6">
      <?php $semesterAvg=$student->semesterAvgs->where('semester_id',$semesterP->id)->first(); ?>

        <h6><b>MOYENNE SEMESTRIELLE : </b> <span class=" badge badge-dark text-white " style="font-size: 20px; width:65px;" >@if($semesterAvg) {{$semesterAvg->value}} @else ... @endif </span>  <br>
            <b>RANG : </b> <span class="badge badge-secondary text-white " style="font-size: 20px; width:65px;" >@if($semesterAvg) {{$semesterAvg->rank}} @else ... @endif </span> </h6>
    </div>
    <div class="col-sm-6 ">
      <?php $UEV=$student->subjectavgs->where('semester_id',$semesterP->id)->where('valueGrle','>=',10)->count(); ?>
      <?php $UENV=$student->subjectavgs->where('semester_id',$semesterP->id)->where('valueGrle','<',10)->count(); ?>
      <h6 style="float: right;" >
       UE VALIDEE: {{$UEV}} 
       <br>
       UE NON VALIDEE: {{$UENV}}
      </h6>  
    </div>
  </div>

                </div><!--END MODAL BODY -->
         
                <div class="modal-footer">
                  <form action="{{ URL::to('/kuro/admin/printBulletin1') }}" method="post" enctype="multipart/form-data" id="#theform{{$student->id}}">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" name="id" value="{{$student->id}}">
                    <input type="hidden" name="semester_id" value="{{$semesterP->id}}">
                    <button class="btn btn-bordo" type="submit"><i class="icon-printer"></i> TELECHARGER LE BULLETIN </button>
                  </form>
                  <script type="text/javascript">
                      $(function()
                    {
                      $('#theform{{$student->id}}').submit(function(){
                        $("button[type='submit']", this)
                         // .val('Please Wait...')
                          .attr('disabled', 'disabled')
                          .html('Veuillez patienter...');
                        return true;
                      });
                    });
                  </script>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                </div>

                </div><!--MODAL CONTENT -->
              </div><!--MODAL DIALOG -->
              <!--END EDIT FORM-->

          </div><!-- Modal Edit teacher -->

          @endforeach


          <a href="#" class="btn btn-bordo" data-toggle="modal" data-target="#MRKD2{{$student->id}}" ><i class="icon-printer"></i>  Imprimer Bulletin</a>
          <!-- Modal Delete teacher -->

          <!-- Modal Edit teacher -->
            <div class="modal fade" id="MRKD2{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
                <div class="modal-content"> <!--MODAL CONTENT -->
                  <div class="modal-header"> <!--MODAL HEADER -->
                      <h5 class="modal-title" id="exampleModalLabel">TELECHARGER LES BULLETINS DISPONIBLES DE 
                        <b>{{$student->name}} {{$student->surname}}</b>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
               
                <div class="modal-body"> <!--MODAL BODY -->
                  <form action="{{ URL::to('/kuro/admin/printBulletin2') }}" method="post" enctype="multipart/form-data" id="theformed{{$student->id}}">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="hidden" name="id" value="{{$student->id}}">
                    <input type="hidden" name="academicyear_id" value="{{$academicyearP->id}}">
                    <p class="text-center">TELECHARGER LES BULLETINS DISPONIBLES DE L'ANNEE SCOLAIRE EN COURS <br> <b>{{$student->name}} {{$student->surname}}</b></p>
                    <p class="text-center"><button class="btn btn-bordo" type="submit"><i class="icon-printer"></i>TELECHARGER LES BULLETIN(S) </button></p>
                  </form>
                  <script type="text/javascript">
                      $(function()
                    {
                      $('#theformed{{$student->id}}').submit(function(){
                        $("button[type='submit']", this)
                         // .val('Please Wait...')
                          .attr('disabled', 'disabled')
                          .html('Veuillez patienter...');
                        return true;
                      });
                    });
                  </script>

                </div><!--END MODAL BODY -->
         
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                </div>

                </div><!--MODAL CONTENT -->
              </div><!--MODAL DIALOG -->
              <!--END EDIT FORM-->

              </div><!-- Modal Edit teacher -->


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


