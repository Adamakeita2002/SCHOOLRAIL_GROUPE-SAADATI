        <?php use Carbon\Carbon;?>

        <?php $__currentLoopData = $students->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #c22e6d">
        <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
          <h4 class="card-title text-center " style="color:white;">
           <?php echo e($student->name); ?> <?php echo e($student->surname); ?>

          </h4>
          <hr>
          <h4 class="card-title text-center " style="color:white;">
           <b><?php echo e($student->matricule); ?></b>
          </h4>
        </div>

        </div>

        <div class="col-sm-5">
          <div class="card-body">
            <h4 class="card-title " ><b> Classe :  </b>
              <span><?php echo e($student->classroom->name); ?></span>
              <?php if( empty($student->classroom_id)): ?>
              <span class="text-danger"> <b>Aucune Classe</b></span>
              <span>
              <a class="btn btn-primary" href="/kuro/admin/affectStudent">
              AFFECTER
              </a>
            </span>
              <?php endif; ?>
            </h4>

        <hr>
              <h4 class="card-title " ><b> Nationalité :  </b>
                <span><?php echo e($student->nationality); ?></span>
              </h4>
        <hr>
              <h4 class="card-title " ><b> Age : </b>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?>
                <span><?php echo e($years); ?></span>
              </h4>
        <hr>
             <h4 class="card-title " ><b> Genre : </b>
              <span><?php if($student->gender=='M'): ?> Masculin <?php elseif($student->gender=='F'): ?> Feminin  <?php endif; ?></span>
            </h4>


          </div>
        </div>


          <div class="col-sm-5">
            <div class="card-body">
                <h4 class="card-title " ><b> Email : </b>
                  <span><?php echo e($student->email); ?></span>
                </h4>
          <hr>
                <h4 class="card-title " ><b> Téléphone : </b>
                  <span><?php echo e($student->tel); ?></span>
                </h4>
          <hr>

                <h4 class="card-title " ><b> Adresse : </b>
                  <span><?php echo e($student->address); ?></span>
                </h4>
          <hr>


          </div>
        </div>

    </div>



  <div class="card-body">

<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

  <div class="row">

    <div class="col-sm-6"><!-- COL 6 -->

      <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM3<?php echo e($student->id); ?>" ><b>MODIFIER</b></button></p> <!-- MODIFY BUTTON -->

    <!-- Modal Edit student -->
    <div class="modal fade" id="MM3<?php echo e($student->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit student -->
    <form action="<?php echo e(URL::to('/kuro/admin/modifyStudent')); ?>" method="post" enctype="multipart/form-data">
      <!--EDIT FORM-->
      <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
      <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
        <div class="modal-content"> <!--MODAL CONTENT -->
          <div class="modal-header"> <!--MODAL HEADER -->
              <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant cet étudiant
                <b><?php echo e($student->name); ?> <?php echo e($student->surname); ?></b>
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
                    <input type="text" name="name" placeholder="<?php echo e($student->name); ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier le prénom(s) de l' étudiant</b></label>
                    <input type="text" name="surname" placeholder="<?php echo e($student->surname); ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Date de naissance de l' étudiant <?php echo e($student->dateofbirth); ?></b></label>
                    <input type="date" name="dateofbirth" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Modifier la nationalité de l' étudiant</b></label>
                    <input type="texte" name="nationality" placeholder="<?php echo e($student->nationality); ?>" class="form-control">
                  </div>

              </div>

              <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Modifier le genre</b></label>
                        <select class="form-control" name="gender">
                          <option value="">Genre (<?php echo e($student->gender); ?>)</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'email de l' étudiant</b></label>
                        <input type="email" name="email" placeholder="<?php echo e($student->email); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier le contact de l' étudiant</b></label>
                        <input type="number" name="tel" placeholder="<?php echo e($student->tel); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Modifier l'adresse de l' étudiant</b></label>
                        <input type="texte" name="address" placeholder="<?php echo e($student->address); ?>" class="form-control">
                      </div>


                      <input type="hidden" class="form-control" name="id" value="<?php echo e($student->id); ?>" hidden="">

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

  </div> <!-- END COL 6 -->

  <div class="col-sm-6"><!-- COL 6 -->

    <!-- START Delete student -->
    <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD3<?php echo e($student->id); ?>" ><b>SUPPRIMER</b></button></p>

      <!-- Modal Delete student -->
      <div class="modal fade" id="MD3<?php echo e($student->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="<?php echo e(URL::to('/kuro/admin/deleteStudent')); ?>" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
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
              <?php echo e($student->name); ?> <?php echo e($student->surname); ?>

              </h4>

              <input type="hidden" class="form-control" name="id" value="<?php echo e($student->id); ?>" hidden="">
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
      <!--END DELETE FORM -->
      </form>
    </div>

  </div><!-- END COL 6 -->

    </div>
  </div>
</div>
<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($students->count()<=0): ?>
<h3 class="text-danger text-center"><b>AUCUN ETUDIANT NE CORRESPOND A CETTE RECHERCHE</b></h3>
<hr>
<?php endif; ?>
<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/admin/getStudent3.blade.php ENDPATH**/ ?>