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
            <li class="breadcrumb-item active" aria-current="page">Dépenses</li>
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

      <div class="row">

        <div class="col-md-6">
            
            <form  action="/manager/CreateDepense" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value="{{$manager->id}}" name="manager_id">
                <div class="form-group">
                  <label><b>Entrer le motif</b></label>
                  <input type="text" name="motif" class="form-control" placeholder="(Facture, Achat de materiel...)" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>
                
                <div class="form-group">
                  <label><b>Entrer le montant</b></label>
                  <input type="number" name="amount" class="form-control" placeholder="Le montant" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label><b>A l'endroit de</b></label>
                  <input type="text" name="receiver" class="form-control" placeholder="Le receveur" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label>Source de décaissement</label>
                  <select class="form-control" name="source" required="">
                    <option value="">Selectionner la source</option> 
                    <option value="1">Scolarité</option>
                    <option value="2">Cantine</option>
                    <option value="3">Bus</option>
                    <option value="4">Tenue Scolaire</option>
                    <option value="5">Activité Périscolaire</option>
                    <option value="6">Fourniture</option>
                  </select>
                </div>


                  <div class="form-group">
                    <p class="text-center" >
                      <button class="btn btn-success" name="submit" type="submit">
                      Valider
                    </button>
                   </p>
                  </div>                  

                  </form>
                
            </div>

        <div class="col-md-6">
            <h1 class="text-center pt-5 " >
              <b>ENREGISTREMENTS<br>DES<br> DEPENSES</b>
              
            </h1>    
        </div>


        </div>
          <hr>

          <div class="accordion pt-2 pb-2"  id="accordionExample1">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne1">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                    <b>SOURCE DE DECAISSEMENT: SCOLARITE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne1" class="collapse" aria-labelledby="headingOne1" data-parent="#accordionExample1">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MOTIFS</th>
                <th scope="col">MONTANT</th>
                <th scope="col">A L'ENDROIT DE</th>
                <th scope="col">DATE</th>
              </tr>
            </thead>
            
            <tbody>
          <?php $i=0; 
          $scolarite=0;
          ?>
          @foreach ($depenses->where('source',1) as $depense)
          <?php $i++; 
          $scolarite=$scolarite + $depense->amount ;
          ?>
              <tr> 
                <td>
                  {{$depense->motif}}
                </td> 

                <td> <b>{{number_format($depense->amount)}} FCFA</b> </td>
            
                <td>
                  {{$depense->receiver}}
                </td>                 

        
                <td> 
                  <?php echo date_format($depense->created_at,"d/m/Y ") ; ?>
                </td>
              </tr>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL DECAISSE DES FRAIS DE SCOLARITE: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($scolarite)}} FCFA</span> 
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
                    <b>SOURCE DE DECAISSEMENT: CANTINE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample2">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MOTIFS</th>
                <th scope="col">MONTANT</th>
                <th scope="col">A L'ENDROIT DE</th>
                <th scope="col">DATE</th>
              </tr>
            </thead>
            
            <tbody>
          <?php $i=0; 
          $cantine=0;
          ?>
          @foreach ($depenses->where('source',2) as $depense)
          <?php $i++; 
          $cantine=$cantine + $depense->amount ;
          ?>
              <tr> 
                <td>
                  {{$depense->motif}}
                </td> 

                <td> <b>{{number_format($depense->amount)}} FCFA</b> </td>
            
                <td>
                  {{$depense->receiver}}
                </td>                 

        
                <td> 
                  <?php echo date_format($depense->created_at,"d/m/Y ") ; ?>
                </td>
              </tr>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL DECAISSE DES FRAIS DE CANTINE: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($cantine)}} FCFA</span> 
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
                    <b>SOURCE DE DECAISSEMENT: BUS </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne3" class="collapse" aria-labelledby="headingOne3" data-parent="#accordionExample3">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MOTIFS</th>
                <th scope="col">MONTANT</th>
                <th scope="col">A L'ENDROIT DE</th>
                <th scope="col">DATE</th>
              </tr>
            </thead>
            
            <tbody>
          <?php $i=0; 
                $bus=0;
          ?>
          @foreach ($depenses->where('source',3) as $depense)
          <?php $i++; 
          $bus=$bus + $depense->amount ;
          ?>
              <tr> 
                <td>
                  {{$depense->motif}}
                </td> 

                <td> <b>{{number_format($depense->amount)}} FCFA</b> </td>
            
                <td>
                  {{$depense->receiver}}
                </td>                 

        
                <td> 
                  <?php echo date_format($depense->created_at,"d/m/Y ") ; ?>
                </td>
              </tr>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL DECAISSE DES FRAIS DE BUS: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($bus)}} FCFA</span> 
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
                    <b>SOURCE DE DECAISSEMENT: TENUE SCOLAIRE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne4" class="collapse" aria-labelledby="headingOne4" data-parent="#accordionExample4">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MOTIFS</th>
                <th scope="col">MONTANT</th>
                <th scope="col">A L'ENDROIT DE</th>
                <th scope="col">DATE</th>
              </tr>
            </thead>
            
            <tbody>
          <?php $i=0; 
                $tenue=0;
          ?>
          @foreach ($depenses->where('source',4) as $depense)
          <?php $i++; 
          $tenue=$tenue + $depense->amount ;
          ?>
              <tr> 
                <td>
                  {{$depense->motif}}
                </td> 

                <td> <b>{{number_format($depense->amount)}} FCFA</b> </td>
            
                <td>
                  {{$depense->receiver}}
                </td>                 

        
                <td> 
                  <?php echo date_format($depense->created_at,"d/m/Y ") ; ?>
                </td>
              </tr>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL DECAISSE DES FRAIS DE TENUE SCOLAIRE: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($tenue)}} FCFA</span> 
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
                    <b>SOURCE DE DECAISSEMENT: ACTIVITE PERISCOLAIRE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne5" class="collapse" aria-labelledby="headingOne5" data-parent="#accordionExample5">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MOTIFS</th>
                <th scope="col">MONTANT</th>
                <th scope="col">A L'ENDROIT DE</th>
                <th scope="col">DATE</th>
              </tr>
            </thead>
            
            <tbody>
          <?php $i=0; 
                $activite=0;
          ?>
          @foreach ($depenses->where('source',5) as $depense)
          <?php $i++; 
          $activite=$activite + $depense->amount ;
          ?>
              <tr> 
                <td>
                  {{$depense->motif}}
                </td> 

                <td> <b>{{number_format($depense->amount)}} FCFA</b> </td>
            
                <td>
                  {{$depense->receiver}}
                </td>                 

        
                <td> 
                  <?php echo date_format($depense->created_at,"d/m/Y ") ; ?>
                </td>
              </tr>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL DECAISSE DES FRAIS DES ACTIVITES PERISCOLAIRES: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($activite)}} FCFA</span> 
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
                    <b>SOURCE DE DECAISSEMENT: FOURNITURE </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne6" class="collapse" aria-labelledby="headingOne6" data-parent="#accordionExample6">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MOTIFS</th>
                <th scope="col">MONTANT</th>
                <th scope="col">A L'ENDROIT DE</th>
                <th scope="col">DATE</th>
              </tr>
            </thead>
            
            <tbody>
          <?php $i=0; 
                $fourniture=0;
          ?>
          @foreach ($depenses->where('source',6) as $depense)
          <?php $i++; 
          $fourniture=$fourniture + $depense->amount ;
          ?>
              <tr> 
                <td>
                  {{$depense->motif}}
                </td> 

                <td> <b>{{number_format($depense->amount)}} FCFA</b> </td>
            
                <td>
                  {{$depense->receiver}}
                </td>                 

        
                <td> 
                  <?php echo date_format($depense->created_at,"d/m/Y ") ; ?>
                </td>
              </tr>
          @endforeach
              <tr> 
                <td>
                  <b>MONTANT TOTAL DECAISSE DES FRAIS DES FOURNITURES: </b> <span class="badge badge-dark" style="font-size: 17px">{{number_format($fourniture)}} FCFA</span> 
                </td> 
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>
<hr> <br>

          <div class="accordion pt-2 pb-2"  id="accordionExample7">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne7">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="true" aria-controls="collapseOne7">
                    <b>TOTAL DES DEPENSES </b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne7" class="collapse" aria-labelledby="headingOne7" data-parent="#accordionExample7">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">SOURCE</th>
                <th scope="col">MONTANT</th>
              </tr>
            </thead>
            
            <tbody>
              <tr> 
                <td>
                  <b>SCOLARITE  </b> 
                </td> 
                <td>
                  <span class="badge badge-dark" style="font-size: 17px">{{number_format($scolarite)}} FCFA</span> 
                </td>
              </tr>
              <tr> 
                <td>
                  <b>CANTINE  </b> 
                </td> 
                <td>
                  <span class="badge badge-dark" style="font-size: 17px">{{number_format($cantine)}} FCFA</span> 
                </td>
              </tr>
              <tr> 
                <td>
                  <b>BUS  </b> 
                </td> 
                <td>
                  <span class="badge badge-dark" style="font-size: 17px">{{number_format($bus)}} FCFA</span> 
                </td>
              </tr>
              <tr> 
                <td>
                  <b>TENUE SCOLAIRE  </b> 
                </td> 
                <td>
                  <span class="badge badge-dark" style="font-size: 17px">{{number_format($tenue)}} FCFA</span> 
                </td>
              </tr>
              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE </b> 
                </td> 
                <td>
                  <span class="badge badge-dark" style="font-size: 17px">{{number_format($activite)}} FCFA</span> 
                </td>
              </tr>
              <tr> 
                <td>
                  <b>FOURNITURE  </b> 
                </td> 
                <td>
                  <span class="badge badge-dark" style="font-size: 17px">{{number_format($fourniture)}} FCFA</span> 
                </td>
              </tr>
              <tr> 
                <td>
                  <span class="text-danger" ><b>TOTAL DES DEPENSES </b></span> 
                </td> 
                <td>
                <span class="badge badge-danger" style="font-size: 17px">{{number_format($scolarite + $cantine + $bus + $tenue + $activite + $fourniture)}} FCFA</span> 
                </td>
              </tr>
            </tbody>
          </table>


                </div>

              </div>
            </div>
          </div>


<br><br><br><br>
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection

