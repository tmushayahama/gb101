<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-question-list-item panel panel-default row gb-discussion-title-side-border" skill-question-id="<?php echo $skillQuestionParent->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionParent->question_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillQuestionParent->question->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillQuestionParent->question->creator_id)); ?>">
            <?php echo $skillQuestionParent->question->creator->profile->firstname . " " . $skillQuestionParent->question->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Skill question</i></span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-form-title-input"><?php echo $skillQuestionParent->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-question-form-description-input"><?php echo $skillQuestionParent->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo question::$STATUS_GENERAL; ?>"
           gb-form-status-id-input="#gb-skill-question-form-status-input"
           gb-form-slide-target="<?php echo '#gb-skill-question-child-form-container-' . $skillQuestionParent->id; ?>"
           gb-form-target="#gb-skill-question-form"
           gb-form-parent-id-input="#gb-skill-question-form-parent-question-id-input"
           gb-form-heading="Add Skill question"
           gb-form-parent-id="<?php echo $skillQuestionParent->id; ?>">
          <i class="glyphicon glyphicon-plus"></i>
          Reply
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($skillQuestionParent->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             gb-form-target="#gb-skill-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-skill-question-child-form-container-' . $skillQuestionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $skillQuestionChildren = Skillquestion::getSkillChildrenquestions($skillQuestionParent->question_id);
      ?>

      <?php foreach ($skillQuestionChildren as $skillQuestionChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_question_child_list_item', array(
         "skillQuestionChild" => $skillQuestionChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

