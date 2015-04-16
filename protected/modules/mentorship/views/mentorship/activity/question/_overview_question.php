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
  "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorshipQuestionOverviewAnswer", array()),
  "prependTo" => "#gb-question-overview-answers",
  'mentorshipAnswerModel' => new MentorshipAnswer(),
  'questionId' => $overviewQuestion->id,
  "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
));
?>



<?php //foreach MentorshipQuestion:: $overviewQuestion->description; ?>

