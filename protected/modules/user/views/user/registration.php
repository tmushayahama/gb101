<?php ?>
<?php if (Yii::app()->user->hasFlash('registration')): ?>
  <div class="success">
    <?php echo Yii::app()->user->getFlash('registration'); ?>
  </div>
<?php else: ?>
  <div class="gb-register-heading">
    <h1>Sign Up</h1>
    <h4>It's free and it takes less than a minute</h4>
  </div>
  <div class="form">
    <?php
    $form = $this->beginWidget('UActiveForm', array(
     'id' => 'registration-form',
     'enableAjaxValidation' => false,
     'clientOptions' => array(
      'validateOnSubmit' => true,
     ),
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <?php echo CHtml::errorSummary(array($registerModel, $profile), '<button type="button" class="close" data-dismiss="alert">&times;</button>', NULL, array('class' => 'alert alert-error')); ?>
    <div class="form-group row">
      <?php echo $form->textField($profile, 'firstname', array('class' => 'input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'First Name')); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textField($profile, 'lastname', array('class' => 'input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Last Name')); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textField($registerModel, 'email', array('class' => 'input-lg col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'email@example.com')); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->passwordField($registerModel, 'password', array('class' => 'input-lg col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'password')); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->passwordField($registerModel, 'verifyPassword', array('class' => 'input-lg col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'confirm password')); ?>
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
    <div class="form-group row">
      <?php echo CHtml::submitButton(UserModule::t("Sign up"), array('class' => 'btn btn-success btn-lg gb-btn-register btn-block')); ?>
    </div>
    <?php $this->endWidget(); ?>
  </div><!-- form -->
<?php endif; ?>