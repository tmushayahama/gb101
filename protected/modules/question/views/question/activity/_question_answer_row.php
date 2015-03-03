<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-question-answer-row">
 <div class="gb-body row">
  <div class="col-lg-11 col-sm-11 col-xs-11">
   <!-- <img src="<?php //echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $userQuestionAnswer->user->profile->avatar_url;              ?>" alt=""> -->
   <p class="gb-title"><?php echo $userQuestionAnswer->question->description; ?></p>
   <p class="gb-description"><?php echo $userQuestionAnswer->questionAnswerChoice->answer; ?></p>
   <p class="gb-description"><?php echo $userQuestionAnswer->description; ?></p>
  </div>
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
 </div>
 <div class="gb-footer row">
  <div class="col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-10 col-sm-12 col-xs-12">
    <p><i><?php echo date_format(date_create($userQuestionAnswer->created_date), 'M jS \a\t g:ia'); ?></i></p>
   </div>
   <a class="btn btn-link col-lg-2 col-sm-2 col-xs-6">
    0
   </a>
  </div>
 </div>
</div>

