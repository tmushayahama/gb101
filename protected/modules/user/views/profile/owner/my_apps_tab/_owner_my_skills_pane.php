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
 <div class="col-lg-7 gb-padding-none">
  <div class="gb-nav-heading-1 col-lg-9 col-sm-2 col-xs-12">
   <p class="gb-title gb-ellipsis">MY SKILLS</p>
  </div>
  <br>
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">

   </div>
  </div>
  <br>
  <div class="row">
   <div class="col-lg-12">
    <div class="gb-body-1">
     <div id="gb-question-answers" class="row">
      <?php foreach ($userSkills as $userSkill): ?>
       <?php
       echo $userSkill->title
       //$this->renderPartial('question.views.question.activity._question_answer_row', array(
       // "userQuestionAnswer" => $userQuestionAnswer,
       //));
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
