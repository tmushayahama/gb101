<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
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
<div class="row">
  <div id="" class="span9">
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Not Logged In</strong> you will be limited.<br>
      You will not be able to rate the advice.<br>
      You cannot share an advice page.
    </div>
    <div id="gb-header" class="row-fluid">
      <div class="goal-page-info-container span12">
        <span class='gb-top-heading gb-heading-left'>Advice Page</span>
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
      </div>
    </div>
    <br>
    <br>
    <div class=" row-fluid gb-bottom-border-grey-3">
      <h4 class="pull-left">Advice Pages</h4>
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
                    <a class="gb-btn">Agree: <div class="badge badge-info">0</div></a>
                    <a class="gb-btn">Disagree: <div class="badge badge-info">0</div></a>
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
  <div id="" class="span3">
    <div class="row-fluid">
      <?php
      echo $this->renderPartial('user.views.user.registration', array(
       'registerModel' => $registerModel,
       'profile' => $profile
      ));
      ?>
    </div>s
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>