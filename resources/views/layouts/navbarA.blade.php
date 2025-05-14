        <nav class="navbar navbar-expand navbar-light bg-white">
          
          <button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="icon-menu"></i></button><!-- MENU BUTTON-->
          <?php 
          if ($academicyearP) {
          	$semesterPro= $academicyearP->semesters->where('state','process')->first();  
          }
          ?>
          <div class="navbar-brand">@if(isset($semesterPro)) {{$semesterPro->label}} @else Bienvenue! @endif  </div>

        </nav>

