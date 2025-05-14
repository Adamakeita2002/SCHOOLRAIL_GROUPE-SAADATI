@extends ('layouts.master')


@section ('content')

  <?php $forum="activvve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Forum</li>
            <li class="breadcrumb-item active" aria-current="page">Engager un sujet</li>
          </ol>
        </nav>

        <div class="container-fluid"> <!-- FLUID CONTAINER -->

          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/john-doe.png" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

              <!-- -->
            <div class="card h-100">
              <div class="card-body bg-success">
                <h2 class="card-title text-center mt-2" style="color:white;">
                  METTRE UN TEST
                </h2>
              </div>
              <div class="card-body">

                <div style="text-align: center;">
                <i class="icon-note font-lg text-success" style="font-size: 120px"></i>
                </div>

                <div class="form-group">
                  <label>Selectionner la classe</label>
                  <select class="form-control">
                    <option></option>
                    <option>Female</option>
                    <option>Male</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Selectionner la matière</label>
                  <select class="form-control">
                    <option></option>
                    <option>Female</option>
                    <option>Male</option>
                  </select>
                </div>

              <div class="form-group">
              <label>Date limite</label>
              <div class="input-group">
                <div class="form-control"></div>
                <div class="input-group-append">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#calendar">
                    <i class="icon-calendar"></i>
                  </button>
                </div>
              </div>
            </div>


            </div>
          </div>

            </div>

            <div class="col-md-4">
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>Selectionner la classe</b></div>
                <div class="card-body">
                  <p class="card-text">Vous devez impérativement selectionner la classe à laquelle vous soumettez le test</p>
                </div>
              </div>
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>Selectionner la matière</b></div>
                <div class="card-body">
                  <p class="card-text">Vous devez impérativement déterminer la matière du test que vous soumettez aux étudiants</p>
                </div>
              </div>
              <div class="card text-white bg-success mb-3" >
                <div class="card-header"><b>Déterminer la date</b></div>
                <div class="card-body">
                  <p class="card-text">Vous devez impérativement déterminer la date du test que vous soumettez aux étudiants</p>
                </div>
              </div>
            </div>


        </div>

        <hr>

        <div class="row">
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body bg-success">
                <h2 class="card-title text-center mt-2" style="color:white;">
                  SYSTEME D' EXPLOITATION
                </h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">
                  M. KEITA MAMADOU
                </h4>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="card-title text-center text-primary">
                      <u>Mise en ligne :</u>
                    </h6>
                    <h6 class="card-title text-center text-primary">
                      25/05/19
                    </h6>
                  </div>
                  <div class="col-sm-6">
                     <h6 class="card-title text-center text-danger">
                     <u>Date Limite :</u>
                    </h6>
                    <h6 class="card-title text-center text-danger">
                       25/05/19
                    </h6>
                  </div>
                </div>

                <p class="card-text text-center text-success" style="font-size: 100px"><i class="icon-check"></i></p>
                <p class="card-text text-center text-success">Disponible !</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body bg-success">
                <h2 class="card-title text-center mt-2" style="color:white;">
                  C++
                </h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">
                  M. KEITA MAMADOU
                </h4>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="card-title text-center text-primary">
                      <u>Mise en ligne :</u>
                    </h6>
                    <h6 class="card-title text-center text-primary">
                      25/05/19
                    </h6>
                  </div>
                  <div class="col-sm-6">
                     <h6 class="card-title text-center text-danger">
                     <u>Date Limite :</u>
                    </h6>
                    <h6 class="card-title text-center text-danger">
                       25/05/19
                    </h6>
                  </div>
                </div>


                <p class="card-text text-center text-danger" style="font-size: 100px"><i class="icon-ban"></i></p>
                <p class="card-text text-center text-danger">Expirée !</p>
              </div>
            </div>
          </div>


        </div>
        <!-- /.row -->



        </div> <!-- END FLUID CONTAINER -->


      </div>
    </div>
  </div>

<script type="text/javascript">
var $calendar = $('#calendar');
var $btnApply = $('#btnApply')

$calendar.on('show.bs.modal', function (e) {
  var $formControl = $(e.relatedTarget)
    .closest('.form-group')
    .find('.form-control');

  $btnApply.prop('target', $formControl);
  $calendar.calendar('date', $formControl.prop('date') || new Date());
});

$btnApply.on('click', function () {
  var $target = $btnApply.prop('target');
  var date = $calendar.calendar('date');
  var formattedDate = moment(date).format('dddd, MMMM D, YYYY');

  $target.prop('date', date).text(formattedDate);
});
</script>

@endsection
