@extends ('layouts.master')


@section ('content')


 <html>
<head>
<script>
function loadDoc2() {
  
  var p2 = document.getElementById('product2');
  var product2 = p2.value ;
  
    if(p2.value == "") {
      alert("Veuillez entrer un mot");
      p2.value.focus();
      return false;
    }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo2").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","/getuser?q="+product2,true);
  xhttp.send();
}
</script>
</head>
<body>


    <div class="form-group">
      <label for =""> MOT-CLE </label>
        <input required="" class="form-control input-sm" type="text" id="product2" placeholder="Que Cherchez-Vous ? " style="width:250px" >
    </div>
    <div class="form-group">
      <label for =""> RECHERCHER </label>
       <input class="btn btn-primary btn-lg btn-block" type="submit" onclick="loadDoc2();" value="RECHERCHER"> 
    </div>

<br>
<span id="demo2">TEKAI</span>

</body>
</html> 



@endsection
