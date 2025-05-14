@extends ('layouts.master')


@section ('content')

  <?php $profile="activve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarS')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page"> <a href="/student">Accueil</a> </li>
            <li class="breadcrumb-item " aria-current="page"> <a href="/student/profile">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier</li>
          </ol>
        </nav>

        <div class="container-fluid">
             @if($student->gender == 'M')
              <img src="/img/large/xmetudiant.jpg" style="width:250px; padding-top: 20px" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              @else
              <img src="/img/large/xfetudiant.jpg" style="width:250px; padding-top: 20px" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              @endif

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

          <h2 class="text-center text-secondary">N* Matricule: {{$student->matricule}}</h2>

      <form  action="/student/editStudent" method="post" enctype="multipart/form-data" id="theform">
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Nom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$student->name}}" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Prénom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$student->surname}}" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Filière / Classe <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$student->classroom->program->fullname}} ({{$student->classroom->name}})" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Date de naissance <small class="text-success">(accessible)</small>
                </label>
                <?php
                $date=date_create($student->dateofbirth);
                ?>
                <input type="text" class="form-control" name="dateofbirth" placeholder="@if (empty($student->dateofbirth)) JJ-MM-AA Ex: (20-12-1995) @else {{date_format($date,'d-m-Y')}} @endif"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}">
                <!--
                <input type="text"  class="form-control"

                title="Entrer une date correspondant a ce format: JOUR-MOIS-ANNEE Ex: (20-12-1995)" />
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>-->
              </div>
            </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Déterminer votre genre <small class="text-success">(accessible)</small></label>
              <select class="form-control" name="gender">
                <option value="{{$student->gender}}" >
                 @if ($student->gender=='M') Masculin @else ($student->genre=='F') Feminin @endif
               </option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
              </select>
              <!--<small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>-->
            </div>
          </div>
<!--
            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Genre <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" type="text"  placeholder="@if ($student->gender=='M') Masculin @elseif ($student->genre=='F') Feminin @endif" disabled>
              </div>
            </div>
-->
            <div class="col-md-4">
              <div class="form-group ">
                <label>Email <small class="text-success">(accessible)</small></label>
                <input type="text" class="form-control" name="email" placeholder="{{$student->email}}">
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Adresse (votre quartier) <small class="text-success">(accessible)</small></label>
                <input type="text" class="form-control" name="address" placeholder="{{$student->address}}">
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Téléphone <small class="text-success">(accessible)</small></label>
                <input type="text" class="form-control" name="tel" placeholder="{{$student->tel}}">
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

        </div>


              <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">
                  Valider vos informations
                </button>
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

      <br>

        <div class="row">

          <div class="col-sm-6">
              <div class="card text-white bg-success mb-3" >
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

<!-- CARD CAROUSEL JS
<script type="text/javascript">

(function ($) {
  "use strict";
  // Auto-scroll
  $('#myCarousel').carousel({
    interval: 200
  });

  // Control buttons
  $('.next').click(function () {
    $('.carousel').carousel('next');
    return false;
  });
  $('.prev').click(function () {
    $('.carousel').carousel('prev');
    return false;
  });

  // On carousel scroll
  $("#myCarousel").on("slide.bs.carousel", function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;
    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide -
          (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(
            ".carousel-item").eq(i).appendTo(".carousel-inner");
        } else {
          $(".carousel-item").eq(0).appendTo(".carousel-inner");
        }
      }
    }
  });
})
(jQuery);

</script>  -->

@endsection
