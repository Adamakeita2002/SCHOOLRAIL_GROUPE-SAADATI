

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-md-center">

            <div class="col-md-5">

                <div class="card mx-auto d-block mt-5">
                    <h2 class="text-center pt-4"> <b>BIENVENUE !</b></h2>

                    <p class="text-center">
                        <img class="card-img-top img-fluid mx-auto d-block mt-5" style="width:300px;"
                            src="/assets/img/logo-sabile-12x12-1.webp" alt="Card image" style="">
                    </p>

                    <p class="text-center">
                        <img class="card-img-top img-fluid mx-auto d-block" style="width:272.5px;"
                            src="/assets/img/logo-schoolrail.png" alt="Card image">
                    </p>


                    <div class="card-body">
                        <h4 class="card-title text-center"> <b>ACCEDER A VOTRE COMPTE</b> </h4>

                        <div class="row justify-content-md-center">

                            <div class="col-md-6 mt-2">
                                <p class="card-text text-center">
                                    <a href="/student" class="btn btn-primary"><b>COMPTE ELEVE</b></a>
                                </p>
                            </div>

                            <div class="col-md-6 mt-2">
                                <p class="card-text text-center">
                                    <a href="/teamator/login?opt=teacher" class="btn btn-success"><b>COMPTE
                                            PROFESSEUR</b></a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/home/index.blade.php ENDPATH**/ ?>