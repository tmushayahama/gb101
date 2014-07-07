<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change thiks template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry panel panel-default gb-mentorship-ask-answer-list gb-no-padding"
     mentorship-question-id="<?php echo $mentorshipQuestion->id; ?>"
      gb-source-pk-id="<?php echo $mentorshipQuestion->id; ?>" gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP_ASK_QUESTION; ?>">
  <div class="panel-heading">
    <h5><?php echo $mentorshipQuestion->question->question; ?>
      <span class="pull-right">
        <a class="gb-form-show btn btn-xs btn-default" 
           gb-form-slide-target="<?php echo '#gb-mentorship-ask-answer-form-' . $mentorshipQuestion->id; ?>"
           gb-form-target="#gb-mentorship-ask-answer-form"
           gb-nested="1"
           gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-ask-answers-'.$mentorshipQuestion->id; ?>"
           gb-add-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAskAnswer", array("mentorshipId" => $mentorshipId, "mentorshipQuestionId" => $mentorshipQuestion->id)); ?>">
          <i class="glyphicon glyphicon-plus"></i> Add Answer
        </a>
      </span>
    </h5>
  </div>
  <div class="panel-body gb-padding-thin">
    <div id="<?php echo 'gb-mentorship-ask-answer-form-' . $mentorshipQuestion->id; ?>" class="gb-mentorship-answer-form gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
      <!-- Hidden form will come here -->
    </div>
    <?php
    $mentorshipAnswers = MentorshipAnswer::getAnswers($mentorshipId, $mentorshipQuestion->question_id, true);
    ?>
    <div id="<?php echo 'gb-mentorship-ask-answers-'.$mentorshipQuestion->id; ?>" class="row"> 
      <?php if (count($mentorshipAnswers) == 0): ?>
        <div class="gb-no-information-alert alert alert-block row">
          <strong>no information added. </strong>
        </div>
      <?php endif; ?>
      <?php foreach ($mentorshipAnswers as $mentorshipAnswer): ?>
        <?php
        echo $this->renderPartial('mentorship.views.mentorship._mentorship_ask_answer_list_item', array("mentorshipAnswer" => $mentorshipAnswer));
        ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>



