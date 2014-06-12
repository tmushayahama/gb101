<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_promise_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  //var addpromiseListUrl = "<?php echo Yii::app()->createUrl("promise/promise/promisehome/addpromiselist/connectionId/1"); ?>";

  var addpromiseListUrl = "<?php echo Yii::app()->createUrl("site/addpromiselist", array('connectionId' => 0, 'source' => "promise", 'type' => GoalList::$TYPE_promise)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addpromiselist", array('connectionId' => 0, 'source' => "promise", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordpromiseCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordpromisecommitment", array('connectionId' => 0, 'source' => 'promise')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  $("#gb-topbar-heading-title").text("promises");

</script>
<link href="css/leveledito.css?v=1.11" rel="stylesheet">

<style>
  body {
    /* padding-top: 60px; */
  }
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png?v=1.11">
<!-- gb sidebar menu -->
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="gb-white-background span8">
      <div class=" row-fluid">

      </div>
      <div class=" row-fluid">
        <div class="tab-pane" id="promise-bank-pane">
          <ul id="gb-promise-bank-nav" class="">
            <li class="active"><a href="#gb-promise-bank-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-promise-bank-academic-pane" data-toggle="tab">Academic/Job Related<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-promise-bank-self-management-pane" data-toggle="tab">Self Management<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-promise-bank-transferable-pane" data-toggle="tab">Transferable<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-promise-bank-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-promise-bank-words-of-action-pane" data-toggle="tab">Words of Action<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
          <div id="gb-promise-activity-content" class="tab-content">
            <div class="tab-pane active"id="gb-promise-bank-all-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">All promise List</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-promise-promise-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank() as $promiseBankItem):

                    echo $this->renderPartial('_promise_bank_item_row', array(
                     'promiseBankItem' => $promiseBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane"id="gb-promise-bank-academic-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">Academic/Job Related</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-promise-promise-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank(1) as $promiseBankItem):
                    ?> 
                    <?php
                    echo $this->renderPartial('_promise_bank_item_row', array(
                     'promiseBankItem' => $promiseBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                  ?>
                </div>
              </div>
            </div>
            <div class="tab-pane"id="gb-promise-bank-self-management-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">Self Management</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-promise-promise-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank(2) as $promiseBankItem):
                    ?> 
                    <?php
                    echo $this->renderPartial('_promise_bank_item_row', array(
                     'promiseBankItem' => $promiseBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane"id="gb-promise-bank-transferable-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">Transferable</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-promise-promise-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank(3) as $promiseBankItem):
                    ?> 
                    <?php
                    echo $this->renderPartial('_promise_bank_item_row', array(
                     'promiseBankItem' => $promiseBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-promiselist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To promise List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_promise_list_form', array(
   'promise_list_bank' => $promise_list_bank,
   'promiseListModel' => $promiseListModel,
   'promise_levels' => $promise_levels,
   'promiseListShare' => $promiseListShare,
   'promiseListMentor' => $promiseListMentor));
  ?>
</div>

<div id="gb-promiselist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To My Promise List
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_promise_list_form', array(
   'promiseListModel' => $promiseListModel,
   'promiseListShare' => $promiseListShare,
   'promiseListMentor' => $promiseListMentor));
  ?>
</div>

<div id="gb-promise-modal" class="modal  modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add promise Commitment
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <div id="gb-promise-forms-container" class=" row-fluid">
    <div id="gb-promise-type-forms-container" class=" row-fluid">
      <div id="academic" class="promise-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/academic-icon.png" alt="">
        <br>
        <div class="content">
          <h3>Academic/Job Related</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="self-management" class="promise-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Self Management</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="transferable" class="promise-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Transferable</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="promise-template" class="promise-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Use Template</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
    </div>
    <div id="academic-promise-entry-form"class="hide promise-entry-form">
      <h4>Academic</h4>
      <ul class="nav nav-tabs" id="promise-tab">
        <li class="active"><a href="#promise-academic-pane">Academic</a></li>
        <li><a href="#promise-job-pane">Job Related</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="promise-academic-pane">
          <?php
          echo $this->renderPartial('_promise_academic_form', array(
           'academicModel' => $academicModel,
           'promiseModel' => $promiseModel,
           'promiseListShare' => $promiseListShare,
           'promiseCommitmentShare' => $promiseCommitmentShare,
           'promiseListMentor' => $promiseListMentor
          ));
          ?>
        </div>
        <div class="tab-pane" id="promise-job-pane">...</div>
      </div>
    </div>
  </div>
</div>

<?php $this->endContent(); ?>