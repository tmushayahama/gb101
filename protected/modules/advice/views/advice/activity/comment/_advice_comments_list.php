<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($adviceCommentsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no comments
 </h5>
<?php endif; ?>

<?php
$commentCounter = 1;
foreach ($adviceComments as $adviceComment):
 ?>
 <?php
 $this->renderPartial('comment.views.comment.activity._comment_parent', array(
   "comment" => $adviceComment->comment,
   "commentCounter" => $commentCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Comment::$COMMENTS_PER_PAGE;
if ($offset < $adviceCommentsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE_COMMENT; ?>"
    data-gb-source-pk="<?php echo $adviceId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advice-comments">
  More Comments
 </a>
<?php endif; ?>

