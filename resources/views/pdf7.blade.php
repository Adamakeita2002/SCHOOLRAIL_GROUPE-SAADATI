
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 20px;
}

.page-break {
    page-break-after: always;
}

/*
th, td {
  padding: 15px;
}
*/

</style>




<h2 style="text-align: center;">{{$data->name}}</h2>

   <table style="width:100%">
    <tr>
      <th>NOM</th>
      <th>PRENOM(s)</th>
      <th>MATRICULE</th>
      <th>MOT DE PASSE</th>
      <th>CLASSE</th>
    </tr>
  @foreach ($data->students->sortBy('name') as $student)
    <tr>
      <td>{{$student->name}}</td>
      <td>{{$student->surname}}</td>
      <td>{{$student->matricule}}</td>
      <td><b>{{$student->image}}</b></td>
      <td><b>{{$student->classroom->name}}</b></td>
    </tr>
  @endforeach

  </table> 
  
<div class="page-break"></div>



