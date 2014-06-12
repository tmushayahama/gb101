<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_pages_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var advicePagesFormUrl="<?php echo Yii::app()->createUrl("pages/pages/advicePagesForm", array()); ?>";
// $("#gb-topbar-heading-title").text("Skills");
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div id="gb-home-header" class="row-fluid">
        <div class="span3">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/templates_icon_3.png"; ?>" alt="">
        </div>
        <div class="connectiom-info-container span5">
          <ul class="nav nav-stacked connectiom-info span12">
            <h3 class="name">Templates</h3>
            <li class="connectiom-description">
              <p>Write something about a goal or a skill.<br>
                <small><i>template list, goal pages list, goal pages discussion</i></small><p>
            </li>
            <li class="connectiom-members">

            </li>
          </ul>
        </div>
        <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
          <li>
            <a class="">
              <i class="glyphicon glyphicon-tasks"></i>  
              My Goal Pages List
              <span class="pull-right"> 
                <?php echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, 0); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="glyphicon glyphicon-tasks"></i>  
              Goal Pages Written
              <span class="pull-right"> 
                <?php echo GoalCommitment::getGoalCommitmentCount(Level::$LEVEL_CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="glyphicon glyphicon-tasks"></i>  
              Goal Pages Bank
              <span class="pull-right"> 
                <?php echo ListBank::getListBankCount(GoalType::$CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
        </ul>
      </div>
      <br>
      <br>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">Goal Pages</h4>
        <ul id="gb-skill-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">My Pages</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal_pages-all-pane">
            <div class="span4 gb-skill-leftbar">
              <div id="gb-skill-skill-list-box" class=" row-fluid">
                <div class="sub-heading-6">
                  <h5><a href="#skill-list-pane" data-toggle="tab">Favorite Pages (<i><?php echo 0; //echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, 0);                 ?></i>)</a>
                    <a class="pull-right gb-btn gb-btn-blue-2 btn-small skill-modal-trigger" type="1"><i class="glyphicon glyphicon-white icon-plus-sign"></i> Add</a></h5>
                </div>
              </div>
            </div>
            <div class="span8">
              <div class="row-fluid">
                <div class="gb-pages-start-writing row-fluid">
                  <div class="row-fluid">
                    <h4>
                      <select id="gb-goal-number-selector" class="pull-left">
                        <option value="" disabled="disabled" selected="selected">Select Number</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                      <p>Skills/goals you need to achieve</p>
                    </h4>
                  </div>
                  <div class="row-fluid">
                    <textarea id="gb-goal-input" class="input-block-level" placeholder="Skill Achievement/Goal Achievement"></textarea>
                  </div>
                  <button id="gb-start-writing-page-btn" class="gb-btn gb-btn-blue-2">Start Writing</button>
                </div>
                <h4 class="sub-heading-6"><a>Recent Pages</a><a class="pull-right"><i><small></small></i></a></h4>
                <div id="skill-posts"class="row-fluid rm-row rm-container">
                 
                </div>
              </div>
            </div>
            <div class="tab-pane" id="goal_pages-my-goal_pages-pane">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-home-sidebar" class="span3">
      <h5 class="sub-heading-7"><a>Pages Todos</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div id="gb-todos-sidebar" class="row-fluid">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="by"></th>
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
                 'todo' => $todo->goal->description,
                 'todo_puntos' => $todo->goal->points_pledged
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

<?php $this->endContent() ?>