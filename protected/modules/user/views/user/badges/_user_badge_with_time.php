<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-user-badge gb-user-badge-sm"
     data-gb-source-pk="<?php echo $person->profile->user_id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PERSON; ?>"
     data-gb-del-message-key="PERSON">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $personCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h6 class="gb-heading">
      <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $person->profile->user_id)); ?>">
       <p class="gb-ellipsis">
        <?php echo $person->profile->firstname . " " . $person->profile->lastname ?>
       </p>
      </a>
     </h6>
     <div class="row gb-body">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <i><?php echo date_format(date_create($personDate), 'M jS \a\t g:ia'); ?></i>
       <span class="btn-group pull-right">
        <a class="gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
         <i class="glyphicon glyphicon-trash"></i>
        </a>
       </span>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
