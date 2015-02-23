<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-question-answer-row row">
 <div class="col-lg-12 col-sm-12 col-xs-12">
  <!-- <img src="<?php //echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $userQuestionAnswer->user->profile->avatar_url;  ?>" alt=""> -->
  <p class="gb-title"><?php echo $userQuestionAnswer->question->description; ?></p>
  <p class="gb-description"><?php echo $userQuestionAnswer->questionAnswerChoice->answer; ?></p>
  <p class="gb-description"><?php echo $userQuestionAnswer->description; ?></p>
 </div>
</div>

