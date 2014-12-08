<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script type="text/javascript">

</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-8 col-lg-6 col-md-6 col-sm-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6 col-sm-6"></div>
  </div>
</div>
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav gb-no-padding gb-background-dark-8">
    <br>
    <div class="gb-top-heading row">
      <h1 class="">Journals</h1>
    </div>
    <br>
    <a class="btn gb-btn-3 gb-form-show gb-backdrop-visible"
       data-gb-target-container="#gb-journal-form-container"
       data-gb-target="#gb-journal-form">
      <h4 class="text-center"><i class="glyphicon glyphicon-plus"></i> Add Journal</h4>
    </a>
    <div id="gb-journal-form-container" class="gb-hide gb-panel-form">
      <?php
      echo $this->renderPartial('journal.views.journal.forms._journal_form', array(
       'journalModel' => $journalModel,
       'journalLevelList' => $journalLevelList));
      ?>
    </div>
    <br>

  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-padding-left-3 gb-background-light-grey-1">

    <div class="row">
      <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-8 gb-skill-leftbar">
        <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-projects-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Journals</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-projects-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Journals</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
      </ul>
    </div>
    <br>
    <div class="tab-content row gb-no-padding">
      <div class="tab-pane active" id="gb-projects-all-pane">
        <h3 class="gb-heading-2">Recent Journals</h3>
      </div>
      <div class="tab-pane" id="gb-my-projects-pane">
        <h3 class="gb-heading-2">My Journals</h3>
      </div>
    </div>
  </div>
</div>


<!-- -------------------------------MODALS --------------------------->

<!-- -----------------------------HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
</div>
<?php $this->endContent() ?>