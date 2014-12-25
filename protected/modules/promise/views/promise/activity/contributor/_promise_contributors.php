<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($promiseContributorsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no contributors
 </h5>
<?php endif; ?>

<?php
$contributorCounter = 1;
foreach ($promiseContributors as $promiseContributor):
 ?>
 <?php
 $this->renderPartial('contributor.views.contributor.activity._contributor_parent', array(
   "contributor" => $promiseContributor->contributor,
   "contributorCounter" => $contributorCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Contributor::$CONTRIBUTORS_PER_PAGE;
if ($offset < $promiseContributorsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_PROMISE_CONTRIBUTOR; ?>"
    data-gb-source-pk="<?php echo $promiseId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-promise-contributors">
  More Contributors
 </a>
<?php endif; ?>

