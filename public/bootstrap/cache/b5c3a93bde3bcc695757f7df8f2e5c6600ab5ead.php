


<?php $__env->startSection('content'); ?>

<?php use Carbon\Carbon;?>
  <?php $manager="activvve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarA', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarA', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un manager</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmanager.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            <form  action="/kuro/admin/CreateManager" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer le nom du manager</b></label>
                        <input type="text" name="name" placeholder="Nom" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) du manager</b></label>
                        <input type="text" name="surname" placeholder="Prénom(s)" class="form-control" required>
                      </div>



                  </div>

                  <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Entrer l'email du manager</b></label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le contact du manager</b></label>
                        <input type="number" name="tel" placeholder="Telephone" class="form-control" required>
                      </div>
                    <!--
                      <div class="form-group">
                        <label><b>Entrer le mot de passe du manager</b></label>
                        <input type="password" name="password" placeholder="Mot de passe" class="form-control" required minlength="8">
                      </div>

                      <div class="form-group">
                      <label><b>Confirmer le mot de passe </b></label>
                      <input type="password" class="form-control" id="password_confirmation" placeholder="Confirmer votre mot de passe" name="password_confirmation" onkeyup="checkPass(); return false;" required minlength="8">
                      <span id="confirmMessage" class="confirmMessage" style="padding-left: 50px" ></span>
                      </div>
                    -->
                  </div>


                        <p class="text-center">
                          <button class="btn btn-success" type="submit">
                          Créer le compte du manager
                          </button>
                        </p>


                </div>

            </form>

              </div>


        </div>

              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status2')): ?>
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                       Veuillez reprendre la création du manager
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
<hr>

 <!-- Page Heading
  <h4 class="my-4 text-center">LISTE DES TUTEURS</h4>-->

 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES MANAGERS</h4>

        <div class="row">
          <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($manager->name); ?> <?php echo e($manager->surname); ?>

                </h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">
                <b>Email</b> <br> <?php echo e($manager->email); ?>

                </h4>

                <h4 class="card-title text-center">
                <b>Mot de passe </b><br> <?php echo e($manager->image); ?>

                </h4>

                <h4 class="card-title text-center">
                <b>Téléphone</b> <br> <?php echo e($manager->tel); ?>

                </h4>
              <h6>
                <p class="text-center"> <a href="/kuro/admin/affectManager?q=<?php echo e($manager->id); ?>" class="btn btn-warning"><b>Rôles du manager</b></a></p>
                 <!-- Button trigger modal -->
                <p class="text-center"> <a href="/kuro/admin/manager/delete" class="btn btn-danger" data-toggle="modal" data-target="#M<?php echo e($manager->id); ?>"><b>Supprimer le manager</b></a></p>

                  </div>

              <!-- Modal -->
              <div class="modal fade" id="M<?php echo e($manager->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/DeleteManager')); ?>" method="post" enctype="multipart/form-data" id="theform3">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CE MANAGER <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                    <p><b>NOM: </b> <?php echo e($manager->name); ?> <br>
                    <b>PRENOM: </b> <?php echo e($manager->surname); ?> <br>
                    <b>EMAIL: </b> <?php echo e($manager->email); ?> <br>
                    </p>

                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($manager->id); ?>" hidden="">

                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LE MANAGER <i class="icon-trash"></i>
                  </button>

                  </div>

                </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                  </div>

                  </div>
                </div>
                </form>
              </h6>

              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        <?php if($managers->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun manager </button>
        </p>
        <?php endif; ?>
        <!-- END EMPTY HANDLER -->


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

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



     <script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var password = document.getElementById('password');
    var cpassword = document.getElementById('password_confirmation');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "rgba(102, 204, 102, 0.53)";
    var textGoodcolor = "#66cc66";
    var badColor = "rgba(255, 102, 102, 0.22)";
    var textBadcolor="#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(password.value == cpassword.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        cpassword.style.backgroundColor = goodColor;
        message.style.color = textGoodcolor;
        message.innerHTML = "Le mot de passe correspond!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        cpassword.style.backgroundColor = badColor;
        message.style.color = textBadcolor;
        message.innerHTML = "Le mot de passe ne correspond pas!"
    }
}  </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/admin/manager.blade.php ENDPATH**/ ?>