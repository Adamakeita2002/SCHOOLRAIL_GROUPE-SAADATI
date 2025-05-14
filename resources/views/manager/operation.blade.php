@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
<?php $comptabilite="activve" ;?>
    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarM')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarM')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
          </ol>
        </nav>

        <div class="container-fluid">

            <div class="row">

              <div class="col-6 col-md-4 col-lg-4">
                <div class="form-group">
                <label for =""> Entrer la date</label>
                  <input required="" class="form-control" type="date" id="operation1" placeholder="LA DATE"  >
                </div>
              </div>

              <div class="col-6 col-md-4 col-lg-4">
                <div class="form-group mt-4">
                   <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="showOperation1();" value="RECHERCHER"> 
                </div>
              </div>
            </div>


          <hr>

     <span id="demo1"></span>

        </div>


      </div>
    </div>
  </div>


<script type="text/javascript">

function showOperation1() {
  
  var s1 = document.getElementById('operation1');
  var operation1 = s1.value ;
 
    if(s1.value == "") {
      alert("Veuillez entrer un mot");
      s1.value.focus();
      return false;
    }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo1").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/manager/getOperation1?q="+operation1,true);
  xhttp.send();
}

</script> 

@endsection
