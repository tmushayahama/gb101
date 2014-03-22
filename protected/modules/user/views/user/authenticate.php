<?php
$this->beginContent('//layouts/gb_main2');
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search/"); ?>";
</script>


<div class="gb-intro-header row">
  <h1 class="title text-center">Develop, maintain and apply your skills.</h1>
  <br>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail gb-top-border-4">
      <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_3.png" alt="SKILLS">
      <div class="caption text-center">
        <h4 class="gb-footer">Skill Applications</h4>
        <p>
          Skill Mentorships<br>
          Skill Show Offs<br>
          Skill Discussions<br>
          <strong>...</strong>
        </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail gb-top-border-2">
      <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_3.png" alt="">
      <div class="caption text-center">     
        <h4 class="gb-footer">Goal Applications</h4>
        <p>
          Advice Pages <br>
          Daily Journal<br>
          Collaborative Learning<br>
          <strong>...</strong>
        </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="thumbnail gb-top-border-3">
      <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_3.png" alt="">
      <div class="caption text-center">
        <h4 class="gb-footer">Promise Application</h4>
        <p>
          Promise Commitments<br>
          Promise Sharing <br>
          Promise Templates<br>
          <strong>...</strong>
        </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>
  </div>
</div>
<div class="row gb-intro-header-2">
  <div class="input-group input-group-lg"">
    <div class="input-group-btn">
      <button id="gb-post-type-btn" class="btn btn-default dropdown-toggle" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
      <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>">Skill Bank</a></li>
        <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_MENTORSHIP; ?>">Mentorships</a></li>
        <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_ADVICE_PAGE; ?>">Advice Pages</a></li>
        <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_PEOPLE; ?>">People</a></li>
      </ul>
    </div>
    <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
    <div class="input-group-btn">
      <button id="gb-keyword-search-btn" class="btn btn-primary" type="submit">Search</button>
    </div>
  </div>
</div>

<div class="gb-intro-header-3 row">
  <div class="col-lg-6">
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
  <div class="thumbnail col-lg-6 ">
    <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tablet_screenshot.png" alt="">
  </div>
</div>
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
<?php $this->endContent(); ?>
