<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row gb-parent-box row" mentorship-question-id="<?php echo $mentorshipQuestionParent->id; ?>"
     data-gb-source-pk="<?php echo $mentorshipQuestionParent->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-question-form-title-input"><?php echo $mentorshipQuestionParent->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-mentorship-question-form-description-input"><?php echo $mentorshipQuestionParent->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left gb-disabled-1">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo question::$STATUS_QUESTIONNAIRE; ?>"
           gb-form-status-id-input="#gb-mentorship-question-form-status-input"
           data-gb-target="#gb-mentorship-question-form"
           data-gb-target-container="<?php echo '#gb-mentorship-questionnaire-child-form-container-' . $mentorshipQuestionParent->id; ?>"
           gb-form-parent-id-input="#gb-mentorship-question-form-parent-question-id-input"
           gb-form-heading="Add Mentorship question"
           gb-form-parent-id="<?php echo $mentorshipQuestionParent->question_id; ?>">
          Comment
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($mentorshipQuestionParent->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             data-gb-target="#gb-mentorship-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-mentorship-questionnaire-child-form-container-' . $mentorshipQuestionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-children" class="row gb-hide">
      <?php
      $mentorshipQuestionChildren = Mentorshipquestion::getMentorshipChildrenquestions($mentorshipQuestionParent->question_id);
      ?>

      <?php foreach ($mentorshipQuestionChildren as $mentorshipQuestionChild): ?>
        <?php
        $this->renderPartial('mentorship.views.mentorship.activity.question._mentorship_questionnaire_child_list_item', array(
         "mentorshipQuestionChild" => $mentorshipQuestionChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

