<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-block gb-block-row gb-question-list-item row gb-discussion-title-side-border" promise-question-id="<?php echo $promiseQuestionChild->id; ?>"
     data-gb-source-pk="<?php echo $promiseQuestionChild->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 ">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promiseQuestionChild->question->creator->profile->avatar_url; ?>" class="gb-child-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12  gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-child-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $promiseQuestionChild->question->creator_id)); ?>">
            <?php echo $promiseQuestionChild->question->creator->profile->firstname . " " . $promiseQuestionChild->question->creator->profile->lastname ?>
          </a>
        </span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-promise-question-form-title-input"><?php echo $promiseQuestionChild->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-promise-question-form-description-input"><?php echo $promiseQuestionChild->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-right">
        <?php if ($promiseQuestionChild->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-xs btn-link"
             data-gb-target="#gb-promise-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-xs btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
      </div> 
    </div>
  </div>
</div> 