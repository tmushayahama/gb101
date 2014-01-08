<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div id="gb-add-connection-member-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <span class=" gb-top-heading gb-heading-left">Add Connection Member
  </span>
  <div id="gb-add-connection-member-modal-content">
    <?php
    echo $this->renderPartial('connection.views.connection._add_connection_member_form', array(
     'connectionMemberModel' => $connectionMemberModel
    ));
    ?>
  </div>
</div>

