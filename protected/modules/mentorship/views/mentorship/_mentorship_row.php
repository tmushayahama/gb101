<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$url = Yii::app()->createUrl('mentorship/mentorship/mentorshipManagement', array('mentorshipId' => $mentorship->id));

$pendingRequest = Notification::getPendingRequest(
    array(Type::$SOURCE_MENTOR_REQUESTS, Type::$SOURCE_MENTEE_REQUESTS), $mentorship->id)
?>
<div class="gb-post-entry-row panel panel-default row" mentorship-id="<?php echo $mentorship->id; ?>"
     data-gb-source-pk="<?php echo $mentorship->id; ?>" data-gb-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>">

  <div class="gb-bluish-box row">
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
      <h5 class="gb-parent-box-heading">
        <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array()); ?>">Mentorship</a> - 
        <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->creator_id)); ?>">
          <?php echo $mentorship->creator->profile->firstname . " " . $mentorship->creator->profile->lastname ?>
        </a>

        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" data-gb-target="#gb-skill-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </h5>
      <div class="panel-body ">
        <p>
          <a class="mentorship-title" href="<?php echo $url; ?>"><?php echo $mentorship->title; ?></a>   
          <?php echo $mentorship->description ?>
        </p>
      </div>
    </div>
  </div>
  <div class="panel-footer row gb-panel-display gb-no-padding">
    <div class="row">
      <a href="<?php echo $url; ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-open"></i> Open</a>
      <a class="gb-disabled-1 gb-skill-contribute-request-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i> Participate</a>
      <a class="gb-disabled-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm  btn-default"><i class="glyphicon glyphicon-share-alt"></i> Share</a>
    </div>
    <div id="gb-skill-contributor-request-form-container" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>