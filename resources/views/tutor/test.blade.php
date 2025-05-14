@extends ('layouts.master')


@section ('content')
  <?php $test="activve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Devoirs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-5">

                  <div class="form-group">
                    <label>Classe / Matiere</label>
                    <select class="form-control">
                      <option>Classe</option>
                      <option>IDA 1 / C++</option>
                      <option>Telecom 2 / Algo</option>
                    </select>
                  </div>

                  <div class="form-group ">
                    <label>Entrez la date limite</label>
                    <input type="date" class="form-control">
                  </div>


                  <div class="form-group">
                    <button class="btn btn-success">
                      Mettre en ligne
                    </button>
                  </div>
              
              </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="text-secondary">Only .jpeg and .png and maximum 1MB.</label>
                    <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner le test
                    </button>
                  <!--  <small class="text-secondary">Only .jpeg and .png and maximum 1MB.</small>-->
                  </div>

                  <div class="table-responsive">
                    <table class="table">
                      <tr id="file-data" class="d-none">
                        <td class="align-middle">
                          <img id="file-preview" class="rounded d-none" width="64">
                          <span id="file-name"></span>
                          <i id="is-invalid" class="icon-close text-danger d-none"></i>
                          <i id="is-valid" class="icon-check text-success d-none"></i>
                        </td>
                        <td class="align-middle">
                          <span id="file-size"></span>
                        </td>
                      </tr>
                      <tr id="file-empty">
                        <td colspan="2" class="text-secondary">
                          Aucun fichier selectionné
                        </td>
                      </tr>
                    </table>
                  </div>

                </div>


        </div>

<hr>
 <!-- Page Heading -->
  <h2 class="my-4">LISTE DE VOS DEVOIRS</h2>

        <div class="row">

  
<form method="post" action="">
<input type="checkbox" name="cricket" value="cricket" />Cricket<br/>
<input type="checkbox" name="football" value="football" />Football<br/>
<input type="checkbox" name="hockey" value="hockey" />Hockey<br/><br/>
<input type="submit" name="submit" value="Submit" />
</form>


        </div>
        <!-- /.row -->

        <!-- Pagination 
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
          </li>
        </ul> -->
                  <!-- /.row -->

      </div> <!-- END container-fluid -->


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
