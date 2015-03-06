<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row gb-post-entry gb-post-entry-row gb-post-entry-row-lg"
     data-gb-source-pk="<?php echo $timeline->id; ?>"
     data-gb-source="<?php //echo Type::$SOURCE_TIMELINE;  ?>"
     data-gb-del-message-key="TIMELINE">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $timelineCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $timeline->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $timeline->creator_id)); ?>">
        <?php echo $timeline->creator->profile->firstname . " " . $timeline->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($timeline->created_date), 'M jS \a\t g:ia'); ?></i></span>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li>
         <a class="gb-edit-form-show"
            data-gb-target="" >
          <i class="glyphicon glyphicon-edit"></i> edit
         </a>
        </li>
        <li>
         <a class="gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
          <i class="glyphicon glyphicon-trash"></i> delete
         </a>
        </li>
       </ul>
      </div>
     </h5>
     <div class="row gb-panel-form gb-hide">
      <div class="row">
       <?php
       $this->renderPartial('timeline.views.timeline.forms._timeline_form_edit', array(
         "formId" => "gb-timeline-form-edit-" . $timeline->id,
         "timelineModel" => $timeline,
       ));
       ?>
      </div>
     </div>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <p>
        <span class="gb-display-attribute" data-gb-control-target="#gb-timeline-form-description-input">
         <?php echo $timeline->description; ?></span>
       </p>
      </div>
     </div>
    </div>
    <div class="row">
     <?php
     $this->renderPartial('timeline.views.timeline.forms._timeline_child_form', array(
       "formId" => "gb-timeline-form-" . $timeline->id,
       "actionUrl" => Yii::app()->createUrl("timeline/timeline/addTimelineReply", array()),
       "prependTo" => "#gb-skill-timelines-reply-" . $timeline->id,
       "timelineModel" => new Timeline(),
       "parentValue" => $timeline->id,
       "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
     ));
     ?>
    </div>
   </div>
   <div id="<?php echo "gb-skill-timelines-reply-" . $timeline->id; ?>" class="row">
    <?php
    $timelineChildren = Timeline::getChildrenTimelines($timeline->id);
    $timelineChildCounter = 1;
    ?>
    <?php foreach ($timelineChildren as $timelineChild): ?>
     <?php
     $this->renderPartial('timeline.views.timeline.activity._timeline_child', array(
       "timelineChild" => $timelineChild,
       "timelineChildCounter" => $timelineChildCounter++)
     );
     ?>
    <?php endforeach; ?>
   </div>
  </div>
 </div>
</div>