<div class="gb-no-padding">
  <div class="row gb-home-nav gb-box-1">
   <a id="gb-tour-skill-1" class="gb-form-show col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding"
       gb-form-slide-target="#gb-skill-form-tab-container"
       gb-form-target="#gb-skill-form">
     
      <div class="thumbnail">
        <br>
        <div class="gb-img-container">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_4.png" alt="">
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
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_skill.png" alt="">
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
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge.png" alt="">
        </div>
        <div class="caption">
          <h4 class="text-center">Get Skill<br>Challenge</h4>
        </div>
      </div>
    </a>
  </div>
  <div id="gb-skill-form-tab-container" class="row gb-hide gb-panel-form">
    
  </div>
  <br>
  <div id="gb-skill-skill-container" class="">
    <?php //echo $this->renderPartial('skill.views.skill._skill_preview', array()); ?>
  </div>
  <br>
  <div class="tab-content row gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
    <div class="tab-pane active" id="gb-skills-all-pane">
      <h3 class="gb-heading-2">Recent Skills</h3>
      <div id="gb-posts"class="panel-body gb-no-padding">
        <?php
        $count = 1;
        foreach ($skill as $skill):
          echo $this->renderPartial('skill.views.skill._skill_post_row', array(
           'skill' => $skill,
           'source' => Skill::$SOURCE_SKILL));
        endforeach;
        ?>
      </div>
    </div>
    <div class="tab-pane" id="gb-my-skills-pane">
      <h3 class="gb-heading-2">My Skills</h3>
    </div>
  </div>
</div>
