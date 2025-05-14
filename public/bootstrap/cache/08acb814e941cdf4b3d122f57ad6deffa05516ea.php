


<?php $__env->startSection('content'); ?>

  <?php $profile="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page">Profile</li>
            <li class="breadcrumb-item active" aria-current="page">Modifier</li>
          </ol>
        </nav>

        <div class="container-fluid">

          <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:250px; padding-top: 20px">


              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

          <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <form  action="/teacher/EditProfile" method="post" enctype="multipart/form-data" id="theform">
            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Nom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" name="name" id="disabledInput" type="text" placeholder="<?php echo e($teacher->name); ?>" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Prénom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" name="surname" id="disabledInput" type="text" placeholder="<?php echo e($teacher->surname); ?>" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Nationalité <small class="text-success">(accessible)</small>
                </label>
                <input class="form-control" name="nationality" type="text" placeholder="<?php echo e($teacher->nationality); ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Date de naissance <small class="text-success">(accessible)</small>
                </label>
                <?php
                $date=date_create($teacher->dateofbirth);
                ?>
                <input type="text" name="dateofbirth" class="form-control"
                placeholder="<?php if(empty($teacher->dateofbirth)): ?> JJ-MM-AA Ex: (20-12-1995) <?php else: ?> <?php echo e(date_format($date,'d-m-Y')); ?> <?php endif; ?>"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"
                title="Entrer une date correspondant a ce format: JOUR-MOIS-ANNEE Ex: (20-12-1995)"/>
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>
                  Email <small class="text-success">(accessible)</small>
                </label>
                <input type="email" name="email" placeholder="<?php echo e($teacher->email); ?>" class="form-control">
                <small class="text-secondary">Ex: exemple@exemple.com</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>
                  Téléphone <small class="text-success">(accessible)</small>
                </label>
                <input type="tel" name="tel" placeholder="<?php echo e($teacher->tel); ?>" class="form-control" pattern="^[0-9-+s()]*$">
                <small class="text-secondary">Format=code(XXX) - numero(XXXX...) | Ex: 223 - 77557950</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>
                  Adresse <small class="text-success">(accessible)</small>
                </label>
                <input type="text" name="address" placeholder="<?php echo e($teacher->address); ?>" class="form-control">
                <small class="text-secondary">Ex: Bamako - Kalaban Coura</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Spécialité <small class="text-success">(accessible)</small></label>
                <input type="text" name="speciality" placeholder="<?php echo e($teacher->speciality); ?>"  class="form-control">
                <small class="text-secondary">Ex: Informaticien, Financier...</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Mot de passe <small class="text-success">(accessible)</small></label>
                <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
                <small class="text-secondary">Ce champ ne peut rester vide, si vous le modifier</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Confirmation Mot de passe <small class="text-success">(accessible)</small></label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="" class="form-control" onkeyup="checkPass(); return false;" >
                <small id="confirmMessage" class="confirmMessage" style="padding-left: 50px" ></small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <button class="btn btn-vert btn-lg mt-4 btn-block" type="submit"> MODIFIER </button>
              </div>
            </div>

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
        <div class="row">

          <div class="col-sm-6">
              <div class="card text-white mb-3" style="background-color: #26bc2c;" >
              <div class="card-header"><b>Champ accessible</b></div>
              <div class="card-body">
                <p class="card-text">Vous pouvez modifier un champ accessible</p>
              </div>
            </div>
          </div>

        <div class="col-sm-6">
          <div class="card text-white bg-danger mb-3" >
            <div class="card-header"><b>Champ inaccessible</b></div>
            <div class="card-body">
              <p class="card-text">Seul <b>l'administration</b> peut modifier un champ inaccessible</p>
            </div>
          </div>
        </div>

        </div>



        </div>


      </div>
    </div>
  </div>

<script type="text/javascript">
function checkPass() {
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
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/editProfile.blade.php ENDPATH**/ ?>