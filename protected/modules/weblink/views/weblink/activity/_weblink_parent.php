<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-block gb-block-row-weblink"
     data-gb-source-pk="<?php echo $weblink->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_WEBLINK; ?>"
     data-gb-del-message-key="WEBLINK">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
  <div class="row gb-row-display ">
   <div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
    <div class="row">
     <h5 class="gb-heading row">
      <a href="<?php echo $weblink->link; ?>"
         target="blank"
         class="col-lg-11 col-sm-11 col-xs-11">
       <p class="gb-ellipsis gb-display-attribute"
          data-gb-control-target="#gb-weblink-form-description-input">
           <?php echo $weblink->link; ?>
       </p>
      </a>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li>
         <a class="gb-edit-form-show">
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
      $this->renderPartial('weblink.views.weblink.forms._weblink_form_edit', array(
        "formId" => "gb-weblink-form-edit-" . $weblink->id,
        "weblinkModel" => $weblink,
      ));
      ?>
     </div>
    </div>
   </div>
  </div>
  <div class="gb-more-info row">
   <div class="col-lg-6 col-sm-6 col-xs-12 gb-padding-thin">
    <p class="gb-description">
     <?php echo $weblink->description; ?>
    </p>
   </div>
   <div class="col-lg-6 col-sm-6 col-xs-12 gb-padding-thinner">
    <a class="gb-link-thumbnail col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/previews/no_preview.png" ?>" class="img-polariod" alt="">
    </a>

   </div>
  </div>
 </div>
</div>