        <div class="app-sidebar" style="background-color: #26bc2c">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/img/large/xprofesseur.jpg" class="user-photo"><p class="username">{{$teacher->name}} {{$teacher->surname}}<br><small>{{$teacher->email}}</small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

          <!--
            <li class="sidebar-nav-btn @if (isset($teacher)) {{$teacher}} @endif"><a href="/teacher" class="btn btn-block btn-outline-light @if (isset($teacher)) {{$teacher}} @endif"> Accueil</a>
            </li>
          -->

            <li class="sidebar-nav-group @if (isset($profile)) {{$profile}} @endif">
              <a href="#contentStu" class="sidebar-nav-link  @if (isset($profile)) {{$profile}} @endif" data-toggle="collapse"><img src="/img/small/xmanager.png" width="25" height="25" alt="..."><span class="pl-1"> Profil</span></a>
              <ul id="contentStu" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/teacher" class="sidebar-nav-link">Voir votre profil</a></li>
                <li><a href="/teacher/profile" class="sidebar-nav-link">Modifier votre profil</a></li>
              </ul>
           </li>


            <li class="sidebar-nav-group @if (isset($student)) {{$student}} @endif">
              <a href="#content" class="sidebar-nav-link  @if (isset($student)) {{$student}} @endif" data-toggle="collapse"><img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> Elève</span></a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/teacher/AbsenceStudentClas" class="sidebar-nav-link">Les absences</a></li>
                <li><a href="/teacher/ListeStudent" class="sidebar-nav-link">Liste des éleves</a></li>
              </ul>
           </li>


          <li class="sidebar-nav-group @if (isset($timetable)) {{$timetable}} @endif"><a href="#Rprog" class="sidebar-nav-link @if (isset($timetable)) {{$timetable}} @endif" data-toggle="collapse"><img src="/img/small/xemploi.png" width="25" height="25" alt="..."><span class="pl-1"> Programmation </span></a><ul id="Rprog" class="collapse" data-parent="#sidebar-nav">
              <!--<li><a href="/teacher/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
              <li><a href="/teacher/cahier" class="sidebar-nav-link">Cahier de texte</a></li>
              <li><a href="/teacher/findTimetable" class="sidebar-nav-link">Emploi du temps</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($ressource)) {{$ressource}} @endif"><a href="#Rforms" class="sidebar-nav-link @if (isset($ressource)) {{$ressource}} @endif" data-toggle="collapse"><img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> Ressources</span></a><ul id="Rforms" class="collapse" data-parent="#sidebar-nav">
              <!--<li><a href="/teacher/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
              <li><a href="/teacher/Sressource" class="sidebar-nav-link">Envoyer par élève</a></li>
              <li><a href="/teacher/ressource" class="sidebar-nav-link">Envoyer par classe</a></li>
            </ul>
          </li>


          <li class="sidebar-nav-group @if (isset($school)) {{$school}} @endif"><a href="#forms" class="sidebar-nav-link @if (isset($school)) {{$school}} @endif" data-toggle="collapse"><img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Infos School</span></a><ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/teacher/schoolNews" class="sidebar-nav-link">Actualités</a></li>
              <!--<li><a href="/teacher/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
              <li><a href="/teacher/adTeam" class="sidebar-nav-link">Administration</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($homework)) {{$homework}} @endif"><a href="#tests" class="sidebar-nav-link @if (isset($homework)) {{$homework}} @endif" data-toggle="collapse"><img src="/img/small/xtest.png" width="25" height="25" alt="..."><span class="pl-1"> Test</span></a><ul id="tests" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/teacher/homework" class="sidebar-nav-link">Créer un test</a></li>
              <li><a href="/teacher/Ahomework" class="sidebar-nav-link">Voir les réponses</a></li>
            </ul>
          </li>


            <li class=" sidebar-ulk @if (isset($mark)) {{$mark}} @endif"><a href="/teacher/mark" class="sidebar-nav-link @if (isset($mark)) {{$mark}} @endif" ><img src="/img/small/xnote.png" width="25" height="25" alt="..."><span class="pl-1"> Note</span></a></li>

<!--
            <li class=" sidebar-ulk @if (isset($ressource)) {{$ressource}} @endif"><a href="/teacher/ressource" class="sidebar-nav-link @if (isset($ressource)) {{$ressource}} @endif" ><img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> Ressources</span></a></li>-->


            <li class=" sidebar-ulk @if (isset($quiz)) {{$quiz}} @endif"><a href="/teacher/quiz" class="sidebar-nav-link @if (isset($quiz)) {{$quiz}} @endif" ><img src="/img/small/xqr.png" width="25" height="25" alt="..."><span class="pl-1"> Qs/Rs </span></a></li>

            <li class=" sidebar-ulk @if (isset($calendar)) {{$calendar}} @endif"><a href="/teacher/calendar" class="sidebar-nav-link @if (isset($calendar)) {{$calendar}} @endif" ><img src="/img/small/xcalendrier.png" width="25" height="25" alt="..."><span class="pl-1"> Calendrier</span></a></li>



            <li class=" sidebar-ulk @if (isset($message)) {{$message}} @endif"><a href="/teacher/message" class="sidebar-nav-link @if (isset($message)) {{$message}} @endif" ><img src="/img/small/xcommunication.png" width="25" height="25" alt="..."><span class="pl-1"> Messages</span></a></li>

         </ul>

         <div class="sidebar-footer" style="background-color: #1f9924;">
          <!--
          <a href="#" data-toggle="tooltip" title="Support"><i class="icon-bubbles"></i> </a>
          <a href="#" data-toggle="tooltip" title="Settings"><i class="icon-settings"></i> </a>
          -->
          <a href="/teacher/logout" data-toggle="tooltip" title="Déconnexion"><!--<span class="text-white">Déconnexion</span>-->
            <i class="icon-logout"></i></a>
        </div>

      </div>
