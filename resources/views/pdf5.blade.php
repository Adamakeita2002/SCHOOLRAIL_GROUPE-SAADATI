
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
  @foreach ($data as $manager)
    <tr>
      <td>{{$manager->name}}</td>
      <td>{{$manager->surname}}</td>
      <td>{{$manager->email}}</td>
      <td><b>{{$manager->image}}</b></td>
    </tr>
  @endforeach

  </table> 
  
<div class="page-break"></div>



