<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 ">
    <p class="gb-ellipsis">Questionnaires</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 ">
    <i class="pull-right"><?php echo $mentorshipQuestionnairesCount; ?></i>
   </div>
  </h5>
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-questionnaire-form-container"
         data-gb-target="#gb-questionnaire-form"
         readonly
         placeholder="Write a Questionnaire"
         />
 </div>

 <div id="gb-questionnaire-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('questionnaire.views.questionnaire.forms._questionnaire_form', array(
     "formId" => "gb-questionnaire-form",
     "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorshipQuestionnaire", array("mentorshipId" => $mentorshipId)),
     "prependTo" => "#gb-mentorship-questionnaires",
     'questionnaireModel' => $questionnaireModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-mentorship-questionnaires">
  <?php
  $this->renderPartial('mentorship.views.mentorship.activity.questionnaire._mentorship_questionnaires', array(
    "mentorshipQuestionnaires" => $mentorshipQuestionnaires,
    "mentorshipQuestionnairesCount" => $mentorshipQuestionnairesCount,
    "mentorshipId" => $mentorshipId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

