<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-commitment-post">
  <div class="row ">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-10 col-sm-10 col-xs-10 gb-advice-top-border gb-no-padding">
      <div class='panel-heading'>
        <h5><a>Advice Page</a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $advicePage->page->owner_id)); ?>"><?php echo $advicePage->page->owner->profile->firstname . " " . $advicePage->page->owner->profile->lastname ?></a></h5>
      </div>
      <div class="panel-body skill-commitment-title">
        <p><a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>">
            <?php echo $advicePage->subgoals . " " . $advicePage->level->level_name . " " . $advicePage->page->title; ?>
          </a> <br>
          <?php echo $advicePage->page->description ?>
        </p>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-right hidden-xs">
            <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>