<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="gb-heading-img" alt="">
    CONTRIBUTORS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a class="gb-request-notification-viewer gb-populate"
       data-gb-target="#gb-notification-viewer-body"
       data-gb-type="gb-modal"
       data-gb-target-heading="#gb-notification-viewer-heading"
       data-gb-heading-text="Pending advice judge request(s)"
       data-gb-source="<?php echo Notification::$TYPE_CONTRIBUTOR; ?>"
       data-gb-source-pk="<?php echo $adviceId; ?>">
     0 Pending Requests
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="pull-right gb-form-show gb-prepopulate-selected-people-list"
      data-gb-selection-type="multiple"
      data-gb-target-container="#gb-contributor-form-container"
      data-gb-target="#gb-contributor-form"
      data-gb-list-target="#gb-contributor-form-people-list"
      data-gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
      data-gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
      data-gb-source-pk="<?php echo $adviceId; ?>"
      data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-advice-item-contributor-panel" class="row">
   <?php
   $this->renderPartial('advice.views.advice.activity.contributor._advice_contributors_section', array(
     "contributorModel" => new Contributor(),
     "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
     "adviceContributors" => $advice->getAdviceParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
     "adviceContributorsCount" => $advice->getAdviceParentContributorsCount(),
     "adviceId" => $adviceId
   ));
   ?>
  </div>
 </div>
</div>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div  class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/discussion_1.png"; ?>" class="gb-heading-img" alt="">
    DISCUSSIONS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $adviceDiscussionsCount . " todos"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-discussion-form-container"
      data-gb-target="#gb-discussion-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-advice-item-discussion-panel" class="row">
   <?php
   $this->renderPartial('advice.views.advice.activity.discussion._advice_discussions_section', array(
     "discussionModel" => new Discussion(),
     'adviceDiscussions' => $advice->getAdviceParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
     'adviceDiscussionsCount' => $advice->getAdviceParentDiscussionsCount(),
     'adviceId' => $adviceId
   ))
   ?>
  </div>
 </div>
</div>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div  class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="gb-heading-img" alt="">
    COMMENTS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $adviceCommentsCount . " todos"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-comment-form-container"
      data-gb-target="#gb-comment-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-advice-item-comment-panel" class="row">
   <?php
   $this->renderPartial('advice.views.advice.activity.comment._advice_comments_section', array(
     "commentModel" => new Comment(),
     'adviceComments' => $advice->getAdviceParentComments(Comment::$COMMENTS_PER_PAGE),
     'adviceCommentsCount' => $advice->getAdviceParentCommentsCount(),
     'adviceId' => $adviceId
   ));
   ?>
  </div>
 </div>
</div>
