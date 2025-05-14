        <nav class="navbar navbar-expand navbar-light bg-white">

          <button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="icon-menu"></i></button><!-- MENU BUTTON-->

          <div class="navbar-brand">Bienvenue ! </div>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link btn btn-secondary text-white dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-bell"></i> Notification(s)
            @if ($Calendarltn->count() + $Testltn->count() + $Ressourceltn->count() + $Quizltn->count() + $Markltn->count() + $Forumltn->count() + $Bdeltn->count() + $Messageltn->count() +
$Newsltn->count() >= 1 )
        <span class="badge badge-pill badge-primary">{{ $Calendarltn->count() + $Testltn->count() + $Ressourceltn->count() + $Markltn->count() + $Forumltn->count() + $Bdeltn->count() + $Newsltn->count() + $Messageltn->count() + $Quizltn->count() }}
        </span>
            @else
        <span class="badge badge-pill badge-danger">{{$Calendarltn->count() + $Testltn->count() + $Ressourceltn->count() + $Markltn->count() + $Forumltn->count() + $Bdeltn->count() +$Newsltn->count() + $Messageltn->count() + $Quizltn->count() }}
        </span>
            @endif
            </a>

            <div class="dropdown-menu dropdown-menu-right">

              @if( $Testltn->count() >= 1)
                <a href="/student/specnotif?q=TEST" class="dropdown-item"><small class="dropdown-item-title">Test (Exercice)</small><br>
                <div>
                  @if($Testltn->count() == 1 )
                    {{$Testltn->count()}} Nouveau Test (Exercice)
                  @elseif ($Testltn->count() > 1)
                    {{$Testltn->count()}} Nouveaux Tests (Exercices)
                  @endif
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if( $Quizltn->count() >= 1)
                <a href="/student/specnotif?q=QUIZ" class="dropdown-item"><small class="dropdown-item-title">Questions</small><br>
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

              @if($Ressourceltn->count() >= 1)
                <a href="/student/specnotif?q=RESSOURCE" class="dropdown-item"><small class="text-secondary">E-learning</small><br>
                <div>
                  @if($Ressourceltn->count() == 1 )
                    {{$Ressourceltn->count()}} Nouvelle Ressource
                  @elseif ($Ressourceltn->count() > 1)
                    {{$Ressourceltn->count()}} Nouvelles Ressources
                  @endif
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if($Markltn->count() >= 1)
                <a href="/student/specnotif?q=MARK" class="dropdown-item"><small class="text-secondary">Note</small><br>
                <div>
                  @if($Markltn->count() == 1 )
                    {{$Markltn->count()}} Nouvelle Note
                  @elseif ($Markltn->count() > 1)
                    {{$Markltn->count()}} Nouvelles Notes
                  @endif
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if($Calendarltn->count() >= 1)
                <a href="/student/specnotif?q=CALENDAR" class="dropdown-item"><small class="text-secondary">Calendrier</small><br>
                <div>
                  @if($Calendarltn->count() == 1 )
                    {{$Calendarltn->count()}} Nouvelle date
                  @elseif ($Calendarltn->count() > 1)
                    {{$Calendarltn->count()}} Nouvelles dates
                  @endif
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if($Forumltn->count() >= 1)
                <a href="/student/specnotif?q=FORUM" class="dropdown-item"><small class="text-secondary">Forum</small><br>
                <div>
                  @if($Forumltn->count() == 1 )
                    {{$Forumltn->count()}} Nouveau Forum
                  @elseif ($Forumltn->count() > 1)
                    {{$Forumltn->count()}} Nouveaux Forums
                  @endif
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if($Bdeltn->count() >= 1)
                <a href="/student/specnotif?q=BDE" class="dropdown-item"><small class="text-secondary">Infos BDE</small><br>
                <div>
                  @if($Bdeltn->count() == 1 )
                    {{$Bdeltn->count()}} Nouvelle Actu BDE
                  @elseif ($Bdeltn->count() > 1)
                    {{$Bdeltn->count()}} Nouvelles Actu BDE
                  @endif
                </div>
                </a>
                <div class="dropdown-divider"></div>
              @endif

              @if($Newsltn->count() >= 1)
                <a href="/student/specnotif?q=NEWS" class="dropdown-item"><small class="text-secondary">Infos School</small><br>
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

              @if($Messageltn->count() >= 1)
                <a href="/student/specnotif?q=MESSAGE" class="dropdown-item"><small class="text-secondary">Message</small><br>
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

                <a href="/student/notification" class="dropdown-item dropdown-link">Voir toutes les notifications</a>

                </div>

          </li>
        </ul>

        </nav>

