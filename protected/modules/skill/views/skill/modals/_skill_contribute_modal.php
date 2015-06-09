<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-contribute-modal" class="modal gb-modal-lg fade gb-z-index-2000" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
    <span class="gb-title">Contribute</span>
   </div>
   <div class="modal-body gb-padding-none">
    <div class="row" role="tabpanel">
     <ul class="gb-modal-tabs-left nav col-lg-4 col-md-4 col-sm-4 col-xs-4"
         id="demo-pill-nav">
      <p class="gb-padding-medium">
       You can choose one or more ways to contribute.
       <i> A checkmark shows which part you are contributing</i>
      </p>
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r1" data-toggle="tab">
        Be a Mentor
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r2" data-toggle="tab">
        Write an Advice
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r3" data-toggle="tab">
        Make it a goal
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r4" data-toggle="tab">
        Make it a promise
       </a>
      </li>
     </ul>
     <div class="gb-modal-panes-right tab-content col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
      <div class="tab-pane active" id="tab-r1">
       <div class="gb-heading-3">BE A MENTOR</div>
       <div class="gb-panel-display row">
        <div class="row">
         <div class="col-lg-12 col-sm-12 col-xs-11 gb-padding-none">
          <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
           <strong><?php echo $skill->title; ?></strong>
           <?php echo $skill->description; ?>
          </p>
         </div>
        </div>
       </div>
       <br>
       <div id="gb-mentorship-form-container" class="row gb-panel-form">
        <?php
        $this->renderPartial('skill.views.skill.forms._contribute_mentorship_form', array(
          "formId" => "gb-contribute-mentorship-form",
          "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()),
          "prependTo" => "#gb-mentorships",
          "skillId" => $skill->id,
          "mentorshipLevelList" => $mentorshipLevelList,
          'mentorshipModel' => new Mentorship(),
          'mentorshipSkillModel' => $mentorshipSkillModel,
          "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ));
        ?>
       </div>
      </div>
      <div class="tab-pane" id="tab-r2">
       <p>
        Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
       </p>
      </div>
      <div class="tab-pane" id="tab-r3">
       <p>
        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table.
       </p>
      </div>
     </div>
    </div>
   </div>
   <div class="modal-footer gb-modal-footer-abs">
    <div class="row">
     <a class="btn btn-default" data-dismiss="modal" aria-hidden="true">Done</a>
    </div>
   </div>
  </div>
 </div>
</div>
