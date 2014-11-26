<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-questionnaire gb-questionnaire-lg row" skill-question-id="<?php echo $skillQuestionnaireParent->id; ?>">
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-super-parent-box-heading row">
        <div class="col-lg-10 col-sm-10 col-xs-10 gb-no-padding">
          <p class="col-lg-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">
            <?php echo $skillQuestionnaireParent->description; ?>
          </p>
        </div>
      </h5>
      <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
           gb-is-child-form="1"
           gb-form-target="#gb-question-form"
           gb-form-parent-id-input="#gb-question-form-parent-question-id-input"
           gb-form-parent-id="<?php echo $skillQuestionnaireParent->id; ?>"
           gb-add-url="<?php echo Yii::app()->createUrl("skill/skill/addSkillQuestion", array("skillId" => $skill->id)); ?>"
           gb-submit-prepend-to="<?php echo '#gb-questionnaire-' . $skillQuestionnaireParent->id; ?>"         
           gb-form-description-input="#gb-question-form-description-input">
        <textarea class="form-control"
                  placeholder="<?php echo $skillQuestionnaireParent->description; ?>"
                  rows="1"></textarea>
        <div class="input-group-btn">
          <div class="input-group-btn">
            <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>
            
          </div><!-- /btn-group -->
        </div>
      </div>
    </div>

    <div id="<?php echo 'gb-questionnaire-' . $skillQuestionnaireParent->id; ?>">
      <?php
      $skillQuestionParentList = SkillQuestion::getSkillChildrenQuestions($skillQuestionnaireParent->id, $skill->id);
      if (count($skillQuestionParentList) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no questions added.
        </h5>
      <?php endif; ?>

      <?php
      $questionnaireAnswerCount = 0;
      foreach ($skillQuestionParentList as $skillQuestionParent):
        ?>
        <?php
        $this->renderPartial('skill.views.skill.activity.question._skill_question_parent_list_item', array(
         'skillQuestionParent' => $skillQuestionParent,
        ));
        ?>
      <?php endforeach; ?>
    </div>
  </div> 
</div>

