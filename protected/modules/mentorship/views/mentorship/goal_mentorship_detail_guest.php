<?php $this->beginContent('//layouts/gb_main2'); ?>
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
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12">
      <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Logged In</strong> you will be limited.<br>
        You will not be able to rate the advice.<br>
        You cannot share an advice page.
      </div>
      <div class="mentorship-info-container" mentorship-id="<?php echo $goalMentorship->id; ?>">
        <div class="col-lg-2 col-sm-12 col-xs-12">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
        </div>
        <div class="panel panel-default gb-no-padding col-lg-10 col-sm-12 col-xs-12">
          <div class="panel-heading">
            <a><h4><?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></h4></a>
            Mentor
          </div>
          <div class="panel-body">
            <span class="col-lg-12 col-sm-12 col-xs-12">
              <h4 class="gb-page-title"><?php echo $goalMentorship->goal->title; ?></h4>
              <p class="gb-mentorship-description"> <?php echo $goalMentorship->description ?> </p>
            </span>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="row gb-bottom-border-grey-3">
        <h4 class="pull-left">Mentorship</h4>
        <ul id="gb-mentorship-detail-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="tab-content">
          <div class="tab-pane active " id="goal-mentorship-all-pane">
            <br>
            <h1>Welcome</h1>
            <br>

            <h4 class="">These are some pages I worked on </h4><br>
            <?php foreach ($advicePages as $advicePage): ?>
              <a href="<?php echo Yii::app()->createUrl('pages/pages/goalPageDetail', array('pageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-12 col-xs-12">
      <div class="row">
        <div class="panel panel-default">
          <h4 class="panel-heading">Skills To Explore</h4>
          <div class="panel-body">

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