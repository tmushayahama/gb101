<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-question-answer-list-item panel panel-default gb-no-padding" mentorship-answer-id="<?php echo $mentorshipAnswer->id; ?>">
  <div class="panel-body gb-padding-thinner">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <p>
          <strong class="gb-display-attribute" gb-control-target="#gb-mentorship-answer-form-question"><?php echo $mentorshipAnswer->mentorshipQuestion->question->question; ?> </strong> 
          <span class="gb-display-attribute" gb-control-target="#gb-mentorship-answer-form-description"><?php echo $mentorshipAnswer->mentorshipQuestion->question->description; ?></span>
        </p>
      </div>
      <?php if ($mentorshipAnswer->mentorship->owner_id == Yii::app()->user->id): ?>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 panel-footer gb-panel-display gb-no-padding"> 
          <div class="row">
            <div class="btn-group pull-right">
              <a class="gb-edit-form-show btn btn-sm btn-link"
                 gb-form-target="#gb-mentorship-answer-form">
                <i class="glyphicon glyphicon-edit"></i>
              </a>
              <a class="gb-answer-list-item-delete btn btn-sm btn-link"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

</div>


