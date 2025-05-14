


<?php $__env->startSection('content'); ?>

  <?php $quiz="activve" ;?>
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
            <li class="breadcrumb-item active " aria-current="page">Questions - Réponses</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

  <div class="row justify-content-md-center">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4 card-header text-center bg-primary text-white">QUESTIONS / REPONSES</h1>

        <?php $i=0;  ?>
            <!-- Blog Post -->
            <?php $__currentLoopData = $Qsubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(is_array($subject->questions) || is_object($subject->questions)): ?>
        <?php $__currentLoopData = $subject->questions->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php $i++;  ?>
            <div class="card mb-4" id="Q<?php echo e($question->id); ?>">
              <div class="card-body" style="color:white; background:#51970ccc !important; ">
                <div class="row">
                  <div class="col-sm-2">
                    <?php if($question->student->gender =='M'): ?>
                    <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                    <?php else: ?>
                    <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-10">
                    <h2 class="card-title"><?php echo e($question->title); ?> <b>(<?php echo e($question->classroom->name); ?>)</b></h2>
                    <p class="card-text "><?php echo e($question->description); ?> </p>
                    <p>- Posté <b><?php echo e($question->created_at->diffForHumans()); ?></b> par <i><b> <?php echo e($question->student->name); ?> <?php echo e($question->student->surname); ?> </b></i> -/-</p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p>
                <span class="pull-left" >
                    <a class="text-secondary" data-toggle="collapse" href="#collapseExample<?php echo e($question->id); ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                      <?php echo e($question->qcomments->count()); ?> Commentaires
                      <i class="icon-bubble" style="font-size: 20px;"></i>
                    </a>
                </span>

                <?php if($question->qcomments->where('teacher_id',$question->subject->teacher->id)->count() >= 1): ?>
                <span class="pull-right text-success pr-3">
                 Vous avez déja réagi à cette question <?php echo e($question->qcomments->where('teacher_id',$question->subject->teacher->id)->count()); ?>

                 fois
                <i class="fa fa-thumbs-o-up" style="font-size: 20px;" aria-hidden="true"></i>
                </span>
                <?php else: ?>
                <span class="pull-right text-danger">
                 <i class="fa fa-thumbs-o-down" style="font-size: 20px;" aria-hidden="true"></i>
                 Le professeur  n'a pas encore réagi à cette question
                </span>
                <?php endif; ?>
                <!--
                <span class="pull-right pr-3">
                 <a href="#"><u>Commentez</u> </a>
                </span>
                -->
                </p>
                <br>


                <!-- COMMENT TOGGLE -->
                <div class="collapse <?php if(isset($X) AND $X==$question->id): ?> show <?php endif; ?>" id="collapseExample<?php echo e($question->id); ?>">
                    <div class="card-footer">
                      <?php $__empty_1 = true; $__currentLoopData = $question->qcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qcomment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($qcomment->student_id): ?>
                      <div class="row" >
                        <div class="col-sm-2">
                          <?php if($qcomment->student->gender =='M'): ?>
                          <img src="/assets/img/john-doe.png" class="rounded-circle" width="100">
                          <?php else: ?>
                          <img src="/assets/img/jane-doe.png" class="rounded-circle" width="100">
                          <?php endif; ?>
                        </div>
                        <div class="col-sm-10 pt-2">
                          <p class="card-text text-dark"><?php echo e($qcomment->description); ?></p>
                        </div>
                        <div class="card-footer text-muted mt-2" style="background-color:rgba(117, 127, 134, 0.3);">
                          <p>- Commenté <b><?php echo e($qcomment->created_at->diffForHumans()); ?></b> par <i><b><a href="#" ><?php echo e($qcomment->student->name); ?> <?php echo e($qcomment->student->surname); ?></a></b></i> -
                          </p>
                        </div>
                      </div>
                <?php else: ?>
                      <div class="row" style="background:white;" >
                        <div class="col-sm-2">
                          <?php if($qcomment->teacher->gender =='M'): ?>
                          <img src="/assets/img/img_avatar1.png" class="rounded-circle" width="100">
                          <?php else: ?>
                          <img src="/assets/img/img_avatar2.png" class="rounded-circle" width="100">
                          <?php endif; ?>
                        </div>
                        <div class="col-sm-10 pt-2">
                          <p class="card-text text-dark"><?php echo e($qcomment->description); ?></p>
                        </div>
                        <div class="card-footer text-muted mt-2" style="background:white;">
                          <p>- Commenté <b><?php echo e($qcomment->created_at->diffForHumans()); ?></b> par le professeur <i><b><a href="#" ><?php echo e($qcomment->teacher->fullname); ?> </a></b></i> -
                          </p>
                        </div>
                      </div>
                <?php endif; ?>
                      <hr >
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <p class="card-text text-danger">Ce Sujet n'a pas encore été commenté</p>
                      <hr >
                      <?php endif; ?>

                      <div class="row justify-content-end">
                        <div class="col-sm-2">
                          <?php if($teacher->gender =='M'): ?>
                          <img src="/assets/img/img_avatar1.png" class="rounded-circle" width="100">
                          <?php else: ?>
                          <img src="/assets/img/img_avatar2.png" class="rounded-circle" width="100">
                          <?php endif; ?>
                        </div>
                        <div class="col-sm-9">

                          <form  action="/teacher/CreateQcomment" method="post" enctype="multipart/form-data" id="theform">
                            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                            <div class="form-group">
                              <label><b>Voulez vous commenter?</b></label>
                              <textarea rows="3" name="description" required class="form-control"></textarea>
                              <input type="hidden" value="<?php echo e($question->id); ?>" name="question_id">
                              <input type="hidden" value="<?php echo e($question->subject->teacher->id); ?>" name="teacher_id">
                              <input type="hidden" value="normQ" name="create">
                            </div>
                            <div class="form-group">
                              <button class="btn btn-success" type="submit">
                                Commenter
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

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- COMMENT TOGGLE -->

              </div>
            </div>
            <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($i <= 0): ?>
        <p class="text-center">
          <button class="btn btn-danger"> AUCUNE QUESTION POUR VOUS </button>
        </p>
        <?php endif; ?>

          </div>
          <!--End Blog Post -->


      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Vos Matières</h5>
          <div class="card-body">
            <div class="row">
              <?php $__currentLoopData = $Qsubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-6 mt-2">
                    <a href="/teacher/specQuiz/<?php echo e($subject->id); ?>" ><?php echo e($subject->name); ?> en <?php echo e($subject->classroom->name); ?></a>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>

        <!--START ADVICE -->
              <div class="card text-white bg-secondary mb-3" >
                <div class="card-header"><b>LES QUESTIONS</b></div>
                <div class="card-body">
                  <p class="card-text">Les questions sont posées par les étudiants</p>
                </div>
              </div>
              <div class="card text-white bg-secondary mb-3" >
                <div class="card-header"><b>LES REPONSES</b></div>
                <div class="card-body">
                  <p class="card-text">Le professeur chargé de la matière est chargé de répondre dans un bref délai</p>
                </div>
              </div>
        <!-- END ADVICE -->


      </div>

    </div>
    <!-- /.row -->

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/teacher/quiz.blade.php ENDPATH**/ ?>