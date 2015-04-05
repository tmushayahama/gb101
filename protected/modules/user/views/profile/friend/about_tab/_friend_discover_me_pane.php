<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->renderPartial('user.views.profile.friend.sections._profile_header', array(
  "profile" => $profile,
));
?>
<div class="row">
 <div class="col-lg-8">
  <div class="gb-nav-heading-1 row">
   <p class="gb-title gb-ellipsis">DISCOVER ME</p>
  </div>
  <br>
  <div class="row">
   <div id="gb-question-answers" class="row">
    <?php foreach ($userQuestionAnswers as $userQuestionAnswer): ?>
     <?php
     $this->renderPartial('question.views.question.activity._question_answer_row_2', array(
       "userQuestionAnswer" => $userQuestionAnswer,
       "myQuestionAnswer" => UserQuestionAnswer::getUserQuestionAnswer(Yii::app()->user->id, $userQuestionAnswer->question_id),
     ));
     ?>
    <?php endforeach; ?>
   </div>
   <div class="col-lg-4"></div>
  </div>
 </div>
</div>
<div class="gb-dummy-height"></div>
