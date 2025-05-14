
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


   <table style="width:100%">
    <tr>
      <th>NOM</th>
      <th>PRENOM(s)</th>
      <th>EMAIL</th>
      <th>MOT DE PASSE</th>
    </tr>
  @foreach ($data as $teacher)
    <tr>
      <td>{{$teacher->name}}</td>
      <td>{{$teacher->surname}}</td>
      <td>{{$teacher->email}}</td>
      <td><b>{{$teacher->image}}</b></td>
    </tr>
  @endforeach

  </table> 
  
<div class="page-break"></div>



