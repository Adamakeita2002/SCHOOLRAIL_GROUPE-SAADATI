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
          
          <!-- Modal STUDENT MARK -->
            <div class="modal fade" id="MRKK1<?php echo e($student->id); ?><?php echo e($semesterP->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal STUDENT MARK -->

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
                
                <th scope="col">MATIERE</th>
                <th scope="col">PROFESSEUR</th>
                <th scope="col">NOTES</th>
                <th scope="col">MOYENNE</th>
                <th scope="col">RANG</th>
              </tr>
            </thead>
                <div class="text-center">
                  <?php $__currentLoopData = $epreuves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $epreuve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="<?php if($epreuve->id == 1): ?> badge badge-primary ml-3 <?php elseif($epreuve->id == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?>" style="font-size: 20px"><?php echo e($epreuve->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <tbody>
              
              <?php $__currentLoopData = $semesterP->subjects->where('classroom_id',$classroom->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr> 
                <td><?php echo e($subject->name); ?></td>

                <td><?php echo e($subject->teacher->name); ?> <?php echo e($subject->teacher->surname); ?></td>
                <td>
                <?php $tests= $subject->tests()->get(); 
                $Smark=0;
                $j=0;
                ?>

                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php   
                    $j++;
                  ?>
                  <?php $__currentLoopData = $student->marks->where('test_id',$test->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="<?php if($test->type == 1 AND $mark->value==!null ): ?> badge badge-primary <?php elseif($test->type == 2 AND $mark->value==!null): ?> badge badge-success <?php elseif($test->type == 3 AND $mark->value==!null): ?> badge badge-dark <?php else: ?> badge badge-danger  <?php endif; ?> ml-1 " style="font-size: 20px;" >
                    <?php echo e($test->testNum); ?> <hr class="hrr"><?php if($mark->value==null): ?> N <?php else: ?><?php echo e($mark->value); ?><?php endif; ?> 
                  </span>
                    <?php 
                    $Smark=$Smark + $mark->value;  
                   // $j++;
                    ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </td>
              
                <td> <!-- START CALCULE DE MOYENNE -->
                  <strong>
                    <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                    <span class="<?php if($subjectavg): ?> <?php if($subjectavg->valueGrle >= 10): ?> badge btn-vert text-white <?php else: ?> badge badge-danger text-white <?php endif; ?> <?php else: ?> badge btn-vert text-white  <?php endif; ?>  " style="font-size: 20px; width:65px;" ><?php if($subjectavg): ?> <?php echo e($subjectavg->valueGrle); ?> <?php else: ?> ... <?php endif; ?> </span> 
                  </strong> 
                </td> <!-- END CALCULE DE MOYENNE -->

                <td> <!-- START RANK -->
                  <strong>
                    <?php $subjectavg=$student->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                    <span class=" badge badge-secondary text-white " style="font-size: 20px; width:65px;" ><?php if($subjectavg): ?> <?php echo e($subjectavg->rank); ?> <?php else: ?> ... <?php endif; ?> </span> 
                  </strong> 
                </td> <!-- END RANK -->

              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>


                </div><!--END MODAL BODY -->
         
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                </div>

                </div><!--MODAL CONTENT -->
              </div><!--MODAL DIALOG -->


          </div><!-- Modal Edit teacher -->

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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


<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/admin/getClassroom7.blade.php ENDPATH**/ ?>