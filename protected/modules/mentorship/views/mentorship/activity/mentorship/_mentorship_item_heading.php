<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
 <div class="col-lg-5 col-sm-5 col-xs-11 gb-no-padding">
  <div class="row">
   <div class="col-lg-2 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentor->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-left" alt="">
   </div>
   <div class="col-lg-10 gb-no-padding">
    <p class="gb-ellipsis">
     <strong>Mentor</strong>
    </p>
    <p class="gb-ellipsis">
     <?php echo $mentorship->mentor->profile->firstname . " " . $mentorship->mentor->profile->lastname; ?>
    </p>
   </div>
  </div>
 </div>
 <div class="col-lg-5 col-sm-5 col-xs-11 gb-no-padding">
  <div class="row">
   <div class="col-lg-2 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentee->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-left" alt="">
   </div>
   <div class="col-lg-10 gb-no-padding">
    <p class="gb-ellipsis">
     <strong>Mentor</strong>
    </p>
    <p class="gb-ellipsis">
     <?php echo $mentorship->mentee->profile->firstname . " " . $mentorship->mentee->profile->lastname; ?>
    </p>
   </div>
  </div>
 </div>
 <div class="btn-group pull-right">
  <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
   <i class="glyphicon glyphicon-chevron-down"></i>
  </button>
  <ul class="dropdown-menu" role="menu">
   <li><a class="gb-edit-form-show" data-gb-target="#gb-mentorship-form">edit</a></li>
   <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
  </ul>
 </div>
</div>
