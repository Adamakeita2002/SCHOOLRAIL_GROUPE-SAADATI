        <nav class="navbar navbar-expand navbar-light bg-white">

          <button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="icon-menu"></i></button><!-- MENU BUTTON-->

          <div class="navbar-brand">Bienvenue ! </div>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link btn btn-secondary text-white dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-bell"></i> Notification(s)
            <?php if($Calendarltn->count() + $Testltn->count() + $Ressourceltn->count() + $Quizltn->count() + $Markltn->count() + $Forumltn->count() + $Bdeltn->count() + $Messageltn->count() +
$Newsltn->count() >= 1 ): ?>
        <span class="badge badge-pill badge-primary"><?php echo e($Calendarltn->count() + $Testltn->count() + $Ressourceltn->count() + $Markltn->count() + $Forumltn->count() + $Bdeltn->count() + $Newsltn->count() + $Messageltn->count() + $Quizltn->count()); ?>

        </span>
            <?php else: ?>
        <span class="badge badge-pill badge-danger"><?php echo e($Calendarltn->count() + $Testltn->count() + $Ressourceltn->count() + $Markltn->count() + $Forumltn->count() + $Bdeltn->count() +$Newsltn->count() + $Messageltn->count() + $Quizltn->count()); ?>

        </span>
            <?php endif; ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

              <?php if( $Testltn->count() >= 1): ?>
                <a href="/student/specnotif?q=TEST" class="dropdown-item"><small class="dropdown-item-title">Test (Exercice)</small><br>
                <div>
                  <?php if($Testltn->count() == 1 ): ?>
                    <?php echo e($Testltn->count()); ?> Nouveau Test (Exercice)
                  <?php elseif($Testltn->count() > 1): ?>
                    <?php echo e($Testltn->count()); ?> Nouveaux Tests (Exercices)
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if( $Quizltn->count() >= 1): ?>
                <a href="/student/specnotif?q=QUIZ" class="dropdown-item"><small class="dropdown-item-title">Questions</small><br>
                <div>
                  <?php if($Quizltn->count() == 1 ): ?>
                    <?php echo e($Quizltn->count()); ?> Nouvelle Question
                  <?php elseif($Quizltn->count() > 1): ?>
                    <?php echo e($Quizltn->count()); ?> Nouvelles Questions
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Ressourceltn->count() >= 1): ?>
                <a href="/student/specnotif?q=RESSOURCE" class="dropdown-item"><small class="text-secondary">E-learning</small><br>
                <div>
                  <?php if($Ressourceltn->count() == 1 ): ?>
                    <?php echo e($Ressourceltn->count()); ?> Nouvelle Ressource
                  <?php elseif($Ressourceltn->count() > 1): ?>
                    <?php echo e($Ressourceltn->count()); ?> Nouvelles Ressources
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Markltn->count() >= 1): ?>
                <a href="/student/specnotif?q=MARK" class="dropdown-item"><small class="text-secondary">Note</small><br>
                <div>
                  <?php if($Markltn->count() == 1 ): ?>
                    <?php echo e($Markltn->count()); ?> Nouvelle Note
                  <?php elseif($Markltn->count() > 1): ?>
                    <?php echo e($Markltn->count()); ?> Nouvelles Notes
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Calendarltn->count() >= 1): ?>
                <a href="/student/specnotif?q=CALENDAR" class="dropdown-item"><small class="text-secondary">Calendrier</small><br>
                <div>
                  <?php if($Calendarltn->count() == 1 ): ?>
                    <?php echo e($Calendarltn->count()); ?> Nouvelle date
                  <?php elseif($Calendarltn->count() > 1): ?>
                    <?php echo e($Calendarltn->count()); ?> Nouvelles dates
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Forumltn->count() >= 1): ?>
                <a href="/student/specnotif?q=FORUM" class="dropdown-item"><small class="text-secondary">Forum</small><br>
                <div>
                  <?php if($Forumltn->count() == 1 ): ?>
                    <?php echo e($Forumltn->count()); ?> Nouveau Forum
                  <?php elseif($Forumltn->count() > 1): ?>
                    <?php echo e($Forumltn->count()); ?> Nouveaux Forums
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Bdeltn->count() >= 1): ?>
                <a href="/student/specnotif?q=BDE" class="dropdown-item"><small class="text-secondary">Infos BDE</small><br>
                <div>
                  <?php if($Bdeltn->count() == 1 ): ?>
                    <?php echo e($Bdeltn->count()); ?> Nouvelle Actu BDE
                  <?php elseif($Bdeltn->count() > 1): ?>
                    <?php echo e($Bdeltn->count()); ?> Nouvelles Actu BDE
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Newsltn->count() >= 1): ?>
                <a href="/student/specnotif?q=NEWS" class="dropdown-item"><small class="text-secondary">Infos School</small><br>
                <div>
                  <?php if($Newsltn->count() == 1 ): ?>
                    <?php echo e($Newsltn->count()); ?> Nouvelle Actualité
                  <?php elseif($Newsltn->count() > 1): ?>
                    <?php echo e($Newsltn->count()); ?> Nouvelles Actualités
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <?php if($Messageltn->count() >= 1): ?>
                <a href="/student/specnotif?q=MESSAGE" class="dropdown-item"><small class="text-secondary">Message</small><br>
                <div>
                  <?php if($Messageltn->count() == 1 ): ?>
                    <?php echo e($Messageltn->count()); ?> Nouveau Message
                  <?php elseif($Messageltn->count() > 1): ?>
                    <?php echo e($Messageltn->count()); ?> Nouveaux Messages
                  <?php endif; ?>
                </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

                <a href="/student/notification" class="dropdown-item dropdown-link">Voir toutes les notifications</a>

                </div>

          </li>
        </ul>

        </nav>

<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>