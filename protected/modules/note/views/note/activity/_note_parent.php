<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-block"
     data-gb-source-pk="<?php echo $note->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_NOTE; ?>"
     data-gb-del-message-key="NOTE">
 <div class="row gb-row-display">
  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $note->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="col-lg-11 col-sm-11 col-xs-12 gb-sticky-note-row gb-padding-medium">
   <div class="row">
    <h5 class="gb-heading">
     <span>
      <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $note->creator_id)); ?>">
       <?php echo $note->creator->profile->firstname . " " . $note->creator->profile->lastname ?>
      </a>
     </span>
     <span><i class="gb-small-text"><?php echo date_format(date_create($note->created_date), 'M jS \a\t g:ia'); ?></i></span>
     <div class="btn-group pull-right">
      <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
       <i class="glyphicon glyphicon-chevron-down"></i>
      </button>
      <ul class="dropdown-menu" role="menu">
       <li>
        <a class="gb-edit-form-show"
           data-gb-target="" >
         <i class="glyphicon glyphicon-edit"></i> edit
        </a>
       </li>
       <li>
        <a class="gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
         <i class="glyphicon glyphicon-trash"></i> delete
        </a>
       </li>
      </ul>
     </div>
    </h5>
    <div class="row gb-panel-form gb-hide">
     <?php
     $this->renderPartial('note.views.note.forms._note_form_edit', array(
       "formId" => "gb-note-form-edit-" . $note->id,
       "noteModel" => $note,
     ));
     ?>
    </div>
    <div class="row gb-panel-display gb-no-padding">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
      <p>
       <span class="gb-display-attribute" data-gb-control-target="#gb-note-form-description-input">
        <?php echo $note->description; ?></span>
      </p>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>