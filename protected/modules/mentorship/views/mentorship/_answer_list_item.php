<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-post-entry-row" 
     data-gb-source-pk="<?php echo $answer->id; ?>" data-gb-source="<?php echo Type::$SOURCE_ANSWER; ?>">
  <div class="col-lg-2 col-sm-2 col-xs-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $answer->questionee->profile->avatar_url; ?>" class="gb-img-md pull-right img-polariod" alt="">
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding gb-discussion-title-side-border">
    <div class="panel-body">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <p>
          <strong class="gb-display-attribute" gb-control-target="#gb-answer-question-form-title"><?php echo $answer->skill->title; ?> </strong> 
          <span class="gb-display-attribute" gb-control-target="#gb-answer-question-form-description"><?php echo $answer->mentorship_answer; ?></span>
        </p>
      </div>
    </div>
    <div class="panel-footer gb-no-padding"> 
      <div class="row">
        <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $answer->questionee_id)); ?>"><i><?php echo $answer->questionee->profile->firstname . " " . $answer->questionee->profile->lastname ?></i></a></div>
        <?php if ($answer->mentorship->creator_id == Yii::app()->user->id): ?>
          <div class="btn-group pull-right">
            <a class="gb-edit-form-show btn btn-sm btn-link"
               data-gb-target="#gb-answer-question-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


