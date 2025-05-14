      <!--HEADERF -->

      <?php $title="FRAIS" ; ?>
      <!--END HEADERF -->
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title></title><meta name="author" content="HP Elitebook i5"/><style type="text/css"> * {margin:0; padding:0; text-indent:0; }
 h1 { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 12pt; }
 .s1 { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; }
 .s2 { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-sizea: 11pt; }
 .s3 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 11pt; }
 .s4 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; }
 .p, p { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; margin:0pt; }
 .s5 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 12pt; }
 .s6 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 8pt; vertical-align: 4pt; }
 .s7 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 20pt; }
 .s8 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 20pt; }
 .s9 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; }
 .s10 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 12pt; }
 .s11 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 12pt; }
 .s12 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 11pt; }
 .s13 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; }
 .s66 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size:5.5pt; vertical-align: 4pt; }
  .s11 { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; }
 h2 { color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; }
 table, tbody {vertical-align: top; overflow: visible; }

/****************/

td {
  height: 30px;
}
.table-cell-inner {
  height: 35px;
  max-height: 50px;
  overflow: hidden;
  padding-left: 2pt;
  text-indent: 0pt;
  text-align: left;
  color: black; 
  font-family:Calibri, sans-serif; 
  font-style: normal; 
  font-weight: bold; 
  text-decoration: none; 
  font-size: 8pt; 
  vertical-align: 4pt;
  padding-top: 15px;
}
.big {
  font-size: 50px;
}

/****************/

 .page-break {
    page-break-after: always;
}

div.breakNow { page-break-inside:avoid; page-break-after:always; }

th{
 background-color: #DDEBF6;
 border-top-style:solid;
 border-top-width:1pt;
 border-left-style:solid;
 border-left-width:1pt;
 border-bottom-style:solid;
 border-bottom-width:1pt;
 border-right-style:solid;
 border-right-width:1pt;
}

td{
 border-top-style:solid;
 border-top-width:1pt;
 border-left-style:solid;
 border-left-width:1pt;
 border-bottom-style:solid;
 border-bottom-width:1pt;
 border-right-style:solid;
 border-right-width:1pt;
}

tr{
  height: 150px;
}

</style>


</head>


<body style="    margin:50px 50px ; padding:0;text-align:center;"> 
<?php $m=0;  ?>
<?php $p=0;  ?>
<table width="100%" >
  <tr>
    <td align="left" style="width: 40%; border: 0px; " >
      <h1 style="padding-top: 4pt;padding-left: 9pt;text-indent: 0pt;line-height: 13pt;">
        <span class="s1" style="font-size: 10pt;"><img src="https://petiteacademy.net/wp-content/uploads/2022/02/cropped-Logo-LA-PETITE-ACADEMY.jpg" style="width:7%;"></span> <br>
  <span style="font-size: 12px"> ETATS DE PAIEMENTS <br> TENUE SCOLAIRE <br> {{$academicyearP->labelYear}}</span><br>
      </h1>

    </td>

    <td align="right" style="width: 40%; border: 0px; ">

      <h1 style="padding-top: 4pt;padding-right: 40pt;text-indent: 0pt;line-height: 13pt;text-align: left;float:right;">

        <span class="s1 " style="font-size: 10pt; padding-left: 20px;" >{{$data->name}} {{$data->surname}}</span><br>
        <span class="s1 " style="font-size: 10pt; padding-left: 50px;">------------------- </span> <br>
        <span class="s1 " style="font-size: 10pt;padding-left: 30px;">{{$data->classroom->program->fullname}} - ({{$data->classroom->name}}) </span>
      </h1>  
    </td>
  </tr>


    </table>

<h1 style="text-align:center;">TENUE SCOLAIRE</h1>



  <table style="border-collapse:collapse; "  cellspacing="0" width="100%">
      <!--HEADERF -->
<tr style="height:10pt;" > <!-- START EN TETE -->
      <th >
          <p style="text-indent: 0pt;text-align: left;"><br/></p>
          <p class="s6" >No.VERSEMENT</p>
      </th>

      <th>
        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                <p class="s6" >MONTANT</p>
      </th>

      <th >
          <p style="text-indent: 0pt;text-align: left;"><br/></p>
          <p class="s6" >DATE</p>
      </th>

</tr><!-- END EN TETE -->
      <!--END HEADERF -->
<?php $T =0;  ?>
@foreach($data->versements->where('type',4) as $versement) 

<?php $T= $T + $versement->amount;  ?>
   
@endforeach 
<?php $i =1;  ?>

 @foreach($data->versements->where('type',4) as $versement)   

      <!-- START DATA -->
        <tr >

          <td>
             <span class="s1 " style="font-size: 10pt; padding-left: 20px;" >{{$i}}</span>
          </td>

            <td >
             <span class="s1 " style="font-size: 10pt; padding-left: 20px;" >{{number_format($versement->amount)}} FCFA</span>
            </td>

            <td >
             <span class="s1 " style="font-size: 10pt; padding-left: 20px;" >  <?php 
                $date=date_create($versement->created_at);
                echo date_format($date,"d/m/Y "); 
                ?>
            </span>

                
            </td>

          </tr>
    <?php $i++ ;  ?>
    @endforeach 
          <!-- END DATA -->

</table>
<br>
<h4 > <span style="color:red">TOTAL:</span> {{number_format($T)}} FCFA  </h4>

        <?php $V=$data->versements->where('type',4)->count();  ?>
        @if($V<=0)
      <h4> Aucun Versement </h4>                
        @endif

<!-- END FOOTERF -->


<table width="100%">
  <tr>
    <td align="left" style="width: 40%; border: 0px;">
      <h1 style="padding-left: 9pt;text-indent: 0pt;line-height: 13pt;">La Directrice </h1>
    </td>
<?php  
$date=date_create(now());
?>
    <td align="center" style="width: 40%; border: 0px;">
      <h1 style="padding-top: 4pt;padding-left: 9pt;text-indent: 0pt;line-height: 13pt;"> Delivré le <?php echo date_format($date,"d/m/Y ") ; ?> ***</i> </h1>
    </td>


    <td align="right" style="width: 40%;border: 0px;">

    </td>


  </tr>

</table>




</body>
</html>