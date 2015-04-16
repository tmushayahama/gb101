<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $overviewQuestion->description; ?>
<?php
$this->renderPartial('mentorship.views.mentorship.activity.question._question_answer_form', array(
  "formId" => "gb-user-question-form",
  "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/answerMentorshipQuestionOverview", array('mentorshipId' => $mentorship->id)),
  "prependTo" => "#gb-question-overview-answers-" . $overviewQuestion->id,
  'mentorshipQuestionAnswerModel' => new MentorshipQuestionAnswer(),
  'questionId' => $overviewQuestion->id,
  "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
));
?>

<div id="<?php echo 'gb-question-overview-answers-' . $overviewQuestion->id; ?>" class="row">
 <?php foreach (MentorshipQuestionAnswer::getMentorshipQuestionAnswers($mentorship->id, $overviewQuestion->id) as $mentorshipQuestionAnswer): ?>
  <?php
  $this->renderPartial('mentorship.views.mentorship.activity.question._overview_question_answer_row', array(
    "mentorshipQuestionAnswer" => $mentorshipQuestionAnswer,
  ));
  ?>
 <?php endforeach; ?>
</div>

