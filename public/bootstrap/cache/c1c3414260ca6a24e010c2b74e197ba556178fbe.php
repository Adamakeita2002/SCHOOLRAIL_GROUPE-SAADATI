        <?php use Carbon\Carbon;?>

          <div class="row">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MATIERE</th>
                <th scope="col">TEST</th>
                <th scope="col">DATE / HEURE</th>
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
              <tr id="C<?php echo e($calendar->id); ?>"> 

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?>  "><?php echo e($calendar->subject->name); ?></td>

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?>  " ><p class="<?php if($calendar->epreuve_id == 1): ?> badge badge-primary <?php elseif($calendar->epreuve_id == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?> " style="font-size: 18px" ><?php echo e($calendar->epreuve->name); ?></p></td>

                <td style="<?php if($Ndate > $Cdate ): ?> background-color: #ff000036; <?php endif; ?>  ">
                  <?php $date=Carbon::parse($calendar->date, 'UTC');?>   
                 <b><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?></b>
                  <br>
                  <?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <b><?php echo date("G:i", strtotime($calendar->time)); ?></b>

                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

                </div>

          </div>


        <!-- EMPTY HANDLER -->
        <?php if($calendars->count() <= 0 ): ?> 
        <p class="text-center">
          <button class="btn btn-danger"> Pas de calendrier disponible </button>
        </p>
        <?php endif; ?>
        <!-- END EMPTY HANDLER --><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/getCalendar.blade.php ENDPATH**/ ?>