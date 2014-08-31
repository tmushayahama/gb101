<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
  <div id="gb-profile-header" class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2 gb-people-heading-row">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $project->creator->profile->avatar_url; ?>" class="gb-profile-img" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 gb-no-padding">
      <div class="row">
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="caption text-center">
              <h3 class="gb-title">Advice Pages</h3>
              <h1 class="gb-number text-success"><?php //echo Page::getPagesCount($advicePage->page->owner_id); ?></h1>
              <a class="gb-disabled-1 btn btn-default">Request Advice</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
