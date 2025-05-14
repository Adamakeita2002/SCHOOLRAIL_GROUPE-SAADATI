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
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Recette</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
      <br>

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

          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample1">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne1">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                    <b>SCOLARITE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne1" class="collapse" aria-labelledby="headingOne1" data-parent="#accordionExample1">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT1=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',1) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT1= $CT1 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE SCOLARITE: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT1)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

<hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample2">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne2">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                    <b>CANTINE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample2">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT2=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',2) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT2= $CT2 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE CANTINE: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT2)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

<hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample3">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne3">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                    <b>BUS </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne3" class="collapse" aria-labelledby="headingOne3" data-parent="#accordionExample3">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT3=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',3) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT3= $CT3 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE BUS: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT3)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>


<hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample4">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne4">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                    <b>TENUE SCOLAIRE (CLASSE) </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne4" class="collapse" aria-labelledby="headingOne4" data-parent="#accordionExample4">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT4=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',4) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT4= $CT4 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE TENUE SOCLAIRE (CLASSE): </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT4)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>


<hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample5">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne5">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                    <b>TENUE SCOLAIRE (SPORT) </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne5" class="collapse" aria-labelledby="headingOne5" data-parent="#accordionExample5">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT5=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',5) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT5= $CT5 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE TENUE SOCLAIRE (SPORT): </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT5)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample6">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne6">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
                    <b>ACTIVITE PERISCOLAIRE (BASKET) </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne6" class="collapse" aria-labelledby="headingOne6" data-parent="#accordionExample6">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT6=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',6) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT6= $CT6 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE BASKET: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT6)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample7">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne7">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="true" aria-controls="collapseOne7">
                    <b>ACTIVITE PERISCOLAIRE (NATATION) </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne7" class="collapse" aria-labelledby="headingOne7" data-parent="#accordionExample7">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT7=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',7) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT7= $CT7 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE (NATATION): </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT7)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample8">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne8">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="true" aria-controls="collapseOne8">
                    <b>ACTIVITE PERISCOLAIRE (TAEKWONDO) </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne8" class="collapse" aria-labelledby="headingOne8" data-parent="#accordionExample8">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT8=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',8) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT8= $CT8 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE (TAEKWONDO): </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT8)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample9">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne9">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne9" aria-expanded="true" aria-controls="collapseOne9">
                    <b> FOURNITURE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne9" class="collapse" aria-labelledby="headingOne9" data-parent="#accordionExample9">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">CLASSE</th>
                <th scope="col">MONTANT TOTAL</th>
              </tr>
            </thead>
            
            <tbody>
          <?php 
          $CT9=0;
          ?>
          @foreach ($classrooms as $classroom)
          <?php 
          $i=0; 
          $T=0;
          ?>
            @foreach ($classroom->students as $student)

              @foreach($student->versements->where('type',9) as $versement) 
              
              <?php $T= $T + $versement->amount;  ?>
                 
              @endforeach 

            @endforeach
            <tr> 
                <td>
                  {{$classroom->name}}
                </td> 

                <td> 
                  <b>{{number_format($T)}} FCFA</b>
                </td>         
            </tr>
            <?php $CT9= $CT9 + $T;  ?>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL RECETTE FOURNITURE: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($CT9)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample10">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne10">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseOne10" aria-expanded="true" aria-controls="collapseOne10">
                    <b> MONTANT TOTAL DE TOUTE LES RECETTE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne10" class="collapse" aria-labelledby="headingOne10" data-parent="#accordionExample10">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MONTANT TOTAL RECETTE</th>
              </tr>
            </thead>
            
            <tbody>

              <tr> 
                <td>
                  <b>MONTANT TOTAL DE TOUTES LES RECETTES: </b> <span class="badge badge-success" style="font-size: 17px">{{number_format($CT1+$CT2+$CT3+$CT4+$CT5+$CT6+$CT7+$CT8+$CT9)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>

          <hr>



          <br><br><br><br>
                </div>

              </div>
            </div>
      
      <br><br><br><br>
      </div> <!-- END container-fluid -->



@endsection

