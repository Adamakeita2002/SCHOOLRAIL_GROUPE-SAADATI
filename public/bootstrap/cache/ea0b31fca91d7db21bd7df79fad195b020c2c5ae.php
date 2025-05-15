        <nav class="navbar navbar-expand navbar-light bg-white">
          
          <button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="icon-menu"></i></button><!-- MENU BUTTON-->
          <?php 
          if ($academicyearP) {
          	$semesterPro= $academicyearP->semesters->where('state','process')->first();  
          }
          ?>
          <div class="navbar-brand"><?php if(isset($semesterPro)): ?> <?php echo e($semesterPro->label); ?> <?php else: ?> Bienvenue! <?php endif; ?>  </div>

        </nav>

<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/layouts/navbarA.blade.php ENDPATH**/ ?>