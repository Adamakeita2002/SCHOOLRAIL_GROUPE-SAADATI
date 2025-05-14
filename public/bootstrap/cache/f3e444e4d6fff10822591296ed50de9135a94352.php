


<?php $__env->startSection('content'); ?>

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $transcript="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Archives</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>
 <!-- Page Heading 
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>-->

<div class="col-sm-12">

<div class="nav-tabs-responsive">
  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a href="#room" class="nav-link active" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR CLASSE
      </a>
    </li>
    <li class="nav-item">
      <a href="#name" class="nav-link" data-toggle="tab">
        <i class="icon-magnifier"></i> RECHERCHER PAR MATRICULE
      </a>
    </li>
  </ul>
  <form id="formOrder" class="tab-content">
    <div id="room" class="tab-pane show active">
      <div class="mb-3">
        <a href="#room-collapse" data-toggle="collapse">
          <i class="icon-user"></i> CLASSE
        </a>
      </div>
      <div id="room-collapse" class="collapse show" data-parent="#formOrder">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                  <label>Déterminer le nom de la classe</label>
                  <input type="text" placeholder="Entrer le nom de la classe" class="form-control" name="click" id="click">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label>Sélectionner l' année scolaire</label>
                  <select class="form-control" name="schoolyear" id="schoolyear" >
                    <option value="">Selectionner</option> 
                    <?php $__currentLoopData = $academicyears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academicyear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($academicyear->id); ?>"><?php echo e($academicyear->labelYear); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
            </div>


            <div class="col-md-4">
            <div class="form-group mt-4">
               <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showBulletin1();" value="RECHERCHER"> 
            </div>
            </div>

        </div>
        <br>
        <hr>
        <div id="demo1"></div>
      </div>
    </div>


    <div id="name" class="tab-pane">
      <div class="mb-3">
        <a href="#name-collapse" data-toggle="collapse">
          <i class="icon-credit-card"></i> Matricule
        </a>
      </div>

      <div id="name-collapse" class="collapse" data-parent="#formOrder">

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                <label for =""> Entrer le matricule de l'étudiant</label>
                  <input required="" class="form-control" type="text" name="stu" id="stu" placeholder="Matricule"  >
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label>Sélectionner l' année scolaire</label>
                  <select class="form-control" name="year" id="year" >
                    <option value="">Selectionner</option> 
                    <?php $__currentLoopData = $academicyears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academicyear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($academicyear->id); ?>"><?php echo e($academicyear->labelYear); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
            </div>


            <div class="col-md-4">
            <div class="form-group mt-4">
               <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showBulletin2();" value="RECHERCHER"> 
            </div>
            </div>

        </div>
        <br>
        <hr>

        <span id="demo3"></span>
 

      </div>
    </div>

  </form>
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
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

  </div><!-- END COL -->

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>



/*******************************************/

function showBulletin1() {
  
  var cl = document.getElementById('click');
  var cla = cl.value ;

  var sy = document.getElementById('schoolyear');
  var schoolyear = sy.value ;

  
 /* 
    if(s1.value == "") {
      alert("Veuillez entrer un mot");
      s1.value.focus();
      return false;
    }
 */
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo1").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getBulletin1?q="+cla+"&k="+schoolyear,true);
  xhttp.send();
}

/*******************************************/

function showBulletin2() {
  
  var stud = document.getElementById('stu');
  var stud = stud.value ;

  var sy = document.getElementById('year');
  var year = sy.value ;

  
 /* 
    if(s1.value == "") {
      alert("Veuillez entrer un mot");
      s1.value.focus();
      return false;
    }
 */
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getBulletin2?q="+stud+"&k="+year,true);
  xhttp.send();
}

/*******************************************/  


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/archive.blade.php ENDPATH**/ ?>