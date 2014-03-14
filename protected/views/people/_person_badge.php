<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-person-badge" person-id="<?php echo $person->user_id; ?>">
  <div class="row-fluid">
    <div class="span4">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="span8">
      <div class="row-fluid gb-description">
        <h4><a><?php echo $person->firstname . " " . $person->lastname; ?></a></h4>
      </div>
      <div class="row-fluid gb-footer ">
        <?php if (!Yii::app()->user->isGuest): ?>
          <button class="gb-accept-enrollment-request-btn gb-btn gb-btn-blue-2">Connect</button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
