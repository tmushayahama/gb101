<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-block gb-block-row gb-block-row-lg" mentorship-question-id="<?php echo $mentorshipQuestionParent->id; ?>"
     data-gb-source-pk="<?php echo $mentorshipQuestionParent->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h5 class=""><?php echo $questionnaireAnswerCounter; ?></h5>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 ">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 ">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipQuestionParent->question->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12  gb-no-margin">
    <div class="row">
     <div class="row gb-panel-form gb-hide">
     </div>
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipQuestionParent->question->creator_id)); ?>">
        <?php echo $mentorshipQuestionParent->question->creator->profile->firstname . " " . $mentorshipQuestionParent->question->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($mentorshipQuestionParent->question->created_date), 'M jS \a\t g:ia'); ?></i></span>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li><a class="gb-edit-form-show" data-gb-target="#gb-mentorship-form">edit</a></li>
        <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
       </ul>
      </div>
     </h5>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-question-form-title-input"><?php echo $mentorshipQuestionParent->question->title; ?> </strong>
        <span class="gb-display-attribute" gb-control-target="#gb-mentorship-question-form-description-input"><?php echo $mentorshipQuestionParent->question->description; ?></span>
       </p>
      </div>
     </div>
    </div>
    <div>
     <?php
     $mentorshipQuestionChildren = Mentorshipquestion::getMentorshipChildrenquestions($mentorshipQuestionParent->question_id);
     ?>

     <?php foreach ($mentorshipQuestionChildren as $mentorshipQuestionChild): ?>
         <?php
         $this->renderPartial('mentorship.views.mentorship.activity._mentorship_question_child_list_item', array(
           "mentorshipQuestionChild" => $mentorshipQuestionChild)
         );
         ?>
     <?php endforeach; ?>
    </div>
   </div>
  </div>
 </div>
</div>