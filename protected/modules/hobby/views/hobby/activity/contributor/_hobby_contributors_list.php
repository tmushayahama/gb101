<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($hobbyContributorsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no contributors
 </h5>
<?php endif; ?>

<?php
$contributorCounter = 1;
foreach ($hobbyContributors as $hobbyContributor):
 ?>
 <?php
 $this->renderPartial('contributor.views.contributor.activity._contributor_parent', array(
   "contributor" => $hobbyContributor->contributor,
   "contributorCounter" => $contributorCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Contributor::$CONTRIBUTORS_PER_PAGE;
if ($offset < $hobbyContributorsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_HOBBY_CONTRIBUTOR; ?>"
    data-gb-source-pk="<?php echo $hobbyId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-hobby-contributors">
  More Contributors
 </a>
<?php endif; ?>

