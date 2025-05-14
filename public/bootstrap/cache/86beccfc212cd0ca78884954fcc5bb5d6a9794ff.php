


<?php $__env->startSection('content'); ?>


<?php use Carbon\Carbon;?>
  <?php $parametre="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Arrêt des notes</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>
 <!-- Page Heading
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>-->

<div class="col-sm-12">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">SEMESTRE EN COURS
    </a>
    <?php if($semesterP->arretDesNotes == 1): ?>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
    VUE GLOBALE
    </a>
    <?php endif; ?>
    <?php if($semesterP->arretDesNotes == 1): ?>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">NOTES ARRETEES PAR CLASSE
    </a>
    <?php endif; ?>
  </div>
</nav>

<br>

              <?php if(session('status1')): ?>
              <?php if($semesterP->arretDesNotes == 1): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
                  <br>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(session('status2')): ?>
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                      </div>
                  </div>
                  <br>
              <?php endif; ?>

<div class="tab-content" id="nav-tabContent">
  <!-- START SEMESTRE EN COURS -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <form  action="/manager/STOPNOTE" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
          <div class="row">

            <?php if($semesterP->arretDesNotes == 0): ?>
               <div class="col-sm-8 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b>L'ARRET DES NOTES NE PEUT ETRE ACTIVE UNIQUEMENT QUE PAR L'ADMINISTRATEUR</b><br>Une fois cela fait, vous pourrez acceder aux paramètres de l'arrêt des notes</div>
                 </div>
              </div>

            <?php else: ?>

              <div class="col-sm-3 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b><?php echo e($academicyearP->labelYear); ?></b></div>
                 </div>
              </div>

              <div class="col-sm-3 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b><?php echo e($semesterP->label); ?></b></div>
                </div>
              </div>

              <div class="col-sm-3 pt-2">
                  <div class="card text-white bg-primary mb-3" >
                  <div class="card-header"><b>ARRET DES NOTES EN COURS ...</b></div>
                </div>
              </div>


            <?php endif; ?>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Voulez-vous confirmer l'arrêt des notes?</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>En confirmant l'arrêt des notes, les professeurs pourrons procéder au calcul des moyennes du semestre en cours</p>
                    <p class="text-center"><button class="btn btn-bordo" type="submit" >CONFIRMER</button></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

      </form>
  </div>
<!-- END SEMESTRE EN COURS -->


<!-- START SITUATION -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    <?php $__currentLoopData = $classrooms->sortByDesc('semesterAvg'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($classroom->semesterAvg == 1): ?> <!-- START SEMESTERAVG -->
      <div class="card ">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-body bg-success" >
            <img src="/img/large/xclassroom.jpg" width="100" height="100" class="rounded-circle mx-auto d-block">
              <h4 class="card-title text-center " style="color:white;">
               <b><?php echo e($classroom->name); ?></b>
              </h4>
              <hr>
              <h4 class="text-center text-white"><b>LES MOYENNES DE CETTE CLASSE ONT ETE CALCULEES</b><br><b><?php echo e($semesterP->label); ?></b></h4>

            </div>
          </div>
        </div>
      </div>
      <hr>

      <?php else: ?> <!-- ELSE SEMESTERAVG -->

            <div class="card ">
        <div class="row">

          <div class="col-sm-2">
            <div class="card-body" style="background-color: #c22e6d">
            <img src="/img/large/xclassroom.jpg" width="100" height="100" class="rounded-circle mx-auto d-block">
              <h4 class="card-title text-center " style="color:white;">
               <?php echo e($classroom->name); ?>

              </h4>
              <hr>
            </div>
          </div>
           <div class="col-sm-8">
            <div class="card-body">
              <h6 class="card-title text-danger" >
                <?php $subjects=$semesterP->subjects()->where('classroom_id',$classroom->id)->get(); ?>
              <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($subject->arretDesNotes == 1): ?>
               <span class="text-success">(<?php echo e($subject->name); ?> - <b><?php echo e($subject->teacher->name); ?> <?php echo e($subject->teacher->surname); ?></b>) ,</span>
               <?php else: ?>
               (<?php echo e($subject->name); ?> - <b><?php echo e($subject->teacher->name); ?> <?php echo e($subject->teacher->surname); ?></b>) ,
               <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </h6>
              <hr>
                <?php
                $arreted=$semesterP->subjects()->where('classroom_id',$classroom->id)->where('arretDesNotes',1)->count();
                $NotArreted=$semesterP->subjects()->where('classroom_id',$classroom->id)->where('arretDesNotes',0)->count();
                $Csubjects=$semesterP->subjects()->where('classroom_id',$classroom->id)->count() ;
                ?>
              <span class="badge badge-dark mb-1" style="font-size: 15px"><?php echo e($semesterP->label); ?></span><br>
              <?php if($arreted == $Csubjects): ?>

                 <a href="#" class="btn btn-bordo" data-toggle="modal" data-target="#exampleModal<?php echo e($classroom->id); ?>">
                   <b>CALCULER LES MOYENNES</b>
                 </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Voulez-vous confirmer le calcul des moyennes</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-center">En confirmant, les moyennes de <br><b>(<?php echo e($classroom->name); ?>)</b><br> au compte du <?php echo e($semesterP->label); ?> seront calculées et marquées définitives</p>
                         <form  action="/manager/buildSemesterMoy" method="post" enctype="multipart/form-data" id="theform">
                           <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                           <input type="hidden" name="classID" value="<?php echo e($classroom->id); ?>">
                           <p class="text-center" ><button class="btn btn-bordo"><b>CONFIRMER</b></button></p>
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script type="text/javascript">
                  $(function()
                {
                  $('#theform8').submit(function(){
                    $("button[type='submit']", this)
                     // .val('Please Wait...')
                      .attr('disabled', 'disabled')
                      .html('Veuillez patienter...');
                    return true;
                  });
                });
                </script>




              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card-body">
              <h4 class="card-title text-center " >
                <?php if($arreted == $Csubjects): ?>
               <i class="fa fa-check-circle text-success" style="font-size: 42px" aria-hidden="true"></i><br>
               <span class="text-success text-center"> Toutes les notes ont été arrêtées </span><br>
                <?php else: ?>
                <i class="fa fa-times-circle text-danger" style="font-size: 42px" aria-hidden="true"></i><br>
                <span class="text-danger text-center"> <?php echo e($arreted); ?> / <?php echo e($Csubjects); ?> </span> <br>
                <span class="text-danger text-center"> Notes arrêtées</span>
                <?php endif; ?>
              </h4>

            </div>
          </div>

        </div>
      </div>
      <hr>


      <?php endif; ?> <!-- END SEMESTERAVG -->


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br>
  </div>
<!--END SITUATION -->

<!--PAR CLASSE -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

        <div class="row"> <!-- START ROW -->

          <div class="col-12 col-lg-6">
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label><b>Déterminer la classe</b></label>
                  <input type="text" name="classroom_fullname" id="classroom3" class="form-control" placeholder="Déterminer la classe"
                  list="classroom_fullname"/>
                  <datalist  id="classroom_fullname">
                  <label> Selectionnez dans la liste
                  <select class="form-control" required>
                    <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($classroom->name); ?>"><?php echo e($classroom->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                   </label>
                  </datalist>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showClassroom3();" value="RECHERCHER">
                </div>
              </div>
            </div>
          </div>

        </div> <!-- END ROW -->
        <br>
        <hr>

        <span id="demo3"></span>

  </div>
<!--END PAR CLASSE -->
</div>



  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->

<script>

$(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});

/*******************************************/

function showClassroom3() {

  var s3 = document.getElementById('classroom3');
  var classroom3 = s3.value ;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getStopMark?q="+classroom3,true);
  xhttp.send();
}

/*******************************************/

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/stopMark.blade.php ENDPATH**/ ?>