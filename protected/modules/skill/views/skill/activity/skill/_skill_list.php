<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if ($skillsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no skills added
 </h5>
<?php endif; ?>

<?php
$skillCounter = 1;

foreach ($skills as $skill):
 ?>
 <?php
 $this->renderPartial('skill.views.skill.activity.skill._skill_item', array(
   "skill" => $skill,
   "count" => $skillCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Skill::$SKILLS_PER_PAGE;
if ($offset < $skillsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
    data-gb-source-pk="<?php //echo $levelId;  ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-skills">
  More Notes
 </a>
<?php endif; ?>



