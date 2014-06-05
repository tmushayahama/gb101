<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h5 class=""><a href="<?php echo Yii::app()->createUrl('skill/skill/skillBankDetail', array('skillId' => $subgoal->subgoal_list_id)); ?>">
        <?php echo $subgoal->subgoalList->goal->title; ?>
      </a>
    </h5>
  </div>
  <div class="panel-body">
    <p> <?php echo $subgoal->subgoalList->goal->description; ?></p>
  </div>
  <div class="panel-footer gb-no-padding">
    <div class="row">
      <a class="btn btn-link">Agree: <div class="">0</div></a>
      <a class="btn btn-link">Disagree: <div class="">0</div></a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('skill/skill/skillDetail', array('skillId' => $subgoal->subgoal_list_id)); ?>"><i class="glyphicon glyphicon-arrow-right"></i></a>
      </div>
    </div> 
  </div>
</div>

