<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($adviceDiscussionsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no discussions
 </h5>
<?php endif; ?>

<?php
$discussionCounter = 1;
foreach ($adviceDiscussions as $adviceDiscussion):
 ?>
 <?php
 $this->renderPartial('discussion.views.discussion.activity._discussion_parent', array(
   "discussion" => $adviceDiscussion->discussion,
   "discussionCounter" => $discussionCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Discussion::$DISCUSSIONS_PER_PAGE;
if ($offset < $adviceDiscussionsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE_DISCUSSION; ?>"
    data-gb-source-pk="<?php echo $adviceId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advice-discussions">
  More Discussions
 </a>
<?php endif; ?>

