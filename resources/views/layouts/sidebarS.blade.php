        <div class="app-sidebar">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header">
              @if($student->gender == 'M')
              <img src="/img/large/xmetudiant.jpg" class="user-photo">
              @else
              <img src="/img/large/xfetudiant.jpg" class="user-photo">
              @endif
              <p class="username">{{$student->name}} {{$student->surname}}<br><small>{{$student->email}}</small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

            <li class="sidebar-nav-btn @if (isset($account)) {{$account}} @endif"><a href="/student" class="btn btn-block btn-outline-light @if (isset($account)) {{$account}} @endif"> Accueil</a></li>

            <li class="sidebar-nav-group @if (isset($profile)) {{$profile}} @endif">
              <a href="#content" class="sidebar-nav-link  @if (isset($profile)) {{$profile}} @endif" data-toggle="collapse"><img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> Profil </span></a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/profile" class="sidebar-nav-link">Voir votre profil</a></li>
                <li><a href="/student/EditProfile" class="sidebar-nav-link">Modifier votre profil</a></li>
              </ul>
           </li>

            <li class="sidebar-nav-group @if (isset($school)) {{$school}} @endif"><a href="#forms" class="sidebar-nav-link @if (isset($school)) {{$school}} @endif" data-toggle="collapse"><img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Infos School</span></a>
              <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/schoolNews" class="sidebar-nav-link">Actualités</a></li>
                <!--<li><a href="/student/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
                <li><a href="/student/adTeam" class="sidebar-nav-link">Administration</a></li>
              </ul>
            </li>

            <li class="sidebar-nav-group @if (isset($materiel)) {{$materiel}} @endif"><a href="#input-controls" class="sidebar-nav-link @if (isset($materiel)) {{$materiel}} @endif" data-toggle="collapse">
              <img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> E-learning</span></a>
              <ul id="input-controls" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/standard" class="sidebar-nav-link">Ressources Standards</a></li>
                <li><a href="/student/materiel" class="sidebar-nav-link">Ressources Profs</a></li>
                <li><a href="/student/tactileo" class="sidebar-nav-link">Tactileo</a></li>
              </ul>
            </li>
<!--
            <li class="sidebar-nav-group @if (isset($quiz)) {{$quiz}} @endif"><a href="#layoutQ" class="sidebar-nav-link @if (isset($quiz)) {{$quiz}} @endif" data-toggle="collapse"><img src="/img/small/xqr.png" width="25" height="25" alt="..."><span class="pl-1"> Qs/Rs</span></a>
              <ul id="layoutQ" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/setQuiz" class="sidebar-nav-link">Poser une question</a></li>
                <li><a href="/student/quiz" class="sidebar-nav-link">Qs/Rs</a></li>
              </ul>
           </li>
-->
<!--
            <li class=" sidebar-ulk @if (isset($note)) {{$note}} @endif"><a href="/student/mark" class="sidebar-nav-link @if (isset($note)) {{$note}} @endif" ><img src="/img/small/xnote.png" width="25" height="25" alt="..."><span class="pl-1"> Note </span></a></li>
-->

            <li class=" sidebar-ulk @if (isset($paiement)) {{$paiement}} @endif"><a href="/student/mark" class="sidebar-nav-link @if (isset($paiement)) {{$paiement}} @endif" ><i class="fa fa-money"></i><span class="pl-1"> Paiements </span></a></li>


            <li class=" sidebar-ulk @if (isset($test)) {{$test}} @endif"><a href="/student/homework" class="sidebar-nav-link @if (isset($test)) {{$test}} @endif" ><img src="/img/small/xtest.png" width="25" height="25" alt="..."><span class="pl-1">Test (Exercice)</span></a></li>

            <li class=" sidebar-ulk @if (isset($calendar)) {{$calendar}} @endif"><a href="/student/calendar" class="sidebar-nav-link @if (isset($calendar)) {{$calendar}} @endif" ><img src="/img/small/xcalendrier.png" width="25" height="25" alt="..."><span class="pl-1"> Calendrier</span></a></li>

<!--

            <li class="sidebar-nav-group @if (isset($forum)) {{$forum}} @endif"><a href="#layout" class="sidebar-nav-link @if (isset($forum)) {{$forum}} @endif" data-toggle="collapse"><img src="/img/small/xforum.jpg" width="18" height="18" alt="..."><span class="pl-1"> Forums</span></a>
              <ul id="layout" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/setForum" class="sidebar-nav-link">Engager un sujet</a></li>
                <li><a href="/student/forum" class="sidebar-nav-link">Discussions</a></li>
              </ul>
           </li>
-->
            <li class=" sidebar-ulk @if (isset($timetable)) {{$timetable}} @endif"><a href="/student/findTimetable" class="sidebar-nav-link @if (isset($timetable)) {{$timetable}} @endif" ><img src="/img/small/xemploi.png" width="25" height="25" alt="..."><span class="pl-1"> Emploi du temps</span></a></li>

         </ul>

         <div class="sidebar-footer">
          <a href="/student/message" data-toggle="tooltip" title="Message"><i class="icon-bubbles"></i> </a>
          <a href="/student/quest" data-toggle="tooltip" title="Requêtes"><i class="icon-envelope-letter"></i> </a>
          <a href="/student/logout" data-toggle="tooltip" title="Se déconnecter"><i class="icon-logout"></i></a>
        </div>

      </div>
