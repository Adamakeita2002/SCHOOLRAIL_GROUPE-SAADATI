        <div class="app-sidebar" style="background-color: black;">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/assets/img/img_avatar1.png" class="user-photo"><p class="username">{{$admin->name}} {{$admin->surname}}<br><small>{{$admin->email}}</small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

            <li class="sidebar-nav-btn @if (isset($account)) {{$account}} @endif"><a href="/kuro/admin" class="btn btn-block btn-outline-light @if (isset($account)) {{$account}} @endif"> Accueil</a></li>

            <li class="sidebar-nav-group @if (isset($profile)) {{$profile}} @endif">
              <a href="#content" class="sidebar-nav-link  @if (isset($profile)) {{$profile}} @endif" data-toggle="collapse">
                <img src="/assets/img/img_avatar1.png" width="25" height="25" alt="..."><span class="pl-1"> Profile</span></a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/kuro/admin/profile" class="sidebar-nav-link">Voir votre profile</a></li>
                <li><a href="/kuro/admin/modiFprofile" class="sidebar-nav-link">Modifier votre profile</a></li>
              </ul>
           </li>

            <li class=" sidebar-ulk @if (isset($manager)) {{$manager}} @endif"><a href="/kuro/admin/manager" class="sidebar-nav-link @if (isset($manager)) {{$manager}} @endif" ><img src="/img/small/xmanager.png" width="25" height="25" alt="..."><span class="pl-1"> Manager </span></a></li>

<?php
use App\Academicyear;
$academicyear=Academicyear::where('state','process')->first();
if ($academicyear) {
$Csemester= $academicyear->semesters()->count();
}else{
$Csemester=0;
}

?>
@if ($Csemester !== 0)

          <li class="sidebar-nav-group @if (isset($program)) {{$program}} @endif"><a href="#program" class="sidebar-nav-link @if (isset($program)) {{$program}} @endif" data-toggle="collapse">
            <img src="/img/small/xfiliere.png" width="25" height="25" alt="..."><span class="pl-1"> Filière</span></a>
            <ul id="program" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/program" class="sidebar-nav-link">Créer une Filière </a></li>
              <li><a href="/kuro/admin/editProgram" class="sidebar-nav-link">Editer une Filière </a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($classroom)) {{$classroom}} @endif"><a href="#classroom" class="sidebar-nav-link @if (isset($classroom)) {{$classroom}} @endif" data-toggle="collapse">
            <img src="/img/small/xclassroom.png" width="25" height="25" alt="..."><span class="pl-1"> Classe</span></a>
            <ul id="classroom" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/classroom" class="sidebar-nav-link">Créer une classe</a></li>
              <li><a href="/kuro/admin/findClassroom" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/kuro/admin/editClassroom" class="sidebar-nav-link">Editer une classe</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($teacher)) {{$teacher}} @endif"><a href="#teacher" class="sidebar-nav-link @if (isset($teacher)) {{$teacher}} @endif" data-toggle="collapse">
            <img src="/img/small/xprofesseur.png" width="25" height="25" alt="..."><span class="pl-1">
            Professeur</span></a>
            <ul id="teacher" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/teacher" class="sidebar-nav-link">Ajouter un professeur</a></li>
              <li><a href="/kuro/admin/teacher/many" class="sidebar-nav-link">Ajouter (x) professeurs</a></li>
              <li><a href="/kuro/admin/findTeacher" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/kuro/admin/editTeacher" class="sidebar-nav-link">Editer un professeur</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($subject)) {{$subject}} @endif"><a href="#subject" class="sidebar-nav-link @if (isset($subject)) {{$subject}} @endif" data-toggle="collapse"><img src="/img/small/xmatiere.png" width="25" height="25" alt="..."><span class="pl-1"> Matière</span></a>
            <ul id="subject" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/subject" class="sidebar-nav-link">Ajouter une matière</a></li>
              <li><a href="/kuro/admin/subject/many" class="sidebar-nav-link">Ajouter (x) matières</a></li>
              <li><a href="/kuro/admin/affectSubject" class="sidebar-nav-link">Affectation</a></li>
              <li><a href="/kuro/admin/findSubject" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/kuro/admin/editSubject" class="sidebar-nav-link">Editer une matière</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($student)) {{$student}} @endif"><a href="#student" class="sidebar-nav-link @if (isset($student)) {{$student}} @endif" data-toggle="collapse">
            <img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> Etudiant</span></a>
            <ul id="student" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/student" class="sidebar-nav-link">Ajouter un étudiant</a></li>
              <li><a href="/kuro/admin/student/many" class="sidebar-nav-link">Ajouter (x) étudiants</a></li>
              <li><a href="/kuro/admin/affectStudent" class="sidebar-nav-link">Affectation</a></li>
              <li><a href="/kuro/admin/findStudent" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group @if (isset($parent)) {{$parent}} @endif"><a href="#tutor" class="sidebar-nav-link @if (isset($parent)) {{$parent}} @endif" data-toggle="collapse">
            <img src="/img/small/xparent.png" width="25" height="25" alt="..."><span class="pl-1"> Parent</span></a>
            <ul id="tutor" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/tutor" class="sidebar-nav-link">Ajouter un tuteur</a></li>
              <li><a href="/kuro/admin/affectTutor" class="sidebar-nav-link">Affectation</a></li>
              <li><a href="/kuro/admin/findTutor" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
            </ul>
          </li>

        <li class="sidebar-nav-group @if (isset($materiel)) {{$materiel}} @endif"><a href="#ressource" class="sidebar-nav-link @if (isset($materiel)) {{$materiel}} @endif" data-toggle="collapse">
            <img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> Ressources</span></a>
          <ul id="ressource" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/findRessource" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/kuro/admin/ressource" class="sidebar-nav-link">Créer une ressource</a></li>
              <li><a href="/kuro/admin/Rstandard" class="sidebar-nav-link">Ressources Standards</a></li>
              <li><a href="/kuro/admin/Rteacher" class="sidebar-nav-link">Ressources des Profs</a></li>
            </ul>
          </li>

          <!--  <li class=" sidebar-ulk @if (isset($mark)) {{$mark}} @endif"><a href="/kuro/admin/findMark" class="sidebar-nav-link @if (isset($mark)) {{$mark}} @endif" ><img src="/img/small/xnote.png" width="25" height="25" alt="..."><span class="pl-1"> Notes</span></a></li> -->


          <li class="sidebar-nav-group @if (isset($school)) {{$school}} @endif"><a href="#school" class="sidebar-nav-link @if (isset($school)) {{$school}} @endif" data-toggle="collapse">
            <img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Outils Scolaires</span></a>
          <ul id="school" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/schoolNews" class="sidebar-nav-link">Créer une actualité</a></li>
         <!-- <li><a href="/kuro/admin/schoolBde" class="sidebar-nav-link">Activités BDE</a></li> -->
              <li><a href="/kuro/admin/findMark" class="sidebar-nav-link">Notes</a></li>
              <li><a href="/kuro/admin/findCalendar" class="sidebar-nav-link">Calendrier</a></li>
              <li><a href="/kuro/admin/findTimetable" class="sidebar-nav-link">Emploi du temps</a></li>
              <li><a href="/kuro/admin/adTeam" class="sidebar-nav-link">Administration</a></li>
            </ul>
          </li>

         <!-- <li class=" sidebar-ulk @if (isset($timetable)) {{$timetable}} @endif"><a href="/kuro/admin/findTimetable" class="sidebar-nav-link @if (isset($timetable)) {{$timetable}} @endif" ><img src="/img/small/xemploi.png" width="25" height="25" alt="..."> <span class="pl-1"> Emploi du temps</span></a></li> -->


          <!--  <li class=" sidebar-ulk @if (isset($calendar)) {{$calendar}} @endif"><a href="/kuro/admin/findCalendar" class="sidebar-nav-link @if (isset($calendar)) {{$calendar}} @endif" ><img src="/img/small/xcalendrier.png" width="25" height="25" alt="..."><span class="pl-1"> Calendrier</span></a></li> -->

            <!--<li class=" sidebar-ulk @if (isset($message)) {{$message}} @endif"><a href="/kuro/admin/message" class="sidebar-nav-link @if (isset($message)) {{$message}} @endif" ><img src="/img/small/xcommunication.png" width="25" height="25" alt="..."><span class="pl-1" > Envoyer des messages</span></a></li>-->

          <li class="sidebar-nav-group @if (isset($message)) {{$message}} @endif"><a href="#message" class="sidebar-nav-link @if (isset($message)) {{$message}} @endif" data-toggle="collapse">
            <img src="/img/small/xcommunication.png" width="25" height="25" alt="..."><span class="pl-1"> Messages</span></a>
            <ul id="message" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/message/student" class="sidebar-nav-link">Aux étudiants</a></li>
              <li><a href="/kuro/admin/message/teacher" class="sidebar-nav-link">Aux professeurs</a></li>
            <!--  <li><a href="/kuro/admin/message/tutor" class="sidebar-nav-link">Aux parents</a></li>-->
            </ul>
          </li>


          <li class="sidebar-nav-group @if (isset($transcript)) {{$transcript}} @endif"><a href="#transcript" class="sidebar-nav-link @if (isset($transcript)) {{$transcript}} @endif" data-toggle="collapse">
            <i class="fa fa-archive"></i> <span class="pl-1"> Bulletins et Archives</span></a>
            <ul id="transcript" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/kuro/admin/transcript" class="sidebar-nav-link">Bulletins</a></li>
              <li><a href="/kuro/admin/archive" class="sidebar-nav-link">Archives</a></li>
            </ul>
          </li>
@endif
          <li class="sidebar-nav-group @if (isset($parametre)) {{$parametre}} @endif"><a href="#parametre" class="sidebar-nav-link @if (isset($parametre)) {{$parametre}} @endif" data-toggle="collapse">
            <i class="icon-settings"></i> <span class="pl-1"> Paramètres</span></a>
            <ul id="parametre" class="collapse" data-parent="#sidebar-nav">
              @if ($Csemester !== 0)
              <li><a href="/kuro/admin/stop/mark" class="sidebar-nav-link">Arrêt des notes</a></li>
              <li><a href="/kuro/admin/school/semester" class="sidebar-nav-link">Semestre</a></li>
              @endif
              <li><a href="/kuro/admin/school/year" class="sidebar-nav-link">Année scolaire</a></li>
            </ul>
          </li>

         </ul>

         <div class="sidebar-footer" style="background-color: #fff";>
         <!-- <a href="/kuro/admin/settings" data-toggle="tooltip" title="Paramètres"><i class="icon-settings"></i> </a>-->
          <a href="/kuro/admin/quest" data-toggle="tooltip" title="Requêtes"><i class="icon-envelope-letter" style="color:black;"></i> </a>
          <a href="/kuro/admin/logout" data-toggle="tooltip" title="Se déconnecter"><i class="icon-logout" style="color:black;"></i></a>
        </div>

      </div>
