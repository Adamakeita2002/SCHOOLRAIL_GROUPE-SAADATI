        <?php use Carbon\Carbon;?>

          <div class="row">

            <div class="card-body">
                
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                <th scope="col">MATIERE</th>
                <th scope="col">TEST</th>
                <th scope="col">DATE / HEURE</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($calendars->sortByDesc('timing') as $calendar)
            <?php  
              $Ndate=now(); 
              $Cdate=$calendar->date;
            //  echo $Ndate;
             // $dateN = new DateTime($Ndate);
              //$dateC = new DateTime($Cdate);
            ?>
              <tr id="C{{$calendar->id}}"> 

                <td style="@if ($Ndate > $Cdate ) background-color: #ff000036; @endif  ">{{$calendar->subject->name}}</td>

                <td style="@if ($Ndate > $Cdate ) background-color: #ff000036; @endif  " ><p class="@if($calendar->epreuve_id == 1) badge badge-primary @elseif($calendar->epreuve_id == 2) badge badge-success @else badge badge-dark @endif " style="font-size: 18px" >{{$calendar->epreuve->name}}</p></td>

                <td style="@if ($Ndate > $Cdate ) background-color: #ff000036; @endif  ">
                  <?php $date=Carbon::parse($calendar->date, 'UTC');?>   
                 <b>{{$date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')}}</b>
                  <br>
                  <?php $time=Carbon::parse($calendar->time, 'UTC'); ?>
                  <b><?php echo date("G:i", strtotime($calendar->time)); ?></b>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

                </div>

          </div>


        <!-- EMPTY HANDLER -->
        @if($calendars->count() <= 0 ) 
        <p class="text-center">
          <button class="btn btn-danger"> Pas de calendrier disponible </button>
        </p>
        @endif
        <!-- END EMPTY HANDLER -->