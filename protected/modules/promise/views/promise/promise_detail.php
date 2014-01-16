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
  var addpromiseListUrl = "<?php echo Yii::app()->createUrl("site/addpromiselist", array('connectionId' => 1, 'source' => "promise")); ?>";
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

<div class="container">
  <div id="main-container">

    <div class="row-fluid">
      <div class="gb-promise-management-container span9">
        <div class="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Note!</strong> You have not yet committed this promise. If you commit,
          you will get have advantages of getting monitors, referees, mentors and other benefits.
        </div>
        <div class="row-fluid">
          <?php
          echo $this->renderPartial('_promise_list_row_big', array(
           'promiseListItem' => $promiseListItem,
           'count' => 0));
          ?>
        </div>
        <br>
        <div class=" row-fluid">
          <div class=" row-fluid gb-bottom-border-grey-3">
            <h4 class="pull-left">promise Management</h4>
            <ul id="gb-promise-management-nav" class="gb-nav-1 pull-right">
              <li class="active"><a href="#promise-activity-tab-pane" data-toggle="tab">Activity</a></li>
              <li class=""><a href="#promise-summary-pane" data-toggle="tab">Summary</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active row-fluid" id="promise-activity-tab-pane">
              <ul id="gb-promise-activity-nav" class="gb-side-nav-1 gb-promise-leftbar">
                <li class=""><a href="#gb-promise-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-promise-activity-todos-pane" data-toggle="tab">To Dos<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-promise-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-promise-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-promise-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-promise-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-promise-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-promise-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div id="gb-promise-activity-content" class="tab-content">
                <div class="tab-pane " id="gb-promise-activity-all-pane">
                  <h3>All</h3>
                </div>
                <div class="tab-pane active " id="gb-promise-activity-todos-pane">
                  <h3>To Dos <a class="pull-right">Add New Todo</a></h3>
                  <br>
                  <h4><a><i>To Do Heading</i></a></h4>
                  <div class="gb-promise-management-todos">
                    <?php foreach ($promiseTodos as $promiseTodo): ?>
                      <div class="gb-promise-management-todo">
                        <input class="pull-left" type="checkbox"><a class="offset1"><?php echo $promiseTodo->todo->todo ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pane" id="gb-promise-activity-discussion-pane">
                  <h3>promise Discussion <a class="pull-right">Add New Discussion</a></h3>

                </div>
                <div class="tab-pane" id="gb-promise-activity-web-links-pane">
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" promise-id="<?php //echo $promiseCommitment->id;   ?> " class="pull-right">New Web Link</a></h3>
                  <?php //foreach ($promiseWebLinks as $promiseWebLink): ?>
                  <div id="gb-promise-management-web-links">
                    <?php
                    // echo $this->renderPartial('_web_link_row', array(
                    //"promiseWebLink" => $promiseWebLink,
                    // ));
                    ?>
                  </div>
                  <?php //endforeach; ?>
                </div>
                <div class="tab-pane" id="gb-promise-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-promise-activity-message-pane">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="promise-summary-pane">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>