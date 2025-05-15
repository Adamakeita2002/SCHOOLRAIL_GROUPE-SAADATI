


<?php $__env->startSection('content'); ?>

  <style type="text/css">

.hrr{
margin-top: 0.2rem;
margin-bottom: 0.2rem;
border: 0;
border-top-color: currentcolor;
border-top-style: none;
border-top-width: 0px;
border-top: 1px solid rgba(255,255,255);
}

.hrr {
-webkit-box-sizing: content-box;
box-sizing: content-box;
height: 0;
overflow: visible;
}

.vl {
  border-left: 3px solid green;
  height: 500px;
}

</style>
  
  <?php $paiement="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page"> <a href="/student">Accueil</a> </li>
            <li class="breadcrumb-item active" aria-current="page">Paiements</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

          <div class="accordion pt-2 pb-2"  id="accordionExample<?php echo e($student->classroom->id); ?>">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne<?php echo e($student->classroom->id); ?>">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo e($student->classroom->id); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($student->classroom->id); ?>">
                <b><?php echo e($student->name); ?> <?php echo e($student->surname); ?></b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne<?php echo e($student->classroom->id); ?>" class="collapse show" aria-labelledby="headingOne<?php echo e($student->classroom->id); ?>" data-parent="#accordionExample<?php echo e($student->classroom->id); ?>">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col" style="font-weight: bold; color: white;">VERSEMENTS</th>
              </tr>
            </thead>
            
            <tbody>

                    <?php 
                    $T =0;  
                    $x=1;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>SCOLARITE</b>  <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>

                    <?php 
                    $T =0;  
                    $x=2;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>CANTINE</b> <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>


                    <?php 
                    $T =0;  
                    $x=3;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>BUS</b>  <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>

                    <?php 
                    $T =0;  
                    $x=4;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>TENUE SCOLAIRE (CLASSE)</b> <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>

                    <?php 
                    $T =0;  
                    $x=5;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>TENUE SCOLAIRE (SPORT)</b> <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>

                    <?php 
                    $T =0;  
                    $x=6;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE (BASKET)</b>  <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>

                    <?php 
                    $T =0;  
                    $x=7;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE (NATATION)</b> <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>

                    <?php 
                    $T =0;  
                    $x=8;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE (TAEKWONDO)</b>  <br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>


                    <?php 
                    $T =0;  
                    $x=9;
                    ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

              <tr> 
                <td>
                  <b>FOURNITURE</b><br> 
                  <span class="badge badge-dark" ><b><?php echo e(number_format($T)); ?> FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  <?php if($V<=0): ?>
                <td> <b>Aucun Versement</b> </td>

                  <?php else: ?>                   
                  <td>
                    <?php $i =1;  ?>
                    <?php $__currentLoopData = $student->versements->where('type',$x); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <span class="badge <?php if($x==1): ?>btn-primary 
                    <?php elseif($x==2): ?>btn-warning
                    <?php elseif($x==3): ?>btn-success 
                    <?php elseif($x==4): ?>btn-frose 
                    <?php elseif($x==5): ?>btn-frose 
                    <?php elseif($x==6): ?>btn-forange
                    <?php elseif($x==7): ?>btn-forange
                    <?php elseif($x==8): ?>btn-forange
                    <?php elseif($x==9): ?>btn-fmarron
                    <?php endif; ?>
                    <?php if(!empty($verse)): ?>
                      <?php if($versement->id == $verse->id): ?>badge-secondary <?php endif; ?>
                    <?php endif; ?>
                    <?php if($i==1 AND $x==1): ?>btn-dark <?php endif; ?>
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b><?php echo e(number_format($versement->amount)); ?> FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </td>                 
                  <?php endif; ?>
              </tr>



            </tbody>
          </table>


                </div>

              </div>
            </div>
          
          </div>
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<!-- CARD CAROUSEL JS 
<script type="text/javascript">

(function ($) {
  "use strict";
  // Auto-scroll
  $('#myCarousel').carousel({
    interval: 200
  });

  // Control buttons
  $('.next').click(function () {
    $('.carousel').carousel('next');
    return false;
  });
  $('.prev').click(function () {
    $('.carousel').carousel('prev');
    return false;
  });

  // On carousel scroll
  $("#myCarousel").on("slide.bs.carousel", function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;
    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide -
          (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end 
        if (e.direction == "left") {
          $(
            ".carousel-item").eq(i).appendTo(".carousel-inner");
        } else {
          $(".carousel-item").eq(0).appendTo(".carousel-inner");
        }
      }
    }
  });
})
(jQuery);

</script>  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/student/mark.blade.php ENDPATH**/ ?>