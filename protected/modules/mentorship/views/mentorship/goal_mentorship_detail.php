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
          <span class='gb-top-heading gb-heading-left'>Mentorship</span>
          <div class="gb-post-title">
            <span class="span1">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
            </span>
            <span class="span9">
              <a><h5><?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></h5></a>
            </span>
            <span class="span2">

            </span> 
          </div>
          <div class="gb-content row-fluid">
            <span class="span8">
              <h4 class="gb-page-title"><?php echo $goalMentorship->title; ?>  
                <small> <?php echo $goalMentorship->description ?></small>
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
      </div>
      <br>
      <br>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">Mentorship</h4>
        <ul id="gb-mentorship-detail-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
          <li class=""><a href="#goal-mentorship-activities-pane" data-toggle="tab">Activities</a></li>
          <li class=""><a href="#goal-mentorship-summary-pane" data-toggle="tab">Summary</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal-mentorship-all-pane">
            Welcome
          </div>
          <div class="tab-pane" id="goal-mentorship-activities-pane">
            <div class="tab-pane active row-fluid" id="skill-activity-tab-pane">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
                <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-skill-activity-todos-pane" data-toggle="tab">To Dos<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div id="gb-skill-activity-content" class="tab-content">
                <div class="tab-pane " id="gb-skill-activity-all-pane">
                  <h3>All</h3>
                </div>
                <div class="tab-pane active " id="gb-skill-activity-todos-pane">
                  <h3>To Dos <a class="pull-right">Add New Todo</a></h3>
                  <br>
                  <h4><a><i>To Do Heading</i></a></h4>
                
                </div>
                <div class="tab-pane" id="gb-skill-activity-discussion-pane">
                  <h3>Skill Discussion <a class="pull-right">Add New Discussion</a></h3>

                </div>
                <div class="tab-pane" id="gb-skill-activity-web-links-pane">
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" skill-id="<?php //echo $skillCommitment->id;      ?> " class="pull-right">New Web Link</a></h3>
                  <?php //foreach ($skillWebLinks as $skillWebLink): ?>
                  <div id="gb-skill-management-web-links">
                    
                  </div>
                  <?php //endforeach; ?>
                </div>
                <div class="tab-pane" id="gb-skill-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-skill-activity-message-pane">
                </div>
              </div>
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