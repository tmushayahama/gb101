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
  <br>
  <br>
  <div class="container">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <h1 class="title">Explore, discover, develop, apply and maintain skills.</h1>
      <h4 class=""><strong>Skill Section</strong> lets you apply your skills by using
        skill, goal and promise applications. </h4>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
          <div class="thumbnail gb-top-border-4">
            <img class="gb-img-left" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_3.png" alt="SKILLS">
            <div class="caption text-left">
              <h4 class="gb-footer">Skill Applications</h4>
              <p>
                Skill Mentorships<br>
                Skill Show Offs<br>
                Skill Discussions<br>
                <strong>...</strong>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail gb-top-border-2">
            <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_3.png" alt="">
            <div class="caption text-center">     
              <h4 class="gb-footer">Goal Applications</h4>
              <p>
                Advice Pages <br>
                Daily Journal<br>
                Collaborative Learning<br>
                <strong>...</strong>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail gb-top-border-3">
            <img class="gb-img-right" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_3.png" alt="">
            <div class="caption text-right">
              <h4 class="gb-footer">Promise Application</h4>
              <p>
                Promise Commitments<br>
                Promise Sharing <br>
                Promise Templates<br>
                <strong>...</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gb-signup-box col-lg-offset-1 col-sm-offset-1  col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
<!-- <div class="gb-intro-header-1 row">
  <br>
  <div class="container">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <h1 class="title">Develop, apply and maintain your skills.</h1>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail">
            <div class="caption">
              <h4 class="gb-footer">1. Define</h4>
              <br>
              <p> Define your skills and their levels.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail">
            <div class="caption">
              <h4 class="gb-footer">2. Learn</h4>
              <br>
              <p>Learn from your Skill Section community.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail">
            <div class="caption">
              <h4 class="gb-footer">3. Prove</h4>
              <br>
              <p>Apply your skills using Skill Section Apps. 
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail">
            <div class="caption">
              <h4 class="gb-footer">4. Share</h4>
              <br>
              <p>Share your activities and see other skilled people.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail">
            <div class="caption">
              <h4 class="gb-footer">5. Keep Track</h4>
              <br>
              <p>Everything is recorded in Skill Section timeline and book..
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="thumbnail">
            <div class="caption">
              <h4 class="gb-footer">6. Rinse & Repeat</h4>
              <br>
              <p>Keep on doing the cycle.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="gb-signup-box col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
</div> -->
<!-- <div id="gb-welcome-tab" class="">
  <div class="container">
    <div class="row">
      <ul class="gb-nav-2 nav-pills col-lg-12">
        <li class="col-lg-2"><a href="<?php //echo Yii::app()->createUrl("skill/skill/skillbank", array());      ?>" class="gb-btn btn-link btn-mini">Skill Bank</a></li>
        <li class="col-lg-2"><a href="<?php //echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array());      ?>" class="gb-btn btn-link btn-mini">Mentorships</a></li>
        <li class="col-lg-2"><a href="<?php //echo Yii::app()->createUrl("pages/pages/pageshome", array());      ?>" class="gb-btn btn-link btn-mini">Advice Pages</a></li>
        <li class="col-lg-2"><a href="<?php //echo Yii::app()->createUrl("people/", array());      ?>" class="gb-btn btn-link btn-mini">People</a></li>
        <li class="dropdown col-lg-2 pull-right gb-disabled">
          <a id="topbar-menu-dropdown-toggle" class="gb-btn btn-mini" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            More <i class="pull-right icon-white icon-arrow-down"></i>
          </a>
          <ul id="sidebar-selecto" class="dropdown-menu " role="menu" aria-labelledby="dLabel">
            <li class=""><a href="#" ><div class="icon icon-home"></div>Groups</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>Templates</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>Timelines</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>Events</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div> -->
<!-- <div class="row gb-intro-header-3">
  <div class="container">
    <div class="row">
      <div class="input-group input-group-lg col-lg-12">
        <div class="input-group-btn">
          <button id="gb-post-type-btn" class="btn btn-default dropdown-toggle" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
          <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a class="gb-search-type" search-type="<?php ///echo Post::$TYPE_LIST_BANK;      ?>">Skill Bank</a></li>
            <li><a class="gb-search-type" search-type="<?php //echo Post::$TYPE_MENTORSHIP;      ?>">Mentorships</a></li>
            <li><a class="gb-search-type" search-type="<?php //echo Post::$TYPE_ADVICE_PAGE;      ?>">Advice Pages</a></li>
            <li><a class="gb-search-type" search-type="<?php //echo Post::$TYPE_PEOPLE;      ?>">People</a></li>
          </ul>
        </div>
        <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
        <div class="input-group-btn">
          <button id="gb-keyword-search-btn" class="btn btn-primary" type="submit">Search</button>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="gb-intro-header-4 row">
  <div class="container">
    <div class="col-lg-4">
      <h1 class="">1. Define</h1>
      <br>
      <p> Define your skills and their levels.
      </p>
    </div>
    <div class="thumbnail col-lg-8 ">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tablet_screenshot_define.png" alt="">
    </div>
  </div>
</div>
<div class="gb-intro-header-3 row">
  <div class="container"> 
    <div class="thumbnail col-lg-8">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tablet_screenshot_community.png" alt="">
    </div>
    <div class="col-lg-4">
      <h1 class="">2. Learn</h1>
      <br>
      <p>Learn from your Skill Section community.
      </p>
    </div>
  </div>
</div>
<div class="gb-intro-header-4 row">
  <div class="container">
    <div class="col-lg-4">
      <h1 class="">3. Prove</h1>
      <br>
      <p>Apply your skills using Skill Section Apps. 
      </p>
    </div>
    <div class="thumbnail col-lg-8">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tablet_screenshot_prove.png" alt="">
    </div>
  </div>
</div>
<div class="gb-intro-header-4 row">
  <div class="container">
    <div class="col-lg-12">
      <h2>Sign up to get all the benefits of Skill Section.</h2>
      <br>
      <div class='row'>
        <div class='col-lg-6'>
          <h4>Manage Your Skills</h4>
          <p><strong>Define your skills </strong> by listing skills
            you've gained, skills you want to learn and skills you want to improve. </p>
        </div>
        <div class='col-lg-6'>
          <h4>Access All Skill Applications</h4>
          <p><strong>Manage your skill apps,</strong> get features to all applications, mentorship app,
            advice pages app, skill showoffs app, daily journal app etc</p>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-6'>
          <h4>Share & Connect with people</h4>
          <p><strong>Share with your connections,</strong>Share to right people. There are 4 types of connections, friends, family, followers and 
            general connections. </p>
        </div>
        <div class='col-lg-6'>
          <h4>Daily Personal Journal</h4>
          <p><strong>Keep track of your daily skills</strong> by keeping track of daily accomplishments and 
            new skills you learn, skills you mentor, pages you write etc
          </p>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-6'>
          <h4>Skill Bank</h4>
          <p><strong>Make good use of our skill bank</strong> whether you want to add any skill, 
            want to start a mentorship, write an advice page, getting mentored, skill showoffs </p>
        </div>
        <div class='col-lg-6'>
          <h4>Get Puntos & Trophies</h4>
          <p><strong>Get rewarded</strong> be actively involved and earn points. 
            More points you gain the more proof of how skillful you are.</p>
        </div>
      </div>
    </div>
  </div>
</div>

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
