        <nav class="navbar navbar-expand navbar-light bg-white">
          
          <button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="icon-menu"></i></button><!-- MENU BUTTON-->

          <?php $semesterPro= $academicyearP->semesters->where('state','process')->first();  ?>
          <div class="navbar-brand"><?php echo e($semesterPro->label); ?>  </div>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link btn btn-secondary text-white dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-bell"></i> Notification(s) 
            <?php if($Newsltn->count() + $Messageltn->count() + $Quizltn->count() >= 1 ): ?> 
              <span class="badge badge-pill badge-primary"><?php echo e($Newsltn->count() + $Messageltn->count() + $Quizltn->count()); ?></span>
            <?php else: ?> 
              <span class="badge badge-pill badge-danger"><?php echo e($Newsltn->count() + $Messageltn->count() + $Quizltn->count()); ?></span>   
            <?php endif; ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right">


              <?php if($Newsltn->count() >= 1): ?>
                <a href="/teacher/specnotif?q=NEWS" class="dropdown-item"><small class="text-secondary">Infos School</small><br>
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

              <?php if($Quizltn->count() >= 1): ?>
                <a href="/teacher/specnotif?q=QUIZ" class="dropdown-item"><small class="text-secondary">Question</small><br>
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
               
              <?php if($Messageltn->count() >= 1): ?>
                <a href="/teacher/specnotif?q=MESSAGE" class="dropdown-item"><small class="text-secondary">Message</small><br>
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
                
                <a href="/teacher/notification" class="dropdown-item dropdown-link">Voir toutes les notifications</a>

              </div>

          </li>
        </ul>

        </nav>

<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/layouts/navbarT.blade.php ENDPATH**/ ?>