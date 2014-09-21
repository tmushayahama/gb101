<div class="gb-no-padding">
  <br>
  <div class="row gb-home-nav gb-box-1">
   <a id="gb-tour-skill-1" class="gb-form-show col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding"
       gb-form-slide-target="#gb-skill-list-form-tab-container"
       gb-form-target="#gb-skill-list-form">
     
      <div class="thumbnail">
        <br>
        <div class="gb-img-container">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_7.png" alt="">
        </div>
        <div class="caption">
          <h4 class="text-center">Add a<br>Project Skill</h4>
        </div>
      </div>
    </a>
    <a class="gb-disabled-1 gb-form-slide-btn col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding">
      <div class="thumbnail">
        <br>
        <div class="gb-img-container">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" alt="">
        </div>
        <div class="caption">
          <h4 class="text-center">Assign a<br>Project Skill</h4>
        </div>
      </div>
    </a>
    <a class="gb-disabled-1 gb-form-slide-btn col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding">
      <div class="thumbnail">
        <br>
        <div class="gb-img-container">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" alt="">
        </div>
        <div class="caption">
          <h4 class="text-center">Get Skill<br>Challenge</h4>
        </div>
      </div>
    </a>
  </div>
  <div id="gb-skill-list-form-tab-container" class="row gb-hide gb-panel-form">
    
  </div>
  <br>
  <div id="gb-skill-skill-container" class="">
    <?php //echo $this->renderPartial('skill.views.skill._skill_list_preview', array()); ?>
  </div>
  <br>
  <div class="tab-content row gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
    <div class="tab-pane active" id="gb-skills-all-pane">
      <h3 class="gb-heading-2">Recent Skills</h3>
      <br>
      <div id="gb-posts"class="panel-body gb-no-padding">
        <?php
        $count = 1;
        foreach ($skillList as $skillListItem):
          echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
           'skillListItem' => $skillListItem,
           'source' => GoalList::$SOURCE_SKILL));
        endforeach;
        ?>
      </div>
    </div>
    <div class="tab-pane" id="gb-my-skills-pane">
      <h3 class="gb-heading-2">My Skills</h3>
    </div>
  </div>
</div>
