<?php $__env->startSection('content'); ?>
    <?php $profile = 'activve'; ?>

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
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-8">
                            <h4 class="card-header bg-secondary text-white">Informations personnelles</h4>
                            <div class="card">

                                <div class="row">

                                    <div class="col-sm-4">
                                        <?php if($student->gender == 'M'): ?>
                                            <img src="/img/large/xmetudiant.jpg"
                                                class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile">
                                        <?php else: ?>
                                            <img src="/img/large/xfetudiant.jpg"
                                                class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile">
                                        <?php endif; ?>

                                    </div>

                                    <div class="col-sm-8 mt-3">

                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo e($student->name); ?> <?php echo e($student->surname); ?></h4>
                                            <br>
                                            <!--  <p class="card-text">Etudiant en Informatique Developpeur d'Application </p>-->

                                            <div class="row">

                                                <div class="col-sm-6">

                                                    <h6><b>Email: </b><br><span
                                                            style="font-size: 14px"><?php echo e($student->email); ?></span> </h6>

                                                    <h6><b>Telephone:</b> <br><span
                                                            style="font-size: 14px"><?php echo e($student->tel); ?></span> </h6>

                                                </div>

                                                <div class="col-sm-6">

                                                    <h6><b>Filière:</b><br> <span
                                                            style="font-size: 14px"><?php echo e($student->classroom->program->fullname); ?></span>
                                                    </h6>

                                                    <h6><b>Classe:</b><br> <span
                                                            style="font-size: 14px"><?php echo e($student->classroom->name); ?>

                                                        </span> </h6>

                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="col-sm-4">

                            <!-- Side Widget -->
                            <div class="card">
                                <h4 class="card-header bg-secondary text-white">Rapports</h4>

                                <div class="card-body ">
                                    <h6><b>Forums engagés</b></h6>
                                    <h6><?php echo e($student->forums->count()); ?></h6>
                                    <h6><b>Commentaires</b></h6>
                                    <h6><?php echo e($student->commentfrms->count()); ?></h6>
                                    <h6><b>Meilleure Commentaire</b></h6>
                                    <h6><?php echo e($student->commentfrms()->where('state', 1)->count()); ?></h6>
                                    <h6><b>Exercices effectués</b></h6>
                                    <h6><?php echo e($student->ahomeworks->count()); ?></h6>
                                </div>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <?php $__currentLoopData = $academicyearP->semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4 pt-2">
                                <div class="card bg-secondary">

                                    <h3 class="text-center  mt-3" style="color:white;"><?php echo e($semester->label); ?></h3>
                                    <?php $semesterAvg = $student->semesterAvgs->where('semester_id', $semesterP->id)->first(); ?>

                                    <h3 class="text-center  mt-1" style="color:white;">Moyenne</h3>

                                    <h3 class="text-center " style="color:white;"> <b>
                                            <?php if($semesterAvg): ?>
                                                <?php echo e($semesterAvg->value); ?>

                                            <?php else: ?>
                                                PAS DISPONIBLE
                                            <?php endif; ?>
                                        </b></h3>

                                    <h3 class="text-center  mt-1" style="color:white;">Rang : <b>
                                            <?php if($semesterAvg): ?>
                                                <?php echo e($semesterAvg->rank); ?>

                                            <?php else: ?>
                                                PAS DISPONIBLE
                                            <?php endif; ?>
                                        </b> </h3>



                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-sm-4 pt-2">

                            <div class="card bg-secondary">

                                <h3 class="text-center  mt-3" style="color:white;">ANNUEL</h3>
                                <?php $semesterAvg = $student->semesterAvgs->where('semester_id', $semesterP->id)->first(); ?>

                                <h3 class="text-center  mt-1" style="color:white;">MOYENNE GENERALE</h3>

                                <h3 class="text-center " style="color:white;"> <b>PAS DISPONIBLE </b></h3>

                                <h3 class="text-center  mt-1" style="color:white;">Rang : <b>X</b> </h3>

                            </div>
                        </div>

                    </div>




                </div>


            </div>
        </div>
    </div>

    <!-- CARD CAROUSEL JS
    <script type="text/javascript">
        (function($) {
            "use strict";
            // Auto-scroll
            $('#myCarousel').carousel({
                interval: 200
            });

            // Control buttons
            $('.next').click(function() {
                $('.carousel').carousel('next');
                return false;
            });
            $('.prev').click(function() {
                $('.carousel').carousel('prev');
                return false;
            });

            // On carousel scroll
            $("#myCarousel").on("slide.bs.carousel", function(e) {
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/student/profile.blade.php ENDPATH**/ ?>