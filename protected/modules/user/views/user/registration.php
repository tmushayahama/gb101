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

    <?php echo $form->errorSummary(array($registerModel, $profile)); ?>
    <div class="control-group">
      <div class="controls controls-row">
        <?php echo $form->textField($profile, 'firstname', array('class' => 'span6', 'placeholder' => 'First Name')); ?>
        <?php echo $form->error($profile, 'firstname'); ?>
        <?php echo $form->textField($profile, 'lastname', array('class' => 'span6', 'placeholder' => 'Last Name')); ?>
        <?php echo $form->error($profile, 'lastname'); ?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <?php echo $form->textField($registerModel, 'email', array('class' => 'input-block-level gb-input-large', 'placeholder' => 'email@example.com')); ?>
        <?php echo $form->error($registerModel, 'email'); ?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <?php echo $form->passwordField($registerModel, 'password', array('class' => 'input-block-level gb-input-large', 'placeholder' => 'password')); ?>
        <?php echo $form->error($registerModel, 'password'); ?>
      </div>
    </div>
    <div class="control-group ">
      <div class="controls">
        <?php echo $form->passwordField($registerModel, 'verifyPassword', array('class' => 'input-block-level gb-input-large', 'placeholder' => 'confirm password')); ?>
        <?php echo $form->error($registerModel, 'verifyPassword'); ?>
      </div>
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
      <h3><?php echo CHtml::submitButton(UserModule::t("Sign up"), array('class' => 'gb-btn gb-btn-blue-2 gb-btn-register btn-large btn-block')); ?></h3>
   
    <?php $this->endWidget(); ?>
  </div><!-- form -->
<?php endif; ?>