<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($mentorshipWeblinksCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no weblinks
 </h5>
<?php endif; ?>

<?php
$weblinkCounter = 1;
foreach ($mentorshipWeblinks as $mentorshipWeblink):
 ?>
 <?php
 $this->renderPartial('weblink.views.weblink.activity._weblink_parent', array(
   "weblink" => $mentorshipWeblink->weblink,
   "weblinkCounter" => $weblinkCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Weblink::$WEBLINKS_PER_PAGE;
if ($offset < $mentorshipWeblinksCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_MENTORSHIP_WEBLINK; ?>"
    data-gb-source-pk="<?php echo $mentorshipId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-mentorship-weblinks">
  More Weblinks
 </a>
<?php endif; ?>

