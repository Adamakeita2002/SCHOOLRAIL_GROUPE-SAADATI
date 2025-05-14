


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>

  <?php $calendar="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xcalendrier.jpg" alt="Card image" style="width:260px; padding-top: 20px">
            </div>

            <div class="col-md-5">

            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <form  action="/teacher/CreateCalendar" method="post" enctype="multipart/form-data" id="theform">
                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                  <div class="form-group">
                    <label>Classe / Matière</label>
                    <select class="form-control" name="subject_id" required>
                      <option value="">Classe et Matière</option>
                      <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option  value="<?php echo e($subject->id); ?>"><?php echo e($subject->classroom->name); ?> / <?php echo e($subject->name); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Déterminer le type de test
                      <span class="badge badge-primary ml-3" >Interrogation</span>
                      <span class="badge badge-success ml-3" >Devoir</span>
                      <span class="badge badge-dark ml-3" >Examen</span>
                    </label>
                    <select class="form-control" name="epreuve_id" required>
                      <option value="">Test  </option>
                      <?php $__currentLoopData = $epreuves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $epreuve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($epreuve->id); ?>"><?php echo e($epreuve->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                  <div class="form-group ">
                    <label>Entrez la date du test </label>
                    <small class="text-danger"><b>( 1 jour minimum à respecter)</b></small>
                    <input type="date" name="date" class="form-control" required="">
                  </div>

                  <div class="form-group ">
                    <label>Entrez l'heure du test </label>
                    <input type="time" name="time" class="form-control" required="">
                  </div>


                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Inserer dans le calendrier
                    </button>
                  </div>

              </form>
<script type="text/javascript">
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
</script>
              <?php if(session('status1')): ?>
              <?php $Tcalendar= $calendars->sortByDesc('id')->first(); ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br>
                            <?php $date=Carbon::parse($Tcalendar->date, 'UTC');?>
                            <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?>

                       </b><br> à <br>
                            <?php $time=Carbon::parse($Tcalendar->time, 'UTC'); ?>
                        <b><?php echo date("G:i", strtotime($Tcalendar->time)); ?></b>
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
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status3')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

            </div>

          <div class="col-md-4">

            <div class="callout callout-warning">
              <h5>Champ obligatoire <i class="icon-pin"></i></h5>
              <p>Vous devez imperativement remplir tous les champs, pour que la date soit ajoutée au calendrier</p>
            </div>

            <div class="callout callout-warning">
              <h5>Le tableau ci dessous <i class="icon-pin"></i></h5>
              <p>Vous avez une illustration de vos dates dans le tableau ci-dessous, classées par ordre decroissant</p>
            </div>

          </div>


        </div>

        <hr>

    <div class="row">

         <div class="table-responsive">
          <div class="card-body">
            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">CLASSE</th>
                <th scope="col">MATIERE</th>
                <th scope="col">TEST</th>
                <th scope="col">DATE / HEURE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $calendars->sortByDesc('timing'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $Ndate=now();
              $Cdate=$calendar->date;
            //  echo $Ndate;
             // $dateN = new DateTime($Ndate);
              //$dateC = new DateTime($Cdate);
            ?>
              <tr>
                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?> " ><?php echo e($classrooms->where('id',$calendar->classroom_id)->pluck('name')->first()); ?></td>

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?> " ><?php echo e($subjects->where('id',$calendar->subject_id)->pluck('name')->first()); ?></td>

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?> " >
                  <p class="<?php if($calendar->epreuve_id == 1): ?> badge badge-primary <?php elseif($calendar->epreuve_id == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?> " style="font-size: 18px" ><?php echo e($epreuves->where('id',$calendar->epreuve_id)->pluck('name')->first()); ?></p>
                </td>

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?> ">
                  <?php $date=Carbon::parse($calendar->date, 'UTC');?>
                 <b><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?></b>
                  <br>
                  <?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <b><?php echo date("G:i", strtotime($calendar->time)); ?></b>

                </td>

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?> " >
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#T<?php echo e($calendar->id); ?>">
                SUPPRIMER <i class="icon-trash"></i>
              </button>
              <!-- Modal -->
              <div class="modal fade" id="T<?php echo e($calendar->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/teacher/DeleteCalendar')); ?>" method="post" enctype="multipart/form-data" id="theform2">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE DATE <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                  <p><b><?php echo e($classrooms->where('id',$calendar->classroom_id)->pluck('name')->first()); ?> / <?php echo e($subjects->where('id',$calendar->subject_id)->pluck('name')->first()); ?></b>
                  </p>

                  <p class=" <?php if($calendar->epreuve_id == 1): ?> badge badge-primary <?php elseif($calendar->epreuve_id == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?> " style="font-size: 15px;" ><?php echo e($epreuves->where('id',$calendar->epreuve_id)->pluck('name')->first()); ?>

                  </p>

                  <p>
                    <b><?php $date=Carbon::parse($calendar->date, 'UTC');?>
                    <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?>

                     </b>

                    <b><?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                    <?php echo date("G:i", strtotime($calendar->time)); ?>
                    </b>
                  </p>

                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($calendar->id); ?>" hidden="">

                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LA DATE <i class="icon-trash"></i>
                  </button>

                  </div>

                </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                  </div>

                  </div>
                </div>
                </form>
<script type="text/javascript">
  $(function()
{
  $('#theform2').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
              </div>
              <!--End Modal -->

                </td>

              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>

  </div>

        <!-- EMPTY HANDLER -->
        <?php if($calendars->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun calendrier en ligne </button>
        </p>
        <?php endif; ?>
        <!-- END EMPTY HANDLER -->





        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/calendar.blade.php ENDPATH**/ ?>