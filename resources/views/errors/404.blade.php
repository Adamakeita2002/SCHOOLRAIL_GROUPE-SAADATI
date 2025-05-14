@extends ('layouts.master')

@section ('content')

<style type="text/css">

</style>


<h2 class="text-center pt-4" >La page est introuvable (Erreur 404)</h2>
<div class="container" style="margin: 50px auto">

<div class="row justify-content-md-center">


	<div class="card" style="width:500px" >
	  <img class="card-img-top img-fluid mx-auto d-block" style="width:372.5px;" src="/assets/img/logo-schoolrail.png"  alt="Card image">
	  <div class="card-body">
	    <h4 class="card-title text-center">Revenir sur votre compte</h4>

	    <div class="row">

	   	<div class="col-md-6">
	    <p class="card-text">
	    	<a href="https://schoolrail.hetec-mali.com/student" class="btn btn-primary"><b>COMPTE ETUDIANT</b></a>
	    </p>
		</div>

		<div class="col-md-6">
	    <p class="card-text">
	    	<a href="https://schoolrail.hetec-mali.com/teamator/login?opt=teacher" class="btn btn-success"><b>COMPTE PROFESSEUR</b></a>
	    </p>
		</div>


  	  </div>
	</div>
 </div>



</div>
</div>
@endsection
