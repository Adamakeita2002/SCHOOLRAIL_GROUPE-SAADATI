@extends ('layouts.master')


@section ('content')

<?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarM')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarM')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Pré-inscription</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmetudiant.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

            <form  action="/manager/CreateNewRegStudent" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer le nom de l' élève</b></label>
                        <input type="text" name="name" placeholder="Nom" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) de l' élève</b></label>
                        <input type="text" name="surname" placeholder="Prénom(s)" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la date de naissance de l' élève</b></label>
                        <input type="date" name="dateofbirth" placeholder="Date de naissance" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la nationalité de l' élève</b></label>
                        <input type="texte" name="nationality" placeholder="Nationalité" class="form-control">

                      </div>

                   <div class="form-group">
                        <label><b>Entrer le contact de l' élèvet</b></label>
                        <input type="number" name="tel" placeholder="Telephone" class="form-control">
                      </div>


                  </div>

                  <div class="col-sm-6">

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="gender" required>
                          <option value="">Genre</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                        <small class="text-danger">champ obligatoire</small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'email de l' élève</b></label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                        <small class="text-danger">champ obligatoire</small>
                      </div>


                      <div class="form-group">
                        <label><b>Nv ou ancien</b></label>
                        <select class="form-control" name="address" required>
                          <option value="">Choisissez</option>
                          <option value="M">NOUVEAU</option>
                          <option value="F">ANCIEN</option>
                        </select>
                        <small class="text-danger">champ obligatoire</small>
                      </div>


              <div class="form-group">
                <label><b>Classe</b></label>
                <select class="form-control" name="program_id" required="">
                  <option>Classe</option>
                  @foreach ($programs as $program)
                  <option value="{{$program->id}}" >{{$program->fullname}} : {{$program->name}} </option>
                  @endforeach
                </select>
              </div>

                      <div class="form-group">
                        <label><b>Montant versé</b></label>
                        <input type="number" name="montant" placeholder="Montant" class="form-control">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-success" type="submit">
                            Créer le compte de l' élève
                          </button>
                      </div>
                  </div>

                </div>


                  </form>
<script type="text/javascript">
  $(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>

              </div>


        </div>

              @if (session('status1'))
              <hr>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif

              @if (session('status2'))
              <hr>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                      </div>
                  </div>
              @endif
            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">MONTANT</th>
                <th scope="col">ACTION</th>

              </tr>
            </thead>

            <tbody>
              @foreach ($newregstudents->sortBy('name') as $student)
              <tr>

                <td><b>{{$student->name}}</b> {{$student->surname}} <span style= "color:@if($student->gender=='F')#c22e6d @else  blue @endif">({{$student->gender}})</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?>
                <td>{{$student->dateofbirth}} - <b>({{$years}} ans)</b></td>

                <td>{{$student->tel}}</td>
                <td>{{$student->montant}}</td>
                <td>
                	<!-- GENJUTSU --> <form ></form> <!-- GENJUTSU -->

	                <a href="#" data-toggle="modal" data-target="#MD2{{$student->id}}" style="color: red;">Supprimer</a>
      <!-- Modal Delete student -->
      <div class="modal fade" id="MD2{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ URL::to('/manager/deleteNewStudent') }}" method="post" enctype="multipart/form-data">
        <!--DELETE FORM-->
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression d'un élève </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <div class="text-center">
              <p>SUPPRIMER CET ELEVE?</p>
              <h4 class="card-title text-center">
              {{$student->name}} {{$student->surname}}
              </h4>

              <input type="hidden" class="form-control" name="id" value="{{$student->id}}" hidden="">
            <button type="submit" class="btn btn-danger">
              Valider la suppression
            </button>
            </div>
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
            </div>
        </div>
      </div>
      <!--END DELETE FORM-->
      </form>
    </div>

            	</td>
              </tr>
              @endforeach
            </tbody>
          </table>






      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

@endsection
