<?php $this->beginContent('//layouts/gb_main'); ?>
<script type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
</script>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner navbar-small">
    <div class="container">
      <div class="row">
        <div class="gb-navbar span12">
          <a href="<?php echo Yii::app()->createUrl("user/login"); ?>" class="pull-left">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="">
          </a>
          <div class="offset1 input-append">
            <div class="btn-group">
              <button id="gb-post-type-btn" class="btn btn-inverse dropdown-toggle" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
              <button class="btn dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>">Skill Bank</a></li>
                <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_MENTORSHIP; ?>">Mentorships</a></li>
                <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_ADVICE_PAGE; ?>">Advice Pages</a></li>
                <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_PEOPLE; ?>">People</a></li>
              </ul>
            </div>
            <input class="span4" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
            <div class="btn-group">
              <button id="gb-keyword-search-btn" class="btn " >
                Search
              </button>
            </div>
          </div>
          <a href="#gb-login-modal" role="button" class="btn btn-success gb-login-guest-btn pull-right" data-toggle="modal">Login</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="gb-topbar" class="">
  <div class="container">
    <div class="row">
      <ul class="nav inline nav-pills">
        <li><a href="<?php echo Yii::app()->createUrl("user/login"); ?>" class="gb-btn btn-link btn-mini">Guest Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>" class="gb-btn btn-link btn-mini">Skill Bank</a></li>
        <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array()); ?>" class="gb-btn btn-link btn-mini">
            Mentorships
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
        <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome", array()); ?>" class="gb-btn btn-link btn-mini">
            Advice Pages 
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
        <li><a href="<?php echo Yii::app()->createUrl("people/", array()); ?>" class="gb-btn btn-link btn-mini">People</a></li>
      </ul>
    </div>
  </div>
</div>
<div id="guest-main-container" class="container">
  <?php echo $content; ?>
</div> 
<?php $this->endContent(); ?>
