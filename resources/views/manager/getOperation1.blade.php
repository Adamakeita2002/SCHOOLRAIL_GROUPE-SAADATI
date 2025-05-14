<?php use Carbon\Carbon;?>
<?php $date=Carbon::parse($q, 'UTC');?> 

      <div class="container-fluid"> <!-- container-fluid-->


            <h3 class="text-center">LES OPERATIONS A LA DATE DU ({{$date->locale('fr_FR')->isoFormat('dddd DD MMMM')}})  </h3>

            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">NATURE</th>
                <th scope="col">MONTANT</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($versements->sortByDesc('created_at') as $versement)
              <tr> 
                <td>
                  <span class="text-success"> VERSEMENT </span> @if($versement->type == 1) SCOLARITE  <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 2) BUS <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 3) CANTINE <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 4) TENUE SCOLAIRE (CLASSE) <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 5) TENUE SCOLAIRE (SPORT) <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 6) BASKET <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 7) NATATION <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 8) TAEKWONDO <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @elseif($versement->type == 9) FOURNITURE <b>({{$versement->student->name}} {{$versement->student->surname}})</b>
                  @endif
                </td>
                <td>
                  {{number_format($versement->amount)}} FCFA
                </td>
              </tr>
            @endforeach
            @foreach ($depenses->sortByDesc('created_at') as $depense)
              <tr> 
                <td>
                  <span class="text-danger"> DEPENSE </span> ({{$depense->motif}})
                </td>
                <td>
                  {{number_format($depense->amount)}} FCFA
                </td>
              </tr>
            @endforeach
              <tr> 
                <td>
                  <span class="text-primary"> <b>EN CAISSE ( {{$date->locale('FR')->isoFormat('dddd DD MMMM')}} ) </b> </span> 
                </td>
                <td>
                  <b>{{number_format($versement->amount - $depense->amount)}} FCFA</b>
                </td>
              </tr>

            </tbody>
          </table>



        @if($versements->count() <= 0 ) 
        <p class="text-center">
          <button class="btn btn-danger"> AUCUN VERSEMENT ENREGISTRE A CETTE DATE  </button>
        </p>
        @endif

        @if($depenses->count() <= 0 ) 
        <p class="text-center">
          <button class="btn btn-danger"> AUCUNE DEPENSE ENREGISTREE A CETTE DATE  </button>
        </p>
        @endif
        <hr>

      </div> <!-- END container-fluid -->