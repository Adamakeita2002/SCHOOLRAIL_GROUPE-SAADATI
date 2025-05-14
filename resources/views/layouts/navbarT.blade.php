        <nav class="navbar navbar-expand navbar-light bg-white">
          
          <button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="icon-menu"></i></button><!-- MENU BUTTON-->

          <?php $semesterPro= $academicyearP->semesters->where('state','process')->first();  ?>
          <div class="navbar-brand">{{$semesterPro->label}}  </div>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link btn btn-secondary text-white dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-bell"></i> Notification(s) 
            @if ($Newsltn->count() + $Messageltn->count() + $Quizltn->count() >= 1 ) 
              <span class="badge badge-pill badge-primary">{{$Newsltn->count() + $Messageltn->count() + $Quizltn->count() }}</span>
            @else 
              <span class="badge badge-pill badge-danger">{{$Newsltn->count() + $Messageltn->count() + $Quizltn->count() }}</span>   
            @endif
            </a>

            <div class="dropdown-menu dropdown-menu-right">


              @if($Newsltn->count() >= 1)
                <a href="/teacher/specnotif?q=NEWS" class="dropdown-item"><small class="text-secondary">Infos School</small><br>
                <div>
                  @if($Newsltn->count() == 1 )
                    {{$Newsltn->count()}} Nouvelle Actualité
                  @elseif ($Newsltn->count() > 1) 
                    {{$Newsltn->count()}} Nouvelles Actualités
                  @endif 
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if($Quizltn->count() >= 1)
                <a href="/teacher/specnotif?q=QUIZ" class="dropdown-item"><small class="text-secondary">Question</small><br>
                <div>
                  @if($Quizltn->count() == 1 )
                    {{$Quizltn->count()}} Nouvelle Question
                  @elseif ($Quizltn->count() > 1) 
                    {{$Quizltn->count()}} Nouvelles Questions
                  @endif 
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif
               
              @if($Messageltn->count() >= 1)
                <a href="/teacher/specnotif?q=MESSAGE" class="dropdown-item"><small class="text-secondary">Message</small><br>
                <div>
                  @if($Messageltn->count() == 1 )
                    {{$Messageltn->count()}} Nouveau Message
                  @elseif ($Messageltn->count() > 1) 
                    {{$Messageltn->count()}} Nouveaux Messages
                  @endif 
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif
                
                <a href="/teacher/notification" class="dropdown-item dropdown-link">Voir toutes les notifications</a>

              </div>

          </li>
        </ul>

        </nav>

