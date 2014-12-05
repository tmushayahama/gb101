<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$collapseId = 'gb-skill-collapse-' . $skill->id;
?>
<div class="panel gb-no-margin">
 <div class="row" role="tab">
  <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
     data-toggle="collapse"
     gb-data-toggle='gb-expandable-tab'
     data-parent="#gb-skills-nav" href="<?php echo '#' . $collapseId; ?>"
     aria-expanded="false" aria-controls="<?php echo $collapseId; ?>"
     gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skill", array('skillId' => $skill->id)); ?>">
   <div class="col-lg-11 gb-padding-left-1 text-left">
    <p class="gb-ellipsis gb-title"><?php echo $skill->title; ?></p>
    <p class="gb-ellipsis gb-description">
     <?php
     if ($skill->description) {
      echo $skill->description;
     } else {
      echo "<i>no description</i>";
     }
     ?></p>
   </div>
   <i class="glyphicon glyphicon-chevron-right pull-right"></i>
  </a>
 </div>
 <div id="<?php echo $collapseId; ?>" class="row panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
 </div>
</div>