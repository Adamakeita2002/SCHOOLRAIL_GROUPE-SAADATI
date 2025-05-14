        <?php use Carbon\Carbon;?>

<div class="row">

  <table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center">Lundi</th>
      <th class="text-center">Mardi</th>
      <th class="text-center">Mercredi</th>
      <th class="text-center">Jeudi</th>
      <th class="text-center">Vendredi</th>
      <th class="text-center">Samedi</th>
    </tr>
  </thead>
  <tbody>

<?php if(is_object($lundi8) OR is_object($mardi8) OR is_object($mercredi8) OR is_object($jeudi8) OR is_object($vendredi8) OR is_object($samedi8)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi8)): ?> <?php echo e($lundi8->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi8->startime));?> - <?php echo date("G:i", strtotime($lundi8->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi8->teacher->name); ?> <?php echo e($lundi8->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi8); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi8)): ?> <?php echo e($mardi8->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi8->startime));?> - <?php echo date("G:i", strtotime($mardi8->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi8->teacher->name); ?> <?php echo e($mardi8->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi8); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi8)): ?> <?php echo e($mercredi8->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi8->startime));?> - <?php echo date("G:i", strtotime($mercredi8->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi8->teacher->name); ?> <?php echo e($mercredi8->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi8); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi8)): ?><?php echo e($jeudi8->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi8->startime));?> - <?php echo date("G:i", strtotime($jeudi8->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi8->teacher->name); ?> <?php echo e($jeudi8->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi8); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi8)): ?><?php echo e($vendredi8->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi8->startime));?> - <?php echo date("G:i", strtotime($vendredi8->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi8->teacher->name); ?> <?php echo e($vendredi8->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi8); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi8)): ?><?php echo e($samedi8->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi8->startime));?> - <?php echo date("G:i", strtotime($samedi8->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi8->teacher->name); ?> <?php echo e($samedi8->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi8); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi9) OR is_object($mardi9) OR is_object($mercredi9) OR is_object($jeudi9) OR is_object($vendredi9) OR is_object($samedi9)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi9)): ?> <?php echo e($lundi9->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi9->startime));?> - <?php echo date("G:i", strtotime($lundi9->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi9->teacher->name); ?> <?php echo e($lundi9->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi9); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi9)): ?> <?php echo e($mardi9->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi9->startime));?> - <?php echo date("G:i", strtotime($mardi9->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi9->teacher->name); ?> <?php echo e($mardi9->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi9); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi9)): ?> <?php echo e($mercredi9->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi9->startime));?> - <?php echo date("G:i", strtotime($mercredi9->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi9->teacher->name); ?> <?php echo e($mercredi9->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi9); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi9)): ?><?php echo e($jeudi9->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi9->startime));?> - <?php echo date("G:i", strtotime($jeudi9->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi9->teacher->name); ?> <?php echo e($jeudi9->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi9); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi9)): ?><?php echo e($vendredi9->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi9->startime));?> - <?php echo date("G:i", strtotime($vendredi9->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi9->teacher->name); ?> <?php echo e($vendredi9->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi9); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi9)): ?><?php echo e($samedi9->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi9->startime));?> - <?php echo date("G:i", strtotime($samedi9->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi9->teacher->name); ?> <?php echo e($samedi9->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi9); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi10) OR is_object($mardi10) OR is_object($mercredi10) OR is_object($jeudi10) OR is_object($vendredi10) OR is_object($samedi10)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi10)): ?> <?php echo e($lundi10->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi10->startime));?> - <?php echo date("G:i", strtotime($lundi10->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi10->teacher->name); ?> <?php echo e($lundi10->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi10); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi10)): ?> <?php echo e($mardi10->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi10->startime));?> - <?php echo date("G:i", strtotime($mardi10->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi10->teacher->name); ?> <?php echo e($mardi10->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi10); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi10)): ?> <?php echo e($mercredi10->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi10->startime));?> - <?php echo date("G:i", strtotime($mercredi10->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi10->teacher->name); ?> <?php echo e($mercredi10->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi10); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi10)): ?><?php echo e($jeudi10->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi10->startime));?> - <?php echo date("G:i", strtotime($jeudi10->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi10->teacher->name); ?> <?php echo e($jeudi10->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi10); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi10)): ?><?php echo e($vendredi10->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi10->startime));?> - <?php echo date("G:i", strtotime($vendredi10->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi10->teacher->name); ?> <?php echo e($vendredi10->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi10); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi10)): ?><?php echo e($samedi10->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi10->startime));?> - <?php echo date("G:i", strtotime($samedi10->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi10->teacher->name); ?> <?php echo e($samedi10->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi10); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi11) OR is_object($mardi11) OR is_object($mercredi11) OR is_object($jeudi11) OR is_object($vendredi11) OR is_object($samedi11)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi11)): ?> <?php echo e($lundi11->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi11->startime));?> - <?php echo date("G:i", strtotime($lundi11->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi11->teacher->name); ?> <?php echo e($lundi11->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi11); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi11)): ?> <?php echo e($mardi11->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi11->startime));?> - <?php echo date("G:i", strtotime($mardi11->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi11->teacher->name); ?> <?php echo e($mardi11->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi11); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi11)): ?> <?php echo e($mercredi11->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi11->startime));?> - <?php echo date("G:i", strtotime($mercredi11->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi11->teacher->name); ?> <?php echo e($mercredi11->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi11); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi11)): ?><?php echo e($jeudi11->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi11->startime));?> - <?php echo date("G:i", strtotime($jeudi11->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi11->teacher->name); ?> <?php echo e($jeudi11->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi11); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi11)): ?><?php echo e($vendredi11->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi11->startime));?> - <?php echo date("G:i", strtotime($vendredi11->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi11->teacher->name); ?> <?php echo e($vendredi11->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi11); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi11)): ?><?php echo e($samedi11->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi11->startime));?> - <?php echo date("G:i", strtotime($samedi11->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi11->teacher->name); ?> <?php echo e($samedi11->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi11); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi12) OR is_object($mardi12) OR is_object($mercredi12) OR is_object($jeudi12) OR is_object($vendredi12) OR is_object($samedi12)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi12)): ?> <?php echo e($lundi12->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi12->startime));?> - <?php echo date("G:i", strtotime($lundi12->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi12->teacher->name); ?> <?php echo e($lundi12->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi12); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi12)): ?> <?php echo e($mardi12->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi12->startime));?> - <?php echo date("G:i", strtotime($mardi12->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi12->teacher->name); ?> <?php echo e($mardi12->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi12); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi12)): ?> <?php echo e($mercredi12->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi12->startime));?> - <?php echo date("G:i", strtotime($mercredi12->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi12->teacher->name); ?> <?php echo e($mercredi12->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi12); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi12)): ?><?php echo e($jeudi12->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi12->startime));?> - <?php echo date("G:i", strtotime($jeudi12->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi12->teacher->name); ?> <?php echo e($jeudi12->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi12); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi12)): ?><?php echo e($vendredi12->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi12->startime));?> - <?php echo date("G:i", strtotime($vendredi12->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi12->teacher->name); ?> <?php echo e($vendredi12->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi12); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi12)): ?><?php echo e($samedi12->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi12->startime));?> - <?php echo date("G:i", strtotime($samedi12->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi12->teacher->name); ?> <?php echo e($samedi12->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi12); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi13) OR is_object($mardi13) OR is_object($mercredi13) OR is_object($jeudi13) OR is_object($vendredi13) OR is_object($samedi13)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi13)): ?> <?php echo e($lundi13->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi13->startime));?> - <?php echo date("G:i", strtotime($lundi13->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi13->teacher->name); ?> <?php echo e($lundi13->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi13); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi13)): ?> <?php echo e($mardi13->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi13->startime));?> - <?php echo date("G:i", strtotime($mardi13->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi13->teacher->name); ?> <?php echo e($mardi13->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi13); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi13)): ?> <?php echo e($mercredi13->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi13->startime));?> - <?php echo date("G:i", strtotime($mercredi13->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi13->teacher->name); ?> <?php echo e($mercredi13->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi13); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi13)): ?><?php echo e($jeudi13->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi13->startime));?> - <?php echo date("G:i", strtotime($jeudi13->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi13->teacher->name); ?> <?php echo e($jeudi13->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi13); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi13)): ?><?php echo e($vendredi13->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi13->startime));?> - <?php echo date("G:i", strtotime($vendredi13->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi13->teacher->name); ?> <?php echo e($vendredi13->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi13); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi13)): ?><?php echo e($samedi13->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi13->startime));?> - <?php echo date("G:i", strtotime($samedi13->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi13->teacher->name); ?> <?php echo e($samedi13->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi13); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>


<?php if(is_object($lundi14) OR is_object($mardi14) OR is_object($mercredi14) OR is_object($jeudi14) OR is_object($vendredi14) OR is_object($samedi14)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi14)): ?> <?php echo e($lundi14->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi14->startime));?> - <?php echo date("G:i", strtotime($lundi14->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi14->teacher->name); ?> <?php echo e($lundi14->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi14); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi14)): ?> <?php echo e($mardi14->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi14->startime));?> - <?php echo date("G:i", strtotime($mardi14->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi14->teacher->name); ?> <?php echo e($mardi14->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi14); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi14)): ?> <?php echo e($mercredi14->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi14->startime));?> - <?php echo date("G:i", strtotime($mercredi14->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi14->teacher->name); ?> <?php echo e($mercredi14->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi14); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi14)): ?><?php echo e($jeudi14->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi14->startime));?> - <?php echo date("G:i", strtotime($jeudi14->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi14->teacher->name); ?> <?php echo e($jeudi14->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi14); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi14)): ?><?php echo e($vendredi14->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi14->startime));?> - <?php echo date("G:i", strtotime($vendredi14->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi14->teacher->name); ?> <?php echo e($vendredi14->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi14); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi14)): ?><?php echo e($samedi14->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi14->startime));?> - <?php echo date("G:i", strtotime($samedi14->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi14->teacher->name); ?> <?php echo e($samedi14->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi14); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>


<?php if(is_object($lundi15) OR is_object($mardi15) OR is_object($mercredi15) OR is_object($jeudi15) OR is_object($vendredi15) OR is_object($samedi15)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi15)): ?> <?php echo e($lundi15->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi15->startime));?> - <?php echo date("G:i", strtotime($lundi15->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi15->teacher->name); ?> <?php echo e($lundi15->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi15); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi15)): ?> <?php echo e($mardi15->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi15->startime));?> - <?php echo date("G:i", strtotime($mardi15->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi15->teacher->name); ?> <?php echo e($mardi15->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi15); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi15)): ?> <?php echo e($mercredi15->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi15->startime));?> - <?php echo date("G:i", strtotime($mercredi15->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi15->teacher->name); ?> <?php echo e($mercredi15->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi15); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi15)): ?><?php echo e($jeudi15->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi15->startime));?> - <?php echo date("G:i", strtotime($jeudi15->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi15->teacher->name); ?> <?php echo e($jeudi15->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi15); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi15)): ?><?php echo e($vendredi15->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi15->startime));?> - <?php echo date("G:i", strtotime($vendredi15->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi15->teacher->name); ?> <?php echo e($vendredi15->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi15); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi15)): ?><?php echo e($samedi15->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi15->startime));?> - <?php echo date("G:i", strtotime($samedi15->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi15->teacher->name); ?> <?php echo e($samedi15->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi15); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi16) OR is_object($mardi16) OR is_object($mercredi16) OR is_object($jeudi16) OR is_object($vendredi16) OR is_object($samedi16)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi16)): ?> <?php echo e($lundi16->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi16->startime));?> - <?php echo date("G:i", strtotime($lundi16->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi16->teacher->name); ?> <?php echo e($lundi16->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi16); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi16)): ?> <?php echo e($mardi16->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi16->startime));?> - <?php echo date("G:i", strtotime($mardi16->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi16->teacher->name); ?> <?php echo e($mardi16->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi16); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi16)): ?> <?php echo e($mercredi16->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi16->startime));?> - <?php echo date("G:i", strtotime($mercredi16->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi16->teacher->name); ?> <?php echo e($mercredi16->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi16); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi16)): ?><?php echo e($jeudi16->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi16->startime));?> - <?php echo date("G:i", strtotime($jeudi16->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi16->teacher->name); ?> <?php echo e($jeudi16->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi16); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi16)): ?><?php echo e($vendredi16->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi16->startime));?> - <?php echo date("G:i", strtotime($vendredi16->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi16->teacher->name); ?> <?php echo e($vendredi16->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi16); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi16)): ?><?php echo e($samedi16->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi16->startime));?> - <?php echo date("G:i", strtotime($samedi16->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi16->teacher->name); ?> <?php echo e($samedi16->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi16); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi17) OR is_object($mardi17) OR is_object($mercredi17) OR is_object($jeudi17) OR is_object($vendredi17) OR is_object($samedi17)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi17)): ?> <?php echo e($lundi17->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi17->startime));?> - <?php echo date("G:i", strtotime($lundi17->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi17->teacher->name); ?> <?php echo e($lundi17->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi17); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi17)): ?> <?php echo e($mardi17->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi17->startime));?> - <?php echo date("G:i", strtotime($mardi17->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi17->teacher->name); ?> <?php echo e($mardi17->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi17); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi17)): ?> <?php echo e($mercredi17->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi17->startime));?> - <?php echo date("G:i", strtotime($mercredi17->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi17->teacher->name); ?> <?php echo e($mercredi17->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi17); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi17)): ?><?php echo e($jeudi17->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi17->startime));?> - <?php echo date("G:i", strtotime($jeudi17->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi17->teacher->name); ?> <?php echo e($jeudi17->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi17); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi17)): ?><?php echo e($vendredi17->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi17->startime));?> - <?php echo date("G:i", strtotime($vendredi17->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi17->teacher->name); ?> <?php echo e($vendredi17->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi17); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi17)): ?><?php echo e($samedi17->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi17->startime));?> - <?php echo date("G:i", strtotime($samedi17->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi17->teacher->name); ?> <?php echo e($samedi17->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi17); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi18) OR is_object($mardi18) OR is_object($mercredi18) OR is_object($jeudi18) OR is_object($vendredi18) OR is_object($samedi18)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi18)): ?> <?php echo e($lundi18->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi18->startime));?> - <?php echo date("G:i", strtotime($lundi18->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi18->teacher->name); ?> <?php echo e($lundi18->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi18); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi18)): ?> <?php echo e($mardi18->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi18->startime));?> - <?php echo date("G:i", strtotime($mardi18->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi18->teacher->name); ?> <?php echo e($mardi18->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi18); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi18)): ?> <?php echo e($mercredi18->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi18->startime));?> - <?php echo date("G:i", strtotime($mercredi18->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi18->teacher->name); ?> <?php echo e($mercredi18->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi18); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi18)): ?><?php echo e($jeudi18->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi18->startime));?> - <?php echo date("G:i", strtotime($jeudi18->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi18->teacher->name); ?> <?php echo e($jeudi18->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi18); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi18)): ?><?php echo e($vendredi18->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi18->startime));?> - <?php echo date("G:i", strtotime($vendredi18->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi18->teacher->name); ?> <?php echo e($vendredi18->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi18); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi18)): ?><?php echo e($samedi18->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi18->startime));?> - <?php echo date("G:i", strtotime($samedi18->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi18->teacher->name); ?> <?php echo e($samedi18->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi18); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>


<?php if(is_object($lundi19) OR is_object($mardi19) OR is_object($mercredi19) OR is_object($jeudi19) OR is_object($vendredi19) OR is_object($samedi19)): ?>

     <tr>
       <td class="text-center"><?php if(is_object($lundi19)): ?> <?php echo e($lundi19->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi19->startime));?> - <?php echo date("G:i", strtotime($lundi19->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi19->teacher->name); ?> <?php echo e($lundi19->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi19); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi19)): ?> <?php echo e($mardi19->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi19->startime));?> - <?php echo date("G:i", strtotime($mardi19->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi19->teacher->name); ?> <?php echo e($mardi19->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi19); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi19)): ?> <?php echo e($mercredi19->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi19->startime));?> - <?php echo date("G:i", strtotime($mercredi19->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi19->teacher->name); ?> <?php echo e($mercredi19->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi19); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi19)): ?><?php echo e($jeudi19->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi19->startime));?> - <?php echo date("G:i", strtotime($jeudi19->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi19->teacher->name); ?> <?php echo e($jeudi19->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi19); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi19)): ?><?php echo e($vendredi19->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi19->startime));?> - <?php echo date("G:i", strtotime($vendredi19->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi19->teacher->name); ?> <?php echo e($vendredi19->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi19); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi19)): ?><?php echo e($samedi19->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi19->startime));?> - <?php echo date("G:i", strtotime($samedi19->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi19->teacher->name); ?> <?php echo e($samedi19->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi19); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>

<?php if(is_object($lundi20) OR is_object($mardi20) OR is_object($mercredi20) OR is_object($jeudi20) OR is_object($vendredi20) OR is_object($samedi20)): ?>
     <tr>
       <td class="text-center"><?php if(is_object($lundi20)): ?> <?php echo e($lundi20->name); ?> <br> <b><?php echo date("G:i", strtotime($lundi20->startime));?> - <?php echo date("G:i", strtotime($lundi20->endtime));?></b><br><b>Prof:</b> <?php echo e($lundi20->teacher->name); ?> <?php echo e($lundi20->teacher->surname); ?>  <?php else: ?> <?php echo e($lundi20); ?> <?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mardi20)): ?> <?php echo e($mardi20->name); ?> <br> <b><?php echo date("G:i", strtotime($mardi20->startime));?> - <?php echo date("G:i", strtotime($mardi20->endtime));?></b><br><b>Prof:</b> <?php echo e($mardi20->teacher->name); ?> <?php echo e($mardi20->teacher->surname); ?>  <?php else: ?> <?php echo e($mardi20); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($mercredi20)): ?> <?php echo e($mercredi20->name); ?> <br> <b><?php echo date("G:i", strtotime($mercredi20->startime));?> - <?php echo date("G:i", strtotime($mercredi20->endtime));?></b><br><b>Prof:</b> <?php echo e($mercredi20->teacher->name); ?> <?php echo e($mercredi20->teacher->surname); ?> <?php else: ?> <?php echo e($mercredi20); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($jeudi20)): ?><?php echo e($jeudi20->name); ?> <br> <b><?php echo date("G:i", strtotime($jeudi20->startime));?> - <?php echo date("G:i", strtotime($jeudi20->endtime));?></b><br><b>Prof:</b> <?php echo e($jeudi20->teacher->name); ?> <?php echo e($jeudi20->teacher->surname); ?> <?php else: ?> <?php echo e($jeudi20); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($vendredi20)): ?><?php echo e($vendredi20->name); ?> <br> <b><?php echo date("G:i", strtotime($vendredi20->startime));?> - <?php echo date("G:i", strtotime($vendredi20->endtime));?></b><br><b>Prof:</b> <?php echo e($vendredi20->teacher->name); ?> <?php echo e($vendredi20->teacher->surname); ?>  <?php else: ?> <?php echo e($vendredi20); ?><?php endif; ?></td>

       <td class="text-center"><?php if(is_object($samedi20)): ?><?php echo e($samedi20->name); ?> <br> <b><?php echo date("G:i", strtotime($samedi20->startime));?> - <?php echo date("G:i", strtotime($samedi20->endtime));?></b><br><b>Prof:</b> <?php echo e($samedi20->teacher->name); ?> <?php echo e($samedi20->teacher->surname); ?>  <?php else: ?> <?php echo e($samedi20); ?><?php endif; ?></td>
     </tr>
<?php endif; ?>


  </tbody>
</table>   

</div>

<?php if($timetable->count() == 0): ?>

<p class="text-center"> <button class="btn btn-danger"><b>PAS DE MATIERE PROGRAMMEE</b></button> </p>

<?php endif; ?>
<?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/getTimetable.blade.php ENDPATH**/ ?>