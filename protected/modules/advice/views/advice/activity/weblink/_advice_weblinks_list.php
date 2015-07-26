<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($adviceWeblinksCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no weblinks
 </h5>
<?php endif; ?>

<?php
$weblinkCounter = 1;
foreach ($adviceWeblinks as $adviceWeblink):
 ?>
 <?php
 $this->renderPartial('weblink.views.weblink.activity._weblink_parent', array(
   "weblink" => $adviceWeblink->weblink,
   "weblinkCounter" => $weblinkCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Weblink::$WEBLINKS_PER_PAGE;
if ($offset < $adviceWeblinksCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE_WEBLINK; ?>"
    data-gb-source-pk="<?php echo $adviceId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advice-weblinks">
  More Weblinks
 </a>
<?php endif; ?>

