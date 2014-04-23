
<div id="gb-registration-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Sign Up
      </div>
      <div class="modal-body">
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
      </div>

    </div>
  </div>
</div>