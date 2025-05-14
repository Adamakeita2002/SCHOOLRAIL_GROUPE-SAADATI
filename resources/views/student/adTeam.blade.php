@extends ('layouts.master')


@section ('content')
  
  <?php $school="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Administration</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <!-- Header -->
            <h1 class="my-4 card-header font-weight-light text-center bg-primary text-white">ADMINISTRATION</h1>


        <!-- EMPTY HANDLER -->
        
        <p class="text-center">
          <button class="btn btn-success"> BIENTOT DISPONIBLE </button>
        </p>
        
        <!-- END EMPTY HANDLER -->




          <!-- Header -->
            <h1 class="my-4 card-header font-weight-light text-center bg-primary text-white">CORPS PROFESSORAL</h1>


            <!-- EMPTY HANDLER -->
        <p class="text-center">
          <button class="btn btn-success"> BIENTOT DISPONIBLE </button>
        </p>
 




      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<script>
/*******************************************/

$(document).ready(function() {
  $("#success-alert").hide();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });

});

/*******************************************/  
</script>

@endsection
