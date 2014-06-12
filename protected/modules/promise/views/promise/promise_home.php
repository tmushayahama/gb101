<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_promise_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addpromiseListUrl = "<?php echo Yii::app()->createUrl("site/addpromiselist", array('connectionId' => 0, 'source' => "promise", 'type' => GoalList::$TYPE_promise)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addpromiselist", array('connectionId' => 0, 'source' => "promise", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordpromiseCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordpromisecommitment", array('connectionId' => 0, 'source' => 'promise')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  // $("#gb-topbar-heading-title").text("promises");
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">My promises</h4>
        <ul id="gb-promise-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#promise-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#promise-list-pane" data-toggle="tab">My promise List</a></li>
          <li class=""><a href="#promise-commitment-pane" data-toggle="tab">promise Commitments</a></li>
          <li class=""><a href="#promise-bank-pane" data-toggle="tab">promise Bank</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="promise-all-pane">
            <div class="span4 gb-promise-leftbar">
              <div id="gb-promise-promise-list-box" class=" row-fluid">
                <div class="sub-heading-6">
                  <h5><a href="#promise-list-pane" data-toggle="tab">promise List (<i><?php echo GoalList::getGoalListCount(0, 0); ?></i>)</a>
                    <a class="pull-right gb-btn gb-btn-blue-2 btn-small promise-modal-trigger" type="1"><i class="glyphicon glyphicon-white icon-plus-sign"></i> Add</a></h5>
                </div>
                <div id="gb-promise-promise-container" class=" row-fluid">
                  <?php echo $this->renderPartial('_promise_list_preview', array()); ?>
                </div>
              </div>
            </div>
            <div class="span8">
              <div id="gb-post-input" class=""> 
                <div id="gb-commit-form" class="row-fluid rm-row ">
                  <textarea id="gb-commitment-input" class="span12"rows="2" placeholder="What is your promise commitment?"></textarea>
                  <ul id="gb-post-tab" class="nav row-fluid inline ">
                    <li class="active span4 pull-left">
                      <a href="#rm-home-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_promise.png" class="active" alt=""><br>
                        <strong>Add promise</strong>
                      </a>
                    </li>
                    <li class="span4 pull-left">
                      <a href="#rm-home-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_promise.png" 
                             onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_promise_hover.png'" 
                             onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_promise.png'" alt=""><br>
                        <strong>Assign promise</strong>
                      </a>
                    </li>
                    <li class="span4 pull-left">
                      <a href="#rm-home-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/promise_challenge.png" 
                             onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/promise_challenge_hover.png'" 
                             onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/promise_challenge.png'" alt=""><br>
                        <strong>promise Challenge</strong>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav hidden">
                    <li class="pull-right">
                      <button type="submit" id="rm-commit-post-home" class="rm-dark-blue-btn">I Commit</button>
                    </li>
                    <li class="pull-right dropdown">
                      <a href="#" class="dropdown-toggle btn" data-toggle="dropdown">Friends <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="nav-header">Who can see this</li>
                        <li id="rm-friends-selector-home" class="controls">
                          <label class="checkbox text-left">
                            <input type="checkbox" value="option1"> Select All
                          </label>
                        </li>
                      </ul>
                    </li>
                    <li class="pull-right">
                      <ul class="inline">
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <h4 class="sub-heading-6"><a>promise Commitments</a><a class="pull-right"><i><small>View All</small></i></a></h4>
              <div id="promise-posts"class="row-fluid rm-row rm-container">
                <?php foreach ($promiseCommitments as $promiseCommitment): ?>
                  <?php
                  echo $this->renderPartial('_promise_commitment_post', array(
                   "promiseCommitment" => $promiseCommitment,
                   'connection_name' => 'All'//$post->connection->name
                  ));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="promise-list-pane">
            <ul id="gb-promise-activity-nav" class="gb-side-nav-1 gb-promise-leftbar">
              <li class=""><a href="#gb-promise-list-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class="active"><a href="#gb-promise-list-gained-pane" data-toggle="tab">promises Gained<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-list-to-improve-pane" data-toggle="tab">promises To Improve<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-list-to-learn-pane" data-toggle="tab">promises To Learn<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-list-to-know-pane" data-toggle="tab">promises To Know<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-list-words-of-action-pane" data-toggle="tab">Words of Action<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-list-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-promise-activity-content tab-content">
              <div class="tab-pane active"id="gb-promise-list-gained-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">promises Gained</h3>
                  <h3><a class="pull-right btn promise-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of many promises you have gained so far.
                  </h4>
                  <div id="gb-promise-promise-gained-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(0, 1) as $promiseListItem):
                      echo $this->renderPartial('_promise_list_row_big', array(
                       'promiseListItem' => $promiseListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-promise-list-to-improve-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">promises To Improve</h3>
                  <h3><a class="pull-right btn promise-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of promises you want to improve
                  </h4>
                  <div id="gb-promise-promise-to-improve-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(0, 2) as $promiseListItem):

                      echo $this->renderPartial('_promise_list_row_big', array(
                       'promiseListItem' => $promiseListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-promise-list-to-learn-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">promises To Learn</h3>
                  <h3><a class="pull-right btn promise-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of many promises you want to learn.
                  </h4>
                  <div id="gb-promise-promise-to-learn-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(0, 3) as $promiseListItem):
                      echo $this->renderPartial('_promise_list_row_big', array(
                       'promiseListItem' => $promiseListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-promise-list-to-know-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">promises To Know</h3>
                  <h3><a class="pull-right btn promise-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of many promises you want to know more about.
                  </h4>
                  <div id="gb-promise-promise-to-know-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(0, 4) as $promiseListItem):

                      echo $this->renderPartial('_promise_list_row_big', array(
                       'promiseListItem' => $promiseListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-promise-list-words-of-action-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Words Of Action</h3>
                  <h3><a class="pull-right btn promise-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of your words of action.
                  </h4>
                  <div id="gb-promise-promise-words-of-action-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(0, 6) as $promiseListItem):
                      echo $this->renderPartial('_promise_list_row_big', array(
                       'promiseListItem' => $promiseListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-promise-list-miscellaneous-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Miscellaneous promises</h3>
                  <h3><a class="pull-right btn promise-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Some other promises.
                  </h4>
                  <div id="gb-promise-promise-miscellaneous-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(0, 5) as $promiseListItem):

                      echo $this->renderPartial('_promise_list_row_big', array(
                       'promiseListItem' => $promiseListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="promise-commitment-pane">
            <ul id="gb-promise-activity-nav" class="gb-side-nav-1 gb-promise-leftbar">
              <li class="active"><a href="#gb-promise-commitment-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-commitment-following-pane" data-toggle="tab">Following<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-commitment-monitoring-pane" data-toggle="tab">Monitoring<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-commitment-refereeing-pane" data-toggle="tab">Refereeing<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-commitment-favorites-pane" data-toggle="tab">Favorites<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
          </div>
          <div class="tab-pane" id="promise-bank-pane">
            <ul id="gb-promise-bank-nav" class="gb-side-nav-1 gb-promise-leftbar">
              <li class="active"><a href="#gb-promise-bank-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-bank-academic-pane" data-toggle="tab">Academic/Job Related<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-bank-self-management-pane" data-toggle="tab">Self Management<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-bank-transferable-pane" data-toggle="tab">Transferable<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-bank-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-promise-bank-words-of-action-pane" data-toggle="tab">Words of Action<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-promise-activity-content tab-content">
              <div class="tab-pane active"id="gb-promise-bank-all-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">All promise List</h3>
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
                  <h3 class="pull-left">Academic/Job Related</h3>
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
                  <h3 class="pull-left">Self Management</h3>
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
                  <h3 class="pull-left">Transferable</h3>
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
    <div id="gb-home-sidebar" class="span3">
      <h5 class="sub-heading-7"><a>Global Todos</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div id="gb-todos-sidebar" class="row-fluid">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="by">By</th>
              <th class="task">Task</th>
              <th class="date">Assigned</th>
              <th class="puntos">Puntos</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($todos as $todo): ?>
              <tr>
                <?php
                echo $this->renderPartial('application.views.site.summary_sidebar._todos', array(
                 'todo' => $todo->promise->description,
                 'todo_puntos' => $todo->promise->points_pledged
                ));
                ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="">
          <span class="span7">
          </span>
          <span class="span5">
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="glyphicon glyphicon-white icon-pencil"></i> Edit</button>
          </span> 
        </div>
      </div>
      <h5 id="gb-view-connection-btn" class="sub-heading-7"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div class="box-6-height">
        <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>				
          <?php
          echo $this->renderPartial('application.views.site.summary_sidebar._add_people', array(
           'nonConnectionMember' => $nonConnectionMember
          ));
          ?>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-promiselist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To promise List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white promiselist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-promise-forms-container" >
    <?php
    echo $this->renderPartial('_add_promise_list_form', array(
     'promise_list_bank' => $promise_list_bank,
     'promiseListModel' => $promiseListModel,
     'promise_levels' => $promise_levels,
     'promiseListShare' => $promiseListShare,
     'promiseListMentor' => $promiseListMentor));
    ?>
  </div>
</div>

<div id="gb-promise-modal" class="modal  modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add promise Commitment
    <button class="promise-commit-modal-close-btn pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-promise-forms-container">
    <div id="gb-promise-type-forms-container" class="row-fluid box-10-height">
      <div class="span4">
        <h1>Are you ready to make a promise commitment?</h1><br>
        <h3>Choose a type of promise.</h3> <br>
        <h5>
          <div class="label label-info">
            <h5> Note! </h5> 
          </div>
          Some of the promises can be in more than one category.
        </h5>
      </div>
      <div class="span8">
        <div id="academic" class="promise-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/academic-icon.png" alt="">
          <div class="content">
            <h4>Knowledge Based.</h4>
            <p>Knowledge of specific subjects, procedures and information 
              necessary to perform particular tasks 
              <br>
              <small><i>e.g. programming, marketing, building</i></small><p>
          </div>
        </div>
        <div id="self-management" class="promise-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Self Management/Personal Traits</h4>
            <p>Related to how you conduct yourself.<br>
              <small><i>e.g. confident, independent, patient</i></small><p>
          </div>
        </div>
        <div id="transferable" class="promise-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Transferable/Functional</h4>
            <p>Actions taken to perform a task, transferable to different work 
              functions and environments. 
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="promise-from-list" class="promise-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/from_promise_list.png" alt="">
          <div class="content">
            <h4>From Your promise List</h4>
            <p>Choose what you have already listed.<br>
          </div>
        </div>
        <div id="promise-template" class="promise-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
          <div class="content">
            <h4>Use Template</h4>
            <p>Choose from templates made by other people. </p>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div id="academic-promise-entry-form"class="hide promise-entry-form">
      <h4>Academic</h4>
      <div id="promise-academic-pane">
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
    </div>
  </div>
</div>
<div id="gb-request-monitors-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Monitor(s)
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_request_monitors_form', array(
   'promiseMonitorModel' => $promiseMonitorModel,
   'usersCanMonitorList' => GoalMonitor::getCanMonitorList()));
  ?>
</div>
<div id="gb-request-mentorship-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Mentorship(s)
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_request_mentorship_form', array(
   'promiseMentorshipModel' => $promiseMentorshipModel,
   'usersCanMentorshipList' => GoalMentorship::getCanMentorshipList()));
  ?>
</div>
<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="gb-list-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success">Select from promise List</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php $this->endContent() ?>