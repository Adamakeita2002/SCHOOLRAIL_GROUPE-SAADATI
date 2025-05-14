@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>
  <?php $q=$_GET["q"] ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarT')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarT')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Elève</li>
            <li class="breadcrumb-item active" aria-current="page">Liste élève</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

              @if (session('status1'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status2'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status2') }}<br></b>
                      </div>
                  </div>
              @endif
              @if (session('status3'))
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status3') }}<br></b>
                      </div>
                  </div>
              @endif

  <h6 class="my-4 text-center">LISTE DES ELEVES DE LA CLASSE <b>{{$classroom->name}}</b></h6>

                <!--  </form>    -->  

<hr>
@if (!empty($classroom->students))
        <div class="table-responsive">
          <div class="card-body">
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">INFORMATION(s)</th>


              </tr>
            </thead>
            <tbody>
              @foreach($classroom->students as $student)
              <tr> 
                <td>{{$student->name}} </td>
                <td>{{$student->surname}}</td>
                <td>{{$student->email}} <br> {{$student->tel}}</td>
              </tr>
             @endforeach 
            </tbody>
          </table>

    <hr>

          </div>

        </div>

@else
<h3 class="text-danger text-center"><b>AUCUN ELEVE DANS CETTE CLASSE</b></h3>
@endif

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection


