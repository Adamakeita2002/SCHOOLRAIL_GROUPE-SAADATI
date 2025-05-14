


<?php $__env->startSection('content'); ?>

<head>

</head>

<?php use Carbon\Carbon;?>
  <?php $timetable="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Emploi du temps</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

<img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xemploi.jpg" alt="Card image" style="width:250px;">

<br><br><br>

<img class=" img-thumbnail card-img-top mx-auto d-block" src="/files/timetable/<?php echo e($student->classroom->timetable); ?>" style="width:1100px; height: 800px;" alt="EMPLOI DU TEMPS NON DEFINI" >

      </div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->


<script>


/*******************************************/

function showTimetable(str) {
    if (str == "") {
        document.getElementById("demo2").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo2").innerHTML = this.responseText;
            }
        };
      //  xmlhttp.open("GET","getuser?q="+str+"&country="+country,true);
        xmlhttp.open("GET","/student/getTimetable?q="+str,true);
        xmlhttp.send();
    }
}

/*******************************************/


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/student/findTimetable.blade.php ENDPATH**/ ?>