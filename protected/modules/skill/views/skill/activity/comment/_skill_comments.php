<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($skillCommentsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no comments
 </h5>
<?php endif; ?>

<?php
$commentCounter = 1;
$lastCommentId;
foreach ($skillComments as $skillComment):
 ?>
 <?php
 $this->renderPartial('comment.views.comment.activity._comment_parent', array(
   "comment" => $skillComment->comment,
   "commentCounter" => $commentCounter++,
 ));
 $lastCommentId = $skillComment->id;
 ?>
<?php endforeach; ?>

<?php
if ($skillCommentsCount > Comment::$COMMENTS_PER_PAGE):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_SKILL_COMMENT; ?>"
    data-gb-source-pk="<?php echo $skillId; ?>"
    data-gb-last-id="<?php echo $lastCommentId; ?>"
    data-gb-parent="#gb-skill-comments"
    data-gb-order="desc">
  More Comments
 </a>
<?php endif; ?>

