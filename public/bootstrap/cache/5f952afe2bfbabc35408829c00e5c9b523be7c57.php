


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>
  <?php $materiel="activve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Ressources des profs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

<h2 class="text-center">LES RESSOURCES PRIVEES POUR: <?php echo e($student->surname); ?> <?php echo e($student->name); ?></h2>

        <div class="table-responsive">

            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col"><p class="text-center">Ressources privées</p></th>
                <th scope="col"><p >Descriptions</p></th>
              </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $ressources1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ressource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr id="R<?php echo e($ressource->id); ?>">
                <td><p class="text-center">
                  <?php if($ressource->extension == "pdf"): ?> <i class="fa fa-file-pdf-o text-danger" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "doc" OR $ressource->extension == "docx"): ?> <i class="fa fa-file-word-o text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "xls" OR  $ressource->extension == "xlsx"): ?> <i class="fa fa-file-excel-o text-success" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "ppt" OR $ressource->extension == "pptx"): ?> <i class="fa fa-file-powerpoint-o text-warning" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "txt"): ?> <i class="fa fa-file-text-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "url"): ?> <i class="fa fa-link text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php else: ?> <i class="fa fa-file-image-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php endif; ?>
                  </p>

                  <p class="text-center" style="font-size:20px">
                  <b>
                  <?php if($ressource->extension == "pdf"): ?> DOCUMENT PDF
                  <?php elseif($ressource->extension == "doc" OR $ressource->extension == "docx"): ?> DOCUMENT WORD
                  <?php elseif($ressource->extension == "xls" OR  $ressource->extension == "xlsx"): ?> DOCUMENT EXCEL
                  <?php elseif($ressource->extension == "ppt" OR $ressource->extension == "pptx"): ?> DOCUMENT POWERPOINT
                  <?php elseif($ressource->extension == "txt"): ?> DOCUMENT TEXT
                  <?php elseif($ressource->extension == "url"): ?> LIEN EXTERNE
                  <?php else: ?> DOCUMENT ou IMAGE
                  <?php endif; ?>
                 </b>
                 </p>

                </td>
                <td>
                <p><?php echo e($ressource->description); ?></p>
                <p><b>Titre du document: </b> <?php echo e($ressource->title); ?> <br>
                <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?><br>
                <b>Professeur:</b>
                <?php echo e($ressource->teacher->name); ?> <?php echo e($ressource->teacher->surname); ?>

                </p>

                  <div class="btn-group">
                    <?php if($ressource->extension == "url"): ?>
                    <a href="<?php echo e($ressource->lien); ?>" class="btn btn-primary mr-2" target="_blank" >ACCEDER <i class="fa fa-globe" aria-hidden="true"></i></a>
                    <?php else: ?>
                    <a href="/files/ressource/<?php echo e($ressource->upload); ?>" class="btn btn-success mr-2" download="<?php echo e($ressource->upload); ?>"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>

        <?php if($ressources1->count() <=0): ?>

        <h2 class="text-center text-danger"> AUCUNE RESSOURCE PRIVEE DISPONIBLE POUR L'INSTANT</h2>

        <?php endif; ?>

<hr>

<h2 class="text-center">LES RESSOURCES POUR TOUTE LA CLASSE</h2>

            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col"><p class="text-center">Ressources pour la classe</p></th>
                <th scope="col"><p >Descriptions</p></th>
              </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $ressources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ressource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr id="R<?php echo e($ressource->id); ?>">
                <td><p class="text-center">
                  <?php if($ressource->extension == "pdf"): ?> <i class="fa fa-file-pdf-o text-danger" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "doc" OR $ressource->extension == "docx"): ?> <i class="fa fa-file-word-o text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "xls" OR  $ressource->extension == "xlsx"): ?> <i class="fa fa-file-excel-o text-success" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "ppt" OR $ressource->extension == "pptx"): ?> <i class="fa fa-file-powerpoint-o text-warning" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "txt"): ?> <i class="fa fa-file-text-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "url"): ?> <i class="fa fa-link text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php else: ?> <i class="fa fa fa-file-image-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php endif; ?>
                  </p>

                  <p class="text-center" style="font-size:20px">
                  <b>
                  <?php if($ressource->extension == "pdf"): ?> DOCUMENT PDF
                  <?php elseif($ressource->extension == "doc" OR $ressource->extension == "docx"): ?> DOCUMENT WORD
                  <?php elseif($ressource->extension == "xls" OR  $ressource->extension == "xlsx"): ?> DOCUMENT EXCEL
                  <?php elseif($ressource->extension == "ppt" OR $ressource->extension == "pptx"): ?> DOCUMENT POWERPOINT
                  <?php elseif($ressource->extension == "txt"): ?> DOCUMENT TEXT
                  <?php elseif($ressource->extension == "url"): ?> LIEN EXTERNE
                  <?php else: ?> DOCUMENT ou IMAGE
                  <?php endif; ?>
                 </b>
                 </p>

                </td>
                <td>
                <p><?php echo e($ressource->description); ?></p>
                <p><b>Titre du document: </b> <?php echo e($ressource->title); ?> <br>
                <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?><br>
                <b>Professeur:</b>
                <?php echo e($ressource->teacher->name); ?> <?php echo e($ressource->teacher->surname); ?>

                </p>

                  <div class="btn-group">
                    <?php if($ressource->extension == "url"): ?>
                    <a href="<?php echo e($ressource->lien); ?>" class="btn btn-primary mr-2" target="_blank" >ACCEDER <i class="fa fa-globe" aria-hidden="true"></i></a>
                    <?php else: ?>
                    <a href="/files/ressource/<?php echo e($ressource->upload); ?>" class="btn btn-success mr-2" download="<?php echo e($ressource->upload); ?>"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>

        </div>

        <?php if($ressources->count() <=0): ?>

        <h2 class="text-center text-danger"> AUCUNE RESSOURCE DES PROFS DISPONIBLE POUR L'INSTANT</h2>

        <?php endif; ?>

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/student/materiel.blade.php ENDPATH**/ ?>