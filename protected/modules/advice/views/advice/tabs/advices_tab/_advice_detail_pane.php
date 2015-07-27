<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="container">
 <div id="gb-screen-height">
  <div class="nav-container col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-none">
   <div id="gb-middle-nav-3" class="gb-nav-parent">
    <div id="" class="gb-top-nav-1 gb-nav gb-color-5 row">
     <div class="gb-title col-lg-9 col-md-9 col-sm-10 col-xs-8">
      <div class="gb-ellipsis">
       <button class="gb-dropdown-toggle btn btn-default"
               gb-target="#gb-skill-category-dropdown">
        <i class="fa fa-filter"></i>
       </button>
       ADVICE APP
      </div>
     </div>
     <div class="gb-action col-lg-3 col-md-3 col-sm-2 col-xs-4">
      <div class="btn-group pull-right">
       <a class="btn btn-default gb-form-modal-trigger gb-prepopulate-selected-people-list col-lg-6 col-md-6 col-sm-6 col-xs-6"
          data-gb-selection-type="multiple"
          data-gb-modal-target="#gb-send-request-modal"
          data-gb-list-target="#gb-contributor-form-people-list"
          data-gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
          data-gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
          data-gb-source-pk="<?php echo $advice->id; ?>"
          data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>">
        <i class="fa fa-send"></i>
       </a>
       <a class="btn btn btn-default gb-request-notification-viewer gb-populate col-lg-6 col-md-6 col-sm-6 col-xs-6"
          data-gb-target="#gb-notification-viewer-body"
          data-gb-type="gb-modal"
          data-gb-target-heading="#gb-notification-viewer-heading"
          data-gb-heading-text="Pending advice judge request(s)"
          data-gb-source="<?php echo Level::$LEVEL_CATEGORY_ADVICE_TYPE; ?>"
          data-gb-source-pk="<?php echo $advice->id; ?>">
        <i class="fa fa-road"></i>
       </a>
      </div>
     </div>
    </div>
    <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="gb-heading-img-container row">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/advices/" . $advice->advice_picture_url; ?>" class="gb-heading-img" alt="">
     </div>
     <div class="row gb-nav-heading">
      <p class="gb-heading">
       <strong><?php echo $advice->title; ?></strong>
       <?php echo $advice->description; ?>
      </p>
      <div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">


      </div>
     </div>
     <div id="gb-advice-mentors" class="gb-list">
      <?php
      $this->renderPartial('advice.views.advice.activity.advice._advice_mentor_list', array(
        "advice" => $advice,
        "adviceChildren" => $adviceChildren,
        "adviceChildrenCount" => $adviceChildrenCount,
        "offset" => 1,
      ));
      ?>
     </div>
     <div class="gb-dummy-height"></div>
    </div>
   </div>
  </div>
  <div class="nav-container col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-padding-none">
   <div id="gb-right-nav-3">
    <div class="tab-content">
     <!---------- ADVICE MANAGEMENT WELCOME OVERVIEW PANE ------------>
     <div class="tab-pane active" id="gb-advice-item-pane">
      <br>
      <h4 class="text-center text-warning gb-no-information row">
       select a advice to show
      </h4>
     </div>
    </div>
    <div class="gb-dummy-height"></div>
   </div>
  </div>
  <?php
  $this->renderPartial('application.views.site.modals._send_request_modal', array(
    "formId" => "gb-contributor-form",
    "prependTo" => "#gb-advice-mentors",
    "sourceId" => $advice->id,
    "requestTypes" => $contributorTypes,
    "title" => "Add a Contributor",
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_NOTIFY
  ));
  ?>
 </div>
</div>
<!-- /#wrapper -->
<?php $this->endContent(); ?>
