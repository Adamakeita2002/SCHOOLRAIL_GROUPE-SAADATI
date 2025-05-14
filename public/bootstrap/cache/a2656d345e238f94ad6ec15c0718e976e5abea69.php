


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>
  <?php $school="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page">Actualités</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xnews.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

              <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form  action="/manager/CreateSchoolNews" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                <div class="form-group">
                  <label><b>Entrer le titre de l'actualité</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <small class="text-danger">100 mots maximum</small>
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximum.</small>
                </div>

                  <div class="form-group">

                      <label class="btn btn-primary" for="my-file-selector">
                      <input id="my-file-selector" type="file" style="display:none;" name="upload_file"
                      onchange="$('#upload-file-info').html(this.files[0].name)" accept="image/*" >
                      Selectionner une image
                      <i class="fa fa-camera" style="font-size: 15px"></i>
                      </label><br>
                      <span class='badge badge-warning' id="upload-file-info">Aucune image selectionnée</span>
                      <small class="text-secondary">Taille recommandée (700/500).</small>


                  </div>

                  <div class="form-group">
                    <button class="btn btn-bordo" type="submit">
                      Créer l'actualité
                    </button>
                  </div>

              </form>

              </div>

                <div class="col-md-4">

                  <div class="callout callout-warning">
                    <h5>Champ obligatoire <i class="icon-pin"></i></h5>
                    <p>Vous devez imperativement remplir tous les champs, pour que le document soit ajouté à la bibliothèque</p>
                    <p>Le document peut etre de nature PDF,WORD,EXCEL,POWERPOINT</p>
                    <p>Le document ne doit pas depasser la taille de 5Mo</p>
                  </div>

                </div>


        </div>

              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

<hr>


<!-- NEWS ACTUALITES -->

  <div class="row justify-content-md-center">

      <!-- Blog Entries Column offset-md-1 -->
      <div class="col-md-7 ">

        <h1 class="my-4 card-header text-center bg-primary text-white">ACTUALITES</h1>

        <!-- Blog Post -->

        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-4">

          <div class="card-body">
            <h2 class="card-title"><?php echo e($new->title); ?></h2>
            <p class="card-text"><?php echo e($new->description); ?></p>
          </div>
          <?php if(!empty($new->upload)): ?>
          <img class="card-img-top" src="/files/schoolNews/<?php echo e($new->upload); ?>" alt="IMAGE">
          <?php endif; ?>
          <div class="card-footer text-muted">
            <p>- Posté il y a <b><?php echo e($new->created_at->diffForHumans()); ?></b></p>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($news->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> Aucune actualité en ligne </button>
        </p>
        <?php endif; ?>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Mot de la directrice</h5>
        <img class="rounded-circle mt-4 mx-auto d-block" alt="directeur" width="200" height="200" src="/assets/img/logo-petite-academy.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title text-center">Bonjour</h4>
          <p class="card-text">Vu les conditions sanitaires déplorables <b>(Covid-19) </b>, nous avons conçu cette plateforme dans l'objectif d'accomplir notre mission, qui est de vous assurer une éducation garantie.</p>
          <p class="card-text">Nous espérons que cela a été plus que utile.</p>
          <p class="card-text"><i>Cordialement!</i></p>
        </div>

    </div>

        <!-- Side Widget
        <div class="card my-4">
          <h5 class="card-header">Contacts Importants</h5>
          <div class="card-body">
            <h2 class="text-center"><b>Email: </b><br><span style="font-size: 20px">makeita777@gmail.com</span> </h2>
            <div class="row">
              <div class="col-sm-6">
                <h6><b>Chargé de l'information: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>

                <h6><b>Sécretaire générale</b> <br><span style="font-size: 14px">77557950</span> </h6>
              </div>
              <div class="col-sm-6">
              <h6><b>Chargé de la formation: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>

              <h6><b>Chargé de l'organisation</b> <br><span style="font-size: 14px">77557950</span> </h6>
              </div>
            </div>
          </div>
        </div> -->


      </div>

    </div>
    <!-- /.row -->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

            <script type="text/javascript">

            window.addEventListener("DOMContentLoaded", function(e) {

              var form_being_submitted = false;

              var checkForm = function(e) {
                var form = e.target;
                if(form_being_submitted) {
                  alert("Inscription en cours, Veuillez patienter...");
                  form.submit_button.disabled = true;
                  e.preventDefault();
                  return;
                }
                form.submit_button.value = "Inscription en cours";
                form_being_submitted = true;
              };

              document.getElementById("inscription").addEventListener("submit", checkForm, false);

            }, false);

            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/schoolNews.blade.php ENDPATH**/ ?>