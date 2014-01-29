<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_pages_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var goalPagesFormUrl = "<?php echo Yii::app()->createUrl("pages/pages/goalPagesForm", array()); ?>";
// $("#gb-topbar-heading-title").text("Skills");
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div id="gb-header" class="row-fluid">
        <div class="goal-page-info-container span8">
          <span class='gb-top-heading gb-heading-left'>Goal Page</span>
          <div class="gb-post-title">
            <span class="span1">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
            </span>
            <span class="span9">
              <a><h5><?php echo $page->owner->profile->firstname . " " . $page->owner->profile->lastname ?></h5></a>
            </span>
            <span class="span2">

            </span> 
          </div>
          <div class="gb-content row-fluid">
            <span class="span8">
              <h4 class="gb-page-title"><?php echo $page->title; ?>  
                <small> <?php echo $page->description ?></small>
              </h4>
            </span>
            <span class=" span4">

            </span>
          </div>
          <div class="gb-footer">
            <a class="gb-btn">Share</a>
            <div class="pull-right">
              <a class="gb-btn">Edit</a>
              <a class="gb-btn">Delete</a>
            </div>
          </div>
        </div>
        <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              My Goal Pages List
              <span class="pull-right"> 
                <?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, 0); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              Goal Pages Written
              <span class="pull-right"> 
                <?php //echo GoalCommitment::getGoalCommitmentCount(GoalType::$CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
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
          <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">Activity</a></li>
          <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">Summary</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal_pages-all-pane">
            <ul id="page-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">Page<i class="icon-chevron-right pull-right"></i></a></li>
              <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-skill-activity-content">
              <br>
              <br>
              <div class="row-fluid">
                <?php
                $count = 0;
                foreach ($subgoals as $subgoal):
                  $count++;
                  ?>
                  <h5 class="sub-heading-7"><a><?php echo "Skill " . $count; ?></a><a class="pull-right"><i><small>View All</small></i></a></h5>
                  <div class="gb-commitment-post">
                    <div class="gb-post-content row">
                      <span class="span12">
                        <h4 class=""><?php echo $subgoal->subgoal->title; ?></a>   
                          <small> <?php echo $subgoal->subgoal->description ?></small>
                        </h4>
                      </span>
                    </div>
                    <div class="gb-footer">
                      <?php if ($page->owner->profile->user_id == Yii::app()->user->id): ?>
                        <a class="gb-btn">Agree: <div class="badge badge-info">0</div></a>
                        <a class="gb-btn">Disagree: <div class="badge badge-info">0</div></a>
                        <a class="gb-btn">Share</a>
                        <div class="pull-right">
                          <a class="gb-btn"><i class="icon-edit"></i></a>
                          <a class="gb-btn"><i class="icon-trash"></i></a>
                        </div>
                      <?php else: ?>
                        <a class="gb-btn">Agree: <div class="badge badge-info">0</div></a>
                        <a class="gb-btn">Disagree: <div class="badge badge-info">0</div></a>
                        <a class="gb-btn">Share</a>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
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
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="icon-white icon-pencil"></i> Edit</button>
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