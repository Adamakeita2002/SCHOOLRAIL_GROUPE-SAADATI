@extends ('layouts.master')


@section ('content')
  <?php use Carbon\Carbon;?>
  <?php $ressource="activvve" ;?>
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
<!--END CHECK BOX HANDLER -->

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Standard</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

      <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmsg.png" alt="Card image" style="width:260px; padding-top: 20px">
      <br>

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

      <div class="row">

        <div class="col-md-12">

            <form  action="/kuro/admin/CreateRessourceDocument" method="post" enctype="multipart/form-data">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <div class="row">
                <div class="col-sm-6">
                <label><b>SELECTIONNER LES CLASSES</b></label><br>
                <p class="text-center" style="color: #c22e6d"><b>1ère Année</b></p>
                  <div class="row">
                  @foreach ($classrooms1 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms1->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>2ème Année</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms2 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms2->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Licence</b></p>
                @endif
                  <div class="row">
                  @foreach ($classrooms3 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                 </div>
                @if($classrooms4->count() >= 1)
                <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master I</b></p>
                @endif
                <div class="row">
                  @foreach ($classrooms4 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($classrooms4->count() >= 1)
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master II</b></p>
                @endif
                <div class="row">
                  @foreach ($classrooms5 as $classroom)
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" required id="{{$classroom->id}}" value="{{$classroom->id}}"/>
                          <span class="check-mark"></span>{{$classroom->name}} {{$classroom->code}}
                      </label>
                    </div>
                  </div>
                  @endforeach
                  </div>
                </div>

                <div class="col-sm-6">

                <div class="form-group">
                  <label><b>Entrer le titre du message</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximums.</small>
                </div>


                  <div class="form-group">
                    <button class="btn btn-success" name="submit" type="submit">
                      Créer une ressource standard
                    </button>
                  </div>
                </div>

              </div><!--END ROW-->

                  </form>

            </div>
          <hr>

              </div>
          <hr>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


@endsection
