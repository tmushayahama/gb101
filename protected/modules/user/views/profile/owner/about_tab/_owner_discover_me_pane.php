<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->renderPartial('user.views.profile.owner.sections._profile_header', array(
  "profile" => $profile,
));
?>
<div class="row">
 <div class="col-lg-7 gb-no-padding">
  <div class="gb-nav-heading-1 col-lg-9 col-sm-2 col-xs-12">
   <p class="gb-title gb-ellipsis">DISCOVER ME</p>
  </div>
  <br>
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
    <?php
    $this->renderPartial('user.views.user.forms._user_question_form', array(
      "formId" => "gb-user-question-form",
      "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
      "prependTo" => "#gb-question-answers",
      'userQuestionModel' => $userQuestionModel,
      'question' => $nextQuestion,
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
    ));
    ?>
   </div>
  </div>
  <br>
  <div class="row">
   <div class="col-lg-12">
    <div class="gb-body-1">
     <div id="gb-question-answers" class="row">
      <?php foreach ($userQuestionAnswers as $userQuestionAnswer): ?>
       <?php
       $this->renderPartial('question.views.question.activity._question_answer_row', array(
         "userQuestionAnswer" => $userQuestionAnswer,
       ));
       ?>
      <?php endforeach; ?>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="col-lg-5">

 </div>
</div>
<div class="gb-dummy-height"></div>
