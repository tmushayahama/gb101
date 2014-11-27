<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry-row gb-post-entry-row-lg" skill-comment-id="<?php echo $skillComment->id; ?>"
     gb-source-pk-id="<?php echo $skillComment->comment_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h5 class=""><?php echo $commentCounter; ?></h5>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillComment->comment->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <div class="row gb-panel-form gb-hide">
     </div>
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillComment->comment->creator_id)); ?>">
        <?php echo $skillComment->comment->creator->profile->firstname . " " . $skillComment->comment->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($skillComment->comment->created_date), 'M jS \a\t g:ia'); ?></i></span>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li><a class="gb-edit-form-show" gb-form-target="#gb-skill-form">edit</a></li>
        <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
       </ul>
      </div>
     </h5>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <p>
        <span class="gb-display-attribute" gb-control-target="#gb-skill-comment-form-description-input"><?php echo $skillComment->comment->description; ?></span>
       </p>
      </div>
     </div>
    </div>
    <div>
     <?php
     $skillCommentChildren = Skillcomment::getSkillChildrencomments($skillComment->comment_id);
     ?>
     <?php foreach ($skillCommentChildren as $skillCommentChild): ?>
      <?php
      $this->renderPartial('skill.views.skill.activity._skill_comment_child_list_item', array(
        "skillCommentChild" => $skillCommentChild)
      );
      ?>
     <?php endforeach; ?>
    </div>
   </div>
  </div>
 </div>
</div>