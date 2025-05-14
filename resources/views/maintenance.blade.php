@extends ('layouts.master')

<link href="/css/login.css" rel="stylesheet">

<style type="text/css">



</style>

@section ('content')

<?php

if (isset($_GET['opt'])) {
    $option=$_GET['opt'];
}
?>

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center ">



        <div class="container" style="margin: 0px auto">
                <div class="row justify-content-center">
                  <div class="col-sm-12">
                    <img src="/assets/img/logo-hetec.jpg" alt="HETEC - MALI" class="img-fluid rounded mx-auto d-block" >
                  </div>
                </div> <br><br>

<div class="row">

  <div class="col-9 h-125">

    <img src="/assets/img/logo-schoolrail.png" alt="Schoolrail" class="img-fluid" width="150px" height="150px">

      <h3 class="login-heading mb-4 text-center "> <b> La plateforme est en maintenance. </b> </h3>

      <h6 class="login-heading mb-4 text-center "> <b> Connectez vous plutard ! </b> </h6>

        <div class="text-center">
          <h5>Vous pouvez contacter l'administration pour plus d'infos</h5>
          <h5>ou envoyez un email à l'adresse suivante :</h5>
          <p><b>info@hetec-mali.com</b></p>
        </div>

  </div>
</div>


        </div>
      </div>
    </div>
  </div>
</div>

@endsection
