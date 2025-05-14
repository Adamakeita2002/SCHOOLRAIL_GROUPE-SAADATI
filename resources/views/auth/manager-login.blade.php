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
  <div class="col-3  h-125 bg-white">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

      <a class="nav-link1 mb-3 mt-3 <?php
      if(isset($option) AND $option=='teacher'){ echo "active" ;}
      if(!isset($option)){ echo "active" ;}
      ?> " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Professeur</a>

      <a class="nav-link2 mb-3 <?php if(isset($option) AND $option=='manager'){ echo "active" ;}?> " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Manager</a>

      <a class="nav-link3 mb-3 <?php if(isset($option) AND $option=='tutor'){ echo "active" ;}?>" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tuteur</a>

      <a class="nav-link mb-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Besoin d'aide ?</a>

    </div>
    <img src="/assets/img/logo-schoolrail.png" alt="Schoolrail" class="img-fluid" width="150px" height="150px">
  </div>
  <div class="col-9 h-125">
   <!-- <img src="/img/sciu.png" width="100" height="50">-->
    <div class="tab-content" id="v-pills-tabContent">


      <div class="tab-pane fade
      <?php
      if(isset($option) AND $option=='teacher'){ echo "show active" ;}
      if(!isset($option)){ echo "show active" ;}
      ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

      		<h3 class="login-heading mb-4 text-center"> Vous êtes un <b>Professeur ?</b> </h3>
            <h3 class="login-heading mb-4 text-center"> Connectez vous à votre compte <b>Professeur </b></h3>

              <form method="POST" action="{{ route('teacher.login.submit') }}">
              {{ csrf_field() }}

                <div class="form-label-group">
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Entrez votre adresse Email" required autofocus>
                  <label for="inputEmail">Entrez votre adresse email</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
                  <label for="inputPassword">Entrez votre mot de passe</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-vert btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Connectez - Vous!</button>
                <br>
                <div class="text-center">
                  <a class="small" href="#">Vous avez oublié votre mot de passe ?</a>
                </div>
              </form>


      </div>


      <div class="tab-pane fade <?php if(isset($option) AND $option=='manager'){ echo "show active" ;}?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

            <h3 class="login-heading mb-4 text-center"> Vous êtes un <b>Manager ?</b> </h3>
            <h3 class="login-heading mb-4 text-center"> Connectez vous à votre compte <b>Manager </b></h3>

              <form role='form' method="POST" action="{{ route('manager.login.submit') }}">
              {{ csrf_field() }}


                <div class="form-label-group">
                  <input type="email" id="inputEmail2" name="email" class="form-control" placeholder="Entrez votre adresse Email" required autofocus>
                  <label for="inputEmail2">Entrez votre adresse email</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword2" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                  <label for="inputPassword2">Entrez votre mot de passe</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck12">
                  <label class="custom-control-label" for="customCheck12">Remember password</label>
                </div>
                <button class="btn btn-lg btn-bordo btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Connectez - Vous!</button>
                <br>
                <div class="text-center">
                  <a class="small" href="#">Vous avez oublié votre mot de passe ?</a>
                </div>

              </form>

      </div>



      <div class="tab-pane fade <?php if(isset($option) AND $option=='tutor'){ echo "show active" ;}?>" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messges-tab">

            <h3 class="login-heading mb-4 text-center"> Vous etes un <b>Tuteur ?</b> </h3>
            <h3 class="login-heading mb-4 text-center"> Connectez vous à votre compte <b>Tuteur </b></h3>

              <form role='form' method="POST" action="{{ route('tutor.login.submit') }}">
              {{ csrf_field() }}

                <div class="form-label-group">
                  <input type="email" id="inputEmail3" name="email" class="form-control" placeholder="Entrez votre adresse Email" required autofocus>
                  <label for="inputEmail3">Entrez votre adresse email</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword3" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                  <label for="inputPassword3">Entrez votre mot de passe</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck13">
                  <label class="custom-control-label" for="customCheck13">Remember password</label>
                </div>
                <button class="btn btn-lg btn-purple btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Connectez - Vous!</button>
                <br>
                <div class="text-center">
                  <a class="small" href="#">Vous avez oublié votre mot de passe ?</a>
                </div>
              </form>
  	  </div>


      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <h3 class="login-heading mb-4 text-center "> <b> Besoin d'aide ?</b> </h3>

                <div class="text-center">
                  <h5>Veuillez vous rendre à l'administration</h5>
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
  </div>
</div>

@endsection
