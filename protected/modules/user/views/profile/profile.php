<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_profile.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
</script>
<div class="container-fluid gb-heading-bar-1">
  <br>
  <div class="container">
    <div id="gb-profile-header" class="row">
      <div class="col-lg-2 col-sm-3 col-xs-12">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $profile->avatar_url; ?>" class="gb-profile-img" alt="">
      </div>
      <div class="col-lg-10 col-sm-9 col-xs-12 gb-no-padding">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
            <div class="thumbnail">
              <div class="caption text-center">
                <h3 class="gb-title">Skill List</h3>
                <h1 class="gb-number text-success">0</h1>
                <a class="btn btn-default">Recommend Skill</a>
              </div>
            </div>
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
            <div class="thumbnail">
              <div class="caption text-center">
                <h3 class="gb-title">Mentorships</h3>
                <h1 class="gb-number text-success">0</h1>
                <a class="btn btn-default">Request Mentorship</a>
              </div>
            </div>
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
            <div class="thumbnail">
              <div class="caption text-center">
                <h3 class="gb-title">Advice Pages</h3>
                <h1 class="gb-number text-success">0</h1>
                <a class="btn btn-default">Request Advice</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/profile_icon_6.png" alt="">
      <h2 class="pull-left"><?php echo $profile->firstname . " " . $profile->lastname; ?></h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#profile-skill-pane" data-toggle="tab">Skills</a></li>
        <li class=""><a href="#profile-about-pane" data-toggle="tab">About</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container gb-full gb-background-light-grey-1">
  <div class="tab-content gb-full">
    <div class="tab-pane active gb-full" id="profile-skill-pane">
      <div id="" class="gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding gb-home-left-nav">
        <br>
        <ul id="" class="gb-side-nav-1 gb-post-tabs col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-profile-all-pane" data-toggle="tab">
              <p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">All</p>
              <i class="glyphicon glyphicon-chevron-right pull-right"></i></a>
          </li>
          <li class=""><a class="boo" href="#gb-profile-skills-pane" gb-post-type="<?php echo Post::$TYPE_GOAL_LIST; ?>" gb-owner-id="<?php echo Yii::app()->user->id; ?>" data-toggle="tab">
              <p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Skills</p>
              <i class="glyphicon glyphicon-chevron-right pull-right"></i></a>
          </li>
          <li class=""><a href="#gb-profile-mentorships-pane" gb-post-type="<?php echo Post::$TYPE_MENTORSHIP; ?>" gb-owner-id="<?php echo Yii::app()->user->id; ?>" data-toggle="tab">
              <p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Mentorships</p>
              <i class="glyphicon glyphicon-chevron-right pull-right"></i></a>
          </li>
          <li class=""><a href="#gb-profile-advice-pages-pane" gb-post-type="<?php echo Post::$TYPE_ADVICE_PAGE; ?>" gb-owner-id="<?php echo Yii::app()->user->id; ?>" data-toggle="tab">
              <p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Advice Pages</p>
              <i class="glyphicon glyphicon-chevron-right pull-right"></i></a>
          </li>
        </ul>
      </div>
      <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <br>
        <div class="tab-content gb-full gb-side-margin-thick">
          <div class="tab-pane active gb-full" id="gb-profile-all-pane">
            <?php
            echo $this->renderPartial('application.views.site._posts', array(
             "postShares" => $profilePostShares,
             "heading" => "Your Activities"));
            ?>
          </div>
          <div class="tab-pane gb-full" id="gb-profile-skills-pane">
          </div>
          <div class="tab-pane gb-full" id="gb-profile-mentorships-pane">
          </div>
          <div class="tab-pane gb-full" id="gb-profile-advice-pages-pane">
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane gb-full" id="profile-about-pane">
      <div class="gb-full col-lg-6 col-md-6 col-sm-6 col-xs-12 gb-no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>About Me</h4>
          </div>
          <div class="panel-body">

          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Inspiration Quote</h4>
          </div>
          <div class="panel-body">

          </div>
        </div>
      </div>
      <div class="gb-full col-lg-6 col-md-6 col-sm-6 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Basic Info</h4>
          </div>
          <div class="panel-body">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php $this->endContent() ?>