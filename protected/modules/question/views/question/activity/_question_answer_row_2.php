<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-question-answer-row row">
 <div class="col-lg-12 col-sm-12 col-xs-12">
  <!-- <img src="<?php //echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $userQuestionAnswer->user->profile->avatar_url;                           ?>" alt=""> -->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <p class="gb-title"><?php echo $userQuestionAnswer->question->description; ?></p>
  </div>
  <br>
  <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="row">
     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $userQuestionAnswer->user->profile->avatar_url; ?>" alt="">
     </div>
     <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <p class="gb-description"><?php echo $userQuestionAnswer->questionAnswerChoice->answer; ?></p>
      <p class="gb-description"><?php echo $userQuestionAnswer->description; ?></p>
     </div>
    </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <?php if ($myQuestionAnswer): ?>
     <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $myQuestionAnswer->user->profile->avatar_url; ?>" alt="">
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
       <p class="gb-description"><?php echo $myQuestionAnswer->questionAnswerChoice->answer; ?></p>
       <p class="gb-description"><?php echo $myQuestionAnswer->description; ?></p>
      </div>
     </div>
    <?php else: ?>
     <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="btn btn-primary">
        Answer
       </div>
      </div>
     </div>
    <?php endif; ?>
   </div>
  </div>
 </div>
</div>

