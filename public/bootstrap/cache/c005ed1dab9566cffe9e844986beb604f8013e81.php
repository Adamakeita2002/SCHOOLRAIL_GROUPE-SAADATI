


<?php $__env->startSection('content'); ?>

<?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Pré-inscription</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmetudiant.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            <form  action="/manager/CreateNewRegStudent" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer le nom de l' élève</b></label>
                        <input type="text" name="name" placeholder="Nom" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) de l' élève</b></label>
                        <input type="text" name="surname" placeholder="Prénom(s)" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la date de naissance de l' élève</b></label>
                        <input type="date" name="dateofbirth" placeholder="Date de naissance" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la nationalité de l' élève</b></label>
                        <input type="texte" name="nationality" placeholder="Nationalité" class="form-control">

                      </div>

                   <div class="form-group">
                        <label><b>Entrer le contact de l' élèvet</b></label>
                        <input type="number" name="tel" placeholder="Telephone" class="form-control">
                      </div>


                  </div>

                  <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="gender" required>
                          <option value="">Genre</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'email de l' élève</b></label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>


                      <div class="form-group">
                        <label><b>Nv ou ancien</b></label>
                        <select class="form-control" name="address" required>
                          <option value="">Choisissez</option>
                          <option value="M">NOUVEAU</option>
                          <option value="F">ANCIEN</option>
                        </select>
                        <small class="text-danger">champ obligatoire</small>
                      </div>


              <div class="form-group">
                <label><b>Classe</b></label>
                <select class="form-control" name="program_id" required="">
                  <option>Classe</option>
                  <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($program->id); ?>" ><?php echo e($program->fullname); ?> : <?php echo e($program->name); ?> </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

                      <div class="form-group">
                        <label><b>Montant versé</b></label>
                        <input type="number" name="montant" placeholder="Montant" class="form-control">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-success" type="submit">
                            Créer le compte de l' élève
                          </button>
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

              </div>


        </div>

              <?php if(session('status1')): ?>
              <hr>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status2')): ?>
              <hr>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>
            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">MONTANT</th>
                <th scope="col">ACTION</th>

              </tr>
            </thead>

            <tbody>
              <?php $__currentLoopData = $newregstudents->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>

                <td><b><?php echo e($student->name); ?></b> <?php echo e($student->surname); ?> <span style= "color:<?php if($student->gender=='F'): ?>#c22e6d <?php else: ?>  blue <?php endif; ?>">(<?php echo e($student->gender); ?>)</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?>
                <td><?php echo e($student->dateofbirth); ?> - <b>(<?php echo e($years); ?> ans)</b></td>

                <td><?php echo e($student->tel); ?></td>
                <td><?php echo e($student->montant); ?></td>
                <td>
                	<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

	                <a href="#" data-toggle="modal" data-target="#MD2<?php echo e($student->id); ?>" style="color: red;">Supprimer</a>
      <!-- Modal Delete student -->
      <div class="modal fade" id="MD2<?php echo e($student->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="<?php echo e(URL::to('/manager/deleteNewStudent')); ?>" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un élève </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CET ELEVE?</p>
              <h4 class="card-title text-center">
              <?php echo e($student->name); ?> <?php echo e($student->surname); ?>

              </h4>

              <input type="hidden" class="form-control" name="id" value="<?php echo e($student->id); ?>" hidden="">
            <button type="submit" class="btn btn-danger">
              Valider la suppression
            </button>
            </div>
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
            </div>
        </div>
      </div>
      <!--END DELETE FORM-->
      </form>
    </div>

            	</td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>






      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/newregstudent.blade.php ENDPATH**/ ?>