<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $overviewQuestion->description; ?>
<?php
$this->renderPartial('advice.views.advice.activity.question._question_answer_form', array(
  "formId" => "gb-user-question-form",
  "actionUrl" => Yii::app()->createUrl("advice/advice/answerAdviceQuestionOverview", array('adviceId' => $advice->id)),
  "prependTo" => "#gb-question-overview-answers-" . $overviewQuestion->id,
  'adviceQuestionAnswerModel' => new AdviceQuestionAnswer(),
  'questionId' => $overviewQuestion->id,
  "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
));
?>

<div id="<?php echo 'gb-question-overview-answers-' . $overviewQuestion->id; ?>" class="row">
 <?php foreach (AdviceQuestionAnswer::getAdviceQuestionAnswers($advice->id, $overviewQuestion->id) as $adviceQuestionAnswer): ?>
  <?php
  $this->renderPartial('advice.views.advice.activity.question._overview_question_answer_row', array(
    "adviceQuestionAnswer" => $adviceQuestionAnswer,
  ));
  ?>
 <?php endforeach; ?>
</div>

