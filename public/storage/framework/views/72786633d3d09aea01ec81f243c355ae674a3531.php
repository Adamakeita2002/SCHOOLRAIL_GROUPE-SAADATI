


<?php $__env->startSection('content'); ?>

  <?php $materiel="activve" ;?>
  <?php use Carbon\Carbon;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarM', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarM', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Standard</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">


            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">RESSOURCES DES PROFESSEURS EN LIGNE </th>
                <th scope="col">DESCRIPTIONS</th>
              </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $ressources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ressource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><p class="text-center">
                  <?php if($ressource->extension == "pdf"): ?> <i class="fa fa-file-pdf-o text-danger" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "doc" OR $ressource->extension == "docx"): ?> <i class="fa fa-file-word-o text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "xls" OR  $ressource->extension == "xlsx"): ?> <i class="fa fa-file-excel-o text-success" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "ppt" OR $ressource->extension == "pptx"): ?> <i class="fa fa-file-powerpoint-o text-warning" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "txt"): ?> <i class="fa fa-file-text-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php elseif($ressource->extension == "url"): ?> <i class="fa fa-link text-primary" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
                  <?php else: ?> <i class="fa fa-file-file-o" style="font-size:70px; padding-top: 10px" aria-hidden="true"></i>
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
                  <?php else: ?> DOCUMENT
                  <?php endif; ?>
                 </b>
                 </p>

                </td>
                <td>
                <p> <?php echo e($ressource->description); ?></p>
                <p><b>Titre du document: </b> <?php echo e($ressource->title); ?> <br>
                <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?><br>
                <b>Classe(s):</b>
                <?php $__currentLoopData = $ressource->classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($classroom->name); ?> -
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>

                  <div class="btn-group">
                    <?php if($ressource->extension == "url"): ?>
                    <a href="<?php echo e($ressource->lien); ?>" class="btn btn-primary mr-2" target="_blank" >ACCEDER <i class="fa fa-globe" aria-hidden="true"></i></a>
                    <?php else: ?>
                    <a href="/files/ressource/standard/<?php echo e($ressource->upload); ?>" class="btn btn-success mr-2" download="<?php echo e($ressource->upload); ?>"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                    <?php endif; ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#R<?php echo e($ressource->id); ?>">
                      SUPPRIMER <i class="icon-trash"></i>
                    </button>
                  </div>

              <!-- Modal -->
              <div class="modal fade" id="R<?php echo e($ressource->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/manager/DeleteRessource')); ?>" method="post" enctype="multipart/form-data">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE RESSOURCE <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                    <p><b>Titre du document: </b> <?php echo e($ressource->title); ?> <br>
                    <b>Date d'Emission: </b> <?php $date=Carbon::parse($ressource->created_at, 'UTC');?>
                    <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?><br>
                    <b>Classe(s):</b>
                    <?php $__currentLoopData = $ressource->classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($classroom->name); ?> -
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>

                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($ressource->id); ?>" hidden="">

                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LA RESSOURCE <i class="icon-trash"></i>
                  </button>

                  </div>

                </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                  </div>

                  </div>
                </div>
                </form>
              </div>
              <!--End Modal -->
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>




        </div>

        <?php if($ressources->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> AUCUNE RESSOURCE STANDARD EN LIGNE </button>
        </p>
        <?php endif; ?>

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/manager/rstandard.blade.php ENDPATH**/ ?>