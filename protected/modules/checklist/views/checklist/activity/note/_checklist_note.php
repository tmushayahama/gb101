<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row row gb-block gb-block-row gb-block-row-lg" checklist-note-id="<?php echo $checklistNoteParent->id; ?>"
     data-gb-source-pk="<?php echo $checklistNoteParent->note_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 ">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $checklistNoteParent->note->creator->profile->avatar_url; ?>" 
         class="gb-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12  gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $checklistNoteParent->note->creator_id)); ?>">
            <?php echo $checklistNoteParent->note->creator->profile->firstname . " " . $checklistNoteParent->note->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Checklist Note</i></span>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" data-gb-target="#gb-skill-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
          </ul>
        </div>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <p>
            <span class="gb-display-attribute" gb-control-target="#gb-note-form-description-input"><?php echo $checklistNoteParent->note->description; ?></span>
          </p>
        </div>
      </div>
    </div>
  </div> 
</div>

