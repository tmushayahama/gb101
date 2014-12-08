<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change thiks template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry-row row gb-background-light-grey-1"
     mentorship-question-id="<?php echo $mentorshipQuestion->id; ?>"
     data-gb-source-pk="<?php echo $mentorshipQuestion->id; ?>" data-gb-source="<?php echo Type::$SOURCE_MENTORSHIP_ASK_QUESTION; ?>">
  <div class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipQuestion->question->questioner->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding gb-discussion-title-side-border">
      <div class="panel-body">
        <p><?php echo $mentorshipQuestion->question->question; ?><p>
      </div>
      <?php if (!Yii::app()->user->isGuest): ?>
        <?php if (Mentorship::viewerPrivilege($mentorshipId, Yii::app()->user->id) != Mentorship::$IS_NOT_ENROLLED): ?>
          <textarea class="gb-form-show form-control input-sm col-lg-12 col-md--12 col-sm-12 col-xs--12 " rows="2" readonly
                    data-gb-target-container="<?php echo '#gb-mentorship-ask-answer-form-' . $mentorshipQuestion->id; ?>"
                    data-gb-target="#gb-mentorship-ask-answer-form"
                    gb-nested="1"
                    gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-ask-answers-' . $mentorshipQuestion->id; ?>"
                    data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAskAnswer", array("mentorshipId" => $mentorshipId, "mentorshipQuestionId" => $mentorshipQuestion->id)); ?>">
            Add your answer
          </textarea>
        <?php endif; ?>
      <?php endif; ?>
      <div id="<?php echo 'gb-mentorship-ask-answer-form-' . $mentorshipQuestion->id; ?>" class="gb-mentorship-answer-form gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
        <!-- Hidden form will come here -->
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-left gb-padding-thin">
            by: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipQuestion->question->questioner_id)); ?>">
              <i><?php echo $mentorshipQuestion->question->questioner->profile->firstname . " " . $mentorshipQuestion->question->questioner->profile->lastname ?></i>
            </a>
          </div>
          <div class="btn-group pull-right"> 
            <p class="gb-padding-thin pull-left">
              Answers: <span class="gb-reply-count"><?php echo MentorshipAnswer::getAnswersCount($mentorshipId, $mentorshipQuestion->question_id) ?></span>
            </p> 
            <?php if ($mentorshipQuestion->question->questioner_id == Yii::app()->user->id): ?>
              <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <?php endif; ?>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <br>
  <?php
  $mentorshipAnswers = MentorshipAnswer::getAnswers($mentorshipId, $mentorshipQuestion->question_id, true);
  ?>
  <div id="<?php echo 'gb-mentorship-ask-answers-' . $mentorshipQuestion->id; ?>" class="row gb-scrollable"> 
    <?php if (count($mentorshipAnswers) == 0): ?>
      <h5 class="text-center text-warning gb-no-information row">
        no answer(s) added.
      </h5>
    <?php endif; ?>
    <?php foreach ($mentorshipAnswers as $mentorshipAnswer): ?>
      <?php
      echo $this->renderPartial('mentorship.views.mentorship._mentorship_ask_answer_list_item', array("mentorshipAnswer" => $mentorshipAnswer));
      ?>
    <?php endforeach; ?>
  </div>
</div>
<script type="text/javascript">
  $("textarea.gb-form-show").each(function(e) {
    $(this).val($(this).val().trim());
  });
</script>



