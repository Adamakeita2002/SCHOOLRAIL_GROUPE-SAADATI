@extends ('layouts.master')

<style type="text/css">


.btn-circle-lg {

  width: 250px;
  height: 250px;
  text-align: center;
  padding: 35px 0;
  font-size: 150px;
  line-height: 2.00;
  border-radius: 200px;

}

.bcb {
 display:inline-block;
 font-weight:400;
 text-align:center;
 white-space:nowrap;
 vertical-align:middle;
 -webkit-user-select:none;
 -moz-user-select:none;
 -ms-user-select:none;
 user-select:none;
 border:1px solid transparent;
 -webkit-transition:color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
 transition:color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
 transition:color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
 transition:color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out
}
@media screen and (prefers-reduced-motion: reduce) {
 .bcb {
  -webkit-transition:none;
  transition:none
 }
}
.bcb:hover,
.bcb:focus {
 text-decoration:none
}
.bcb:focus,
.bcb.focus {
 outline:0;
 -webkit-box-shadow:0 0 0 .2rem rgba(46,140,194,0.25);
 box-shadow:0 0 0 .2rem rgba(46,140,194,0.25)
}
.bcb.disabled,
.bcb:disabled {
 opacity:.65
}
.bcb:not(:disabled):not(.disabled) {
 cursor:pointer
}
a.bcb.disabled,
fieldset:disabled a.bcb {
 pointer-events:none
}

</style>


<style type="text/css">
    /* Prevent scrollbars to appear when waves go out of bound */
.sonar-wrapper {
  position: relative;
  z-index: 0;
  overflow: hidden;
  padding: 15px 0;
}

/* The circle */
.sonar-emitter1 {
  position: relative;
  margin: 0 auto;
  width: 15px;
  height: 15px;
  border-radius: 9999px;
  background-color: #2e8cc2;
}

/* The circle */
.sonar-emitter2 {
  position: relative;
  margin: 0 auto;
  width: 15px;
  height: 15px;
  border-radius: 9999px;
  background-color: #1abc9c;
}

/* The circle */
.sonar-emitter3 {
  position: relative;
  margin: 0 auto;
  width: 15px;
  height: 15px;
  border-radius: 9999px;
  background-color: HSL(45,100%,50%);
}

/* the 'wave', same shape and size as its parent */
.sonar-wave {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 9999px;
  background-color: HSL(45,100%,50%);
  opacity: 0;
  z-index: -1;
  pointer-events: none;
}

/*
  Animate!
  NOTE: add browser prefixes where needed.
*/
.sonar-wave {
  animation: sonarWave 2s linear infinite;
}

@keyframes sonarWave {
  from {
    opacity: 0.4;
  }
  to {
    transform: scale(3);
    opacity: 0;
  }
}

</style>




@section ('content')
  
<div class="container d-flex h-50">
    <div class="row align-self-center w-100">

        <div class="col-6 mx-auto">
            <img class="img-fluid" src="./assets/img/lg1.jpg" alt="HETEC LOGO" > 
        </div>

        <div class="col-6 mx-auto">
          <div class="card">
            
            <div class="row">
                <div class="col-sm-4">
                    <img class="card-img-top mx-auto d-block" src="./assets/img/john-doe.png" alt="Card image" style="width:100%; padding-top: 20px">
                </div>
                <div class="col-sm-8">
                    <div class="card-body">
                      <h4 class="card-title">Keita Mamadou</h4>
                      <p class="card-text">Etudiant en Informatique Developpeur d'Application (IDA 1)</p>
                      
                      <div class="row">

                          <div class="col-sm-4">
                              <div class="sonar-wrapper">
                                    <div class="sonar-emitter1">
                                    <div class="sonar-wave"></div>
                                    </div>
                              </div>                              
                          </div>

                          <div class="col-sm-4">
                            <div class="sonar-wrapper">
                                <div class="sonar-emitter2">
                                <div class="sonar-wave"></div>
                                </div>
                            </div>  
                          </div>

                          <div class="col-sm-4">
                            <div class="sonar-wrapper">
                                <div class="sonar-emitter3">
                                <div class="sonar-wave"></div>
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
</div>


<div class="container d-flex">
    <div class="row align-self-center w-100">
        <div class="col-4 mx-auto">
            <a href="/account"  class="bcb btn-circle-lg btn-primary"><i class="icon-user"></i> <p style="font-size: 25px">Compte</p> </a>
        </div>

        <div class="col-4 mx-auto">
            <a href="/bde"  class="bcb btn-circle-lg btn-danger"><i class="icon-emotsmile"></i><p style="font-size: 25px">BDE</p> </a>
        </div>

        <div class="col-4 mx-auto">
            <a href="/ikaschool"  class="bcb btn-circle-lg btn-dark"><i class="icon-globe-alt"></i><p style="font-size: 25px">iKaschool</p> </a>
        </div>
    </div>
</div>

@endsection
