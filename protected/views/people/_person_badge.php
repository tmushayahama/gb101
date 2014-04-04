<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-person-badge" person-id="<?php echo $person->user_id; ?>">
  <div class="row ">
    <div class="col-lg-3 col-sm-3 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-9 col-sm-9 col-xs-10 gb-advice-top-border gb-no-padding">
      <div class='panel-heading'><h4><a><?php echo $person->firstname . " " . $person->lastname; ?></a></h4></div>
      <div class="panel-body skill-commitment-title">   
      </div>
      <div class="panel-footer">
        <?php if (!Yii::app()->user->isGuest): ?>
          <button class="gb-accept-enrollment-request-btn gb-btn gb-btn-blue-2">Connect</button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
