


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>
  <?php $q=$_GET["q"] ;?>

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
            <li class="breadcrumb-item " aria-current="page">Elève</li>
            <li class="breadcrumb-item active" aria-current="page">Liste élève</li>
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

                <!--  </form>    -->  

<hr>
<?php if(!empty($classroom->students)): ?>
        <div class="table-responsive">
          <div class="card-body">
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">INFORMATION(s)</th>


              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $classroom->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr> 
                <td><?php echo e($student->name); ?> </td>
                <td><?php echo e($student->surname); ?></td>
                <td><?php echo e($student->email); ?> <br> <?php echo e($student->tel); ?></td>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody>
          </table>

    <hr>

          </div>

        </div>

<?php else: ?>
<h3 class="text-danger text-center"><b>AUCUN ELEVE DANS CETTE CLASSE</b></h3>
<?php endif; ?>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/ListeStudentInfo.blade.php ENDPATH**/ ?>