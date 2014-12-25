<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if ($hobbiesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no hobbies added
 </h5>
<?php endif; ?>

<?php
$hobbyCounter = 1;

foreach ($hobbies as $hobby):
 ?>
 <?php
 $this->renderPartial('hobby.views.hobby.activity.hobby._hobby_item', array(
   "hobby" => $hobby,
   "count" => $hobbyCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Hobby::$HOBBIES_PER_PAGE;
if ($offset < $hobbiesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_HOBBY; ?>"
    data-gb-source-pk="<?php echo $levelId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-hobbies">
  More Notes
 </a>
<?php endif; ?>



