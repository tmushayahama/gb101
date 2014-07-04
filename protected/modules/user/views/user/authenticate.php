<?php
$this->beginContent('//layouts/gb_main3');
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
        <p class="gb-title-description col-lg-offset-2 col-md-offset-1 col-lg-8 col-md-10">Whether by mentorship, writing advice, skill journal, <strong>Skill Section</strong> 
          and its applications lets you discover and explore new skills or develop and maintain your skills.
        </p>  
      </div>
      <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/screenshot_3.png" alt="">
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
          <h2 class="text-center"><div class="text-warning"><i class="glyphicon glyphicon-eye-open"></i> 2 Discover</div><small> from your community</small></h2>
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
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
      <ul class="list-group">
        <li class="list-group-item"><i class="text-success glyphicon glyphicon-ok"></i> Manage your skills & applications</li>
        <li class="list-group-item"><i class="text-success glyphicon glyphicon-ok"></i> Access all skill applications</li>
        <li class="list-group-item"><i class="text-success glyphicon glyphicon-ok"></i> Share & connect with people</li>
        <li class="list-group-item"><i class="text-success glyphicon glyphicon-ok"></i> The awesome daily personal journal</li>
        <li class="list-group-item"><i class="text-success glyphicon glyphicon-ok"></i> Explore the public skill bank</li>
        <li class="list-group-item"><i class="text-success glyphicon glyphicon-ok"></i> Timelines</li>
        <li class="list-group-item"> <strong>...</strong></li>
      </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-3 hidden-xs gb-no-padding">
      <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/screenshot_2.png" alt="">
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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-padding-medium">
          <div class="panel panel-default">
            <div class="panel-heading">
              Skill Applications
            </div>
            <div class="panel-body gb-no-padding">
              <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_3.png" alt="SKILLS">
              <ul class="list-group">
                <li class="list-group-item">Skill Mentorships</li>
                <li class="list-group-item">Skill Show Offs</li>
                <li class="list-group-item">Skill Discussions</li>
                <li class="list-group-item"> <strong>...</strong></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-padding-medium">
          <div class="panel panel-default">
            <div class="panel-heading">
              Goal Applications
            </div>
            <div class="panel-body gb-no-padding">
              <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_3.png" alt="">
              <ul class="list-group">
                <li class="list-group-item">Advice Pages</li>
                <li class="list-group-item">Daily Journal</li>
                <li class="list-group-item">Collaborative Learning</li>
                <li class="list-group-item"> <strong>...</strong></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-padding-medium">
          <div class="panel panel-default">
            <div class="panel-heading">
              Skill Applications
            </div>
            <div class="panel-body gb-no-padding">
              <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_3.png" alt="">
              <ul class="list-group">
                <li class="list-group-item">Promise Commitments</li>
                <li class="list-group-item">Promise Sharing</li>
                <li class="list-group-item">Promise Templates</li>
                <li class="list-group-item"> <strong>...</strong></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <h1 class="text-center">Getting Started</h1>
      <br>
      <p class="gb-title-description text-center">What to do after <a href="#gb-registration-modal" role="button" data-toggle="modal" class="">Signing Up</a>?
      </p>
    </div>
  </div>
</div>

<div class="container">
  <div class="col-lg-12">
    <div class="row gb-title text-center">
      <h2 class="">Sign up to get all the benefits of Skill Section</h2>
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
      <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;              ?>/img/tablet_screenshot_define.png" alt="">
      <div class="carousel-caption">
        <h1 class="">1. Define</h1>
        <br>
        <h4> Define your skills and their levels.
        </h4>
      </div>
    </div>
    <div class="item container">
      <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;              ?>/img/tablet_screenshot_community.png" alt="">
      <div class="carousel-caption">
        <h1 class="">2. Learn</h1>
        <br>
        <h4>Learn from your Skill Section community.
        </h4>
      </div>
    </div>
    <div class="item container">
      <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;              ?>/img/tablet_screenshot_prove.png" alt="">
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
