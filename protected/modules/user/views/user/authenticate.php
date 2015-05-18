<?php
$this->beginContent('//layouts/gb_main2');
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_demo.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
 var searchUrl = "<?php echo Yii::app()->createUrl("search/search/"); ?>";
</script>
<?php echo CHtml::errorSummary(array($registerModel, $profile, $loginModel), '<button type="button" class="close" data-dismiss="alert">&times;</button>', NULL, array('class' => 'container alert alert-danger')); ?>

<div class="gb-intro-header-1 row">
 <div class="container">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
   <div class="gb-title-box row">
    <h1 class="gb-title">Apply & Explore your Skills</h1>
    <br>
    <p class="gb-title-description col-lg-offset-2 col-md-offset-1 col-lg-8 col-md-10">
     Tools and Apps you need to use your skills in one section.
    </p>
   </div>
   <!--
   <img class="" src="<?php //echo Yii::app()->request->baseUrl;                             ?>/img/screenshot_3.png" alt="">
   -->
  </div>
 </div>
</div>
<div class="row gb-intro-header-3">
 <div class="container">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
   <div class="thumbnail">
    <div class="caption">
     <h2 class="text-center"><div class="text-warning"><i class="glyphicon glyphicon-search"></i> 1 Explore</div><small> using the skill bank</small></h2>
    </div>
   </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
   <div class="thumbnail">
    <div class="caption">
     <h2 class="text-center"><div class="text-warning"><i class="glyphicon glyphicon-eye-open"></i> 2 Discover</div><small> from the community</small></h2>
    </div>
   </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
   <div class="thumbnail">
    <div class="caption">
     <h2 class="text-center"><div class="text-warning"><i class="glyphicon glyphicon-wrench"></i> 3 Apply</div><small> using our applications</small></h2>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="gb-intro-header-4 row">
 <div class="container">
  <div class="col-lg-3 col-md-3 col-sm-3 gb-no-padding">
   <h3 class="gb-title"><i class="fa fa-file"></i> Everything on a single page
    <small>
     We organize your stuff in one home.
    </small>
   </h3>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-th"></i> Quickly access your <strong>SkillSection Apps</strong>
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-list-ol"></i> Get a glimpse of what you and others are doing with the app.
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-file-text-o"></i> Select for more details and use the app's features.
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-user-plus"></i> Contribute to what others are doing.
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-link"></i> Link apps together
   </p>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-3 gb-no-padding">
   <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/screenshot_4.png" alt="">
  </div>
 </div>
</div>

<div class="row gb-intro-header-2">
 <div class="gb-intro-header-2-top row">
  <div class="container">
   <br>
   <br>
   <div class="row gb-title">
    <h1 class="">Make use of our Applications</h1>
    <p class="title-description">Some of the <b>SkillSection's</b> top applications you can use to apply your skills.
    </p>
    <br>
   </div>
   <div class="row ">
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Skill App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_skill.png" alt="SKILLS">
       <ul class="list-group">
        <li class="list-group-item">Skill Mentorships</li>
        <li class="list-group-item">Skill Collaborative</li>
        <li class="list-group-item">Skill Improvement</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Goal App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_goal.png" alt="GOAL">
       <ul class="list-group">
        <li class="list-group-item">Goal Setting</li>
        <li class="list-group-item">Goal Tracking</li>
        <li class="list-group-item">Contribution</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Promise App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_promise.png" alt="">
       <ul class="list-group">
        <li class="list-group-item">Promise Commitments</li>
        <li class="list-group-item">Promise Sharing</li>
        <li class="list-group-item">Promise Templates</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Hobby App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_hobby.png" alt="SKILLS">
       <ul class="list-group">
        <li class="list-group-item">Hobby Sharing</li>
        <li class="list-group-item">Hobby events</li>
        <li class="list-group-item">Hobby Show Offs</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="gb-intro-header-4 row">
 <div class="container">
  <div class="col-lg-3 col-md-3 col-sm-3 gb-no-padding">
   <h3 class="gb-title"><i class="fa fa-file"></i> Everything on a single page
    <small>
     We organize your stuff in one home.
    </small>
   </h3>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-th"></i> Quickly access your <strong>SkillSection Apps</strong>
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-list-ol"></i> Get a glimpse of what you and others are doing with the app.
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-file-text-o"></i> Select for more details and use the app's features.
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-user-plus"></i> Contribute to what others are doing.
   </p>
   <br>
   <p class="gb-title-description">
    <i class="fa fa-link"></i> Link apps together
   </p>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-3 gb-no-padding">
   <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/screenshot_4.png" alt="">
  </div>
 </div>
</div>
<div class="row gb-intro-header-2">
 <div class="gb-intro-header-2-top row">
  <div class="container">
   <br>
   <br>
   <div class="row gb-title">
    <h1 class="">Make use of our Applications</h1>
    <p class="title-description">Some of the <b>SkillSection's</b> top applications you can use to apply your skills.
    </p>
    <br>
   </div>
   <div class="row ">
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Skill App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_skill.png" alt="SKILLS">
       <ul class="list-group">
        <li class="list-group-item">Skill Mentorships</li>
        <li class="list-group-item">Skill Collaborative</li>
        <li class="list-group-item">Skill Improvement</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Goal App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_goal.png" alt="GOAL">
       <ul class="list-group">
        <li class="list-group-item">Goal Setting</li>
        <li class="list-group-item">Goal Tracking</li>
        <li class="list-group-item">Contribution</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Promise App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_promise.png" alt="">
       <ul class="list-group">
        <li class="list-group-item">Promise Commitments</li>
        <li class="list-group-item">Promise Sharing</li>
        <li class="list-group-item">Promise Templates</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-medium">
     <div class="panel panel-default">
      <div class="panel-heading">
       Hobby App
      </div>
      <div class="panel-body gb-no-padding">
       <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/apps/gb_hobby.png" alt="SKILLS">
       <ul class="list-group">
        <li class="list-group-item">Hobby Sharing</li>
        <li class="list-group-item">Hobby events</li>
        <li class="list-group-item">Hobby Show Offs</li>
        <li class="list-group-item"> <strong>...</strong></li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="container">
 <div class='row'>
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
   <div class="gb-signup-box">
    <h2 class="text-center">Start Today</h2>
    <br>
    <a href="#gb-registration-modal" role="button" data-toggle="modal" class="btn btn-primary btn-block btn-lg">Sign Up FREE</a>
    <br>
    <br>
    <a href="#gb-login-modal" role="button" data-toggle="modal" class="btn btn-default btn-block btn-lg">Login</a>
    <br>
    <p>Show me how it works.</p>
    <a class="gb-demo-trigger-btn btn btn-default btn-block btn-lg">Demo</a>
   </div>
  </div>
 </div>

 <div class="gb-hide col-lg-12">
  <div class="row gb-title text-center">
   <h2 class="">Sign up, get all the benefits.</h2>
  </div>
  <br>
  <br>
  <div class='row'>
   <div class='col-lg-6 col-md-6 col-sm-12 col-sm-12'>
    <h4>Manage Your Skills</h4>
    <p><strong>Define your skills </strong> by listing skills
     you've gained, skills you want to learn and skills you want to improve. </p>
   </div>
   <div class='col-lg-6 col-md-6 col-sm-12 col-sm-12'>
    <h4>Access All Skill Applications</h4>
    <p><strong>Manage your skill apps,</strong> get features to all applications, mentorship app,
     advice pages app, skill showoffs app, daily journal app etc</p>
   </div>
  </div>
  <div class='row'>
   <div class='col-lg-6 col-md-6 col-sm-12 col-sm-12'>
    <h4>Share & Connect with people</h4>
    <p><strong>Share with your connections,</strong>Share to the right people. There are 4 types of connections, friends, family, followers and
     general connections. </p>
   </div>
   <div class='col-lg-6 col-md-6 col-sm-12 col-sm-12'>
    <h4>Daily Personal Journal</h4>
    <p><strong>Keep track of your daily skills</strong> by keeping track of daily accomplishments and
     new skills you learn, skills you mentor, pages you write etc
    </p>
   </div>
  </div>
  <div class='row'>
   <div class='col-lg-6 col-md-6 col-sm-12 col-sm-12'>
    <h4>Skill Bank</h4>
    <p><strong>Make good use of our skill bank</strong> whether you want to add any skill,
     want to start a mentorship, write an advice page, getting mentored, skill showoffs </p>
   </div>
   <div class='col-lg-6 col-md-6 col-sm-12 col-sm-12'>
    <h4>Get Puntos & Trophies</h4>
    <p><strong>Get rewarded</strong> be actively involved and earn points.
     More points you gain the more proof of how skillful you are.</p>
   </div>
  </div>
 </div>
</div>
<!--
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active container">
      <img src="<?php //echo Yii::app()->request->baseUrl;                                                  ?>/img/tablet_screenshot_define.png" alt="">
      <div class="carousel-caption">
        <h1 class="">1. Define</h1>
        <br>
        <h4> Define your skills and their levels.
        </h4>
      </div>
    </div>
    <div class="item container">
      <img src="<?php //echo Yii::app()->request->baseUrl;                                                  ?>/img/tablet_screenshot_community.png" alt="">
      <div class="carousel-caption">
        <h1 class="">2. Learn</h1>
        <br>
        <h4>Learn from your Skill Section community.
        </h4>
      </div>
    </div>
    <div class="item container">
      <img src="<?php //echo Yii::app()->request->baseUrl;                                                  ?>/img/tablet_screenshot_prove.png" alt="">
      <div class="carousel-caption">
        <h1 class="">3. Prove</h1>
        <br>
        <h4>Apply your skills using Skill Section Apps.
        </h4>
      </div>
    </div>

  </div>

  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-cchevron-right"></span>
  </a>
</div>
-->

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
  'loginModel' => $loginModel
));
?>
<?php
echo $this->renderPartial('user.views.user._registration_modal', array(
  'registerModel' => $registerModel,
  'profile' => $profile
));
?>
<?php
echo $this->renderPartial('application.views.site.modals._demo', array(
));
?>
<?php $this->endContent(); ?>
