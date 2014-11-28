<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry-row gb-post-entry-row-lg" skill-question-id="<?php echo $skillQuestionParent->id; ?>"
     data-gb-source-pk="<?php echo $skillQuestionParent->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h5 class=""><?php echo $questionnaireAnswerCounter; ?></h5>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillQuestionParent->question->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <div class="row gb-panel-form gb-hide">
     </div>
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillQuestionParent->question->creator_id)); ?>">
        <?php echo $skillQuestionParent->question->creator->profile->firstname . " " . $skillQuestionParent->question->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($skillQuestionParent->question->created_date), 'M jS \a\t g:ia'); ?></i></span>
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
       <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-form-title-input"><?php echo $skillQuestionParent->question->title; ?> </strong>
        <span class="gb-display-attribute" gb-control-target="#gb-skill-question-form-description-input"><?php echo $skillQuestionParent->question->description; ?></span>
       </p>
      </div>
     </div>
    </div>
    <div>
     <?php
     $skillQuestionChildren = Skillquestion::getSkillChildrenquestions($skillQuestionParent->question_id);
     ?>

     <?php foreach ($skillQuestionChildren as $skillQuestionChild): ?>
         <?php
         $this->renderPartial('skill.views.skill.activity._skill_question_child_list_item', array(
           "skillQuestionChild" => $skillQuestionChild)
         );
         ?>
     <?php endforeach; ?>
    </div>
   </div>
  </div>
 </div>
</div>