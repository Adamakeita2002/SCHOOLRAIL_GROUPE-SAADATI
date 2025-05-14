        <div class="app-sidebar" style="background-color: #26bc2c">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/img/large/xprofesseur.jpg" class="user-photo"><p class="username"><?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?><br><small><?php echo e($teacher->email); ?></small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">

          <!--
            <li class="sidebar-nav-btn <?php if(isset($teacher)): ?> <?php echo e($teacher); ?> <?php endif; ?>"><a href="/teacher" class="btn btn-block btn-outline-light <?php if(isset($teacher)): ?> <?php echo e($teacher); ?> <?php endif; ?>"> Accueil</a>
            </li>
          -->

            <li class="sidebar-nav-group <?php if(isset($profile)): ?> <?php echo e($profile); ?> <?php endif; ?>">
              <a href="#contentStu" class="sidebar-nav-link  <?php if(isset($profile)): ?> <?php echo e($profile); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xmanager.png" width="25" height="25" alt="..."><span class="pl-1"> Profil</span></a>
              <ul id="contentStu" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/teacher" class="sidebar-nav-link">Voir votre profil</a></li>
                <li><a href="/teacher/profile" class="sidebar-nav-link">Modifier votre profil</a></li>
              </ul>
           </li>


            <li class="sidebar-nav-group <?php if(isset($student)): ?> <?php echo e($student); ?> <?php endif; ?>">
              <a href="#content" class="sidebar-nav-link  <?php if(isset($student)): ?> <?php echo e($student); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> Elève</span></a>
              <ul id="content" class="collapse" data-parent="#sidebar-nav">
                <li><a href="/teacher/AbsenceStudentClas" class="sidebar-nav-link">Les absences</a></li>
                <li><a href="/teacher/ListeStudent" class="sidebar-nav-link">Liste des éleves</a></li>
              </ul>
           </li>


          <li class="sidebar-nav-group <?php if(isset($timetable)): ?> <?php echo e($timetable); ?> <?php endif; ?>"><a href="#Rprog" class="sidebar-nav-link <?php if(isset($timetable)): ?> <?php echo e($timetable); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xemploi.png" width="25" height="25" alt="..."><span class="pl-1"> Programmation </span></a><ul id="Rprog" class="collapse" data-parent="#sidebar-nav">
              <!--<li><a href="/teacher/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
              <li><a href="/teacher/cahier" class="sidebar-nav-link">Cahier de texte</a></li>
              <li><a href="/teacher/findTimetable" class="sidebar-nav-link">Emploi du temps</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group <?php if(isset($ressource)): ?> <?php echo e($ressource); ?> <?php endif; ?>"><a href="#Rforms" class="sidebar-nav-link <?php if(isset($ressource)): ?> <?php echo e($ressource); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> Ressources</span></a><ul id="Rforms" class="collapse" data-parent="#sidebar-nav">
              <!--<li><a href="/teacher/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
              <li><a href="/teacher/Sressource" class="sidebar-nav-link">Envoyer par élève</a></li>
              <li><a href="/teacher/ressource" class="sidebar-nav-link">Envoyer par classe</a></li>
            </ul>
          </li>


          <li class="sidebar-nav-group <?php if(isset($school)): ?> <?php echo e($school); ?> <?php endif; ?>"><a href="#forms" class="sidebar-nav-link <?php if(isset($school)): ?> <?php echo e($school); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Infos School</span></a><ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/teacher/schoolNews" class="sidebar-nav-link">Actualités</a></li>
              <!--<li><a href="/teacher/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>-->
              <li><a href="/teacher/adTeam" class="sidebar-nav-link">Administration</a></li>
            </ul>
          </li>

          <li class="sidebar-nav-group <?php if(isset($homework)): ?> <?php echo e($homework); ?> <?php endif; ?>"><a href="#tests" class="sidebar-nav-link <?php if(isset($homework)): ?> <?php echo e($homework); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xtest.png" width="25" height="25" alt="..."><span class="pl-1"> Test</span></a><ul id="tests" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/teacher/homework" class="sidebar-nav-link">Créer un test</a></li>
              <li><a href="/teacher/Ahomework" class="sidebar-nav-link">Voir les réponses</a></li>
            </ul>
          </li>


            <li class=" sidebar-ulk <?php if(isset($mark)): ?> <?php echo e($mark); ?> <?php endif; ?>"><a href="/teacher/mark" class="sidebar-nav-link <?php if(isset($mark)): ?> <?php echo e($mark); ?> <?php endif; ?>" ><img src="/img/small/xnote.png" width="25" height="25" alt="..."><span class="pl-1"> Note</span></a></li>

<!--
            <li class=" sidebar-ulk <?php if(isset($ressource)): ?> <?php echo e($ressource); ?> <?php endif; ?>"><a href="/teacher/ressource" class="sidebar-nav-link <?php if(isset($ressource)): ?> <?php echo e($ressource); ?> <?php endif; ?>" ><img src="/img/small/xressource.png" width="25" height="25" alt="..."><span class="pl-1"> Ressources</span></a></li>-->


            <li class=" sidebar-ulk <?php if(isset($quiz)): ?> <?php echo e($quiz); ?> <?php endif; ?>"><a href="/teacher/quiz" class="sidebar-nav-link <?php if(isset($quiz)): ?> <?php echo e($quiz); ?> <?php endif; ?>" ><img src="/img/small/xqr.png" width="25" height="25" alt="..."><span class="pl-1"> Qs/Rs </span></a></li>

            <li class=" sidebar-ulk <?php if(isset($calendar)): ?> <?php echo e($calendar); ?> <?php endif; ?>"><a href="/teacher/calendar" class="sidebar-nav-link <?php if(isset($calendar)): ?> <?php echo e($calendar); ?> <?php endif; ?>" ><img src="/img/small/xcalendrier.png" width="25" height="25" alt="..."><span class="pl-1"> Calendrier</span></a></li>



            <li class=" sidebar-ulk <?php if(isset($message)): ?> <?php echo e($message); ?> <?php endif; ?>"><a href="/teacher/message" class="sidebar-nav-link <?php if(isset($message)): ?> <?php echo e($message); ?> <?php endif; ?>" ><img src="/img/small/xcommunication.png" width="25" height="25" alt="..."><span class="pl-1"> Messages</span></a></li>

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
<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/layouts/sidebarT.blade.php ENDPATH**/ ?>