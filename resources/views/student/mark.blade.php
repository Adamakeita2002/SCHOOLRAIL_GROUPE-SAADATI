@extends ('layouts.master')


@section ('content')

  <style type="text/css">

.hrr{
margin-top: 0.2rem;
margin-bottom: 0.2rem;
border: 0;
border-top-color: currentcolor;
border-top-style: none;
border-top-width: 0px;
border-top: 1px solid rgba(255,255,255);
}

.hrr {
-webkit-box-sizing: content-box;
box-sizing: content-box;
height: 0;
overflow: visible;
}

.vl {
  border-left: 3px solid green;
  height: 500px;
}

</style>
  
  <?php $paiement="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Paiements</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

          <div class="accordion pt-2 pb-2"  id="accordionExample{{$student->classroom->id}}">
            <div class="card " style="background-color: #0b06cc45 !important;">
              <div class="card-header bg-secondary " id="headingOne{{$student->classroom->id}}">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne{{$student->classroom->id}}" aria-expanded="true" aria-controls="collapseOne{{$student->classroom->id}}">
                <b>{{$student->name}} {{$student->surname}}</b>
                  </button>
                </h2>
              </div>

              <div id="collapseOne{{$student->classroom->id}}" class="collapse show" aria-labelledby="headingOne{{$student->classroom->id}}" data-parent="#accordionExample{{$student->classroom->id}}">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col" style="font-weight: bold; color: white;">VERSEMENTS</th>
              </tr>
            </thead>
            
            <tbody>

                    <?php 
                    $T =0;  
                    $x=1;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>SCOLARITE</b>  <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>

                    <?php 
                    $T =0;  
                    $x=2;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>CANTINE</b> <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>


                    <?php 
                    $T =0;  
                    $x=3;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>BUS</b>  <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>

                    <?php 
                    $T =0;  
                    $x=4;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>TENUE SCOLAIRE (CLASSE)</b> <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>

                    <?php 
                    $T =0;  
                    $x=5;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>TENUE SCOLAIRE (SPORT)</b> <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>

                    <?php 
                    $T =0;  
                    $x=6;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE (BASKET)</b>  <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>

                    <?php 
                    $T =0;  
                    $x=7;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE (NATATION)</b> <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>

                    <?php 
                    $T =0;  
                    $x=8;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>ACTIVITE PERISCOLAIRE (TAEKWONDO)</b>  <br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>


                    <?php 
                    $T =0;  
                    $x=9;
                    ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    
                    <?php $T= $T + $versement->amount;  ?>
                       
                    @endforeach 

              <tr> 
                <td>
                  <b>FOURNITURE</b><br> 
                  <span class="badge badge-dark" ><b>{{number_format($T)}} FCFA </b></span> 
                </td> 
                <?php $V=$student->versements->where('type',$x)->count();  ?>

                  @if($V<=0)
                <td> <b>Aucun Versement</b> </td>

                  @else                   
                  <td>
                    <?php $i =1;  ?>
                    @foreach($student->versements->where('type',$x) as $versement) 
                    <span class="badge @if($x==1)btn-primary 
                    @elseif($x==2)btn-warning
                    @elseif($x==3)btn-success 
                    @elseif($x==4)btn-frose 
                    @elseif($x==5)btn-frose 
                    @elseif($x==6)btn-forange
                    @elseif($x==7)btn-forange
                    @elseif($x==8)btn-forange
                    @elseif($x==9)btn-fmarron
                    @endif
                    @if(!empty($verse))
                      @if ($versement->id == $verse->id)badge-secondary @endif
                    @endif
                    @if($i==1 AND $x==1)btn-dark @endif
                     "  >
                       <?php echo $i;  ?>

                       <hr class="hrr">
                      <b>{{number_format($versement->amount)}} FCFA </b>
                    </span> 
                    <?php $i++ ;  ?>
                    @endforeach 
                  </td>                 
                  @endif
              </tr>



            </tbody>
          </table>


                </div>

              </div>
            </div>
          
          </div>
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<!-- CARD CAROUSEL JS 
<script type="text/javascript">

(function ($) {
  "use strict";
  // Auto-scroll
  $('#myCarousel').carousel({
    interval: 200
  });

  // Control buttons
  $('.next').click(function () {
    $('.carousel').carousel('next');
    return false;
  });
  $('.prev').click(function () {
    $('.carousel').carousel('prev');
    return false;
  });

  // On carousel scroll
  $("#myCarousel").on("slide.bs.carousel", function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;
    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide -
          (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end 
        if (e.direction == "left") {
          $(
            ".carousel-item").eq(i).appendTo(".carousel-inner");
        } else {
          $(".carousel-item").eq(0).appendTo(".carousel-inner");
        }
      }
    }
  });
})
(jQuery);

</script>  -->

@endsection
