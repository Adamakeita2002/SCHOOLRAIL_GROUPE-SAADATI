        <div class="app-sidebar">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header">
              <?php if($student->gender == 'M'): ?>
              <img src="/img/large/xmetudiant.jpg" class="user-photo">
              <?php else: ?>
              <img src="/img/large/xfetudiant.jpg" class="user-photo">
              <?php endif; ?>
              <p class="username"><?php echo e($student->name); ?> <?php echo e($student->surname); ?><br><small><?php echo e($student->email); ?></small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

            <li class="sidebar-nav-btn <?php if(isset($account)): ?> <?php echo e($account); ?> <?php endif; ?>"><a href="/student" class="btn btn-block btn-outline-light <?php if(isset($account)): ?> <?php echo e($account); ?> <?php endif; ?>"> Accueil</a></li>

            <li class="sidebar-nav-group <?php if(isset($profile)): ?> <?php echo e($profile); ?> <?php endif; ?>">
              <a href="#content" class="sidebar-nav-link  <?php if(isset($profile)): ?> <?php echo e($profile); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> Profil </span></a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/profile" class="sidebar-nav-link">Voir votre profil</a></li>
                <li><a href="/student/EditProfile" class="sidebar-nav-link">Modifier votre profil</a></li>
              </ul>
           </li>

            <li class="sidebar-nav-group <?php if(isset($school)): ?> <?php echo e($school); ?> <?php endif; ?>"><a href="#forms" class="sidebar-nav-link <?php if(isset($school)): ?> <?php echo e($school); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Infos School</span></a>
              <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/schoolNews" class="sidebar-nav-link">Actualités</a></li>
                <!--<li><a href="/student/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
                <li><a href="/student/adTeam" class="sidebar-nav-link">Administration</a></li>
              </ul>
            </li>

            <li class="sidebar-nav-group <?php if(isset($materiel)): ?> <?php echo e($materiel); ?> <?php endif; ?>"><a href="#input-controls" class="sidebar-nav-link <?php if(isset($materiel)): ?> <?php echo e($materiel); ?> <?php endif; ?>" data-toggle="collapse">
              <img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> E-learning</span></a>
              <ul id="input-controls" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/standard" class="sidebar-nav-link">Ressources Standards</a></li>
                <li><a href="/student/materiel" class="sidebar-nav-link">Ressources Profs</a></li>
                <li><a href="/student/tactileo" class="sidebar-nav-link">Tactileo</a></li>
              </ul>
            </li>
<!--
            <li class="sidebar-nav-group <?php if(isset($quiz)): ?> <?php echo e($quiz); ?> <?php endif; ?>"><a href="#layoutQ" class="sidebar-nav-link <?php if(isset($quiz)): ?> <?php echo e($quiz); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xqr.png" width="25" height="25" alt="..."><span class="pl-1"> Qs/Rs</span></a>
              <ul id="layoutQ" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/setQuiz" class="sidebar-nav-link">Poser une question</a></li>
                <li><a href="/student/quiz" class="sidebar-nav-link">Qs/Rs</a></li>
              </ul>
           </li>
-->
<!--
            <li class=" sidebar-ulk <?php if(isset($note)): ?> <?php echo e($note); ?> <?php endif; ?>"><a href="/student/mark" class="sidebar-nav-link <?php if(isset($note)): ?> <?php echo e($note); ?> <?php endif; ?>" ><img src="/img/small/xnote.png" width="25" height="25" alt="..."><span class="pl-1"> Note </span></a></li>
-->

            <li class=" sidebar-ulk <?php if(isset($paiement)): ?> <?php echo e($paiement); ?> <?php endif; ?>"><a href="/student/mark" class="sidebar-nav-link <?php if(isset($paiement)): ?> <?php echo e($paiement); ?> <?php endif; ?>" ><i class="fa fa-money"></i><span class="pl-1"> Paiements </span></a></li>


            <li class=" sidebar-ulk <?php if(isset($test)): ?> <?php echo e($test); ?> <?php endif; ?>"><a href="/student/homework" class="sidebar-nav-link <?php if(isset($test)): ?> <?php echo e($test); ?> <?php endif; ?>" ><img src="/img/small/xtest.png" width="25" height="25" alt="..."><span class="pl-1">Test (Exercice)</span></a></li>

            <li class=" sidebar-ulk <?php if(isset($calendar)): ?> <?php echo e($calendar); ?> <?php endif; ?>"><a href="/student/calendar" class="sidebar-nav-link <?php if(isset($calendar)): ?> <?php echo e($calendar); ?> <?php endif; ?>" ><img src="/img/small/xcalendrier.png" width="25" height="25" alt="..."><span class="pl-1"> Calendrier</span></a></li>

<!--

            <li class="sidebar-nav-group <?php if(isset($forum)): ?> <?php echo e($forum); ?> <?php endif; ?>"><a href="#layout" class="sidebar-nav-link <?php if(isset($forum)): ?> <?php echo e($forum); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xforum.jpg" width="18" height="18" alt="..."><span class="pl-1"> Forums</span></a>
              <ul id="layout" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/student/setForum" class="sidebar-nav-link">Engager un sujet</a></li>
                <li><a href="/student/forum" class="sidebar-nav-link">Discussions</a></li>
              </ul>
           </li>
-->
            <li class=" sidebar-ulk <?php if(isset($timetable)): ?> <?php echo e($timetable); ?> <?php endif; ?>"><a href="/student/findTimetable" class="sidebar-nav-link <?php if(isset($timetable)): ?> <?php echo e($timetable); ?> <?php endif; ?>" ><img src="/img/small/xemploi.png" width="25" height="25" alt="..."><span class="pl-1"> Emploi du temps</span></a></li>

         </ul>

         <div class="sidebar-footer">
          <a href="/student/message" data-toggle="tooltip" title="Message"><i class="icon-bubbles"></i> </a>
          <a href="/student/quest" data-toggle="tooltip" title="Requêtes"><i class="icon-envelope-letter"></i> </a>
          <a href="/student/logout" data-toggle="tooltip" title="Se déconnecter"><i class="icon-logout"></i></a>
        </div>

      </div>
<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/layouts/sidebarS.blade.php ENDPATH**/ ?>