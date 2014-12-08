<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry-row gb-post-entry-row-weblink"
     data-gb-source-pk="<?php echo $weblink->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_WEBLINK; ?>"
     data-gb-del-message-key="WEBLINK">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $weblinkCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h5 class="gb-heading row">
      <a href="<?php echo $weblink->link; ?>"
         target="blank"
         class="col-lg-11 col-sm-11 col-xs-11">
       <p class="gb-ellipsis gb-display-attribute"
          data-gb-control-target="#gb-weblink-form-description-input">
           <?php echo $weblink->link; ?>
       </p>
      </a>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li>
         <a class="gb-edit-form-show">
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
     <div class="row gb-panel-form gb-form-middleman gb-hide gb-padding-left-2"
          data-data-gb-target="#gb-weblink-form">
      <textarea data-gb-control-target="#gb-weblink-form-description-input" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2">
      </textarea>
      <div class="row">
       <div class="pull-right btn-group">
        <a class="btn btn-default gb-edit-form-hide">Cancel</a>
        <a class="gb-form-middleman-edit-submit btn btn-primary">Edit</a>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="gb-more-info gb-padding-left-3">
    <div class="col-lg-6 col-sm-6 col-xs-12 gb-padding-thinner">
     <h5 class="gb-heading-2">
      Link By
     </h5>
     <?php
     $this->renderPartial('user.views.user.badges._user_badge_with_time', array(
       "person" => $weblink->creator,
       "personDate" => $weblink->created_date,
       "personCounter" => 1)
     );
     ?>
     <br>
     <p class="gb-description">
      <?php echo $weblink->description; ?>
     </p>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-12 gb-padding-thinner">
     <a class="gb-link-thumbnail col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/previews/no_preview.png" ?>" class="img-polariod" alt="">
     </a>

    </div>
   </div>
   <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding"
        gb-is-child-form="1"
        data-gb-target="#gb-weblink-form"
        gb-form-parent-id-input="#gb-weblink-form-parent-id-input"
        gb-form-parent-id="<?php echo $weblink->id; ?>"
        data-gb-url="<?php echo Yii::app()->createUrl("weblink/weblink/addWeblinkReply", array()); ?>"
        data-gb-prepend-to="<?php echo "#gb-skill-weblinks-reply-" . $weblink->id; ?>"
        gb-form-description-input="#gb-weblink-form-description-input">
    <textarea class="form-control"
              placeholder="Add a To-do"
              rows="1"></textarea>
    <div class="input-group-btn">
     <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>
    </div><!-- /btn-group -->
   </div>
   <div id="<?php echo "gb-skill-weblinks-reply-" . $weblink->id; ?>" class="row">
    <?php
    $weblinkChildren = Weblink::getChildrenWeblinks($weblink->id);
    $weblinkChildCounter = 1;
    ?>
    <?php foreach ($weblinkChildren as $weblinkChild): ?>
     <?php
     $this->renderPartial('weblink.views.weblink.activity._weblink_child', array(
       "weblinkChild" => $weblinkChild,
       "weblinkChildCounter" => $weblinkChildCounter++)
     );
     ?>
    <?php endforeach; ?>
   </div>
  </div>
 </div>
</div>