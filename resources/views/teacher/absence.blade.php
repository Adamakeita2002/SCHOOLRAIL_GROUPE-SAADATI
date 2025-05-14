@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>
  <?php $q=$_GET["q"] ;?>
<!-- CHECK BOX HANDLER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script type="text/javascript">
$(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>
<script type="text/javascript">
  $(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Veuillez Patienter')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
<!--END CHECK BOX HANDLER -->

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
            <li class="breadcrumb-item active" aria-current="page">Pointage Absence</li>
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

<hr>

@if (!empty($classroom->students))


            <form  action="/teacher/CreateAbsenceStudent" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value="{{$q}}" name="classroom_id">
<div class="row">
    
          <div class="col-sm-5">
              
                  <div class="form-group">
                    <label><b>Classe / Matière</b></label>
                    <select class="form-control" name="subject_id" required>
                      <option value="">Classe et Matière</option>
                      @foreach ($subjects as $subject)
                      <option  value="{{$subject->id }}">
                        {{$subject->classroom->name}} / {{$subject->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>

          </div>

          <div class="col-sm-6">

                <div class="form-group">
                  <label><b>Entrer la date</b></label>
                  <input type="date" name="absence_date" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

        </div>

</div>
                <!--  </form>    -->  

<hr>

        <div class="table-responsive">
          <div class="card-body">
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">POINTAGE ABSENCE</th>
                <th scope="col">INFORMATION(s)</th>


              </tr>
            </thead>
            <tbody>
              @foreach($classroom->students as $student)
              <tr> 
                <td>{{$student->name}} </td>
                <td>{{$student->surname}}</td>
                <td>
                  <div class="form-group options ">
                      <label class="checkbox checkbox-danger">
                          <input type="checkbox" name="student[]" required id="S{{$student->id}}" value="{{$student->id}}"/>
                          <span class="check-mark"></span>COCHEZ
                      </label>                                            
                  </div>
                </td>
                <td>{{$student->email}} <br> {{$student->tel}}</td>
              </tr>
             @endforeach 
            </tbody>
          </table>

    <hr>

                  <div class="form-group">
                   <p class="text-center"><button class="btn btn-success" name="submit" type="submit">
                     <b>Valider les absences</b> 
                    </button></p> 
                  </div>
    <hr>

          </div>

        </div>

@else
<h3 class="text-danger text-center"><b>AUCUN ELEVE DANS CETTE CLASSE</b></h3>
@endif
</form> 
      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection


