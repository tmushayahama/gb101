<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($hobbyCommentsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no comments
 </h5>
<?php endif; ?>

<?php
$commentCounter = 1;
foreach ($hobbyComments as $hobbyComment):
 ?>
 <?php
 $this->renderPartial('comment.views.comment.activity._comment_parent', array(
   "comment" => $hobbyComment->comment,
   "commentCounter" => $commentCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Comment::$COMMENTS_PER_PAGE;
if ($offset < $hobbyCommentsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_HOBBY_COMMENT; ?>"
    data-gb-source-pk="<?php echo $hobbyId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-hobby-comments">
  More Comments
 </a>
<?php endif; ?>

