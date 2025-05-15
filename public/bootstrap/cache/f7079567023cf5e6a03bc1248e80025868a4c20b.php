        <?php use Carbon\Carbon;?>
          <div class="accordion pt-2 pb-2" style="width:1250px" id="accordionExample<?php echo e($classroom->id); ?>">
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
                <th scope="col">NOM ET PRENOM DU PROFESSEUR</th>
                <th scope="col">MATIERE(s) ENSEIGNEE(s)</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ACTION</th>
                
              </tr>
            </thead>

            <tbody>
          <?php for($i=0; $i < count($UniqueTeacherSubjs); $i++): ?>
             <?php $teacher=$teachers->where('id',$UniqueTeacherSubjs[$i])->first();?>
              <tr> 
                <td><b><?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?></b></td>

                <td>
                  <?php $subjects=$semesterP->subjects()->where('teacher_id',$teacher->id)->get();?> 
                  <?php $__currentLoopData = $subjects->where('classroom_id',$classroom->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <b><?php echo e($subject->name); ?>,</b>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>

                <td> <b>(<?php echo e($teacher->email); ?>)</b></td>   

                <td>
                  <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->
  <a href="#" data-toggle="modal" data-target="#MMTE2<?php echo e($teacher->id); ?>" style="color: orange;">Modifier</a>|
  
  <!-- Modal Edit teacher -->
    <div class="modal fade" id="MMTE2<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
    <form action="<?php echo e(URL::to('/kuro/admin/modifyTeacher1')); ?>" method="post" enctype="multipart/form-data"> 
      <!--EDIT FORM-->
      <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant ce professeur
                <b><?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?></b> 
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
                    <input type="text" name="name" placeholder="<?php echo e($teacher->name); ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier le prénom(s) du professeur</b></label>
                    <input type="text" name="surname" placeholder="<?php echo e($teacher->surname); ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Date de naissance du professeur (<?php echo e($teacher->dateofbirth); ?>)</b></label>
                    <input type="date" name="dateofbirth"  class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier la nationalité du professeur</b></label>
                    <input type="texte" name="nationality" placeholder="<?php echo e($teacher->nationality); ?>" class="form-control">
                  </div>  
                
              </div>

              <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Modifier le genre</b></label>
                        <select class="form-control" name="gender">
                          <option value="">Genre (<?php echo e($teacher->gender); ?>)</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div> 

                      <div class="form-group">
                        <label><b>Modifier l'email du professeur</b></label>
                        <input type="email" name="email" placeholder="<?php echo e($teacher->email); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier le contact du professeur</b></label>
                        <input type="number" name="tel" placeholder="<?php echo e($teacher->tel); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'adresse du professeur</b></label>
                        <input type="texte" name="address" placeholder="<?php echo e($teacher->address); ?>" class="form-control">
                      </div>                       


                      <input type="hidden" class="form-control" name="id" value="<?php echo e($teacher->id); ?>" hidden="">

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



   <a href="#" data-toggle="modal" data-target="#MDTE2<?php echo e($teacher->id); ?>" style="color: red;">Supprimer</a>
      <!-- Modal Delete teacher -->
      <div class="modal fade" id="MDTE2<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="<?php echo e(URL::to('/kuro/admin/deleteTeacher1')); ?>" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
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
              <?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?> <br>
              (<?php echo e($teacher->email); ?>)
              </h4>
  
              <input type="hidden" class="form-control" name="id" value="<?php echo e($teacher->id); ?>" hidden="">
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
              <?php endfor; ?>
            </tbody>
          </table>

                  <!-- NOTE TOGGLE -->
                  <p>
                    <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample<?php echo e($classroom->id); ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo e($classroom->id); ?>">
                      PLUS D'INFOS <b>(<?php echo e($classroom->name); ?>)</b>
                    </a>
                  </p>

                  <!-- NOTE TOGGLE -->
                  

                  <!--END NOTE TOGGLE -->

                </div>

              </div>
            </div>
          
          </div><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/getTeacher2.blade.php ENDPATH**/ ?>