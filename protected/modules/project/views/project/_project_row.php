<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row gb-commitment-post"
      data-gb-source-pk="<?php echo $project->id; ?>" data-gb-source="<?php echo Type::$SOURCE_PROJECT; ?>">
  <div class="row ">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$project->creator->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-10 col-md-10 col-sm-10 col-xs-12 gb-project-side-border gb-no-padding">
      <div class='panel-heading'>
        <h5><a href="<?php echo Yii::app()->createUrl("project/project/projecthome", array()); ?>">Project</a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $project->creator_id)); ?>"><?php echo $project->creator->profile->firstname . " " . $project->creator->profile->lastname ?></a></h5>
      </div>
      <div class="panel-body ">
        <p><a href="<?php echo Yii::app()->createUrl('project/project/projectManagement', array('projectId' => $project->id)); ?>">
            <?php echo $project->name; ?>
          </a> <br>
          <?php echo $project->description; ?>
        </p>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-right">
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('project/project/projectManagement', array('projectId' => $project->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>