<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-post-entry-row gb-commitment-post"
      data-gb-source-pk="<?php echo $advicePage->id; ?>" data-gb-source="<?php echo Type::$SOURCE_PAGE; ?>">
  <div class="row ">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$advicePage->page->creator->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-10 col-md-10 col-sm-10 col-xs-12 gb-advice-top-border gb-no-padding">
      <div class='panel-heading'>
        <h5><a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome", array()); ?>">Advice Page</a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $advicePage->page->creator_id)); ?>"><?php echo $advicePage->page->creator->profile->firstname . " " . $advicePage->page->creator->profile->lastname ?></a></h5>
      </div>
      <div class="panel-body ">
        <p><a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>">
            <?php echo $advicePage->skills . " " . $advicePage->level->name . " " . $advicePage->page->title; ?>
          </a> <br>
          <?php echo $advicePage->page->description ?>
        </p>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-right">
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>