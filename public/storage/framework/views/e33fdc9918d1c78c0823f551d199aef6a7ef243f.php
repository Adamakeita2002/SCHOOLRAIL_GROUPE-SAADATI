        <div class="app-sidebar" style="background-color: #790fb1f2">
          <div class="text-right">
            <button type="button" class="btn btn-sidebar" data-dismiss="sidebar"><span class="x"></span></button>
          </div>
          <div class="sidebar-header"><img src="/img/large/xparent.jpg" class="user-photo"><p class="username"><?php echo e($tutor->name); ?> <?php echo e($tutor->surname); ?><br><small><?php echo e($tutor->email); ?></small></p>
          </div>
          <ul id="sidebar-nav" class="sidebar-nav">


          <li class="sidebar-nav-group <?php if(isset($school)): ?> <?php echo e($school); ?> <?php endif; ?>"><a href="#forms" class="sidebar-nav-link <?php if(isset($school)): ?> <?php echo e($school); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xinfo.png" width="25" height="25" alt="..."><span class="pl-1"> Infos School</span></a><ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/tutor" class="sidebar-nav-link">Actualités</a></li>
              <li><a href="/tutor/schoolBde" class="sidebar-nav-link">Activités BDE</a></li>
              <li><a href="/tutor/adTeam" class="sidebar-nav-link">Administration</a></li>
            </ul>
          </li>

        <?php $__currentLoopData = $tutor->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="sidebar-nav-group <?php if(isset($child) AND $idS==$student->id): ?> <?php echo e($child); ?> <?php endif; ?>"><a href="#s<?php echo e($student->id); ?>" class="sidebar-nav-link <?php if(isset($child) AND $idS==$student->id): ?> <?php echo e($child); ?> <?php endif; ?>" data-toggle="collapse"><img src="/img/small/xetudiant.png" width="25" height="25" alt="..."><span class="pl-1"> <?php echo e($student->name); ?> <?php echo e($student->surname); ?></span><br><p class="text-center"><b><?php echo e($student->classroom->name); ?> <?php echo e($student->classroom->code); ?></b></p></a><ul id="s<?php echo e($student->id); ?>" class="collapse" data-parent="#sidebar-nav">
              <li><a href="/tutor/child/<?php echo e($student->id); ?>" class="sidebar-nav-link">Profile</a></li>
              <li><a href="/tutor/child/mark/<?php echo e($student->id); ?>" class="sidebar-nav-link">Note</a></li>
              <li><a href="/tutor/child/timetable/<?php echo e($student->id); ?>" class="sidebar-nav-link">Emploi du temps</a></li>
            </ul>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


         </ul>

         <div class="sidebar-footer" style="background-color: #570a80;">
          <a href="#" data-toggle="tooltip" title="Support"><i class="icon-bubbles"></i> </a>
          <a href="#" data-toggle="tooltip" title="Settings"><i class="icon-settings"></i> </a>
          <a href="/tutor/logout" data-toggle="tooltip" title="Logout"><i class="icon-logout"></i></a>
        </div>

      </div>
<?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/layouts/sidebarP.blade.php ENDPATH**/ ?>