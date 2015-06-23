
<div id="gb-registration-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
    Request Beta Access
   </div>

   <?php
   $form = $this->beginWidget('UActiveForm', array(
     'id' => 'registration-form',
     'enableAjaxValidation' => false,
     'clientOptions' => array(
       'validateOnSubmit' => false,
     ),
     'htmlOptions' => array('enctype' => 'multipart/form-data',
     ),
   ));
   ?>
   <div class="modal-body">
    <div class="form-group row">
     <?php echo $form->textField($profile, 'firstname', array('class' => 'form-control  col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'First Name')); ?>
    </div>
    <div class="form-group row">
     <?php echo $form->textField($profile, 'lastname', array('class' => 'form-control  col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Last Name')); ?>
    </div>
    <div class="form-group row">
     <?php echo $form->textField($registerModel, 'email', array('class' => 'form-control  col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'Email')); ?>
    </div>
    <div class="gb-hide form-group row">
     <?php echo $form->passwordField($registerModel, 'password', array('value' => 'temp', 'class' => 'form-control  col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'Password')); ?>
    </div>
    <div class="gb-hide form-group row">
     <?php echo $form->passwordField($registerModel, 'verifyPassword', array('value' => 'temp', 'class' => 'form-control  col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'Confirm Password')); ?>
    </div>
    <!-- <div class="control-group">
      <div class="controls">

    <?php //echo $form->labelEx($profile, 'gender');  ?>
    <?php //echo  $form->radioButtonList($profile,'gender', $profile->getGenderOptions(), array('uncheckValue' => null, 'labelOptions'=>array('style'=>'display:inline'), 'separator'=>' | ')); ?>
    <?php // $form->radioButton($profile, 'gender', $profile->getGenderOptions(), array('value' => 2, 'uncheckValue' => null)); ?>
    <?php //echo $form->radioButton($profile, 'gender', $profile->getGenderOptions(), array('value' => 3, 'uncheckValue' => null)); ?>

    <?php //echo $form->error($profile, 'gender');  ?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls controls-row">
    <?php //echo $form->textField($profile, 'birthdate', array('id'=>'birthdate-datepicker', 'class'=>'span2', 'placeholder' => 'Birth Date'));  ?>
    <?php //echo $form->error($profile, 'birthdate'); ?>
        <input id="birthdate-alternate" type="text" class="span2 disabled uneditable-input" disabled="disabled" placeholder="DD, d ,MM yy">
      </div>
    </div> -->
   </div>
   <div class="modal-footer row">
    <div class="btn-group pull-right">
     <a type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</a>
     <?php echo CHtml::submitButton(UserModule::t("Request"), array('class' => 'btn btn-primary gb-btn-register')); ?>
    </div>
   </div>
   <?php $this->endWidget(); ?>
  </div>
 </div>
</div>