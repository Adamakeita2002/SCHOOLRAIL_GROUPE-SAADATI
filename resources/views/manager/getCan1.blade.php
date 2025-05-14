  <?php use Carbon\Carbon;?>
@if (!empty($student))
          <div class="accordion pt-2 pb-2"  id="accordionExample{{$student->classroom->id}}">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne{{$student->classroom->id}}">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseOne{{$student->classroom->id}}" aria-expanded="true" aria-controls="collapseOne{{$student->classroom->id}}">
                <b>{{$student->classroom->program->fullname}}  {{$student->classroom->program->levelInt}} -  {{$student->classroom->name}}</b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne{{$student->classroom->id}}" class="collapse" aria-labelledby="headingOne{{$student->classroom->id}}" data-parent="#accordionExample{{$student->classroom->id}}">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col"><b>VERSEMENTS (CANTINE)</b></th>
                
              </tr>
            </thead>
            
            <tbody>
                    <?php $T =0;  ?>
                    @foreach($student->versements->where('type',2) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 
              <tr> 
                <td>
                  <b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> <br> {{$student->matricule}} <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',2)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',2) as $versement) 
                    <span class="badge badge-warning" >
                       <?php echo $i;  ?>
                      <span class="text-dark"><!-- START Edit and delete VERSEMENT -->
                      <a href="" class="pl-2" data-toggle="modal" data-target="#MM{{$versement->id}}"><b><i class="icon-info font-lg text-white" style="font-size: 10px"></i></b></a>
                      
                       <!-- Modal Edit VERSEMENT -->
                        <div class="modal fade" id="MM{{$versement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form></form>
                        <form action="{{ URL::to('/manager/versement/modifyVersement') }}" method="post" enctype="multipart/form-data">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modifier ce versement</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              <div class="modal-body">
                                <div class="text-center">
                                <h5><b>{{$versement->student->name}} {{$versement->student->surname}} </b> <br> Versement n°{{$i}} ({{number_format($versement->amount)}} FCFA) </h5>
                    
                                <div class="form-group">
                                  <label><b>Entrer le montant</b></label>
                                  <input type="number" class="form-control" name="amount" placeholder="Montant" required="">
                                </div>

                                <input type="hidden" class="form-control" name="id" value="{{$versement->id}}" hidden="">
                              <button type="submit" class="btn btn-warning text-white">
                                Valider la modification
                              </button>
                              </div>
                            </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                              </div>
                          </div>
                        </div>
                        </form>
                      </div>
                      

                    <!--  Delete VERSEMENT -->
                    <a href="" class="pl-3" data-toggle="modal" data-target="#DD{{$versement->id}}"><b><i class="icon-trash font-lg text-danger" style="font-size: 10px"></i></b></a>
                       <!-- Modal DELETE VERSEMENT -->
                        <div class="modal fade" id="DD{{$versement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form></form>
                        <form action="{{ URL::to('/manager/versement/deleteVersement') }}" method="post" enctype="multipart/form-data">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER ce versement</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              <div class="modal-body">
                                <div class="text-center">
                                <h5><b>{{$versement->student->name}} {{$versement->student->surname}} </b> <br> Versement n°{{$i}} ({{number_format($versement->amount)}} FCFA) </h5>
                    
                                <h5><b>Voulez - vous vraiment supprimer ce versement ?</b> </h5>
                              <input type="hidden" class="form-control" name="id" value="{{$versement->id}}" hidden="">
                              <button type="submit" class="btn btn-danger text-white">
                               OUI, SUPPRIMER CE VERSEMENT
                              </button>
                              </div>
                            </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                              </div>
                          </div>
                        </div>
                        </form>
                      </div>
                      </span><!-- END EDIT AND DELETE VERSEMENT -->
                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
        
              <td> 

              <div class="row">
                  <div class="col-sm-6">
                    <form></form>
                    <form action="/manager/CreateCantine" id="sco{{$student->id}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="{{ csrf_token() }}" name="_token">
                      <input type="hidden" value="{{$student->id}}" name="student_id">
                      <input type="number" class="form-control" name="amount" placeholder="Montant" required="">
                      <button type="submit" class="btn btn-warning form-control  mt-1" ><b>Valider</b></button>
                    </form>
                  </div>  
                  <div class="col-sm-6">
                    <form></form>
                    <form action="/manager/CreateCantinePrint" id="sco{{$student->id}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="{{ csrf_token() }}" name="_token">
                      <input type="hidden" value="{{$student->id}}" name="student_id">
                      <button type="submit" class="btn btn-bordo form-control" >
                        <b>Etats de Paiements <i class="fa fa-print" style="font-size: 20px" aria-hidden="true"></i></b>
                      </button>
                    </form>
                  </div>   
              
              </div> 

              </td>

              </tr>

            </tbody>
          </table>



                  <!-- NOTE TOGGLE -->

                </div>

              </div>
            </div>
          
          </div>
@else
<h3 class="text-danger text-center"><b>AUCUN ELEVE NE CORRESPOND A CETTE RECHERCHE</b></h3>
@endif
<hr>

        <!--  </div>-->
 