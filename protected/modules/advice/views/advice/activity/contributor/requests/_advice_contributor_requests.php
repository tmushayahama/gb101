<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($requestsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no pending advice judge requests
 </h5>
<?php endif; ?>

<?php
$requestsCounter = 1;
foreach ($requests as $request):
 ?>
 <?php
 $this->renderPartial('advice.views.advice.activity.contributor.requests._advice_contributor_request', array(
   "request" => $request,
   "requestsCounter" => $requestsCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Notification::$NOTIFICATIONS_PER_PAGE;
if ($offset < $requestsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE_CONTRIBUTOR; ?>"
    data-gb-source-pk="<?php echo $sourceId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#advice-dd">
  More Requests
 </a>
<?php endif; ?>