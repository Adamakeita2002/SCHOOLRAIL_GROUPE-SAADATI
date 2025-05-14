        <div class="app-sidebar" style="background-color: #c22e6d">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/assets/img/img_avatar1.png" class="user-photo"><p class="username">{{$manager->name}} {{$manager->surname}}<br><small>{{$manager->email}}</small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

            <li class="sidebar-nav-btn @if (isset($account)) {{$account}} @endif"><a href="/manager" class="btn btn-block btn-outline-light @if (isset($account)) {{$account}} @endif"> Accueil</a></li>

            <li class="sidebar-nav-group @if (isset($profile)) {{$profile}} @endif">
              <a href="#content" class="sidebar-nav-link  @if (isset($profile)) {{$profile}} @endif" data-toggle="collapse">
                <img src="/img/small/xmanager.png" width="25" height="25" alt="..."><span class="pl-1"> Profil</span></a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/manager/profile" class="sidebar-nav-link">Voir votre profil</a></li>
                <li><a href="/manager/modiFprofile" class="sidebar-nav-link">Modifier votre profil</a></li>
              </ul>
           </li>
@if ($manager->program==1)
          <li class="sidebar-nav-group @if (isset($program)) {{$program}} @endif"><a href="#program" class="sidebar-nav-link @if (isset($program)) {{$program}} @endif" data-toggle="collapse">
            <img src="/img/small/xfiliere.png" width="25" height="25" alt="..."><span class="pl-1"> Programme</span></a>
            <ul id="program" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/program" class="sidebar-nav-link">Créer un Programme </a></li>
              <li><a href="/manager/editProgram" class="sidebar-nav-link">Editer un Programme </a></li>
            </ul>
          </li>
@endif

@if($manager->classroom==1)
          <li class="sidebar-nav-group @if (isset($classroom)) {{$classroom}} @endif"><a href="#classroom" class="sidebar-nav-link @if (isset($classroom)) {{$classroom}} @endif" data-toggle="collapse">
            <img src="/img/small/xclassroom.png" width="25" height="25" alt="..."><span class="pl-1"> Classe</span></a>
            <ul id="classroom" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/classroom" class="sidebar-nav-link">Créer une classe</a></li>
              <li><a href="/manager/classroom/timetable" class="sidebar-nav-link">Emploi du temps</a></li>
              <li><a href="/manager/findClassroom" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/manager/editClassroom" class="sidebar-nav-link">Editer une classe</a></li>
            </ul>
          </li>
@endif



@if($manager->teacher==1)
          <li class="sidebar-nav-group @if (isset($teacher)) {{$teacher}} @endif"><a href="#teacher" class="sidebar-nav-link @if (isset($teacher)) {{$teacher}} @endif" data-toggle="collapse">
            <img src="/img/small/xprofesseur.png" width="25" height="25" alt="..."><span class="pl-1">
            Professeur</span></a>
            <ul id="teacher" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/teacher" class="sidebar-nav-link">Ajouter un professeur</a></li>
              <li><a href="/manager/teacher/many" class="sidebar-nav-link">Ajouter (x) professeurs</a></li>
              <li><a href="/manager/findTeacher" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/manager/editTeacher" class="sidebar-nav-link">Liste professeur</a></li>
            </ul>
          </li>
@endif

@if($manager->subject==1)
          <li class="sidebar-nav-group @if (isset($subject)) {{$subject}} @endif"><a href="#subject" class="sidebar-nav-link @if (isset($subject)) {{$subject}} @endif" data-toggle="collapse"><img src="/img/small/xmatiere.png" width="25" height="25" alt="..."><span class="pl-1"> Matière</span></a>
            <ul id="subject" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/subject" class="sidebar-nav-link">Ajouter une matière</a></li>
              <li><a href="/manager/subject/many" class="sidebar-nav-link">Ajouter (x) matières</a></li>
              <li><a href="/manager/affectSubject" class="sidebar-nav-link">Affectation</a></li>
              <li><a href="/manager/findSubject" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/manager/editSubject" class="sidebar-nav-link">Editer une matière</a></li>
            </ul>
          </li>
@endif

@if($manager->student==1)
          <li class="sidebar-nav-group @if (isset($student)) {{$student}} @endif"><a href="#student" class="sidebar-nav-link @if (isset($student)) {{$student}} @endif" data-toggle="collapse">
            <img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> Elève</span></a>
            <ul id="student" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/NewRegStudent" class="sidebar-nav-link">Pré-inscription</a></li>
              <li><a href="/manager/student" class="sidebar-nav-link">Ajouter un élève</a></li>
              <li><a href="/manager/student/many" class="sidebar-nav-link">Ajouter (x) élèves</a></li>
              <li><a href="/manager/affectStudent" class="sidebar-nav-link">Affectation</a></li>
              <li><a href="/manager/findStudent" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
            </ul>
          </li>
@endif

@if($manager->tutor==1)
          <li class="sidebar-nav-group @if (isset($parent)) {{$parent}} @endif"><a href="#tutor" class="sidebar-nav-link @if (isset($parent)) {{$parent}} @endif" data-toggle="collapse">
            <img src="/img/small/xparent.png" width="25" height="25" alt="..."><span class="pl-1"> Parent</span></a>
            <ul id="tutor" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/tutor" class="sidebar-nav-link">Ajouter un tuteur</a></li>
              <li><a href="/manager/affectTutor" class="sidebar-nav-link">Affectation</a></li>
              <li><a href="/manager/findTutor" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
            </ul>
          </li>
@endif


@if($manager->ressource==1)
        <li class="sidebar-nav-group @if (isset($materiel)) {{$materiel}} @endif"><a href="#ressource" class="sidebar-nav-link @if (isset($materiel)) {{$materiel}} @endif" data-toggle="collapse">
            <img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> Ressources</span></a>
          <ul id="ressource" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/findRessource" class="sidebar-nav-link">Recherche  <i class="icon-magnifier"></i></a></li>
              <li><a href="/manager/ressource" class="sidebar-nav-link">Créer une ressource</a></li>
              <li><a href="/manager/Rstandard" class="sidebar-nav-link">Ressources Standards</a></li>
              <li><a href="/manager/Rteacher" class="sidebar-nav-link">Ressources des Profs</a></li>
            </ul>
          </li>
@endif


@if($manager->school==1)
          <li class="sidebar-nav-group @if (isset($school)) {{$school}} @endif"><a href="#school" class="sidebar-nav-link @if (isset($school)) {{$school}} @endif" data-toggle="collapse">
            <img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Outils Scolaires</span></a>
          <ul id="school" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/schoolNews" class="sidebar-nav-link">Créer une actualité</a></li>
         <!-- <li><a href="/kuro/admin/schoolBde" class="sidebar-nav-link">Activités BDE</a></li> -->
              <li><a href="/manager/findMark" class="sidebar-nav-link">Notes</a></li>
              <li><a href="/manager/findCalendar" class="sidebar-nav-link">Calendrier</a></li>
              <li><a href="/manager/findTimetable" class="sidebar-nav-link">Emploi du temps</a></li>
              <li><a href="/manager/adTeam" class="sidebar-nav-link">Administration</a></li>
            </ul>
          </li>
@endif

            <!--<li class=" sidebar-ulk @if (isset($message)) {{$message}} @endif"><a href="/manager/message" class="sidebar-nav-link @if (isset($message)) {{$message}} @endif" ><img src="/img/small/xcommunication.png" width="25" height="25" alt="..."><span class="pl-1" > Envoyer des messages</span></a></li>-->

@if($manager->message==1)
          <li class="sidebar-nav-group @if (isset($message)) {{$message}} @endif"><a href="#message" class="sidebar-nav-link @if (isset($message)) {{$message}} @endif" data-toggle="collapse">
            <img src="/img/small/xcommunication.png" width="25" height="25" alt="..."><span class="pl-1"> Messages</span></a>
            <ul id="message" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/message/student" class="sidebar-nav-link">Aux élèves</a></li>
              <li><a href="/manager/message/teacher" class="sidebar-nav-link">Aux professeurs</a></li>
            <!--  <li><a href="/manager/message/tutor" class="sidebar-nav-link">Aux parents</a></li>-->
            </ul>
          </li>
@endif

@if($manager->comptabilite==1)
          <li class="sidebar-nav-group @if (isset($comptabilite)) {{$comptabilite}} @endif"><a href="#comptabilite" class="sidebar-nav-link @if (isset($comptabilite)) {{$comptabilite}} @endif" data-toggle="collapse">
            <i class="fa fa-archive"></i> <span class="pl-1"> Comptabilité</span></a>
            <ul id="comptabilite" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/versement" class="sidebar-nav-link">Versements</a></li>
@if($manager->id==24)
              <li><a href="/manager/recette" class="sidebar-nav-link">Recettes</a></li>
@endif
              <li><a href="/manager/depense" class="sidebar-nav-link">Depenses</a></li>
              <li><a href="/manager/operation" class="sidebar-nav-link">Opérations/Jour</a></li>
            </ul>
          </li>
@endif

@if($manager->stopMark==1)
          <li class=" sidebar-ulk @if (isset($parametre)) {{$parametre}} @endif"><a href="/manager/stop/mark" class="sidebar-nav-link @if (isset($parametre)) {{$parametre}} @endif" ><i class="icon-settings"></i> <span class="pl-1"> Arrêts des notes</span></a></li>
@endif

@if($manager->bulletin==1)
          <li class="sidebar-nav-group @if (isset($transcript)) {{$transcript}} @endif"><a href="#transcript" class="sidebar-nav-link @if (isset($transcript)) {{$transcript}} @endif" data-toggle="collapse">
            <i class="fa fa-archive"></i> <span class="pl-1"> Bulletins et Archives</span></a>
            <ul id="transcript" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/manager/transcript" class="sidebar-nav-link">Bulletins</a></li>
              <li><a href="/manager/archive" class="sidebar-nav-link">Archives</a></li>
            </ul>
          </li>
@endif



         </ul>

         <div class="sidebar-footer" style="background-color: #990a47";>
         <!-- <a href="/manager/settings" data-toggle="tooltip" title="Paramètres"><i class="icon-settings"></i> </a>-->
          <a href="/manager/quest" data-toggle="tooltip" title="Requêtes"><i class="icon-envelope-letter"></i> </a>
          <a href="/manager/logout" data-toggle="tooltip" title="Se déconnecter"><i class="icon-logout"></i></a>
        </div>

      </div>
