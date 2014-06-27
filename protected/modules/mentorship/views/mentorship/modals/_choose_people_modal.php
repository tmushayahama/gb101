<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-choose-people-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-mentorship-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        <div class="gb-choose-people"></div>
      </div>
      <div class="modal-body modal-body-scroll gb-padding-thin">
        <?php foreach ($people as $person): ?>
          <div class="gb-person-badge" person-id="<?php echo $person->user_id; ?>">
            <div class="row ">
              <div class="col-lg-3 col-sm-3 col-xs-2">
                <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
              </div>
              <div class="panel panel-default col-lg-9 col-sm-9 col-xs-10 gb-advice-top-border gb-no-padding">
                <div class='panel-heading'>
                  <h5 class="gb-person-name">
                    <?php echo $person->firstname . " " . $person->lastname; ?>
                  </h5>
                </div>
                <div class="panel-body"> 
                  <a class="col-lg-4 col-md-4 col-sm-4 col-xs-2 gb-padding-thin">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_5.png" alt="">
                      <div class="text-center caption">
                        <h6 class="">Skill List</h6>
                        <h2 class="">0</h2>
                      </div>
                    </div>
                  </a>
                  <a class="col-lg-4 col-md-4 col-sm-4 col-xs-2 gb-padding-thin">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
                      <div class="text-center caption">
                        <h6 class="">Mentorships</h6>
                        <h2 class="">0</h2>
                      </div>
                    </div>
                  </a>
                  <a class="col-lg-4 col-md-4 col-sm-4 col-xs-2 gb-padding-thin">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_5.png" alt="">
                      <div class="text-center caption">
                        <h6 class="">Advice Pages</h6>
                        <h2 class="">0</h2>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="panel-footer">
                  <div class="row">
                    <div class="btn-group pull-right">
                      <a class="gb-select-person-btn btn btn-info">Select</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

