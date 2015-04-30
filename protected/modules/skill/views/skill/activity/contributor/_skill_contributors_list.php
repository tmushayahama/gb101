<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($skillContributorsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no contributors
 </h5>
<?php endif; ?>

<?php
$contributorCounter = 1;
foreach ($skillContributors as $skillContributor):
 ?>
 <?php
 $this->renderPartial('contributor.views.contributor.activity._contributor_parent', array(
   "contributor" => $skillContributor->contributor,
   "contributorCounter" => $contributorCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Contributor::$CONTRIBUTORS_PER_PAGE;
if ($offset < $skillContributorsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_SKILL_CONTRIBUTOR; ?>"
    data-gb-source-pk="<?php echo $skillId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-skill-contributors">
  More Contributors
 </a>
<?php endif; ?>

