<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-post-entry-row gb-parent-box row" promise-question-id="<?php echo $promiseQuestionParent->id; ?>"
     data-gb-source-pk="<?php echo $promiseQuestionParent->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-promise-question-form-title-input"><?php echo $promiseQuestionParent->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-promise-question-form-description-input"><?php echo $promiseQuestionParent->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left gb-disabled-1">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo question::$STATUS_QUESTIONNAIRE; ?>"
           gb-form-status-id-input="#gb-promise-question-form-status-input"
           data-gb-target="#gb-promise-question-form"
           data-gb-target-container="<?php echo '#gb-promise-questionnaire-child-form-container-' . $promiseQuestionParent->id; ?>"
           gb-form-parent-id-input="#gb-promise-question-form-parent-question-id-input"
           gb-form-heading="Add Promise question"
           gb-form-parent-id="<?php echo $promiseQuestionParent->question_id; ?>">
          Comment
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($promiseQuestionParent->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             data-gb-target="#gb-promise-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-promise-questionnaire-child-form-container-' . $promiseQuestionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-children" class="row gb-hide">
      <?php
      $promiseQuestionChildren = Promisequestion::getPromiseChildrenquestions($promiseQuestionParent->question_id);
      ?>

      <?php foreach ($promiseQuestionChildren as $promiseQuestionChild): ?>
        <?php
        $this->renderPartial('promise.views.promise.activity.question._promise_questionnaire_child_list_item', array(
         "promiseQuestionChild" => $promiseQuestionChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

