        <?php use Carbon\Carbon;?>

      <div class="row">
   
          <div class="col-sm-12">

          <div class="accordion pt-2 pb-2" id="accordionExample<?php echo e($classroom->id); ?>">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne<?php echo e($classroom->id); ?>">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo e($classroom->id); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($classroom->id); ?>">
                <b><?php echo e($classroom->program->fullname); ?>  <?php echo e($classroom->program->levelInt); ?> -  <?php echo e($classroom->name); ?></b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne<?php echo e($classroom->id); ?>" class="collapse" aria-labelledby="headingOne<?php echo e($classroom->id); ?>" data-parent="#accordionExample<?php echo e($classroom->id); ?>">

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
              <?php $__currentLoopData = $classroom->students->sortBy('name');; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr> 
                <td><b><?php $i++;?> <?php echo e($i); ?> </b></td>
                <td><b><?php echo e($student->matricule); ?></b></td>
                <td><b><?php echo e($student->name); ?></b> <?php echo e($student->surname); ?> <span style= "color:<?php if($student->gender=='F'): ?>#c22e6d <?php else: ?>  blue <?php endif; ?>">(<?php echo e($student->gender); ?>)</span> </td>
               
                <td>
                          <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
 
          <?php //dd($semesters); ?>                
          <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semesterP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php // dd($semesterP->label); ?> 

          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#MRKK1<?php echo e($student->id); ?><?php echo e($semesterP->id); ?>">
            <i class="icon-eye"></i><?php echo e($semesterP->label); ?> </a>|
          
          <!-- Modal Edit teacher -->
            <div class="modal fade" id="MRKK1<?php echo e($student->id); ?><?php echo e($semesterP->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              <div class="modal-dialog modal-lf" role="document"><!--MODAL DIALOG -->
                <div class="modal-content"> <!--MODAL CONTENT -->
                  <div class="modal-header"> <!--MODAL HEADER -->
                      <h5 class="modal-title" id="exampleModalLabel">LES NOTES DU <?php echo e($semesterP->label); ?> de
                        <b><?php echo e($student->name); ?> <?php echo e($student->surname); ?></b> 
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
              
              <?php $__currentLoopData = $semesterP->subjects->where('classroom_id',$classroom->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr> 
                <td><?php echo e($subject->name); ?></td>

                <td>                  
                  <strong>
                  <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                  <span class="<?php if($subjectavg): ?> <?php if($subjectavg->valueClass >= 10): ?> badge btn-vert text-white <?php else: ?> badge badge-danger text-white <?php endif; ?> <?php else: ?> badge btn-vert text-white  <?php endif; ?>  " style="font-size: 20px; width:65px;" ><?php if($subjectavg): ?> <?php echo e($subjectavg->valueClass); ?> <?php else: ?> ... <?php endif; ?> </span> 
                 </strong> 
                </td>

                <td>                  
                    <span class="<?php if($subjectavg): ?><?php if($subjectavg->valuExam >= 10): ?> badge btn-vert <?php else: ?> badge badge-danger <?php endif; ?> <?php endif; ?>"
                          style="font-size: 20px;width:65px;" >
                          <?php if($subjectavg): ?><?php echo e($subjectavg->valuExam); ?><?php endif; ?>
                    </span>
                </td>
              
              <td>                  
                <strong>
                <span class="<?php if($subjectavg): ?> <?php if($subjectavg->valueGrle >= 10): ?> badge btn-vert text-white <?php else: ?> badge badge-danger text-white <?php endif; ?> <?php else: ?> badge btn-vert text-white  <?php endif; ?>  " style="font-size: 20px; width:65px;" ><?php if($subjectavg): ?> <?php echo e($subjectavg->valueGrle); ?> <?php else: ?> ... <?php endif; ?> </span> 
               </strong> 
              </td>

              <td>
                  <?php if($subjectavg): ?>
                    <?php if($subjectavg->valueGrle >= 10): ?>
                    UE VALIDE
                    <?php else: ?>
                    UE NON VALIDE
                    <?php endif; ?>
                  <?php else: ?>
                  ...
                  <?php endif; ?>
              </td>

              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

  <div class="row">
    <div class="col-sm-6">
      <?php $semesterAvg=$student->semesterAvgs->where('semester_id',$semesterP->id)->first(); ?>

        <h6><b>MOYENNE SEMESTRIELLE : </b> <span class=" badge badge-dark text-white " style="font-size: 20px; width:65px;" ><?php if($semesterAvg): ?> <?php echo e($semesterAvg->value); ?> <?php else: ?> ... <?php endif; ?> </span>  <br>
            <b>RANG : </b> <span class="badge badge-secondary text-white " style="font-size: 20px; width:65px;" ><?php if($semesterAvg): ?> <?php echo e($semesterAvg->rank); ?> <?php else: ?> ... <?php endif; ?> </span> </h6>
    </div>
    <div class="col-sm-6 ">
      <?php $UEV=$student->subjectavgs->where('semester_id',$semesterP->id)->where('valueGrle','>=',10)->count(); ?>
      <?php $UENV=$student->subjectavgs->where('semester_id',$semesterP->id)->where('valueGrle','<',10)->count(); ?>
      <h6 style="float: right;" >
       UE VALIDEE: <?php echo e($UEV); ?> 
       <br>
       UE NON VALIDEE: <?php echo e($UENV); ?>

      </h6>  
    </div>
  </div>

                </div><!--END MODAL BODY -->
         
                <div class="modal-footer">
                  <form action="<?php echo e(URL::to('/kuro/admin/printBulletin1')); ?>" method="post" enctype="multipart/form-data" id="#theform<?php echo e($student->id); ?>">
                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                    <input type="hidden" name="id" value="<?php echo e($student->id); ?>">
                    <input type="hidden" name="semester_id" value="<?php echo e($semesterP->id); ?>">
                    <button class="btn btn-bordo" type="submit"><i class="icon-printer"></i> TELECHARGER LE BULLETIN </button>
                  </form>
                  <script type="text/javascript">
                      $(function()
                    {
                      $('#theform<?php echo e($student->id); ?>').submit(function(){
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

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <a href="#" class="btn btn-bordo" data-toggle="modal" data-target="#MRKD2<?php echo e($student->id); ?>" ><i class="icon-printer"></i>  Imprimer Bulletin</a>
          <!-- Modal Delete teacher -->

          <!-- Modal Edit teacher -->
            <div class="modal fade" id="MRKD2<?php echo e($student->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
                <div class="modal-content"> <!--MODAL CONTENT -->
                  <div class="modal-header"> <!--MODAL HEADER -->
                      <h5 class="modal-title" id="exampleModalLabel">TELECHARGER LES BULLETINS DISPONIBLES DE 
                        <b><?php echo e($student->name); ?> <?php echo e($student->surname); ?></b>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
               
                <div class="modal-body"> <!--MODAL BODY -->
                  <form action="<?php echo e(URL::to('/kuro/admin/printBulletin2')); ?>" method="post" enctype="multipart/form-data" id="theformed<?php echo e($student->id); ?>">
                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                    <input type="hidden" name="id" value="<?php echo e($student->id); ?>">
                    <input type="hidden" name="academicyear_id" value="<?php echo e($academicyearP->id); ?>">
                    <p class="text-center">TELECHARGER LES BULLETINS DISPONIBLES DE L'ANNEE SCOLAIRE EN COURS <br> <b><?php echo e($student->name); ?> <?php echo e($student->surname); ?></b></p>
                    <p class="text-center"><button class="btn btn-bordo" type="submit"><i class="icon-printer"></i>TELECHARGER LES BULLETIN(S) </button></p>
                  </form>
                  <script type="text/javascript">
                      $(function()
                    {
                      $('#theformed<?php echo e($student->id); ?>').submit(function(){
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
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

                  <!-- NOTE TOGGLE -->
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample<?php echo e($classroom->id); ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo e($classroom->id); ?>">
                      PLUS D'INFOS <b>(<?php echo e($classroom->name); ?>)</b>
                    </a>
                  </p>

              <div class="collapse" id="collapseExample<?php echo e($classroom->id); ?>">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">EFFECTIF</h3>
                      <h1 class="text-center"><?php echo e($classroom->students->count()); ?></h1>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">HOMMES</h3>
                      <h1 class="text-center"><?php echo e($classroom->students->where('gender','M')->count()); ?></h1>
                    </div>
                  </div>                  
                  <div class="col-sm-4">
                    <div class="card card-body bg-dark" style="color:white;">
                      <h3 class="text-center">FEMMES</h3>
                      <h1 class="text-center"><?php echo e($classroom->students->where('gender','F')->count()); ?></h1>
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


<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/admin/getClassroom8.blade.php ENDPATH**/ ?>