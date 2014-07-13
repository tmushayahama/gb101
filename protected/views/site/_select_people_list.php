<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach ($people as $person): ?>
  <div class="gb-person-badge" person-id="<?php echo $person->user_id; ?>">
    <div class="row ">
      <div class="col-lg-2 col-sm-2 col-xs-2">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
      </div>
      <div class="panel panel-default col-lg-10 col-sm-10 col-xs-10 gb-advice-top-border gb-no-padding">
        <div class='panel-heading'>
          <h5 class="gb-person-name">
            <?php echo $person->firstname . " " . $person->lastname; ?>
          </h5>
        </div>
        <div class="panel-body"> 
          <div class="row">
            <div class="btn-group pull-right">
              <?php $requestStatus = Notification::getRequestStatus($types, $sourceId, $person->user_id); ?>
              <?php if ($requestStatus == null): ?>
                <a class="gb-select-person-btn btn btn-xs btn-info" 
                   gb-type="<?php echo $modalType ?>" 
                   gb-selected=0>Select
                </a>
              <?php else: ?>
                <?php if ($requestStatus->status == Notification::$STATUS_PENDING): ?>
                  <h6 class="text-warning pull-left gb-padding-medium" 
                      gb-type="<?php echo $modalType ?>" >Pending Request
                  </h6>
                  <a class="gb-cancel-request-btn btn btn-link" 
                     gb-type="<?php echo $modalType ?>" 
                     gb-selected=0><i class="glyphicon glyphicon-trash"></i>
                  </a>
                <?php elseif ($requestStatus->status == Notification::$STATUS_ACCEPTED): ?>
                  <h6 class="text-success" 
                      gb-type="<?php echo $modalType ?>" >Enrolled
                  </h6>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

