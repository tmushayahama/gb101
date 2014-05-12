<?php $this->beginContent('//layouts/gb_main2'); ?>
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
<br>
<div class="container">
  <div class="goal-page-info-container row">
    <div class="col-lg-2 col-sm-12 col-xs-12">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding col-lg-10 col-sm-12 col-xs-12">
      <div class="panel-heading">
        <a><h4><?php echo $page->owner->profile->firstname . " " . $page->owner->profile->lastname ?></h4></a>
        Advisor
      </div>
      <div class="panel-body">
        <h4 class="gb-page-title"><?php echo $page->title; ?>  
          <small> <?php echo $page->description ?></small>
        </h4>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Advice Page</h2>
    <ul id="gb-mentorship-all-activity-nav" class="pull-right gb-nav-1">
      <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">Activity</a></li>
      <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">Summary</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Not Logged In</strong> you will be limited.<br>
    You will not be able to rate the advice.<br>
    You cannot share an advice page.
  </div>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-blue-background gb-padding-thin">
      <div class=" row ">
        <div class="tab-content">
          <div class="tab-pane active row" id="goal_pages-all-pane">
            <ul id="page-activity-nav" class="gb-side-nav-1 col-lg-3 col-sm-12 col-xs-12">
              <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Page</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="col-lg-9 col-sm-12 col-xs-12">
              <div class="row">
                <?php
                $count = 0;
                foreach ($subgoals as $subgoal):
                  $count++;
                  ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h5 class=""><a><?php echo "Skill " . $count; ?></a></h5>
                    </div>
                    <div class="panel-body">
                      <h4 class=""><?php echo $subgoal->subgoal->title; ?></a>   
                        <small> <?php echo $subgoal->subgoal->description ?></small>
                      </h4>
                    </div>
                    <div class="panel-footer">
                      <a class="gb-btn">Agree: <div class="badge badge-info">0</div></a>
                      <a class="gb-btn">Disagree: <div class="badge badge-info">0</div></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="goal_pages-my-goal_pages-pane">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._registration_modal', array(
 'registerModel' => $registerModel,
 'profile' => $profile
));
?>
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>