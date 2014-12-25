<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-promise-gained" promise-id="<?php echo $promiseContributor->promise_id; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promiseContributor->contributor->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-promise-gained-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <h5><a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $promiseContributor->contributor_id)); ?>"><?php echo $promiseContributor->contributor->profile->firstname . " " . $promiseContributor->contributor->profile->lastname ?></a></h5>
        Contributor
      </div> 
      <div class="panel-body row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          
        </div>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-left">
          </div>
          <div class="pull-right">
            <a class="btn btn-link gb-edit-form-show" data-gb-target="#gb-promise-form"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>