@extends ('layouts.master')


@section ('content')

  <?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>

<!-- CHECK BOX HANDLER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script type="text/javascript">
$(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>
<!--END CHECK BOX HANDLER -->

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarT')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Liste des élèves</li>
            <li class="breadcrumb-item active" aria-current="page">Classes</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif
              @if (session('status3'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status3') }}<br></b>
                      </div>
                  </div>
              @endif

  <h4 class="my-4 text-center">LISTE DES CLASSES OU VOUS INTERVENEZ</h4>


        <div class="row">
        <?php
            for ($i=0; $i < count($UniqueClassrooms); $i++) { ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #26bc2c">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 {{$UniqueClassrooms[$i]}}
                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>

            <hr>

                <p class="text-center">
                    <a href="/teacher/ListeStudentInfo?q={{$classrooms->where('name',$UniqueClassrooms[$i])->pluck('id')->first()}}" class="btn btn-success text-center"> <b>LISTE DES ELEVES</b>  </a>
                </p>
                

              </div>
            </div>
          </div>

          <?php
          }
          ?>
        </div><!-- END ROW -->

        @if(count($UniqueClassrooms) <= 0 ) 
        <p class="text-center">
          <button class="btn btn-danger"> Il n'existe aucune classe dans laquelle vous intervenez </button>
        </p>
        @endif

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection