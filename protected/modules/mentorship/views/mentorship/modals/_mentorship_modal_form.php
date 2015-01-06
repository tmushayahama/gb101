<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-mentorship-modal-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
    Add a Mentorship
   </div>
   <div class="modal-body">
    <?php
    $this->renderPartial('mentorship.views.mentorship.forms._mentorship_form', array(
      "formId" => "gb-mentorship-form",
      "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()),
      "prependTo" => "#gb-mentorships",
      "mentorshipLevelList" => $mentorshipLevelList,
      'mentorshipModel' => new Mentorship(),
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
    ));
    ?>
   </div>
  </div>
 </div>
</div>