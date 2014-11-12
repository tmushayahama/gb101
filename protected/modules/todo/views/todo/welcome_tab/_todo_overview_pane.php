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
<div class="row">
  <div class="gb-heading-4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="gb-breadcrumb row">
      <a href="<?php echo $todoParentInfo["rootUrl"]; ?>" class="gb-ellipsis-2">
        <?php echo $todoParentInfo["rootUrlDisplay"]; ?>
      </a>
      <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
      <a href="<?php echo Yii::app()->createUrl("todo/todo/todoHome", array()); ?>" class="gb-ellipsis-3">
        <?php echo "To-do Lists"; ?>
      </a>
      <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
      <p class="gb-ellipsis-3">
        <?php echo $todoParentInfo["typeDisplay"]; ?>
      </p>
    </div>
  </div>
  <div class="gb-box-3 gb-background-white">
    <?php
    $this->renderPartial('todo.views.todo.activity.todo._todo_item_row', array(
     "todoParent" => $todoParent,
    ));
    ?>
  </div>
</div>
<div class="row gb-stat-box">
  <div class="gb-heading col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding ">
    <div class="gb-title text-center">
      <h4>Progress</h4>
      <div class="progress gb-progress-bar">
        <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
        </div>
      </div>
    </div>
    <div class="gb-stat-value">
      <?php echo $todoParent->todo->getProgressStats() . "%"; ?>
    </div>
  </div>
</div>    

<div class="row gb-stat-box">
  <div class="gb-heading col-lg-5 col-md-5 col-sm-5 col-xs-12 gb-no-padding">
    <div class="gb-title text-center">
      <h4>Contribution</h4>
    </div>
    <div class="gb-stat-value">
      <?php echo $todoParent->todo->getContributorsStats(); ?>
    </div>
  </div>
  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 gb-no-padding">
    <ul class="list-group gb-no-margin">
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getChecklistStats(); ?></span>
        Todo Judges
      </li>
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getChecklistStats(); ?></span>
        Todo Observers
      </li>
      <li class="list-group-item">
        <span class="badge"><?php echo $todoParent->todo->getChecklistStats(); ?></span>
        Members Participated
      </li>
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

