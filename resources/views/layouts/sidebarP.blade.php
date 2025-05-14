        <div class="app-sidebar" style="background-color: #790fb1f2">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/img/large/xparent.jpg" class="user-photo"><p class="username">{{$tutor->name}} {{$tutor->surname}}<br><small>{{$tutor->email}}</small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">


          <li class="sidebar-nav-group @if (isset($school)) {{$school}} @endif"><a href="#forms" class="sidebar-nav-link @if (isset($school)) {{$school}} @endif" data-toggle="collapse"><img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Infos School</span></a><ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/tutor" class="sidebar-nav-link">Actualités</a></li>
              <li><a href="/tutor/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>
              <li><a href="/tutor/adTeam" class="sidebar-nav-link">Administration</a></li>
            </ul>
          </li>

        @foreach ($tutor->students as $student)
          <li class="sidebar-nav-group @if (isset($child) AND $idS==$student->id) {{$child}} @endif"><a href="#s{{$student->id}}" class="sidebar-nav-link @if (isset($child) AND $idS==$student->id) {{$child}} @endif" data-toggle="collapse"><img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> {{$student->name}} {{$student->surname}}</span><br><p class="text-center"><b>{{$student->classroom->name}} {{$student->classroom->code}}</b></p></a><ul id="s{{$student->id}}" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/tutor/child/{{$student->id}}" class="sidebar-nav-link">Profile</a></li>
              <li><a href="/tutor/child/mark/{{$student->id}}" class="sidebar-nav-link">Note</a></li>
              <li><a href="/tutor/child/timetable/{{$student->id}}" class="sidebar-nav-link">Emploi du temps</a></li>
            </ul>
          </li>
        @endforeach


         </ul>

         <div class="sidebar-footer" style="background-color: #570a80;">
          <a href="#" data-toggle="tooltip" title="Support"><i class="icon-bubbles"></i> </a>
          <a href="#" data-toggle="tooltip" title="Settings"><i class="icon-settings"></i> </a>
          <a href="/tutor/logout" data-toggle="tooltip" title="Logout"><i class="icon-logout"></i></a>
        </div>

      </div>
