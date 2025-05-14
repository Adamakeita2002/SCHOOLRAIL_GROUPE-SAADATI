        <div class="app-sidebar">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/assets/img/john-doe.png" class="user-photo"><p class="username">Student Name<br><small>john.doe@email.com</small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

            <li class="sidebar-nav-btn @if (isset($account)) {{$account}} @endif"><a href="/student" class="btn btn-block btn-outline-light @if (isset($account)) {{$account}} @endif"> Accueil</a></li>

            <li class="sidebar-nav-group @if (isset($profile)) {{$profile}} @endif">
              <a href="#content" class="sidebar-nav-link  @if (isset($profile)) {{$profile}} @endif" data-toggle="collapse"><i class="icon-user"></i>Profile</a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/profile" class="sidebar-nav-link">Voir votre profile</a></li>
                <li><a href="/student/edit/profile" class="sidebar-nav-link">Modifier votre profile</a></li>
              </ul>
           </li>

            <li class="sidebar-nav-group @if (isset($school)) {{$school}} @endif"><a href="#forms" class="sidebar-nav-link @if (isset($school)) {{$school}} @endif" data-toggle="collapse"><i class="icon-info"></i>Infos School</a>
              <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/schoolNews" class="sidebar-nav-link">Actualités</a></li>
                <li><a href="/student/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>
                <li><a href="/student/adTeam" class="sidebar-nav-link">Administration</a></li>
              </ul>
            </li>

            <li class="sidebar-nav-group @if (isset($materiel)) {{$materiel}} @endif"><a href="#input-controls" class="sidebar-nav-link @if (isset($materiel)) {{$materiel}} @endif" data-toggle="collapse"><i class="icon-notebook"></i>E-learning</a>
              <ul id="input-controls" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/standard" class="sidebar-nav-link">Ressources Standards</a></li>
                <li><a href="/student/materiel" class="sidebar-nav-link">Ressources Profs</a></li>
              </ul>
            </li>

            <li class=" sidebar-ulk @if (isset($note)) {{$note}} @endif"><a href="/student/mark" class="sidebar-nav-link @if (isset($note)) {{$note}} @endif" ><i class="icon-chart"></i>Note</a></li>


            <li class=" sidebar-ulk @if (isset($test)) {{$test}} @endif"><a href="/student/homework" class="sidebar-nav-link @if (isset($test)) {{$test}} @endif" ><i class="icon-note"></i>Test (Exercice)</a></li>



            <li class="sidebar-nav-group @if (isset($forum)) {{$forum}} @endif"><a href="#layout" class="sidebar-nav-link @if (isset($forum)) {{$forum}} @endif" data-toggle="collapse"><i class="icon-layers"></i>Forums</a>
              <ul id="layout" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/setForum" class="sidebar-nav-link">Engager un sujet</a></li>
                <li><a href="/student/forum" class="sidebar-nav-link">Discussions</a></li>
              </ul>
           </li>


         </ul>

         <div class="sidebar-footer">
          <a href="./pages/content/chat.html" data-toggle="tooltip" title="Support"><i class="icon-bubbles"></i> </a>
          <a href="./pages/content/settings.html" data-toggle="tooltip" title="Settings"><i class="icon-settings"></i> </a>
          <a href="./pages/content/signin.html" data-toggle="tooltip" title="Logout"><i class="icon-logout"></i></a>
        </div>

      </div>
