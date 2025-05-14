        <?php use Carbon\Carbon;?>

<div class="row">

  <table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center">Lundi</th>
      <th class="text-center">Mardi</th>
      <th class="text-center">Mercredi</th>
      <th class="text-center">Jeudi</th>
      <th class="text-center">Vendredi</th>
      <th class="text-center">Samedi</th>
    </tr>
  </thead>
  <tbody>

@if(is_object($lundi8) OR is_object($mardi8) OR is_object($mercredi8) OR is_object($jeudi8) OR is_object($vendredi8) OR is_object($samedi8))
     <tr>
       <td class="text-center">@if(is_object($lundi8)) {{$lundi8->name}} <br> <b><?php echo date("G:i", strtotime($lundi8->startime));?> - <?php echo date("G:i", strtotime($lundi8->endtime));?></b><br><b>Prof:</b> {{$lundi8->teacher->name}} {{$lundi8->teacher->surname}}  @else {{$lundi8}} @endif</td>

       <td class="text-center">@if(is_object($mardi8)) {{$mardi8->name}} <br> <b><?php echo date("G:i", strtotime($mardi8->startime));?> - <?php echo date("G:i", strtotime($mardi8->endtime));?></b><br><b>Prof:</b> {{$mardi8->teacher->name}} {{$mardi8->teacher->surname}}  @else {{$mardi8}}@endif</td>

       <td class="text-center">@if(is_object($mercredi8)) {{$mercredi8->name}} <br> <b><?php echo date("G:i", strtotime($mercredi8->startime));?> - <?php echo date("G:i", strtotime($mercredi8->endtime));?></b><br><b>Prof:</b> {{$mercredi8->teacher->name}} {{$mercredi8->teacher->surname}} @else {{$mercredi8}}@endif</td>

       <td class="text-center">@if(is_object($jeudi8)){{$jeudi8->name}} <br> <b><?php echo date("G:i", strtotime($jeudi8->startime));?> - <?php echo date("G:i", strtotime($jeudi8->endtime));?></b><br><b>Prof:</b> {{$jeudi8->teacher->name}} {{$jeudi8->teacher->surname}} @else {{$jeudi8}}@endif</td>

       <td class="text-center">@if(is_object($vendredi8)){{$vendredi8->name}} <br> <b><?php echo date("G:i", strtotime($vendredi8->startime));?> - <?php echo date("G:i", strtotime($vendredi8->endtime));?></b><br><b>Prof:</b> {{$vendredi8->teacher->name}} {{$vendredi8->teacher->surname}}  @else {{$vendredi8}}@endif</td>

       <td class="text-center">@if(is_object($samedi8)){{$samedi8->name}} <br> <b><?php echo date("G:i", strtotime($samedi8->startime));?> - <?php echo date("G:i", strtotime($samedi8->endtime));?></b><br><b>Prof:</b> {{$samedi8->teacher->name}} {{$samedi8->teacher->surname}}  @else {{$samedi8}}@endif</td>
     </tr>
@endif

@if(is_object($lundi9) OR is_object($mardi9) OR is_object($mercredi9) OR is_object($jeudi9) OR is_object($vendredi9) OR is_object($samedi9))
     <tr>
       <td class="text-center">@if(is_object($lundi9)) {{$lundi9->name}} <br> <b><?php echo date("G:i", strtotime($lundi9->startime));?> - <?php echo date("G:i", strtotime($lundi9->endtime));?></b><br><b>Prof:</b> {{$lundi9->teacher->name}} {{$lundi9->teacher->surname}}  @else {{$lundi9}} @endif</td>

       <td class="text-center">@if(is_object($mardi9)) {{$mardi9->name}} <br> <b><?php echo date("G:i", strtotime($mardi9->startime));?> - <?php echo date("G:i", strtotime($mardi9->endtime));?></b><br><b>Prof:</b> {{$mardi9->teacher->name}} {{$mardi9->teacher->surname}}  @else {{$mardi9}}@endif</td>

       <td class="text-center">@if(is_object($mercredi9)) {{$mercredi9->name}} <br> <b><?php echo date("G:i", strtotime($mercredi9->startime));?> - <?php echo date("G:i", strtotime($mercredi9->endtime));?></b><br><b>Prof:</b> {{$mercredi9->teacher->name}} {{$mercredi9->teacher->surname}} @else {{$mercredi9}}@endif</td>

       <td class="text-center">@if(is_object($jeudi9)){{$jeudi9->name}} <br> <b><?php echo date("G:i", strtotime($jeudi9->startime));?> - <?php echo date("G:i", strtotime($jeudi9->endtime));?></b><br><b>Prof:</b> {{$jeudi9->teacher->name}} {{$jeudi9->teacher->surname}} @else {{$jeudi9}}@endif</td>

       <td class="text-center">@if(is_object($vendredi9)){{$vendredi9->name}} <br> <b><?php echo date("G:i", strtotime($vendredi9->startime));?> - <?php echo date("G:i", strtotime($vendredi9->endtime));?></b><br><b>Prof:</b> {{$vendredi9->teacher->name}} {{$vendredi9->teacher->surname}}  @else {{$vendredi9}}@endif</td>

       <td class="text-center">@if(is_object($samedi9)){{$samedi9->name}} <br> <b><?php echo date("G:i", strtotime($samedi9->startime));?> - <?php echo date("G:i", strtotime($samedi9->endtime));?></b><br><b>Prof:</b> {{$samedi9->teacher->name}} {{$samedi9->teacher->surname}}  @else {{$samedi9}}@endif</td>
     </tr>
@endif

@if(is_object($lundi10) OR is_object($mardi10) OR is_object($mercredi10) OR is_object($jeudi10) OR is_object($vendredi10) OR is_object($samedi10))
     <tr>
       <td class="text-center">@if(is_object($lundi10)) {{$lundi10->name}} <br> <b><?php echo date("G:i", strtotime($lundi10->startime));?> - <?php echo date("G:i", strtotime($lundi10->endtime));?></b><br><b>Prof:</b> {{$lundi10->teacher->name}} {{$lundi10->teacher->surname}}  @else {{$lundi10}} @endif</td>

       <td class="text-center">@if(is_object($mardi10)) {{$mardi10->name}} <br> <b><?php echo date("G:i", strtotime($mardi10->startime));?> - <?php echo date("G:i", strtotime($mardi10->endtime));?></b><br><b>Prof:</b> {{$mardi10->teacher->name}} {{$mardi10->teacher->surname}}  @else {{$mardi10}}@endif</td>

       <td class="text-center">@if(is_object($mercredi10)) {{$mercredi10->name}} <br> <b><?php echo date("G:i", strtotime($mercredi10->startime));?> - <?php echo date("G:i", strtotime($mercredi10->endtime));?></b><br><b>Prof:</b> {{$mercredi10->teacher->name}} {{$mercredi10->teacher->surname}} @else {{$mercredi10}}@endif</td>

       <td class="text-center">@if(is_object($jeudi10)){{$jeudi10->name}} <br> <b><?php echo date("G:i", strtotime($jeudi10->startime));?> - <?php echo date("G:i", strtotime($jeudi10->endtime));?></b><br><b>Prof:</b> {{$jeudi10->teacher->name}} {{$jeudi10->teacher->surname}} @else {{$jeudi10}}@endif</td>

       <td class="text-center">@if(is_object($vendredi10)){{$vendredi10->name}} <br> <b><?php echo date("G:i", strtotime($vendredi10->startime));?> - <?php echo date("G:i", strtotime($vendredi10->endtime));?></b><br><b>Prof:</b> {{$vendredi10->teacher->name}} {{$vendredi10->teacher->surname}}  @else {{$vendredi10}}@endif</td>

       <td class="text-center">@if(is_object($samedi10)){{$samedi10->name}} <br> <b><?php echo date("G:i", strtotime($samedi10->startime));?> - <?php echo date("G:i", strtotime($samedi10->endtime));?></b><br><b>Prof:</b> {{$samedi10->teacher->name}} {{$samedi10->teacher->surname}}  @else {{$samedi10}}@endif</td>
     </tr>
@endif

@if(is_object($lundi11) OR is_object($mardi11) OR is_object($mercredi11) OR is_object($jeudi11) OR is_object($vendredi11) OR is_object($samedi11))
     <tr>
       <td class="text-center">@if(is_object($lundi11)) {{$lundi11->name}} <br> <b><?php echo date("G:i", strtotime($lundi11->startime));?> - <?php echo date("G:i", strtotime($lundi11->endtime));?></b><br><b>Prof:</b> {{$lundi11->teacher->name}} {{$lundi11->teacher->surname}}  @else {{$lundi11}} @endif</td>

       <td class="text-center">@if(is_object($mardi11)) {{$mardi11->name}} <br> <b><?php echo date("G:i", strtotime($mardi11->startime));?> - <?php echo date("G:i", strtotime($mardi11->endtime));?></b><br><b>Prof:</b> {{$mardi11->teacher->name}} {{$mardi11->teacher->surname}}  @else {{$mardi11}}@endif</td>

       <td class="text-center">@if(is_object($mercredi11)) {{$mercredi11->name}} <br> <b><?php echo date("G:i", strtotime($mercredi11->startime));?> - <?php echo date("G:i", strtotime($mercredi11->endtime));?></b><br><b>Prof:</b> {{$mercredi11->teacher->name}} {{$mercredi11->teacher->surname}} @else {{$mercredi11}}@endif</td>

       <td class="text-center">@if(is_object($jeudi11)){{$jeudi11->name}} <br> <b><?php echo date("G:i", strtotime($jeudi11->startime));?> - <?php echo date("G:i", strtotime($jeudi11->endtime));?></b><br><b>Prof:</b> {{$jeudi11->teacher->name}} {{$jeudi11->teacher->surname}} @else {{$jeudi11}}@endif</td>

       <td class="text-center">@if(is_object($vendredi11)){{$vendredi11->name}} <br> <b><?php echo date("G:i", strtotime($vendredi11->startime));?> - <?php echo date("G:i", strtotime($vendredi11->endtime));?></b><br><b>Prof:</b> {{$vendredi11->teacher->name}} {{$vendredi11->teacher->surname}}  @else {{$vendredi11}}@endif</td>

       <td class="text-center">@if(is_object($samedi11)){{$samedi11->name}} <br> <b><?php echo date("G:i", strtotime($samedi11->startime));?> - <?php echo date("G:i", strtotime($samedi11->endtime));?></b><br><b>Prof:</b> {{$samedi11->teacher->name}} {{$samedi11->teacher->surname}}  @else {{$samedi11}}@endif</td>
     </tr>
@endif

@if(is_object($lundi12) OR is_object($mardi12) OR is_object($mercredi12) OR is_object($jeudi12) OR is_object($vendredi12) OR is_object($samedi12))
     <tr>
       <td class="text-center">@if(is_object($lundi12)) {{$lundi12->name}} <br> <b><?php echo date("G:i", strtotime($lundi12->startime));?> - <?php echo date("G:i", strtotime($lundi12->endtime));?></b><br><b>Prof:</b> {{$lundi12->teacher->name}} {{$lundi12->teacher->surname}}  @else {{$lundi12}} @endif</td>

       <td class="text-center">@if(is_object($mardi12)) {{$mardi12->name}} <br> <b><?php echo date("G:i", strtotime($mardi12->startime));?> - <?php echo date("G:i", strtotime($mardi12->endtime));?></b><br><b>Prof:</b> {{$mardi12->teacher->name}} {{$mardi12->teacher->surname}}  @else {{$mardi12}}@endif</td>

       <td class="text-center">@if(is_object($mercredi12)) {{$mercredi12->name}} <br> <b><?php echo date("G:i", strtotime($mercredi12->startime));?> - <?php echo date("G:i", strtotime($mercredi12->endtime));?></b><br><b>Prof:</b> {{$mercredi12->teacher->name}} {{$mercredi12->teacher->surname}} @else {{$mercredi12}}@endif</td>

       <td class="text-center">@if(is_object($jeudi12)){{$jeudi12->name}} <br> <b><?php echo date("G:i", strtotime($jeudi12->startime));?> - <?php echo date("G:i", strtotime($jeudi12->endtime));?></b><br><b>Prof:</b> {{$jeudi12->teacher->name}} {{$jeudi12->teacher->surname}} @else {{$jeudi12}}@endif</td>

       <td class="text-center">@if(is_object($vendredi12)){{$vendredi12->name}} <br> <b><?php echo date("G:i", strtotime($vendredi12->startime));?> - <?php echo date("G:i", strtotime($vendredi12->endtime));?></b><br><b>Prof:</b> {{$vendredi12->teacher->name}} {{$vendredi12->teacher->surname}}  @else {{$vendredi12}}@endif</td>

       <td class="text-center">@if(is_object($samedi12)){{$samedi12->name}} <br> <b><?php echo date("G:i", strtotime($samedi12->startime));?> - <?php echo date("G:i", strtotime($samedi12->endtime));?></b><br><b>Prof:</b> {{$samedi12->teacher->name}} {{$samedi12->teacher->surname}}  @else {{$samedi12}}@endif</td>
     </tr>
@endif

@if(is_object($lundi13) OR is_object($mardi13) OR is_object($mercredi13) OR is_object($jeudi13) OR is_object($vendredi13) OR is_object($samedi13))
     <tr>
       <td class="text-center">@if(is_object($lundi13)) {{$lundi13->name}} <br> <b><?php echo date("G:i", strtotime($lundi13->startime));?> - <?php echo date("G:i", strtotime($lundi13->endtime));?></b><br><b>Prof:</b> {{$lundi13->teacher->name}} {{$lundi13->teacher->surname}}  @else {{$lundi13}} @endif</td>

       <td class="text-center">@if(is_object($mardi13)) {{$mardi13->name}} <br> <b><?php echo date("G:i", strtotime($mardi13->startime));?> - <?php echo date("G:i", strtotime($mardi13->endtime));?></b><br><b>Prof:</b> {{$mardi13->teacher->name}} {{$mardi13->teacher->surname}}  @else {{$mardi13}}@endif</td>

       <td class="text-center">@if(is_object($mercredi13)) {{$mercredi13->name}} <br> <b><?php echo date("G:i", strtotime($mercredi13->startime));?> - <?php echo date("G:i", strtotime($mercredi13->endtime));?></b><br><b>Prof:</b> {{$mercredi13->teacher->name}} {{$mercredi13->teacher->surname}} @else {{$mercredi13}}@endif</td>

       <td class="text-center">@if(is_object($jeudi13)){{$jeudi13->name}} <br> <b><?php echo date("G:i", strtotime($jeudi13->startime));?> - <?php echo date("G:i", strtotime($jeudi13->endtime));?></b><br><b>Prof:</b> {{$jeudi13->teacher->name}} {{$jeudi13->teacher->surname}} @else {{$jeudi13}}@endif</td>

       <td class="text-center">@if(is_object($vendredi13)){{$vendredi13->name}} <br> <b><?php echo date("G:i", strtotime($vendredi13->startime));?> - <?php echo date("G:i", strtotime($vendredi13->endtime));?></b><br><b>Prof:</b> {{$vendredi13->teacher->name}} {{$vendredi13->teacher->surname}}  @else {{$vendredi13}}@endif</td>

       <td class="text-center">@if(is_object($samedi13)){{$samedi13->name}} <br> <b><?php echo date("G:i", strtotime($samedi13->startime));?> - <?php echo date("G:i", strtotime($samedi13->endtime));?></b><br><b>Prof:</b> {{$samedi13->teacher->name}} {{$samedi13->teacher->surname}}  @else {{$samedi13}}@endif</td>
     </tr>
@endif


@if(is_object($lundi14) OR is_object($mardi14) OR is_object($mercredi14) OR is_object($jeudi14) OR is_object($vendredi14) OR is_object($samedi14))
     <tr>
       <td class="text-center">@if(is_object($lundi14)) {{$lundi14->name}} <br> <b><?php echo date("G:i", strtotime($lundi14->startime));?> - <?php echo date("G:i", strtotime($lundi14->endtime));?></b><br><b>Prof:</b> {{$lundi14->teacher->name}} {{$lundi14->teacher->surname}}  @else {{$lundi14}} @endif</td>

       <td class="text-center">@if(is_object($mardi14)) {{$mardi14->name}} <br> <b><?php echo date("G:i", strtotime($mardi14->startime));?> - <?php echo date("G:i", strtotime($mardi14->endtime));?></b><br><b>Prof:</b> {{$mardi14->teacher->name}} {{$mardi14->teacher->surname}}  @else {{$mardi14}}@endif</td>

       <td class="text-center">@if(is_object($mercredi14)) {{$mercredi14->name}} <br> <b><?php echo date("G:i", strtotime($mercredi14->startime));?> - <?php echo date("G:i", strtotime($mercredi14->endtime));?></b><br><b>Prof:</b> {{$mercredi14->teacher->name}} {{$mercredi14->teacher->surname}} @else {{$mercredi14}}@endif</td>

       <td class="text-center">@if(is_object($jeudi14)){{$jeudi14->name}} <br> <b><?php echo date("G:i", strtotime($jeudi14->startime));?> - <?php echo date("G:i", strtotime($jeudi14->endtime));?></b><br><b>Prof:</b> {{$jeudi14->teacher->name}} {{$jeudi14->teacher->surname}} @else {{$jeudi14}}@endif</td>

       <td class="text-center">@if(is_object($vendredi14)){{$vendredi14->name}} <br> <b><?php echo date("G:i", strtotime($vendredi14->startime));?> - <?php echo date("G:i", strtotime($vendredi14->endtime));?></b><br><b>Prof:</b> {{$vendredi14->teacher->name}} {{$vendredi14->teacher->surname}}  @else {{$vendredi14}}@endif</td>

       <td class="text-center">@if(is_object($samedi14)){{$samedi14->name}} <br> <b><?php echo date("G:i", strtotime($samedi14->startime));?> - <?php echo date("G:i", strtotime($samedi14->endtime));?></b><br><b>Prof:</b> {{$samedi14->teacher->name}} {{$samedi14->teacher->surname}}  @else {{$samedi14}}@endif</td>
     </tr>
@endif


@if(is_object($lundi15) OR is_object($mardi15) OR is_object($mercredi15) OR is_object($jeudi15) OR is_object($vendredi15) OR is_object($samedi15))
     <tr>
       <td class="text-center">@if(is_object($lundi15)) {{$lundi15->name}} <br> <b><?php echo date("G:i", strtotime($lundi15->startime));?> - <?php echo date("G:i", strtotime($lundi15->endtime));?></b><br><b>Prof:</b> {{$lundi15->teacher->name}} {{$lundi15->teacher->surname}}  @else {{$lundi15}} @endif</td>

       <td class="text-center">@if(is_object($mardi15)) {{$mardi15->name}} <br> <b><?php echo date("G:i", strtotime($mardi15->startime));?> - <?php echo date("G:i", strtotime($mardi15->endtime));?></b><br><b>Prof:</b> {{$mardi15->teacher->name}} {{$mardi15->teacher->surname}}  @else {{$mardi15}}@endif</td>

       <td class="text-center">@if(is_object($mercredi15)) {{$mercredi15->name}} <br> <b><?php echo date("G:i", strtotime($mercredi15->startime));?> - <?php echo date("G:i", strtotime($mercredi15->endtime));?></b><br><b>Prof:</b> {{$mercredi15->teacher->name}} {{$mercredi15->teacher->surname}} @else {{$mercredi15}}@endif</td>

       <td class="text-center">@if(is_object($jeudi15)){{$jeudi15->name}} <br> <b><?php echo date("G:i", strtotime($jeudi15->startime));?> - <?php echo date("G:i", strtotime($jeudi15->endtime));?></b><br><b>Prof:</b> {{$jeudi15->teacher->name}} {{$jeudi15->teacher->surname}} @else {{$jeudi15}}@endif</td>

       <td class="text-center">@if(is_object($vendredi15)){{$vendredi15->name}} <br> <b><?php echo date("G:i", strtotime($vendredi15->startime));?> - <?php echo date("G:i", strtotime($vendredi15->endtime));?></b><br><b>Prof:</b> {{$vendredi15->teacher->name}} {{$vendredi15->teacher->surname}}  @else {{$vendredi15}}@endif</td>

       <td class="text-center">@if(is_object($samedi15)){{$samedi15->name}} <br> <b><?php echo date("G:i", strtotime($samedi15->startime));?> - <?php echo date("G:i", strtotime($samedi15->endtime));?></b><br><b>Prof:</b> {{$samedi15->teacher->name}} {{$samedi15->teacher->surname}}  @else {{$samedi15}}@endif</td>
     </tr>
@endif

@if(is_object($lundi16) OR is_object($mardi16) OR is_object($mercredi16) OR is_object($jeudi16) OR is_object($vendredi16) OR is_object($samedi16))
     <tr>
       <td class="text-center">@if(is_object($lundi16)) {{$lundi16->name}} <br> <b><?php echo date("G:i", strtotime($lundi16->startime));?> - <?php echo date("G:i", strtotime($lundi16->endtime));?></b><br><b>Prof:</b> {{$lundi16->teacher->name}} {{$lundi16->teacher->surname}}  @else {{$lundi16}} @endif</td>

       <td class="text-center">@if(is_object($mardi16)) {{$mardi16->name}} <br> <b><?php echo date("G:i", strtotime($mardi16->startime));?> - <?php echo date("G:i", strtotime($mardi16->endtime));?></b><br><b>Prof:</b> {{$mardi16->teacher->name}} {{$mardi16->teacher->surname}}  @else {{$mardi16}}@endif</td>

       <td class="text-center">@if(is_object($mercredi16)) {{$mercredi16->name}} <br> <b><?php echo date("G:i", strtotime($mercredi16->startime));?> - <?php echo date("G:i", strtotime($mercredi16->endtime));?></b><br><b>Prof:</b> {{$mercredi16->teacher->name}} {{$mercredi16->teacher->surname}} @else {{$mercredi16}}@endif</td>

       <td class="text-center">@if(is_object($jeudi16)){{$jeudi16->name}} <br> <b><?php echo date("G:i", strtotime($jeudi16->startime));?> - <?php echo date("G:i", strtotime($jeudi16->endtime));?></b><br><b>Prof:</b> {{$jeudi16->teacher->name}} {{$jeudi16->teacher->surname}} @else {{$jeudi16}}@endif</td>

       <td class="text-center">@if(is_object($vendredi16)){{$vendredi16->name}} <br> <b><?php echo date("G:i", strtotime($vendredi16->startime));?> - <?php echo date("G:i", strtotime($vendredi16->endtime));?></b><br><b>Prof:</b> {{$vendredi16->teacher->name}} {{$vendredi16->teacher->surname}}  @else {{$vendredi16}}@endif</td>

       <td class="text-center">@if(is_object($samedi16)){{$samedi16->name}} <br> <b><?php echo date("G:i", strtotime($samedi16->startime));?> - <?php echo date("G:i", strtotime($samedi16->endtime));?></b><br><b>Prof:</b> {{$samedi16->teacher->name}} {{$samedi16->teacher->surname}}  @else {{$samedi16}}@endif</td>
     </tr>
@endif

@if(is_object($lundi17) OR is_object($mardi17) OR is_object($mercredi17) OR is_object($jeudi17) OR is_object($vendredi17) OR is_object($samedi17))
     <tr>
       <td class="text-center">@if(is_object($lundi17)) {{$lundi17->name}} <br> <b><?php echo date("G:i", strtotime($lundi17->startime));?> - <?php echo date("G:i", strtotime($lundi17->endtime));?></b><br><b>Prof:</b> {{$lundi17->teacher->name}} {{$lundi17->teacher->surname}}  @else {{$lundi17}} @endif</td>

       <td class="text-center">@if(is_object($mardi17)) {{$mardi17->name}} <br> <b><?php echo date("G:i", strtotime($mardi17->startime));?> - <?php echo date("G:i", strtotime($mardi17->endtime));?></b><br><b>Prof:</b> {{$mardi17->teacher->name}} {{$mardi17->teacher->surname}}  @else {{$mardi17}}@endif</td>

       <td class="text-center">@if(is_object($mercredi17)) {{$mercredi17->name}} <br> <b><?php echo date("G:i", strtotime($mercredi17->startime));?> - <?php echo date("G:i", strtotime($mercredi17->endtime));?></b><br><b>Prof:</b> {{$mercredi17->teacher->name}} {{$mercredi17->teacher->surname}} @else {{$mercredi17}}@endif</td>

       <td class="text-center">@if(is_object($jeudi17)){{$jeudi17->name}} <br> <b><?php echo date("G:i", strtotime($jeudi17->startime));?> - <?php echo date("G:i", strtotime($jeudi17->endtime));?></b><br><b>Prof:</b> {{$jeudi17->teacher->name}} {{$jeudi17->teacher->surname}} @else {{$jeudi17}}@endif</td>

       <td class="text-center">@if(is_object($vendredi17)){{$vendredi17->name}} <br> <b><?php echo date("G:i", strtotime($vendredi17->startime));?> - <?php echo date("G:i", strtotime($vendredi17->endtime));?></b><br><b>Prof:</b> {{$vendredi17->teacher->name}} {{$vendredi17->teacher->surname}}  @else {{$vendredi17}}@endif</td>

       <td class="text-center">@if(is_object($samedi17)){{$samedi17->name}} <br> <b><?php echo date("G:i", strtotime($samedi17->startime));?> - <?php echo date("G:i", strtotime($samedi17->endtime));?></b><br><b>Prof:</b> {{$samedi17->teacher->name}} {{$samedi17->teacher->surname}}  @else {{$samedi17}}@endif</td>
     </tr>
@endif

@if(is_object($lundi18) OR is_object($mardi18) OR is_object($mercredi18) OR is_object($jeudi18) OR is_object($vendredi18) OR is_object($samedi18))
     <tr>
       <td class="text-center">@if(is_object($lundi18)) {{$lundi18->name}} <br> <b><?php echo date("G:i", strtotime($lundi18->startime));?> - <?php echo date("G:i", strtotime($lundi18->endtime));?></b><br><b>Prof:</b> {{$lundi18->teacher->name}} {{$lundi18->teacher->surname}}  @else {{$lundi18}} @endif</td>

       <td class="text-center">@if(is_object($mardi18)) {{$mardi18->name}} <br> <b><?php echo date("G:i", strtotime($mardi18->startime));?> - <?php echo date("G:i", strtotime($mardi18->endtime));?></b><br><b>Prof:</b> {{$mardi18->teacher->name}} {{$mardi18->teacher->surname}}  @else {{$mardi18}}@endif</td>

       <td class="text-center">@if(is_object($mercredi18)) {{$mercredi18->name}} <br> <b><?php echo date("G:i", strtotime($mercredi18->startime));?> - <?php echo date("G:i", strtotime($mercredi18->endtime));?></b><br><b>Prof:</b> {{$mercredi18->teacher->name}} {{$mercredi18->teacher->surname}} @else {{$mercredi18}}@endif</td>

       <td class="text-center">@if(is_object($jeudi18)){{$jeudi18->name}} <br> <b><?php echo date("G:i", strtotime($jeudi18->startime));?> - <?php echo date("G:i", strtotime($jeudi18->endtime));?></b><br><b>Prof:</b> {{$jeudi18->teacher->name}} {{$jeudi18->teacher->surname}} @else {{$jeudi18}}@endif</td>

       <td class="text-center">@if(is_object($vendredi18)){{$vendredi18->name}} <br> <b><?php echo date("G:i", strtotime($vendredi18->startime));?> - <?php echo date("G:i", strtotime($vendredi18->endtime));?></b><br><b>Prof:</b> {{$vendredi18->teacher->name}} {{$vendredi18->teacher->surname}}  @else {{$vendredi18}}@endif</td>

       <td class="text-center">@if(is_object($samedi18)){{$samedi18->name}} <br> <b><?php echo date("G:i", strtotime($samedi18->startime));?> - <?php echo date("G:i", strtotime($samedi18->endtime));?></b><br><b>Prof:</b> {{$samedi18->teacher->name}} {{$samedi18->teacher->surname}}  @else {{$samedi18}}@endif</td>
     </tr>
@endif


@if(is_object($lundi19) OR is_object($mardi19) OR is_object($mercredi19) OR is_object($jeudi19) OR is_object($vendredi19) OR is_object($samedi19))

     <tr>
       <td class="text-center">@if(is_object($lundi19)) {{$lundi19->name}} <br> <b><?php echo date("G:i", strtotime($lundi19->startime));?> - <?php echo date("G:i", strtotime($lundi19->endtime));?></b><br><b>Prof:</b> {{$lundi19->teacher->name}} {{$lundi19->teacher->surname}}  @else {{$lundi19}} @endif</td>

       <td class="text-center">@if(is_object($mardi19)) {{$mardi19->name}} <br> <b><?php echo date("G:i", strtotime($mardi19->startime));?> - <?php echo date("G:i", strtotime($mardi19->endtime));?></b><br><b>Prof:</b> {{$mardi19->teacher->name}} {{$mardi19->teacher->surname}}  @else {{$mardi19}}@endif</td>

       <td class="text-center">@if(is_object($mercredi19)) {{$mercredi19->name}} <br> <b><?php echo date("G:i", strtotime($mercredi19->startime));?> - <?php echo date("G:i", strtotime($mercredi19->endtime));?></b><br><b>Prof:</b> {{$mercredi19->teacher->name}} {{$mercredi19->teacher->surname}} @else {{$mercredi19}}@endif</td>

       <td class="text-center">@if(is_object($jeudi19)){{$jeudi19->name}} <br> <b><?php echo date("G:i", strtotime($jeudi19->startime));?> - <?php echo date("G:i", strtotime($jeudi19->endtime));?></b><br><b>Prof:</b> {{$jeudi19->teacher->name}} {{$jeudi19->teacher->surname}} @else {{$jeudi19}}@endif</td>

       <td class="text-center">@if(is_object($vendredi19)){{$vendredi19->name}} <br> <b><?php echo date("G:i", strtotime($vendredi19->startime));?> - <?php echo date("G:i", strtotime($vendredi19->endtime));?></b><br><b>Prof:</b> {{$vendredi19->teacher->name}} {{$vendredi19->teacher->surname}}  @else {{$vendredi19}}@endif</td>

       <td class="text-center">@if(is_object($samedi19)){{$samedi19->name}} <br> <b><?php echo date("G:i", strtotime($samedi19->startime));?> - <?php echo date("G:i", strtotime($samedi19->endtime));?></b><br><b>Prof:</b> {{$samedi19->teacher->name}} {{$samedi19->teacher->surname}}  @else {{$samedi19}}@endif</td>
     </tr>
@endif

@if(is_object($lundi20) OR is_object($mardi20) OR is_object($mercredi20) OR is_object($jeudi20) OR is_object($vendredi20) OR is_object($samedi20))
     <tr>
       <td class="text-center">@if(is_object($lundi20)) {{$lundi20->name}} <br> <b><?php echo date("G:i", strtotime($lundi20->startime));?> - <?php echo date("G:i", strtotime($lundi20->endtime));?></b><br><b>Prof:</b> {{$lundi20->teacher->name}} {{$lundi20->teacher->surname}}  @else {{$lundi20}} @endif</td>

       <td class="text-center">@if(is_object($mardi20)) {{$mardi20->name}} <br> <b><?php echo date("G:i", strtotime($mardi20->startime));?> - <?php echo date("G:i", strtotime($mardi20->endtime));?></b><br><b>Prof:</b> {{$mardi20->teacher->name}} {{$mardi20->teacher->surname}}  @else {{$mardi20}}@endif</td>

       <td class="text-center">@if(is_object($mercredi20)) {{$mercredi20->name}} <br> <b><?php echo date("G:i", strtotime($mercredi20->startime));?> - <?php echo date("G:i", strtotime($mercredi20->endtime));?></b><br><b>Prof:</b> {{$mercredi20->teacher->name}} {{$mercredi20->teacher->surname}} @else {{$mercredi20}}@endif</td>

       <td class="text-center">@if(is_object($jeudi20)){{$jeudi20->name}} <br> <b><?php echo date("G:i", strtotime($jeudi20->startime));?> - <?php echo date("G:i", strtotime($jeudi20->endtime));?></b><br><b>Prof:</b> {{$jeudi20->teacher->name}} {{$jeudi20->teacher->surname}} @else {{$jeudi20}}@endif</td>

       <td class="text-center">@if(is_object($vendredi20)){{$vendredi20->name}} <br> <b><?php echo date("G:i", strtotime($vendredi20->startime));?> - <?php echo date("G:i", strtotime($vendredi20->endtime));?></b><br><b>Prof:</b> {{$vendredi20->teacher->name}} {{$vendredi20->teacher->surname}}  @else {{$vendredi20}}@endif</td>

       <td class="text-center">@if(is_object($samedi20)){{$samedi20->name}} <br> <b><?php echo date("G:i", strtotime($samedi20->startime));?> - <?php echo date("G:i", strtotime($samedi20->endtime));?></b><br><b>Prof:</b> {{$samedi20->teacher->name}} {{$samedi20->teacher->surname}}  @else {{$samedi20}}@endif</td>
     </tr>
@endif


  </tbody>
</table>   

</div>

@if($timetable->count() == 0)

<p class="text-center"> <button class="btn btn-danger"><b>PAS DE MATIERE PROGRAMMEE</b></button> </p>

@endif
