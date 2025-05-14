<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">

        <div class="col-sm-12">

            <div class="card mx-auto d-block mt-5" style="width:500px">
                <h2 class="text-center pt-4">BIENVENUEEEE !</h2>
                <img class="card-img-top img-fluid mx-auto d-block" style="width:372.5px;"
                    src="/assets/img/logo-schoolrail.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title text-center">ACCEDER A VOTRE COMPTE</h4>

                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <p class="card-text text-center">
                                <a href="/student" class="btn btn-primary"><b>COMPTE ETUDIANT</b></a>
                            </p>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="card-text text-center">
                                <a href="/teamator/login?opt=teacher" class="btn btn-success"><b>COMPTE PROFESSEUR</b></a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/home/index.blade.php ENDPATH**/ ?>