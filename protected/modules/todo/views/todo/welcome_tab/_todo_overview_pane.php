<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-1">
  <div class="row">
    <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
      <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
        <?php echo $todoParent->todo->description; ?>
      </p>      
    </div>
  </div>
</div>
<br>
<div class="row gb-stat-box">
  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <div class="gb-title text-center">
      Progress
    </div>

    <div class="gb-stat-value">
      <?php echo $todoParent->todo->getProgressStats() . "%"; ?>
    </div>
    <div class="progress">
      <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
        <span class="sr-only">20% Complete</span>
      </div>
    </div>
  </div>
  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
    <ul class="list-group gb-scrollable">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Morbi leo risus</li>
      <li class="list-group-item">sPorta ac consectetur ac</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>
  </div>
</div>    

<div class="row gb-stat-box">
  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <div class="gb-title text-center">
      Contribution
    </div>

    <div class="gb-stat-value">
      <?php echo $todoParent->todo->getContributorsStats(); ?>
    </div>
    <div class="progress">
      <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
        <span class="sr-only">20% Complete</span>
      </div>
    </div>
  </div>
  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
    <ul class="list-group gb-scrollable">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Morbi leo risus</li>
      <li class="list-group-item">sPorta ac consectetur ac</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>
  </div>
</div>    

<div class="row gb-stat-box">
  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <div class="gb-title text-center">
      Activities
    </div>

    <div class="gb-stat-value">
      <?php echo $todoParent->todo->getActivitiesStats(); ?>
    </div>
  </div>
  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
    <ul class="list-group gb-scrollable">
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getChecklistStats(); ?></span>
        Todos Checklist
      </li>
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getCommentsStats(); ?></span>
        Todos Comments
      </li>
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getNotesStats(); ?></span>
        Todos Notss
      </li>
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getWeblinksStats(); ?></span>
        Todos External Links
      </li>
    </ul>
  </div>
</div>   
<br>

