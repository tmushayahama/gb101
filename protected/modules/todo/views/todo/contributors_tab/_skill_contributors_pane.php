<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-contributor-request-form-container" class="row gb-panel-form gb-hide">

</div>
<br>
<div class="row">
  <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
    <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12  row ">
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="row" href="#gb-todo-contributors-pending-pane" data-toggle="tab"
           gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoDiscussions", array('todoListId' => $todoListItem->id)); ?>">
          <i class="glyphicon glyphicon-question-sign pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Requests</p></div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </li>
      <h5 class="gb-heading-3">JUDGES 
        <span class="pull-right badge gb-badge-sm"><?php echo $todoContributorsCount; ?></span>
      </h5>
      <?php foreach ($todoContributors as $todoContributor): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 ">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoContributor", array('todoListId' => $todoListItem->id, 'todoContributorId' => $todoContributor->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11  pull-left">
              <img class="gb-icon-2 col-lg-2 " src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoContributor->contributor->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 "><p class="gb-ellipsis "><?php echo $todoContributor->contributor->profile->firstname . " " . $todoContributor->contributor->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
      <h5 class="gb-heading-3">OBSERVERS
        <span class="pull-right badge gb-badge-sm"><?php echo $todoObserversCount; ?></span>
      </h5>
      <?php foreach ($todoObservers as $todoObserver): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 ">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoObserver", array('todoListId' => $todoListItem->id, 'todoObserverId' => $todoObserver->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11  pull-left">
              <img class="gb-icon-2 col-lg-2 " src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoObserver->observer->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 "><p class="gb-ellipsis "><?php echo $todoObserver->observer->profile->firstname . " " . $todoObserver->observer->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="tab-content gb-padding-left-3">
      <div class="tab-pane active" id="gb-todo-contributors-pending-pane">
        <h3 class="gb-heading-2">Pending Requests</h3>
        <div class="row gb-tab-pane-body">
          <?php
          $this->renderPartial('todo.views.todo.contributors_tab._todo_contributors_pending_pane', array(
           "todoContributorRequests" => $todoContributorRequests,
           "todoObserverRequests" => $todoObserverRequests,
           "todoListItem" => $todoListItem));
          ?>
        </div>
      </div>
      <div class="tab-pane" id="gb-contributor-person-pane">
        <div class="row gb-tab-pane-body"></div>
      </div>
    </div>
  </div>
</div>

