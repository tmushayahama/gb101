<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
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
    <div id="gb-header" class="row-fluid box-5-height">
      <div class="mentorship-info-container span12" mentorship-id="<?php echo $goalMentorship->id; ?>">
        <div class="gb-post-title">
          <span class="span1">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
          </span>
          <span class="span9">
            <a><h4><?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></h4></a>
            Mentor
          </span>
        </div>
        <div class="gb-content row-fluid box-3-height">
          <span class="span12">
            <h4 class="gb-page-title"><?php echo $goalMentorship->goal->title; ?></h4>
            <p class="gb-mentorship-description"> <?php echo $goalMentorship->description ?> </p>
          </span>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class=" row-fluid gb-bottom-border-grey-3">
      <h4 class="pull-left">Mentorship</h4>
      <ul id="gb-mentorship-detail-nav" class="gb-nav-1 pull-right">
        <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
      </ul>
    </div>
    <div class=" row-fluid">
      <div class="tab-content">
        <div class="tab-pane active " id="goal-mentorship-all-pane">
          <br>
          <h1>Welcome</h1>
          <br>

          <h4 class="sub-heading-7">These are some pages I worked on </h4><br>
          <?php foreach ($advicePages as $advicePage): ?>
            <a href="<?php echo Yii::app()->createUrl('pages/pages/goalPageDetail', array('pageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
          <?php endforeach; ?>
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