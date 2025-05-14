


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>
  <?php $ressource="activve" ;?>
<!-- CHECK BOX HANDLER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>
<!--END CHECK BOX HANDLER -->

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Ressources</li>
            <li class="breadcrumb-item active" aria-current="page">Par élève</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status2')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>
              <?php if(session('status3')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status3')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

  <h6 class="my-4 text-center">LISTE DES ELEVES DE LA CLASSE <b><?php echo e($classroom->name); ?></b></h6>

<hr>

<?php if(!empty($classroom->students)): ?>


            <form  action="/teacher/CreateRessourceDocumentStudent" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

<div class="row">

          <div class="col-sm-5">

                <div class="form-group">
                  <label><b>Entrer un titre à cette ressource</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>
                  <label><b>Sélectionner le document</b></label>
                  <div class="form-group">
                   <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>-->
                    <input type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation , text/plain, application/pdf, .jpg, .jpeg, .png" class="btn btn-secondary" name="upload_file" required>
                  </div>
          </div>

          <div class="col-sm-6">


                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>




        </div>

</div>
                <!--  </form>    -->

<hr>



  <?php $__currentLoopData = $classroom->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card ">

    <div class="row">
      <div class="col-sm-2">

        <div class="card-body" style="background-color: #26bc2c">
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
            <h6 ><b> Classe :  </b>
              <span><?php echo e($student->classroom->name); ?></span>
            </h6>

          <hr>
                <h6 ><b> Email : </b>
                  <span><?php echo e($student->email); ?></span>
                </h6>
          <hr>
                <h6 ><b> Téléphone : </b>
                  <span><?php echo e($student->tel); ?></span>
                </h6>
          <hr>

                <h6 ><b> Adresse : </b>
                  <span><?php echo e($student->address); ?></span>
                </h6>

        <hr>
             <h6 ><b> Genre : </b>
              <span><?php if($student->gender=='M'): ?> Masculin <?php elseif($student->gender=='F'): ?> Feminin  <?php endif; ?></span>
            </h6>
        <hr>

          </div>
        </div>

        <div class="col-sm-5">
          <div class="card-body">

                  <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="student[]" required id="S<?php echo e($student->id); ?>" value="<?php echo e($student->id); ?>"/>
                          <span class="check-mark"></span>COCHEZ
                      </label>
                  </div>
                  <br>
                <h6 ><b> Ressources envoyées personnellement à cet élève : <br> </b>
          <?php // dd($student->ressources);  ?>
                <?php if($student->ressources->count() >0 ): ?>
                  <?php $__currentLoopData = $student->ressources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ressource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="#" title="<?php echo e($ressource->description); ?>"><span class="text-center badge badge-primary" ><b><?php echo e($ressource->title); ?></b><br>
<i><?php echo e($ressource->teacher->name); ?> <?php echo e($ressource->teacher->surname); ?></i></span></a> ,
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <span class="text-danger"> <b>AUCUNE RESSOURCE ENVOYEE PERSONNELLEMENT A CET ELEVE</b></span>
                <?php endif; ?>
                </h6>

          </div>
        </div>

    </div>


    </div>
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-group">
                   <p class="text-center"><button class="btn btn-success" name="submit" type="submit">
                     <b>Créer la ressource pour les élèves sélectionnés</b>
                    </button></p>
                  </div>
    <hr>
<?php else: ?>
<h3 class="text-danger text-center"><b>AUCUN ELEVE DANS CETTE CLASSE</b></h3>
<?php endif; ?>
</form>
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/SressourceStudent.blade.php ENDPATH**/ ?>