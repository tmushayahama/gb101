<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$goalQuestionParentList = GoalQuestion::getGoalChildrenQuestions($goalQuestionnaireParent->id, $goal->id);
$goalQuestionParentListCount = GoalQuestion::getGoalChildrenQuestionsCount($goalQuestionnaireParent->id, $goal->id);
?>
<div class="gb-box-3 gb-block row" goal-question-id="<?php echo $goalQuestionnaireParent->id; ?>">
 <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
  <div class="row">
   <div class="row gb-panel-form gb-hide">
   </div>
   <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
    <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
     <p class="gb-ellipsis"><?php echo $goalQuestionnaireParent->description; ?></p>
    </div>
    <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
     <i class="pull-right"><?php echo $goalQuestionParentListCount; ?></i>
    </div>
   </h5>
   <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding"
        gb-is-child-form="1"
        data-gb-target="#gb-question-form"
        gb-form-parent-id-input="#gb-question-form-parent-question-id-input"
        gb-form-parent-id="<?php echo $goalQuestionnaireParent->id; ?>"
        data-gb-url="<?php echo Yii::app()->createUrl("goal/goal/addGoalQuestion", array("goalId" => $goal->id)); ?>"
        data-gb-prepend-to="<?php echo '#gb-questionnaire-' . $goalQuestionnaireParent->id; ?>"
        gb-form-description-input="#gb-question-form-description-input">
    <textarea class="form-control"
              placeholder="<?php echo $goalQuestionnaireParent->description; ?>"
              rows="1"></textarea>
    <div class="input-group-btn">
     <div class="input-group-btn">
      <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>

     </div><!-- /btn-group -->
    </div>
   </div>
  </div>

  <div id="<?php echo 'gb-questionnaire-' . $goalQuestionnaireParent->id; ?>">
   <?php
   if ($goalQuestionParentListCount == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
     not yet answered.
    </h5>
   <?php endif; ?>

   <?php
   $questionnaireAnswerCounter = 1;
   foreach ($goalQuestionParentList as $goalQuestionParent):
    ?>
    <?php
    $this->renderPartial('goal.views.goal.activity.question._goal_question_parent_list_item', array(
      'goalQuestionParent' => $goalQuestionParent,
      "questionnaireAnswerCounter" => $questionnaireAnswerCounter++
    ));
    ?>
   <?php endforeach; ?>
  </div>
 </div>
</div>

