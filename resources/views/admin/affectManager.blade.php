@extends ('layouts.master')


@section ('content')

<?php use Carbon\Carbon;?>
  <?php $manager="activvve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Assigner des rôles</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif
          
            <div class="card " style="background-color: #0b06cc45 !important;">


            <div class="card-body">
                  <!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->  
            <form action="{{ URL::to('/kuro/admin/affect/role') }}" method="post" enctype="multipart/form-data" id="theform">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                <input type="hidden" value="{{$managger->id}}" name="id">         

            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col"><b>{{$managger->name}}</b> {{$managger->surname}}</th>
                <th scope="col">ACTIVER / DESACTIVER</th>
                
              </tr>
            </thead>

            <tbody>

                             
              <tr> 
                <td> GERER LES FILIERES </td>     
                <td>
                  <div class="form-group "> 
                  <select class="form-control" name="program">
                    @if($managger->program==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
               </td>
             </tr>

              <tr> 
               <td>GERER LES CLASSES</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="classroom">
                    @if($managger->classroom==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
                </td>
              </tr>

               <tr> 
               <td>GERER LES PROFS</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="teacher">
                    @if($managger->teacher==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES MATIERES</td>
               <td>              
                <div class="form-group ">
                  <select class="form-control" name="subject">
                    @if($managger->subject==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES ETUDIANTS</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="student">
                    @if($managger->student==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES TUTEURS</td>
               <td>              
                <div class="form-group ">
                  <select class="form-control" name="tutor">
                    @if($managger->tutor==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES RESSOURCES</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="ressource">
                    @if($managger->ressource==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
                </td>
              </tr>

               <tr> 
               <td>GERER LES OUTILS SCOLAIRES</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="school">
                    @if($managger->school==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES MESSAGES</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="message">
                    @if($managger->message==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES ARRETS DES NOTES</td>
               <td>
                <div class="form-group ">
                  <select class="form-control" name="stopMark">
                    @if($managger->stopMark==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               <tr> 
               <td>GERER LES BULLETINS</td>
               <td>              
                <div class="form-group ">
                  <select class="form-control" name="bulletin">
                    @if($managger->bulletin==1)
                    <option value="1"> ACTIVER </option>
                    <option value="0"> DESACTIVER  </option>
                    @else
                    <option value="0"> DESACTIVER  </option>
                    <option value="1"> ACTIVER </option>
                    @endif
                  </select>                  
                </div>
              </td>
              </tr>

               
            </tbody>
          


          </table>
          <p class="text-center"><button class="btn btn-success" type="submit"><b>VALIDER LES ROLES</b></button></p> 
          </form> 

                </div>

            
            </div>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

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

@endsection
